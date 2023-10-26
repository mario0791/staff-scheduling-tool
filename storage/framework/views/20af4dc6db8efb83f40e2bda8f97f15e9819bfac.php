<?php echo e(Form::model($location, ['route' => ['locations.update', $location->id], 'method' => 'PUT'])); ?>

    <div class="form-group">
        <?php echo e(Form::label('', __('Name'), ['class' => 'form-label'])); ?>

        <?php echo e(Form::text('name', null, ['class' => 'form-control', 'required' => ''])); ?>

    </div>
    <div class="form-group">
        <?php echo e(Form::label('', __('Address'), ['class' => 'form-label'])); ?>

        <?php echo e(Form::textarea('address', null, ['class' => 'form-control autogrow' ,'rows'=>'1' ,'style'=>'resize: none' ,'required' => ''])); ?>

    </div>
    <div class="form-group">
        <?php echo e(Form::label('', __(' Employee'), ['class' => 'form-label'])); ?>

        <?php echo Form::select('employees[]', $employees_select, null, ['required' => false, 'multiple' => 'multiple', 'id'=>'choices-multiple-location_id' ,'class'=> 'form-control multi-select']); ?>

    </div>
    <div class="modal-footer border-0 p-0">
        <button type="button" class="btn  btn-light" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
        <button type="submit" class="btn  btn-primary"><?php echo e(__('Upadte')); ?></button>
    </div>
<?php echo e(Form::close()); ?>

<?php /**PATH /home/sites/1a/7/74fc9abc3b/public_html/resources/views/location/edit.blade.php ENDPATH**/ ?>