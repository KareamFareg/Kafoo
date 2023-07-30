<?php $__env->startSection('content'); ?>

    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="row">
            <div class="col-lg-12">

                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                <?php echo e(__('words.add')); ?> &nbsp;&nbsp;&nbsp;
                                 <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.buttons.but_back','data' => ['link' => ''.e(route('admin.categories.index')).'']]); ?>
<?php $component->withName('buttons.but_back'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['link' => ''.e(route('admin.categories.index')).'']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="kt-section kt-section--first">





                            <!-- form -->
                            <form class="kt_form_1" enctype="multipart/form-data"
                                action="<?php echo e(route('admin.categories.store')); ?>" method="post">
                                <?php echo e(csrf_field()); ?>



                                <div class="form-group row">
                                    <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('language.title')); ?> *</label>
                                    <div class=" col-lg-4 col-md-9 col-sm-12">
                                        <select
                                            class="form-control kt-select2 <?php echo e($errors->has('language') ? ' is-invalid' : ''); ?>"
                                            required id="kt_select2_1" name="language">
                                            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e(old('language') == $language->locale ? 'selected' : ''); ?>

                                                    value="<?php echo e($language->locale); ?>"><?php echo e($language->title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <!-- <span class="form-text text-muted">Please enter your full name</span> -->
                                        <?php if($errors->has('language')): ?>
                                            <span class="invalid-feedback"><?php echo e($errors->first('language')); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('category.name')); ?> *</label>
                                    <div class=" col-lg-4 col-md-9 col-sm-12">
                                        <input type="text"
                                            class="form-control <?php echo e($errors->has('title') ? ' is-invalid' : ''); ?>" required
                                            maxlength="100" value="<?php echo e(old('title')); ?>" name="title" placeholder="<?php echo e(__('category.name')); ?>">
                                        <!-- <span class="form-text text-muted">Please enter your full name</span> -->
                                        <?php if($errors->has('title')): ?>
                                            <span class="invalid-feedback"><?php echo e($errors->first('title')); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                


                                <div class="form-group row">
                                    <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('category.root')); ?> *</label>
                                    <div class="col-lg-4 col-md-9 col-sm-12">
                                        <select
                                            class="form-control kt-select2 <?php echo e($errors->has('parents') ? ' is-invalid' : ''); ?>"
                                            id="kt_select2_3" name="parents">
                                            <!-- <option value="0">تصنيف رئيسي</option> -->
                                            <option  value="0">
                                                <?php echo e(__('category.main_category')); ?></option> 

                                            <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <option <?php echo e(old('parents') == $parent->id ? 'selected' : ''); ?>

                                                    value="<?php echo e($parent->id); ?>"> <?php echo e($parent->title); ?>

                                                    <?php echo e(str_repeat('__', $parent->depth)); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                        </select>
                                        <!-- <span class="form-text text-muted">Please enter your full name</span> -->
                                        <?php if($errors->has('parents')): ?>
                                            <span class="invalid-feedback"><?php echo e($errors->first('parents')); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('words.sort')); ?></label>
                                    <div class=" col-lg-4 col-md-9 col-sm-12">
                                        <input class="form-control <?php echo e($errors->has('sort') ? ' is-invalid' : ''); ?>"
                                            type="number" min="1" value="1" maxlength="3" id="example-number-input"
                                            name="sort">
                                        <!-- <span class="form-text text-muted">Please enter your full name</span> -->
                                        <?php if($errors->has('sort')): ?>
                                            <span class="invalid-feedback"><?php echo e($errors->first('sort')); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>


                                



                              <div class="form-group row">
                                    <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('words.image')); ?></label>
                                    <div class="col-lg-4 col-md-9 col-sm-12">
                                        <input type="file" name="image" id="input-file-now-custom-1" class="dropify"
                                            data-default-file="" />
                                    </div>
                                </div>





                                 <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.buttons.but_submit','data' => []]); ?>
<?php $component->withName('buttons.but_submit'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

                            </form>





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

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kafoosaappsjanna/lara/resources/views/admin/categories/create.blade.php ENDPATH**/ ?>