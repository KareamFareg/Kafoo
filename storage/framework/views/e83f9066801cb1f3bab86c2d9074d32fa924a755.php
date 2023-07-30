<?php $__env->startSection('content'); ?>

<!-- home page -->



<!-- general widgets -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

  <!--begin:: Widgets/Stats-->
  <div class="kt-portlet">

    <div class="kt-portlet__body  kt-portlet__body--fit">
      <div class="row row-no-padding row-col-separator-xl">

        <div class="col-md-12 col-lg-6 col-xl-4">
          <!--begin::Total Profit-->
          <div class="kt-widget24">
            <div class="kt-widget24__details">
              <div class="kt-widget24__info">
                <h4 class="kt-widget24__title">
                  <?php echo e(__('admin/dashboard.clients')); ?>

                </h4>
                <p> <span class="kt-widget24__desc">
                    <?php echo e(__('words.active')); ?> : <?php echo e($clientCountActive); ?>

                  </span>
                </p>
                <p>
                  <span class="kt-widget24__desc">
                    <?php echo e(__('words.inactive')); ?> : <?php echo e($clientCountInActive); ?>

                  </span>
                </p>
              </div>
              <span class="kt-widget24__stats kt-font-brand">
                <?php echo e($clientCount); ?>

              </span>
            </div>
            <div class="progress progress--sm">
              <div class="progress-bar kt-bg-brand" role="progressbar" style="width: <?php echo e($clientPercent); ?>%;"
                aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

          </div>
          <!--end::Total Profit-->
        </div>

        <div class="col-md-12 col-lg-6 col-xl-4">
          <!--begin::Total Profit-->
          <div class="kt-widget24">
            <div class="kt-widget24__details">
              <div class="kt-widget24__info">
                <h4 class="kt-widget24__title">
                  <?php echo e(__('admin/dashboard.shippers')); ?>

                </h4>
                <p> <span class="kt-widget24__desc">
                    <?php echo e(__('words.active')); ?> : <?php echo e($shipperCountActive); ?>

                  </span>
                </p>
                <p>
                  <span class="kt-widget24__desc">
                    <?php echo e(__('words.inactive')); ?> : <?php echo e($shipperCountInActive); ?>

                  </span>
                </p>
              </div>
              <span class="kt-widget24__stats kt-font-warning">
                <?php echo e($shipperCount); ?>

              </span>
            </div>
            <div class="progress progress--sm">
              <div class="progress-bar kt-bg-warning" role="progressbar" style="width: <?php echo e($shipperPercent); ?>%;"
                aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

          </div>
          <!--end::Total Profit-->
        </div>

        <div class="col-md-12 col-lg-6 col-xl-4">
          <!--begin::Total Profit-->
          <div class="kt-widget24">
            <div class="kt-widget24__details">
              <div class="kt-widget24__info">
                <h4 class="kt-widget24__title">
                  <?php echo e(__('admin/dashboard.admins')); ?>

                </h4>
                <p> <span class="kt-widget24__desc">
                    <?php echo e(__('words.active')); ?> : <?php echo e($adminCountActive); ?>

                  </span>
                </p>
                <p>
                  <span class="kt-widget24__desc">
                    <?php echo e(__('words.inactive')); ?> : <?php echo e($adminCountInActive); ?>

                  </span>
                </p>
              </div>
              <span class="kt-widget24__stats kt-font-success">
                <?php echo e($adminCount); ?>

              </span>
            </div>
            <div class="progress progress--sm">
              <div class="progress-bar kt-bg-success" role="progressbar" style="width: <?php echo e($adminPercent); ?>%;"
                aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

          </div>
          <!--end::Total Profit-->
        </div>



      </div>

    </div>
  </div>
</div>


<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">


  <!--begin:: Widgets/Stats-->
  <div class="kt-portlet">
    <div class="kt-portlet__body  kt-portlet__body--fit">
      <div class="row row-no-padding row-col-separator-xl">
        <div class="col-xl-12 col-lg-12 order-lg-6 order-xl-1">
          <!--begin:: Widgets/Revenue Change-->
          <div class="kt-portlet kt-portlet--height-fluid">
            <div class="kt-widget14">
              <div class="kt-widget14__header">
                <h3 class="kt-widget14__title">
                  <?php echo e(__('order.title')); ?> - <?php echo e(__('order.chart')); ?>

                </h3>

                <dir class="row">

                  <div class=" form-group col-lg-2">
                    <label for=""><?php echo e(__('commission.from')); ?></label>
                    <input class="form-control datepicker"  placeholder="yyyy-mm-dd"  autocomplete="off" id="order_from" name="from">
                  </div>
                  <div class=" form-group col-lg-2">
                    <label for=""><?php echo e(__('commission.to')); ?></label>
                    <input class="form-control datepicker"  placeholder="yyyy-mm-dd"  autocomplete="off" id="order_to" name="to">
                  </div>
                  <div class="form-group col-lg-2">
                    <label for="">&nbsp;</label>
                    <button class="form-control btn btn-success " onclick="order_search()">
                      <i class=" flaticon flaticon2-search-1"></i><?php echo e(__('words.search')); ?>

                    </button>
                  </div>
                </dir>


              </div>
              <div class="kt-widget14__content" id="order_chart_div">

              </div>
            </div>
          </div>
          <!--end:: Widgets/Revenue Change-->
        </div>
      </div>
    </div>
  </div>



  <!--end:: Widgets/Stats-->

