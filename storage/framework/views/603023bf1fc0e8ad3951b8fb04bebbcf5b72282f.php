
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
                                    action="<?php echo e(route('admin.products.create')); ?>" method="post">
                                    <?php echo e(csrf_field()); ?>

                                    <div class="modal-content">

                                        <div class="modal-body">
                                            <div class=" form-group">
                                                <input class="form-control" type="text" required
                                                    placeholder="<?php echo e(__('words.title')); ?>" name="title">
                                            </div>
                                            <div class=" form-group">
                                                <select class="form-control " required
                                                    onchange="getChild(0,$(this).val())" name="parent_id">
                                                    <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($category->id); ?>">
                                                        <?php echo e($category->title); ?>

                                                    </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <?php if($categories->count() > 0): ?>
                                            <div class=" form-group" id="category_child">
                                                <select class="form-control child_list_0"  name="category_id">
                                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($category->id); ?>">
                                                        <?php echo e($category->title); ?>

                                                    </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <?php endif; ?>

                                            <div class=" form-group">
                                                <label for="">Max 300MB *</label>
                                                <input type="file" name="image" id="input-file-now-custom-1"
                                                    class="dropify" data-default-file="" />


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

            <table class="table table-striped- table-bordered table-hover table-checkable"   id="kt_table_1">

                <thead>
                    <tr>
                        <td style="width:20%"><?php echo e(__('words.title')); ?></td>
                        <td style="width:50%"><?php echo e(__('words.category')); ?></td>
                        <td style="width:15%"><?php echo e(__('words.image')); ?></td>
                        <td style="width:15%"><?php echo e(__('words.control')); ?></td>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <?php echo e($item->title); ?>

                        </td>
                        <td>
                            <?php
                            $category = App\Services\CategoryService::queryParents([$item->category_id]);
                            ?>
                            <?php echo e(optional($category)[0]->title  ?? ''); ?>

                        </td>
                        <td>
                            
                            <img style="width: 100px" class="img-responsive img-thumbnail img-rounded"
                                src="<?php echo e($item->image ? asset('storage/app/' . $item->image) : $emptyImage); ?>">


                            </a>
                        </td>
                        <td>

                            <button type="button" class="btn btn-outline-success" data-toggle="modal"
                                data-target="#EditModal-<?php echo e($item->id); ?>"><?php echo e(trans('words.edit')); ?></button>
                            <!--begin:: Edit Modal-->
                            <div class="modal fade" id="EditModal-<?php echo e($item->id); ?>" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <!-- form -->
                                    <form class="kt_form_1" enctype="multipart/form-data"
                                        action="<?php echo e(route('admin.products.update', ['id' => $item->id])); ?>"
                                        method="post">
                                        <?php echo e(csrf_field()); ?>

                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"><?php echo e($item->title); ?>

                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class=" form-group">
                                                    <input class="form-control " required type="text"
                                                        value="<?php echo e($item->title); ?>" name="title">
                                                </div>

                                                <div class=" form-group">
                                                    <select class="form-control "
                                                        onchange="getChild(<?php echo e($item->id); ?>,$(this).val())" required
                                                        name="parent_id">
                                                        <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option <?php if($category->parent_id == $item->category_id): ?> selected
                                                            <?php endif; ?> value="<?php echo e($category->id); ?>">
                                                            <?php echo e($category->title); ?>

                                                        </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                                <div class=" form-group">
                                                    <select class="form-control child_list_<?php echo e($item->id); ?>" 
                                                        name="category_id">
                                                        <?php
                                                        $id = optional(App\Models\Category::find($item->category_id))->parent_id;
                                                        $categoriesIds = App\Models\Category::whereIn('parent_id',
                                                        [$id])->get()->pluck('id');
                                                        $childs =
                                                        App\Services\CategoryService::queryParents($categoriesIds);
                                                        ?>

                                                        <?php if($childs): ?>
                                                        <?php $__currentLoopData = $childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option <?php if($category->id == $item->category_id): ?> selected <?php endif; ?>
                                                            value="<?php echo e($category->id); ?>">
                                                            <?php echo e($category->title); ?>

                                                        </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>
                                                    </select>
                                                </div>


                                                <div class=" form-group">
                                                    <label for="">Max 300MB *</label>
                                                    <input type="file" name="image" id="input-file-now-custom-1"
                                                        class="dropify"
                                                        data-default-file="<?php echo e($item->image ? asset('storage/app/' . $item->image) : $emptyImage); ?>" />
                                                </div>


                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal"><?php echo e(__('words.cancel')); ?></button>
                                                <button class=" btn btn-success " type="submit">
                                                    <i class="fa fa-pincel"></i><?php echo e(__('words.edit')); ?>

                                                </button>
                                            </div>
                                        </div>
                                </div>
                                </form>
                            </div>
                            <!--end::Modal-->

                             <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.buttons.but_delete_one','data' => ['link' => ''.e(route('admin.products.delete',['id'=>$item->id])).'']]); ?>
<?php $component->withName('buttons.but_delete_one'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['link' => ''.e(route('admin.products.delete',['id'=>$item->id])).'']); ?>
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
    function getChild(id,val) {
      if(val) {
          $.ajax({
              type: "get",
              url: "<?php echo e(route('admin.products.getChild')); ?>",
              data:{"id": val},
              success: function(data){
                // console.log(data);
                  $(".child_list_"+id).html(data);
               }
              
          }); 
      }
  }
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kafoosaappsjanna/lara/resources/views/admin/products/index.blade.php ENDPATH**/ ?>