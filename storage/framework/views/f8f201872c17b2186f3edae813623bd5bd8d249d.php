<?php $__env->startSection('css_pagelevel'); ?>
 <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.datatable.header-css','data' => []]); ?>
<?php $component->withName('admin.datatable.header-css'); ?>
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


<?php $__env->startSection('content'); ?>




<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="kt-portlet kt-portlet--mobile">

        <div class="kt-portlet__body">
            <form class="kt_form_1 row" enctype="multipart/form-data"
                action="<?php echo e(route(request()->route()->getName(),['type'=>$status])); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <div class=" form-group col-lg-2">
                    <label for=""><?php echo e(__('commission.shipper')); ?></label>
                    <select class="form-control kt-select2 " id="kt_select2_3" name="shipper">
                        <option value="0"> <?php echo e(__('commission.all_shippers')); ?></option>
                        <?php $__currentLoopData = \App\User::Info()->where('type_id',3)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php if($user->id ==$shipper_id): ?> selected <?php endif; ?> value="<?php echo e($user->id); ?>">
                            <?php echo e($user->name); ?>

                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class=" form-group col-lg-2">
                    <label for=""><?php echo e(__('commission.user')); ?></label>
                    <select class="form-control kt-select2 " id="kt_select2_3" name="user">
                        <option value="0"> <?php echo e(__('commission.all_users')); ?></option>
                        <?php $__currentLoopData = \App\User::Info()->where('type_id',2)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php if($user->id ==$user_id): ?> selected <?php endif; ?> value="<?php echo e($user->id); ?>">
                            <?php echo e($user->name); ?>

                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class=" form-group col-lg-2">
                    <label for=""><?php echo e(__('commission.from')); ?></label>
                    <input class="form-control datepicker"  placeholder="yyyy-mm-dd"  autocomplete="off" value="<?php echo e($from ?? ''); ?>" name="from">
                </div>
                <div class=" form-group col-lg-2">
                    <label for=""><?php echo e(__('commission.to')); ?></label>
                    <input class="form-control datepicker"  placeholder="yyyy-mm-dd"  autocomplete="off" value="<?php echo e($to ?? ''); ?>" name="to">
                </div>
                <div class="form-group col-lg-2">
                    <label for="">&nbsp;</label>
                    <button class="form-control btn btn-success " type="submit">
                        <i class=" flaticon flaticon2-search-1"></i><?php echo e(__('words.search')); ?>

                    </button>
                </div>
                
        </form>
    </div>
