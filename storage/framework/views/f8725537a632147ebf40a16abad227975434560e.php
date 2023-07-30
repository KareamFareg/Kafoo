
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
            <form class="kt_form_1 row" enctype="multipart/form-data"
                action="<?php echo e(route('admin.clients.charge_wallet')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>" id="">
                <div class=" form-group col-lg-3">
                    <label for=""><?php echo e(__('words.note')); ?></label>
                    <textarea required name="message" class="form-control" rows="3"></textarea>
                </div>
                <div class=" form-group col-lg-3">
                    <label for=""><?php echo e(__('words.amount')); ?></label>
                    <input required class="form-control" type="number" min="0" value="0" name="amount">
                </div>


                <div class="form-group col-lg-1">
                    <label for="">&nbsp;</label>
                    <button class="form-control btn btn-success " type="submit">
                        <i class=" flaticon flaticon2-plus"></i><?php echo e(__('words.add')); ?>

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
           <?php echo app('translator')->get('words.wallet_transactions'); ?>
            </div>
        </div>

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
                        <th><?php echo app('translator')->get('words.title'); ?></th>
                        <th><?php echo app('translator')->get('words.description'); ?></th>
                        <th><?php echo app('translator')->get('words.amount'); ?></th>
                        <th><?php echo app('translator')->get('words.date'); ?></th>



                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $wallet_transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($transaction->id); ?></td>
                        <td><?php echo e(__('messages.' . $transaction->title)); ?></td>
                        <td><?php echo e(__('messages.' . $transaction->description, ['amount' => $transaction->amount, 'order' => $transaction->order_code,'user_name'=>$transaction->user_name,'message'=>$transaction->message])); ?>

                        </td>
                        <td><?php echo e($transaction->amount); ?></td>
                        <td><?php echo e($transaction->created_at->format('Y-m-d | H:i a')); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

            <!--end: Datatable -->
        </div>
    </div>
</div>


<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
           <?php echo app('translator')->get('words.online_transactions'); ?>
            </div>
        </div>

        <div class="kt-portlet__body">
            <style>
                .dataTables_wrapper div.dataTables_filter {
                    display: contents;
                }
            </style>

            <!--begin: Datatable -->
            <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_2">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th><?php echo app('translator')->get('words.title'); ?></th>
                        <th><?php echo app('translator')->get('words.description'); ?></th>
                        <th><?php echo app('translator')->get('words.amount'); ?></th>
                        <th><?php echo app('translator')->get('words.date'); ?></th>



                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $online_transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($transaction->id); ?></td>
                        <td><?php echo e(__('messages.' . $transaction->title)); ?></td>
                        <td><?php echo e(__('messages.' . $transaction->description, ['amount' => $transaction->amount, 'order' => $transaction->order_code,'user_name'=>$transaction->user_name,'message'=>$transaction->message])); ?>

                        </td>
                        <td><?php echo e($transaction->amount); ?></td>
                        <td><?php echo e($transaction->created_at->format('Y-m-d | H:i a')); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
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
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kafoosaappsjanna/lara/resources/views/admin/users/wallet.blade.php ENDPATH**/ ?>