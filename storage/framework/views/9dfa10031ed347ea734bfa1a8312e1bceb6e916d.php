<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Zoom Meeting')); ?>

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
                                <h4 class="m-b-10"><?php echo e(__('Zoom Meeting')); ?></h4>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo e(url('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
                                <li class="breadcrumb-item"><?php echo e(__('Zoom Meeting')); ?></li>
                            </ul>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end text-right">
                            <div class="btn btn-sm btn-primary btn-icon m-1">
                                <a href="<?php echo e(route('zoommeeting.calender')); ?>">
                                    <i class="ti ti-calendar-minus text-white" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="<?php echo e(__('Calendar')); ?>"></i>
                                </a>
                            </div>

                            <div class="btn btn-sm btn-primary btn-icon m-1">
                                <a href="#" data-url="<?php echo e(route('zoom-meeting.create')); ?>" data-size="md"
                                    data-ajax-popup="true" data-title="<?php echo e(__('Create Zoom Meeting')); ?>">
                                    <i class="ti ti-plus text-white" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="<?php echo e(__('Create Zoom Meeting')); ?>"></i>
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
                                            <th><?php echo e(__('Title')); ?></th>
                                            <th><?php echo e(__('Meeting Time')); ?></th>
                                            <th><?php echo e(__('Duration')); ?></th>
                                            <th><?php echo e(__('Employees')); ?></th>
                                            <th><?php echo e(__('Join URL')); ?></th>
                                            <th><?php echo e(__('Status')); ?></th>
                                            <th><?php echo e(__('Action')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(!empty($ZoomMeetings) && count($ZoomMeetings) > 0): ?>
                                            <?php $__currentLoopData = $ZoomMeetings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ZoomMeeting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($ZoomMeeting->title); ?></td>
                                                    <td><?php echo e($ZoomMeeting->start_date); ?></td>
                                                    <td><?php echo e($ZoomMeeting->duration); ?> <?php echo e(__(' Minute')); ?></td>
                                                    <td>
                                                        <?php echo e(!empty($ZoomMeeting->getUserInfo) ? $ZoomMeeting->getUserInfo->first_name : ''); ?>

                                                        <?php echo e(!empty($ZoomMeeting->getUserInfo) ? $ZoomMeeting->getUserInfo->last_name : ''); ?>

                                                    </td>
                                                    <td>
                                                        <?php if($ZoomMeeting->created_by == \Auth::user()->id && $ZoomMeeting->checkDateTime()): ?>
                                                            <a href="<?php echo e($ZoomMeeting->start_url); ?>" target="_blank">
                                                                <?php echo e(__('Start meeting')); ?> <i
                                                                    class="fas fa-external-link-square-alt "></i></a>
                                                        <?php elseif($ZoomMeeting->checkDateTime()): ?>
                                                            <a href="<?php echo e($ZoomMeeting->join_url); ?>" target="_blank">
                                                                <?php echo e(__('Join meeting')); ?> <i
                                                                    class="fas fa-external-link-square-alt "></i></a>
                                                        <?php else: ?>
                                                            -
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <?php if($ZoomMeeting->checkDateTime()): ?>
                                                        <?php if($ZoomMeeting->status == 'waiting'): ?>
                                                            <span
                                                                class="badge bg-info p-2 px-3 rounded"><?php echo e(ucfirst($ZoomMeeting->status)); ?></span>
                                                        <?php else: ?>
                                                            <span
                                                                class="badge bg-success p-2 px-3 rounded"><?php echo e(ucfirst($ZoomMeeting->status)); ?></span>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <span class="badge bg-danger p-2 px-3 rounded"><?php echo e(__('End')); ?></span>
                                                    <?php endif; ?>
                                                    </td>
                                                    <td class="Action text-end rtl-actions">
                                                        <span>
                                                            <div class="action-btn btn-danger ms-2" data-bs-toggle="tooltip"
                                                                data-bs-placement="top" title="<?php echo e(__('Delete')); ?>">
                                                                
                                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['zoom-meeting.destroy', $ZoomMeeting->id]]); ?>

                                                                <a href="#!" class="mx-3 btn btn-sm ">
                                                                    <i class="ti ti-trash text-white" data-bs-toggle="tooltip" data-bs-original-title="<?php echo e(__('Delete')); ?>"></i>
                                                                </a>
                                                                <?php echo Form::close(); ?>

                                                            </div>
                                                        </span>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="7">
                                                    <div class="text-center">
                                                        <i class="fas fa-database text-primary fs-40"></i>
                                                        <h2><?php echo e(__('Opps...')); ?></h2>
                                                        <h6> <?php echo __('No Data found...!'); ?> </h6>
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

<?php $__env->startPush('pagescript'); ?>
    <script>
        function ddatetime_range() {
            $('.datetime_class').daterangepicker({
                "singleDatePicker": true,
                "timePicker": true,
                "autoApply": true,
                "locale": {
                    "format": 'YYYY-MM-DD H:mm'
                },
                "timePicker24Hour": true,
            }, function(start, end, label) {
                $('.start_date').val(start.format('YYYY-MM-DD H:mm'));
            });
        }

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/1a/7/74fc9abc3b/public_html/resources/views/zoom/index.blade.php ENDPATH**/ ?>