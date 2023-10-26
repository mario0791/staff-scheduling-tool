
<form method="POST" action="<?php echo e(route('rotas.print')); ?>">
    <?php echo csrf_field(); ?>
     <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12">
             <?php echo e(Form::hidden('week', $week)); ?>

             <?php echo e(Form::hidden('role_id', $role_id)); ?>

             <?php echo e(Form::hidden('create_by', $create_by)); ?>

             <?php echo e(Form::hidden('location_id', $location_id)); ?>

             <?php echo e(Form::label('', __('Select User'), ['class' => 'form-control-label mb-4 h6 d-block'])); ?>

             
             <?php if(!empty($user_array) && count($user_array) > 0): ?>
                <?php $__currentLoopData = $user_array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
                    <div class="form-check form-check-inline">
                        <input class="form-check-input user_checkbox" id="<?php echo e('emp_'.$val['id']); ?>" name="user[<?php echo e($key); ?>]" type="checkbox" value="<?php echo e($val['id']); ?>" checked>
                        <label class="form-check-label" for="<?php echo e('emp_'.$val['id']); ?>"> <?php echo e($val['name']); ?> </label>
                    </div>
                  
                    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <p><?php echo e(__('No user found.')); ?></p>                 
            <?php endif; ?>
         </div>
         <div class="modal-footer border-0 p-0 mt-3">
            <button type="button" class="btn  btn-light" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
            <button type="submit" class="btn  btn-primary"><?php echo e(__('Create')); ?></button>
        </div>
     </div>
</form>
 <?php /**PATH /home/sites/1a/7/74fc9abc3b/public_html/resources/views/rotas/printrotas.blade.php ENDPATH**/ ?>