<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderOfferRequest;
use App\Http\Requests\OrderRequest;
use App\Http\Resources\UserResource;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderOffer;
use App\Models\Place;
use App\Models\Rate;
use App\Models\Transaction;
use App\Services\NotificationService;
use App\Services\OrderService;
use App\Traits\ApiResponse;
use App\Traits\FileUpload;
use App\Traits\GeneralTrait;
use App\User;
use Illuminate\Http\Request;
use App\Models\OrderItem;
use App\Jobs\SendOrderNotifToDrivers;
use App\Traits\TawseelOrder;
use App\Traits\PaymentTrait;

class OrderController extends Controller
{
    private $notificationServ;
    private $PaymentTrait;

    use FileUpload,ApiResponse,GeneralTrait,TawseelOrder;

    private $order;


    public function __construct(Orderservice $orderService, NotificationService $notificationService, PaymentTrait $PaymentTrait)
    {
        $this->order = $orderService;
        $this->notificationServ = $notificationService;
        $this->PaymentTrait = $PaymentTrait;
    }
   
    //Create new Order throw [ Service $orderService ] 
    
    public function submit(OrderRequest $request)
    { 
        //return $request->validated();
         $order = $this->order->store($request->validated());
        if (!$order) {
            
            $response = [
                'errors' => ['Order' => trans('messages.added_faild')]];
            return $this->responseFaild($response);
        }

        //Tawseel Create order
       $TawseelResponse = $this->CreateOrderInTawseel($request , $order);

       if($TawseelResponse['tawseelStatus'] == true){
            $order->refrenceCode = $TawseelResponse['refrenceCode'];
            $TawseelResponse['sucess'] = "تم ارسال الطلب لهيئه توصيل بنجاح";
            $order->tawseelMessage =null;
            $order->save();
            
       }else{
            $order->tawseelMessage = $TawseelResponse['tawseelMessage'];
            $TawseelResponse['error'] = "عفوا هناك خطأ ما في ارسال الطلب لهيئه توصيل, يرجي التواصل مع الاداره ";
            $order->refrenceCode =null;
            $order->save();
       }
        // send success
        $response = [
            'message' => ['sucess' => [trans('messages.added')]],
            'Tawseel'=>$TawseelResponse,
            'data' => $order->only('id', 'user_id', 'code', 'source_lat', 'source_lng', 'destination_lng', 'destination_lat', 'discount', 'type', 'payment_type', 'status', 'created_at', 'shipper_id', 'items', 'refrenceCode' , 'tawseelMessage'),

        ];
        
        return $this->responseSuccess($response);
    }
    
//Re order an order again  by using it's id 
    public function reorder(Request $request){
 
     //return old order data throw order_id
        $this->validate($request, [
            'order_id' => 'required|numeric|exists:orders,id',
        ]);

        $oldOrder = Order::with('items')->findOrFail($request->order_id);
        
        $oldOrder->Update(['status' => 5, 'canceld_by' => 1, 'note' =>'', 'cancel_date' => \Carbon\Carbon::now()]);

        $request=$oldOrder->toArray();
       // dd($request);
        $order = new Order();


        $user=User::find($request['user_id']);  // return Driver data from the last order 
        $user_static=['name'=>$user->name,'rate'=>$user->rate,'rate_count'=>$user->rate_count,'image'=>$user->imagePath()];
        $order->user_static = $user_static;

        $order->user_id = $request['user_id'];
        if (isset($request['comment'])) {$order->comment = $request['comment'];} 
        if (isset($request['source_lat'])) {$order->source_lat = $request['source_lat'];}
        if (isset($request['source_lng'])) {$order->source_lng = $request['source_lng'];}
        if (isset($request['discount'])) {$order->discount = $request['discount'];}
        if (isset($request['shop_name'])) {$order->shop_name = $request['shop_name'];}
        if (isset($request['package_type'])) {$order->package_type = $request['package_type'];}
        if (isset($request['addition_service'])) {
            $order->addition_service = $request['addition_service'];
            $order->addition_service_cost =\App\Models\Setting::find(1)->addition_service_cost; 
        }
        // $order->refrenceCode = $refrenceCode;
        $order->destination_lng = $request['destination_lng'];
        $order->destination_lat = $request['destination_lat'];
        $order->type = $request['type'];
        $order->status = 1;
        $order->save();

        if (!$order) {
            return 'error in  reordering you can try again later';
        }

        $order->code = $order->id + 1000;
        //$order->access_user_id = $order->user_id;
        $order->save();

        foreach ($request['items'] as $key=>$itemData) {
            $item = new OrderItem();
            $item->title = $itemData['title'];
            $item->order_id = $order->id;
            $item->quantity = $itemData['quantity'];
            $item->save();

            $path = null;
            if (isset($itemData['image'])) {
         
             
                if(isset($_FILES['items']['name'][$key]['image']) ){
                    $path = $this->storeFile(false, [
                        'fileUpload' => $itemData['image'],
                        'folder' => OrderItem::FILE_FOLDER,
                        'recordId' => $item->id . '_image',
                    ]);
                }else{
                $path = $itemData['image'];
                    
                }

                // if ($path === false) {
                //     $path = $itemData['image'];
                // }
            }

            $item->image = $path;

            $item->save();
        }
        //Tawseel Create order
        $TawseelResponse = $this->CreateOrderInTawseel($request , $order);

        if($TawseelResponse['tawseelStatus'] == true){
            $order->refrenceCode = $TawseelResponse['refrenceCode'];
            $order->tawseelMessage =null;
            $order->save();
        }else{
            $order->tawseelMessage = $TawseelResponse['tawseelMessage'];
            $order->refrenceCode =null;
            $order->save();
        }
        
        if (!$order) {
            $response = [
                'TawseelResponse'=>$TawseelResponse ,
                'errors' => ['Order' => trans('messages.added_faild')]
                ];
            return $this->responseFaild($response);
        }
        // send success
        $response = [
            'TawseelResponse'=>$TawseelResponse ,
            'message' => ['sucess' => [trans('messages.added')]],
            'data' => $order->only('id', 'user_id','refrenceCode', 'code', 'source_lat', 'source_lng', 'destination_lng', 'destination_lat', 'discount', 'type', 'payment_type', 'status', 'created_at', 'shipper_id', 'items'),

        ];
      
        return $this->responseSuccess($response);

    }

//Cancel order from  tawseel and database both of them
    public function cancel(Request $request)
    {
        $id = $request->id;
        
        $order = Order::find($id);
        
        if(!$order){
            $response = [
               'errors' => ['Order' => trans('messages.updated_faild')]];
           return $this->responseFaild($response);
        }
       
        $TawseelResponse = $this->CancelOrderInTawseel($order->refrenceCode);
        if($TawseelResponse['tawseelStatus'] == true){
            $order->tawseelMessage =null;
            $order->save();
        }else{
            $order->tawseelMessage = $TawseelResponse['tawseelMessage'];
            $order->save();
        }
            if ($order->type == 1) {
                if ($order->status == 1 || $order->status == 2) {
                    if ($order->Update(['status' => 5, 'canceld_by' => $request->canceld_by, 'note' => $request->note, 'cancel_date' => \Carbon\Carbon::now(), 'refrenceCode' => null]) == false) {
                        
                        $response = [
                             "TawseelResponse" => $TawseelResponse,
                            'errors' => ['Order' => trans('messages.updated_faild')]];
                        return $this->responseFaild($response);
                    }
    
                } else {
                    $response = [
                        "TawseelResponse" => $TawseelResponse,
                        'errors' => ['Order' => trans('messages.updated_faild')]];
                    return $this->responseFaild($response);
                }
    
                // send success
                $response = [
                    'tawseelmessage'=>$TawseelResponse ,
                    'message' => ['sucess' => [trans('messages.updated')]],
                    'data' => $order->only('id', 'user_id', 'code', 'source_lat', 'source_lng', 'destination_lng', 'destination_lat', 'discount', 'type', 'status', 'created_at', 'shipper_id', 'items'),
                ];
    
                if($order->shipper_id !== null){
                    $this->notificationServ->notifyCancelOrder(
                        ['fcm', 'db'],
                        ['order_id' => $request->id, 'canceld_by' => $request->canceld_by]
                    );
                  }
                return $this->responseSuccess($response);
    
            } else {
                if ($order->Update(['status' => 5, 'canceld_by' => $request->canceld_by, 'note' => $request->note, 'cancel_date' => \Carbon\Carbon::now()]) == false) {
                    $response = ['errors' => ['Order' => trans('messages.updated_faild')]];
                    return $this->responseFaild($response);
                }
    
                $response = [
                    'tawseelmessage'=>$TawseelResponse,
                    'message' => ['sucess' => [trans('messages.added')]],
                    'data' => $order->only('id', 'user_id', 'code', 'source_lat', 'source_lng', 'destination_lng', 'destination_lat', 'discount', 'type', 'status', 'created_at', 'shipper_id', 'items'),
                ];
    
                if($order->shipper_id !== null){
                    $this->notificationServ->notifyCancelOrder(
                        ['fcm', 'db'],
                        ['order_id' => $request->id, 'canceld_by' => $request->canceld_by]
                    );
                  }
    
        }
    
            return $this->responseSuccess($response);

    }
    
//Return order and it's data like [shipping data , and shipper and offer] from Database and Tawseel
    public function details($id,$user_id=null)
    {
        $order = Order::with('items')->with('offer')->with('shipper_data')->with('user_data')->findOrFail($id);
        $offer = [];
        $isOffered = 0;
        if(isset($user_id)){
            $order_offer = OrderOffer::where('order_id',$id)->where('user_id', $user_id)->first();
            if($order_offer){
                $offer = $order_offer;
                $isOffered = 1;
            }else{
                $offer = [];
                $isOffered =0;
            }
        }
        
        $order->toArray();
        $place = Place::where('user_id', $order['user_data']['id'])->where('lat', $order['destination_lat'])->where('lng', $order['destination_lng'])->first();
        if ($place) {
            $place_name = $place->name;
        } else {
            $place_name = null;
        }

        $data['id'] = $order['id'];
        $data['user_data'] = ($order['user_data'] == null) ? null : new UserResource($order['user_data']);
        $data['shipper_data'] = ($order['shipper_data'] == null) ? null : new UserResource($order['shipper_data']);
        $data['code'] = $order['code'];
        $data['source_lat'] = $order['source_lat'];
        $data['source_lng'] = $order['source_lng'];
        $data['destination_lat'] = $order['destination_lat'];
        $data['destination_lng'] = $order['destination_lng'];
        $data['discount'] = $order['discount'];
        $data['type'] = $order['type'];
        $data['type_name'] = $order->type_title();
        $data['status'] = $order['status'];
        $data['price'] = $order['price'];
        $data['shipping'] = $order['shipping'];
        $data['comment'] = $order['comment'];
        $data['note'] = $order['note'];
        $data['invoice'] = ($order['invoice'] == null) ? null : asset('storage/app/' . $order['invoice']);
        $data['created_at'] = $order['created_at'];
        
        $data['destination_addres_name'] = $place_name;
        $data['place'] = $order['place'];
        $data['items'] = $order['items'];
        $data['reted_by_client'] = Rate::where(['order_id' => $order->id, 'user_id' => $order->shipper_id])->first() ? 1 : 0;
        $data['reted_by_shipper'] = Rate::where(['order_id' => $order->id, 'user_id' => $order->user_id])->first() ? 1 : 0;
        $data['shipping_cost'] = ($order['offer'] == null) ?  \App\Models\Setting::find(1)->commission_percent : $order['offer']['shipping'];
        $data['commission'] = \App\Models\Setting::find(1)->commission_percent;
        $data['addition_service'] = $order['addition_service'];
        $data['addition_service_cost'] = ($order['addition_service_cost'] == 0 ) ? strval( $data['shipping_cost']  *  \App\Models\Setting::find(1)->addition_service_cost /100) : strval($order['addition_service_cost']) ;
        $data['deserve_more'] = $order['deserve_more'];
        $data['shop_name'] = $order['shop_name'];
        $data['package_type'] = $order['package_type'];
        $data['isOffered'] = $isOffered;
        $data['offer'] = $order['offer'] ;
        $data['refrenceCode'] = $order->refrenceCode;
        $data['tawseelMessage'] = $order->tawseelMessage;
        $data['payment_type'] = $order['payment_type'];
        $data['getpaid'] = $order->getpaid;
        if($order['payment_status'] == 1 && $order['payment_type'] == 1){
            $data['total'] = ceil($data['price'] +  $data['shipping_cost'] + $data['addition_service_cost'] - $order->discount - $data['getpaid']);
           $data["total"] = strval($data["total"] );
        }else{
            $data['total'] = $data['price'] +  $data['shipping_cost'] + $data['addition_service_cost'] - $order->discount - $data['getpaid'] ;
             $data["total"] = strval($data["total"] );
        }
       
        $data['payment_status']  = $order->payment_status;
        $response = [   
            'data' => $data,
        ];
        return $this->responseSuccess($response);
    }
// filter Clients'  Orders throw [user_type=> must be 2 , user_id [to get client data] and status [confirmed or not]   ]
    public function filter(Request $request)
    {
        if ($request->user_type == 2) {
            if ($request->status == 6) {
                $orders = Order::with('items')->where('user_id', $request->user_id)->orderBy('id', 'desc')->paginate(10);
            } else {
                if ($request->status == 2) {
                    $orders = Order::with('items')->whereIn('status', [0, 1, 2])->where('user_id', $request->user_id)->orderBy('id', 'desc')->paginate(10);
                } else {
                    $orders = Order::with('items')->where('status', $request->status)->where('user_id', $request->user_id)->orderBy('id', 'desc')->paginate(10);
                }
            }
        } else {
            if( isset($request->user_id)){
                $orderIds = OrderOffer::where('user_id', $request->user_id)->pluck('order_id');
                if ($request->status == 6) {
                    $orders = Order::with('items')->whereIn('id', $orderIds)->orderBy('id', 'desc')->paginate(10);
                } else {
                    if ($request->status == 2) {
                        $orders = Order::with('items')->whereIn('status', [0, 1, 2])->whereIn('id', $orderIds)->orderBy('id', 'desc')->paginate(10);
                    } else {
                        $orders = Order::with('items')->where('status', $request->status)->whereIn('id', $orderIds)->orderBy('id', 'desc')->paginate(10);
                    }
                }
            }else{
                $orders = Order::with('items')->whereIn('status', [0, 1, 2])->orderBy('id', 'desc')->paginate(10);
            }
            
        }

        $data = [];
       
            foreach ($orders as $order) {
                $OrderData['id'] = $order->id;
                $OrderData['code'] = $order->code;
                $OrderData['price'] = $order['price'];
                $OrderData['type_image'] = $order->type_image();
                $OrderData['type_title'] = $order->type_title();
                $OrderData['created_at'] = $order->created_at;
                $OrderData['status'] = $order->status;
                $OrderData['type'] = $order['type'];
                $OrderData['getpaid'] = $order->getpaid;
                $OrderData['destination_lat'] = $order['destination_lat'];
                $OrderData['destination_lng'] = $order['destination_lng'];

                $data[] = $OrderData;

            }
  
        return $this->responseSuccessPages(['data' => $data], $orders);
    }
    
