

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


<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
  <!-- search -->

  <div class="kt-portlet">

  </div>



  <div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet__head">
      <div class="kt-portlet__head-label">
        <h3 class="kt-portlet__head-title">
          <div class="row">
            <?php if($type == 2 || $type == 3): ?>
            <button style="margin: 10px" type="button" class="btn btn-outline-success" data-toggle="modal"
              data-target="#Add"><?php echo e(trans('notification.notification')); ?></button>

            <!--begin:: Edit Modal-->
            <div class="modal fade" id="Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog" role="document">
                <!-- form -->
                <?php $notifyRouteName="admin.$typeName.notify" ?>
                <form class="kt_form_1" enctype="multipart/form-data" action="<?php echo e(route($notifyRouteName)); ?>"
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
          </div>
        </h3>
      </div>

    </div>
    <div class="kt-portlet__body table-responsive">
      <style>
        .dataTables_wrapper div.dataTables_filter {
          display: contents;
        }
      </style>

      <!--begin: Datatable -->
      <table class="table table-striped table-bordered table-hover table-checkable " id="kt_table_1">
        <?php if($type == 1): ?>
        <!-- admin -->
        <thead>
          <tr>
            <th>ID</th>
            <th><?php echo e(__('words.image')); ?></th>
            <th><?php echo e(__('user.name')); ?></th>
            <th><?php echo e(__('role.title')); ?></th>
            <th><?php echo e(__('words.mobile')); ?></th>
            <th><?php echo e(__('words.email')); ?></th>
            <th><?php echo e(__('words.active')); ?></th>
            <th><?php echo e(__('words.delete')); ?></th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr id="<?php echo e($item->id); ?>">
            <td><?php echo e($item->id); ?></td>
            <td>
              <a class="kt-userpic kt-userpic--circle kt-margin-r-5 kt-margin-t-5" data-toggle="kt-tooltip"
                data-placement="right">
                <img src="<?php echo e($item->imagePath()); ?>">&nbsp;
              </a>
            </td>
            <td>
              <?php if(Auth::user()->id == $item->id || $item->read_only==0 ): ?>
              <a href="<?php echo e(route('admin.admins.edit' , [ 'id' => $item->id ] )); ?>"
                class="kt-userpic kt-userpic--circle kt-margin-r-5 kt-margin-t-5" data-toggle="kt-tooltip"
                data-placement="right">
                <?php echo e($item->name); ?>

              </a>
              <?php else: ?>
              <?php echo e($item->name); ?>

              <?php endif; ?>
            </td>
            <td><?php echo e($item->roles->first()->title); ?></td>
            <td><?php echo e($item->phone); ?></td>
            <td><?php echo e($item->email); ?></td>
            <td>
              <?php if(Auth::user()->id != $item->id || $item->read_only==0 ): ?>
              <form action="<?php echo e(route('admin.admins.status',['id' => $item->id ])); ?>"
                onsubmit="ajaxForm(event,this,'dt_dv','er_dv','');" enctype="multipart/form-data" method="post">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" id="_method" name="_method" value="PUT">
                <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success">
                  <label>
                    <input type="checkbox" <?php echo e($item->is_active ? 'checked' : ''); ?> onclick="submitForm(this);">
                    <span></span>
                  </label>
                </span>
              </form>
              <?php endif; ?>
            </td>
            <td>
              <?php if(Auth::user()->id != $item->id || $item->read_only==0): ?>

              <?php $deleteRouteName="admin.$typeName.delete" ?>
               <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.buttons.but_delete_one','data' => ['link' => ''.e(route($deleteRouteName , [ 'id' => $item->id ] )).'']]); ?>
