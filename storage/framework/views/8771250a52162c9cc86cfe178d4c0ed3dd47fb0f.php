<?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="list-group-item">
        <div class="row align-items-center">
            
            <div class="col ml-n2">
                <a href="#!" class="d-block h6 mb-0"><?php echo e($plan->name); ?></a>
                <div>
                    <span class="text-sm"><?php echo e(env('CURRENCY_SYMBOL').$plan->price); ?> <?php echo e(' / '. $plan->duration); ?></span>
                </div>
            </div>
            <div class="col ml-n2">
                <a href="#!" class="d-block h6 mb-0"><?php echo e(__('Employees')); ?></a>
                <div>
                    <span class="text-sm"><?php echo e($plan->max_employee); ?></span>
                </div>
            </div>
            <div class="col-auto">
                <?php if($user->plan==$plan->id): ?>
                    <span class="btn btn-sm btn-primary my-auto"><?php echo e(__('Active')); ?></span>
                <?php else: ?>
                    <a href="<?php echo e(route('plan.active',[$user->id,$plan->id])); ?>" class="btn btn-sm btn-warning btn-icon" data-toggle="tooltip" data-original-title="<?php echo e(__('Click to Upgrade Plan')); ?>">
                        <i class="ti ti-shopping-cart" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Upgrade')); ?>"></i>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home/sites/1a/7/74fc9abc3b/public_html/resources/views/user/plan.blade.php ENDPATH**/ ?>