    // Driver Send Offer to Client [user_id , order_id , Shipping costs]

    public function submitOffer(Request $request)
    {
        $user = \App\User::find($request->user_id);
        if($request->shipping < \App\Models\Setting::find(1)->minimum_shipping){
            $response = [
                'message' => ['error' => 'عفوا هذه القيمه أقل من المسموح به لقيمه التوصيل'],
                'data'=>[]
            ];
            return $this->responseFaild($response);
        }
        if($user->refrenceCode == null ){
             $response = [
                'message' => ['error' => 'هناك خطأ ما في ربط المندوب مع خدمه توصيل يرجي التواصل مع الأداره في اقرب وقت'],
                'data'=> [$user]
            ];
            return $this->responseFaild($response);
        }
        $isOffered = OrderOffer::where('order_id',$request->order_id)->where('user_id',$request->user_id)->count();

        if($isOffered > 0 ){
            $response = ['errors' => ['Offer' => 'هذا لطلب تم تقديم عرض له من قبل']];
            return $this->responseFaild($response);
        }
        $orderOffer = new OrderOffer();
        $orderOffer->order_id = $request->order_id; 
        $orderOffer->user_id = $request->user_id; 
        $orderOffer->lat = $request->lat; 
        $orderOffer->lng = $request->lng; 
        $orderOffer->shipping =  $request->shipping + \App\Models\Setting::find(1)->commission_percent; 
        $result  =$orderOffer->save();
        if (!$result) {
            $response = ['errors' => ['Offer' => trans('messages.added_faild')]];
            return $this->responseFaild($response);
        }
        $this->notificationServ->notifySubmitOffer(
            ['fcm', 'db'],
            ['order_id' => $request->order_id, 'user_id' => $request->user_id]
        );

        // send success
        $response = [
            'message' => ['sucess' => [trans('messages.added')]],
            'data' => $orderOffer,

        ];
        return $this->responseSuccess($response);
        
    }

// PAY all Order's Cost throw Client Wallet  [but this will be editted soon ,  wallet will cost deliver costs only]
    public function charge_wallet(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required|numeric|exists:users,id',
            'order_id' => 'required|numeric|exists:orders,id',
            'amount' => 'required',
        ]);

        $this->notificationServ->notifyChargeWallet(
            ['fcm', 'db'],
            ['order_id' => $request->order_id, 'user_id' => $request->user_id, 'amount' => $request->amount]
        );

        $user = User::find($request->user_id);
        $user->amount = $user->amount + $request->amount;
        $user->save();
        $order = Order::find($request->order_id);
        $order->charge_wallet = $order->charge_wallet + $request->amount;
        $order->save();

        // send success
        $response = [
            'message' => ['sucess' => [trans('messages.added')]],

        ];
        return $this->responseSuccess($response);

    }

