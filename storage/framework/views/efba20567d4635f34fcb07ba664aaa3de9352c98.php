<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Availability_ADD')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('availabilitylink'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('custom/libs/jquery-schedule-master/dist/jquery.schedule.css')); ?>">
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
                                <h4 class="m-b-10"><?php echo e(__('Availability')); ?></h4>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo e(url('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
                                <li class="breadcrumb-item"><?php echo e(__('Availability')); ?></li>
                            </ul>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end text-right">
                            <div class="btn btn-sm btn-primary btn-icon m-1" style="height: fit-content;">
                                <a href="<?php echo e(route('availability.export')); ?>" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="<?php echo e(__('Export Avalability CSV file')); ?>">
                                    <i class="ti ti-database-export text-white"></i>
                                </a>
                            </div>

                            <div class="btn btn-sm btn-primary btn-icon m-1 " style="height: fit-content;">
                                <a href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="<?php echo e(__('Create New Availability')); ?>"
                                    data-url="<?php echo e(route('availabilities.create')); ?>" data-size="lg" data-ajax-popup="true"
                                    data-title="<?php echo e(__('Add Availability')); ?>">
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
                                            <?php if(Auth::user()->type == 'company'): ?>
                                                <th scope="sort"><?php echo e(__('Name')); ?></th>
                                            <?php endif; ?>
                                            <th scope="sort"><?php echo e(__('Title')); ?></th>
                                            <th scope="sort"><?php echo e(_('Effective Dates')); ?></th>
                                            <th scope="sort" class="text-end"><?php echo e(__('Action')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(!empty($availabilitys) && count($availabilitys) > 0): ?>
                                            <?php $__currentLoopData = $availabilitys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $availability): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr data-id="<?php echo e($availability->user_id); ?>">
                                                    <?php if(Auth::user()->type == 'company'): ?>
                                                        <td> <?php echo e($availability->getUserInfo->first_name); ?>

                                                            <?php echo e($availability->getUserInfo->last_name); ?></td>
                                                    <?php endif; ?>
                                                    <td> <?php echo e($availability->name); ?></td>
                                                    <td> <?php echo e($availability->getAvailabilityDate()); ?> </td>
                                                    <td class="Action text-end">
                                                        <span>
                                                            <button type="button"
                                                                class="btn-white rounded-circle border-0 edit_schedule bg-transparent"
                                                                data-availability-json="<?php echo e($availability->availability_json); ?>">
                                                                <div class="action-btn btn-primary ms-2">
                                                                    <a href="#"
                                                                        data-url="<?php echo e(route('availabilities.edit', $availability->id)); ?>"
                                                                        data-size="lg" data-ajax-popup="true"
                                                                        data-title="<?php echo e(__('Edit Availability')); ?>"
                                                                        class="mx-3 btn btn-sm d-inline-flex align-items-center">
                                                                        <i class="ti ti-pencil text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Edit')); ?>"></i>
                                                                    </a>
                                                                </div>
                                                            </button>

                                                            <div class="action-btn btn-danger ms-2" data-bs-toggle="tooltip"
                                                                data-bs-placement="top" title="<?php echo e(__('Delete')); ?>">
                                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['availabilities.destroy', $availability->id], 'id' => 'delete-form-' . $availability->id]); ?>

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
                                                <?php if(Auth::user()->type == 'company'): ?>
                                                    <td colspan="4">
                                                    <?php else: ?>
                                                    <td colspan="3">
                                                <?php endif; ?>
                                                <div class="text-center">
                                                    <i class="fas fa-file text-primary fs-40"></i>
                                                    <h2><?php echo e(__('Opps...')); ?></h2>
                                                    <h6> <?php echo __('No availability found...!'); ?> </h6>
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

<?php $__env->startSection('availabilityscriptlink'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script id="add_schedule" src="<?php echo e(asset('custom/libs/jquery-schedule-master/dist/jquery.schedule.js')); ?>"
        data-src="<?php echo e(asset('custom/libs/jquery-schedule-master/dist/jquery.schedule.js')); ?>"></script>
    <script id="edit_schedule" src="<?php echo e(asset('custom/libs/jquery-schedule-master/dist/jquery.scheduleedit.js')); ?>"
        data-src="<?php echo e(asset('custom/libs/jquery-schedule-master/dist/jquery.scheduleedit.js')); ?>"></script>
    <script>
        function availabilitytablejs() {
            $('#schedule4').jqs({
                periodColors: [
                    ['rgba(0, 200, 0, 0.5)', '#0f0', '#000'],
                    ['rgba(200, 0, 0, 0.5)', '#f00', '#000'],
                ],
                periodTitle: '',
                periodBackgroundColor: 'rgba(0, 200, 0, 0.5)',
                periodBorderColor: '#000',
                periodTextColor: '#fff',
                periodRemoveButton: 'Remove please !',
                onRemovePeriod: function(period, jqs) {},
                onAddPeriod: function(period, jqs) {},
                onClickPeriod: function(period, jqs) {},
                onDuplicatePeriod: function(event, period, jqs) {},
                onPeriodClicked: function(event, period, jqs) {}
            });
        }

        function editavailabilitytablejs(data = []) {
            $('#schedule5').jqs({
                data: data,
                days: 7,
                periodColors: [
                    ['rgba(0, 200, 0, 0.5)', '#0f0', '#000'],
                    ['rgba(200, 0, 0, 0.5)', '#f00', '#000'],
                ],
                periodTitle: '',
                periodBackgroundColor: 'rgba(0, 200, 0, 0.5)',
                periodBorderColor: '#000',
                periodTextColor: '#fff',
                periodRemoveButton: 'Remove please !',
                onRemovePeriod: function(period, jqs) {},
                onAddPeriod: function(period, jqs) {},
                onClickPeriod: function(period, jqs) {},
                onDuplicatePeriod: function(event, period, jqs) {},
                onPeriodClicked: function(event, period, jqs) {}
            });
        }

    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('pagescript'); ?>
    <script>
        $(document).ready(function() {
            $(document).on('change', '.search-user-ava', function() {
                var value = $(this).val();
                $('.avalabilty_table tbody>tr').hide();
                if (value == 'all0') {
                    $('.avalabilty_table tbody>tr').show();
                } else {
                    $('.avalabilty_table tbody>tr[data-id="' + value + '"]').show();
                }
            });
        });

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/1a/7/74fc9abc3b/public_html/resources/views/availability/index.blade.php ENDPATH**/ ?>