</div>

<!-- End general widgets -->
<?php
$status=1;
?>
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

  <div class="kt-portlet kt-portlet--mobile">

    <div class="kt-portlet__head">
      <div class="kt-portlet__head-label">
        <h3 class="kt-portlet__head-title">
          <div class="row">
            <label for="" style="margin: 10px"><?php echo e(__('order.title').' - '. __("order.status_$status")); ?></label>
          </div>
        </h3>
      </div>
    </div>


    <div class="kt-portlet__body">
      <style>
        .dataTables_wrapper div.dataTables_filter {
          display: contents;
        }
      </style>
      <div class="table-responsive">

        <!--begin: Datatable -->
        <table class="table table-striped- table-bordered table-hover table-checkable deletable " id="kt_table_1">
          <thead>
            <tr>
              <th>ID</th>
              <th><?php echo e(__('order.client')); ?></th>
              <?php if($status !=1 ): ?> <th><?php echo e(__('order.shipper')); ?></th><?php endif; ?>

              <th><?php echo e(__('order.type')); ?></th>

              <?php if($status !=1 ): ?>
              <th><?php echo e(__('order.shipping')); ?></th>
              <th><?php echo e(__('order.total_first')); ?></th>
              <th><?php echo e(__('order.discount')); ?></th>
              <th><?php echo e(__('order.total')); ?></th>
              <?php endif; ?>

              <th><?php echo e(__('order.created_at')); ?></th>
              <?php if($status !=1 ): ?><th><?php echo e(__('order.accept_date')); ?></th><?php endif; ?>
              <?php if($status ==6 || $status ==4 ): ?><th><?php echo e(__('order.delivery_date')); ?></th><?php endif; ?>
              <?php if($status ==6 || $status ==5 ): ?><th><?php echo e(__('order.cancel_date')); ?></th><?php endif; ?>
              <?php if($status ==6 || $status ==5 ): ?><th><?php echo e(__('order.note')); ?></th><?php endif; ?>

              <?php if($status ==6 ): ?><th><?php echo e(__('words.order_status')); ?></th><?php endif; ?>
              <?php if($status !=1 ): ?><th><?php echo e(__('words.rate')); ?></th><?php endif; ?>

              <?php if($status !=1 ): ?><th><?php echo e(__('words.chat')); ?></th><?php endif; ?>
              <th><?php echo e(__('words.order')); ?></th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $orders1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr id="<?php echo e($item->id); ?>">
              <td>
                <a href="<?php echo e(route('admin.orders.show' , [ 'id' => $item->id ] )); ?>"
                  class="kt-userpic kt-userpic--circle kt-margin-r-5 kt-margin-t-5" data-toggle="kt-tooltip"
                  data-placement="right">
                  <?php echo e($item->code); ?>

                </a>
              </td>
              <td>
                <?php if($item->user_data): ?>
                <a href="<?php echo e(route('admin.clients.edit', [ 'id' => optional($item->user_data)->id ] )); ?>">
                  <?php echo e(optional($item->user_data)->name); ?>

                </a>
                <?php else: ?>
                <?php echo app('translator')->get('words.deleted'); ?>
                <?php endif; ?>

              </td>

              <?php if($status !=1 ): ?>
              <td>
                <?php if(isset($item->shipper_data)): ?>
                <a href="<?php echo e(route('admin.shippers.edit', [ 'id' => optional($item->shipper_data)->id ] )); ?>">
                  <?php echo e(optional($item->shipper_data)->name); ?>

                </a>
                <?php else: ?>
                <?php echo app('translator')->get('words.deleted'); ?>
                <?php endif; ?>
              </td>
              <?php endif; ?>

              <!-- error -->
              <td></td>

              <?php if($status !=1 ): ?>
              <td><?php echo e(optional($item->offer)->shipping); ?></td>
              <td><?php echo e($item->price); ?></td>
              <td><?php echo e($item->discount); ?></td>
              <td><?php echo e($item->price  + optional($item->offer)->shipping - $item->discount); ?></td>
              <?php endif; ?>

              <td><?php echo e($item->created_at); ?></td>
              <?php if($status !=1 ): ?><td><?php echo e($item->accept_date); ?></td><?php endif; ?>
              <?php if($status ==6 || $status ==4 ): ?><td><?php echo e($item->delivery_date); ?></td><?php endif; ?>
              <?php if($status ==6 || $status ==5 ): ?><td><?php echo e($item->cancel_date); ?></td><?php endif; ?>
              <?php if($status ==6 || $status ==5 ): ?><td><?php echo e($item->note); ?></td><?php endif; ?>
              <?php if($status ==6 ): ?><td><?php echo e($item->orderStatus()); ?></td><?php endif; ?>

              <?php if($status !=1 ): ?> <td>
                <a class="btn btn-bold btn-label-brand btn-sm"
                  data-href="<?php echo e(route('admin.orders.rate' , [ 'id' => $item->id ] )); ?>"
                  onclick="ajaxlink(event,this,'contact_us_details','err_contact_us_details','');" data-toggle="modal"
                  data-target="#modal_contact_us_details"><?php echo e(__('words.details')); ?></a>
              </td><?php endif; ?>
              <?php if($status !=1 ): ?>
              <td>
                 <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.buttons.but_link','data' => ['link' => ''.e(route('admin.chat.order' , [ 'id' => $item->id ] )).'','title' => ''.e(__('words.preview')).'']]); ?>
