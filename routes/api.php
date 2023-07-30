<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Traits\PaymentTrait;

//Route::post('/testGetApiName','Api\TestController@testGetApiName')->name('Test Route Name')->middleware(['set.local.api','PreventBadWords']);

Route::group([
    'namespace' => 'Api',
    'middleware' => ['set.local.api'],
    'prefix' => 'v1',
], function ($router) {
    Route::post('/garhi/test/',[ PaymentTrait::class , 'getPaymentId']);
    Route::post('/garhi/getresult/',[ PaymentTrait::class , 'getResult']);
    Route::post('/success/{orderid}/{userAmount?}','OrderController@paymentSucess');
    Route::post('/error/{orderid}','OrderController@paymentError');

    Route::get('testApi', 'OrderController@testAPi');
        Route::get('/payment/hyperpay',function(){
            return view('hyper');
        });
        Route::get('cron_job', function () {
            $exitCode = Artisan::call('schedule:run');
            return 'schedule:run';
        });
        Route::get('queue_work', function () {
            $exitCode = Artisan::call('queue:work');
            return 'queue:work';
        });
        Route::post('/orders/create', 'OrderController@creation');
        Route::get('/orders/hyperpayview/{checkout_id}' , 'OrderController@hyperpayview');
        // Route::get('/hyper/sucesspage/{id}/{resource}' , 'OrderController@hypersucess');
        Route::get('/hyper/getstatus' , 'OrderController@requeststatus');

    // Route::get('live_search/{crit}', 'SearchController@liveSearch');
    //Route::post('search', 'SearchController@search');
     Route::get('getErrorMessage/{code}','\App\Traits\GeneralTrait@getErrorCode');
          Route::get('testapi','OrderController@testApi');

     Route::post('notifyChatFromAdmin/{id}', 'NotificationController@notifyChatFromAdmin');
     Route::get('getAdminNewNotifications/{id}', 'NotificationController@getAdminNewNotifications');


    Route::post('/register', 'UserController@register');
    Route::post('/login', 'UserController@login');
    Route::post('/logout', 'UserController@logout');
    Route::post('/forgot_password', 'UserController@forgotPassworod');
    Route::post('/change_password', 'UserController@changePassworod');
    Route::post('/password/change', 'UserController@change_password');
    Route::post('/resend_code', 'VerificationController@createVerificationCode')->middleware('throttle:4,1');
    Route::post('check_verification_code', 'VerificationController@checkVerificationCode');
    Route::post('/check_verification_code_password', 'VerificationController@checkVerificationCodePassword');
    Route::post('/check_user', 'UserController@check_user');


    Route::get('contactus_types', 'ContactUsController@getContactUsTypes'); // all
    Route::post('contactus', 'ContactUsController@store'); // all
    Route::get('settings/all', 'SettingController@index'); // secure property ???????
    Route::get('settings/{property}', 'SettingController@show'); // secure property ???????
    Route::get('how_to_use/{type}', 'SettingController@how_to_use'); // secure property ???????
    Route::get('faqs', 'FaqController@index');
    Route::get('store_types', 'CategoryController@store_types');

    Route::get('areas/{id}', 'SettingController@areas');
    Route::get('slider/{id}', 'SettingController@slider');
    Route::get('bank_accounts', 'SettingController@bank_accounts');

    Route::group([
        'prefix' => 'category',
    ], function ($router) {
        Route::get('/all', 'CategoryController@index');
        Route::get('/chlids/{id}', 'CategoryController@showWithChilds');
        Route::get('/items/all/{id}', 'CategoryController@allItems');
        Route::get('/items/child/{id}', 'CategoryController@childItems');

    });

    Route::group([
        'prefix' => 'weekly_offers',
    ], function ($router) {
        Route::get('/all', 'OffersController@index');
        Route::get('/details/{id}', 'OffersController@details');
        Route::get('/details_by_category/{id}/{category_id}', 'OffersController@details_by_category');

    });


    Route::middleware('auth:api')->group(function () {
        Route::get('/users', 'UserController@show'); // where id []
        Route::DELETE('items/{id}/delete_file/{file_id}', 'ItemController@destroyFile')->name('front.items.destroy_file')->where(['id', '[0-9]+', 'file_id', '[0-9]+']);



        
    Route::group([
        'prefix' => 'orders',
    ], function ($router) {
        
        Route::post('/submit', 'OrderController@submit');
        Route::post('/create', 'OrderController@CreateOrder');
        Route::post('/reorder', 'OrderController@reorder');
        Route::post('/cancel', 'OrderController@cancel');
        Route::get('/details/{id}/{user_id?}', 'OrderController@details');
        Route::post('/filter', 'OrderController@filter');
        Route::post('/change_status', 'OrderController@changeStatus');
        Route::post('/changePayment', 'OrderController@changePayment');
        Route::post('/add_coupon', 'OrderController@addCoupon');
        Route::post('/delete_offer', 'OrderController@delete_offer');
        Route::post('/charge_wallet', 'OrderController@charge_wallet');
        Route::get('/payment/status/{id}','OrderController@changePaymentStatus');

               
        Route::get('hyper/test/request/{amount}/{mid}/{cust_mail}/{cust_name}/{cust_add}/{brands}/','OrderController@hyperRequest');
        // Route::get('/hyperpayview/{checkout_id}' , 'OrderController@hyperpayview');
        Route::get('hyper/getViewLink/{checkout_id}' , 'OrderController@hyperView');
        Route::group([
            'prefix' => 'offers',
        ], function ($router) {
            // Route::post('/submit', 'OrderController@createOffer');
            Route::post('/accept', 'OrderController@acceptOffer');
            Route::post('/deserve_more', 'OrderController@deserve_more');
            Route::get('/{id}', 'OrderController@allOffers');
            Route::post('/create', 'OrderController@submitOffer');
            // Route::post('/submit', 'OrderController@submitOffer');
        });
    });

    Route::group([
        'prefix' => 'places',
    ], function ($router) {

        Route::post('/add', 'PlacesController@add');
        Route::put('/edit', 'PlacesController@edit');
        Route::get('/all/{id}', 'PlacesController@all');
        Route::delete('/delete', 'PlacesController@delete');

    });

    Route::group([
        'prefix' => 'users',
    ], function ($router) {
        // Route::get('{id}', 'UserController@show')->name('user.show')->where('id', '[0-9]+');
        Route::get('{id}/profile', 'UserController@edit')->where('id', '[0-9]+');
        Route::post('{id}', 'UserController@update')->where('id', '[0-9]+');

        Route::post('{id}/image', 'UserController@updateImage')->where('id', '[0-9]+');
        Route::post('{id}/fcm', 'UserController@updateFcm')->where('id', '[0-9]+'); // all
        Route::get('{id}/notifications', 'NotificationController@getNotificationByUserId')->where('id', '[0-9]+');
        Route::post('notifications/send', 'NotificationController@send_notification')->where('id', '[0-9]+');
        Route::post('notifications/send/orders', 'NotificationController@send_notification_orders')->where('id', '[0-9]+');
        Route::post('changeStatus', 'UserController@changeUserStatus'); //change validaty of user

        Route::post('/send/DriverNotfication/', 'NotificationController@send_order_notification');

    });

    Route::get('shipper/amount/{id}', 'UserController@shipperAmount');
    Route::get('client/amount/{id}', 'UserController@clientAmount');
    Route::post('client/add_balance', 'UserController@add_balance');
    Route::post('update_lang', 'UserController@update_lang');

    Route::post('rate', 'RateController@store');
    Route::post('chat', 'NotificationController@chat');
    Route::post('adminChat', 'NotificationController@adminChat');

    Route::post('transaction/submit', 'CommissionController@store');

    Route::PUT('notifications/{id}/readed', 'NotificationController@updateReadAt')->where('id', '[0-9]+');
    Route::PUT('notifications/readed/all/{id}', 'NotificationController@updateReadAllAt')->where('id', '[0-9]+');

    Route::get('notifications/get/unreaded/{id}/', 'NotificationController@getUnreadNotificationByUserId')->where('id', '[0-9]+');
    Route::get('notifications/get/unreaded/count/{id}/', 'NotificationController@getUnreadNotificationCountByUserId')->where('id', '[0-9]+');
    });
  
    
});




