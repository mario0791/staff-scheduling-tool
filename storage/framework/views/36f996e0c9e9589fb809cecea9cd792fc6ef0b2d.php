<?php echo e(Form::model($user, array('route' => array('user.update', $user->id), 'method' => 'PUT'))); ?>

<div class="form-group">
    <?php echo e(Form::label('name',__('Name'), ['class'=>'form-label'] )); ?>

    <?php echo e(Form::text('company_name',null,array('class'=>'form-control','placeholder'=>__('Enter User Name'),'required'=>'required'))); ?>

</div>
<div class="form-group">
    <?php echo e(Form::label('email',__('Email'), ['class'=>'form-label'] )); ?>

    <?php echo e(Form::text('email',null,array('class'=>'form-control','placeholder'=>__('Enter User Email'),'required'=>'required'))); ?>

</div>
<div class="modal-footer border-0 p-0">
    <button type="button" class="btn  btn-light" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
    <button type="submit" class="btn  btn-primary"><?php echo e(__('Upadte')); ?></button>
</div>
<?php echo e(Form::close()); ?>

<?php /**PATH /home/sites/1a/7/74fc9abc3b/public_html/resources/views/user/edit.blade.php ENDPATH**/ ?>