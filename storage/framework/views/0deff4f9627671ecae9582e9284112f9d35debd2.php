<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Plan-Request')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="titleIn h4 d-inline-block font-weight-400 mb-0"><?php echo e(__('Plan Request')); ?></h5>
    </div>
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
                                <h4 class="m-b-10"><?php echo e(__('Plan Request')); ?></h4>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo e(url('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
                                <li class="breadcrumb-item"><?php echo e(__('Plan Request')); ?></li>
                            </ul>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end text-right"> </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header card-body table-border-style">
                            <div class="table-responsive">
                                <table class="table pc-dt-simple">
                                    <thead>
                                        <tr>
                                            <th><?php echo e(__('Name')); ?></th>
                                            <th><?php echo e(__('Plan Name')); ?></th>
                                            <th><?php echo e(__('Max Employee')); ?></th>
                                            <th><?php echo e(__('Max Client')); ?></th>
                                            <th><?php echo e(__('Duration')); ?></th>
                                            <th><?php echo e(__('Start Date')); ?></th>
                                            <th><?php echo e(__('Action')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($plan_requests->count() > 0): ?>
                                            <?php $__currentLoopData = $plan_requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prequest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td>
                                                        <div class="font-style font-weight-bold">
                                                            <?php echo e($prequest->user->name); ?></div>
                                                    </td>
                                                    <td>
                                                        <div class="font-style font-weight-bold">
                                                            <?php echo e($prequest->plan->name); ?></div>
                                                    </td>
                                                    <td>
                                                        <div class="font-weight-bold"><?php echo e($prequest->plan->max_employee); ?>

                                                        </div>
                                                        <div><?php echo e(__('Employee')); ?></div>
                                                    </td>
                                                    <td>
                                                        <div class="font-weight-bold"><?php echo e($prequest->plan->max_client); ?>

                                                        </div>
                                                        <div><?php echo e(__('Client')); ?></div>
                                                    </td>
                                                    <td>
                                                        <div class="font-style font-weight-bold">
                                                            <?php echo e($prequest->duration == 'monthly' ? __('One Month') : __('One Year')); ?>

                                                        </div>
                                                    </td>
                                                    <td> <?php echo e(\App\Models\Utility::getDateFormated($prequest->created_at, true)); ?>

                                                    </td>
                                                    <td class="Action text-end">
                                                        <span>
                                                            <div class="action-btn btn-success ms-2">
                                                                <a href="<?php echo e(route('response.request', [$prequest->id, 1])); ?>"
                                                                    data-toggle="tooltip" data-bs-toggle="tooltip"
                                                                    data-bs-placement="top" title="<?php echo e(__('Approve')); ?>"
                                                                    class="mx-3 btn btn-sm d-inline-flex align-items-center">
                                                                    <i class="ti ti-check text-white"></i>
                                                                </a>
                                                            </div>
                                                            <div class="action-btn btn-warning ms-2">
                                                                <a href="<?php echo e(route('response.request', [$prequest->id, 0])); ?>"
                                                                    data-toggle="tooltip" data-bs-toggle="tooltip"
                                                                    data-bs-placement="top"
                                                                    title="<?php echo e(__('Disapprove')); ?>"
                                                                    class="mx-3 btn btn-sm d-inline-flex align-items-center">
                                                                    <i class="ti ti-x text-white"></i>
                                                                </a>
                                                            </div>

                                                        </span>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <tr>
                                                <th scope="col" colspan="7">
                                                    <h6 class="text-center">
                                                        <?php echo e(__('No Manually Plan Request Found.')); ?>

                                                    </h6>
                                                </th>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/1a/7/74fc9abc3b/public_html/resources/views/plan_request/index.blade.php ENDPATH**/ ?>