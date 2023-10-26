<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Login')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('custom-scripts'); ?>
<?php if(env('RECAPTCHA_MODULE') == 'yes'): ?>
        <?php echo NoCaptcha::renderJs(); ?>

<?php endif; ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('lang-selectbox'); ?>
<select class="btn  btn-primary ms-2 me-2 language_option_bg" name="language" id="language"
    onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
    <?php $__currentLoopData = \App\Models\Utility::languages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option <?php if($lang == $language): ?> selected <?php endif; ?> value="<?php echo e(route('login', $language)); ?>"><?php echo e(Str::upper($language)); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

			
			<style>
    body.theme-3 .bg-primary {
    background: url(https://www.cavernclub.com/wp-content/uploads/2021/03/Cavern-Stage-Wall-Paul-Jones-1536x1024.jpg)!important;
    background-size: cover!important;
}
</style>
    <div class="card">
        <div class="row align-items-center text-start">
            <div class="col-xl-6">
                <div class="card-body">
                    <div class="">
                        <h2 class="mb-3 f-w-600"><?php echo e(__('Login')); ?></h2>
                    </div>
                    <form method="POST" id="form_data" action="<?php echo e(route('login')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="">
                            <div class="form-group mb-3">
                                <label class="form-label"><?php echo e(__('Email')); ?></label>
                                <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus  placeholder="<?php echo e(__('Email address')); ?>">
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
                            <div class="form-group mb-3">
                                <label class="form-label"><?php echo e(__('Password')); ?></label>
                                <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password" placeholder="<?php echo e(__('Password')); ?>">
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

                                <?php if(Route::has('password.request')): ?>
                                <div class="my-2">
									<a href="<?php echo e(route('password.request',$lang)); ?>" class="small text-muted  border-primary">
										<?php echo e(__('Forgot Your Password?')); ?>

                                    </a>
								</div>
                                <?php endif; ?>

                            </div>

                            <?php if(env('RECAPTCHA_MODULE') == 'yes'): ?>
                                <div class="form-group mt-3">
                                    <?php echo NoCaptcha::display(); ?>

                                    <?php $__errorArgs = ['g-recaptcha-response'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="small text-danger" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            <?php endif; ?>
                            <div class="d-grid">
                                <button class="btn btn-primary btn-block mt-2"><?php echo e(__('Login')); ?></button>
                            </div>
                            <?php if(Utility::getValByName('SIGNUP') == 'on'): ?>
                            <p class="my-4 text-center"><?php echo e(__("Don't have an account?")); ?>

                                <a href="<?php echo e(route('register',$lang)); ?>" class="my-4 text-primary"><?php echo e(__('Register')); ?></a>
                            </p>
                            <?php endif; ?>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-xl-6 img-card-side">
                <div class="auth-img-content" >
                    
                      </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('pagescript'); ?>
<script>
    $(document).ready(function () {
    $("#form_data").submit(function (e) {
        $("#login_button").attr("disabled", true);
        return true;
         });
    });
</script>    
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/1a/7/74fc9abc3b/public_html/resources/views/auth/login.blade.php ENDPATH**/ ?>