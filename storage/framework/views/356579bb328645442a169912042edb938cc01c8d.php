
<?php if(session()->has('flashAlerts')): ?>
  <div class="kt-section">
    <div class="kt-section__content">
      <?php $__currentLoopData = session('flashAlerts'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $flashAlert): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(isset( $flashAlert['type'])): ?>
          <script type="text/javascript">

             swal.fire("Oops!", "<?php echo e($flashAlert['msg']); ?>" , "error");

            toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          };
          toastr.success("<?php echo e($flashAlert['msg']); ?>");

          </script>
        <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
<?php endif; ?>
<?php /**PATH /home/kafoosaappsjanna/lara/storage/framework/views/234f5e76403c9843b7b4d8bf27f11731b7233624.blade.php ENDPATH**/ ?>