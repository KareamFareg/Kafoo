<?php $__env->startSection('content'); ?>


<style>
    .invoice-logo {
        /* display: none; */
    }

    @media  print {
        .print-left {
            float: left;
        }

        .print-right {
            float: right;
        }

        .header,
        aside,
        head .site-footer,
        .print-hide,
        .kt-aside__brand,
        .kt-header-mobile,
        .kt-subheader,
        .kt_header,
        .kt-header__topbar,
        title,
        .kt-footer__copyright {
            display: none;
        }



        .content,
        .invoice-logo {
            visibility: visible;
            position: absolute;
            margin: 0px;
            width: 100%;
            padding: 0px;
        }

        @page  {
            size: auto;
            margin-bottom: 5mm;
        }

        #Header,
        #Footer {
            display: none !important;
        }

    }
</style>

<div class="col-xl-12 col-lg-12">

    <!--begin:: Widgets/Sale Reports-->
    <div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid">
        <div class="kt-portlet__head ">
            <div class="kt-portlet__head-label ">
                <h3 class="kt-portlet__head-title">
                    <div class="row print-hide">
                        <a class="btn btn-warning " style="margin: 10px" onclick="print()"><i class="icon-print"></i>
                            طباعة </a>
                        <a class="btn btn-success" style="margin: 10px" id="printPdf"><i class="icon-print"></i> PDF
                        </a>

                        <?php if($data->status == 1 || $data->status == 2): ?>
                        <button style="margin: 10px" type="button" class="btn btn-outline-danger" data-toggle="modal"
                            data-target="#Add"><?php echo e(trans('order.cancel_order')); ?></button>

                        <!--begin:: Edit Modal-->
                        <div class="modal fade" id="Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <!-- form -->
                                <form class="kt_form_1" enctype="multipart/form-data"
                                    action="<?php echo e(route('admin.orders.cancel',['id'=>$data->id ])); ?>" method="post">
                                    <?php echo e(csrf_field()); ?>

                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class=" form-group">
                                                <textarea name="note" required placeholder="<?php echo e(__('order.note')); ?>"
                                                    class="form-control" rows="5"></textarea>

                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal"><?php echo e(__('words.cancel')); ?></button>
                                                <button class=" btn btn-success " type="submit">
                                                    <i class="fa fa-plus"></i><?php echo e(__('words.send')); ?>

                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--end::Modal-->
                        <?php endif; ?>
                    </div>
                </h3>
            </div>
        </div>


        <div class="kt-portlet__body" id="content">
            <table class="table table-striped- table-bordered table-hover table-checkable" id="main_div">
                <tbody>
                    
                    <tr>
                        <td><?php echo e(__('order.info')); ?></td>
                        <td>
                            <ul>
                                <li><?php echo e(__('order.order_id')); ?>&nbsp;:&nbsp;<?php echo e($data->code); ?> </li>
                                <li><?php echo e(__('words.date')); ?>&nbsp;:&nbsp;<?php echo e($data->created_at); ?> </li>
                                <?php if($data->status != 1): ?> <li>
                                    <?php echo e(__('order.accept_date')); ?>&nbsp;:&nbsp;<?php echo e($data->accept_date); ?> </li> <?php endif; ?>
                                <li><?php echo e(__('words.order_status')); ?>&nbsp;:&nbsp;<?php echo e($data->orderStatus()); ?>

                                    <?php if($data->status == 4): ?> <?php echo e($data->delivery_date); ?> <?php endif; ?>
                                    <?php if($data->status == 5): ?> <?php echo e($data->cancel_date); ?> <?php endif; ?>
                                </li>
                                <li><?php echo e(__('words.type')); ?>&nbsp;:&nbsp;<?php echo e($data->type_title()); ?></li>
                                <li><?php echo e(__('order.paytype')); ?>&nbsp;:&nbsp;<?php echo e($data->orderPayment()); ?></li>

                            </ul>



                        </td>
                    </tr>
                    <?php if($data->invoice): ?>
                    <tr>
                        <td><?php echo e(__('order.invoice')); ?></td>
                        <td>
                            <span class="tooltips" data-toggle="modal" data-target="#invoice" style="  cursor: pointer">

                                <img src="<?php echo e(asset('storage/app/' . $data['invoice'])); ?>" style="max-height : 100px"
                                    class="  img-responsive img-thumbnail img-rounded">
                            </span>

                            <div class="modal  fade" id="invoice" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog modal-dialog-centered ">
                                    <div class="modal-content">

                                        <div class="modal-content">
                                            <div class="modal-body" style=" text-align: center;">
                                                <img style="width : 100% "
                                                    src="<?php echo e(asset('storage/app/' . $data['invoice'])); ?>"
                                                    class="  img-responsive ">
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                    <?php endif; ?>
                    <tr>
                        <td><?php echo e(__('words.address')); ?></td>
                        <td>
                            <div id="map_from_to" style="height: 300px ;width:100% " class="map"
                                lat="<?php echo e($data->source_lat); ?>" lng="<?php echo e($data->source_lng); ?>"
                                lat2="<?php echo e($data->destination_lat); ?>" lng2="<?php echo e($data->destination_lng); ?>"></div>
                        </td>
                    </tr>

                    <tr>
                        <td><?php echo e(__('order.shipping')); ?></td>
                        <td><?php echo e(optional($data->offer)->shipping - $data->commission); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo e(__('order.discount')); ?></td>
                        <td><?php echo e(floatval($data->discount)); ?> &nbsp;&nbsp;/&nbsp;&nbsp;
                            <?php echo e(__('order.coupon') ." : ". $data->coupon); ?> </td>
                    </tr> <tr>
                        <td><?php echo e(__('commission.commissions')); ?></td>
                        <td><?php echo e(floatval($data->commission)); ?> </td>
                    </tr>
                    <tr>
                        <td><?php echo e(__('order.addition_service_cost')); ?></td>
                        <td><?php echo e($data->addition_service_cost); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo e(__('order.total_first')); ?></td>
                        <td><?php echo e($data->price); ?></td>
                    </tr>

                    <!-- <tr>
                        <td><?php echo e(__('order.total')); ?></td>
                        <td><?php echo e($data->price + optional($data->offer)->shipping - floatval($data->discount)+floatval($data->commission)); ?></td>
                    </tr> -->

                    <tr>
                        <td><?php echo e(__('order.total')); ?></td>
                        <td><?php echo e($data->price + $data->shipping + $data->addition_service_cost -  floatval($data->discount)); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo e(__('order.user')); ?></td>
                        <td>

                            <ul>
                                <li>
                                    <?php if($data->user_data): ?>
                                    <a
                                        href="<?php echo e(route('admin.clients.edit', [ 'id' => optional($data->user_data)->id ] )); ?>">
                                        <?php echo e(optional($data->user_data)->name); ?>

                                    </a>
                                    <?php else: ?>
                                    <?php echo app('translator')->get('words.deleted'); ?>
                                    <?php endif; ?>
                                </li>


                            </ul>


                        </td>

                    </tr>

                    <tr>
                        <td><?php echo e(__('order.shipper')); ?></td>
                        <td>
                            <ul>
                                <li>
                                    <?php if(isset($data->shipper_data)): ?>
                                    <a
                                        href="<?php echo e(route('admin.shippers.edit', [ 'id' => optional($data->shipper_data)->id ] )); ?>">
                                        <?php echo e(optional($data->shipper_data)->name); ?>

                                    </a>
                                    <?php else: ?>
                                    <?php echo app('translator')->get('words.deleted'); ?>
                                    <?php endif; ?>
                                </li>


                            </ul>
                        </td>
                    </tr>

                    <tr>
                        <td><?php echo e(__('order.comment')); ?></td>
                        <td><?php echo e($data->comment); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo e(__('order.note')); ?></td>
                        <td><?php echo e($data->note); ?> </td>
                    </tr>


                    <tr>
                        <td><?php echo e(__('order.title')); ?></td>
                        <td>
                            <table class="table table-striped- table-bordered table-hover table-checkable"
                                id="kt_table_2">
                                <thead>
                                    <tr>
                                        <th><?php echo e(__('words.name')); ?></th>
                                        <th><?php echo e(__('words.image')); ?></th>
                                        <th><?php echo e(__('words.quantity')); ?></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $data->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($item->title); ?></td>

                                        <td><img src="<?php echo e(asset('storage/app/' . $item['image'])); ?>"
                                                style="max-width: 150px;">
                                        </td>
                                        <td><?php echo e($item-> quantity); ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <?php if($data->addition_service == 1 ): ?>
                    <tr>
                        <td><?php echo e(__('order.addition_items')); ?></td>
                        <td>
                            <table class="table table-striped- table-bordered table-hover table-checkable"
                                id="kt_table_2">
                                <thead>
                                    <tr>
                                        <th><?php echo e(__('words.name')); ?></th>
                                        <th><?php echo e(__('words.image')); ?></th>
                                        <th><?php echo e(__('words.quantity')); ?></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $data->addition_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($item->title); ?></td>

                                        <td><img src="<?php echo e(asset('storage/app/' . $item['image'])); ?>"
                                                style="max-width: 150px;">
                                        </td>
                                        <td><?php echo e($item-> quantity); ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <?php endif; ?>


                </tbody>
            </table>

        </div>
    </div>
</div>


<?php $__env->startSection('js_pagelevel'); ?>

 <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.export-invoice','data' => ['url' => ''.e(route('admin.orders.pdf' , [ 'id' =>  $data->id ] )).'']]); ?>
<?php $component->withName('admin.export-invoice'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['url' => ''.e(route('admin.orders.pdf' , [ 'id' =>  $data->id ] )).'']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
 <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.print-content','data' => []]); ?>
<?php $component->withName('admin.print-content'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
 <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.google-map-multi-js','data' => []]); ?>
<?php $component->withName('admin.google-map-multi-js'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
<?php $__env->stopSection(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kafoosaappsjanna/lara/resources/views/admin/orders/show.blade.php ENDPATH**/ ?>