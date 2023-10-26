<?php $__env->startPush('pagescript'); ?>
    <script>
        $(document).on('click', '.code', function() {
            var type = $(this).val();
            if (type == 'manual') {
                $('#manual').removeClass('d-none');
                $('#manual').addClass('d-block');
                $('#auto').removeClass('d-block');
                $('#auto').addClass('d-none');
            } else {
                $('#auto').removeClass('d-none');
                $('#auto').addClass('d-block');
                $('#manual').removeClass('d-block');
                $('#manual').addClass('d-none');
            }
        });

        $(document).on('click', '#code-generate', function() {
            var length = 10;
            var result = '';
            var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            var charactersLength = characters.length;
            for (var i = 0; i < length; i++) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
            }
            $('#auto-code').val(result);
        });
    </script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Coupon')); ?>

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
                                <h4 class="m-b-10"><?php echo e(__('Coupon')); ?></h4>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo e(url('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
                                <li class="breadcrumb-item"><?php echo e(__('Coupon')); ?></li>
                            </ul>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end text-right">
                            <div class="btn btn-sm btn-primary btn-icon m-1">
                                <a href="#" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="<?php echo e(__('Create New Coupon')); ?>" data-url="<?php echo e(route('coupon.create')); ?>"
                                    data-size="md" data-ajax-popup="true" data-title="<?php echo e(__('Create New Coupon')); ?>">
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
                            <div class="table-responsive">
                                <table class="table mb-0 pc-dt-simple">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="sort" data-sort="name"> <?php echo e(__('Name')); ?>

                                            </th>
                                            <th scope="col" class="sort" data-sort="budget"><?php echo e(__('Code')); ?>

                                            </th>
                                            <th scope="col" class="sort" data-sort="status">
                                                <?php echo e(__('Discount (%)')); ?></th>
                                            <th scope="col"><?php echo e(__('Limit')); ?></th>
                                            <th scope="col" class="sort" data-sort="completion">
                                                <?php echo e(__('Used')); ?></th>
                                            <th scope="col" class="action text-end"><?php echo e(__('Action')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>

                                                <td class="budget"><?php echo e($coupon->name); ?> </td>
                                                <td><?php echo e($coupon->code); ?></td>
                                                <td>
                                                    <?php echo e($coupon->discount); ?>

                                                </td>
                                                <td><?php echo e($coupon->limit); ?></td>
                                                <td><?php echo e($coupon->used_coupon()); ?></td>

                                                <td class="Action text-end">
                                                    <span>
                                                        <div class="action-btn btn-warning ms-2">
                                                            <a href="<?php echo e(route('coupon.show', $coupon->id)); ?>"
                                                                data-toggle="tooltip" data-bs-toggle="tooltip"
                                                                data-bs-placement="top" title="<?php echo e(__('View')); ?>"
                                                                class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                                                >
                                                                <i class="ti ti-eye text-white"></i>
                                                            </a>
                                                        </div>

                                                        <div class="action-btn btn-info ms-2">
                                                            <a href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="<?php echo e(__('Edit')); ?>"
                                                                data-url="<?php echo e(route('coupon.edit', $coupon->id)); ?>"
                                                                data-size="lg" data-ajax-popup="true"
                                                                data-title="<?php echo e(__('Edit Coupon')); ?>"
                                                                class="mx-3 btn btn-sm d-inline-flex align-items-center">
                                                                <i class="ti ti-pencil text-white"></i>
                                                            </a>
                                                        </div>

                                                        <div class="action-btn btn-danger ms-2" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="<?php echo e(__('Delete')); ?>">
                                                            <?php echo Form::open(['method' => 'DELETE', 'route' => ['coupon.destroy', $coupon->id]]); ?>

                                                                <a href="#!" class="mx-3 btn btn-sm show_confirm">
                                                                    <i class="ti ti-trash text-white"></i>
                                                                </a>
                                                            <?php echo Form::close(); ?>

                                                        </div>

                                                    </span>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/1a/7/74fc9abc3b/public_html/resources/views/coupon/index.blade.php ENDPATH**/ ?>