<?php $component->withName('buttons.but_link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['link' => ''.e(route('admin.chat.order' , [ 'id' => $item->id ] )).'','title' => ''.e(__('words.preview')).'']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
              </td>
              <?php endif; ?>
              <td>
                 <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.buttons.but_link','data' => ['link' => ''.e(route('admin.orders.show' , [ 'id' => $item->id ] )).'','title' => ''.e(__('words.details')).'']]); ?>
<?php $component->withName('buttons.but_link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['link' => ''.e(route('admin.orders.show' , [ 'id' => $item->id ] )).'','title' => ''.e(__('words.details')).'']); ?>
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

        <div class="modal fade" id="modal_contact_us_details" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <!-- <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5> -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
              </div>
              <div class="modal-body" id="contact_us_details">

              </div>
            </div>
          </div>
        </div>
        <div id="err_contact_us_details"></div>

        <!--end: Datatable -->
      </div>
    </div>
  </div>
</div>

<?php
$status=2;
?>
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

  <div class="kt-portlet kt-portlet--mobile">

    <div class="kt-portlet__head">
      <div class="kt-portlet__head-label">
        <h3 class="kt-portlet__head-title">
          <div class="row">
            <label for="" style="margin: 10px"><?php echo e(__('order.title').' - '. __("order.status_$status")); ?></label>
          </div>
        </h3>
      </div>
    </div>


    <div class="kt-portlet__body">
      <style>
        .dataTables_wrapper div.dataTables_filter {
          display: contents;
        }
      </style>
      <div class="table-responsive">

        <!--begin: Datatable -->
        <table class="table table-striped- table-bordered table-hover table-checkable deletable " id="kt_table_1">
          <thead>
            <tr>
              <th>ID</th>
              <th><?php echo e(__('order.client')); ?></th>
              <?php if($status !=1 ): ?> <th><?php echo e(__('order.shipper')); ?></th><?php endif; ?>

              <th><?php echo e(__('order.type')); ?></th>

              <?php if($status !=1 ): ?>
              <th><?php echo e(__('order.shipping')); ?></th>
              <th><?php echo e(__('order.total_first')); ?></th>
              <th><?php echo e(__('order.discount')); ?></th>
              <th><?php echo e(__('order.total')); ?></th>
              <?php endif; ?>

              <th><?php echo e(__('order.created_at')); ?></th>
              <?php if($status !=1 ): ?><th><?php echo e(__('order.accept_date')); ?></th><?php endif; ?>
              <?php if($status ==6 || $status ==4 ): ?><th><?php echo e(__('order.delivery_date')); ?></th><?php endif; ?>
              <?php if($status ==6 || $status ==5 ): ?><th><?php echo e(__('order.cancel_date')); ?></th><?php endif; ?>
              <?php if($status ==6 || $status ==5 ): ?><th><?php echo e(__('order.note')); ?></th><?php endif; ?>

              <?php if($status ==6 ): ?><th><?php echo e(__('words.order_status')); ?></th><?php endif; ?>
              <?php if($status !=1 ): ?><th><?php echo e(__('words.rate')); ?></th><?php endif; ?>

              <?php if($status !=1 ): ?><th><?php echo e(__('words.chat')); ?></th><?php endif; ?>
              <th><?php echo e(__('words.order')); ?></th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $orders2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr id="<?php echo e($item->id); ?>">
              <td>
                <a href="<?php echo e(route('admin.orders.show' , [ 'id' => $item->id ] )); ?>"
                  class="kt-userpic kt-userpic--circle kt-margin-r-5 kt-margin-t-5" data-toggle="kt-tooltip"
                  data-placement="right">
                  <?php echo e($item->code); ?>

                </a>
              </td>
              <td>
                <?php if($item->user_data): ?>
                <a href="<?php echo e(route('admin.clients.edit', [ 'id' => optional($item->user_data)->id ] )); ?>">
                  <?php echo e(optional($item->user_data)->name); ?>

                </a>
                <?php else: ?>
                <?php echo app('translator')->get('words.deleted'); ?>
                <?php endif; ?>
              </td>

              <?php if($status !=1 ): ?>
              <td>
                <?php if(isset($item->shipper_data)): ?>
                <a href="<?php echo e(route('admin.shippers.edit', [ 'id' => optional($item->shipper_data)->id ] )); ?>">
                  <?php echo e(optional($item->shipper_data)->name); ?>

                </a>
                <?php else: ?>
                <?php echo app('translator')->get('words.deleted'); ?>
                <?php endif; ?>
              </td>
              <?php endif; ?>


              <td><?php echo e($item->type_title()); ?></td>

              <?php if($status !=1 ): ?>
              <td><?php echo e(optional($item->offer)->shipping); ?></td>
              <td><?php echo e($item->price); ?></td>
              <td><?php echo e($item->discount); ?></td>
              <td><?php echo e($item->price  + optional($item->offer)->shipping - $item->discount); ?></td>
              <?php endif; ?>

              <td><?php echo e($item->created_at); ?></td>
              <?php if($status !=1 ): ?><td><?php echo e($item->accept_date); ?></td><?php endif; ?>
              <?php if($status ==6 || $status ==4 ): ?><td><?php echo e($item->delivery_date); ?></td><?php endif; ?>
              <?php if($status ==6 || $status ==5 ): ?><td><?php echo e($item->cancel_date); ?></td><?php endif; ?>
              <?php if($status ==6 || $status ==5 ): ?><td><?php echo e($item->note); ?></td><?php endif; ?>
              <?php if($status ==6 ): ?><td><?php echo e($item->orderStatus()); ?></td><?php endif; ?>

              <?php if($status !=1 ): ?> <td>
                <a class="btn btn-bold btn-label-brand btn-sm"
                  data-href="<?php echo e(route('admin.orders.rate' , [ 'id' => $item->id ] )); ?>"
                  onclick="ajaxlink(event,this,'contact_us_details','err_contact_us_details','');" data-toggle="modal"
                  data-target="#modal_contact_us_details"><?php echo e(__('words.details')); ?></a>
              </td><?php endif; ?>
              <?php if($status !=1 ): ?>
              <td>
                 <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.buttons.but_link','data' => ['link' => ''.e(route('admin.chat.order' , [ 'id' => $item->id ] )).'','title' => ''.e(__('words.preview')).'']]); ?>
<?php $component->withName('buttons.but_link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['link' => ''.e(route('admin.chat.order' , [ 'id' => $item->id ] )).'','title' => ''.e(__('words.preview')).'']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
              </td>
              <?php endif; ?>
              <td>
                 <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.buttons.but_link','data' => ['link' => ''.e(route('admin.orders.show' , [ 'id' => $item->id ] )).'','title' => ''.e(__('words.details')).'']]); ?>
<?php $component->withName('buttons.but_link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['link' => ''.e(route('admin.orders.show' , [ 'id' => $item->id ] )).'','title' => ''.e(__('words.details')).'']); ?>
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

        <div class="modal fade" id="modal_contact_us_details" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <!-- <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5> -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
              </div>
              <div class="modal-body" id="contact_us_details">

              </div>
            </div>
          </div>
        </div>
        <div id="err_contact_us_details"></div>

        <!--end: Datatable -->
      </div>
    </div>
  </div>
</div>


<?php
$status=3;
?>
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

  <div class="kt-portlet kt-portlet--mobile">

    <div class="kt-portlet__head">
      <div class="kt-portlet__head-label">
        <h3 class="kt-portlet__head-title">
          <div class="row">
            <label for="" style="margin: 10px"><?php echo e(__('order.title').' - '. __("order.status_$status")); ?></label>
          </div>
        </h3>
      </div>
    </div>


    <div class="kt-portlet__body">
      <style>
        .dataTables_wrapper div.dataTables_filter {
          display: contents;
        }
      </style>
      <div class="table-responsive">

        <!--begin: Datatable -->
        <table class="table table-striped- table-bordered table-hover table-checkable deletable " id="kt_table_1">
          <thead>
            <tr>
              <th>ID</th>
              <th><?php echo e(__('order.client')); ?></th>
              <?php if($status !=1 ): ?> <th><?php echo e(__('order.shipper')); ?></th><?php endif; ?>

              <th><?php echo e(__('order.type')); ?></th>

              <?php if($status !=1 ): ?>
              <th><?php echo e(__('order.shipping')); ?></th>
              <th><?php echo e(__('order.total_first')); ?></th>
              <th><?php echo e(__('order.discount')); ?></th>
              <th><?php echo e(__('order.total')); ?></th>
              <?php endif; ?>

              <th><?php echo e(__('order.created_at')); ?></th>
              <?php if($status !=1 ): ?><th><?php echo e(__('order.accept_date')); ?></th><?php endif; ?>
              <?php if($status ==6 || $status ==4 ): ?><th><?php echo e(__('order.delivery_date')); ?></th><?php endif; ?>
              <?php if($status ==6 || $status ==5 ): ?><th><?php echo e(__('order.cancel_date')); ?></th><?php endif; ?>
              <?php if($status ==6 || $status ==5 ): ?><th><?php echo e(__('order.note')); ?></th><?php endif; ?>

              <?php if($status ==6 ): ?><th><?php echo e(__('words.order_status')); ?></th><?php endif; ?>
              <?php if($status !=1 ): ?><th><?php echo e(__('words.rate')); ?></th><?php endif; ?>

              <?php if($status !=1 ): ?><th><?php echo e(__('words.chat')); ?></th><?php endif; ?>
              <th><?php echo e(__('words.order')); ?></th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $orders3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr id="<?php echo e($item->id); ?>">
              <td>
                <a href="<?php echo e(route('admin.orders.show' , [ 'id' => $item->id ] )); ?>"
                  class="kt-userpic kt-userpic--circle kt-margin-r-5 kt-margin-t-5" data-toggle="kt-tooltip"
                  data-placement="right">
                  <?php echo e($item->code); ?>

                </a>
              </td>
              <td>
                <?php if($item->user_data): ?>
                <a href="<?php echo e(route('admin.clients.edit', [ 'id' => optional($item->user_data)->id ] )); ?>">
                  <?php echo e(optional($item->user_data)->name); ?>

                </a>
                <?php else: ?>
                <?php echo app('translator')->get('words.deleted'); ?>
                <?php endif; ?>
              </td>

              <?php if($status !=1 ): ?>
              <td>
                <?php if(isset($item->shipper_data)): ?>
                <a href="<?php echo e(route('admin.shippers.edit', [ 'id' => optional($item->shipper_data)->id ] )); ?>">
                  <?php echo e(optional($item->shipper_data)->name); ?>

                </a>
                <?php else: ?>
                <?php echo app('translator')->get('words.deleted'); ?>
                <?php endif; ?>
              </td>
              <?php endif; ?>


              <td><?php echo e($item->type_title()); ?></td>

              <?php if($status !=1 ): ?>
              <td><?php echo e(optional($item->offer)->shipping); ?></td>
              <td><?php echo e($item->price); ?></td>
              <td><?php echo e($item->discount); ?></td>
              <td><?php echo e($item->price  + optional($item->offer)->shipping - $item->discount); ?></td>
              <?php endif; ?>

              <td><?php echo e($item->created_at); ?></td>
              <?php if($status !=1 ): ?><td><?php echo e($item->accept_date); ?></td><?php endif; ?>
              <?php if($status ==6 || $status ==4 ): ?><td><?php echo e($item->delivery_date); ?></td><?php endif; ?>
              <?php if($status ==6 || $status ==5 ): ?><td><?php echo e($item->cancel_date); ?></td><?php endif; ?>
              <?php if($status ==6 || $status ==5 ): ?><td><?php echo e($item->note); ?></td><?php endif; ?>
              <?php if($status ==6 ): ?><td><?php echo e($item->orderStatus()); ?></td><?php endif; ?>

              <?php if($status !=1 ): ?> <td>
                <a class="btn btn-bold btn-label-brand btn-sm"
                  data-href="<?php echo e(route('admin.orders.rate' , [ 'id' => $item->id ] )); ?>"
                  onclick="ajaxlink(event,this,'contact_us_details','err_contact_us_details','');" data-toggle="modal"
                  data-target="#modal_contact_us_details"><?php echo e(__('words.details')); ?></a>
              </td><?php endif; ?>
              <?php if($status !=1 ): ?>
              <td>
                 <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.buttons.but_link','data' => ['link' => ''.e(route('admin.chat.order' , [ 'id' => $item->id ] )).'','title' => ''.e(__('words.preview')).'']]); ?>
<?php $component->withName('buttons.but_link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['link' => ''.e(route('admin.chat.order' , [ 'id' => $item->id ] )).'','title' => ''.e(__('words.preview')).'']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
              </td>
              <?php endif; ?>
              <td>
                 <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.buttons.but_link','data' => ['link' => ''.e(route('admin.orders.show' , [ 'id' => $item->id ] )).'','title' => ''.e(__('words.details')).'']]); ?>
<?php $component->withName('buttons.but_link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['link' => ''.e(route('admin.orders.show' , [ 'id' => $item->id ] )).'','title' => ''.e(__('words.details')).'']); ?>
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

        <div class="modal fade" id="modal_contact_us_details" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <!-- <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5> -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
              </div>
              <div class="modal-body" id="contact_us_details">

              </div>
            </div>
          </div>
        </div>
        <div id="err_contact_us_details"></div>

        <!--end: Datatable -->
      </div>
    </div>
  </div>
</div>


<?php
$status=4;
?>
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

  <div class="kt-portlet kt-portlet--mobile">

    <div class="kt-portlet__head">
      <div class="kt-portlet__head-label">
        <h3 class="kt-portlet__head-title">
          <div class="row">
            <label for="" style="margin: 10px"><?php echo e(__('order.title').' - '. __("order.status_$status")); ?></label>
          </div>
        </h3>
      </div>
    </div>


    <div class="kt-portlet__body">
      <style>
        .dataTables_wrapper div.dataTables_filter {
          display: contents;
        }
      </style>
      <div class="table-responsive">

        <!--begin: Datatable -->
        <table class="table table-striped- table-bordered table-hover table-checkable deletable " id="kt_table_1">
          <thead>
            <tr>
              <th>ID</th>
              <th><?php echo e(__('order.client')); ?></th>
              <?php if($status !=1 ): ?> <th><?php echo e(__('order.shipper')); ?></th><?php endif; ?>

              <th><?php echo e(__('order.type')); ?></th>

              <?php if($status !=1 ): ?>
              <th><?php echo e(__('order.shipping')); ?></th>
              <th><?php echo e(__('order.total_first')); ?></th>
              <th><?php echo e(__('order.discount')); ?></th>
              <th><?php echo e(__('order.total')); ?></th>
              <?php endif; ?>

              <th><?php echo e(__('order.created_at')); ?></th>
              <?php if($status !=1 ): ?><th><?php echo e(__('order.accept_date')); ?></th><?php endif; ?>
              <?php if($status ==6 || $status ==4 ): ?><th><?php echo e(__('order.delivery_date')); ?></th><?php endif; ?>
              <?php if($status ==6 || $status ==5 ): ?><th><?php echo e(__('order.cancel_date')); ?></th><?php endif; ?>
              <?php if($status ==6 || $status ==5 ): ?><th><?php echo e(__('order.note')); ?></th><?php endif; ?>

              <?php if($status ==6 ): ?><th><?php echo e(__('words.order_status')); ?></th><?php endif; ?>
              <?php if($status !=1 ): ?><th><?php echo e(__('words.rate')); ?></th><?php endif; ?>

              <?php if($status !=1 ): ?><th><?php echo e(__('words.chat')); ?></th><?php endif; ?>
              <th><?php echo e(__('words.order')); ?></th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $orders4; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr id="<?php echo e($item->id); ?>">
              <td>
                <a href="<?php echo e(route('admin.orders.show' , [ 'id' => $item->id ] )); ?>"
                  class="kt-userpic kt-userpic--circle kt-margin-r-5 kt-margin-t-5" data-toggle="kt-tooltip"
                  data-placement="right">
                  <?php echo e($item->code); ?>

                </a>
              </td>
              <td>
                <?php if($item->user_data): ?>
                <a href="<?php echo e(route('admin.clients.edit', [ 'id' => optional($item->user_data)->id ] )); ?>">
                  <?php echo e(optional($item->user_data)->name); ?>

                </a>
                <?php else: ?>
                <?php echo app('translator')->get('words.deleted'); ?>
                <?php endif; ?>
              </td>

              <?php if($status !=1 ): ?>
              <td>
                <?php if(isset($item->shipper_data)): ?>
                <a href="<?php echo e(route('admin.shippers.edit', [ 'id' => optional($item->shipper_data)->id ] )); ?>">
                  <?php echo e(optional($item->shipper_data)->name); ?>

                </a>
                <?php else: ?>
                <?php echo app('translator')->get('words.deleted'); ?>
                <?php endif; ?>
              </td>
              <?php endif; ?>


              <td><?php echo e($item->type_title()); ?></td>

              <?php if($status !=1 ): ?>
              <td><?php echo e(optional($item->offer)->shipping); ?></td>
              <td><?php echo e($item->price); ?></td>
              <td><?php echo e($item->discount); ?></td>
              <td><?php echo e($item->price  + optional($item->offer)->shipping - $item->discount); ?></td>
              <?php endif; ?>

              <td><?php echo e($item->created_at); ?></td>
              <?php if($status !=1 ): ?><td><?php echo e($item->accept_date); ?></td><?php endif; ?>
              <?php if($status ==6 || $status ==4 ): ?><td><?php echo e($item->delivery_date); ?></td><?php endif; ?>
              <?php if($status ==6 || $status ==5 ): ?><td><?php echo e($item->cancel_date); ?></td><?php endif; ?>
              <?php if($status ==6 || $status ==5 ): ?><td><?php echo e($item->note); ?></td><?php endif; ?>
              <?php if($status ==6 ): ?><td><?php echo e($item->orderStatus()); ?></td><?php endif; ?>

              <?php if($status !=1 ): ?> <td>
                <a class="btn btn-bold btn-label-brand btn-sm"
                  data-href="<?php echo e(route('admin.orders.rate' , [ 'id' => $item->id ] )); ?>"
                  onclick="ajaxlink(event,this,'contact_us_details','err_contact_us_details','');" data-toggle="modal"
                  data-target="#modal_contact_us_details"><?php echo e(__('words.details')); ?></a>
              </td><?php endif; ?>
              <?php if($status !=1 ): ?>
              <td>
                 <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.buttons.but_link','data' => ['link' => ''.e(route('admin.chat.order' , [ 'id' => $item->id ] )).'','title' => ''.e(__('words.preview')).'']]); ?>
<?php $component->withName('buttons.but_link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['link' => ''.e(route('admin.chat.order' , [ 'id' => $item->id ] )).'','title' => ''.e(__('words.preview')).'']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
              </td>
              <?php endif; ?>
              <td>
                 <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.buttons.but_link','data' => ['link' => ''.e(route('admin.orders.show' , [ 'id' => $item->id ] )).'','title' => ''.e(__('words.details')).'']]); ?>
<?php $component->withName('buttons.but_link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['link' => ''.e(route('admin.orders.show' , [ 'id' => $item->id ] )).'','title' => ''.e(__('words.details')).'']); ?>
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

        <div class="modal fade" id="modal_contact_us_details" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <!-- <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5> -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
              </div>
              <div class="modal-body" id="contact_us_details">

              </div>
            </div>
          </div>
        </div>
        <div id="err_contact_us_details"></div>

        <!--end: Datatable -->
      </div>
    </div>
  </div>
</div>




<?php
$status=5;
?>
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

  <div class="kt-portlet kt-portlet--mobile">

    <div class="kt-portlet__head">
      <div class="kt-portlet__head-label">
        <h3 class="kt-portlet__head-title">
          <div class="row">
            <label for="" style="margin: 10px"><?php echo e(__('order.title').' - '. __("order.status_$status")); ?></label>
          </div>
        </h3>
      </div>
    </div>


    <div class="kt-portlet__body">
      <style>
        .dataTables_wrapper div.dataTables_filter {
          display: contents;
        }
      </style>
      <div class="table-responsive">

        <!--begin: Datatable -->
        <table class="table table-striped- table-bordered table-hover table-checkable deletable " id="kt_table_1">
          <thead>
            <tr>
              <th>ID</th>
              <th><?php echo e(__('order.client')); ?></th>
              <?php if($status !=1 ): ?> <th><?php echo e(__('order.shipper')); ?></th><?php endif; ?>

              <th><?php echo e(__('order.type')); ?></th>

              <?php if($status !=1 ): ?>
              <th><?php echo e(__('order.shipping')); ?></th>
              <th><?php echo e(__('order.total_first')); ?></th>
              <th><?php echo e(__('order.discount')); ?></th>
              <th><?php echo e(__('order.total')); ?></th>
              <?php endif; ?>

              <th><?php echo e(__('order.created_at')); ?></th>
              <?php if($status !=1 ): ?><th><?php echo e(__('order.accept_date')); ?></th><?php endif; ?>
              <?php if($status ==6 || $status ==4 ): ?><th><?php echo e(__('order.delivery_date')); ?></th><?php endif; ?>
              <?php if($status ==6 || $status ==5 ): ?><th><?php echo e(__('order.cancel_date')); ?></th><?php endif; ?>
              <?php if($status ==6 || $status ==5 ): ?><th><?php echo e(__('order.note')); ?></th><?php endif; ?>

              <?php if($status ==6 ): ?><th><?php echo e(__('words.order_status')); ?></th><?php endif; ?>
              <?php if($status !=1 ): ?><th><?php echo e(__('words.rate')); ?></th><?php endif; ?>

              <?php if($status !=1 ): ?><th><?php echo e(__('words.chat')); ?></th><?php endif; ?>
              <th><?php echo e(__('words.order')); ?></th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $orders5; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr id="<?php echo e($item->id); ?>">
              <td>
                <a href="<?php echo e(route('admin.orders.show' , [ 'id' => $item->id ] )); ?>"
                  class="kt-userpic kt-userpic--circle kt-margin-r-5 kt-margin-t-5" data-toggle="kt-tooltip"
                  data-placement="right">
                  <?php echo e($item->code); ?>

                </a>
              </td>
              <td>
                <?php if($item->user_data): ?>
                <a href="<?php echo e(route('admin.clients.edit', [ 'id' => optional($item->user_data)->id ] )); ?>">
                  <?php echo e(optional($item->user_data)->name); ?>

                </a>
                <?php else: ?>
                <?php echo app('translator')->get('words.deleted'); ?>
                <?php endif; ?>
              </td>

              <?php if($status !=1 ): ?>
              <td>
                <?php if(isset($item->shipper_data)): ?>
                <a href="<?php echo e(route('admin.shippers.edit', [ 'id' => optional($item->shipper_data)->id ] )); ?>">
                  <?php echo e(optional($item->shipper_data)->name); ?>

                </a>
                <?php else: ?>
                <?php echo app('translator')->get('words.deleted'); ?>
                <?php endif; ?>
              </td>
              <?php endif; ?>


              <td><?php echo e($item->type_title()); ?></td>

              <?php if($status !=1 ): ?>
              <td><?php echo e(optional($item->offer)->shipping); ?></td>
              <td><?php echo e($item->price); ?></td>
              <td><?php echo e($item->discount); ?></td>
              <td><?php echo e($item->price  + optional($item->offer)->shipping - $item->discount); ?></td>
              <?php endif; ?>

              <td><?php echo e($item->created_at); ?></td>
              <?php if($status !=1 ): ?><td><?php echo e($item->accept_date); ?></td><?php endif; ?>
              <?php if($status ==6 || $status ==4 ): ?><td><?php echo e($item->delivery_date); ?></td><?php endif; ?>
              <?php if($status ==6 || $status ==5 ): ?><td><?php echo e($item->cancel_date); ?></td><?php endif; ?>
              <?php if($status ==6 || $status ==5 ): ?><td><?php echo e($item->note); ?></td><?php endif; ?>
              <?php if($status ==6 ): ?><td><?php echo e($item->orderStatus()); ?></td><?php endif; ?>

              <?php if($status !=1 ): ?> <td>
                <a class="btn btn-bold btn-label-brand btn-sm"
                  data-href="<?php echo e(route('admin.orders.rate' , [ 'id' => $item->id ] )); ?>"
                  onclick="ajaxlink(event,this,'contact_us_details','err_contact_us_details','');" data-toggle="modal"
                  data-target="#modal_contact_us_details"><?php echo e(__('words.details')); ?></a>
              </td><?php endif; ?>
              <?php if($status !=1 ): ?>
              <td>
                 <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.buttons.but_link','data' => ['link' => ''.e(route('admin.chat.order' , [ 'id' => $item->id ] )).'','title' => ''.e(__('words.preview')).'']]); ?>
<?php $component->withName('buttons.but_link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['link' => ''.e(route('admin.chat.order' , [ 'id' => $item->id ] )).'','title' => ''.e(__('words.preview')).'']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
              </td>
              <?php endif; ?>
              <td>
                 <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.buttons.but_link','data' => ['link' => ''.e(route('admin.orders.show' , [ 'id' => $item->id ] )).'','title' => ''.e(__('words.details')).'']]); ?>
<?php $component->withName('buttons.but_link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['link' => ''.e(route('admin.orders.show' , [ 'id' => $item->id ] )).'','title' => ''.e(__('words.details')).'']); ?>
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

        <div class="modal fade" id="modal_contact_us_details" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <!-- <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5> -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
              </div>
              <div class="modal-body" id="contact_us_details">

              </div>
            </div>
          </div>
        </div>
        <div id="err_contact_us_details"></div>

        <!--end: Datatable -->
      </div>
    </div>
  </div>
</div>



<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

  <div class="kt-portlet kt-portlet--mobile">

    <div class="kt-portlet__head">
      <div class="kt-portlet__head-label">
        <h3 class="kt-portlet__head-title">
          <div class="row">
            <label for="" style="margin: 10px"><?php echo e(__('contact_us.title')); ?></label>
          </div>
        </h3>
      </div>
    </div>


    <div class="kt-portlet__body">
      <style>
        .dataTables_wrapper div.dataTables_filter {
          display: contents;
        }
      </style>

      <!--begin: Datatable -->
      <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
        <thead>
          <tr>
            <th>ID</th>
            <th><?php echo e(__('contact_us.name')); ?></th>
            <th><?php echo e(__('words.mobile')); ?></th>
            <th><?php echo e(__('words.type')); ?></th>
            <th><?php echo e(__('words.details')); ?></th>
            <th><?php echo e(__('user.name')); ?></th>
            <th><?php echo e(__('words.date')); ?></th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr id="<?php echo e($item->id); ?>">
            <td><?php echo e($item->id); ?></td>
            <td><?php echo e($item->title); ?></td>
            <td><?php echo e($item->mobile); ?></td>
            <td><?php echo e($item->type->title); ?></td>
            <td>
              <a class="btn btn-bold btn-label-brand btn-sm"
                data-href="<?php echo e(route('admin.contacts.details' , [ 'id' => $item->id ] )); ?>"
                onclick="ajaxlink(event,this,'contact_us_details','err_contact_us_details','');" data-toggle="modal"
                data-target="#modal_contact_us_details"><?php echo e(__('words.details')); ?></a>
            </td>
            <td><?php echo e(optional($item->user)->name); ?> - <?php echo e(optional($item->user)->phone); ?></td>
            <td><?php echo e($item->created_at); ?></td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>

      <div class="modal fade" id="modal_contact_us_details" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <!-- <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5> -->
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              </button>
            </div>
            <div class="modal-body" id="contact_us_details">

            </div>
          </div>
        </div>
      </div>
      <div id="err_contact_us_details"></div>

      <!--end: Datatable -->
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('js_pagelevel'); ?>

<script>
  window.onload = function() {
  gat_data('order_chart_div', '', 'get', "<?php echo e(route('admin.order_chart')); ?>", '');

};


function order_search(){
  var from = $('#order_from').val();
  var to = $('#order_to').val();
  var data = 'from='+from+'&to='+to;

  gat_data('order_chart_div', '', 'get', "<?php echo e(route('admin.order_chart')); ?>", data,null);

}
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kafoosaappsjanna/lara/resources/views/admin/index.blade.php ENDPATH**/ ?>