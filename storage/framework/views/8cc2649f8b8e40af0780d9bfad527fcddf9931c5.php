
<?php if(session()->has('flashAlerts')): ?>
  <div class="kt-section">
    <div class="kt-section__content">
      <?php $__currentLoopData = session('flashAlerts'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $flashAlert): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(! isset($flashAlert['type'])): ?>
          <div class="alert alert-<?php echo e(($key == 'faild') ? 'danger' : $key); ?>" role="alert">
            <div class="alert-text"><?php echo e($flashAlert['msg']); ?></div>
          </div>
        <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
<?php endif; ?>


<?php if($errors->any()): ?>
  <div class="kt-section">
    <div class="kt-section__content">
      <div class="alert alert-danger" role="alert">
        <div class="alert-text">
          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo e($error); ?><br>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>
<?php /**PATH /home/kafoosaappsjanna/lara/storage/framework/views/de928cfe2505ec3c96d720fe2c785574a833df4b.blade.php ENDPATH**/ ?>