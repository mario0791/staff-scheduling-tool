<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Role')); ?>

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
                                <h4 class="m-b-10"><?php echo e(__('Role')); ?></h4>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo e(url('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
                                <li class="breadcrumb-item"><?php echo e(__('Company')); ?></li>
                                <li class="breadcrumb-item"><?php echo e(__('Role')); ?></li>
                            </ul>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end text-right">
                            <div class="btn btn-sm btn-primary btn-icon m-1">
                                <a href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="<?php echo e(__('Create New Role')); ?>" data-url="<?php echo e(route('roles.create')); ?>"
                                    data-size="md" data-ajax-popup="true" data-title="<?php echo e(__('Create New Role')); ?>">
                                    <i class="ti ti-plus text-white"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header card-body table-border-style">
                            <h5></h5>
                            <div class="table-responsive">
                                <table class="table mb-0 pc-dt-simple">
                                    <thead>
                                        <tr>
                                            <th class="sort"> <?php echo e(__('Name')); ?>

                                            </th>
                                            <th class="sort"><?php echo e(__('Default Break')); ?>

                                            </th>
                                            <th class="sort text-center"><?php echo e(__('Employees')); ?></th>
                                            <th class="action text-end"><?php echo e(__('Action')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(!empty($roles)  && count($roles) > 0): ?>
                                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td> <i class="ti ti-circle" style="color: <?php echo e($role->color); ?>"></i> <?php echo e($role->name); ?> </td>
                                                <td> <?php echo e(!empty($role->getDefaultBreack())?$role->getDefaultBreack():''); ?> <?php echo e(__('Minutes')); ?> </td>
                                                <td class="text-center"> <?php echo e($role->getCountEmployees()); ?> </td>
                                                <td class="Action text-end">
                                                    <span>
                                                        <div class="action-btn btn-info ms-2">
                                                            <a href="#"
                                                                data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Edit')); ?>"
                                                                data-url="<?php echo e(route('roles.edit', $role->id)); ?>"
                                                                data-size="lg" data-ajax-popup="true"
                                                                data-title="<?php echo e(__('Edit roles')); ?>"
                                                                class="mx-3 btn btn-sm d-inline-flex align-items-center">
                                                                <i class="ti ti-pencil text-white"></i>
                                                            </a>
                                                        </div>

                                                        <div class="action-btn btn-danger ms-2" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="<?php echo e(__('Delete')); ?>">
                                                            <?php echo Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id]]); ?>

                                                                <a href="#!" class="mx-3 btn btn-sm show_confirm">
                                                                    <i class="ti ti-trash text-white"></i>
                                                                </a>
                                                            <?php echo Form::close(); ?>

                                                        </div>

                                                    </span>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="4">
                                                    <div class="text-center">
                                                        <i class="fas fa-user-tag text-primary fs-40"></i>
                                                        <h2><?php echo e(__('Opps...')); ?></h2>
                                                        <h6> <?php echo __('No Role found...!'); ?> </h6>
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

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/1a/7/74fc9abc3b/public_html/resources/views/role/index.blade.php ENDPATH**/ ?>