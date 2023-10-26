<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Contract Type')); ?>

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
                                <h4 class="m-b-10"><?php echo e(__('Contract Type')); ?></h4>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo e(url('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
                                <li class="breadcrumb-item"><?php echo e(__('Contract Type')); ?></li>
                            </ul>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end text-right">
                            <div class="btn btn-sm btn-primary btn-icon m-1">
                                <a href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="<?php echo e(__('Create')); ?>" data-url="<?php echo e(route('contract_type.create')); ?>"
                                    data-size="md" data-ajax-popup="true" data-title="<?php echo e(__('Create New Contract Type')); ?>">
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
			                                <th scope="col"><?php echo e(__('Name')); ?></th>
			                                <?php if(\Auth::user()->type=='company'): ?>
			                                    <th scope="col" class="text-end"><?php echo e(__('Action')); ?></th>
			                                <?php endif; ?>
			                            </tr>
                                    </thead>
                                    <tbody>
			                            <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			                                <tr class="font-style">
			                                    <td><?php echo e(!empty($type->name)?$type->name:''); ?></td>
			                                    <?php if(\Auth::user()->type=='company'): ?>
			                                        <td class="action text-end">
			                                            <div class="action-btn bg-info ms-2">
			                                            	<a href="#" data-bs-toggle="tooltip" data-bs-placement="top" class="mx-3 btn btn-sm d-inline-flex align-items-center" 
				                                    title="<?php echo e(__('Edit')); ?>" data-url="<?php echo e(route('contract_type.edit',$type->id)); ?>"
				                                    data-size="md" data-ajax-popup="true" data-title="<?php echo e(__('Edit Contract Type')); ?>">
				                                    <i class="ti ti-edit text-white" ></i>
				                                </a>


			                                              <!--   <a href="#" class="mx-3 btn btn-sm d-inline-flex align-items-center"  data-url="<?php echo e(route('contract_type.edit',$type->id)); ?>"
			                                                    data-bs-whatever="<?php echo e(__('Edit Contract Type')); ?>" > <span class="text-white"> <i
			                                                            class="ti ti-edit" ></i></span></a> -->
			                                            </div>
			    
			                                            <div class="action-btn bg-danger ms-2">
			                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['contract_type.destroy', $type->id]]); ?>

			                                                <a href="#!" class="mx-3 btn btn-sm  align-items-center show_confirm ">
			                                                    <i class="ti ti-trash text-white" data-bs-toggle="tooltip" data-bs-original-title="<?php echo e(__('Delete')); ?>"></i>
			                                                </a>
			                                                <?php echo Form::close(); ?>


			                                                
			                                            </div>
			                                        </td>
			                                    <?php endif; ?>
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
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/1a/7/74fc9abc3b/public_html/resources/views/contract_type/index.blade.php ENDPATH**/ ?>