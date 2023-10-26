<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Location')); ?>

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
                                <h4 class="m-b-10"><?php echo e(__('Location')); ?></h4>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo e(url('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
                                <li class="breadcrumb-item"><?php echo e(__('Company')); ?></li>
                                <li class="breadcrumb-item"><?php echo e(__('Location')); ?></li>
                            </ul>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end text-right">
                            <div class="btn btn-sm btn-primary btn-icon m-1">
                                <a href="<?php echo e(route('location.export')); ?>" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="<?php echo e(__('Export Employee CSV file')); ?>">
                                    <i class="ti ti-database-export text-white"></i>
                                </a>
                            </div>

                            <div class="btn btn-sm btn-primary btn-icon m-1">
                                <a href="#"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Create New Location')); ?>"
                                    data-url="<?php echo e(route('locations.create')); ?>"
                                    data-size="md" data-ajax-popup="true" data-title="<?php echo e(__('Create New Location')); ?>">
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
                                            <th scope="sort"><?php echo e(__('Name')); ?></th>
                                            <th scope="sort"><?php echo e(__('Address')); ?></th>
                                            <th scope="sort"><?php echo e(__('Managers')); ?></th>
                                            <th class="text-center sort"><?php echo e(__('Employees')); ?></th>
                                            <th scope="text-end"><?php echo e(__('Action')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(!empty($locations) && count($locations) > 0): ?>
                                            <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td> <?php echo e($location->name); ?> </td>
                                                    <td> <?php echo e($location->address); ?> </td>
                                                    <td> <?php echo e($location->countmanager($location->id)); ?> </td>
                                                    <td class="text-center"> <?php echo e($location->getCountEmployees()); ?> </td>
                                                    <td class="Action text-end">
                                                        <span>
                                                            <div class="action-btn btn-info ms-2">
                                                                <a href="#"
                                                                    data-url="<?php echo e(route('locations.edit', $location->id)); ?>"
                                                                    data-size="lg" data-ajax-popup="true"
                                                                    data-title="<?php echo e(__('Edit Location')); ?>"
                                                                    class="mx-3 btn btn-sm d-inline-flex align-items-center">
                                                                    <i class="ti ti-pencil text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Edit')); ?>"></i>
                                                                </a>
                                                            </div>

                                                            <div class="action-btn btn-danger ms-2" data-bs-toggle="tooltip"
                                                                data-bs-placement="top" title="<?php echo e(__('Delete')); ?>">
                                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['locations.destroy', $location->id]]); ?>

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
                                                <td colspan="5">
                                                    <div class="text-center">
                                                        <i class="fas fa-map-marker-alt text-primary fs-40"></i>
                                                        <h2><?php echo e(__('Opps...')); ?></h2>
                                                        <h6> <?php echo __('No loaction found...!'); ?> </h6>
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

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/1a/7/74fc9abc3b/public_html/resources/views/location/index.blade.php ENDPATH**/ ?>