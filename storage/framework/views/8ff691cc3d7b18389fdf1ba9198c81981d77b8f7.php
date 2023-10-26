<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Profile')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="dash-container">
        <div class="dash-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h4 class="m-b-10"><?php echo e(__('Profile')); ?></h4>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo e(url('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
                                <li class="breadcrumb-item"><?php echo e(__('Profile')); ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="row justify-content-center">
                <!-- [ sample-page ] start -->
                <div class="col-xl-3">
                    <div class="card sticky-top" style="top:30px">
                        <div class="list-group list-group-flush" id="useradd-sidenav">
                            <a href="#useradd-1"
                                class="list-group-item list-group-item-action"><?php echo e(__('Personal Information')); ?> <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                            <a href="#useradd-2" class="list-group-item list-group-item-action"><?php echo e(__('Change Password
                                ')); ?> <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9">
                    <div id="useradd-1" class="card">
                        <div class="card-header">
                            <h5 class="mb-0"><?php echo e(__('Personal Information')); ?></h5>
                        </div>
                        <div class="card-body">
                            
                            <?php echo e(Form::model($profile, ['route' => ['profile.update', $profile->id], 'method' => 'PUT', 'class' => 'personal_information', 'enctype' => 'multipart/form-data'])); ?>

                            <div class="row mt-3">
                                <?php echo e(Form::hidden('employee_id', $profile->user_id)); ?>

                                <?php echo e(Form::hidden('form_type', 'superadmininfo')); ?>

                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <?php echo e(Form::label('', __('Name'), ['class' => 'form-label'])); ?>

                                        <?php echo e(Form::text('company_name', $profile->getUserName->company_name, ['class' => 'form-control'])); ?>

                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <?php echo e(Form::label('', __('Email'), ['class' => 'form-label'])); ?>

                                        <?php echo e(Form::text('email', $profile->getUserName->email, ['class' => 'form-control'])); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end py-0 pe-2 border-0">
                                <input name="from" type="hidden" value="password">
                                <button type="submit"
                                    class="btn btn-primary"><?php echo e(__('Save')); ?></button>
                            </div>
                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>
                    <div id="useradd-2" class="card">
                        <div class="card-header">
                            <h5 class="mb-0"><?php echo e(__('Change Password
                                ')); ?></h5>
                        </div>
                        <div class="card-body">                            
                            <?php if(session('status')): ?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo e(session('status')); ?>

                                </div>
                            <?php endif; ?>
                            <form method="POST" action="<?php echo e(route('update.password')); ?>" role="form">
                                <?php echo csrf_field(); ?>
                                <?php if(Auth::user()->id == $id): ?>
                                    <input type="hidden" name="form_type" value="set_own_password">
                                <?php else: ?>
                                    <input type="hidden" name="form_type" value="set_other_password">
                                <?php endif; ?>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <?php echo e(Form::label('', __('Current Password'), ['class' => 'form-label'])); ?>

                                            <?php echo e(Form::password('current_password', ['class' => 'form-control', 'placeholder' => 'Enter Current Password', 'id' => 'current_password'])); ?>

                                        </div>
                                        <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-current_password" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <?php echo e(Form::label('', __('New Password'), ['class' => 'form-label'])); ?>

                                            <?php echo e(Form::password('new_password', ['class' => 'form-control', 'placeholder' => 'Enter New Password', 'id' => 'new_password'])); ?>

                                        </div>
                                        <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-new_password" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <?php echo e(Form::label('', __('Re-type New Password'), ['class' => 'form-label'])); ?>

                                            <?php echo e(Form::password('confirm_password', ['class' => 'form-control', 'placeholder' => 'Enter Re-type New Password', 'id' => 'confirm_password'])); ?>

                                        </div>
                                        <?php $__errorArgs = ['confirm_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-confirm_password" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>

                                <div class="card-footer text-end py-0 pe-2 border-0">                                       
                                    <button type="submit"
                                        class="btn btn-primary"><?php echo e(__('Save')); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                
                <!-- [ Main Content ] end -->
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/1a/7/74fc9abc3b/public_html/resources/views/profile/superadminprofile.blade.php ENDPATH**/ ?>