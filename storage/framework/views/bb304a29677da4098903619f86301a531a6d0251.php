<?php $__env->startSection('content'); ?>


<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
 
  <div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet__body">
      <style>
      .dataTables_wrapper div.dataTables_filter { display: contents; }
      </style>

      <!--begin: Datatable -->
      <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
        <thead>
          <tr>
            
            <th><?php echo e(__('slider.position')); ?></th>
            <th><?php echo e(__('slider.control')); ?></th>

          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr >
            
            <td><?php echo e($item->position); ?></td>
            <td>
                <a  class="btn btn-outline-success"
            href="<?php echo e(route('admin.sliders.edit' , [ 'id' => $item->id ] )); ?>"><?php echo e(__('words.edit')); ?></a>
            </td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>

      <!--end: Datatable -->
    </div>
  </div>
</div>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kafoosaappsjanna/lara/resources/views/admin/sliders/index.blade.php ENDPATH**/ ?>