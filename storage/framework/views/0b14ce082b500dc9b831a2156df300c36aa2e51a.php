<?php echo e(Form::open(array('url' => 'plan', 'enctype' => "multipart/form-data"))); ?>

<div class="row">
    <div class="form-group col-md-6">
        <?php echo e(Form::label('name',__('Name'), ['class' => 'form-label'])); ?>

        <?php echo e(Form::text('name',null,array('class'=>'form-control font-style','placeholder'=>__('Enter Plan Name'),'required'=>'required'))); ?>

    </div>
    <div class="form-group col-md-6">
        <?php echo e(Form::label('price',__('Price'), ['class' => 'form-label'])); ?>

        <?php echo e(Form::number('price',null,array('class'=>'form-control','placeholder'=>__('Enter Plan Price'),'step'=>'0.01'))); ?>

    </div>

    <div class="form-group col-md-6">
        <?php echo e(Form::label('max_employee',__('Maximum Employee'), ['class' => 'form-label'])); ?>

        <?php echo e(Form::number('max_employee',null,array('class'=>'form-control','required'=>'required'))); ?>

        <span class="small"><?php echo e(__('Note: "-1" for Unlimited')); ?></span>
    </div>    
    <div class="form-group col-md-6">
        <?php echo e(Form::label('duration', __('Duration'), ['class' => 'form-label'])); ?>

        <?php echo Form::select('duration', $arrDuration, null,array('class' => 'form-control','data-toggle'=>'select','required'=>'required')); ?>

    </div>
    
    <div class="form-group col-md-12">
        <?php echo e(Form::label('description', __('Description'), ['class' => 'form-label'])); ?>

        <?php echo Form::textarea('description', null, ['class'=>'form-control','rows'=>'3']); ?>

    </div>
    <div class="modal-footer border-0 p-0">
        <button type="button" class="btn  btn-light" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
        <button type="submit" class="btn  btn-primary"><?php echo e(__('Create')); ?></button>
    </div>
</div>
<?php echo e(Form::close()); ?>


<?php /**PATH /home/sites/1a/7/74fc9abc3b/public_html/resources/views/plan/create.blade.php ENDPATH**/ ?>