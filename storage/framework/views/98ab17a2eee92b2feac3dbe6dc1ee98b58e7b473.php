<?php $__env->startSection('content'); ?>
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="row">
        <div class="col-lg-12">

            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            <div class="row">
                                 <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.buttons.but_back','data' => ['link' => ''.e(route('admin.sliders.index')).'']]); ?>
<?php $component->withName('buttons.but_back'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['link' => ''.e(route('admin.sliders.index')).'']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                            </div>
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="kt-section kt-section--first">

                        <div class="form-group ">
                            <h5><?php echo e($data->position); ?></h5>
                            <p><?php echo e($data->note); ?></p>
                        </div>
                        <!-- form -->
                        <form class="kt_form_1" enctype="multipart/form-data"
                            action="<?php echo e(route('admin.sliders.update', ['id' => $data->id])); ?>" method="post">
                            <?php echo e(csrf_field()); ?>


                            <input name="_method" type="hidden" value="PUT">
                            <div class="form-group">
                                <div class=" row">
                                    
                                <div class=" col-lg-4 col-md-9 col-sm-12">
                                    <label class="col-form-label "><?php echo e(__('slider.link')); ?></label>
                                    <input class="form-control <?php echo e($errors->has('link') ? '' : ''); ?>" 
                                        type="text" maxlength="4000"  placeholder="<?php echo e(__('slider.link')); ?>" id="example-number-input" name="link">
                                </div>
                                <div class=" col-lg-4 col-md-9 col-sm-12">
                                    <label class="col-form-label "><?php echo e(__('words.image')); ?></label>
                                    <input required type="file" name="image" id="input-file-now-custom-1" class="form-control" />
                                </div>
                                <div class="col-lg-2">
                                    <label class="col-form-label ">&nbsp;</label>
                                    <button class="form-control btn btn-success " type="submit">
                                        <i class="fa fa-plus"></i>اضافة
                                    </button>
                                </div>
                            </div>
                    </div>
                    </form>

                    <div class="kt-portlet__body">

                        <!--begin: Datatable -->
                        <table class="table table-striped- table-bordered table-hover table-checkable">
                            <thead>
                                <tr>
                                    
                                    <th><?php echo e(__('slider.link')); ?></th>
                                    <th><?php echo e(__('words.image')); ?></th>
                                    <th><?php echo e(__('slider.control')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $data->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    
                                    <td><?php echo e($item['link']); ?></td>
                                    <td>
                                        <img src="<?php echo e(asset('storage/app/' . $item['image'])); ?>"
                                            style="max-height : 100px"
                                            class="  img-responsive img-thumbnail img-rounded">

                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-success" data-toggle="modal"
                                            data-target="#EditModal-<?php echo e($key); ?>"><?php echo e(trans('words.edit')); ?></button>
                                        |
                                         <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.buttons.but_delete_one','data' => ['link' => ''.e(route('admin.sliders.delete', ['id' => $data->id, 'imageIndex' => $key])).'']]); ?>
<?php $component->withName('buttons.but_delete_one'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['link' => ''.e(route('admin.sliders.delete', ['id' => $data->id, 'imageIndex' => $key])).'']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 


                                        <!--begin:: Edit Modal-->
                                        <div class="modal fade" id="EditModal-<?php echo e($key); ?>" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <!-- form -->
                                                <form class="kt_form_1" enctype="multipart/form-data"
                                                    action="<?php echo e(route('admin.sliders.update', ['id' => $data->id])); ?>"
                                                    method="post">
                                                    <?php echo e(csrf_field()); ?>

                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                تعديل السلايدر</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">


                                                            <input name="_method" type="hidden" value="PUT">
                                                            <input name="imageIndex" type="hidden" value="<?php echo e($key); ?>">

                                                            <div class=" form-group">
                                                                
                                                            <div class=" form-group">
                                                                <label
                                                                    class="col-form-label "><?php echo e(__('slider.link')); ?></label>
                                                                <input
                                                                    class="form-control <?php echo e($errors->has('link') ? '  ' : ''); ?>"
                                                                     type="text" maxlength="4000"
                                                                    value="<?php echo e($item['link']); ?>" placeholder="<?php echo e(__('slider.link')); ?>"
                                                                    id="example-number-input" name="link">


                                                            </div>
                                                            <div class=" form-group">
                                                                <label
                                                                    class="col-form-label "><?php echo e(__('words.image')); ?></label>
                                                                <input type="file" name="image"
                                                                    id="input-file-now-custom-1" class="dropify"
                                                                    value="<?php echo e(asset('storage/app/' . $item['image'])); ?>"
                                                                    data-default-file="<?php echo e(asset('storage/app/' . $item['image'])); ?>" />

                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">اغلاق</button>
                                                            <button class=" btn btn-success " type="submit">
                                                                <i class="fa fa-plus"></i>تعديل
                                                            </button>
                                                        </div>
                                                    </div>
                                            </div>
                                            </form>
                                        </div>
                                        <!--end::Modal-->


                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>

                        <!--end: Datatable -->
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>



<?php $__env->startSection('js_pagelevel'); ?>
 <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.dropify-js','data' => []]); ?>
<?php $component->withName('admin.dropify-js'); ?>
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
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kafoosaappsjanna/lara/resources/views/admin/sliders/edit.blade.php ENDPATH**/ ?>