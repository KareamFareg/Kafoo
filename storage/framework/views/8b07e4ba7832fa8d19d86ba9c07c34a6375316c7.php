<?php if($currentView == 'notInBar'): ?>
<div class="dropdown" style="text-align: center;">
  <a href="#" class="btn btn-label-brand btn-bold btn-sm dropdown-toggle" data-toggle="dropdown">
    <?php echo e(__('language.select_language')); ?>

  </a>
  <div class="dropdown-menu dropdown-menu-sm" aria-labelledby="dropdownMenuButton">

    <ul class="kt-nav">
      <?php $__currentLoopData = $getLanguages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="kt-nav__item">
          <a href="<?php echo e(route('admin.login', ['locale' => $language->locale] )); ?>" class="kt-nav__link">
            <i class="kt-nav__link-icon"><img class="" src="<?php echo e(asset($language->image)); ?>" alt="" /></i>
            <span class="kt-nav__link-text" style="<?php echo e((app()->getLocale() == $language->locale) ? 'font-weight: 600;color: black;' : ''); ?> "><?php echo e($language->title); ?></span>
          </a>
        </li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

  </div>
</div>

<?php else: ?>

<div class="kt-header__topbar-item kt-header__topbar-item--langs">
  <?php $currentLocal = app()->getLocale(); ?>
  <?php $__currentLoopData = $getLanguages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if( $currentLocal == $language->locale ): ?>
      <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
        <span class="kt-header__topbar-icon">
          <img class="" src="<?php echo e(asset( $language->image )); ?>" alt="" />
        </span>
      </div>
    <?php endif; ?>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround">
  <ul class="kt-nav kt-margin-t-10 kt-margin-b-10">
    <?php $__currentLoopData = $getLanguages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php if( $currentLocal != $language->locale ): ?>
      <li class="kt-nav__item kt-nav__item--active">
        
        <a href="<?php echo e(route( 'admin.home' , ['locale' => $language->locale] )); ?>" class="kt-nav__link">
          <span class="kt-nav__link-icon"><img src="<?php echo e(asset( $language->image )); ?>" alt="" /></span>
          <span class="kt-nav__link-text"><?php echo e($language->title); ?></span>
        </a>
      </li>
      <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ul>
</div>
</div>

<?php endif; ?>
<?php /**PATH /home/kafoosaappsjanna/lara/resources/views/components/admin/language-bar.blade.php ENDPATH**/ ?>