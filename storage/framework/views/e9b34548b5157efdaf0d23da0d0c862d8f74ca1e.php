<?php
$dir = asset(Storage::url('uploads/plan'));
?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Plan')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="dash-container">
        <div class="dash-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="page-header-title">
                                <h4 class="m-b-10"><?php echo e(__('Plan')); ?></h4>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo e(url('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
                                <li class="breadcrumb-item"><?php echo e(__('Plan')); ?></li>
                            </ul>
                        </div>
                        <?php if(Auth::user()->type == 'super admin'): ?>
                            <div class="col-md-6 d-flex justify-content-end text-right">
                                <div class="btn btn-sm btn-primary btn-icon m-1">
                                    <a href="#" data-url="<?php echo e(route('plan.create')); ?>" data-size="lg"
                                        data-ajax-popup="true" data-title="<?php echo e(__('Create New Plan')); ?>"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Create Plan')); ?>">
                                        <i class="ti ti-plus text-white"></i></a>
                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="row">
                <?php if(!empty($plans)): ?>
                    <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6">
                            <div class="card price-card price-1 wow animate__fadeInUp" data-wow-delay="0.2s" style="
                                visibility: visible;
                                animation-delay: 0.2s;
                                animation-name: fadeInUp;
                              ">
                                <div class="card-body">
                                    <span class="price-badge bg-primary"><?php echo e($plan->name); ?></span>

                                    <?php if(\Auth::user()->type == 'company' && \Auth::user()->plan == $plan->id): ?>
                                        <div class="d-flex flex-row-reverse m-0 p-0 ">
                                            <span class="d-flex align-items-center ">
                                                <i class="f-10 lh-1 fas fa-circle text-success"></i>
                                                <span class="ms-2"><?php echo e(__('Active')); ?></span>
                                            </span>
                                        </div>
                                    <?php endif; ?>

                                    <?php if(\Auth::user()->type == 'super admin'): ?>
                                    <div class="d-flex flex-row-reverse m-0 p-0 ">
                                        <div class="action-btn bg-primary ms-2">
                                            <a href="#" class="btn btn-sm"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title=<?php echo e(__("Edit Plan" )); ?>

                                                data-ajax-popup="true" data-size="lg" data-title=<?php echo e(__("Edit Plan" )); ?>

                                                data-url="<?php echo e(route('plan.edit', $plan->id)); ?>" >
                                                <span class="text-white"><i class="ti ti-edit"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                    <?php endif; ?>

                                    <h1 class="mb-4 f-w-600 ">
                                        <?php echo e(env('CURRENCY_SYMBOL') . $plan->price); ?><small class="text-sm">/<?php echo e(__(\App\Models\Plan::$arrDuration[$plan->duration])); ?></small>
                                    </h1>
                                    <p class="mb-0"> <?php echo e(__('Trial')); ?> : 0 <?php echo e(__('Days')); ?> <br>  </p>

                                    <ul class="list-unstyled mt-5">
                                        <li>
                                            <span class="theme-avtar"> <i class="text-primary ti ti-circle-plus"></i> </span>
                                            <?php echo e($plan->max_employee); ?> <?php echo e(__('Max Employee')); ?>

                                        </li>
                                        <li>
                                            <span class="theme-avtar"> <i class="text-primary ti ti-circle-plus"></i> </span>
                                            <?php echo e(__('Unlimited')); ?> <?php echo e(__('Location')); ?>

                                        </li>
                                    </ul>

                                    <h5 class="h6 mt-3"><?php echo e($plan->description); ?></h5>
                                    <?php if(\Auth::user()->type == 'company' && \Auth::user()->plan == $plan->id): ?>
                                        <p class="mb-0 mt-3"> <?php echo e(__('Expired ')); ?> :
                                            <?php echo e(\Auth::user()->plan_expire_date ? \Auth::user()->dateFormat(\Auth::user()->plan_expire_date) : __('Unlimited')); ?> <br>  </p>
                                    <?php endif; ?>

                                    <?php if(\Auth::user()->type == 'company' && \Auth::user()->plan != $plan->id): ?>
                                        <div class="row">
                                            <?php if($plan->price > 0): ?>
                                                <div class="col-8">
                                                    <a href="<?php echo e(route('stripe', \Illuminate\Support\Facades\Crypt::encrypt($plan->id))); ?>"
                                                        class="btn bg-primary d-flex justify-content-center align-items-center text-white border-0"><i class="ti ti-shopping-cart m-1"></i>
                                                        <?php echo e(__('Subscribe ')); ?>

                                                    </a>
                                                </div>
                                            <?php endif; ?>

                                            <?php if($plan->id != 1): ?>
                                                <div class="col-4 mb-2">
                                                    <?php if(\Auth::user()->requested_plan != $plan->id): ?>
                                                        <a href="<?php echo e(route('send.request', [\Illuminate\Support\Facades\Crypt::encrypt($plan->id)])); ?>"
                                                            class="btn  bg-primary d-flex justify-content-center align-items-center border-0">
                                                            <i class="ti ti-arrow-forward-up m-1 text-white"></i>
                                                        </a>
                                                    <?php else: ?>
                                                        <a href="<?php echo e(route('request.cancel', \Auth::user()->id)); ?>"
                                                            class="btn  btn-danger d-flex justify-content-center align-items-center"
                                                            title="<?php echo e(__('Cancle Request')); ?>" data-bs-toggle="tooltip"
                                                            data-bs-placement="top">
                                                            <span class="btn-inner--icon"><i
                                                                    class="fas fa-times m-1"></i></span>
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>                            
                        </div>                       
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <?php if(Auth::user()->type == 'super admin'): ?>
                <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6">
                    <a href="#" class="btn-addnew-project py-5" data-url="<?php echo e(route('plan.create')); ?>" data-size="lg"
                    data-ajax-popup="true" data-title="<?php echo e(__('Create New Plan')); ?>"
                    data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Create Plan')); ?>">
                        <div class="bg-primary proj-add-icon py-2 mt-5">
                            <i class="ti ti-plus"></i>
                        </div>
                        <h6 class="mt-4 mb-2"><?php echo e(__('New Plan')); ?></h6>
                        <p class="text-muted text-center mb-5"><?php echo e(__('Click here to add new plan')); ?></p>
                    </a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/1a/7/74fc9abc3b/public_html/resources/views/plan/index.blade.php ENDPATH**/ ?>