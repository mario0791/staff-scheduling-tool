<?php echo e(Form::model($employee, ['route' => ['employee.addpassword', $employee->id], 'method' => 'POST'])); ?>

    <?php echo e(Form::hidden('employee_id', $employee->id)); ?>

    <?php echo e(Form::hidden('form_type', 'manage_permission')); ?>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <?php echo e(Form::label('', __('Set Password'), ['class' => 'form-label'])); ?>                               
                <?php echo e(Form::password('password', ['class' => 'form-control', 'required' => ''])); ?>

            </div>
        </div>
    </div>
    <div class="modal-footer border-0 p-0">
        <button type="button" class="btn  btn-light" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>   
        <button type="submit" class="btn  btn-primary"><?php echo e(__('Update')); ?></button>
    </div>
<?php echo e(Form::close()); ?><?php /**PATH /home/sites/1a/7/74fc9abc3b/public_html/resources/views/employee/password.blade.php ENDPATH**/ ?>