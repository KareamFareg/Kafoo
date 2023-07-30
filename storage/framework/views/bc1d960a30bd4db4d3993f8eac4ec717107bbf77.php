
<?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<form class="kt-form" enctype="multipart/form-data"  style="margin: 10px"  action="<?php echo e($route); ?>" method="post">
<?php echo e(csrf_field()); ?>


    <input type="hidden" name="trans" value="<?php echo e($language->locale); ?>">
    <button type="submit"

      <?php if($language->locale == $trans): ?>
        class="btn btn-outline-dark"
        <?php else: ?>
        class="btn btn-outline-secondary"
      <?php endif; ?>


    ><?php echo e($language->title); ?></button>

</form>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home/kafoosaappsjanna/lara/resources/views/components/admin/trans-bar.blade.php ENDPATH**/ ?>