<?php $component->withName('buttons.but_delete_one'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['link' => ''.e(route($deleteRouteName , [ 'id' => $item->id ] )).'']); ?>
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
        <?php endif; ?>


        <?php if($type == 2 ): ?>
        <!-- free delegate -->
        <thead>
          <tr>
            <th>ID</th>
            <th><?php echo e(__('words.image')); ?></th>
            <th><?php echo e(__('user.name')); ?></th>
            <th><?php echo e(__('words.mobile')); ?></th>
            <th><?php echo e(__('user.gender')); ?></th>
            <th><?php echo e(__('user.amount')); ?></th>
            <th><?php echo e(__('user.card_number')); ?></th>
            <th>اسم البنك</th>
            <th>كود البنك </th>
            <th><?php echo e(__('order.status_1')); ?></th>
            <th><?php echo e(__('order.status_2')); ?></th>
            <th><?php echo e(__('order.status_3')); ?></th>
            <th><?php echo e(__('order.status_4')); ?></th>
            <th><?php echo e(__('order.status_5')); ?></th>
            <th><?php echo e(__('words.rate')); ?></th>
            

            
            <th><?php echo e(__('words.active')); ?></th>
            <th><?php echo e(__('words.delete')); ?></th>

          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr id="<?php echo e($item->id); ?>">
            <td><?php echo e($item->id); ?></td>
            <td>
              <span class="tooltips" data-toggle="modal" data-target="#userImage-<?php echo e($item->id); ?>" style="cursor: pointer">
                <img src="<?php echo e($item->image ? $item->imagePath() : $emptyImage); ?>" style="max-height : 100px" class="  img-responsive img-thumbnail img-rounded">
              </span>
              <div class="modal  fade" id="userImage-<?php echo e($item->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-dialog-centered ">
                  <div class="modal-content">
                    <div class="modal-content">
                      <div class="modal-body" style=" text-align: center;">
                        <img style="width : 100% " src="<?php echo e($item->image ? $item->imagePath() : $emptyImage); ?>" class="  img-responsive ">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </td>
            <td>
              <a href="<?php echo e(route('admin.clients.edit' , [ 'id' => $item->id ] )); ?>"
                class="kt-userpic kt-userpic--circle kt-margin-r-5 kt-margin-t-5" data-toggle="kt-tooltip"
                data-placement="right">
                <?php echo e($item->name ? $item->name : $item->phone); ?><br>
              </a>
            </td>
            <td><?php echo e($item->phone); ?></td>
            <td><?php echo e(($item->gender == 'male' || $item->gender == 'mail')  ?  __('user.male') :   __('user.female')); ?></td>
            <td><?php echo e($item->amount); ?></td>
            <td><?php echo e($item->iBanNum); ?></td>
            <td><?php echo e($item->benificiaryName); ?></td>
            <td><?php echo e($item->bankIdCode); ?></td>
            <td><?php echo e(\App\Models\Order::where(['user_id'=>$item->id,'status'=>1])->count()); ?></td>
            <td><?php echo e(\App\Models\Order::where(['user_id'=>$item->id,'status'=>2])->count()); ?></td>
            <td><?php echo e(\App\Models\Order::where(['user_id'=>$item->id,'status'=>3])->count()); ?></td>
            <td><?php echo e(\App\Models\Order::where(['user_id'=>$item->id,'status'=>4])->count()); ?></td>
            <td><?php echo e(\App\Models\Order::where(['user_id'=>$item->id,'status'=>5])->count()); ?></td>
            <td><?php echo e($item->rate); ?></td>

            

            
            <td>
              <form action="<?php echo e(route('admin.clients.status',['id' => $item->id ])); ?>"
                onsubmit="ajaxForm(event,this,'dt_dv','er_dv','');" enctype="multipart/form-data" method="post">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" id="_method" name="_method" value="PUT">
                <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success">
                  <label>
                    <input type="checkbox" <?php echo e($item->is_active ? 'checked' : ''); ?> onclick="submitForm(this);">
                    <span></span>
                  </label>
                </span>
              </form>
            </td>
            <td>
              <?php $deleteRouteName="admin.$typeName.delete" ?>
               <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.buttons.but_delete_one','data' => ['link' => ''.e(route($deleteRouteName , [ 'id' => $item->id ] )).'']]); ?>
