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
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.buttons.but_back','data' => ['link' => ''.e(route('admin.roles.index')).'']]); ?>
<?php $component->withName('buttons.but_back'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['link' => ''.e(route('admin.roles.index')).'']); ?>
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
            <form class="kt_form_1" enctype="multipart/form-data" action="<?php echo e(route('admin.roles.store')); ?>" method="post">
              <?php echo e(csrf_field()); ?>



              <div class="form-group row">
                <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('role.name')); ?> *</label>
                <div class=" col-lg-4 col-md-9 col-sm-12">
                  <input type="text" class="form-control <?php echo e($errors->has('title') ? ' is-invalid' : ''); ?>" required
                    maxlength="100" value="<?php echo e(old('title')); ?>" name="title" placeholder="<?php echo e(__('role.name')); ?>">
                  <!-- <span class="form-text text-muted">Please enter your full name</span> -->
                  <?php if($errors->has('title')): ?>
                  <span class="invalid-feedback"><?php echo e($errors->first('title')); ?></span>
                  <?php endif; ?>
                </div>
              </div>
              
              
              <div class="form-group row">
                <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('role.level')); ?> *</label>
                <div class=" col-lg-4 col-md-9 col-sm-12">
                  <input type="number" class="form-control <?php echo e($errors->has('level') ? ' is-invalid' : ''); ?>" required
                    maxlength="100" value="1"  min="1" name="level" placeholder="<?php echo e(__('role.level')); ?>">
                  <!-- <span class="form-text text-muted">Please enter your full name</span> -->
                  <?php if($errors->has('level')): ?>
                  <span class="invalid-feedback"><?php echo e($errors->first('level')); ?></span>
                  <?php endif; ?>
                </div>
              </div>


              <input type="hidden" name="role_for" value="0">
              


      <div class="form-group row">
        <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('role.title')); ?> *</label>
        <div class="col-lg-9 col-md-9 col-sm-12">
          <div class="kt-checkbox-list">
            <?php $__currentLoopData = $privilegesTree; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $privilege): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div style="padding-right: <?php echo e($privilege->depth * 25); ?>px;margin: 13px;">
              <label class="kt-checkbox">
              <input type="checkbox" value="<?php echo e($privilege->id); ?>" onclick="markChecked($(this),'<?php echo e($privilege->id); ?>')" class="parent_id_<?php echo e($privilege->parent_id); ?> role_id_<?php echo e($privilege->id); ?>" name="privileges_ids[]"><?php echo e($privilege->title); ?>

                <span></span>
              </label>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
          <!-- <span class="form-text text-muted">Please select at lease 1 and maximum 2 options</span> -->
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
<script>
  function markChecked(this_role,id){
    $(".parent_id_"+id).prop('checked', this_role.prop("checked"));
  }
</script>
<?php $__env->stopSection(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kafoosaappsjanna/lara/resources/views/admin/roles/create.blade.php ENDPATH**/ ?>