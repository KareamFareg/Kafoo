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

<style>
    .dataTables_wrapper div.dataTables_filter {
        display: contents;
    }
</style>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>


<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="kt-portlet kt-portlet--mobile">

        <div class="kt-portlet__body">
            <form class="kt_form_1 row" enctype="multipart/form-data" action="<?php echo e(route('admin.commission.paid')); ?>"
                method="post">
                <?php echo e(csrf_field()); ?>

                <div class=" form-group col-lg-3">
                    <label for=""><?php echo e(__('commission.shipper')); ?></label>
                    <select class="form-control kt-select2 " id="kt_select2_3" name="shipper">
                        <option value="0"> <?php echo e(__('commission.all_shippers')); ?></option>
                        <?php $__currentLoopData = \App\User::Info()->where('type_id',3)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php if($user->id == $shipper): ?> selected <?php endif; ?>  value="<?php echo e($user->id); ?>">
                            <?php echo e($user->name); ?>

                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select> 
                </div>
                <div class=" form-group col-lg-3">
                    <label for=""><?php echo e(__('commission.from')); ?></label>
                    <input class="form-control datepicker"  placeholder="yyyy-mm-dd"  autocomplete="off" value="<?php echo e($from ?? ''); ?>" name="from">
                </div>
                <div class=" form-group col-lg-3">
                    <label for=""><?php echo e(__('commission.to')); ?></label>
                    <input class="form-control datepicker"  placeholder="yyyy-mm-dd"  autocomplete="off" value="<?php echo e($to ?? ''); ?>" name="to">
                </div>
                <div class="form-group col-lg-1">
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

        <div class="kt-portlet__body">
            <style>
                .dataTables_wrapper div.dataTables_filter {
                    display: contents;
                }
            </style>

            <!--begin: Datatable -->
            <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th><?php echo e(__('commission.shipper')); ?></th>
                        <th><?php echo e(__('commission.orders_price')); ?></th>
                        <th><?php echo e(__('commission.shipping_price')); ?></th>
                        
                        <th><?php echo e(__('commission.commissions')); ?></th>
                        <th><?php echo e(__('commission.discounts')); ?></th>
                        <th><?php echo e(__('commission.cash')); ?></th>
                        <th><?php echo e(__('commission.walet')); ?></th>
                        <th><?php echo e(__('commission.online')); ?></th>
                        <th><?php echo e(__('commission.charge_wallet')); ?></th>

                        <th><?php echo e(__('commission.deserved_amount')); ?></th>


                    </tr>
                </thead>
                <tbody>
                    <?php
                    $totalOrderPrice =0;
                    $totalShippingPrice =0;
                    $totalCommission =0;
                    $totalDiscount =0;
                    $totalCash =0;
                    $totalWalet =0;
                    $totalOnline =0;
                    $totalcharge_wallet =0;

                    $totalDesevedMore =0;
                    ?>
                    <?php $__currentLoopData = $shippers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shipper): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($shipper->id); ?></td>
                        <td><?php echo e($shipper->name); ?></td>
                        <td><?php echo e($shipper->orders_price($ordersIds, 1)); ?></td>
                        <td><?php echo e($shipper->shipping_price($ordersIds, 1)); ?></td>
                        
                        <td><?php echo e($shipper->commission($ordersIds, 1)); ?> ريال </td>
                        <td><?php echo e($shipper->discount($ordersIds, 1)); ?> ريال </td>
                        <td><?php echo e($shipper->payment($ordersIds,1, 1)); ?> ريال </td>
                        <td><?php echo e($shipper->payment($ordersIds,2, 1)); ?> ريال </td>
                        <td><?php echo e($shipper->payment($ordersIds,3, 1)); ?> ريال </td>
                        <td><?php echo e($shipper->charge_wallet($ordersIds, 0)); ?> ريال  </td>

                        <td><?php echo e($shipper->deserved_amount($ordersIds, 1)); ?> ريال </td>
                    </tr>
                    <?php
                    $totalOrderPrice += $shipper->orders_price($ordersIds, 1);
                    $totalShippingPrice += $shipper->shipping_price($ordersIds, 1);
                    $totalCommission += $shipper->commission($ordersIds, 1);
                    $totalDiscount += $shipper->discount($ordersIds, 1);
                    $totalCash += $shipper->payment($ordersIds,1, 1);
                    $totalWalet += $shipper->payment($ordersIds,2, 1);
                    $totalOnline += $shipper->payment($ordersIds,3, 1);
                    $totalcharge_wallet += $shipper->charge_wallet($ordersIds, 0);

                    $totalDesevedMore += $shipper->deserved_amount($ordersIds, 1);
                    ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot style="font-weight: 600;">
                    <th>الاجمالى</th>
                    <th></th>
                    <th><?php echo e($totalOrderPrice); ?></th>
                    <th><?php echo e($totalShippingPrice); ?></th>
                    <th><?php echo e($totalCommission); ?></th>
                    <th><?php echo e($totalDiscount); ?></th>
                    <th><?php echo e($totalCash); ?></th>
                    <th><?php echo e($totalWalet); ?></th>
                    <th><?php echo e($totalOnline); ?></th>
                    <th><?php echo e($totalcharge_wallet); ?></th>

                    <th><?php echo e($totalDesevedMore); ?></th>

                </tfoot>
            </table>

            <!--end: Datatable -->
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



<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kafoosaappsjanna/lara/resources/views/admin/commissions/paid.blade.php ENDPATH**/ ?>