<?php $component->withName('buttons.but_delete_one'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['link' => ''.e(route($deleteRouteName , [ 'id' => $item->id ] )).'']); ?>
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
        <?php endif; ?>

        <?php if($type == 3 ): ?>
        <!-- free delegate -->
        <thead>
          <tr>
            <th>ID</th>
            <th style="width: 10%"><?php echo e(__('words.image')); ?></th>
            <th style="width: 10%"><?php echo e(__('user.id_card')); ?></th>
            <th style="width: 10%"><?php echo e(__('user.license')); ?></th>
            <th style="width: 10%"><?php echo e(__('user.carType')); ?></th>
            <th style="width: 10%"><?php echo e(__('user.carNum')); ?></th>
            <th style="width: 10%"><?php echo e(__('user.carSequenceNum')); ?></th>
            <th style="width: 10%"><?php echo e(__('user.dateOfBirth')); ?></th>
            <th><?php echo e(__('user.name')); ?></th>
            <th><?php echo e(__('words.mobile')); ?></th>
            <th><?php echo e(__('user.gender')); ?></th>
            <th><?php echo e(__('user.card_number')); ?></th>
            <th>اسم البنك</th>
            <th>كود البنك </th>
            <th><?php echo e(__('order.status_2')); ?></th>
            <th><?php echo e(__('order.status_3')); ?></th>
            <th><?php echo e(__('order.status_4')); ?></th>
            <th><?php echo e(__('order.status_5')); ?></th>
            <th><?php echo e(__('commission.paid_commissions')); ?></th>
            <th><?php echo e(__('commission.not_paid_commissions')); ?></th>
            <th><?php echo e(__('commission.deserved_amount')); ?></th>
            <th><?php echo e(__('words.rate')); ?></th>
            <th>حاله المستخدم مع توصيل</th>

            
            <th><?php echo e(__('words.active')); ?></th>
            <th><?php echo e(__('words.approved')); ?></th>
            <th><?php echo e(__('words.delete')); ?></th>

          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr id="<?php echo e($item->id); ?>">
            <td><?php echo e($item->id); ?></td>

            <td>
              <span class="tooltips" data-toggle="modal" data-target="#userImage-<?php echo e($item->id); ?>"
                style="  cursor: pointer">
                <img src="<?php echo e($item->image ? $item->imagePath() : $emptyImage); ?>" style="width : 100px"
                  class="  img-responsive img-thumbnail img-rounded">
              </span>
              <div class="modal  fade" id="userImage-<?php echo e($item->id); ?>" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-dialog-centered ">
                  <div class="modal-content">

                    <div class="modal-content">
                      <div class="modal-body" style=" text-align: center;">
                        <img style="width : 100% " src="<?php echo e($item->image ? $item->imagePath() : $emptyImage); ?>" class="  img-responsive ">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </td>
            <td>
              <span class="tooltips" data-toggle="modal" data-target="#id_card-<?php echo e($item->id); ?>"
                style="  cursor: pointer">
                <img src="<?php echo e($item->id_card ? asset('storage/app/'.$item->id_card)  : $emptyImage); ?>" style="max-height : 100px"
                  class="  img-responsive img-thumbnail img-rounded">
              </span>
              <div class="modal  fade" id="id_card-<?php echo e($item->id); ?>" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-dialog-centered ">
                  <div class="modal-content">

                    <div class="modal-content">
                      <div class="modal-body" style=" text-align: center;">
                        <img style="width : 100% " src="<?php echo e($item->id_card ? asset('storage/app/'.$item->id_card)  : $emptyImage); ?>" class="  img-responsive ">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </td>
            <td>
              <span class="tooltips" data-toggle="modal" data-target="#license-<?php echo e($item->id); ?>" style="cursor: pointer">
                <img src="<?php echo e($item->license ? asset('storage/app/'.$item->license)  : $emptyImage); ?>" style="max-height : 100px" class="img-responsive img-thumbnail img-rounded">
              </span>
              <div class="modal fade" id="license-<?php echo e($item->id); ?>" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-dialog-centered ">
                  <div class="modal-content">
                    <div class="modal-content">
                      <div class="modal-body" style=" text-align: center;">
                        <img style="width : 100% " src="<?php echo e($item->license ? asset('storage/app/'.$item->license)  : $emptyImage); ?>" class="  img-responsive ">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </td>
            <?php if($item->carTypeId !== null): ?>
                <td><?php echo e(__('user.'.$item->carTypeId)); ?></td>
            <?php else: ?>
            <td>لا يوجد</td>
            <?php endif; ?>
            <?php if($item->carNumber !== null): ?>
            <td><?php echo e($item->carNumber); ?></td>
            <?php else: ?>
            <td>لا يوجد</td>
            <?php endif; ?>
            <?php if($item->vehicleSequenceNumber !== null): ?>
            <td><?php echo e($item->vehicleSequenceNumber); ?></td>
            <?php else: ?>
            <td>لا يوجد</td>
            <?php endif; ?>
            <?php if($item->dateOfBirth !== null): ?>
            <td><?php echo e($item->dateOfBirth); ?></td>
            <?php else: ?>
            <td>لا يوجد</td>
            <?php endif; ?>
            <td>
              <a href="<?php echo e(route('admin.shippers.edit' , [ 'id' => $item->id ] )); ?>"
                class="kt-userpic kt-userpic--circle kt-margin-r-5 kt-margin-t-5" data-toggle="kt-tooltip"
                data-placement="right">
                <?php echo e($item->name ? $item->name : $item->phone); ?><br>
              </a>
            </td>
            <td><?php echo e($item->phone); ?></td>
            <td><?php echo e(($item->gender == 'male') ||  ($item->gender == 'male,')  || ( $item->gender == 'mail') ?  __('user.male') :   __('user.female')); ?></td>
            <td><?php echo e($item->iBanNum); ?></td>
            <td><?php echo e($item->benificiaryName); ?></td>
            <td><?php echo e($item->bankIdCode); ?></td>
            <td><?php echo e(\App\Models\Order::where(['shipper_id'=>$item->id,'status'=>2])->count()); ?></td>
            <td><?php echo e(\App\Models\Order::where(['shipper_id'=>$item->id,'status'=>3])->count()); ?></td>
            <td><?php echo e(\App\Models\Order::where(['shipper_id'=>$item->id,'status'=>4])->count()); ?></td>
            <td><?php echo e(\App\Models\Order::where(['shipper_id'=>$item->id,'status'=>5])->count()); ?></td>

            <td style="color: green ; font-weight: bold;"><?php echo e($item->commission(\App\Models\Order::where(['shipper_id'=>$item->id,'status'=>4])->pluck('id'), 1)); ?>

            </td>
            <td style="color: green ; font-weight: bold;" ><?php echo e($item->commission(\App\Models\Order::where(['shipper_id'=>$item->id,'status'=>4])->pluck('id'), 0)); ?>

            </td>
            <td style="color: red ; font-weight: bold;">
              <?php echo e($item->deserved_amount(\App\Models\Order::where(['shipper_id'=>$item->id,'status'=>4])->pluck('id'), 0)); ?>

            </td>

            <td><?php echo e($item->rate); ?></td>
            <?php if($item->refrenceCode): ?>
            <td><?php echo e($item->refrenceCode); ?></td>
            <?php elseif($item->TawseelErrorMessage): ?>
            <?php 
                 $Tawseelmessage =  \App\Traits\GeneralTrait::getErrorCode($item->TawseelErrorMessage);
              
            ?>
            <td><?php echo e($Tawseelmessage); ?></td>
            <?php else: ?>
            <td>لم يتم تقديم طلب التسجيل</td>
            <?php endif; ?>
            
            <td>
              <form action="<?php echo e(route('admin.shippers.status',['id' => $item->id ])); ?>"
                onsubmit="ajaxForm(event,this,'dt_dv','er_dv','');" enctype="multipart/form-data" method="post">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" id="_method" name="_method" value="PUT">
                <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success">
                  <label>
                    <input type="checkbox" <?php echo e($item->is_active ? 'checked' : ''); ?> onclick="submitForm(this);">
                    <span></span>
                  </label>
                </span>
              </form>
            </td>
            <td>
              <form action="<?php echo e(route('admin.shippers.approved',['id' => $item->id ])); ?>"
                onsubmit="ajaxForm(event,this,'dt_dv','er_dv','');" enctype="multipart/form-data" method="post">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" id="_method" name="_method" value="PUT">
                <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success">
                  <label>
                    <input type="checkbox" <?php echo e($item->approved ? 'checked' : ''); ?> onclick="submitForm(this);">
                    <span></span>
                  </label>
                </span>
              </form>
            </td>
            <td>
              <?php $deleteRouteName="admin.$typeName.delete" ?>
               <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.buttons.but_delete_one','data' => ['link' => ''.e(route($deleteRouteName , [ 'id' => $item->id ] )).'']]); ?>
<?php $component->withName('buttons.but_delete_one'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['link' => ''.e(route($deleteRouteName , [ 'id' => $item->id ] )).'']); ?>
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
        <?php endif; ?>


      </table>



      <!--end: Datatable -->
    </div>
  </div>
</div>


<?php $__env->stopSection(); ?>




<?php $__env->startSection('js_pagelevel'); ?>
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
  function submitForm(me)
{
  $(me).closest("form").submit();
}
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kafoosaappsjanna/lara/resources/views/admin/users/type.blade.php ENDPATH**/ ?>