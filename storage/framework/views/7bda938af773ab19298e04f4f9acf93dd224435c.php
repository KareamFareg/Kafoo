<?php $__env->startSection('content'); ?>

<div class="col-xl-12 col-lg-12">

  <div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet__body">
      <form class="kt_form_1" action="<?php echo e(route('admin.faqs.store')); ?>" method="post">
        <?php echo e(csrf_field()); ?>


        <input type="hidden" value="<?php echo e($trans); ?>" name="language">

        <div class="form-group row">
          <div class=" col-lg-5 col-md-5 col-sm-12">
            <input type="text" class="form-control <?php echo e($errors->has('question') ? ' is-invalid' : ''); ?>" maxlength="500"
              required name="question[<?php echo e($trans); ?>]" value="<?php echo e(old('question')); ?>"
              placeholder="<?php echo e(__('faq.question')); ?>">
          </div>

          <div class=" col-lg-5 col-md-5 col-sm-12">
            <input type="text" class="form-control <?php echo e($errors->has('answer') ? ' is-invalid' : ''); ?>" maxlength="500"
              required name="answer[<?php echo e($trans); ?>]" value="<?php echo e(old('answer')); ?>" placeholder="<?php echo e(__('faq.answer')); ?>">
          </div>
          <div class=" col-lg-2 col-md-2 col-sm-12">
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
          </div>
        </div>

      </form>
    </div>
  </div>

  <!--begin:: Widgets/Sale Reports-->
  <div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid">

    <div class="kt-portlet__head">
      <div class="kt-portlet__head-label">
        <h3 class="kt-portlet__head-title">
          <div class="row">

             <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.trans-bar','data' => ['languages' => $languages,'route' => ''.e(route('admin.faqs.index')).'','trans' => $trans]]); ?>
<?php $component->withName('admin.trans-bar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['languages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($languages),'route' => ''.e(route('admin.faqs.index')).'','trans' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($trans)]); ?>
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
      <!--Begin::Tab Content-->
      <div class="tab-content">
        <!--begin::tab 1 content-->
        <div class="tab-pane active" id="kt_widget11_tab1_content">


          <!--begin: Datatable -->
          <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
            <thead>
              <tr>
                <th><?php echo e(__('faq.question')); ?></th>
                <th><?php echo e(__('faq.answer')); ?></th>
                <th style="width: 15%"><?php echo e(__('words.control')); ?></th>


              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <form class="kt_form_1" action="<?php echo e(route('admin.faqs.update', [ 'id' => $item->id ] )); ?>" method="post">
                  <input name="_method" type="hidden" value="PUT">
                  <?php echo e(csrf_field()); ?>

                  <td>
                    <input type="hidden" value="<?php echo e($trans); ?>" name="language">

                    <input type="text" class="form-control <?php echo e($errors->has('question') ? ' is-invalid' : ''); ?>"
                      maxlength="500" required name="question[<?php echo e($trans); ?>]" <?php if(isset( $item->question[$trans] )): ?>
                    value="<?php echo e(old('question', $item->question[$trans] )); ?>"
                    <?php else: ?>
                    value="<?php echo e(old('question')); ?>"
                    <?php endif; ?>
                    placeholder="<?php echo e(__('faq.question')); ?>"></td>
                  <td><input type="text" class="form-control <?php echo e($errors->has('answer') ? ' is-invalid' : ''); ?>"
                      maxlength="500" required name="answer[<?php echo e($trans); ?>]" <?php if(isset( $item->answer[$trans] )): ?>
                    value="<?php echo e(old('answer', $item->answer[$trans] )); ?>"
                    <?php else: ?>
                    value="<?php echo e(old('answer')); ?>"
                    <?php endif; ?>
                    placeholder="<?php echo e(__('faq.answer')); ?>"></td>
                  <td>
                     <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.buttons.but_update','data' => []]); ?>
<?php $component->withName('buttons.but_update'); ?>
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
                 <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.buttons.but_delete_one','data' => ['link' => ''.e(route('admin.faqs.delete' , [ 'id' => $item->id ] )).' ']]); ?>
<?php $component->withName('buttons.but_delete_one'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['link' => ''.e(route('admin.faqs.delete' , [ 'id' => $item->id ] )).' ']); ?>
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

      <!--End::Tab Content-->
    </div>



  </div>

  <!--end:: Widgets/Sale Reports-->
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
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kafoosaappsjanna/lara/resources/views/admin/faqs/index.blade.php ENDPATH**/ ?>