// CLient accept the offer from Driver [adding Driver to order] 
    public function acceptOffer(Request $request)
    {
        $TawseelResponse="";
        $this->validate($request, [
            'offer_id' => 'required|numeric|exists:order_offers,id',
            'order_id' => 'required|numeric|exists:orders,id',
        ]);
        $offer = OrderOffer::findOrFail($request->offer_id);
        $user=User::find($offer->user_id);
        $order=Order::findOrFail($request->order_id);
        //assign driver to order in tawseel

      if(isset($order->refrenceCode) && isset($user->idNumber)){
        $TawseelAcceptResponse = $this->AcceptOrderInTawseel($order->refrenceCode);
            if($TawseelAcceptResponse['tawseelStatus'] == true){
                $TawseelResponse = $this->AssignDriverToOrderInTawseel($order->refrenceCode, $user->idNumber);
                if( $TawseelResponse['tawseelStatus'] == false ){
                    $order->tawseelMessage = $TawseelResponse['tawseelMessage'];
                    $order->save();
                }
            }else{
                $order->tawseelMessage = $TawseelAcceptResponse['tawseelMessage'];
                $order->save();
            }
      }else{
        // $TawseelResponse['message'] = "عفوا هناك خطأ ما لربط هذا المندوب مع هذا الطلب";
        $response = [
            'tawseelmessage'=>$TawseelResponse ,
            'message' => ['error' => 'هناك خطأ ما في ربط المندوب مع الطلب يرجي التواصل مع الأداره في اقرب وقت'],
            'data'=> [$order]

        ];
        return $this->responseSuccess($response);
      }
       
        $offer->update(['status' => 1]);
        $commission = \App\Models\Setting::find(1)->commission_percent;

        OrderOffer::where('order_id', $request->order_id)->where('id', '!=', $request->offer_id)->update(['status' => 2]);
        
        Order::findOrFail($request->order_id)->update(['status' => 2, 'commission' => $commission, 'shipper_id' => $offer->user_id, 'accept_date' => \Carbon\Carbon::now(), 'shipping' => $offer->shipping]);
        
        $addition =  $order->shipping * (\App\Models\Setting::find(1)->addition_service_cost / 100 );
        $order->addition_service_cost = $addition;
        $order->total = $order->price +$order->shipping +$addition -$order->discount;
        $shipper_static=['name'=>$user->name,'rate'=>$user->rate,'rate_count'=>$user->rate_count,'image'=>$user->imagePath()];
        $order->shipper_static = $shipper_static;
       

        $order->save();


        $this->notificationServ->notifyOrderAccepted(
            ['fcm', 'db'],
            ['order_id' => $request->order_id, 'offer_id' => $request->offer_id ]
        );

        
        // send success
        $response = [
            'tawseelmessage'=>$TawseelResponse ,
            'message' => ['sucess' => [trans('messages.added')]],
            'data'=> [$order]

        ];
        
         return $this->responseSuccess($response);

    }

