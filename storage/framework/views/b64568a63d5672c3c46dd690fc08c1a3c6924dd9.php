<?php $__env->startSection('content'); ?>

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
  <div class="row">
    <div class="col-lg-12">

      <div class="kt-portlet">
        <div class="kt-portlet__head">
          <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
              <?php echo e(__('words.add')); ?> &nbsp;&nbsp;&nbsp;
            </h3>
          </div>
        </div>
        <div class="kt-portlet__body">
          <div class="kt-section kt-section--first">
            <!-- form -->
            <form class="kt_form_1" enctype="multipart/form-data" action="<?php echo e(route("admin.$typeName.store")); ?>" method="post">
              <?php echo e(csrf_field()); ?>



              <div class="form-group row">
                <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('user.name')); ?> *</label>
                <div class=" col-lg-4 col-md-9 col-sm-12">
                  <input type="text" class="form-control <?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" required
                    maxlength="150" value="<?php echo e(old('name')); ?>" name="name" placeholder="<?php echo e(__('user.name')); ?>">
                  <?php if($errors->has('name')): ?>
                  <span class="invalid-feedback"><?php echo e($errors->first('name')); ?></span>
                  <?php endif; ?>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('words.email')); ?> *</label>
                <div class=" col-lg-4 col-md-9 col-sm-12">
                  <input id="email" type="email" autocomplete="off" placeholder="<?php echo e(__('words.email')); ?>"
                    class="form-control <?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email"
                    value="<?php echo e(old('email')); ?>" maxlength="50" <?php if($type == 1): ?>  <?php endif; ?> autocomplete="email">
                  <?php if($errors->has('email')): ?>
                  <span class="invalid-feedback"><?php echo e($errors->first('email')); ?></span>
                  <?php endif; ?>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('words.password')); ?> *</label>
                <div class=" col-lg-4 col-md-9 col-sm-12">
                  <input id="password" type="password" placeholder="<?php echo e(__('words.password')); ?>"
                    class="form-control <?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required
                    autocomplete="current-password" minlength="6" maxlength="12">
                  <?php if($errors->has('password')): ?>
                  <span class="invalid-feedback"><?php echo e($errors->first('password')); ?></span>
                  <?php endif; ?>
                </div>
              </div>


              <div class="form-group row">
                <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('auth.confirm_password')); ?> *</label>
                <div class=" col-lg-4 col-md-9 col-sm-12">
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                    minlength="6" maxlength="12" placeholder="<?php echo e(__('auth.confirm_password')); ?>" required autocomplete="new-password">
                  <?php if($errors->has('password_confirmation')): ?>
                  <span class="invalid-feedback"><?php echo e($errors->first('password_confirmation')); ?></span>
                  <?php endif; ?>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('words.phone')); ?></label>
                <div class=" col-lg-4 col-md-9 col-sm-12">
                  <input id="phone" type="text" class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required placeholder="<?php echo e(__('words.phone')); ?>"
                    maxlength="10" name="phone" value="<?php echo e(old('phone')); ?>">
                  <?php if($errors->has('phone')): ?>
                  <span class="invalid-feedback"><?php echo e($errors->first('phone')); ?></span>
                  <?php endif; ?>
                </div>
              </div>



              <div class="form-group row">
                <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('user.gender')); ?> </label>
                <div class="col-lg-4 col-md-9 col-sm-12">
                  <select class="form-control kt-select2 <?php echo e($errors->has('gender') ? ' is-invalid' : ''); ?>"
                    id="kt_select2_3" name="gender">
                    <option <?php echo e(old('gender') == 'male' ? 'selected' : ''); ?> value="male"><?php echo e(__('user.male')); ?></option>
                    <option <?php echo e(old('gender') == 'female' ? 'selected' : ''); ?> value="female"><?php echo e(__('user.female')); ?>

                    </option>
                  </select>
                  <?php if($errors->has('gender')): ?>
                  <span class="invalid-feedback"><?php echo e($errors->first('gender')); ?></span>
                  <?php endif; ?>
                </div>
              </div>

              

          <input type="hidden" name="type_id" value="<?php echo e($type); ?>">
          <input type="hidden" name="typeName" value="<?php echo e($typeName); ?>">


          <?php if($type == 1): ?>
          <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('role.title')); ?> *</label>
            <div class="col-lg-4 col-md-9 col-sm-12">
              <select class="form-control kt-select2 <?php echo e($errors->has('role') ? ' is-invalid' : ''); ?>" id="kt_select2_2"
                name="role">
                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option <?php echo e(old('role') == $role->id ? 'selected' : ''); ?> value="<?php echo e($role->id); ?>"> <?php echo e($role->title); ?>

                </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
              <?php if($errors->has('role')): ?>
              <span class="invalid-feedback"><?php echo e($errors->first('role')); ?></span>
              <?php endif; ?>
            </div>
          </div>
          <?php endif; ?>


          <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('words.image')); ?> Max 500 KB</label>
            <div class="col-lg-4 col-md-9 col-sm-12">
              <input type="file" name="image" class="dropify" data-default-file="" />
            </div>
          </div>
          <?php if($type == 3): ?>
          <!-- <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('user.area')); ?> *</label>
            <div class="col-lg-4 col-md-9 col-sm-12">
              <select class="form-control kt-select2 area" onchange="getCities($(this).val())"  id="kt_select2_1"
                name="area">
                <?php $__currentLoopData = $areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($area->id); ?>"> <?php echo e($area->translation('ar')); ?>

                </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
  
            </div>
          </div>
           -->
          <!-- <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('user.city')); ?> *</label>
            <div class="col-lg-4 col-md-9 col-sm-12">
              <select class="form-control kt-select2 cities"  id="kt_select2_2"
                name="city">
                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($city->id); ?>"> <?php echo e($city->translation('ar')); ?>

                </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
  
            </div>
          </div> -->

          <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('user.id_number')); ?></label>
            <div class=" col-lg-4 col-md-9 col-sm-12">
              <input id="id_number" type="text" class="form-control <?php $__errorArgs = ['id_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                maxlength="10" name="id_number" placeholder="<?php echo e(__('user.id_number')); ?>" value="<?php echo e(old('id_number')); ?>">
              <?php if($errors->has('id_number')): ?>
              <span class="invalid-feedback"><?php echo e($errors->first('id_number')); ?></span>
              <?php endif; ?>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('user.id_card')); ?> Max 500 KB</label>
            <div class="col-lg-4 col-md-9 col-sm-12">
              <input type="file" name="id_card" class="dropify" data-default-file="" />
            </div>
          </div>


          <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('user.license')); ?> Max 500 KB</label>
            <div class="col-lg-4 col-md-9 col-sm-12">
              <input type="file" name="license" class="dropify" data-default-file="" />
            </div>
          </div>
          <?php endif; ?>


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

<script>
  function getCities(val) {
      if(val) {
        console.log('test');
          $.ajax({
              type: "get",
              url: "<?php echo e(route('admin.shippers.cities')); ?>",
              data:{"id": val},
              success: function(data){
                console.log(data);
                  $(".cities").html(data);
               }
          }); 
      }
  }
  </script>

<?php $__env->stopSection(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kafoosaappsjanna/lara/resources/views/admin/users/create.blade.php ENDPATH**/ ?>