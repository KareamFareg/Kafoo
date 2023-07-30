<?php $__env->startSection('content'); ?>


<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

  <!-- begin:: Content -->
  <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

    <!--Begin::App-->
    <div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">

      <!--Begin:: App Aside Mobile Toggle-->
      <button class="kt-app__aside-close" id="kt_chat_aside_close">
        <i class="la la-close"></i>
      </button>

      <!--End:: App Aside Mobile Toggle-->


      <!--Begin:: App Content-->
      <div class="kt-grid__item kt-grid__item--fluid kt-app__content" id="kt_chat_content">
        <div class="kt-chat">
          <div class="kt-portlet kt-portlet--head-lg kt-portlet--last">
            <div class="kt-portlet__head">
              <div class="kt-chat__head ">

                <div class="kt-chat__left">
                  
                </div>
  

                <div class="kt-chat__center">
                  <div class="kt-chat__label">
                    <a  class="kt-chat__title"><?php echo e(__('words.chat')); ?> : <?php echo e($order->id); ?> - <?php if(isset($order->category)){ ?> <?php echo e(optional($order->category->translation->first())->title); ?><?php }else{?><?php echo e(__('words.order')); ?> <?php } ?></a>
                    <span class="kt-chat__status">
                      <span class="kt-badge kt-badge--dot kt-badge--success"></span>
                      <?php echo e(optional($order->user_data)->name ?? __('words.deleted')); ?> <?php echo e(optional($order->user_data)->phone); ?> -
                      <?php echo e(optional(optional(optional(optional($order->shop)->client)->translation)->first())->title); ?> -
                      <?php echo e(optional($order->accept)->title); ?>

                    </span>
                  </div>
                
                </div>


                <div class="kt-chat__right">
                 
                </div>

              </div>
            </div>
            <div class="kt-portlet__body">
              <div class="kt-scroll kt-scroll--pull" data-mobile-height="300">
                <div style="overflow-y: scroll; height:400px;" class="kt-chat__messages">
                  <?php if(!empty($items)): ?>
                  <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                      <?php if( $item['reciverid'] == $chaters_ids['receiver_id'] ): ?>
                          <div class="kt-chat__message">
                            <div class="kt-chat__user">
                              <!-- <span class="kt-userpic kt-userpic--circle kt-userpic--sm">
                                <img src="./assets/media/users/100_12.jpg" alt="image">
                              </span> -->
                              <a href="#" class="kt-chat__username"><?php echo e($chaters['receiver_name']); ?></span></a>
                              <span class="kt-chat__datetime"><?php echo e(isset($item['time']) ? $item['time'] : ''); ?></span>
                            </div>
                            <div class="kt-chat__text kt-bg-light-success">
                              
                              <?php if($item['type'] == 1): ?>   <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.chat.string','data' => ['text' => $item['message']]]); ?>
<?php $component->withName('chat.string'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item['message'])]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>  <?php endif; ?>
                              <?php if($item['type'] == 'audio'): ?>   <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.chat.audio','data' => ['file' => $item['message']]]); ?>
<?php $component->withName('chat.audio'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['file' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item['message'])]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>  <?php endif; ?>
                              <?php if($item['type'] == 2): ?>   <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.chat.image','data' => ['key' => $key,'file' => $item['message']]]); ?>
<?php $component->withName('chat.image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['key' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($key),'file' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item['message'])]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>  <?php endif; ?>
                              <?php if($item['type'] == 4): ?>
                                <?php $lat = explode(',', $item['message'] )[0];  ?>
                                <?php $lng = explode(',', $item['message'] )[1];  ?>
                                <div id="map_recev_<?php echo e($key); ?>" class="map" latlng="<?php echo e($item['message']); ?>" lat="<?php echo e($lat); ?>"
                                       lng="<?php echo e($lng); ?>" style="width:500px; height:500px"></div>
                                  <?php endif; ?>
                            </div>
                          </div>
                      <?php else: ?>
                          <div class="kt-chat__message kt-chat__message--right">
                            <div class="kt-chat__user">
                              <!-- <span class="kt-userpic kt-userpic--circle kt-userpic--sm">
                                <img src="./assets/media/users/100_12.jpg" alt="image">
                              </span> -->
                              <a href="#" class="kt-chat__username"><?php echo e($chaters['sender_name']); ?></span></a>
                              <span class="kt-chat__datetime"><?php echo e(isset($item['time']) ? $item['time'] : ''); ?></span>
                            </div>
                            <div class="kt-chat__text kt-bg-light-success">
                            
                              <?php if($item['type'] == 1): ?>   <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.chat.string','data' => ['text' => $item['message']]]); ?>
<?php $component->withName('chat.string'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item['message'])]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>  <?php endif; ?>
                              <?php if($item['type'] == 'audio'): ?>   <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.chat.audio','data' => ['file' => $item['message']]]); ?>
<?php $component->withName('chat.audio'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['file' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item['message'])]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>  <?php endif; ?>
                              <?php if($item['type'] == 2): ?>   <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.chat.image','data' => ['key' => $key,'file' => $item['message']]]); ?>
<?php $component->withName('chat.image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['key' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($key),'file' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item['message'])]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>  <?php endif; ?>
                              <?php if($item['type'] == 4): ?>
                                <?php $lat = explode(',', $item['message'] )[0];  ?>
                                <?php $lng = explode(',', $item['message'] )[1];  ?>
                                <div id="map_recev_<?php echo e($key); ?>" class="map" latlng="<?php echo e($item['message']); ?>" lat="<?php echo e($lat); ?>"
                                      lng="<?php echo e($lng); ?>" style="width:500px; height:500px"></div>  
                               <?php endif; ?>
                            </div>
                          </div>
                      <?php endif; ?>

                      <?php $curuser = $item['reciverid']; ?>

                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
                </div>
              </div>
            </div>

          

          </div>
        </div>
      </div>

      <!--End:: App Content-->
    </div>

    <!--End::App-->
  </div>

  <!-- end:: Content -->
</div>

<?php $__env->startSection('js_pagelevel'); ?>

 <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.google-map-chat-js','data' => []]); ?>
<?php $component->withName('admin.google-map-chat-js'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVFiE8-BpyH5SbzDRvamysRcf2TkWzQfU&callback=initMap2">
</script>
<script>

var dlat = <?php echo e(!empty($lat) ? $lat : 24.720012952625147); ?>;
    var dlng = <?php echo e(!empty($lng) ? $lng : 46.67266803125); ?>;



    function initMap2() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(dlat, dlng),
          zoom: 12
        });
        var infoWindow = new google.maps.InfoWindow;

        var marker = new google.maps.Marker({
          map: map,
          position: { lat: dlat , lng : dlng},
          draggable : true,
          // label: icon.label
        });
        marker.addListener('click', function() {
          infoWindow.setContent(infowincontent);
          infoWindow.open(map, marker);
        });

        google.maps.event.addListener(marker,'position_changed', function() {
          var lat = marker.getPosition().lat();
          var lng = marker.getPosition().lng();
          document.getElementById("lat").value=lat;
          document.getElementById("lng").value=lng;
        });

    }



</script>
<?php $__env->stopSection(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kafoosaappsjanna/lara/resources/views/util/chat-main.blade.php ENDPATH**/ ?>