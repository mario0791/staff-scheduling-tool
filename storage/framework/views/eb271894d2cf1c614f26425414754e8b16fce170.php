<?php echo e(Form::model($profile, ['route' => ['profile.update', $profile->id], 'method' => 'PUT', 'class'=>"permission_table_information" ])); ?>

    <?php echo e(Form::hidden('employee_id', $profile->user_id)); ?>

    <?php echo e(Form::hidden('form_type', 'manage_permission')); ?>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <?php echo e(Form::label('', __('Account Type'), ['class' => 'form-label'])); ?>               
                <?php if(Auth::user()->acount_type == 1): ?>
                <?php echo e(Form::select('acount_type', ['3' => 'Employee', '2' => 'Manager', '1' => 'Administrator'],(!empty($userr->acount_type)) ? $userr->acount_type : null, ['class' => 'form-control multi-select manager_manag_emp', 'id'=>'choices-multiple' ,'required'=>true])); ?>                        
                <?php elseif(Auth::user()->acount_type == 2): ?>
                <?php echo e(Form::select('acount_type', ['3' => 'Employee', '2' => 'Manager'],(!empty($userr->acount_type)) ? $userr->acount_type : null, ['class' => 'form-control multi-select manager_manag_emp', 'id'=>'choices-multiple' ,'required'=>true])); ?>                        
                <?php endif; ?>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 manager_permission_data" style="display: none">
            <b><?php echo e(Form::label('', __('Locations Managed'), ['class' => 'form-label text-dark'])); ?> </b>
            <br>
            <?php $__currentLoopData = $location_option1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location_option1_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="custom-control custom-checkbox d-inline-block mx-2">
                <?php echo Form::checkbox('manage_location_id[]', $location_option1_data['id'], (!empty($manage_location_select[$location_option1_data['id']])) ? true : null , ['required' => false, 'class'=> 'form-check-input input-primary', 'id' => 'location_'.$location_option1_data['id']]); ?>

                <?php echo e(Form::label('location_'.$location_option1_data['id'], $location_option1_data['name'], ['class' => 'form-check-label'])); ?>

            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <br><br>
        <div class="col-xs-12 col-sm-12 col-md-12 manager_permission_data mt-3" style="display: none">
            <b><?php echo e(Form::label('', __('Permissions'), ['class' => 'form-label text-dark'])); ?> </b>
            <br>
            <div class="form-check d-inline-block mx-2">
                
                <?php echo Form::checkbox('manager_add_edit_rotas', 1, (!empty($manager_option['manager_add_edit_delete_rotas'])) ? 1 : 0 , ['required' => false, 'class'=> 'form-check-input input-primary','id' => 'manager_add_edit_rotas']); ?>

                <?php echo e(Form::label('manager_add_edit_rotas', __('Create,edit and delete rotas for locations they manage'), ['class' => 'form-check-label'])); ?>

            </div>
            <br>
            <div class="form-check d-inline-block mx-2">
                <?php echo Form::checkbox('manager_manage_leave_and_approve_leave_requests_for_other', 1, (!empty($manager_option['manager_manage_leave_and_approve_leave_requests_for_other'])) ? 1 : 0 , ['required' => false, 'class'=> 'form-check-input input-primary','id' => 'manager_manage_leave_and_approve_leave_requests_for_other']); ?>

                <?php echo e(Form::label('manager_manage_leave_and_approve_leave_requests_for_other', __('Manage leave and approve leave requests for others and approve leave requests for others'), ['class' => 'form-check-label'])); ?>

            </div>
            <br>
            <div class="form-check d-inline-block mx-2">
                <?php echo Form::checkbox('manager_manually_add_leave_to_themselves', 1, (!empty($manager_option['manager_manually_add_leave_to_themselves'])) ? 1 : 0 , ['required' => false, 'class'=> 'form-check-input input-primary','id' => 'manager_manually_add_leave_to_themselves']); ?>

                <?php echo e(Form::label('manager_manually_add_leave_to_themselves', __('Manually add leave to themselves'), ['class' => 'form-check-label'])); ?>

            </div>
            <br>
            <div class="form-check d-inline-block mx-2">
                <?php echo Form::checkbox('manager_manage_leave_embargoes', 1, (!empty($manager_option['manager_manage_leave_embargoes'])) ? 1 : 0 , ['required' => false, 'class'=> 'form-check-input input-primary','id' => 'manager_manage_leave_embargoes']); ?>

                <?php echo e(Form::label('manager_manage_leave_embargoes', __('Manage leave embargoes'), ['class' => 'form-check-label'])); ?>

            </div>
            <br>
            <div class="form-check d-inline-block mx-2">
                <?php echo Form::checkbox('manager_add_employees_and_manage_basic_information', 1, (!empty($manager_option['manager_add_employees_and_manage_basic_information'])) ? 1 : 0 , ['required' => false, 'class'=> 'form-check-input input-primary','id' => 'manager_add_employees_and_manage_basic_information']); ?>

                <?php echo e(Form::label('manager_add_employees_and_manage_basic_information', __('Add employees and manage basic information (email, locations, roles, allowances, etc)'), ['class' => 'form-check-label'])); ?>

            </div>
            <br>
            <div class="form-check d-inline-block mx-2">
                <?php echo Form::checkbox('manager_view_and_edit_employee_salary', 1, (!empty($manager_option['manager_view_and_edit_employee_salary'])) ? 1 : 0 , ['required' => false, 'class'=> 'form-check-input input-primary','id' => 'manager_view_and_edit_employee_salary']); ?>

                <?php echo e(Form::label('manager_view_and_edit_employee_salary', __('View and edit employee salary information'), ['class' => 'form-check-label'])); ?>

            </div>
            <br>
            <div class="form-check d-inline-block mx-2">
                <?php echo Form::checkbox('manager_manage_roles', 1, (!empty($manager_option['manager_manage_roles'])) ? 1 : 0 , ['required' => false, 'class'=> 'form-check-input input-primary','id' => 'manager_manage_roles']); ?>

                <?php echo e(Form::label('manager_manage_roles', __('Manage roles'), ['class' => 'form-check-label'])); ?>

            </div>
            <br>
            <div class="form-check d-inline-block mx-2">
                <?php echo Form::checkbox('manager_view_reports', 1, (!empty($manager_option['manager_view_reports'])) ? 1 : 0 , ['required' => false, 'class'=> 'form-check-input input-primary','id' => 'manager_view_reports']); ?>

                <?php echo e(Form::label('manager_view_reports', __('View reports'), ['class' => 'form-check-label'])); ?>

            </div>
        </div>
    </div>
    <div class="modal-footer border-0 p-0">
        <button type="button" class="btn  btn-light" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>   
        <button type="submit" class="btn  btn-primary"><?php echo e(__('Create')); ?></button>
    </div>
<?php echo e(Form::close()); ?><?php /**PATH /home/sites/1a/7/74fc9abc3b/public_html/resources/views/employee/permission.blade.php ENDPATH**/ ?>