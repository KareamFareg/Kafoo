<!DOCTYPE html>

<html lang="en">

	<!-- begin::Head -->
	<head>

		<!--begin::Base Path (base relative path for assets of this page) -->
		<base href="../../../../">

		<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

		<!--end::Base Path -->
		<meta charset="utf-8" />
		<title> تسجيل الدخول | Login</title>
    <meta name="description" content="Login page example">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!--begin::Fonts -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
			WebFont.load({
				google: {
					"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
				},
				active: function() {
					sessionStorage.fonts = true;
				}
			});
		</script>

		<!--end::Fonts -->

		<!--begin::Page Custom Styles(used by this page) -->
		<link href="<?php echo e(asset('assets/admin/css/demo1/pages/login/login-4.css')); ?>" rel="stylesheet" type="text/css" />

		<!--end::Page Custom Styles -->

		<!--begin::Page Vendors Styles(used by this page) -->
		<link href="<?php echo e(asset('assets/admin/vendors/custom/fullcalendar/fullcalendar.bundle.css')); ?>" rel="stylesheet" type="text/css" />

		<!--end::Page Vendors Styles -->

		<!--begin:: Global Mandatory Vendors -->
		<link href="<?php echo e(asset('assets/admin/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css')); ?>" rel="stylesheet" type="text/css" />

		<!--end:: Global Mandatory Vendors -->

		<!--begin:: Global Optional Vendors -->
		<link href="<?php echo e(asset('assets/admin/vendors/general/tether/dist/css/tether.css')); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo e(asset('assets/admin/vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css')); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo e(asset('assets/admin/vendors/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css')); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo e(asset('assets/admin/vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css')); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo e(asset('assets/admin/vendors/general/bootstrap-daterangepicker/daterangepicker.css')); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo e(asset('assets/admin/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css')); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo e(asset('assets/admin/vendors/general/bootstrap-select/dist/css/bootstrap-select.css')); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo e(asset('assets/admin/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css')); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo e(asset('assets/admin/vendors/general/select2/dist/css/select2.css')); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo e(asset('assets/admin/vendors/general/ion-rangeslider/css/ion.rangeSlider.css')); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo e(asset('assets/admin/vendors/general/nouislider/distribute/nouislider.css')); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo e(asset('assets/admin/vendors/general/owl.carousel/dist/assets/owl.carousel.css')); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo e(asset('assets/admin/vendors/general/owl.carousel/dist/assets/owl.theme.default.css')); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo e(asset('assets/admin/vendors/general/dropzone/dist/dropzone.css')); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo e(asset('assets/admin/vendors/general/summernote/dist/summernote.css')); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo e(asset('assets/admin/vendors/general/bootstrap-markdown/css/bootstrap-markdown.min.css')); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo e(asset('assets/admin/vendors/general/animate.css/animate.css')); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo e(asset('assets/admin/vendors/general/toastr/build/toastr.css')); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo e(asset('assets/admin/vendors/general/morris.js/morris.css')); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo e(asset('assets/admin/vendors/general/sweetalert2/dist/sweetalert2.css')); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo e(asset('assets/admin/vendors/general/socicon/css/socicon.css')); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo e(asset('assets/admin/vendors/custom/vendors/line-awesome/css/line-awesome.css')); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo e(asset('assets/admin/vendors/custom/vendors/flaticon/flaticon.css')); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo e(asset('assets/admin/vendors/custom/vendors/flaticon2/flaticon.css')); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo e(asset('assets/admin/vendors/general/@fortawesome/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet" type="text/css" />

		<!--end:: Global Optional Vendors -->

		<!--begin::Global Theme Styles(used by all pages) -->
		<link href="<?php echo e(asset('assets/admin/css/demo1/style.bundle.rtl.css')); ?>" rel="stylesheet" type="text/css" />

		<!--end::Global Theme Styles -->

		<!--begin::Layout Skins(used by all pages) -->
		<link href="<?php echo e(asset('assets/admin/css/demo1/skins/header/base/light.css')); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo e(asset('assets/admin/css/demo1/skins/header/menu/light.css')); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo e(asset('assets/admin/css/demo1/skins/brand/dark.css')); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo e(asset('assets/admin/css/demo1/skins/aside/dark.css')); ?>" rel="stylesheet" type="text/css" />


		<!--end::Layout Skins -->
		<link rel="shortcut icon" href="<?php echo e(asset('assets/admin/media/logos/favicon.ico')); ?>" />
	</head>

	<!-- end::Head -->

	<!-- begin::Body -->
	<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

		<!-- begin:: Page -->
		<div class="kt-grid kt-grid--ver kt-grid--root">
			<div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v4 kt-login--signin" id="kt_login">
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url(<?php echo e(asset('assets/admin/media/bg/bg-2.jpg')); ?>);">
					<div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
						<div class="kt-login__container">
							<div class="kt-login__logo">
                
							</div>


							 <?php if (isset($component)) { $__componentOriginalaee88306a150f452238bcc773b3107fdf6af88a6 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\FlashAlert::class, []); ?>