//enable Driver to add update deliver costs and notfy client with it 
    public function deserve_more(Request $request)
    {
        $this->validate($request, [
            //'offer_id' => 'required|numeric|exists:order_offers,id',
            'order_id' => 'required|numeric|exists:orders,id',
            'shipping' => 'required|numeric',
        ]);

        $order = Order::findOrFail($request->order_id);
        $offer = OrderOffer::where(['order_id' => $request->order_id, 'status' => 1]);
        $order->update(['deserve_more' => 1, 'shipping' =>  $request->shipping +   \App\Models\Setting::find(1)->commission_percent ]);
        $offer->update(['shipping' =>  $request->shipping +  \App\Models\Setting::find(1)->commission_percent]);

        $this->notificationServ->notifyDeserveMore(
            ['fcm', 'db'],
            ['order_id' => $request->order_id]
        );
        // send success
        $response = [
            'message' => ['sucess' => [trans('messages.added')]],

        ];
        return $this->responseSuccess($response);
    }

//Delete Driver Offer that has been sent to Client
    public function delete_offer(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required|numeric|exists:users,id',
            'order_id' => 'required|exists:orders,id',

        ]);
        $offer = OrderOffer::where(['order_id' => $request->order_id, 'user_id' => $request->user_id]);

        if ($offer) {
            $offer->delete();
            $response = [
                'message' => ['sucess' => [trans('messages.deleted')]],
            ];
            return $this->responseSuccess($response);
        } else {
            $response = [
                'message' => ['error' => [trans('messages.deleted_faild')]],
            ];
            return $this->responseFaild($response);
        }

    }

