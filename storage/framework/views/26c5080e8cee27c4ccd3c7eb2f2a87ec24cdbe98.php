<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Settings')); ?>

<?php $__env->stopSection(); ?>
<?php
// $logo = asset(Storage::url('uploads/logo/'));
$logo=\App\Models\Utility::get_file('uploads/logo/');
// $company_logo = \App\Models\Utility::getValByName('company_logo');
// $company_small_logo = \App\Models\Utility::getValByName('company_small_logo');
// $company_favicon = \App\Models\Utility::getValByName('company_favicon');
$user = Auth::user();
$file_type = config('files_types');
$setting = App\Models\Utility::settings();


$local_storage_validation    = $setting['local_storage_validation'];
$local_storage_validations   = explode(',', $local_storage_validation);

$s3_storage_validation    = $setting['s3_storage_validation'];
$s3_storage_validations   = explode(',', $s3_storage_validation);

$wasabi_storage_validation    = $setting['wasabi_storage_validation'];
$wasabi_storage_validations   = explode(',', $wasabi_storage_validation);

?>

<?php $__env->startSection('content'); ?>
    <div class="dash-container">
        <div class="dash-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="page-header-title">
                                <h4 class="m-b-10"><?php echo e(__('Settings')); ?></h4>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo e(url('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
                                <li class="breadcrumb-item"><?php echo e(__('Settings')); ?></li>
                            </ul>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end text-end">
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->

            <div class="row">
                <div class="col-xl-3">
                    <div class="card sticky-top" style="top:30px">
                        <div class="list-group list-group-flush" id="useradd-sidenav">
                            <a href="#Brand_Setting" class="list-group-item list-group-item-action border-0">
                                <?php echo e(__('Brand Settings')); ?>

                                <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                            </a>
                            <a href="#Email_Setting" class="list-group-item list-group-item-action border-0">
                                <?php echo e(__('Email Settings')); ?>

                                <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                            </a>
                            <a href="#Payment_Settings" class="list-group-item list-group-item-action border-0">
                                <?php echo e(__('Payment Settings')); ?>

                                <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                            </a>
                            <a href="#Pusher_Setting" class="list-group-item list-group-item-action border-0">
                                <?php echo e(__('Pusher Settings')); ?>

                                <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                            </a>
                            <a href="#ReCaptcha_Setting" class="list-group-item list-group-item-action border-0">
                                <?php echo e(__('ReCaptcha Settings')); ?>

                                <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                            </a>
                            <a href="#Storage_Setting" class="list-group-item list-group-item-action border-0">
                                <?php echo e(__('Storage Setting')); ?>

                                <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9">
                    <div id="Brand_Setting" class="card">
                        <div class="card-header">
                            <h5><?php echo e(__('Brand Settings   ')); ?></h5>
                            <small class="text-muted"><?php echo e(__('Edit your Brand Settings')); ?></small>
                        </div>
                        <div class="card-body">
                            <?php echo e(Form::model($settings, ['route' => ['setting.update', $profile->id], 'method' => 'PUT', 'class' => 'permission_table_information', 'enctype' => 'multipart/form-data'])); ?>


                            <div class="row mt-3">
                                
                                <div class="col-lg-4 col-sm-6 col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5><?php echo e(__('Light Logo')); ?></h5>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class="setting-card">
                                                <div class="logo-content mt-4">
                                                    <a href="<?php echo e($logo.(isset($light_logo) && !empty($light_logo)? $light_logo:'logo-light.png')); ?>" target="_blank">
                                                    <img src="<?php echo e($logo.(isset($light_logo) && !empty($light_logo)? $light_logo:'logo-light.png')); ?>"
                                                        class="big-logo img_setting" id="blah1" style="width: 150px"></a>
                                                </div>
                                                <div class="choose-files mt-5">
                                                    <label for="light_logo" class="form-label choose-files bg-primary "><i
                                                            class="ti ti-upload px-1"></i><?php echo e(__('Select Image')); ?></label>
                                                    <input type="file" name="light_logo" id="light_logo"
                                                        class="custom-input-file d-none" onchange="document.getElementById('blah1').src = window.URL.createObjectURL(this.files[0])">
                                                </div>

                                                 <?php $__errorArgs = ['light_logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="row">
                                                    <span class="invalid-logo" role="alert">
                                                        <strong class="text-danger"><?php echo e($message); ?></strong>
                                                    </span>
                                                </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-4 col-sm-6 col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5><?php echo e(__('Dark Logo')); ?></h5>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class="setting-card">
                                                <div class="logo-content mt-4">
                                                    <a href="<?php echo e($logo.(isset($dark_logo) && !empty($dark_logo)? $dark_logo:'logo-dark.png')); ?>" target="_blank">
                                                    <img src="<?php echo e($logo.(isset($logo_dark) && !empty($logo_dark)? $logo_dark:'logo-dark.png')); ?>"
                                                        class="big-logo" id="blah" style="width: 150px"></a>
                                                </div>
                                                <div class="choose-files mt-5">
                                                    <label for="dark_logo" class="form-label choose-files bg-primary "><i
                                                            class="ti ti-upload px-1"></i><?php echo e(__('Select Image')); ?></label>
                                                    <input type="file" name="dark_logo" id="dark_logo"
                                                        class="custom-input-file d-none"  onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                                </div>
                                                <?php $__errorArgs = ['dark_logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="row">
                                                        <span class="invalid-logo" role="alert">
                                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                                        </span>
                                                    </div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                                <div class="col-lg-4 col-sm-6 col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5><?php echo e(__('Favicon')); ?></h5>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class="setting-card">
                                                <div class="logo-content mt-4">
                                                    <a href="<?php echo e($logo.(isset($favicon) && !empty($favicon)? $favicon :'favicon.png')); ?>" target="_blank">
                                                    <img src="<?php echo e($logo.(isset($favicon) && !empty($favicon)? $company_ficon :'favicon.png')); ?>"
                                                        width="50px" class="big-logo img_setting" id="blah2"></a>
                                                </div>
                                                <div class="choose-files mt-5">
                                                    <label for="favicon" class="form-label choose-files bg-primary ">
                                                        <i class="ti ti-upload px-1"></i><?php echo e(__('Select Image')); ?>

                                                    </label>
                                                    <input type="file" name="favicon" id="favicon"
                                                        class="custom-input-file d-none"  onchange="document.getElementById('blah2').src = window.URL.createObjectURL(this.files[0])">
                                                </div>
                                                   <?php $__errorArgs = ['favicon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="row">
                                                    <span class="invalid-logo" role="alert">
                                                        <strong class="text-danger"><?php echo e($message); ?></strong>
                                                    </span>
                                                </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <?php $__errorArgs = ['logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="row">
                                            <span class="invalid-logo" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group col-md-4">
                                    <?php echo e(Form::label('title_text', __('Title Text'), ['class' => 'form-label text-dark'])); ?>

                                    <?php echo e(Form::text('title_text', null, ['class' => 'form-control', 'placeholder' => __('Title Text')])); ?>

                                    <?php $__errorArgs = ['title_text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-title_text" role="alert">
                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <?php if(\Auth::user()->type == 'super admin'): ?>
                                    <div class="form-group col-md-4">
                                        <?php echo e(Form::label('footer_text', __('Footer Text'), ['class' => 'form-label text-dark'])); ?>

                                        <?php echo e(Form::text('footer_text', null, ['class' => 'form-control', 'placeholder' => __('Footer Text')])); ?>

                                        <?php $__errorArgs = ['footer_text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-footer_text" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group col-4">
                                        <?php echo e(Form::label('', __('Default Languages'), ['class' => 'form-label text-dark'])); ?>

                                        <div class="changeLanguage js-single-select-custom">
                                            <?php
                                                $user = Auth::user();
                                                if ($user) {
                                                    $currantLang = $user->currentLanguage();
                                                    $languages = \App\Models\Utility::languages();
                                                }

                                            ?>
                                            <select name="default_language" id="default_language"
                                                class="form-control js-single-select1" aria-hidden="true">
                                                <?php if(isset($languages) && !empty($languages) && count($languages)): ?>
                                                    <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($language); ?>"
                                                            <?php echo e($settings['default_language'] == $language ? 'selected' : ''); ?>>
                                                            <span><?php echo e(Str::upper($language)); ?> </span>
                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="form-group col-6 col-md-3">
                                    <div class="custom-control custom-switch p-0">
                                        <label class="form-label text-dark"
                                            for="gdpr_cookie"><?php echo e(__('GDPR Cookie')); ?></label><br>
                                        <input type="checkbox" class="form-check-input gdpr_fulltime gdpr_type"
                                            data-toggle="switchbutton" data-onstyle="primary" name="gdpr_cookie"
                                            id="gdpr_cookie"
                                            <?php echo e(isset($settings['gdpr_cookie']) && $settings['gdpr_cookie'] == 'on' ? 'checked="checked"' : ''); ?>>
                                    </div>
                                </div>

                                <div class="form-group col-6 col-md-3">
                                    <div class="custom-control form-switch p-0">
                                        <label class="form-label text-dark"
                                            for="display_landing_page"><?php echo e(__('Enable Landing Page')); ?></label><br>
                                        <input type="checkbox" name="display_landing_page" class="form-check-input"
                                            id="display_landing_page" data-toggle="switchbutton"
                                            <?php echo e($settings['display_landing_page'] == 'on' ? 'checked="checked"' : ''); ?>

                                            data-onstyle="primary">
                                    </div>
                                </div>

                                <div class="form-group col-6 col-md-3">
                                    <div class="custom-control form-switch p-0">
                                        <label class="form-label text-dark"
                                            for="SITE_RTL"><?php echo e(__('Enable RTL')); ?></label><br>
                                        <input type="checkbox" class="form-check-input" data-toggle="switchbutton"
                                            data-onstyle="primary" name="SITE_RTL" id="SITE_RTL"
                                            <?php echo e(Utility::getValByName('SITE_RTL') == 'on' ? 'checked="checked"' : ''); ?>>
                                    </div>
                                </div>
                                <div class="form-group col-6 col-md-3">
                                    <div class="custom-control form-switch p-0">
                                        <label class="form-label text-dark"
                                            for="SIGNUP"><?php echo e(__('Enable Sign-Up Page')); ?></label><br>
                                        <input type="checkbox" name="SIGNUP" class="form-check-input" id="SIGNUP"
                                            data-toggle="switchbutton"
                                            <?php echo e($settings['SIGNUP'] == 'on' ? 'checked="checked"' : ''); ?>

                                            data-onstyle="primary">
                                    </div>
                                </div>
                                <div class="form-group col-12 GDPR_Cookie_Text">
                                    <?php echo e(Form::label('cookie_text', __('GDPR Cookie Text'), ['class' => 'form-label text-dark'])); ?>

                                    <?php echo Form::textarea('cookie_text', $settings['cookie_text'], ['class' => 'form-control', 'rows' => '4']); ?>

                                </div>
                                <h4 class="small-title"><?php echo e(__('Theme Customizer')); ?></h4>
                                <?php
                                    $setting = App\Models\Utility::colorset();
                                    $color = 'theme-3';
                                    if (!empty($setting['color'])) {
                                        $color = $setting['color'];
                                    }
                                ?>
                                <div class="setting-card setting-logo-box p-3">
                                    <div class="row">
                                        <div class="col-4 my-auto">
                                            <h6 class="mt-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-credit-card me-2">
                                                    <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                                    <line x1="1" y1="10" x2="23" y2="10"></line>
                                                </svg>
                                                <?php echo e(__('Primary color settings')); ?>

                                            </h6>
                                            <hr class="my-2">
                                            <div class="theme-color themes-color">
                                                <a href="#!"
                                                    class="<?php echo e(!empty($color) && $color == 'theme-1' ? 'active_color' : ''); ?>"
                                                    data-value="theme-1" onclick="check_theme('theme-1')"></a>
                                                <input type="radio" class="theme_color d-none" name="color" value="theme-1"
                                                    <?php echo e(!empty($color) && $color == 'theme-1' ? 'checked' : ''); ?>>
                                                <a href="#!"
                                                    class="<?php echo e(!empty($color) && $color == 'theme-2' ? 'active_color' : ''); ?>"
                                                    data-value="theme-2" onclick="check_theme('theme-2')"></a>
                                                <input type="radio" class="theme_color d-none" name="color" value="theme-2"
                                                    <?php echo e(!empty($color) && $color == 'theme-2' ? 'checked' : ''); ?>>
                                                <a href="#!"
                                                    class="<?php echo e(empty($color) || $color == 'theme-3' ? 'active_color' : ''); ?>"
                                                    data-value="theme-3" onclick="check_theme('theme-3')"></a>
                                                <input type="radio" class="theme_color d-none" name="color" value="theme-3"
                                                    <?php echo e(empty($color) || $color == 'theme-3' ? 'checked' : ''); ?>>
                                                <a href="#!"
                                                    class="<?php echo e(!empty($color) && $color == 'theme-4' ? 'active_color' : ''); ?>"
                                                    data-value="theme-4" onclick="check_theme('theme-4')"></a>
                                                <input type="radio" class="theme_color d-none" name="color" value="theme-4"
                                                    <?php echo e(!empty($color) && $color == 'theme-4' ? 'checked' : ''); ?>>
                                            </div>
                                        </div>
                                        <div class="col-4 my-auto">
                                            <h6>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-layout me-2">
                                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                                    <line x1="3" y1="9" x2="21" y2="9"></line>
                                                    <line x1="9" y1="21" x2="9" y2="9"></line>
                                                </svg>
                                                <?php echo e(__('Sidebar settings')); ?>

                                            </h6>
                                            <hr class="my-2">
                                            <div class="form-check form-switch">
                                                <input type="checkbox" class="form-check-input" id="cust-theme-bg1"
                                                    name="cust_theme_bg"
                                                    <?php echo e(Utility::getValByName('cust_theme_bg') == 'on' ? 'checked' : ''); ?>>
                                                <label class="form-label text-dark f-w-600 pl-1"
                                                    for="cust-theme-bg"><?php echo e(__('Transparent layout')); ?></label>
                                            </div>
                                        </div>
                                        <div class="col-4 my-auto">
                                            <h6>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-sun me-2">
                                                    <circle cx="12" cy="12" r="5"></circle>
                                                    <line x1="12" y1="1" x2="12" y2="3"></line>
                                                    <line x1="12" y1="21" x2="12" y2="23"></line>
                                                    <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                                                    <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                                                    <line x1="1" y1="12" x2="3" y2="12"></line>
                                                    <line x1="21" y1="12" x2="23" y2="12"></line>
                                                    <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                                                    <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                                                </svg>
                                                <?php echo e(__('Layout settings')); ?>

                                            </h6>
                                            <hr class="my-2">
                                            <div class="form-check form-switch mt-2">
                                                <input type="checkbox" class="form-check-input" id="cust-darklayout1"
                                                    name="cust_darklayout"
                                                    <?php echo e(Utility::getValByName('cust_darklayout') == 'on' ? 'checked' : ''); ?>>
                                                <label class="form-label text-dark f-w-600 pl-1"
                                                    for="cust-darklayout"><?php echo e(__('Dark Layout')); ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <hr>
                                <div class="form-group col-md-6">
                                    <?php echo e(Form::label('footer_link_1', __('Footer Link Title 1'), ['class' => 'form-label text-dark'])); ?>

                                    <?php echo e(Form::text('footer_link_1', null, ['class' => 'form-control', 'placeholder' => __('Enter Footer Link Title 1')])); ?>

                                </div>
                                <div class="form-group col-md-6">
                                    <?php echo e(Form::label('footer_value_1', __('Footer Link href 1'), ['class' => 'form-label text-dark'])); ?>

                                    <?php echo e(Form::text('footer_value_1', null, ['class' => 'form-control', 'placeholder' => __('Enter Footer Link 1')])); ?>

                                </div>
                                <div class="form-group col-md-6">
                                    <?php echo e(Form::label('footer_link_2', __('Footer Link Title 2'), ['class' => 'form-label text-dark'])); ?>

                                    <?php echo e(Form::text('footer_link_2', null, ['class' => 'form-control', 'placeholder' => __('Enter Footer Link Title 2')])); ?>

                                </div>
                                <div class="form-group col-md-6">
                                    <?php echo e(Form::label('footer_value_2', __('Footer Link href 2'), ['class' => 'form-label text-dark'])); ?>

                                    <?php echo e(Form::text('footer_value_2', null, ['class' => 'form-control', 'placeholder' => __('Enter Footer Link 2')])); ?>

                                </div>
                                <div class="form-group col-md-6">
                                    <?php echo e(Form::label('footer_link_3', __('Footer Link Title 3'), ['class' => 'form-label text-dark'])); ?>

                                    <?php echo e(Form::text('footer_link_3', null, ['class' => 'form-control', 'placeholder' => __('Enter Footer Link Title 3')])); ?>

                                </div>
                                <div class="form-group col-md-6">
                                    <?php echo e(Form::label('footer_value_3', __('Footer Link href 3'), ['class' => 'form-label text-dark'])); ?>

                                    <?php echo e(Form::text('footer_value_3', null, ['class' => 'form-control', 'placeholder' => __('Enter Footer Link 3')])); ?>

                                </div>
                                <div class="card-footer text-end py-0 pe-2 border-0">
                                    <?php echo e(Form::submit(__('Save Changes'), ['class' => 'btn  btn-primary'])); ?>

                                </div>
                            </div>
                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>

                    <div id="Email_Setting" class="card">
                        <div class="card-header">
                            <h5><?php echo e(__('Email     Settings')); ?></h5>
                            <small class="text-muted"><?php echo e(__('Edit email settings')); ?></small>
                        </div>
                        <div class="">
                            <?php echo e(Form::model($settings, ['route' => ['email.setting'], 'method' => 'POST', 'class' => 'permission_table_information', 'enctype' => 'multipart/form-data'])); ?>

                            <?php echo e(Form::hidden('form_type', 'email_setting')); ?>

                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('mail_driver', __('Mail Driver'), ['class' => 'form-label text-dark'])); ?>

                                        <?php echo e(Form::text('mail_driver', env('MAIL_DRIVER'), ['class' => 'form-control', 'placeholder' => __('Enter Mail Driver')])); ?>

                                        <?php $__errorArgs = ['mail_driver'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-mail_driver" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('mail_host', __('Mail Host'), ['class' => 'form-label text-dark'])); ?>

                                        <?php echo e(Form::text('mail_host', env('MAIL_HOST'), ['class' => 'form-control ', 'placeholder' => __('Enter Mail Driver')])); ?>

                                        <?php $__errorArgs = ['mail_host'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-mail_driver" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('mail_port', __('Mail Port'), ['class' => 'form-label text-dark'])); ?>

                                        <?php echo e(Form::text('mail_port', env('MAIL_PORT'), ['class' => 'form-control', 'placeholder' => __('Enter Mail Port')])); ?>

                                        <?php $__errorArgs = ['mail_port'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-mail_port" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('mail_username', __('Mail Username'), ['class' => 'form-label text-dark'])); ?>

                                        <?php echo e(Form::text('mail_username', env('MAIL_USERNAME'), ['class' => 'form-control', 'placeholder' => __('Enter Mail Username')])); ?>

                                        <?php $__errorArgs = ['mail_username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-mail_username" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('mail_password', __('Mail Password'), ['class' => 'form-label text-dark'])); ?>

                                        <input class="form-control" placeholder="<?php echo e(__('Enter Mail Password')); ?>"
                                            name="mail_password" type="password" value="<?php echo e(env('MAIL_PASSWORD')); ?>"
                                            id="mail_password">
                                        <?php $__errorArgs = ['mail_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-mail_password" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('mail_encryption', __('Mail Encryption'), ['class' => 'form-label text-dark'])); ?>

                                        <?php echo e(Form::text('mail_encryption', env('MAIL_ENCRYPTION'), ['class' => 'form-control', 'placeholder' => __('Enter Mail Encryption')])); ?>

                                        <?php $__errorArgs = ['mail_encryption'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-mail_encryption" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('mail_from_address', __('Mail From Address'), ['class' => 'form-label text-dark'])); ?>

                                        <?php echo e(Form::text('mail_from_address', env('MAIL_FROM_ADDRESS'), ['class' => 'form-control', 'placeholder' => __('Enter Mail From Address')])); ?>

                                        <?php $__errorArgs = ['mail_from_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-mail_from_address" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('mail_from_name', __('Mail From Name'), ['class' => 'form-label text-dark'])); ?>

                                        <?php echo e(Form::text('mail_from_name', env('MAIL_FROM_NAME'), ['class' => 'form-control', 'placeholder' => __('Enter Mail From Name')])); ?>

                                        <?php $__errorArgs = ['mail_from_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-mail_from_name" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="form-group col-6 mb-0">
                                        
                                        <a href="#" data-url="<?php echo e(route('test.mail')); ?>"
                                        data-title="<?php echo e(__('Send Test Mail')); ?>"
                                        class="btn btn-primary btn-submit text-white send_email">
                                        <?php echo e(__('Send Test Mail')); ?>

                                    </a>
                                    </div>
                                    <div class="form-group col-6 text-end mb-0">
                                        <?php echo e(Form::submit(__('Save Changes'), ['class' => 'btn btn-primary'])); ?>

                                    </div>
                                </div>
                            </div>
                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>

                    <div id="Payment_Settings" class="card">
                        <div class="card-header">
                            <h5><?php echo e(__('Payment Settings')); ?></h5>
                            <small
                                class="text-muted"><?php echo e(__('These details will be used to collect subscription plan payments.Each subscription plan will have a payment button based on the below configuration.')); ?></small>
                        </div>
                        <div class="card-body">
                            <?php echo e(Form::open(['route' => 'payment.setting', 'method' => 'post'])); ?>

                            <div class="row">                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php echo e(Form::label('currency', __('Currency *'), ['class' => 'form-label text-dark'])); ?>

                                        <?php echo e(Form::text('currency', env('CURRENCY'), ['class' => 'form-control font-style', 'required'])); ?>

                                        <small class="text-dark">
                                            <?php echo e(__('Note: Add currency code as per three-letter ISO code.')); ?><br>
                                            <a href="https://stripe.com/docs/currencies"
                                                target="_blank"><?php echo e(__('You can find out how to do that here ')); ?></a></small>
                                        <br>
                                        <?php $__errorArgs = ['currency'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-currency" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php echo e(Form::label('currency_symbol', __('Currency Symbol *'), ['class' => 'form-label text-dark'])); ?>

                                        <?php echo e(Form::text('currency_symbol', env('CURRENCY_SYMBOL'), ['class' => 'form-control', 'required'])); ?>

                                        <?php $__errorArgs = ['currency_symbol'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-currency_symbol" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>

                                <div class="faq">
                                    <div class="accordion accordion-flush" id="accordionExample">
                                        <!-- Stripe -->
                                        <div class="accordion-item card">
                                            <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseStripe"
                                                    aria-expanded="false" aria-controls="collapseStripe">
                                                    <span class="d-flex align-items-center">
                                                        <i class="ti ti-info-circle text-primary me-2"></i>
                                                        <b><?php echo e(__('Stripe')); ?></b> </span>
                                                </button>
                                            </h2>
                                           
                                            <div id="collapseStripe" class="accordion-collapse collapse"
                                                aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                                                <div class="accordion-body row">
                                                    <div class="col-12 text-end text-end">
                                                        <div class="form-check form-switch d-inline-block">
                                                            <input type="hidden" name="is_stripe_enabled" value="off">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="is_stripe_enabled" id="is_stripe_enabled"
                                                                <?php echo e(isset($admin_payment_setting['is_stripe_enabled']) && $admin_payment_setting['is_stripe_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                            <label
                                                                class="custom-control-label form-label text-dark"
                                                                for="is_stripe_enabled"><?php echo e(__('Enable Stripe')); ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <?php echo e(Form::label('stripe_key', __('Stripe Key'), ['class' => 'form-label text-dark'])); ?>

                                                            <?php echo e(Form::text('stripe_key', isset($admin_payment_setting['stripe_key']) ? $admin_payment_setting['stripe_key'] : '', ['class' => 'form-control', 'placeholder' => __('Enter Stripe Key')])); ?>

                                                            <?php if($errors->has('stripe_key')): ?>
                                                                <span class="invalid-feedback d-block">
                                                                    <?php echo e($errors->first('stripe_key')); ?>

                                                                </span>
                                                            <?php endif; ?>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <?php echo e(Form::label('stripe_secret', __('Stripe Secret'), ['class' => 'form-label text-dark'])); ?>

                                                            <?php echo e(Form::text('stripe_secret', isset($admin_payment_setting['stripe_secret']) ? $admin_payment_setting['stripe_secret'] : '', ['class' => 'form-control ', 'placeholder' => __('Enter Stripe Secret')])); ?>

                                                            <?php if($errors->has('stripe_secret')): ?>
                                                                <span class="invalid-feedback d-block">
                                                                    <?php echo e($errors->first('stripe_secret')); ?>

                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Paypal -->
                                        <div class="accordion-item card mb-3">
                                            <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapsePayPal"
                                                    aria-expanded="false" aria-controls="collapsePayPal">
                                                    <span class="d-flex align-items-center">
                                                        <i class="ti ti-info-circle text-primary me-2"></i>
                                                        <b><?php echo e(__('PayPal')); ?></b> </span>
                                                </button>
                                            </h2>
                                            <div id="collapsePayPal" class="accordion-collapse collapse"
                                                aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                                                <div class="accordion-body row">
                                                    <div class="col-12 text-end text-end">
                                                        <div class="form-check form-switch d-inline-block">
                                                            <input type="hidden" name="is_paypal_enabled" value="off">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="is_paypal_enabled" id="is_paypal_enabled"
                                                                <?php echo e(isset($admin_payment_setting['is_paypal_enabled']) && $admin_payment_setting['is_paypal_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                            <label
                                                                class="custom-control-label form-label text-dark"
                                                                for="is_paypal_enabled"><?php echo e(__('Enable Paypal')); ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 pb-4">
                                                        <label class="paypal-label col-form-label text-dark"
                                                            for="paypal_mode"><?php echo e(__('Paypal Mode')); ?></label> <br>
                                                        <div class="d-flex">
                                                            <div class="mr-2" style="margin-right: 15px;">
                                                                <div class="border card p-3">
                                                                    <div class="form-check">
                                                                        <label class="form-check-labe text-dark">
                                                                            <input type="radio" name="paypal_mode"
                                                                                value="sandbox" class="form-check-input"
                                                                                <?php echo e((isset($admin_payment_setting['paypal_mode']) && $admin_payment_setting['paypal_mode'] == '') || (isset($admin_payment_setting['paypal_mode']) && $admin_payment_setting['paypal_mode'] == 'sandbox') ? 'checked="checked"' : ''); ?>>
                                                                            <?php echo e(__('Sandbox')); ?>

                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mr-2">
                                                                <div class="border card p-3">
                                                                    <div class="form-check">
                                                                        <label class="form-check-labe text-dark">
                                                                            <input type="radio" name="paypal_mode"
                                                                                value="live" class="form-check-input"
                                                                                <?php echo e(isset($admin_payment_setting['paypal_mode']) && $admin_payment_setting['paypal_mode'] == 'live' ? 'checked="checked"' : ''); ?>>
                                                                            <?php echo e(__('Live')); ?>

                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="paypal_client_id"
                                                                class="form-label text-dark"><?php echo e(__('Client ID')); ?></label>
                                                            <input type="text" name="paypal_client_id" id="paypal_client_id"
                                                                class="form-control"
                                                                value="<?php echo e(isset($admin_payment_setting['paypal_client_id']) ? $admin_payment_setting['paypal_client_id'] : ''); ?>"
                                                                placeholder="<?php echo e(__('Client ID')); ?>" />
                                                            <?php if($errors->has('paypal_client_id')): ?>
                                                                <span class="invalid-feedback d-block">
                                                                    <?php echo e($errors->first('paypal_client_id')); ?>

                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="paypal_secret_key"
                                                                class="form-label text-dark"><?php echo e(__('Secret Key')); ?></label>
                                                            <input type="text" name="paypal_secret_key"
                                                                id="paypal_secret_key" class="form-control"
                                                                value="<?php echo e(isset($admin_payment_setting['paypal_secret_key']) ? $admin_payment_setting['paypal_secret_key'] : ''); ?>"
                                                                placeholder="<?php echo e(__('Secret Key')); ?>" />
                                                            <?php if($errors->has('paypal_secret_key')): ?>
                                                                <span class="invalid-feedback d-block">
                                                                    <?php echo e($errors->first('paypal_secret_key')); ?>

                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Paystack -->
                                        <div class="accordion-item card mb-3">
                                            <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapsePaystack"
                                                    aria-expanded="false" aria-controls="collapsePaystack">
                                                    <span class="d-flex align-items-center">
                                                        <i class="ti ti-info-circle text-primary me-2"></i>
                                                        <b><?php echo e(__('Paystack')); ?></b> </span>
                                                </button>
                                            </h2>
                                            <div id="collapsePaystack" class="accordion-collapse collapse"
                                                aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                                                <div class="accordion-body row">
                                                    <div class="col-12 text text-end">
                                                        <div class="form-check form-switch d-inline-block">
                                                            <input type="hidden" name="is_paystack_enabled" value="off">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="is_paystack_enabled" id="is_paystack_enabled"
                                                                <?php echo e(isset($admin_payment_setting['is_paystack_enabled']) && $admin_payment_setting['is_paystack_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                            <label
                                                                class="custom-control-label form-label text-dark"
                                                                for="is_paystack_enabled"><?php echo e(__('Enable Paystack')); ?></label>
                                                        </div>

                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="paypal_client_id"
                                                                class="form-label text-dark"><?php echo e(__('Public Key')); ?></label>
                                                            <input type="text" name="paystack_public_key"
                                                                id="paystack_public_key"
                                                                class="form-control form-label text-dark"
                                                                value="<?php echo e(isset($admin_payment_setting['paystack_public_key']) ? $admin_payment_setting['paystack_public_key'] : ''); ?>"
                                                                placeholder="<?php echo e(__('Public Key')); ?>" />
                                                            <?php if($errors->has('paystack_public_key')): ?>
                                                                <span class="invalid-feedback d-block">
                                                                    <?php echo e($errors->first('paystack_public_key')); ?>

                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="paystack_secret_key"
                                                                class="form-label text-dark"><?php echo e(__('Secret Key')); ?></label>
                                                            <input type="text" name="paystack_secret_key"
                                                                id="paystack_secret_key"
                                                                class="form-control form-label text-dark"
                                                                value="<?php echo e(isset($admin_payment_setting['paystack_secret_key']) ? $admin_payment_setting['paystack_secret_key'] : ''); ?>"
                                                                placeholder="<?php echo e(__('Secret Key')); ?>" />
                                                            <?php if($errors->has('paystack_secret_key')): ?>
                                                                <span class="invalid-feedback d-block">
                                                                    <?php echo e($errors->first('paystack_secret_key')); ?>

                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- FLUTTERWAVE -->
                                        <div class="accordion-item card mb-3">
                                            <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseFlutterwave"
                                                    aria-expanded="false" aria-controls="collapseFlutterwave">
                                                    <span class="d-flex align-items-center">
                                                        <i class="ti ti-info-circle text-primary me-2"></i>
                                                        <b><?php echo e(__('Flutterwave')); ?></b> </span>
                                                </button>
                                            </h2>
                                            <div id="collapseFlutterwave" class="accordion-collapse collapse"
                                                aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                                                <div class="accordion-body row">
                                                    <div class="col-12 text text-end">
                                                        <div class="form-check form-switch d-inline-block">
                                                            <input type="hidden" name="is_flutterwave_enabled" value="off">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="is_flutterwave_enabled" id="is_flutterwave_enabled"
                                                                <?php echo e(isset($admin_payment_setting['is_flutterwave_enabled']) && $admin_payment_setting['is_flutterwave_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                            <label
                                                                class="custom-control-label form-label text-dark"
                                                                for="is_flutterwave_enabled"><?php echo e(__('Enable Flutterwave')); ?></label>
                                                        </div>

                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="paypal_client_id"
                                                                class="form-label text-dark"><?php echo e(__('Public Key')); ?></label>
                                                            <input type="text" name="flutterwave_public_key"
                                                                id="flutterwave_public_key" class="form-control"
                                                                value="<?php echo e(isset($admin_payment_setting['flutterwave_public_key']) ? $admin_payment_setting['flutterwave_public_key'] : ''); ?>"
                                                                placeholder="<?php echo e(__('Public Key')); ?>" />
                                                            <?php if($errors->has('flutterwave_public_key')): ?>
                                                                <span class="invalid-feedback d-block">
                                                                    <?php echo e($errors->first('flutterwave_public_key')); ?>

                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="paystack_secret_key"
                                                                class="form-label text-dark"><?php echo e(__('Secret Key')); ?></label>
                                                            <input type="text" name="flutterwave_secret_key"
                                                                id="flutterwave_secret_key"
                                                                class="form-control form-label text-dark"
                                                                value="<?php echo e(isset($admin_payment_setting['flutterwave_secret_key']) ? $admin_payment_setting['flutterwave_secret_key'] : ''); ?>"
                                                                placeholder="<?php echo e(__('Secret Key')); ?>" />
                                                            <?php if($errors->has('flutterwave_secret_key')): ?>
                                                                <span class="invalid-feedback d-block">
                                                                    <?php echo e($errors->first('flutterwave_secret_key')); ?>

                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Razorpay -->
                                        <div class="accordion-item card mb-3">
                                            <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseRazorpay"
                                                    aria-expanded="false" aria-controls="collapseRazorpay">
                                                    <span class="d-flex align-items-center">
                                                        <i class="ti ti-info-circle text-primary me-2"></i>
                                                        <b><?php echo e(__('Razorpay')); ?></b> </span>
                                                </button>
                                            </h2>
                                            <div id="collapseRazorpay" class="accordion-collapse collapse"
                                                aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                                                <div class="accordion-body row">
                                                    <div class="col-12 text text-end">
                                                        <div class="form-check form-switch d-inline-block">
                                                            <input type="hidden" name="is_razorpay_enabled" value="off">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="is_razorpay_enabled" id="is_razorpay_enabled"
                                                                <?php echo e(isset($admin_payment_setting['is_razorpay_enabled']) && $admin_payment_setting['is_razorpay_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                            <label
                                                                class="custom-control-label form-label text-dark"
                                                                for="is_razorpay_enabled"><?php echo e(__('Enable Razorpay')); ?></label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="paypal_client_id"
                                                                class="form-label text-dark"><?php echo e(__('Public Key')); ?></label>

                                                            <input type="text" name="razorpay_public_key"
                                                                id="razorpay_public_key" class="form-control"
                                                                value="<?php echo e(isset($admin_payment_setting['razorpay_public_key']) ? $admin_payment_setting['razorpay_public_key'] : ''); ?>"
                                                                placeholder="<?php echo e(__('Public Key')); ?>" />
                                                            <?php if($errors->has('razorpay_public_key')): ?>
                                                                <span class="invalid-feedback d-block">
                                                                    <?php echo e($errors->first('razorpay_public_key')); ?>

                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="paystack_secret_key"
                                                                class="form-label text-dark"><?php echo e(__('Secret Key')); ?></label>
                                                            <input type="text" name="razorpay_secret_key"
                                                                id="razorpay_secret_key" class="form-control"
                                                                value="<?php echo e(isset($admin_payment_setting['razorpay_secret_key']) ? $admin_payment_setting['razorpay_secret_key'] : ''); ?>"
                                                                placeholder="<?php echo e(__('Secret Key')); ?>" />
                                                            <?php if($errors->has('razorpay_secret_key')): ?>
                                                                <span class="invalid-feedback d-block">
                                                                    <?php echo e($errors->first('razorpay_secret_key')); ?>

                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Mercado Pago -->
                                        <div class="accordion-item card mb-3">
                                            <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseMercado_Pago"
                                                    aria-expanded="false" aria-controls="collapseMercado_Pago">
                                                    <span class="d-flex align-items-center">
                                                        <i class="ti ti-info-circle text-primary me-2"></i>
                                                        <b><?php echo e(__('Mercado Pago')); ?></b> </span>
                                                </button>
                                            </h2>
                                            <div id="collapseMercado_Pago" class="accordion-collapse collapse"
                                                aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                                                <div class="accordion-body row">
                                                    <div class="col-12 text text-end">
                                                        <div class="form-check form-switch d-inline-block">
                                                            <input type="hidden" name="is_mercado_enabled" value="off">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="is_mercado_enabled" id="is_mercado_enabled"
                                                                <?php echo e(isset($admin_payment_setting['is_mercado_enabled']) && $admin_payment_setting['is_mercado_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                            <label
                                                                class="custom-control-label form-label text-dark"
                                                                for="is_mercado_enabled"><?php echo e(__('Enable Mercado Pago')); ?></label>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-12 pb-4">
                                                        <label class="coingate-label form-label text-dark"
                                                            for="mercado_mode"><?php echo e(__('Mercado Mode')); ?></label>
                                                        <div class="d-flex">
                                                            <div class="mr-2" style="margin-right: 15px;">
                                                                <div class="border card p-3">
                                                                    <div class="form-check">
                                                                        <label class="form-check-labe text-dark">
                                                                            <input type="radio" name="mercado_mode"
                                                                                value="sandbox" class="form-check-input"
                                                                                <?php echo e((isset($payment['mercado_mode']) && $payment['mercado_mode'] == '') || (isset($payment['mercado_mode']) && $payment['mercado_mode'] == 'sandbox') ? 'checked="checked"' : ''); ?>>
                                                                            <?php echo e(__('Sandbox')); ?>

                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mr-2">
                                                                <div class="border card p-3">
                                                                    <div class="form-check">
                                                                        <label class="form-check-labe text-dark">
                                                                            <input type="radio" name="mercado_mode"
                                                                                value="live" class="form-check-input"
                                                                                <?php echo e(isset($payment['mercado_mode']) && $payment['mercado_mode'] == 'live' ? 'checked="checked"' : ''); ?>>
                                                                            <?php echo e(__('Live')); ?>

                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label
                                                                for="mercado_access_token"><?php echo e(__('Access Token')); ?></label>
                                                            <input type="text" name="mercado_access_token"
                                                                id="mercado_access_token" class="form-control"
                                                                value="<?php echo e(isset($admin_payment_setting['mercado_access_token']) ? $admin_payment_setting['mercado_access_token'] : ''); ?>"
                                                                placeholder="<?php echo e(__('Access Token')); ?>" />
                                                            <?php if($errors->has('mercado_secret_key')): ?>
                                                                <span class="invalid-feedback d-block">
                                                                    <?php echo e($errors->first('mercado_access_token')); ?>

                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <!-- Paytm -->
                                        <div class="accordion-item card mb-3">
                                            <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapsePaytm"
                                                    aria-expanded="false" aria-controls="collapsePaytm">
                                                    <span class="d-flex align-items-center">
                                                        <i class="ti ti-info-circle text-primary me-2"></i>
                                                        <b><?php echo e(__('Paytm')); ?></b> </span>
                                                </button>
                                            </h2>
                                            <div id="collapsePaytm" class="accordion-collapse collapse"
                                                aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                                                <div class="accordion-body row">
                                                    <div class="col-12 text text-end">
                                                        <div class="form-check form-switch d-inline-block">
                                                            <input type="hidden" name="is_paytm_enabled" value="off">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="is_paytm_enabled" id="is_paytm_enabled"
                                                                <?php echo e(isset($admin_payment_setting['is_paytm_enabled']) && $admin_payment_setting['is_paytm_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                            <label
                                                                class="custom-control-label form-label text-dark"
                                                                for="is_paytm_enabled"><?php echo e(__('Enable Paytm')); ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 pb-4">
                                                        <label class="paypal-label form-label text-dark"
                                                            for="paypal_mode"><?php echo e(__('Paytm Environment')); ?></label>
                                                        <br>
                                                        <div class="d-flex">
                                                            <div class="mr-2" style="margin-right: 15px;">
                                                                <div class="border card p-3">
                                                                    <div class="form-check">
                                                                        <label class="form-check-labe text-dark">
                                                                            <input type="radio" name="paytm_mode"
                                                                                value="local" class="form-check-input"
                                                                                <?php echo e((isset($admin_payment_setting['paytm_mode']) && $admin_payment_setting['paytm_mode'] == '') || (isset($admin_payment_setting['paytm_mode']) && $admin_payment_setting['paytm_mode'] == 'local') ? 'checked="checked"' : ''); ?>>
                                                                            <?php echo e(__('Local')); ?>

                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mr-2">
                                                                <div class="border card p-3">
                                                                    <div class="form-check">
                                                                        <label class="form-check-labe text-dark">
                                                                            <input type="radio" name="paytm_mode"
                                                                                value="production" class="form-check-input"
                                                                                <?php echo e(isset($admin_payment_setting['paytm_mode']) && $admin_payment_setting['paytm_mode'] == 'production' ? 'checked="checked"' : ''); ?>>
                                                                            <?php echo e(__('Production')); ?>

                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="paytm_public_key"
                                                                class="form-label text-dark"><?php echo e(__('Merchant ID')); ?></label>
                                                            <input type="text" name="paytm_merchant_id"
                                                                id="paytm_merchant_id" class="form-control"
                                                                value="<?php echo e(isset($admin_payment_setting['paytm_merchant_id']) ? $admin_payment_setting['paytm_merchant_id'] : ''); ?>"
                                                                placeholder="<?php echo e(__('Merchant ID')); ?>" />
                                                            <?php if($errors->has('paytm_merchant_id')): ?>
                                                                <span class="invalid-feedback d-block">
                                                                    <?php echo e($errors->first('paytm_merchant_id')); ?>

                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="paytm_secret_key"
                                                                class="form-label text-dark"><?php echo e(__('Merchant Key')); ?></label>
                                                            <input type="text" name="paytm_merchant_key"
                                                                id="paytm_merchant_key" class="form-control"
                                                                value="<?php echo e(isset($admin_payment_setting['paytm_merchant_key']) ? $admin_payment_setting['paytm_merchant_key'] : ''); ?>"
                                                                placeholder="<?php echo e(__('Merchant Key')); ?>" />
                                                            <?php if($errors->has('paytm_merchant_key')): ?>
                                                                <span class="invalid-feedback d-block">
                                                                    <?php echo e($errors->first('paytm_merchant_key')); ?>

                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="paytm_industry_type"
                                                                class="form-label text-dark">
                                                                <?php echo e(__('Industry Type')); ?></label>
                                                            <input type="text" name="paytm_industry_type"
                                                                id="paytm_industry_type" class="form-control"
                                                                value="<?php echo e(isset($admin_payment_setting['paytm_industry_type']) ? $admin_payment_setting['paytm_industry_type'] : ''); ?>"
                                                                placeholder="<?php echo e(__('Industry Type')); ?>" />
                                                            <?php if($errors->has('paytm_industry_type')): ?>
                                                                <span class="invalid-feedback d-block">
                                                                    <?php echo e($errors->first('paytm_industry_type')); ?>

                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Mollie -->
                                        <div class="accordion-item card mb-3">
                                            <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseMollie"
                                                    aria-expanded="false" aria-controls="collapseMollie">
                                                    <span class="d-flex align-items-center">
                                                        <i class="ti ti-info-circle text-primary me-2"></i>
                                                        <b><?php echo e(__('Mollie')); ?></b> </span>
                                                </button>
                                            </h2>
                                            <div id="collapseMollie" class="accordion-collapse collapse"
                                                aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                                                <div class="accordion-body row">
                                                    <div class="col-12 text text-end">
                                                        <div class="form-check form-switch d-inline-block">
                                                            <input type="hidden" name="is_mollie_enabled" value="off">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="is_mollie_enabled" id="is_mollie_enabled"
                                                                <?php echo e(isset($admin_payment_setting['is_mollie_enabled']) && $admin_payment_setting['is_mollie_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                            <label
                                                                class="custom-control-label form-label text-dark"
                                                                for="is_mollie_enabled"><?php echo e(__('Enable Mollie')); ?></label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="mollie_api_key"
                                                                class="form-label text-dark"><?php echo e(__('Mollie Api Key')); ?></label>
                                                            <input type="text" name="mollie_api_key" id="mollie_api_key"
                                                                class="form-control"
                                                                value="<?php echo e(isset($admin_payment_setting['mollie_api_key']) ? $admin_payment_setting['mollie_api_key'] : ''); ?>"
                                                                placeholder="<?php echo e(__('Mollie Api Key')); ?>" />
                                                            <?php if($errors->has('mollie_api_key')): ?>
                                                                <span class="invalid-feedback d-block">
                                                                    <?php echo e($errors->first('mollie_api_key')); ?>

                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="mollie_profile_id"
                                                                class="form-label text-dark"><?php echo e(__('Mollie Profile Id')); ?></label>
                                                            <input type="text" name="mollie_profile_id"
                                                                id="mollie_profile_id" class="form-control"
                                                                value="<?php echo e(isset($admin_payment_setting['mollie_profile_id']) ? $admin_payment_setting['mollie_profile_id'] : ''); ?>"
                                                                placeholder="<?php echo e(__('Mollie Profile Id')); ?>" />
                                                            <?php if($errors->has('mollie_profile_id')): ?>
                                                                <span class="invalid-feedback d-block">
                                                                    <?php echo e($errors->first('mollie_profile_id')); ?>

                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="mollie_partner_id"
                                                                class="form-label text-dark"><?php echo e(__('Mollie Partner Id')); ?></label>
                                                            <input type="text" name="mollie_partner_id"
                                                                id="mollie_partner_id" class="form-control"
                                                                value="<?php echo e(isset($admin_payment_setting['mollie_partner_id']) ? $admin_payment_setting['mollie_partner_id'] : ''); ?>"
                                                                placeholder="<?php echo e(__('Mollie Partner Id')); ?>" />
                                                            <?php if($errors->has('mollie_partner_id')): ?>
                                                                <span class="invalid-feedback d-block">
                                                                    <?php echo e($errors->first('mollie_partner_id')); ?>

                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <!-- Skrill -->
                                        <div class="accordion-item card mb-3">
                                            <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseSkrill"
                                                    aria-expanded="false" aria-controls="collapseSkrill">
                                                    <span class="d-flex align-items-center">
                                                        <i class="ti ti-info-circle text-primary me-2"></i>
                                                        <b><?php echo e(__('Skrill')); ?></b> </span>
                                                </button>
                                            </h2>
                                            <div id="collapseSkrill" class="accordion-collapse collapse"
                                                aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                                                <div class="accordion-body row">
                                                    <div class="col-12 text text-end">
                                                        <div class="form-check form-switch d-inline-block">
                                                            <input type="hidden" name="is_skrill_enabled" value="off">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="is_skrill_enabled" id="is_skrill_enabled"
                                                                <?php echo e(isset($admin_payment_setting['is_skrill_enabled']) && $admin_payment_setting['is_skrill_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                            <label
                                                                class="custom-control-label form-label text-dark"
                                                                for="is_skrill_enabled"><?php echo e(__('Enable Skrill')); ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="mollie_api_key"
                                                                class="form-label text-dark"><?php echo e(__('Skrill Email')); ?></label>
                                                            <input type="email" name="skrill_email" id="skrill_email"
                                                                class="form-control"
                                                                value="<?php echo e(isset($admin_payment_setting['skrill_email']) ? $admin_payment_setting['skrill_email'] : ''); ?>"
                                                                placeholder="<?php echo e(__('Mollie Api Key')); ?>" />
                                                            <?php if($errors->has('skrill_email')): ?>
                                                                <span class="invalid-feedback d-block">
                                                                    <?php echo e($errors->first('skrill_email')); ?>

                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- CoinGate -->
                                        <div class="accordion-item card mb-3">
                                            <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseCoinGate"
                                                    aria-expanded="false" aria-controls="collapseCoinGate">
                                                    <span class="d-flex align-items-center">
                                                        <i class="ti ti-info-circle text-primary me-2"></i>
                                                        <b><?php echo e(__('CoinGate')); ?></b> </span>
                                                </button>
                                            </h2>
                                            <div id="collapseCoinGate" class="accordion-collapse collapse"
                                                aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                                                <div class="accordion-body row">
                                                    <div class="col-12 text text-end">
                                                        <div class="form-check form-switch d-inline-block">
                                                            <input type="hidden" name="is_coingate_enabled" value="off">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="is_coingate_enabled" id="is_coingate_enabled"
                                                                <?php echo e(isset($admin_payment_setting['is_coingate_enabled']) && $admin_payment_setting['is_coingate_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                            <label
                                                                class="custom-control-label form-label text-dark"
                                                                for="is_coingate_enabled"><?php echo e(__('Enable CoinGate')); ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 pb-4">
                                                        <label class="coingate-label form-label text-dark"
                                                            for="coingate_mode"><?php echo e(__('CoinGate Mode')); ?></label>
                                                        <br>
                                                        <div class="d-flex">
                                                            <div class="mr-2" style="margin-right: 15px;">
                                                                <div class="border card p-3">
                                                                    <div class="form-check">
                                                                        <label class="form-check-labe text-dark">
                                                                            <input type="radio" name="coingate_mode"
                                                                                value="sandbox" class="form-check-input"
                                                                                <?php echo e((isset($admin_payment_setting['coingate_mode']) && $admin_payment_setting['coingate_mode'] == '') || (isset($admin_payment_setting['coingate_mode']) && $admin_payment_setting['coingate_mode'] == 'sandbox') ? 'checked="checked"' : ''); ?>>
                                                                            <?php echo e(__('Sandbox')); ?>

                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mr-2">
                                                                <div class="border card p-3">
                                                                    <div class="form-check">
                                                                        <label class="form-check-labe text-dark">
                                                                            <input type="radio" name="coingate_mode"
                                                                                value="live" class="form-check-input"
                                                                                <?php echo e(isset($admin_payment_setting['coingate_mode']) && $admin_payment_setting['coingate_mode'] == 'live' ? 'checked="checked"' : ''); ?>>
                                                                            <?php echo e(__('Live')); ?>

                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="coingate_auth_token"
                                                                class="form-label text-dark"><?php echo e(__('CoinGate Auth Token')); ?></label>
                                                            <input type="text" name="coingate_auth_token"
                                                                id="coingate_auth_token" class="form-control"
                                                                value="<?php echo e(isset($admin_payment_setting['coingate_auth_token']) ? $admin_payment_setting['coingate_auth_token'] : ''); ?>"
                                                                placeholder="<?php echo e(__('CoinGate Auth Token')); ?>" />
                                                            <?php if($errors->has('coingate_auth_token')): ?>
                                                                <span class="invalid-feedback d-block">
                                                                    <?php echo e($errors->first('coingate_auth_token')); ?>

                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- PaymentWall -->
                                        <div class="accordion-item card mb-3">
                                            <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapsePaymentWall"
                                                    aria-expanded="false" aria-controls="collapsePaymentWall">
                                                    <span class="d-flex align-items-center">
                                                        <i class="ti ti-info-circle text-primary me-2"></i>
                                                        <b><?php echo e(__('PaymentWall')); ?></b> </span>
                                                </button>
                                            </h2>
                                            <div id="collapsePaymentWall" class="accordion-collapse collapse"
                                                aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                                                <div class="accordion-body row">
                                                    <div class="col-12 text text-end">
                                                        <div class="form-check form-switch d-inline-block">
                                                            <input type="hidden" name="is_paymentwall_enabled" value="off">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="is_paymentwall_enabled" id="is_paymentwall_enabled"
                                                                <?php echo e(isset($admin_payment_setting['is_paymentwall_enabled']) && $admin_payment_setting['is_paymentwall_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                            <label
                                                                class="custom-control-label form-label text-dark"
                                                                for="is_paymentwall_enabled"><?php echo e(__('Enable PaymentWall')); ?></label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="paypal_client_id"
                                                                class="form-label text-dark"><?php echo e(__('Public Key')); ?></label>
                                                            <input type="text" name="paymentwall_public_key"
                                                                id="paymentwall_public_key"
                                                                class="form-control form-label text-dark"
                                                                value="<?php echo e(isset($admin_payment_setting['paymentwall_public_key']) ? $admin_payment_setting['paymentwall_public_key'] : ''); ?>"
                                                                placeholder="<?php echo e(__('Public Key')); ?>" />
                                                            <?php if($errors->has('paymentwall_public_key')): ?>
                                                                <span class="invalid-feedback d-block">
                                                                    <?php echo e($errors->first('paymentwall_public_key')); ?>

                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="paymentwall_secret_key"
                                                                class="form-label text-dark"><?php echo e(__('Secret Key')); ?></label>
                                                            <input type="text" name="paymentwall_secret_key"
                                                                id="paymentwall_secret_key"
                                                                class="form-control form-label text-dark"
                                                                value="<?php echo e(isset($admin_payment_setting['paymentwall_secret_key']) ? $admin_payment_setting['paymentwall_secret_key'] : ''); ?>"
                                                                placeholder="<?php echo e(__('Secret Key')); ?>" />
                                                            <?php if($errors->has('paymentwall_secret_key')): ?>
                                                                <span class="invalid-feedback d-block">
                                                                    <?php echo e($errors->first('paymentwall_secret_key')); ?>

                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                        <div class="card-footer text-end py-0 pe-2 border-0">
                                            <?php echo e(Form::submit(__('Save Changes'), ['class' => 'btn btn-primary'])); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>

                    <div id="Pusher_Setting" class="card">
                        <?php echo e(Form::model($settings, ['route' => ['pusher.setting'], 'method' => 'POST', 'class' => 'permission_table_information', 'enctype' => 'multipart/form-data'])); ?>

                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <h5 class=""><?php echo e(__('Pusher Settings')); ?></h5>
                                    <small
                                        class="text-secondary font-weight-bold"><?php echo e(__('Edit Pusher settings')); ?></small>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 text-end">
                                    <input type="hidden" name="is_mercado_enabled" value="off">
                                    <input type="checkbox" name="enable_chat" id="enable_chat" data-toggle="switchbutton"
                                        data-onstyle="primary"
                                        <?php echo e(!empty(env('ENABLE_CHAT')) && env('ENABLE_CHAT') == 'on' ? 'checked="checked"' : ''); ?>>
                                    <label class="custom-label form-label" for="enable_chat"></label>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('', __('Pusher App Id'), ['class' => 'form-label text-dark'])); ?>

                                        <?php echo e(Form::text('pusher_app_id', env('PUSHER_APP_ID'), ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('Pusher App Id')])); ?>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('', __('Pusher App Key'), ['class' => 'form-label text-dark'])); ?>

                                        <?php echo e(Form::text('pusher_app_key', env('PUSHER_APP_KEY'), ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('Pusher App Key')])); ?>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('', __('Pusher App Secret'), ['class' => 'form-label text-dark'])); ?>

                                        <?php echo e(Form::text('pusher_app_secret', env('PUSHER_APP_SECRET'), ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('Pusher App Secret')])); ?>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('', __('Pusher App Cluster'), ['class' => 'form-label text-dark'])); ?>

                                        <?php echo e(Form::text('pusher_app_cluster', env('PUSHER_APP_CLUSTER'), ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('Pusher App Cluster')])); ?>

                                    </div>
                                </div>
                                <div class="card-footer text-end py-0 pe-2 border-0">
                                    <?php echo e(Form::submit(__('Save Changes'), ['class' => 'btn btn-primary'])); ?>

                                </div>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>

                    <div id="ReCaptcha_Setting" class="card">
                        <form method="POST" action="<?php echo e(route('recaptcha.settings.store')); ?>" accept-charset="UTF-8">
                            <?php echo csrf_field(); ?>
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                        <h5><?php echo e(__('ReCaptcha Settings')); ?></h5>
                                        <small class="text-muted"><a
                                                href="https://phppot.com/php/how-to-get-google-recaptcha-site-and-secret-key/"
                                                target="_blank" class="text-blue">
                                                <small>(<?php echo e(__('How to Get Google reCaptcha Site and Secret key')); ?>)</small>
                                            </a> </small>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 text-end">
                                        <input type="checkbox" name="recaptcha_module" id="recaptcha_module"
                                            data-toggle="switchbutton" value="yes" data-onstyle="primary"
                                            <?php echo e(env('RECAPTCHA_MODULE') == 'yes' ? 'checked="checked"' : ''); ?>>
                                    </div>
                                </div>
                            </div>

                            <div class="">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                            <label for="google_recaptcha_key"
                                                class="form-label text-dark"><?php echo e(__('Google Recaptcha Key')); ?></label>
                                            <input class="form-control"
                                                placeholder="<?php echo e(__('Enter Google Recaptcha Key')); ?>"
                                                name="google_recaptcha_key" type="text"
                                                value="<?php echo e(env('NOCAPTCHA_SITEKEY')); ?>" id="google_recaptcha_key">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                            <label for="google_recaptcha_secret"
                                                class="form-label text-dark"><?php echo e(__('Google Recaptcha Secret')); ?></label>
                                            <input class="form-control "
                                                placeholder="<?php echo e(__('Enter Google Recaptcha Secret')); ?>"
                                                name="google_recaptcha_secret" type="text"
                                                value="<?php echo e(env('NOCAPTCHA_SECRET')); ?>" id="google_recaptcha_secret">
                                        </div>
                                    </div>
                                    <div class="col-lg-12  text-end">
                                        <input type="submit" value="<?php echo e(__('Save Changes')); ?>" class="btn btn-primary">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>


                <!--storage Setting-->
                <div id="Storage_Setting" class="card mb-3">
                    <?php echo e(Form::open(array('route' => 'storage.setting.store', 'enctype' => "multipart/form-data"))); ?>

                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    <h5 class=""><?php echo e(__('Storage Settings')); ?></h5>
                                    <small class="text-muted"><?php echo e(__('Edit storage settings')); ?></small>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="pe-2">
                                
                                    <input type="radio" class="btn-check" name="storage_setting" id="local-outlined" autocomplete="off" <?php echo e($settings['storage_setting'] == 'local'?'checked':''); ?> value="local" checked>
                                    <label class="btn btn-outline-success" for="local-outlined"><?php echo e(__('Local')); ?></label>
                                </div>
                                <div  class="pe-2">
                                    <input type="radio" class="btn-check" name="storage_setting" id="s3-outlined" autocomplete="off" <?php echo e($settings['storage_setting']=='s3'?'checked':''); ?>  value="s3">
                                    <label class="btn btn-outline-success" for="s3-outlined"> <?php echo e(__('AWS S3')); ?></label>
                                </div>
    
                                <div  class="pe-2">
                                    <input type="radio" class="btn-check" name="storage_setting" id="wasabi-outlined" autocomplete="off" <?php echo e($settings['storage_setting']=='wasabi'?'checked':''); ?> value="wasabi">
                                    <label class="btn btn-outline-success" for="wasabi-outlined"><?php echo e(__('Wasabi')); ?></label>
                                </div>
                            </div>
                            
                            <div class="local-setting row">
                                
                                <div class="form-group col-8 switch-width">
                                    <?php echo e(Form::label('local_storage_validation',__('Only Upload Files'),array('class'=>' form-label'))); ?>

                                        <select name="local_storage_validation[]" class="form-control multi-select"  id="local_storage_validation"  multiple>
                                            <?php $__currentLoopData = $file_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php if(in_array($f, $local_storage_validations)): ?> selected <?php endif; ?>><?php echo e($f); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label" for="local_storage_max_upload_size"><?php echo e(__('Max upload size ( In MB)')); ?></label>
                                        <input type="number" name="local_storage_max_upload_size" class="form-control" value="<?php echo e((!isset($settings['local_storage_max_upload_size']) || is_null($settings['local_storage_max_upload_size'])) ? '' : $settings['local_storage_max_upload_size']); ?>" placeholder="<?php echo e(__('Max upload size')); ?>">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="s3-setting row <?php echo e($settings['storage_setting']=='s3'?' ':'d-none'); ?>">
                                
                                <div class=" row ">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="s3_key"><?php echo e(__('S3 Key')); ?></label>
                                            <input type="text" name="s3_key" class="form-control" value="<?php echo e((!isset($settings['s3_key']) || is_null($settings['s3_key'])) ? '' : $settings['s3_key']); ?>" placeholder="<?php echo e(__('S3 Key')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="s3_secret"><?php echo e(__('S3 Secret')); ?></label>
                                            <input type="text" name="s3_secret" class="form-control" value="<?php echo e((!isset($settings['s3_secret']) || is_null($settings['s3_secret'])) ? '' : $settings['s3_secret']); ?>" placeholder="<?php echo e(__('S3 Secret')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="s3_region"><?php echo e(__('S3 Region')); ?></label>
                                            <input type="text" name="s3_region" class="form-control" value="<?php echo e((!isset($settings['s3_region']) || is_null($settings['s3_region'])) ? '' : $settings['s3_region']); ?>" placeholder="<?php echo e(__('S3 Region')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="s3_bucket"><?php echo e(__('S3 Bucket')); ?></label>
                                            <input type="text" name="s3_bucket" class="form-control" value="<?php echo e((!isset($settings['s3_bucket']) || is_null($settings['s3_bucket'])) ? '' : $settings['s3_bucket']); ?>" placeholder="<?php echo e(__('S3 Bucket')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="s3_url"><?php echo e(__('S3 URL')); ?></label>
                                            <input type="text" name="s3_url" class="form-control" value="<?php echo e((!isset($settings['s3_url']) || is_null($settings['s3_url'])) ? '' : $settings['s3_url']); ?>" placeholder="<?php echo e(__('S3 URL')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="s3_endpoint"><?php echo e(__('S3 Endpoint')); ?></label>
                                            <input type="text" name="s3_endpoint" class="form-control" value="<?php echo e((!isset($settings['s3_endpoint']) || is_null($settings['s3_endpoint'])) ? '' : $settings['s3_endpoint']); ?>" placeholder="<?php echo e(__('S3 Bucket')); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group col-8 switch-width">
                                        <?php echo e(Form::label('s3_storage_validation',__('Only Upload Files'),array('class'=>' form-label'))); ?>

                                        
                                            <select name="s3_storage_validation[]" class="form-control multi-select" id="s3_storage_validation" multiple>
                                                <?php $__currentLoopData = $file_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php if(in_array($f, $s3_storage_validations)): ?> selected <?php endif; ?>><?php echo e($f); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="s3_max_upload_size"><?php echo e(__('Max upload size ( In MB)')); ?></label>
                                            <input type="number" name="s3_max_upload_size" class="form-control" value="<?php echo e((!isset($settings['s3_max_upload_size']) || is_null($settings['s3_max_upload_size'])) ? '' : $settings['s3_max_upload_size']); ?>" placeholder="<?php echo e(__('Max upload size')); ?>">
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
    
                            <div class="wasabi-setting row <?php echo e($settings['storage_setting']=='wasabi'?' ':'d-none'); ?>">
                                <div class=" row ">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="s3_key"><?php echo e(__('Wasabi Key')); ?></label>
                                            <input type="text" name="wasabi_key" class="form-control" value="<?php echo e((!isset($settings['wasabi_key']) || is_null($settings['wasabi_key'])) ? '' : $settings['wasabi_key']); ?>" placeholder="<?php echo e(__('Wasabi Key')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="s3_secret"><?php echo e(__('Wasabi Secret')); ?></label>
                                            <input type="text" name="wasabi_secret" class="form-control" value="<?php echo e((!isset($settings['wasabi_secret']) || is_null($settings['wasabi_secret'])) ? '' : $settings['wasabi_secret']); ?>" placeholder="<?php echo e(__('Wasabi Secret')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="s3_region"><?php echo e(__('Wasabi Region')); ?></label>
                                            <input type="text" name="wasabi_region" class="form-control" value="<?php echo e((!isset($settings['wasabi_region']) || is_null($settings['wasabi_region'])) ? '' : $settings['wasabi_region']); ?>" placeholder="<?php echo e(__('Wasabi Region')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="wasabi_bucket"><?php echo e(__('Wasabi Bucket')); ?></label>
                                            <input type="text" name="wasabi_bucket" class="form-control" value="<?php echo e((!isset($settings['wasabi_bucket']) || is_null($settings['wasabi_bucket'])) ? '' : $settings['wasabi_bucket']); ?>" placeholder="<?php echo e(__('Wasabi Bucket')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="wasabi_url"><?php echo e(__('Wasabi URL')); ?></label>
                                            <input type="text" name="wasabi_url" class="form-control" value="<?php echo e((!isset($settings['wasabi_url']) || is_null($settings['wasabi_url'])) ? '' : $settings['wasabi_url']); ?>" placeholder="<?php echo e(__('Wasabi URL')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="wasabi_root"><?php echo e(__('Wasabi Root')); ?></label>
                                            <input type="text" name="wasabi_root" class="form-control" value="<?php echo e((!isset($settings['wasabi_root']) || is_null($settings['wasabi_root'])) ? '' : $settings['wasabi_root']); ?>" placeholder="<?php echo e(__('Wasabi Bucket')); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group col-8 switch-width">
                                        <?php echo e(Form::label('wasabi_storage_validation',__('Only Upload Files'),array('class'=>'form-label'))); ?>

    
                                        <select name="wasabi_storage_validation[]" class="form-control multi-select" id="wasabi_storage_validation" multiple>
                                            <?php $__currentLoopData = $file_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php if(in_array($f, $wasabi_storage_validations)): ?> selected <?php endif; ?>><?php echo e($f); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="wasabi_root"><?php echo e(__('Max upload size ( In MB)')); ?></label>
                                            <input type="number" name="wasabi_max_upload_size" class="form-control" value="<?php echo e((!isset($settings['wasabi_max_upload_size']) || is_null($settings['wasabi_max_upload_size'])) ? '' : $settings['wasabi_max_upload_size']); ?>" placeholder="<?php echo e(__('Max upload size')); ?>">
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                      
                        <div class="col-lg-12  text-end">
                            <input type="submit" value="<?php echo e(__('Save Changes')); ?>" class="btn btn-primary">
                        </div>
                    </div>
                    <?php echo e(Form::close()); ?>

                    </div>

                    


                   

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('pagescript'); ?>

<script>
    var scrollSpy = new bootstrap.ScrollSpy(document.body, {
        target: '#useradd-sidenav',
        offset: 300,
    })
    $(".list-group-item").click(function(){
        $('.list-group-item').filter(function(){
            return this.href == id;
        }).parent().removeClass('text-primary');
    });

    function check_theme(color_val) {
        $('#theme_color').prop('checked', false);
        $('input[value="' + color_val + '"]').prop('checked', true);
    }

    $(document).on('change','[name=storage_setting]',function(){
    if($(this).val() == 's3'){
        $('.s3-setting').removeClass('d-none');
        $('.wasabi-setting').addClass('d-none');
        $('.local-setting').addClass('d-none');
    }else if($(this).val() == 'wasabi'){
        $('.s3-setting').addClass('d-none');
        $('.wasabi-setting').removeClass('d-none');
        $('.local-setting').addClass('d-none');
    }else{
        $('.s3-setting').addClass('d-none');
        $('.wasabi-setting').addClass('d-none');
        $('.local-setting').removeClass('d-none');
    }
});
</script>

    <script>
        $(document).ready(function() {
            $('#gdpr_cookie').trigger('change');

            var type = window.location.hash.substr(1);
            $('.list-group-item').removeClass('active');
            $('.list-group-item').removeClass('text-primary');
            if (type != '') {
                $('a[href="#' + type + '"]').addClass('active').removeClass('text-primary');
            } else {
                $('.list-group-item:eq(0)').addClass('active').removeClass('text-primary');
            }
        });

        $(document).on('click', '.list-group-item', function() {
            setTimeout(() => {
                $('.list-group-item').removeClass('text-primary');
                var scrollSpy = new bootstrap.ScrollSpy(document.body, {
                    target: '#useradd-sidenav',
                    offset: 300,
                });
            }, 100);
        });

        $(document).on('change', '#gdpr_cookie', function() {
            $('.GDPR_Cookie_Text').hide();
            if ($("#gdpr_cookie").prop('checked') == true) {
                $('.GDPR_Cookie_Text').show();
            }
        });

        function check_theme(color_val) {
            $('input[value="' + color_val + '"]').prop('checked', true);
            $('a[data-value]').removeClass('active_color');
            $('a[data-value="' + color_val + '"]').addClass('active_color');
        }
    </script>

    <script>
         $(document).on("click", '.send_email', function(e) {
            
            e.preventDefault();
            var title = $(this).attr('data-title');

            var size = 'md';
            var url = $(this).attr('data-url');
            if (typeof url != 'undefined') {
                $("#commonModal .modal-title").html(title);
                $("#commonModal .modal-dialog").addClass('modal-' + size);
                $("#commonModal").modal('show');

                $.post(url, {
                    mail_driver: $("#mail_driver").val(),
                    mail_host: $("#mail_host").val(),
                    mail_port: $("#mail_port").val(),
                    mail_username: $("#mail_username").val(),
                    mail_password: $("#mail_password").val(),
                    mail_encryption: $("#mail_encryption").val(),
                    mail_from_address: $("#mail_from_address").val(),
                    mail_from_name: $("#mail_from_name").val(),
                }, function(data) {
                    $('#commonModal .modal-body').html(data); 
                });
            }
        });

        
        $(document).on('submit', '#test_email', function(e) {
            e.preventDefault();
            $("#email_sending").show();
            var post = $(this).serialize();
            var url = $(this).attr('action');
            $.ajax({
                type: "post",
                url: url,
                data: post,
                cache: false,
                beforeSend: function() {
                    $('#test_email .btn-create').attr('disabled', 'disabled');
                },
                success: function(data) {
                    if (data.is_success) {
                        show_toastr('Success', data.message, 'success');
                    } else {
                        show_toastr('Error', data.message, 'error');
                    }
                    $("#email_sending").hide();
                    $('#commonModal').modal('hide');
                },
                complete: function() {
                    $('#test_email .btn-create').removeAttr('disabled');
                },
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/1a/7/74fc9abc3b/public_html/resources/views/employeesetting/superadminsetting.blade.php ENDPATH**/ ?>