<?php $component->withName('FlashAlert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalaee88306a150f452238bcc773b3107fdf6af88a6)): ?>
<?php $component = $__componentOriginalaee88306a150f452238bcc773b3107fdf6af88a6; ?>
<?php unset($__componentOriginalaee88306a150f452238bcc773b3107fdf6af88a6); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 


							<div class="kt-login__signin">
								<div class="kt-login__head">
									<h3 class="kt-login__title"><?php echo e(__('auth.login')); ?></h3>
								</div>

								<div class="kt-login__head">
									<!--  <?php if (isset($component)) { $__componentOriginal9162e7dd48fff480c93a76f735fdbd9847d7673b = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Admin\LanguageBar::class, ['currentView' => 'notInBar']); ?>
<?php $component->withName('admin.LanguageBar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal9162e7dd48fff480c93a76f735fdbd9847d7673b)): ?>
<?php $component = $__componentOriginal9162e7dd48fff480c93a76f735fdbd9847d7673b; ?>
<?php unset($__componentOriginal9162e7dd48fff480c93a76f735fdbd9847d7673b); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>  -->
								</div>

                <form  class="kt-form" method="POST" action="<?php echo e(route('admin.login')); ?>">
                    <?php echo csrf_field(); ?>

									<div class="input-group">
                    <input id="email" type="email" placeholder="<?php echo e(__('words.email')); ?>"  class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>

                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

									</div>
									<div class="input-group">
                    <input id="password" type="password" placeholder="<?php echo e(__('words.password')); ?>" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required >

                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

									</div>
									<div class="row kt-login__extra">
										<div class="col">
											<label class="kt-checkbox">
												<input type="checkbox" name="remember"><?php echo e(__('auth.remember_me')); ?><span></span>
											</label>
										</div>
										<div class="col kt-align-right">
										</div>
									</div>
									<div class="kt-login__actions">
										<button  type="submit" class="btn btn-brand btn-pill kt-login__btn-primary"><?php echo e(__('auth.login')); ?> </button>
									</div>
									<div class="kt-login__actions">
										<a  href="<?php echo e(route('password.email.request')); ?>" ><?php echo e(__('auth.forgot_password_question')); ?> </a>
										
									</div>
								</form>
							</div>


						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- end:: Page -->

		<!-- begin::Global Config(global config for global JS sciprts) -->
		<script>
			var KTAppOptions = {
				"colors": {
					"state": {
						"brand": "#5d78ff",
						"dark": "#282a3c",
						"light": "#ffffff",
						"primary": "#5867dd",
						"success": "#34bfa3",
						"info": "#36a3f7",
						"warning": "#ffb822",
						"danger": "#fd3995"
					},
					"base": {
						"label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
						"shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
					}
				}
			};
		</script>

		<!-- end::Global Config -->





		<!--begin:: Global Mandatory Vendors -->
		<script src="<?php echo e(asset('assets/admin/vendors/general/jquery/dist/jquery.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/general/popper.js/dist/umd/popper.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/general/bootstrap/dist/js/bootstrap.min.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/general/js-cookie/src/js.cookie.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/general/moment/min/moment.min.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/general/tooltip.js/dist/umd/tooltip.min.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/general/sticky-js/dist/sticky.min.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/general/wnumb/wNumb.js')); ?>" type="text/javascript"></script>

		<!--end:: Global Mandatory Vendors -->

		<!--begin:: Global Optional Vendors -->
		<script src="<?php echo e(asset('assets/admin/vendors/general/jquery-form/dist/jquery.form.min.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/general/block-ui/jquery.blockUI.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/custom/js/vendors/bootstrap-datepicker.init.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/custom/js/vendors/bootstrap-timepicker.init.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/general/bootstrap-daterangepicker/daterangepicker.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/general/bootstrap-maxlength/src/bootstrap-maxlength.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/custom/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/general/bootstrap-select/dist/js/bootstrap-select.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/general/bootstrap-switch/dist/js/bootstrap-switch.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/custom/js/vendors/bootstrap-switch.init.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/general/select2/dist/js/select2.full.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/general/ion-rangeslider/js/ion.rangeSlider.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/general/typeahead.js/dist/typeahead.bundle.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/general/handlebars/dist/handlebars.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/general/inputmask/dist/jquery.inputmask.bundle.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/general/inputmask/dist/inputmask/inputmask.date.extensions.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/general/nouislider/distribute/nouislider.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/general/owl.carousel/dist/owl.carousel.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/general/autosize/dist/autosize.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/general/clipboard/dist/clipboard.min.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/general/dropzone/dist/dropzone.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/general/summernote/dist/summernote.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/general/markdown/lib/markdown.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/general/bootstrap-markdown/js/bootstrap-markdown.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/custom/js/vendors/bootstrap-markdown.init.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/general/bootstrap-notify/bootstrap-notify.min.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/custom/js/vendors/bootstrap-notify.init.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/general/jquery-validation/dist/jquery.validate.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/general/jquery-validation/dist/additional-methods.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/custom/js/vendors/jquery-validation.init.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/general/toastr/build/toastr.min.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/general/raphael/raphael.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/general/morris.js/morris.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/general/chart.js/dist/Chart.bundle.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/custom/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/custom/vendors/jquery-idletimer/idle-timer.min.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/general/waypoints/lib/jquery.waypoints.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/general/counterup/jquery.counterup.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/general/es6-promise-polyfill/promise.min.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/general/sweetalert2/dist/sweetalert2.min.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/custom/js/vendors/sweetalert2.init.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/general/jquery.repeater/src/lib.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/general/jquery.repeater/src/jquery.input.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/general/jquery.repeater/src/repeater.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/vendors/general/dompurify/dist/purify.js')); ?>" type="text/javascript"></script>

		<!--end:: Global Optional Vendors -->

		<!--begin::Global Theme Bundle(used by all pages) -->
		<script src="<?php echo e(asset('assets/admin/js/demo1/scripts.bundle.js')); ?>" type="text/javascript"></script>






		<!--begin::Global Theme Bundle(used by all pages) -->
		<script src="<?php echo e(asset('assets/admin/vendors/global/vendors.bundle.js')); ?>" type="text/javascript"></script>


		<!--end::Global Theme Bundle -->

		<!--begin::Page Scripts(used by this page) -->
		<script src="<?php echo e(asset('assets/admin/js/demo1/pages/login/login-general.js')); ?>" type="text/javascript"></script>


		<script src="<?php echo e(asset('assets/admin/js/demo1/pages/components/extended/sweetalert2.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('assets/admin/js/demo1/pages/components/extended/toastr.js')); ?>" type="text/javascript"></script>

		 <?php if (isset($component)) { $__componentOriginal856f0259ea7248017a99ecf76b23ebee6b4b7a94 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\FlashAlertJs::class, []); ?>
<?php $component->withName('FlashAlertJs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal856f0259ea7248017a99ecf76b23ebee6b4b7a94)): ?>
<?php $component = $__componentOriginal856f0259ea7248017a99ecf76b23ebee6b4b7a94; ?>
<?php unset($__componentOriginal856f0259ea7248017a99ecf76b23ebee6b4b7a94); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 


		<!--end::Page Scripts -->
	</body>

	<!-- end::Body -->
</html>
<?php /**PATH /home/kafoosaappsjanna/lara/resources/views/admin/auth/login.blade.php ENDPATH**/ ?>