//Return all offers of specific order by it's id in offers DB
    public function allOffers($id)
    {

        $offers = OrderOffer::where('order_id', $id)->with('user_data')->get();

        $data = [];
        foreach ($offers as $offer) {

            // $offer = $offer;
            $offerData["id"] = $offer['id'];
            $offerData["order_id"] = $offer['order_id'];
            // $offerData["shipping"] = $offer['shipping']+\App\Models\Setting::find(1)->commission_percent;
            $offerData["shipping"] = $offer['shipping'];
            $offerData["lat"] = $offer['lat'];
            $offerData["lng"] = $offer['lng'];
            $offerData["status"] = $offer['status'];
            $offerData["created_at"] = $offer['created_at'];
            $offerData["user_id"] = $offer['user_id'];
            $offerData["Driver_data"] = new UserResource($offer['user_data']);

            $data[] = $offerData;
        }

        $response = [
            'data' => $data,

        ];

        return $this->responseSuccess($response);
    }
// change order status if the order has reach or in it's way and notfy order owner with it
    public function changeStatus(Request $request)
    {
        $TawseelResponse =""  ;
        $this->validate($request, [
            'order_id' => 'required|numeric|exists:orders,id',
            'price' => 'nullable|numeric',
            'status' => 'required|numeric',
            'image' => 'nullable|file|image|mimes:jpeg,png,gif,jpg|max:1024',

        ]);

        $order = Order::findOrFail($request->order_id);
        // if($order->refrenceCode == null ){
        //     $response = [
        //         'code' => 200,
        //         'message' => ['error' => [trans('messages.updated_faild')]],
        //         'tawseel' => 'عفوا هذا الطلب لم يتم توثيقه في هيئه توصيل',
        //         'data' => $order
        //     ];
        //     return $this->responseFaild($response); 
        // }
        if (isset($request->price)) {
            $order->update(['price' => $request->price]);

        }
        if (isset($request->image)) {
            $path = $this->storeFile($request, [
                'fileUpload' => 'image',
                'folder' => Order::FILE_FOLDER,
                'recordId' => $request->order_id . '_image',
            ]);
            $order->invoice = $path;
            $order->save();
                $this->notificationServ->notifyInvoiceStatus(
                    ['fcm', 'db'],
                    ['order_id' => $order->id]
                ); 
        }

        $order->update(['status' => $request->status]);
       
        if ($request->status == 4) {
            if($order->payment_status == 0){
                $response = [
                    'tawseel' => ' عفوا يجب تاكيد طريق الدفع اولا ',
                    'message' => ['error' => [trans('messages.updated_faild')]],
            
                ];
                return $this->responseFaild($response);
            }
             
        if($order->payment_type == 1 && $order->getpaid > 0 && $order->payment_status == 1){
                if($order->shipper_id != null){
                    $shipper = User::find($order->shipper_id);
                    $shipper->amount =   $shipper->amount + $order->getpaid;
                    $shipper->save();
    
                    $this->notificationServ->notifyChargeWallet(
                        ['fcm', 'db'],
                        ['order_id' =>  $order->id, 'user_id' =>  $shipper->id, 'amount' => $order->getpaid]
                    );
                }
        }
        
            $order->update(['delivery_date' => \Carbon\Carbon::now()]);
           
           
        //excute order  in Tawseel
            if($order->refrenceCode != null ){
                $TawseelResponse = $this->ExecuteOrderInTawseel($request , $order);
            }else{
                 $response = [
                    'tawseel' => 'عفوا هذا الطلب لم يتم توثيقه في هيئه توصيل',
                    'message' => ['error' => [trans('messages.updated_faild')]],
            
                ];
                return $this->responseFaild($response); 
            }
        }

        if ($request->status == 3 || $request->status == 4) {
            $this->notificationServ->notifyOrderStatus(
                ['fcm', 'db'],
                ['order_id' => $request->order_id, 'status' => $request->status]
            );
        }

    $response = [
        'tawseel' => $TawseelResponse,
        'message' => ['sucess' => [trans('messages.updated')]],

    ];
       
        return $this->responseSuccess($response);
    }

