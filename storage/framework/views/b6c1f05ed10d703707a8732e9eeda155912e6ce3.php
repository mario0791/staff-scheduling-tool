<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Order')); ?>

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
                                <h4 class="m-b-10"><?php echo e(__('Order')); ?></h4>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo e(url('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
                                <li class="breadcrumb-item"><?php echo e(__('Order')); ?></li>
                            </ul>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end text-right">
                            
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
                                <table class="table pc-dt-simple">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="sort" data-sort="name"> <?php echo e(__('Order Id')); ?>

                                            </th>
                                            <th scope="col" class="sort" data-sort="budget"><?php echo e(__('Date')); ?>

                                            </th>
                                            <th scope="col" class="sort" data-sort="status"><?php echo e(__('Name')); ?>

                                            </th>
                                            <th scope="col"><?php echo e(__('Plan Name')); ?></th>
                                            <th scope="col" class="sort" data-sort="completion">
                                                <?php echo e(__('Price')); ?></th>
                                            <th scope="col" class="sort" data-sort="completion">
                                                <?php echo e(__('Payment Type')); ?></th>
                                            <th scope="col" class="sort" data-sort="completion">
                                                <?php echo e(__('Status')); ?></th>
                                            <th scope="col" class="sort" data-sort="completion">
                                                <?php echo e(__('Coupon')); ?></th>
                                            <th scope="col" class="sort" data-sort="completion">
                                                <?php echo e(__('Invoice')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($order->order_id); ?></td>
                                                <td><?php echo e($order->created_at->format('d M Y')); ?></td>
                                                <td><?php echo e($order->user_name); ?></td>
                                                <td><?php echo e($order->plan_name); ?></td>
                                                <td><?php echo e(env('CURRENCY_SYMBOL') . $order->price); ?></td>
                                                <td><?php echo e($order->payment_type); ?></td>
                                                <td>
                                                    <?php if($order->payment_status == 'succeeded'): ?>
                                                        <i class="mdi mdi-circle text-success"></i>
                                                        <?php echo e(ucfirst($order->payment_status)); ?>

                                                    <?php else: ?>
                                                        <i class="mdi mdi-circle text-danger"></i>
                                                        <?php echo e(ucfirst($order->payment_status)); ?>

                                                    <?php endif; ?>
                                                </td>

                                                <td><?php echo e(!empty($order->total_coupon_used)? (!empty($order->total_coupon_used->coupon_detail)? $order->total_coupon_used->coupon_detail->code: '-'): '-'); ?>

                                                </td>

                                                <td class="text-center">
                                                    <?php if($order->receipt != 'free coupon' && $order->payment_type == 'STRIPE'): ?>
                                                        <a href="<?php echo e($order->receipt); ?>" class="btn  btn-outline-primary" target="_blank">
                                                            <i class="fas fa-file-invoice"></i> <?php echo e(__('Invoice')); ?>

                                                        </a>
                                                    <?php elseif($order->receipt == 'free coupon'): ?>
                                                        <p><?php echo e(__('Used 100 % discount coupon code.')); ?></p>
                                                    <?php elseif($order->payment_type == 'Manually'): ?>
                                                        <p><?php echo e(__('Manually plan upgraded by super admin')); ?></p>
                                                    <?php else: ?>
                                                        -
                                                    <?php endif; ?>
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

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/1a/7/74fc9abc3b/public_html/resources/views/order/index.blade.php ENDPATH**/ ?>