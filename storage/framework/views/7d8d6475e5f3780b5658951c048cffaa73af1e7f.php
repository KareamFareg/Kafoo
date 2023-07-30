
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
            <form class="kt_form_1 row" enctype="multipart/form-data" action="<?php echo e(route('admin.commission.requests')); ?>"
                method="post">
                <?php echo e(csrf_field()); ?>

                <div class=" form-group col-lg-3">
                    <label for=""><?php echo e(__('commission.shipper')); ?></label>
                    <select class="form-control kt-select2 " id="kt_select2_3" name="shipper">
                        <option value="0"> <?php echo e(__('commission.all_shippers')); ?></option>
                        <?php $__currentLoopData = \App\User::Info()->where('type_id',3)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php if($user->id ==$shipper): ?> selected <?php endif; ?> value="<?php echo e($user->id); ?>">
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
                        <th><?php echo e(__('commission.name')); ?></th>
                        <th><?php echo e(__('bank_account.bank_name')); ?></th>
                        <th><?php echo e(__('commission.amount')); ?></th>
                        <th><?php echo e(__('commission.date')); ?></th>
                        <th><?php echo e(__('commission.note')); ?></th>
                        <th><?php echo e(__('commission.image')); ?></th>
                        <th><?php echo e(__('words.control')); ?></th>



                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $commissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($commission->id); ?></td>
                        <td><?php echo e(optional(\App\User::find($commission->user_id))->name); ?></td>
                        <td><?php echo e($commission->anme); ?></td>
                        <td><?php echo e($commission->bank_name); ?></td>
                        <td><?php echo e($commission->amount); ?> ريال  </td>
                        <td><?php echo e($commission->date); ?></td>
                        <td><?php echo e($commission->note); ?></td>
                        <td>
                           

                        <span class="tooltips" data-toggle="modal" data-target="#commission<?php echo e($commission->id); ?>"
                                style="  cursor: pointer">

                                <img src="<?php echo e($commission->image ? asset('storage/app/' . $commission->image) : $emptyImage); ?>" style="max-height : 100px"
                                    class="  img-responsive img-thumbnail img-rounded">
                            </span>

                            <div class="modal  fade" id="commission<?php echo e($commission->id); ?>" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog modal-dialog-centered ">
                                    <div class="modal-content">

                                        <div class="modal-content">
                                            <div class="modal-body" style=" text-align: center;">
                                                <img style="width : 100% "
                                                    src="<?php echo e($commission->image ? asset('storage/app/' . $commission->image) : $emptyImage); ?>"
                                                    class="  img-responsive ">
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>

                        </td>
                        <td>
                            <?php if($commission->status ==0): ?>
                            <button type="button" class="btn btn-outline-success" data-toggle="modal"
                                data-target="#AcceptModal-<?php echo e($commission->id); ?>"><?php echo e(trans('commission.accept')); ?></button>
                            <button type="button" class="btn btn-outline-danger" data-toggle="modal"
                                data-target="#CanceltModal-<?php echo e($commission->id); ?>"><?php echo e(trans('commission.cancel')); ?></button>
                            <!--begin:: Edit Modal-->
                            <div class="modal fade" id="AcceptModal-<?php echo e($commission->id); ?>" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">

                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h4><?php echo e(__('commission.accept_message')); ?></h4>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal"><?php echo e(__('words.cancel')); ?></button>
                                            <a href="<?php echo e(route('admin.commission.accept',['id'=>$commission->id])); ?>" class=" btn btn-success ">
                                                <?php echo e(__('commission.accept')); ?>

                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Modal-->
                            <!--begin:: Edit Modal-->
                            <div class="modal fade" id="CanceltModal-<?php echo e($commission->id); ?>" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">

                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h4><?php echo e(__('commission.cancel_message')); ?></h4>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal"><?php echo e(__('words.cancel')); ?></button>
                                            <a href="<?php echo e(route('admin.commission.cancel',['id'=>$commission->id])); ?>" class=" btn btn-danger ">
                                                <?php echo e(__('commission.cancel')); ?>

                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Modal-->
                            <?php else: ?>
                            <?php if($commission->status ==1): ?>
                            <label class=" btn btn-success "> <?php echo e(__('commission.accepted')); ?></label>
                            <?php else: ?>
                            <label class=" btn btn-danger "> <?php echo e(__('commission.canceled')); ?></label>

                            <?php endif; ?>
                            <?php endif; ?>

                        </td>


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
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kafoosaappsjanna/lara/resources/views/admin/commissions/requests.blade.php ENDPATH**/ ?>