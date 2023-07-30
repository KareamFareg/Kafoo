

<?php $__env->startSection('content'); ?>

<div class="col-xl-12 col-lg-12">

    <!--begin:: Widgets/Sale Reports-->
    <div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid">



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
                                    action="<?php echo e(route('admin.offers.create')); ?>" method="post">
                                    <?php echo e(csrf_field()); ?>

                                    <div class="modal-content">

                                        <div class="modal-body">
                                            <div class=" form-group">
                                                <input class="form-control" type="text" required
                                                    placeholder="<?php echo e(__('words.title')); ?>" name="title[<?php echo e($trans); ?>]">
                                            </div>
                                          
                                            <div class=" form-group">
                                                <label for=""><?php echo e(__('words.logo')); ?></label>
                                                <input type="file" name="logo" required="" class="form-control">
                                            </div>


                                            <div class=" form-group">
                                                
                                                    <div class="form-group incrementImage control-group input-group">
                                                        <input type="file" name="images[]" required="" class="form-control dropify">
                                                        <label for="ex5">&nbsp;</label>
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-success addImage" type="button"><i
                                                                    class="glyphicon glyphicon-plus"></i><?php echo e(__('words.add')); ?>

                                                            </button>
                                                        </div>
                            
                                                        <div class="cloneImage " style="display: none">
                                                            <div class="control-group input-group"
                                                                 style="margin-top:10px ; margin-bottom: 10px">
                                                                <input type="file" name="images[]"  class="form-control dropify">
                                                                <label for="ex5">&nbsp;</label>
                                                                <div class="input-group-btn">
                                                                    <button class="btn btn-danger removeImage" type="button"><i
                                                                            class="glyphicon glyphicon-remove"></i> <?php echo e(__('words.delete')); ?>

                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                            
                                                    </div>

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

                         <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.trans-bar','data' => ['languages' => $languages,'route' => ''.e(route('admin.offers.index')).'','trans' => $trans]]); ?>
<?php $component->withName('admin.trans-bar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['languages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($languages),'route' => ''.e(route('admin.offers.index')).'','trans' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($trans)]); ?>
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

            <table class="table table-striped- table-bordered table-hover table-checkable">

                <thead>
                    <tr>
                        <td style="width:20%"><?php echo e(__('words.title')); ?></td>
                        <td style="width:15%"><?php echo e(__('words.logo')); ?></td>
                        <td style="width:15%"><?php echo e(__('words.image')); ?></td>
                        <td style="width:15%"><?php echo e(__('words.control')); ?></td>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <?php echo e($item->title($trans)); ?>

                        </td>
                    
                        <td>
                            
                            <a class="kt-userpic kt-userpic--circle kt-margin-r-5 kt-margin-t-5"
                                data-toggle="kt-tooltip" data-placement="right">
                                <img src="<?php echo e($item->logo ? asset('storage/app/' . $item->logo) : $emptyImage); ?>">
                            </a>
                        </td><td>
                            
                            <a class="kt-userpic kt-userpic--circle kt-margin-r-5 kt-margin-t-5"
                                data-toggle="kt-tooltip" data-placement="right">
                                <img src="<?php echo e($item->images ? asset('storage/app/' . $item->images[0]) : $emptyImage); ?>">
                            </a>
                        </td>
                        <td>

                           

                             <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.buttons.but_edit','data' => ['link' => ''.e(route('admin.offers.edit',['id'=>$item->id])).'']]); ?>
<?php $component->withName('buttons.but_edit'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['link' => ''.e(route('admin.offers.edit',['id'=>$item->id])).'']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                             <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.buttons.but_delete_one','data' => ['link' => ''.e(route('admin.offers.delete',['id'=>$item->id])).'']]); ?>
<?php $component->withName('buttons.but_delete_one'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['link' => ''.e(route('admin.offers.delete',['id'=>$item->id])).'']); ?>
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
        </div>




    </div>

    <!--end:: Widgets/Sale Reports-->
</div>




<?php $__env->stopSection(); ?>

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

<script !src="">
    $(document).ready(function () {

        $(".addImage").click(function () {
            var html = $(".cloneImage").html();
            $(".incrementImage").after(html);
        });

        $("body").on("click", ".removeImage", function () {
            $(this).parents(".control-group").remove();
        });

   

    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kafoosaappsjanna/lara/resources/views/admin/offers/index.blade.php ENDPATH**/ ?>