<?php $__env->startSection('content'); ?>

<div class="col-xl-12 col-lg-12">

    <!--begin:: Widgets/Sale Reports-->
    <div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    <div class="row">
                         <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.buttons.but_new','data' => ['link' => ''.e(route('admin.categories.create')).'']]); ?>
<?php $component->withName('buttons.but_new'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['link' => ''.e(route('admin.categories.create')).'']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                         <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.trans-bar','data' => ['languages' => $languages,'route' => ''.e(route('admin.categories.index')).'','trans' => $trans]]); ?>
<?php $component->withName('admin.trans-bar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['languages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($languages),'route' => ''.e(route('admin.categories.index')).'','trans' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($trans)]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                    </div>
                </h3>
            </div>
            <!-- <div class="kt-portlet__head-toolbar">
            <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-brand" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#kt_widget11_tab1_content" role="tab">
                  Last Month
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#kt_widget11_tab2_content" role="tab">
                  All Time
                </a>
              </li>
            </ul>
          </div> -->
        </div>
        <div class="kt-portlet__body">

            <!--Begin::Tab Content-->
            <div class="tab-content">

                <!--begin::tab 1 content-->
                <div class="tab-pane active" id="kt_widget11_tab1_content">

                    <!--begin::Widget 11-->
                    <div class="kt-widget11">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td style="width:50%"></td>
                                        <td style="width:20%"></td>
                                        <td style="width:15%"></td>
                                        <td style="width:15%"></td>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <a style="padding-right: <?php echo e($data->depth * 30); ?>px;padding-left: <?php echo e($data->depth * 20); ?>px; font-weight: <?php echo e($data->depth == 0 ? 600 : '400'); ?>;"
                                                class="kt-userpic kt-userpic--circle kt-margin-r-5 kt-margin-t-5"
                                                data-toggle="kt-tooltip" data-placement="right">
                                                <img
                                                    src="<?php echo e($data->image ? asset('storage/app/' . $data->image) : $emptyImage); ?>">
                                                <?php echo e($data->title ?? $data->title_general . ' : ' . 'غير مترجم'); ?>

                                            </a>
                                            <!-- <span class="kt-widget11__sub">CRM System</span> -->
                                        </td>
                                        <td>
                                            <form id="frm_category_status" name="frm_category_status"
                                                action="<?php echo e(route('admin.categories.status', ['id' => $data->id])); ?>"
                                                method="post" enctype="multipart/form-data">
                                                <?php echo e(csrf_field()); ?>

                                                <input type="hidden" id="_method" name="_method" value="PUT">
                                                <span
                                                    class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success">
                                                    <label>
                                                        <input type="checkbox" <?php echo e($data->is_active ? 'checked' : ''); ?>

                                                            onclick="submitForm(this);">
                                                        <span></span>
                                                    </label>
                                                </span>
                                            </form>
                                        </td>
                                      
                                        <td>
                                             <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.buttons.but_edit','data' => ['link' => ''.e(route('admin.categories.edit', ['id' => $data->id])).'']]); ?>
<?php $component->withName('buttons.but_edit'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['link' => ''.e(route('admin.categories.edit', ['id' => $data->id])).'']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                                        </td>
                                        <td>
                                            <?php if($data->parent_id != 0 && $data->parent_id != 9 ): ?> 
                                             <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.buttons.but_delete_one','data' => ['link' => ''.e(route('admin.categories.delete' , [ 'id' => $data->id ] )).'']]); ?>
<?php $component->withName('buttons.but_delete_one'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['link' => ''.e(route('admin.categories.delete' , [ 'id' => $data->id ] )).'']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                                            <?php endif; ?>
                                          </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                </tbody>
                            </table>
                        </div>
                        <!-- <div class="kt-widget11__action kt-align-right">
                  <button type="button" class="btn btn-label-brand btn-bold btn-sm">Import Report</button>
                </div> -->
                    </div>

                    <!--end::Widget 11-->
                </div>

            </div>

            <!--End::Tab Content-->
        </div>
    </div>

    <!--end:: Widgets/Sale Reports-->
</div>


<?php $__env->startSection('js_pagelevel'); ?>
<script>
    function submitForm(me) {
            // $("#frm_category_status").submit();
            $(me).closest("form").submit();
        }

</script>
<?php $__env->stopSection(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kafoosaappsjanna/lara/resources/views/admin/categories/index.blade.php ENDPATH**/ ?>