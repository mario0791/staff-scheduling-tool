<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Deleted Employees')); ?>

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
                            <h4 class="m-b-10"><?php echo e(__('Employee')); ?></h4>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
                            <li class="breadcrumb-item"><?php echo e(__('Employee')); ?></li>
                        </ul>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end text-right">

                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <?php if(Auth::user()->type == 'company'): ?>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-auto mb-3 mb-sm-0">
                                <div class="d-flex align-items-center">
                                    <div class="theme-avtar bg-success">
                                        <i class="ti ti-users"></i>
                                    </div>
                                    <div class="ms-3">
                                        <small class="text-muted"> <?php echo e($box['total_employee']); ?></small>
                                        <h6 class="m-0"><?php echo e(__('Total Employee  ')); ?></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto text-end">
                                <h4 class="m-0"><?php echo e($box['month_employee']); ?></h4>
                                <small class="text-muted"><?php echo e(__('Current month new employee')); ?></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-auto mb-3 mb-sm-0">
                                <div class="d-flex align-items-center">
                                    <div class="theme-avtar bg-warning">
                                        <i class="ti ti-calendar-time"></i>
                                    </div>
                                    <div class="ms-3">
                                        <small class="text-muted"><?php echo e($box['month_rotas']); ?></small>
                                        <h6 class="m-0"><?php echo e(__('Current Month Rotas')); ?></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto text-end">

                                <h4 class="m-0"> <?php echo e(\App\Models\User::CompanycurrencySymbol()); ?>

                                    <?php echo e($box['month_rotas_cost']); ?></h4>
                                <small class="text-muted"><?php echo e(__('Total cost : ')); ?></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-auto mb-3 mb-sm-0">
                                <div class="d-flex align-items-center">
                                    <div class="theme-avtar bg-danger">
                                        <i class="ti ti-user-off"></i>
                                    </div>
                                    <div class="ms-3">
                                        <small class="text-muted"><?php echo e($box['month_leave']); ?></small>
                                        <h6 class="m-0"><?php echo e(__('Current Month Leave')); ?></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto text-end">
                                <h4 class="m-0"><?php echo e($box['month_comapany_leave_use']); ?></h4>
                                <small class="text-muted"><?php echo e(__('Company Leave ')); ?> </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header card-body table-border-style">
                        <h5></h5>
                        <div class="table-responsive">
                            <table class="table mb-0 pc-dt-simple">
                                <thead>
                                    <tr>
                                        <th scope="sort"><?php echo e(__('Name')); ?></th>
                                        <th scope="sort"><?php echo e(__('Email')); ?></th>
                                        <th scope="sort"><?php echo e(__('Added')); ?></th>
                                        <th scope="sort"><?php echo e(__('Deleted')); ?></th>
                                        <th scope="sort" class="text-end"> <?php echo e(__('Action')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($past_employees)): ?>
                                        <?php $__currentLoopData = $past_employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $past_employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <th scope="row">
                                                    <div class="media align-items-center">
                                                        <div class="media-body ml-4">
                                                            <a href="#" class="name h6 mb-0 text-sm"><?php echo e($past_employee->first_name); ?> <?php echo e($past_employee->last_name); ?></a> <br>
                                                        </div>
                                                    </div>
                                                </th>
                                                <td> <?php echo e($past_employee->email); ?> </td>
                                                <td> <?php echo e($past_employee->created_at); ?> </td>
                                                <td> <?php echo e($past_employee->deleted_at); ?> </td>
                                                <td class="Action text-end rtl-actions">
                                                    <span>
                                                        <div class="action-btn btn-danger ms-2"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="<?php echo e(__('Delete')); ?>">
                                                            <?php echo Form::open(['method' => 'DELETE', 'route' => ['employee.restore', $past_employee->id]]); ?>

                                                            <a href="#!"
                                                                class="mx-3 btn btn-sm show_confirm">
                                                                <i class="ti ti-trash text-white"></i>
                                                            </a>
                                                            <?php echo Form::close(); ?>

                                                        </div>
                                                    </span>

                                                    <!-- Actions -->
                                                    
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="5" class="text-center">
                                                    <div class="text-center">
                                                        <i class="fas fa-user text-primary fs-40"></i>
                                                        <h2><?php echo e(__('Opps...')); ?></h2>
                                                        <h6> <?php echo __('No data found.'); ?> </h6>
                                                    </div>
                                                </td>
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


<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/1a/7/74fc9abc3b/public_html/resources/views/pastemployees/index.blade.php ENDPATH**/ ?>