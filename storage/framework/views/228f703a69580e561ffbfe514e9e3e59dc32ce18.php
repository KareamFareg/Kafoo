<?php $__env->startSection('content'); ?>

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
  <div class="row">
    <div class="col-lg-12">

      <div class="kt-portlet">
        <div class="kt-portlet__head">
          <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
              <?php $backRouteName="admin.$typeName.index" ?>
               <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.buttons.but_back','data' => ['link' => ''.e(route($backRouteName)).'']]); ?>
<?php $component->withName('buttons.but_back'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['link' => ''.e(route($backRouteName)).'']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
              

              <?php if($type == 2): ?>
               <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.buttons.but_link','data' => ['link' => ''.e(route('admin.clients.wallet', [ 'id' => $user->id ] )).'','title' => ''.e(__('words.transactions')).'']]); ?>
<?php $component->withName('buttons.but_link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['link' => ''.e(route('admin.clients.wallet', [ 'id' => $user->id ] )).'','title' => ''.e(__('words.transactions')).'']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

              <?php endif; ?>

              <?php if($type != 1): ?>

              <?php $ordersRouteName="admin.$typeName.orders" ?>
               <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.buttons.but_link','data' => ['link' => ''.e(route($ordersRouteName, [ 'id' => $user->id ] )).'','title' => ''.e(__('order.title')).'']]); ?>
<?php $component->withName('buttons.but_link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['link' => ''.e(route($ordersRouteName, [ 'id' => $user->id ] )).'','title' => ''.e(__('order.title')).'']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

              <?php $rateRouteName="admin.$typeName.rate" ?>
               <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.buttons.but_link','data' => ['link' => ''.e(route($rateRouteName, [ 'id' => $user->id ] )).'','title' => ''.e(__('words.rate')).'']]); ?>
<?php $component->withName('buttons.but_link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['link' => ''.e(route($rateRouteName, [ 'id' => $user->id ] )).'','title' => ''.e(__('words.rate')).'']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

               
            <button style="margin: 10px" type="button" class="btn btn-outline-success" data-toggle="modal"
              data-target="#Add"><?php echo e(trans('notification.notification')); ?></button>

            <!--begin:: Edit Modal-->
            <div class="modal fade" id="Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog" role="document">
                <!-- form -->
                <?php $notifyRouteName="admin.$typeName.notifyUser" ?>
                <form class="kt_form_1" enctype="multipart/form-data" action="<?php echo e(route($notifyRouteName,['id'=>$user->id ])); ?>"
                  method="post">
                  <?php echo e(csrf_field()); ?>

                  <div class="modal-content">

                    <div class="modal-body">
                      <input type="hidden" name="group" value="<?php echo e($typeName); ?>">
                      <div class=" form-group">
                        <input type="text" name="title" class="form-control" placeholder="<?php echo app('translator')->get('words.title'); ?>" id="">
 
                       </div>
                       
                      <div class=" form-group">
                        <textarea name="message" placeholder="<?php echo e(__('notification.notification')); ?>"
                          class="form-control" rows="5"></textarea>

                      </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                          data-dismiss="modal"><?php echo e(__('words.cancel')); ?></button>
                        <button class=" btn btn-success " type="submit">
                          <i class="fa fa-plus"></i><?php echo e(__('words.send')); ?>

                        </button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!--end::Modal-->  

       

              <?php endif; ?>


            </h3>
          </div>
        </div>


        <div class="kt-portlet__body ">
          <div class="kt-section kt-section--first">
            <!-- form -->
            <form class="kt_form_1" enctype="multipart/form-data"
              action='<?php echo e(route("admin.$typeName.update", [ "id" => $user->id ] )); ?>' method="post">
              <?php echo e(csrf_field()); ?>

              <input name="_method" type="hidden" value="PUT">

              <div class="form-group row">
                <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('user.name')); ?> *</label>
                <div class=" col-lg-4 col-md-9 col-sm-12">
                  <input type="text" class="form-control <?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" required
                    maxlength="150" value="<?php echo e(old('name', $user->name)); ?>" name="name"
                    placeholder="<?php echo e(__('user.name')); ?>">
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
                    value="<?php echo e(old('email',$user->email)); ?>" maxlength="50" autocomplete="email">
                  <?php if($errors->has('email')): ?>
                  <span class="invalid-feedback"><?php echo e($errors->first('email')); ?></span>
                  <?php endif; ?>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('words.password')); ?> *</label>
                <div class=" col-lg-4 col-md-9 col-sm-12">
                  <input id="password" type="password" placeholder="<?php echo e(__('words.password')); ?> "
                    class="form-control <?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password"
                    autocomplete="current-password" minlength="6" maxlength="12">
                  <?php if($errors->has('password')): ?>
                  <span class="invalid-feedback"><?php echo e($errors->first('password')); ?></span>
                  <?php endif; ?>
                </div>
              </div>

              <div class="form-group row">
                <label for="password-confirm"
                  class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('auth.confirm_password')); ?></label>
                <div class="col-lg-4 col-md-9 col-sm-12">
                  <input id="password-confirm" type="password" placeholder="<?php echo e(__('auth.confirm_password')); ?>"
                    class="form-control" name="password_confirmation" minlength="6" maxlength="12"
                    autocomplete="new-password">
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
unset($__errorArgs, $__bag); ?>" required
                    maxlength="10" name="phone" placeholder="<?php echo e(__('words.phone')); ?>"
                    value="<?php echo e(old('phone',$user->phone)); ?>">
                  <?php if($errors->has('phone')): ?>
                  <span class="invalid-feedback"><?php echo e($errors->first('phone')); ?></span>
                  <?php endif; ?>
                </div>
              </div>

              <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('user.dateOfBirth')); ?></label>
            <div class=" col-lg-4 col-md-9 col-sm-12">
              <input id="dateOfBirth" type="date" class="form-control <?php $__errorArgs = ['dateOfBirth'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                maxlength="10" name="dateOfBirth" placeholder="<?php echo e(__('user.dateOfBirth')); ?>"
                value="<?php echo e(old('dateOfBirth',$user->dateOfBirth)); ?>">
              <?php if($errors->has('dateOfBirth')): ?>
              <span class="invalid-feedback"><?php echo e($errors->first('dateOfBirth')); ?></span>
              <?php endif; ?>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">حساب urpay</label>
            <div class=" col-lg-4 col-md-9 col-sm-12">
              <input id="iBanNum" type="text" class="form-control <?php $__errorArgs = ['iBanNum'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                 name="iBanNum" placeholder="<?php echo e(__('user.card_number')); ?>"
                value="<?php echo e(old('iBanNum',$user->iBanNum)); ?>">
              <?php if($errors->has('iBanNum')): ?>
              <span class="invalid-feedback"><?php echo e($errors->first('iBanNum')); ?></span>
              <?php endif; ?>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">اسم البنك</label>
            <div class=" col-lg-4 col-md-9 col-sm-12">
              <input id="benificiaryName" type="text" class="form-control <?php $__errorArgs = ['benificiaryName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                 name="benificiaryName" placeholder="اسم البنك"
                value="<?php echo e(old('benificiaryName',$user->benificiaryName)); ?>">
              <?php if($errors->has('benificiaryName')): ?>
              <span class="invalid-feedback"><?php echo e($errors->first('benificiaryName')); ?></span>
              <?php endif; ?>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('user.كود البنك')); ?></label>
            <div class=" col-lg-4 col-md-9 col-sm-12">
              <input id="bankIdCode" type="text" class="form-control <?php $__errorArgs = ['bankIdCode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                 name="bankIdCode" placeholder="كود البنك"
                value="<?php echo e(old('bankIdCode',$user->bankIdCode)); ?>">
              <?php if($errors->has('bankIdCode')): ?>
              <span class="invalid-feedback"><?php echo e($errors->first('bankIdCode')); ?></span>
              <?php endif; ?>
            </div>
          </div>
              <div class="form-group row">
                <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('user.gender')); ?> </label>
                <div class="col-lg-4 col-md-9 col-sm-12">
                  <select class="form-control kt-select2 <?php echo e($errors->has('gender') ? ' is-invalid' : ''); ?>"
                    id="kt_select2_3" name="gender">
                    <option <?php echo e(old('gender',$user->gender) == 'male' ? 'selected' : ''); ?> value="male">
                      <?php echo e(__('user.male')); ?></option>
                    <option <?php echo e(old('gender',$user->gender) == 'female' ? 'selected' : ''); ?> value="female">
                      <?php echo e(__('user.female')); ?></option>
                  </select>
                  <?php if($errors->has('gender')): ?>
                  <span class="invalid-feedback"><?php echo e($errors->first('gender')); ?></span>
                  <?php endif; ?>
                </div>
              </div>
              <?php if($type == 2): ?>
              <div class="form-group row">
                <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('user.amount')); ?> </label>
                <div class="col-lg-4 col-md-9 col-sm-12">
                  <input id="amount" type="text" class="form-control <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required
                     name="amount" placeholder="<?php echo e(__('user.amount')); ?>"
                    value="<?php echo e(old('amount',$user->amount)); ?>">
                  <?php if($errors->has('amount')): ?>
                  <span class="invalid-feedback"><?php echo e($errors->first('amount')); ?></span>
                  <?php endif; ?>
                </div>
              </div>
              <?php endif; ?>

              

          <input type="hidden" name="type_id" value="<?php echo e($type); ?>">


          <?php if($type == 1  && Route::currentRouteName() != 'admin.profile.edit'): ?>
          <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('role.title')); ?> *</label>
            <div class="col-lg-4 col-md-9 col-sm-12">
              <select class="form-control kt-select2 <?php echo e($errors->has('role') ? ' is-invalid' : ''); ?>" id="kt_select2_2"
                name="role">
                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option <?php echo e(old('role',optional($user->roles()->first())->id) == $role->id ? 'selected' : ''); ?> value="<?php echo e($role->id); ?>">
                  <?php echo e($role->title); ?></option>
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
              <input type="file" name="image" class="dropify" data-default-file="<?php echo e($user->imagePath()); ?>" />
            </div>


            <div class="col-lg-2 col-md-3 col-sm-4">

              <button class="btn btn-success" type="button" data-toggle="modal" data-target="#image-<?php echo e($user->id); ?>">
                <i class="fas fa-search-plus"></i>
              </button>
              <div class="modal  fade" id="image-<?php echo e($user->id); ?>" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-dialog-centered ">
                  <div class="modal-content">
  
                    <div class="modal-content">
                      <div class="modal-body" style=" text-align: center;">
                        <img style="width : 100% " src="<?php echo e($user->image ? asset('storage/app/'.$user->image)  : $emptyImage); ?>" class="  img-responsive ">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>

          <?php if($type == 3): ?>
          
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
                maxlength="10" name="id_number" placeholder="<?php echo e(__('user.id_number')); ?>"
                value="<?php echo e(old('id_number',$user->id_number)); ?>">
              <?php if($errors->has('id_number')): ?>
              <span class="invalid-feedback"><?php echo e($errors->first('id_number')); ?></span>
              <?php endif; ?>
            </div>
          </div>
          <div class="form-group row">
                <label class="col-form-label col-lg-3 col-sm-12">نوع الهوية </label>
                <div class="col-lg-4 col-md-9 col-sm-12">
                  <select class="form-control kt-select2 <?php echo e($errors->has('identityTypeId') ? ' is-invalid' : ''); ?>"
                    id="kt_select2_3" name="identityTypeId">
                    <?php if($user->identityTypeId == null): ?>
                      <option value ="" selected>اختر نوع الهويه</option>
                    <?php endif; ?>
                    <option <?php echo e(old('identityTypeId',$user->identityTypeId) == 'NV25GlPuOnQ=' ? 'selected' : ''); ?> value="NV25GlPuOnQ=">
                    هوية وطنية</option>
                      <option <?php echo e(old('identityTypeId',$user->identityTypeId) == 'oIcaYzeDfQQ=' ? 'selected' : ''); ?> value="oIcaYzeDfQQ=">
                      إقامة </option>
                      
                  </select>
                  <?php if($errors->has('gender')): ?>
                  <span class="invalid-feedback"><?php echo e($errors->first('gender')); ?></span>
                  <?php endif; ?>
                </div>
              </div>
          <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('user.id_card')); ?> Max 500 KB</label>
            <div class="col-lg-4 col-md-9 col-sm-12">
              <input type="file" name="id_card" class="dropify"
                data-default-file="<?php echo e(asset('storage/app/'.$user->id_card)); ?>" />
            </div>

            <div class="col-lg-2 col-md-3 col-sm-4">

              <button class="btn btn-success" type="button" data-toggle="modal" data-target="#id_card-<?php echo e($user->id); ?>">
                <i class="fas fa-search-plus"></i>
              </button>
              <div class="modal  fade" id="id_card-<?php echo e($user->id); ?>" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-dialog-centered ">
                  <div class="modal-content">
  
                    <div class="modal-content">
                      <div class="modal-body" style=" text-align: center;">
                        <img style="width : 100% " src="<?php echo e($user->id_card ? asset('storage/app/'.$user->id_card)  : $emptyImage); ?>" class="  img-responsive ">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="form-group row">
                <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('user.carType')); ?> </label>
                <div class="col-lg-4 col-md-9 col-sm-12">
                  <select class="form-control kt-select2 <?php echo e($errors->has('carType') ? ' is-invalid' : ''); ?>"
                    id="kt_select2_3" name="carType">
                    <option <?php echo e(old('gender',$user->carType) == 'NV25GlPuOnQ=' ? 'selected' : ''); ?> value="NV25GlPuOnQ=">
                      خاص</option>
                      <option <?php echo e(old('gender',$user->carType) == 'Nap4gA1tyeY=' ? 'selected' : ''); ?> value="Nap4gA1tyeY=">
                      نقل عام</option>
                      <option <?php echo e(old('gender',$user->carType) == 'oIcaYzeDfQQ=' ? 'selected' : ''); ?> value="oIcaYzeDfQQ=">
                      نقل خاص</option>
                      <option <?php echo e(old('gender',$user->carType) == 'w+mTCW1569Y=' ? 'selected' : ''); ?> value="w+mTCW1569Y=">
                      حافلة صغيرة عامة</option>
                      <option <?php echo e(old('gender',$user->carType) == 'rAy9UhMUw6Y=' ? 'selected' : ''); ?> value="rAy9UhMUw6Y=">
                      حافله صغيره خاص</option>
                      <option <?php echo e(old('gender',$user->carType) == 'A/VaSUhyG28=' ? 'selected' : ''); ?> value="A/VaSUhyG28=">
                      أجره</option>
                      <option <?php echo e(old('gender',$user->carType) == 'vXChcFPkxcI=' ? 'selected' : ''); ?> value="vXChcFPkxcI=">
                      أشغال عامه</option>
                      <option <?php echo e(old('gender',$user->carType) == '7kRgMtOkdQE=' ? 'selected' : ''); ?> value="7kRgMtOkdQE=">
                      تصدير</option>
                      <option <?php echo e(old('gender',$user->carType) == 'cABXRPle08s=' ? 'selected' : ''); ?> value="cABXRPle08s=">
                      دبلوماسي</option>
                      <option <?php echo e(old('gender',$user->carType) == 'J4DRtp+fYEM=' ? 'selected' : ''); ?> value="J4DRtp+fYEM=">
                      مؤقت</option>
                    
                  </select>
                  <?php if($errors->has('gender')): ?>
                  <span class="invalid-feedback"><?php echo e($errors->first('gender')); ?></span>
                  <?php endif; ?>
                </div>
              </div>



          <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('user.carNum')); ?></label>
            <div class=" col-lg-4 col-md-9 col-sm-12">
              <input id="carNumber" type="text" class="form-control <?php $__errorArgs = ['carNumber'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                maxlength="10" name="carNumber" placeholder="<?php echo e(__('user.carNum')); ?>"
                value="<?php echo e(old('carNumber',$user->carNumber)); ?>">
              <?php if($errors->has('carNumber')): ?>
              <span class="invalid-feedback"><?php echo e($errors->first('carNumber')); ?></span>
              <?php endif; ?>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('user.carSequenceNum')); ?></label>
            <div class=" col-lg-4 col-md-9 col-sm-12">
              <input id="vehicleSequenceNumber" type="text" class="form-control <?php $__errorArgs = ['vehicleSequenceNumber'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                maxlength="10" name="vehicleSequenceNumber" placeholder="<?php echo e(__('user.carSequenceNum')); ?>"
                value="<?php echo e(old('vehicleSequenceNumber',$user->vehicleSequenceNumber)); ?>">
              <?php if($errors->has('vehicleSequenceNumber')): ?>
              <span class="invalid-feedback"><?php echo e($errors->first('vehicleSequenceNumber')); ?></span>
              <?php endif; ?>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('user.license')); ?> Max 500 KB</label>
            <div class="col-lg-4 col-md-9 col-sm-12">
              <input type="file" name="license" class="dropify"
                data-default-file="<?php echo e(asset('storage/app/'.$user->license)); ?>" />
            </div>

            <div class="col-lg-2 col-md-3 col-sm-4">

              <button class="btn btn-success" type="button" data-toggle="modal" data-target="#license-<?php echo e($user->id); ?>">
                <i class="fas fa-search-plus"></i>
              </button>
              <div class="modal  fade" id="license-<?php echo e($user->id); ?>" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-dialog-centered ">
                  <div class="modal-content">
  
                    <div class="modal-content">
                      <div class="modal-body" style=" text-align: center;">
                        <img style="width : 100% " src="<?php echo e($user->license ? asset('storage/app/'.$user->license)  : $emptyImage); ?>" class="  img-responsive ">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
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

      <?php if($type == 3): ?>
      <div class="kt-portlet__body " style="   overflow-x: scroll;">
        <table class="table table-striped- table-bordered table-hover table-checkable ">
          <?php $ordersIds =\App\Models\Order::where(['shipper_id'=>$user->id,'status'=>4])->pluck('id') ?>
          <tbody>
            <tr>
              <td></td>
              <td><?php echo e(__('commission.orders_price')); ?></td>
              <td><?php echo e(__('commission.shipping_price')); ?></td>
              <td><?php echo e(__('commission.shipper_amount')); ?></td>
              <td><?php echo e(__('commission.commissions')); ?></td>
              <td><?php echo e(__('commission.discounts')); ?></td>
              <td><?php echo e(__('commission.cash')); ?></td>
              <td><?php echo e(__('commission.walet')); ?></td>
              <td><?php echo e(__('commission.online')); ?></td>
              <td><?php echo e(__('commission.charge_wallet')); ?></td>
              <td><?php echo e(__('commission.deserved_amount')); ?></td>

            </tr>
            <tr>
              <td><?php echo e(__('commission.not_paid_commissions')); ?></td>
              <td><?php echo e($user->orders_price($ordersIds, 0)); ?> ريال  </td>
              <td><?php echo e($user->shipping_price($ordersIds, 0)); ?> ريال  </td>
              <td><?php echo e($user->shipper_amount($ordersIds, 0)); ?> ريال  </td>
              <td style="color: green ; font-weight: bold;" ><?php echo e($user->commission($ordersIds, 0)); ?> ريال  </td>
              <td><?php echo e($user->discount($ordersIds, 0)); ?> ريال  </td>
              <td><?php echo e($user->payment($ordersIds,1, 0)); ?> ريال  </td>
              <td><?php echo e($user->payment($ordersIds,2, 0)); ?> ريال  </td>
              <td><?php echo e($user->payment($ordersIds,3, 0)); ?> ريال  </td>
              <td><?php echo e($user->charge_wallet($ordersIds, 0)); ?> ريال  </td>
              <td style="color: red ; font-weight: bold;"><?php echo e($user->deserved_amount($ordersIds, 0)); ?> ريال  </td>

            </tr>
            <tr>
              <td><?php echo e(__('commission.paid_commissions')); ?></td>
              <td><?php echo e($user->orders_price($ordersIds, 1)); ?> ريال  </td>
              <td><?php echo e($user->shipping_price($ordersIds, 1)); ?> ريال  </td>
              <td><?php echo e($user->shipper_amount($ordersIds, 1)); ?> ريال  </td>
              <td style="color: green ; font-weight: bold;"> <?php echo e($user->commission($ordersIds, 1)); ?> ريال  </td>
              <td><?php echo e($user->discount($ordersIds, 1)); ?> ريال  </td>
              <td><?php echo e($user->payment($ordersIds,1, 1)); ?> ريال  </td>
              <td><?php echo e($user->payment($ordersIds,2, 1)); ?> ريال  </td>
              <td><?php echo e($user->payment($ordersIds,3, 1)); ?> ريال  </td>
              <td><?php echo e($user->charge_wallet($ordersIds, 1)); ?> ريال  </td>
              <td style="color: red ; font-weight: bold;" ><?php echo e($user->deserved_amount($ordersIds, 1)); ?> ريال  </td>

            </tr>
          </tbody>
        </table>

      </div>
      <?php endif; ?>

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
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kafoosaappsjanna/lara/resources/views/admin/users/edit.blade.php ENDPATH**/ ?>