//change payment Method by any method [ if client can pay by his wallet if  his wallet has enough money or return error message to concern him]
    public function changePayment(Request $request)
    {
        $this->validate($request, [
            'order_id' => 'required|numeric|exists:orders,id',
            'payment_type' => 'nullable|numeric',
    
        ]);
    
        $order = Order::find($request->order_id);
        $user = User::find($order->user_id);
        $offer = OrderOffer::where(['order_id' => $request->order_id, 'status' => 1])->first();
     
        if(!$order){
            $response = ['message' => trans('messages.added_faild')];
            return $this->responseFaild($response);
        }
        if(!$user){
            $response = ['message' => "trans('messages.added_faild')"];
            return $this->responseFaild($response);
        }
        if($offer){
            $commission = $offer->shipping ;
            $onlyCommission = \App\Models\Setting::find(1)->commission_percent;
        }else{
            $commission = \App\Models\Setting::find(1)->commission_percent;
            $onlyCommission  =\App\Models\Setting::find(1)->commission_percent;
        }
        if(($request->payment_type == 1 || $request->payment_type == 3) && ($order->payment_status == 1)){
            $response = ['message' => ['sucess' => "تم الدفع من قبل"],
                 "data"=>[$order]
             ];
            return $this->responseSuccess($response);
        }
      
        $order->commission = $onlyCommission;
        $order->commission_status = 1;
        $addition = $order->shipping  * (\App\Models\Setting::find(1)->addition_service_cost / 100 );
        $order->addition_service_cost = $addition;
        $order->save();       
        $amount = $order->price + $commission + $addition - $order->discount - $order->getpaid;
        
        if ($request->payment_type == 1) {
            $withHalla    = ceil($amount);
            $user_halla   = $withHalla - $amount ; 
            $order->total = $withHalla;
            $order->payment_type = 1;
            $order->payment_status = 1;
            $order->save();
                  
                    if($order->shipper_id){
                        $data['title'] = 'user_give_halla';
                        $data['amount'] = $user_halla;
                        $data['date'] = \Carbon\Carbon::now();
                        $data['description'] = "decrease_amount";
                        $data['user_id'] = $order->shipper_id;
                        $data['order_code'] = $order->code;
                        Transaction::create($data);

                        $data['title'] = 'user_get_halla';
                        $data['amount'] = $user_halla;
                        $data['date'] = \Carbon\Carbon::now();
                        $data['description'] = "increase_amount";
                        $data['user_id'] = $order->user_id;
                        $data['order_code'] = $order->code;
                        Transaction::create($data);

                        $driver = User::find($order->shipper_id);
                        $appCommission = $onlyCommission + $addition;
                        $driver->amount = $driver->amount - $user_halla - $appCommission;
                        $driver->save();
                        $this->notificationServ->notifyDecreaseWallet(
                            ['fcm', 'db'],
                            ['order_id' =>  $order->id, 'driver_id' =>  $driver->id, 'amount' => $user_halla]
                        );

                        $customer = User::find($order->user_id);
                        $customer->amount = $customer->amount + $user_halla ; 
                        $customer->save();
                        $this->notificationServ->notifyChargeWallet(
                            ['fcm', 'db'],
                            ['order_id' =>  $order->id, 'user_id' =>  $customer->id, 'amount' => $user_halla]
                        );

                    }
        }
        if ($request->payment_type == 2) { // if user want to pay by his wallet
           
            // if ($amount < $user->amount) {
    
                $data['title'] = 'wallent_paid';
                $data['amount'] = $amount;
                $data['date'] = \Carbon\Carbon::now();
                $data['description'] = "decrease_amount";
                $data['user_id'] = $order->user_id;
                $data['order_code'] = $order->code;
                Transaction::create($data);
                $driver_pay = $offer->shipping  ;
                if($user->amount  <= $driver_pay ){
                    $order->getpaid =   $user->amount;
                    if($user->amount > 0){
                        $user->amount = 0;
                    }
                }else{
                    $user->amount = $user->amount - $driver_pay;
                    $order->getpaid = $driver_pay ;
                   
                }
                
                $user->save();
              
                // $order->update(['payment_type' => $request->payment_type,'payment_status' => 1]);
                $order->total = $amount;
                $order->save();
                //Driver

                // if($order->shipper_id){
                //     // $driver_pay = $order->price  + $offer->shipping - $onlyCommission;

                //     $order->save();
                //     $data['title'] = 'Driver_get_paid';
                //     $data['amount'] = $driver_pay;
                //     $data['date'] = \Carbon\Carbon::now();
                //     $data['description'] = "increase_amount";
                //     $data['user_id'] = $order->shipper_id;
                //     $data['order_code'] = $order->code;
                //     Transaction::create($data);
                //     $driver = User::find($order->shipper_id);
                //     $driver->amount = $driver->amount + $driver_pay - $commission;
                //     $driver->save();
                //     $this->notificationServ->notifyChargeWallet(
                //         ['fcm', 'db'],
                //         ['order_id' =>  $order->id, 'user_id' =>  $driver->id, 'amount' => $user_halla]
                //     );
                // }

            
    
        }
        // 8a8294174d0595bb014d05d82e5b01d2
        if ($request->payment_type == 3) { 
            // $hyper = $amount * 0.02 ;
            // $total =  $amount + $hyper  ;
            $order->payment_type = $request->payment_type;
            $order->total = $amount;
            $order->save();
        }
        $this->notificationServ->notifychangePayment(
            ['fcm', 'db'],
            ['order_id' => $request->order_id]
        );
    
        $response = ['message' => ['sucess' => [trans('messages.updated')]],
            "data"=>[$order]
    ];
        return $this->responseSuccess($response);
    }
    
