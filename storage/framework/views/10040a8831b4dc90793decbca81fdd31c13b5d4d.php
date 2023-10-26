<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Contract')); ?>

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
                                <h4 class="m-b-10"><?php echo e(__('Contract')); ?></h4>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo e(url('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
                                <li class="breadcrumb-item"><?php echo e(__('Contract')); ?></li>
                            </ul>
                        </div>
                        <?php if(\Auth::user()->type == 'company'): ?>
                        <div class="col-md-6 d-flex justify-content-end text-right">
                            <div class="btn btn-sm btn-primary btn-icon m-1">
                                <a href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="<?php echo e(__('Create')); ?>" data-url="<?php echo e(route('contract.create')); ?>"
                                    data-size="lg" data-ajax-popup="true" data-title="<?php echo e(__('Create New Contract')); ?>">
                                    <i class="ti ti-plus text-white"></i>
                                </a>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <div class="row">
            <div class="col-xl-3 col-6">
            <div class="card con-card comp-card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="m-b-20"><?php echo e(__('Total Contracts')); ?></h6>
                            <h3 class="text-primary"><?php echo e($cnt_contract['total']); ?></h3>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-handshake bg-success text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-6">
            <div class="card con-card comp-card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="m-b-20"><?php echo e(__('This Month Total Contracts')); ?></h6>
                            <h3 class="text-info"><?php echo e($cnt_contract['this_month']); ?></h3>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-handshake bg-info text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-6">
            <div class="card con-card comp-card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="m-b-20"><?php echo e(__('This Week Total Contracts')); ?></h6>
                            <h3 class="text-warning"><?php echo e($cnt_contract['this_week']); ?></h3>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-handshake bg-warning text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-6">
            <div class="card con-card comp-card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="m-b-20"><?php echo e(__('Last 30 Days Total Contracts')); ?></h6>
                            <h3 class="text-danger"><?php echo e($cnt_contract['last_30days']); ?></h3>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-handshake bg-danger text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header card-body table-border-style">
                            <h5></h5>
                            <div class="table-responsive">
                                <table class="table mb-0 pc-dt-simple">
                                    <thead>
                                        <tr>
                                        	<th scope="col"> <?php echo e(__('ID')); ?> </th>
			                                <th scope="col"><?php echo e(__('Name')); ?></th>
			                                <?php if(\Auth::user()->type !='employee' ): ?>
			                                    <th scope="col"><?php echo e(__('Employee')); ?></th>
			                                <?php endif; ?>
			                                <th scope="col"><?php echo e(__('Contract Type')); ?></th>
			                                <th scope="col"><?php echo e(__('Contract Value')); ?></th>
			                                <th scope="col"><?php echo e(__('Start Date')); ?></th>
			                                <th scope="col"><?php echo e(__('End Date')); ?></th>

			                                <th scope="col"><?php echo e(__('Status')); ?></th>

			                                 <th scope="col" class="text-right"><?php echo e(__('Action')); ?></th>

                            			</tr>
                                    </thead>
                                   <tbody>
                            <?php $__currentLoopData = $contracts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contract): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="font-style">
                                <td> <a href="<?php echo e(route('contract.show',$contract->id)); ?>"class="btn btn-outline-primary"> <?php echo e(\Auth::user()->ContractNumberFormat($contract->id)); ?></a></td>
                                <td><?php echo e(!empty($contract->contract_name)?$contract->contract_name:''); ?></td>
                                 <?php if(\Auth::user()->type !='employee' ): ?>
                                    <td><?php echo e(!empty($contract->employees)?$contract->employees->first_name:''); ?></td>
                                <?php endif; ?>
                                <td><?php echo e(!empty($contract->types)?$contract->types->name:''); ?></td>
                                <td><?php echo e(\Auth::user()->priceFormat($contract->value)); ?></td>
                                <td><?php echo e(\Auth::user()->dateFormat($contract->start_date )); ?></td>
                                <td><?php echo e(\Auth::user()->dateFormat($contract->end_date )); ?></td>
                                
                                <td>
                                    
                                <?php if($contract->edit_status == 'accept'): ?>
                                    <span class="status_badge badge bg-primary  p-2 px-3 rounded"><?php echo e(__('Accept')); ?></span>
                                <?php elseif($contract->edit_status == 'decline'): ?>
                                    <span class="status_badge badge bg-danger p-2 px-3 rounded"><?php echo e(__('Decline')); ?></span>
                                <?php elseif($contract->edit_status == 'pending'): ?>  
                                     <span class="status_badge badge bg-warning p-2 px-3 rounded"><?php echo e(__('Pending')); ?></span>
                                <?php endif; ?>
                                </td>
                               
                                <!-- <td><?php echo e(!empty(ucfirst($contract->status)) ? ucfirst($contract->status) : 'Close'); ?></td> -->


                                    <td class="action text-right">
                                        <?php if(\Auth::user()->type=='company' && $contract->edit_status == 'accept'): ?>
                                        <div class="action-btn btn-primary btn-icon ms-2">
                                            <a href="#" data-url="<?php echo e(route('contract.copy',$contract->id)); ?>" class="mx-3 btn btn-sm d-inline-flex align-items-center" data-ajax-popup="true"
                                                data-title="<?php echo e(__('Copy Contract')); ?>" data-size="lg">
                                                <i class="feather icon-copy text-white" data-bs-toggle="tooltip"
                                                     title="<?php echo e(__('Copy')); ?>"></i>
                                            </a>
                                        </div>
                                        <?php endif; ?>
                                        <div class="action-btn bg-warning ms-2">
                                            <a href="<?php echo e(route('contract.show',$contract->id)); ?>" class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                            data-bs-whatever="<?php echo e(__('View')); ?>"> <span class="text-white"> <i
                                                    class="ti ti-eye"  data-bs-toggle="tooltip" data-bs-original-title="<?php echo e(__('View')); ?>"></i></span></a>
                                        </div>
                                        <?php if(\Auth::user()->type=='company' || \Auth::user()->type == 'employee' && $contract->edit_status == 'accept'): ?>
                                            <div class="action-btn bg-info ms-2">
                                                <a href="#" class="mx-3 btn btn-sm d-inline-flex align-items-center" data-ajax-popup="true" data-size="lg" data-url="<?php echo e(route('contract.edit',$contract->id)); ?>" data-title="<?php echo e(__('Edit Contract')); ?>"
                                                title="<?php echo e(__('Edit Contract')); ?>" > <span class="text-white"> <i
                                                        class="ti ti-edit" data-bs-toggle="tooltip" data-bs-original-title="<?php echo e(__('Edit')); ?>"></i></span></a>
                                            </div>
                                        <?php endif; ?>
                                        <?php if(\Auth::user()->type=='company' || \Auth::user()->type == 'employee' && $contract->edit_status == 'accept'): ?>
                                            <div class="action-btn bg-danger ms-2">

                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['contract.destroy', $contract->id]]); ?>

                                                <a href="#!" class="mx-3 btn btn-sm align-items-center show_confirm">
                                                    <i class="ti ti-trash text-white" data-bs-toggle="tooltip" data-bs-original-title="<?php echo e(__('Delete')); ?>"></i>
                                                </a>
                                                <?php echo Form::close(); ?>



                                            </div>
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

<?php $__env->startPush('availabilityscriptlink'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/1a/7/74fc9abc3b/public_html/resources/views/contract/index.blade.php ENDPATH**/ ?>