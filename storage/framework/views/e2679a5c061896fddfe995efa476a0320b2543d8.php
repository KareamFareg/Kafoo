<?php $__env->startSection('content'); ?>

    <div class="col-xl-12 col-lg-12">

        <!--begin:: Widgets/Sale Reports-->
        <div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid">

            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        <div class="row">
                             
                             <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.trans-bar','data' => ['languages' => $languages,'route' => ''.e(route('admin.settings.index')).'','trans' => $trans]]); ?>
<?php $component->withName('admin.trans-bar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['languages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($languages),'route' => ''.e(route('admin.settings.index')).'','trans' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($trans)]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                        </div>
                    </h3>
                </div>
                <!-- <div class="kt-portlet__head-toolbar">
            <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-brand" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#kt_widget11_tab1_content" role="tab">
                  Last Month
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#kt_widget11_tab2_content" role="tab">
                  All Time
                </a>
              </li>
            </ul>
          </div> -->
            </div>



            <!-- form -->
            <!-- enctype="multipart/form-data" -->
            <form class="kt_form_1" enctype="multipart/form-data" action="<?php echo e(route('admin.settings.update')); ?>"
                method="post">

                <input name="_method" type="hidden" value="PUT">

                <?php echo e(csrf_field()); ?>


                <input type="hidden" value="<?php echo e($trans); ?>" name="language">

                <div class="kt-portlet__body">

                    <!--Begin::Tab Content-->
                    <div class="tab-content">

                        <!--begin::tab 1 content-->
                        <div class="tab-pane active" id="kt_widget11_tab1_content">



                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('setting.app_title')); ?></label>
                                <div class=" col-lg-7 col-md-9 col-sm-12">
                                    <input type="text"
                                        class="form-control <?php echo e($errors->has('app_title') ? ' is-invalid' : ''); ?>" required
                                        maxlength="100" value="<?php echo e(old('title', $settings['app_title'])); ?>"
                                        name="app_title[<?php echo e($trans); ?>]" placeholder="<?php echo e(__('setting.app_title')); ?>">
                                    <!-- <span class="form-text text-muted">Please enter your full name</span> -->
                                    <?php if($errors->has('app_title')): ?>
                                        <span class="invalid-feedback"><?php echo e($errors->first('app_title')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('setting.addition_service_cost')); ?></label>
                                <div class=" col-lg-7 col-md-9 col-sm-12">
                                    <input type="number"
                                        class="form-control <?php echo e($errors->has('addition_service_cost') ? ' is-invalid' : ''); ?>" required
                                        maxlength="100" value="<?php echo e(old('title', $settings['addition_service_cost'])); ?>"
                                        name="addition_service_cost" placeholder="<?php echo e(__('setting.addition_service_cost')); ?>">
                                    <!-- <span class="form-text text-muted">Please enter your full name</span> -->
                                    <?php if($errors->has('addition_service_cost')): ?>
                                        <span class="invalid-feedback"><?php echo e($errors->first('addition_service_cost')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('setting.commission_percent')); ?></label>
                                <div class=" col-lg-7 col-md-9 col-sm-12">
                                    <input type="number"
                                        class="form-control <?php echo e($errors->has('commission_percent') ? ' is-invalid' : ''); ?>" required
                                        maxlength="100" value="<?php echo e(old('title', $settings['commission_percent'])); ?>"
                                        name="commission_percent" placeholder="<?php echo e(__('setting.commission_percent')); ?>">
                                    <!-- <span class="form-text text-muted">Please enter your full name</span> -->
                                    <?php if($errors->has('commission_percent')): ?>
                                        <span class="invalid-feedback"><?php echo e($errors->first('commission_percent')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                          
                            
                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('setting.minimum_shipping')); ?></label>
                                <div class=" col-lg-7 col-md-9 col-sm-12">
                                    <input type="number"
                                        class="form-control <?php echo e($errors->has('minimum_shipping') ? ' is-invalid' : ''); ?>" required
                                        maxlength="100" value="<?php echo e(old('title', $settings['minimum_shipping'])); ?>"
                                        name="minimum_shipping" placeholder="<?php echo e(__('setting.minimum_shipping')); ?>">
                                    <!-- <span class="form-text text-muted">Please enter your full name</span> -->
                                    <?php if($errors->has('minimum_shipping')): ?>
                                        <span class="invalid-feedback"><?php echo e($errors->first('minimum_shipping')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('setting.geofire_radius')); ?></label>
                                <div class=" col-lg-7 col-md-9 col-sm-12">
                                    <input type="number"
                                        class="form-control <?php echo e($errors->has('geofire_radius') ? ' is-invalid' : ''); ?>" required
                                        maxlength="100" value="<?php echo e(old('title', $settings['geofire_radius'])); ?>"
                                        name="geofire_radius" placeholder="<?php echo e(__('setting.geofire_radius')); ?>">
                                    <!-- <span class="form-text text-muted">Please enter your full name</span> -->
                                    <?php if($errors->has('geofire_radius')): ?>
                                        <span class="invalid-feedback"><?php echo e($errors->first('geofire_radius')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            



                            



                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('setting.facebook')); ?></label>
                                <div class=" col-lg-7 col-md-9 col-sm-12">
                                    <input type="text"
                                        class="form-control <?php echo e($errors->has('facebook') ? ' is-invalid' : ''); ?>"
                                        maxlength="500" value="<?php echo e(old('facebook', $settings['facebook'])); ?>" name="facebook"
                                        placeholder="<?php echo e(__('setting.facebook')); ?>">
                                    <!-- <span class="form-text text-muted">Please enter your full name</span> -->
                                    <?php if($errors->has('facebook')): ?>
                                        <span class="invalid-feedback"><?php echo e($errors->first('facebook')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-sm-12">تيك توك</label>
                                <div class=" col-lg-7 col-md-9 col-sm-12">
                                    <input type="text"
                                        class="form-control <?php echo e($errors->has('tiktok') ? ' is-invalid' : ''); ?>"
                                        maxlength="500" value="<?php echo e(old('tiktok', $settings['tiktok'])); ?>" name="tiktok"
                                        placeholder="ايميل التيك توك">
                                    <!-- <span class="form-text text-muted">Please enter your full name</span> -->
                                    <?php if($errors->has('tiktok')): ?>
                                        <span class="invalid-feedback"><?php echo e($errors->first('tiktok')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>



                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('setting.tweeter')); ?></label>
                                <div class=" col-lg-7 col-md-9 col-sm-12">
                                    <input type="text"
                                        class="form-control <?php echo e($errors->has('tweeter') ? ' is-invalid' : ''); ?>"
                                        maxlength="500" value="<?php echo e(old('tweeter', $settings['tweeter'])); ?>" name="tweeter"
                                        placeholder="<?php echo e(__('setting.tweeter')); ?>">
                                    <!-- <span class="form-text text-muted">Please enter your full name</span> -->
                                    <?php if($errors->has('tweeter')): ?>
                                        <span class="invalid-feedback"><?php echo e($errors->first('tweeter')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('setting.instagram')); ?></label>
                                <div class=" col-lg-7 col-md-9 col-sm-12">
                                    <input type="text"
                                        class="form-control <?php echo e($errors->has('instagram') ? ' is-invalid' : ''); ?>"
                                        maxlength="500" value="<?php echo e(old('tweeter', $settings['instagram'])); ?>"
                                        name="instagram" placeholder="<?php echo e(__('setting.instagram')); ?>">
                                    <!-- <span class="form-text text-muted">Please enter your full name</span> -->
                                    <?php if($errors->has('instagram')): ?>
                                        <span class="invalid-feedback"><?php echo e($errors->first('instagram')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>



                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('setting.linkedin')); ?></label>
                                <div class=" col-lg-7 col-md-9 col-sm-12">
                                    <input type="text"
                                        class="form-control <?php echo e($errors->has('linkedin') ? ' is-invalid' : ''); ?>"
                                        maxlength="500" value="<?php echo e(old('linkedin', $settings['linkedin'])); ?>" name="linkedin"
                                        placeholder="<?php echo e(__('setting.linkedin')); ?>">
                                    <!-- <span class="form-text text-muted">Please enter your full name</span> -->
                                    <?php if($errors->has('linkedin')): ?>
                                        <span class="invalid-feedback"><?php echo e($errors->first('linkedin')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('setting.snapchat')); ?></label>
                                <div class=" col-lg-7 col-md-9 col-sm-12">
                                    <input type="text"
                                        class="form-control <?php echo e($errors->has('snapchat') ? ' is-invalid' : ''); ?>"
                                        maxlength="500" value="<?php echo e(old('snapchat', $settings['snapchat'])); ?>" name="snapchat"
                                        placeholder="<?php echo e(__('setting.snapchat')); ?>">
                                    <!-- <span class="form-text text-muted">Please enter your full name</span> -->
                                    <?php if($errors->has('snapchat')): ?>
                                        <span class="invalid-feedback"><?php echo e($errors->first('snapchat')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('setting.website')); ?></label>
                                <div class=" col-lg-7 col-md-9 col-sm-12">
                                    <input type="text"
                                        class="form-control <?php echo e($errors->has('website') ? ' is-invalid' : ''); ?>"
                                        maxlength="500" value="<?php echo e(old('website', $settings['website'])); ?>" name="website"
                                        placeholder="<?php echo e(__('setting.website')); ?>">
                                    <!-- <span class="form-text text-muted">Please enter your full name</span> -->
                                    <?php if($errors->has('website')): ?>
                                        <span class="invalid-feedback"><?php echo e($errors->first('website')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('setting.telegram')); ?></label>
                                <div class=" col-lg-7 col-md-9 col-sm-12">
                                    <input type="text"
                                        class="form-control <?php echo e($errors->has('telegram') ? ' is-invalid' : ''); ?>"
                                        maxlength="500" value="<?php echo e(old('telegram', $settings['telegram'])); ?>" name="telegram"
                                        placeholder="<?php echo e(__('setting.telegram')); ?>">
                                    <!-- <span class="form-text text-muted">Please enter your full name</span> -->
                                    <?php if($errors->has('telegram')): ?>
                                        <span class="invalid-feedback"><?php echo e($errors->first('telegram')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('setting.phone_1')); ?></label>
                                <div class=" col-lg-7 col-md-9 col-sm-12">
                                    <input type="text"
                                        class="form-control <?php echo e($errors->has('phone_1') ? ' is-invalid' : ''); ?>"
                                        maxlength="100" value="<?php echo e(old('phone_1', $settings['phone_1'])); ?>" name="phone_1"
                                        placeholder="<?php echo e(__('setting.phone_1')); ?>">
                                    <!-- <span class="form-text text-muted">Please enter your full name</span> -->
                                    <?php if($errors->has('phone_1')): ?>
                                        <span class="invalid-feedback"><?php echo e($errors->first('phone_1')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            
                            
                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('setting.UPhone')); ?></label>
                                <div class=" col-lg-7 col-md-9 col-sm-12">
                                    <input type="text"
                                        class="form-control <?php echo e($errors->has('UPhone') ? ' is-invalid' : ''); ?>"
                                        maxlength="100" value="<?php echo e(old('UPhone', $settings['UPhone'])); ?>" name="UPhone"
                                        placeholder="<?php echo e(__('setting.UPhone')); ?>">
                                    <?php if($errors->has('UPhone')): ?>
                                        <span class="invalid-feedback"><?php echo e($errors->first('UPhone')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            
                            
                            <!-- <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('setting.CRMPhone')); ?></label>
                                <div class=" col-lg-7 col-md-9 col-sm-12">
                                    <input type="text"
                                        class="form-control <?php echo e($errors->has('CRMPhone') ? ' is-invalid' : ''); ?>"
                                        maxlength="100" value="<?php echo e(old('CRMPhone', $settings['CRMPhone'])); ?>" name="CRMPhone"
                                        placeholder="<?php echo e(__('setting.CRMPhone')); ?>">
                                    <?php if($errors->has('CRMPhone')): ?>
                                        <span class="invalid-feedback"><?php echo e($errors->first('CRMPhone')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div> -->
                            
                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('setting.CRMPhone')); ?></label>
                                <div class=" col-lg-7 col-md-9 col-sm-12">
                                    <input type="text"
                                        class="form-control <?php echo e($errors->has('customer_service') ? ' is-invalid' : ''); ?>"
                                        maxlength="100" value="<?php echo e(old('customer_service', $settings['customer_service'])); ?>" name="customer_service"
                                        placeholder="<?php echo e(__('setting.customer_service')); ?>">
                                    <?php if($errors->has('customer_service')): ?>
                                        <span class="invalid-feedback"><?php echo e($errors->first('customer_service')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            
                            

                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('setting.mail')); ?></label>
                                <div class=" col-lg-7 col-md-9 col-sm-12">
                                    <input type="text" class="form-control <?php echo e($errors->has('mail') ? ' is-invalid' : ''); ?>"
                                        maxlength="300" value="<?php echo e(old('mail', $settings['mail'])); ?>" name="mail"
                                        placeholder="<?php echo e(__('setting.mail')); ?>">
                                    <!-- <span class="form-text text-muted">Please enter your full name</span> -->
                                    <?php if($errors->has('mail')): ?>
                                        <span class="invalid-feedback"><?php echo e($errors->first('mail')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('setting.address')); ?></label>
                                <div class=" col-lg-7 col-md-9 col-sm-12">
                                    <input type="text"
                                        class="form-control <?php echo e($errors->has('address') ? ' is-invalid' : ''); ?>"
                                        maxlength="500" value="<?php echo e(old('address', $settings['address'])); ?>" name="address"
                                        placeholder="<?php echo e(__('setting.address')); ?>">
                                    <!-- <span class="form-text text-muted">Please enter your full name</span> -->
                                    <?php if($errors->has('address')): ?>
                                        <span class="invalid-feedback"><?php echo e($errors->first('address')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('setting.app_android_lnk')); ?></label>
                                <div class=" col-lg-7 col-md-9 col-sm-12">
                                    <input type="text"
                                        class="form-control <?php echo e($errors->has('app_android_lnk') ? ' is-invalid' : ''); ?>"
                                        maxlength="500" value="<?php echo e(old('app_android_lnk', $settings['app_android_lnk'])); ?>"
                                        name="app_android_lnk" placeholder="<?php echo e(__('setting.app_android_lnk')); ?>">
                                    <!-- <span class="form-text text-muted">Please enter your full name</span> -->
                                    <?php if($errors->has('app_android_lnk')): ?>
                                        <span class="invalid-feedback"><?php echo e($errors->first('app_android_lnk')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('setting.app_ios_link')); ?></label>
                                <div class=" col-lg-7 col-md-9 col-sm-12">
                                    <input type="text"
                                        class="form-control <?php echo e($errors->has('app_ios_link') ? ' is-invalid' : ''); ?>"
                                        maxlength="500" value="<?php echo e(old('app_ios_link', $settings['app_ios_link'])); ?>"
                                        name="app_ios_link" placeholder="<?php echo e(__('setting.app_ios_link')); ?>">
                                    <!-- <span class="form-text text-muted">Please enter your full name</span> -->
                                    <?php if($errors->has('app_ios_link')): ?>
                                        <span class="invalid-feedback"><?php echo e($errors->first('app_ios_link')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>

                                <div class="form-group row">
                                    <label
                                        class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('setting.app_share_note')); ?></label>
                                    <div class=" col-lg-7 col-md-9 col-sm-12">
                                    <textarea  placeholder="<?php echo e(__('setting.app_share_note')); ?>" class="form-control <?php echo e($errors->has('app_share_note') ? ' is-invalid' : ''); ?>" name="app_share_note[<?php echo e($trans); ?>]" rows="5"><?php echo e(old('title', $settings['app_share_note'])); ?></textarea>

                                        <?php if($errors->has('app_share_note')): ?>
                                            <span class="invalid-feedback"><?php echo e($errors->first('app_share_note')); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('setting.work_times')); ?></label>
                                    <div class=" col-lg-7 col-md-9 col-sm-12">
                                        <input type="text"
                                            class="form-control <?php echo e($errors->has('work_times') ? ' is-invalid' : ''); ?>"
                                            maxlength="500" value="<?php echo e(old('work_times', $settings['work_times'])); ?>"
                                            name="work_times" placeholder="<?php echo e(__('setting.work_times')); ?>">
                                        <!-- <span class="form-text text-muted">Please enter your full name</span> -->
                                        <?php if($errors->has('work_times')): ?>
                                            <span class="invalid-feedback"><?php echo e($errors->first('work_times')); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('setting.logo')); ?> Max 500 KB</label>
                                    <div class="col-lg-8 col-md-9 col-sm-12">
                                        <input type="file" name="logo" id="input-file-now-custom-1" class="dropify"
                                            data-default-file="<?php echo e(asset( 'storage/app/'. $settings['logo'])); ?>" />
                                    </div>
                                </div>

 
                            

                            

                                <div class="form-group row">
                                    <label
                                        class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('setting.about_us_image')); ?> Max 500 KB</label>
                                    <div class="col-lg-8 col-md-9 col-sm-12">
                                        <input type="file" name="about_us_image" id="input-file-now-custom-1"
                                            class="dropify"
                                            data-default-file="<?php echo e(asset( 'storage/app/'. $settings['about_us_image'])); ?>" />
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('setting.about_us')); ?></label>
                                    <div class=" col-lg-8 col-md-12 col-sm-12">
                                        <textarea name="about_us" class="form-control" data-provide="markdown"
                                            rows="10" placeholder="<?php echo e(__('setting.about_us')); ?>"><?php echo e(old('about_us', $settings['about_us'])); ?></textarea>
                                        <?php if($errors->has('about_us', $settings['about_us'])): ?>
                                            <span class="invalid-feedback"><?php echo e($errors->first('about_us')); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('setting.terms')); ?></label>
                                    <div class=" col-lg-8 col-md-12 col-sm-12">
                                        <textarea name="terms" class="form-control" data-provide="markdown"
                                            rows="10" placeholder="<?php echo e(__('setting.terms')); ?>"><?php echo e(old('terms', $settings['terms'])); ?></textarea>
                                        <?php if($errors->has('terms',$settings['terms'])): ?>
                                            <span class="invalid-feedback"><?php echo e($errors->first('terms')); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('setting.privacy')); ?></label>
                                    <div class=" col-lg-8 col-md-12 col-sm-12">
                                        <textarea name="privacy" class="form-control" data-provide="markdown"
                                            rows="10" placeholder="<?php echo e(__('setting.privacy')); ?>"><?php echo e(old('privacy', $settings['privacy'])); ?></textarea>
                                        <?php if($errors->has('privacy', $settings['privacy'])): ?>
                                            <span class="invalid-feedback"><?php echo e($errors->first('privacy')); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>

 

                                <div class="form-group row">
                                    <label class="col-form-label col-lg-3 col-sm-12"><?php echo e(__('words.address')); ?></label>
                                    <div class="col-lg-8 col-md-9 col-sm-12">
                                        <div id="map" style="width: 100%;height: 500px;"></div>
                                        
                                    </div>
                                </div>


                                <?php $lat = $settings['lat'] ?>
                                <input type="hidden" name="lat" id="lat" value=<?php echo e($lat); ?>>
                                <?php $lng = $settings['lng'] ?>
                                <input type="hidden" name="lng" id="lng" value=<?php echo e($lng); ?>>




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

                            <!--end::Widget 11-->
                        </div>

                    </div>

                    <!--End::Tab Content-->
                </div>

            </form>


            <div class="col-lg-12 col-md-12">
                <br><br><br>
                <h4 class="card-title">انواع الرسائل</h4>
                <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="alert alert-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <?php if(session('alert_msgtype')): ?>
                    <div class="alert alert-success"><?php echo e(session('alert_msgtype')); ?></div>
                <?php endif; ?>

                <form class="" action="<?php echo e(route('admin.settings.add_msg_type')); ?>" method="POST"
                    enctype="multipart/form-data">
                    <div class="form-row align-items-center">
                        <?php echo csrf_field(); ?>
                        <div class="col-auto">
                            <input type="text" id="title" name="title" class="form-control" value="">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-2">اضافة</button>
                        </div>
                    </div>
                </form>
                <br><br>
                <?php $__currentLoopData = $msgTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msgType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <form class="" action="<?php echo e(route('admin.settings.update_msg_type', ['id' => $msgType->id])); ?>"
                        method="POST" enctype="multipart/form-data">
                        <div class="form-row align-items-center">
                            <?php echo csrf_field(); ?>
                            <div class="col-auto">
                                <input type="text" id="title" name="title" class="form-control"
                                    value="<?php echo e($msgType->title); ?>">
                            </div>
                            <div class="col-auto">
                                <!-- <button type="submit" class="btn btn-primary mb-2"><?php echo e(trans('word.Save')); ?></button> -->
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
                            </div>
                        </div>
                    </form>
                    <br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>


        </div>

        <!--end:: Widgets/Sale Reports-->
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

     <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.google-map-js','data' => ['lat' => $lat,'lng' => $lng]]); ?>
<?php $component->withName('admin.google-map-js'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['lat' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($lat),'lng' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($lng)]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
<?php $__env->stopSection(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kafoosaappsjanna/lara/resources/views/admin/settings/index.blade.php ENDPATH**/ ?>