//add Coupon to Order and check if coupon is still valid or not throw [expire_date , number of use]
    public function addCoupon(Request $request)
    {
        $this->validate($request, [
            'order_id' => 'required|numeric|exists:orders,id',
            'coupon' => 'required|exists:coupons,coupon',

        ]);

        $order    = Order::with(['offer'])->findOrFail($request->order_id);
        $coupon   = Coupon::where('coupon', $request->coupon)->first();
        $numOfUse = Order::where('coupon', $request->coupon)->count();
        $is_used  = Order::where(['coupon' => $request->coupon, 'user_id' => $order->user_id])->first();
        if ($coupon) {
            if ($coupon->expire_date > \Carbon\Carbon::now() && $coupon->limit > $numOfUse) {
                if (!$is_used) {
                    if ($shipping = $order['offer']) {
                        // $dicount = $order->commission * $coupon->amount / 100;
                        $dicount = $coupon->amount;

                        $order->update(['coupon' => $coupon->coupon, 'discount' => number_format($dicount,2)]);
                        $response = ['message' => ['sucess' => [trans('messages.added')]]];
                        return $this->responseSuccess($response);
                    }
                } else {
                    $response = ['message' => trans('messages.used')];
                    return $this->responseFaild($response);
                }
            } else {
                $response = ['message' => trans('messages.expired')];
                return $this->responseFaild($response);
            }
        }

        $response = ['message' => trans('messages.added_faild')];
        return $this->responseFaild($response);
    }
public function changePaymentStatus($id){
    $order = Order::find($id);
    $order->payment_status = 1;
    $order->save();

    $response = ['message' => ['sucess' => [trans('messages.updated')]],
                  "data"=>[$order]
                 ];
    return $this->responseSuccess($response);
}
   



public function hyperRequest($amount, $mid, $cust_mail, $cust_name, $cust_add, $brands)
{
   // $amount=number_format($amount,2);
   $amount=str_replace(",","",$amount);
  /* if($brands=="APPLEPAY")
   {
       $url="https://test.oppwa.com/v1/checkouts";
   }
   else{*/
    // $url = "https://oppwa.com/v1/checkouts";
    $url = "https://eu-test.oppwa.com/v1/checkouts";

  // }
    if ($brands == "MADA")
    {
        $entityId = "8ac7a4c981faa8650181fe7436b3054e";
        $au="OGFjN2E0Yzk4MWZhYTg2NTAxODFmZTc0MzcyYjA1NTJ8Z1p4cktBN2hoNg";
    }
    else if($brands=="APPLEPAY")
    {
        $entityId="8ac7a4c981faa8650181fe7436b3054e";
        $au="OGFjN2E0Yzk4MWZhYTg2NTAxODFmZTc0MzcyYjA1NTJ8Z1p4cktBN2hoNg";
    }
    else
    {
        $entityId = "8ac7a4c981faa8650181fe7436b3054e";
        $au="OGFjN2E0Yzk4MWZhYTg2NTAxODFmZTc0MzcyYjA1NTJ8Z1p4cktBN2hoNg";
    }
    $data = "entityId=$entityId" . "&amount=$amount" . "&currency=EUR" . "&merchantTransactionId=$mid" . "&customer.surname=$cust_name" . "&customer.givenName=$cust_name" . "&customer.email=$cust_mail" . "&billing.street1=$cust_add" . "&billing.city=Riyadh" . "&billing.state=sudia" . "&billing.country=SA" . "&billing.postcode=42391" . "&paymentType=DB";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Authorization:Bearer '.$au
    ));
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true); // this should be set to true in production
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $responseData = curl_exec($ch);

    if (curl_errno($ch))
    {
        return curl_error($ch);
    }
    curl_close($ch);
    return json_decode($responseData , true);
}
public function hyperView($checkoutId){
    return 'https://kafoosa.appsjannah.com/api/v1/orders/hyperpayview/'.$checkoutId;

}
public function hyperpayview($checkoutId){
    return view('hyper' , ['checkoutId' => $checkoutId]);
}