</div>
</div>

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

    <div class="kt-portlet kt-portlet--mobile">

        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    <div class="row">
                        <label for=""
                            style="margin: 10px"><?php echo e(__('order.title').' / '. __("order.status_$status")); ?></label>
                        
                    </div>
                </h3>
            </div>
        </div>


        <div class="kt-portlet__body">
            <style>
                .dataTables_wrapper div.dataTables_filter {
                    display: contents;
                }
            </style>
            <div class="table-responsive">

                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable  "
                    id="kt_table_1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th><?php echo e(__('order.client')); ?></th>
                            <?php if($status !=1 ): ?> <th><?php echo e(__('order.shipper')); ?></th><?php endif; ?>

                            <th><?php echo e(__('order.type')); ?></th>

                            <?php if($status !=1 ): ?>
                            <th><?php echo e(__('order.shipping')); ?></th>
                            <th><?php echo e(__('order.total_first')); ?></th>
                            <th><?php echo e(__('order.discount')); ?></th>
                            <th><?php echo e(__('order.total')); ?></th>
                            <?php endif; ?>

                            <th><?php echo e(__('order.created_at')); ?></th>
                            <?php if($status !=1 ): ?><th><?php echo e(__('order.accept_date')); ?></th><?php endif; ?>
                            <?php if($status ==6 || $status ==4 ): ?><th><?php echo e(__('order.delivery_date')); ?></th><?php endif; ?>
                            <?php if($status ==6 || $status ==5 ): ?><th><?php echo e(__('order.cancel_date')); ?></th><?php endif; ?>
                            <?php if($status ==6 || $status ==5 ): ?><th><?php echo e(__('order.canceled_by')); ?></th><?php endif; ?>
                            <?php if($status ==6 || $status ==5 ): ?><th><?php echo e(__('order.note')); ?></th><?php endif; ?>

                            <?php if($status ==6 ): ?><th><?php echo e(__('words.order_status')); ?></th><?php endif; ?>

                            <?php if($status !=1 ): ?><th><?php echo e(__('words.rate')); ?></th><?php endif; ?>

                            <?php if($status !=1 ): ?><th><?php echo e(__('words.chat')); ?></th><?php endif; ?>
                            <th><?php echo e(__('words.order')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $shipping=0;
                        $order=0;
                        $discount=0;
                        $total=0;
                        ?>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr id="<?php echo e($item->id); ?>">
                            <td>
                                <a href="<?php echo e(route('admin.orders.show' , [ 'id' => $item->id ] )); ?>"
                                    class="kt-userpic kt-userpic--circle kt-margin-r-5 kt-margin-t-5"
                                    data-toggle="kt-tooltip" data-placement="right">
                                    <?php echo e($item->code); ?>

                                </a>
                            </td>
                            <td>
                                <?php if($item->user_data): ?>
                                <a href="<?php echo e(route('admin.clients.edit', [ 'id' => optional($item->user_data)->id ] )); ?>">
                                  <?php echo e(optional($item->user_data)->name); ?>

                                </a>
                                <?php else: ?>
                                <?php echo app('translator')->get('words.deleted'); ?>
                                <?php endif; ?>
                
                              </td>
                
                              <?php if($status !=1 ): ?>
                              <td>
                                <?php if(isset($item->shipper_data)): ?>
                                <a href="<?php echo e(route('admin.shippers.edit', [ 'id' => optional($item->shipper_data)->id ] )); ?>">
                                  <?php echo e(optional($item->shipper_data)->name); ?>

                                </a>
                                <?php else: ?>
                                <?php echo app('translator')->get('words.deleted'); ?>
                                <?php endif; ?>
                              </td>
                              <?php endif; ?>


                            <td><?php echo e($item->type_title()); ?></td>

                            <?php if($status !=1 ): ?>
                            <?php
                            $tot = $item->price  + optional($item->offer)->shipping - $item->discount;
                              $addition_serv = $tot * 15 /100 ;
                              $sum = $tot + $addition_serv ;
                             ?>
                            <td><?php echo e(optional($item->offer)->shipping); ?></td>
                            <td><?php echo e($item->price); ?></td>
                            <td><?php echo e($item->discount); ?></td>
                            <td><?php echo e($sum); ?></td>
                            <?php endif; ?>

                            <td><?php echo e($item->created_at); ?></td>
                            <?php if($status !=1 ): ?><td><?php echo e($item->accept_date); ?></td><?php endif; ?>
                            <?php if($status ==6 || $status ==4 ): ?><td><?php echo e($item->delivery_date); ?></td><?php endif; ?>
                            <?php if($status ==6 || $status ==5 ): ?><td><?php echo e($item->cancel_date); ?></td><?php endif; ?>
                            <?php if($status ==6 || $status ==5 ): ?><td>
                                <?php if($item->canceld_by == 1): ?><?php echo e(__('order.user')); ?> <?php elseif($item->canceld_by == 2): ?> <?php echo e(__('order.shipper')); ?> <?php elseif($item->canceld_by == 3): ?> <?php echo e(__('order.management')); ?> <?php endif; ?>

                            </td><?php endif; ?>
                            <?php if($status ==6 || $status ==5 ): ?><td><a class="btn btn-bold btn-label-brand btn-sm"
                                   
                                data-toggle="modal"
                        data-target="#canceled_details_<?php echo e($item->id); ?>"><?php echo e(__('words.details')); ?></a>
                        
                        <div class="modal fade" id="canceled_details_<?php echo e($item->id); ?>" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <!-- <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5> -->
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    </button>
                                </div>
                                <div class="modal-body" >
                                    <?php echo e($item->note); ?>

                                </div>
                            </div>
                        </div>
                    </div></td><?php endif; ?>
                            <?php if($status ==6 ): ?><td><?php echo e($item->orderStatus()); ?></td><?php endif; ?>


                            <?php if($status !=1 ): ?> <td>
                                <a class="btn btn-bold btn-label-brand btn-sm"
                                    data-href="<?php echo e(route('admin.orders.rate' , [ 'id' => $item->id ] )); ?>"
                                    onclick="ajaxlink(event,this,'rate_details','err_rate_details','');"
                                    data-toggle="modal"
                                    data-target="#modal_rate_details"><?php echo e(__('words.details')); ?></a>
                            </td><?php endif; ?>
                            <?php if($status !=1 ): ?>
                            <td>
                                 <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.buttons.but_link','data' => ['link' => ''.e(route('admin.chat.order' , [ 'id' => $item->id ] )).'','title' => ''.e(__('words.preview')).'']]); ?>
<?php $component->withName('buttons.but_link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['link' => ''.e(route('admin.chat.order' , [ 'id' => $item->id ] )).'','title' => ''.e(__('words.preview')).'']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                            </td>
                            <?php endif; ?>
                            <td>
                                 <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.buttons.but_link','data' => ['link' => ''.e(route('admin.orders.show' , [ 'id' => $item->id ] )).'','title' => ''.e(__('words.details')).'']]); ?>
<?php $component->withName('buttons.but_link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['link' => ''.e(route('admin.orders.show' , [ 'id' => $item->id ] )).'','title' => ''.e(__('words.details')).'']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                            </td>
                        </tr>
                        <?php
                        $shipping+=optional($item->offer)->shipping ;
                        $order+= $item->price;
                        $discount+=$item->discount ;
                        $total+=$item->price + optional($item->offer)->shipping - $item->discount;
                        ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>

                    <tfoot>
                        <th>الاجمالى</th>
                        <th></th>
                        <?php if($status !=1 ): ?> <th></th><?php endif; ?>
                        <th></th>
                        <?php if($status !=1 ): ?>
                        <th><?php echo e($shipping); ?></th>
                        <th><?php echo e($order); ?></th>
                        <th><?php echo e($discount); ?></th>
                        <th><?php echo e($total); ?></th>
                        <?php endif; ?>
                        <th></th>
                        <?php if($status !=1 ): ?><th></th><?php endif; ?>
                        <?php if($status ==6 || $status ==4 ): ?><th></th><?php endif; ?>
                        <?php if($status ==6 || $status ==5 ): ?><th></th><?php endif; ?>
                        <?php if($status ==6 || $status ==5 ): ?><th></th><?php endif; ?>
                        <?php if($status ==6 ): ?><th></th><?php endif; ?>
                        <?php if($status !=1 ): ?><th></th><?php endif; ?>
                        <?php if($status !=1 ): ?><th></th><?php endif; ?>
                        <th></th>
                    </tfoot>
                </table>

                <div class="modal fade" id="modal_rate_details" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <!-- <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5> -->
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-body" id="rate_details">

                            </div>
                        </div>
                    </div>
                </div>
                <div id="err_rate_details"></div>

                <!--end: Datatable -->
            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>




<?php $__env->startSection('js_pagelevel'); ?>
 <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.datatable.footer-js','data' => []]); ?>
<?php $component->withName('admin.datatable.footer-js'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

<script>
    function submitForm(me)
{
  $(me).closest("form").submit();
}

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kafoosaappsjanna/lara/resources/views/admin/orders/index.blade.php ENDPATH**/ ?>