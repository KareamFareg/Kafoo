





<?php $__env->startSection('content'); ?>




<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="kt-portlet kt-portlet--mobile">

        <div class="kt-portlet__body">
            <form class="kt_form_1 row" enctype="multipart/form-data" action="<?php echo e(route('admin.coupons.index')); ?>"
                method="post">
                <?php echo e(csrf_field()); ?>

                
                <div class=" form-group col-lg-3">
                    <label for=""><?php echo e(__('commission.from')); ?></label>
                    <input class="form-control datepicker" type="text" autocomplete="off" value="<?php echo e($from ?? ''); ?>" name="from">
                </div>
                <div class=" form-group col-lg-3">
                    <label for=""><?php echo e(__('commission.to')); ?></label>
                    <input class="form-control datepicker" autocomplete="off" type="text" value="<?php echo e($to ?? ''); ?>" name="to">
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
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    <div class="row">
                        <button style="margin: 10px" type="button" class="btn btn-outline-success" data-toggle="modal"
                            data-target="#Add"><?php echo e(trans('words.add')); ?></button>
                        <!--begin:: Edit Modal-->
                        <div class="modal fade" id="Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <!-- form -->
                                <form class="kt_form_1" enctype="multipart/form-data"
                                    action="<?php echo e(route('admin.coupons.create')); ?>" method="post">
                                    <?php echo e(csrf_field()); ?>

                                    <div class="modal-content">

                                        <div class="modal-body">
                                            <div class=" form-group">
                                                <label for=""><?php echo e(__('coupon.title')); ?></label>
                                                <input class="form-control" type="text" required
                                                placeholder="<?php echo e(__('coupon.title')); ?>" name="title">
                                            </div>
                                             <div class=" form-group">
                                                 
                                                 <label> <?php echo e(__('coupon.auto_generate_text')); ?></label>
                                                <input class="form-control" type="text" 
                                                placeholder="<?php echo e(__('coupon.coupon')); ?>" name="coupon">
                                            </div>
                                            <div class=" form-group">
                                                <label for=""><?php echo e(__('coupon.amount')); ?></label>
                                               <input class="form-control" type="number" min="0"  required
                                               placeholder="<?php echo e(__('coupon.amount')); ?>" name="amount">
                                           </div>
                                           <div class=" form-group">
                                               <label for=""><?php echo e(__('coupon.limit')); ?></label>
                                               <input class="form-control" type="number" min="0"  required
                                               placeholder="<?php echo e(__('coupon.limit')); ?>" name="limit">
                                           </div>
                                            <div class=" form-group">
                                                <label for=""><?php echo e(__('coupon.expire_date')); ?></label>
                                                <input class="form-control datepicker" type="text" autocomplete="off" required   placeholder="yyyy-mm-dd" 
                                                placeholder="<?php echo e(__('coupon.expire_date')); ?>" name="expire_date">
                                            </div> 
                                            
                                         

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal"><?php echo e(__('words.cancel')); ?></button>
                                                <button class=" btn btn-success " type="submit">
                                                    <i class="fa fa-plus"></i><?php echo e(__('words.add')); ?>

                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--end::Modal-->

                      
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

            <!--begin: Datatable -->
            <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th><?php echo e(__('coupon.title')); ?></th>
                        <th><?php echo e(__('coupon.coupon')); ?></th>
                        <th><?php echo e(__('coupon.amount')); ?></th>
                        <th><?php echo e(__('coupon.limit')); ?></th>
                        <th><?php echo e(__('coupon.used')); ?></th>
                        <th><?php echo e(__('coupon.expire_date')); ?></th>
                        <th><?php echo e(__('coupon.create_date')); ?></th>
                        <th><?php echo e(__('words.control')); ?></th>


                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($item->id); ?></td>
                        <td><?php echo e($item->title); ?></td>
                        <td><?php echo e($item->coupon); ?></td>
                        <td><?php echo e($item->amount); ?></td>
                        <td><?php echo e($item->limit); ?></td>
                        <td><a class="btn btn-outline-warning" href="<?php echo e(route('admin.coupons.users',['coupon'=>$item->coupon])); ?>"><i class="fa fa-eye "></i> <?php echo e(\App\Models\Order::where('coupon',$item->coupon)->count()); ?></a></td>
                        <td><?php echo e($item->expire_date); ?></td>
                        <td><?php echo e($item->created_at); ?></td>
                        <td>
                            <button type="button" class="btn btn-outline-success" data-toggle="modal"
                                data-target="#EditModal-<?php echo e($item->id); ?>"><?php echo e(trans('words.edit')); ?></button>
                            <!--begin:: Edit Modal-->
                            <div class="modal fade" id="EditModal-<?php echo e($item->id); ?>" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <!-- form -->
                                    <form class="kt_form_1" enctype="multipart/form-data"
                                        action="<?php echo e(route('admin.coupons.update', ['id' => $item->id])); ?>" method="post">
                                        <?php echo e(csrf_field()); ?>

                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"><?php echo e($item->title); ?></h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class=" form-group">
                                                    <label for=""><?php echo e(__('coupon.title')); ?></label>
                                                    <input class="form-control "  required type="text"    placeholder="<?php echo e(__('coupon.title')); ?>" value="<?php echo e($item->title); ?>" name="title">
                                                </div>
                                                <div class=" form-group">
                                                    
                                                    <label> <?php echo e(__('coupon.auto_generate_text')); ?></label>
                                                    <input class="form-control "   type="text"   placeholder="<?php echo e(__('coupon.coupon')); ?>"  value="<?php echo e($item->coupon); ?>" name="coupon">
                                                </div>
                                                <div class=" form-group">
                                                  <label for="">  <?php echo e(__('coupon.amount')); ?> </label>
                                                    <input class="form-control" type="number" min="0" required
                                                    placeholder="<?php echo e(__('coupon.amount')); ?>"  value="<?php echo e($item->amount); ?>" name="amount">
                                                </div>
                                                <div class=" form-group">
                                                    <label for=""><?php echo e(__('coupon.limit')); ?></label>
                                                    <input class="form-control" type="number" min="0" required
                                                    placeholder="<?php echo e(__('coupon.limit')); ?>"  value="<?php echo e($item->limit); ?>" name="limit">
                                                </div>
                                                <div class=" form-group">
                                                    <label for=""><?php echo e(__('coupon.expire_date')); ?></label>
                                                    <input class="form-control datepicker"  placeholder="yyyy-mm-dd"  autocomplete="off"
                                                    required type="text"   placeholder="<?php echo e(__('coupon.expire_date')); ?>"  value="<?php echo e($item->expire_date); ?>" name="expire_date">
                                                </div>
                                       
                                                
                                                
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal"><?php echo e(__('words.cancel')); ?></button>
                                                <button class=" btn btn-success " type="submit">
                                                    <i class="fa fa-plus"></i><?php echo e(__('words.edit')); ?>

                                                </button>
                                            </div>
                                        </div>
                                </div>
                                </form>
                            </div>
                            <!--end::Modal-->
                             <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.buttons.but_delete_one','data' => ['link' => ''.e(route('admin.coupons.delete',['id'=>$item->id])).'']]); ?>
<?php $component->withName('buttons.but_delete_one'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['link' => ''.e(route('admin.coupons.delete',['id'=>$item->id])).'']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
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
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kafoosaappsjanna/lara/resources/views/admin/coupons/index.blade.php ENDPATH**/ ?>