public function requeststatus()
{
    $url="https://eu-test.oppwa.com/v1/checkouts/" . $_GET['id'] . "/payment";

   $entityId = "8ac7a4c981faa8650181fe7436b3054e";
   $au="OGFjN2E0Yzk4MWZhYTg2NTAxODFmZTc0MzcyYjA1NTJ8Z1p4cktBN2hoNg";
    $url .= "?entityId=$entityId";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Authorization:Bearer '.$au
    ));
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true); // this should be set to true in production
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $responseData = curl_exec($ch);
    if (curl_errno($ch))
    {
        return curl_error($ch);
    }
    curl_close($ch);
        $responseData =  json_decode( $responseData, true);
        if($responseData['result']['code'] =="200.300.404"){
            $order = Order::find($responseData['merchantTransactionId']);
            $this->notificationServ->notifyErrorPayment(
                ['fcm', 'db'],
                ['order_id' => $order->id]
            );
            return redirect()->back()->with('error','هناك خطأ ما يرجي المحاوله مره اخري');
          
        }else{
            
            $order = Order::find($responseData['merchantTransactionId']);
            $order->payment_status = 1;
            $order->save();
            $offer = OrderOffer::where('order_id', $order->id)->where('status' , 1)->first();
            if($offer){
                if($order->shipper_id){
                    $driver_pay = $order->price  + $offer->shipping - \App\Models\Setting::find(1)->commission_percent ;
                    $data['title'] = 'Driver_get_paid';
                    $data['amount'] = $driver_pay;
                    $data['date'] = \Carbon\Carbon::now();
                    $data['description'] = "increase_amount";
                    $data['user_id'] = $order->shipper_id;
                    $data['order_code'] = $order->code;
                    Transaction::create($data);
                    $driver = User::find($order->shipper_id);
                    $driver->amount = $driver->amount + $driver_pay;
                    $driver->save();
                    $this->notificationServ->notifyChargeWallet(
                        ['fcm', 'db'],
                        ['order_id' => $order->id, 'user_id' =>  $driver->id, 'amount' => $driver_pay]
                    );
                    $this->notificationServ->notifySucessPayment(
                        ['fcm', 'db'],
                        ['order_id' => $order->id]
                    );
                }
                
            }
            return view('sucess');
        }
}
public function paymentError($orderid)
{  
            $order = Order::find($orderid); 
            $this->notificationServ->notifyErrorPayment(
                ['fcm', 'db'],
                ['order_id' => $order->id]
            );

            return view('error');
    
}
public function paymentSucess($orderid , $userAmount=null)
{ 
     
    if(isset($_POST) && $_POST != null){
    $trandata =   $this->PaymentTrait->getResult($_POST['trandata']);
    if(isset($trandata[0]["result"]) && isset($trandata[0]["authRespCode"])  ){
        if($trandata[0]["result"] == "CAPTURED" && $trandata[0]["authRespCode"] == "00"){
            $order = Order::find($orderid);
                if( $order != null){
                    if( $order->payment_status != 1){
    
                    $order->payment_status = 1;
                    $order->payment_type = 3;
                    $order->save();
                    
                    $this->notificationServ->notifySucessPayment(
                        ['fcm', 'db'],
                        ['order_id' => $order->id]
                            );
                    $this->notificationServ->notifySucessPaymentUser(
                        ['fcm', 'db'],
                        ['order_id' => $order->id]
                    );
                }
                
                
                return view('sucess');
            }else{
                return view('error');
            }
        }else{
            return view('error');
        }
    }else{
        return view('error');
    }
    
}
   
      
          
  
    
  
    
}

public function CreateOrder(OrderRequest $request)
    { 
      
         $TawseelResponse = Http::post('https://mobrdemo.elm.sa/api/Order/create', [
            "credential" =>[
             "companyName"=>"kafu",
             "password"=>"XVjx93xxHfM8bKMUPAxasdxBGRo6qzNjEPCgx13Q66oBpluGcinYXRxsk7kQ8o1N"
                ],
             "order"=> [
             "orderNumber"=> $request->orderNumber,
             "authorityId"=> $request->authorityId,
             "deliveryTime"=> $request->delivery_date,
             "regionId"=>$request->regionId,
             "cityId"=>$request->cityId,
             "coordinates"=>  $request->destination_lat,
             "storetName"=> $request->storetName,
             "storeLocation"=> $request->source_lat,
             "categoryId"=>$request->categoryId,
             "orderDate"=>$request->orderDate
            ]
        ])->throw()->json();
   
            if($TawseelResponse['status'] == false){
                      $TawseelResponse['errorCodes'][0] =  $this ->getErrorCode($TawseelResponse['errorCodes'][0]);
             $refrenceCode = null;
       } else{
           $refrenceCode = $TawseelResponse['data']['refrenceCode'];
       }     
   
        //return $request->validated();
         $order = $this->order->store($request->validated(),$refrenceCode);
        if (!$order) {
            
            $response = ['tawseelmessage'=>$TawseelResponse ,
                'errors' => ['Order' => trans('messages.added_faild')]];
            return $this->responseFaild($response);
        }

        // $allDrivers = User::where('type_id' , 3)->where('is_active' , 1)->get() ;
        // $usersCount = $allDrivers->count();
            //   dispatch(new SendOrderNotifToDrivers($allDrivers,$order->id));
    
    
        // send success
        $response = [
            'tawseelmessage'=>$TawseelResponse ,
            'message' => ['sucess' => [trans('messages.added')]],
            'data' => $order->only('id', 'user_id', 'code', 'source_lat','refrenceCode', 'source_lng', 'destination_lng', 'destination_lat', 'discount', 'type', 'payment_type', 'status', 'created_at', 'shipper_id', 'items'),
             
        ];
        
        return $this->responseSuccess($response);
    }
    
    public function testAPi()
    { 
      
         $googleResponse = Http::get('https://api.bigdatacloud.net/data/reverse-geocode-client?latitude=25.343306&longitude=39.563323&localityLanguage=ar')->throw()->json();
            if($googleResponse['principalSubdivision'] == "منطقة المدينة المنورة"){
                $region = "oIcaYzeDfQQ=";
            }
          
                // $TawseelResponse = Http::post('https://mobrdemo.elm.sa/api/Lookup/cities-list', [
                //     "credential"=> [
                //         "companyName"=> "kafu",
                //         "password"=> "XVjx93xxHfM8bKMUPAxasdxBGRo6qzNjEPCgx13Q66oBpluGcinYXRxsk7kQ8o1N"
                //     ],
                //         "regionId"=> $region
                //   ])->throw()->json();
            
                if($googleResponse['locality'] = 'محافظة خيبر'){
                    $city_id = 'sbBoFGUGeuI=';
                }


        return  $city_id;
            }
}
