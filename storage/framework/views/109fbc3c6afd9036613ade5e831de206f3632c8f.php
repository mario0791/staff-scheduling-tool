<?php echo e(Form::open(array('url' => 'contract'))); ?>

<div class="row">
    <div class="form-group col-md-6">
        <?php echo e(Form::label('employee', __('Employee'),['class' => 'col-form-label'])); ?>

        <?php echo e(Form::select('employee', $employee,null, array('class' => 'form-control  multi-select','id'=>'choices-multiple-employee','required'=>'required'))); ?>

    </div>
    
       <div class="form-group col-md-6">
          <?php echo e(Form::label('contract_name', __('Contract Name'),['class' => 'col-form-label'])); ?>

          <?php echo e(Form::text('contract_name', '', array('class' => 'form-control','required'=>'required'))); ?>

      </div>
      <div class="form-group col-md-6">
          <?php echo e(Form::label('subject', __('Subject'),['class' => 'col-form-label'])); ?>

          <?php echo e(Form::text('subject', '', array('class' => 'form-control','required'=>'required'))); ?>

      </div>
   
    
    <div class="form-group col-md-6">
        <?php echo e(Form::label('value', __('Contract Value'),['class' => 'col-form-label'])); ?>

        <?php echo e(Form::number('value', '', array('class' => 'form-control','required'=>'required','stage'=>'0.01'))); ?>

    </div>
    <div class="form-group col-md-6">
        <?php echo e(Form::label('start_date', __('Start Date'),['class' => 'col-form-label'])); ?>

        <?php echo e(Form::date('start_date', '', array('class' => 'form-control','required'=>'required'))); ?>

    </div>
    <div class="form-group col-md-6">
        <?php echo e(Form::label('end_date', __('End Date'),['class' => 'col-form-label'])); ?>

        <?php echo e(Form::date('end_date', '', array('class' => 'form-control','required'=>'required'))); ?>

    </div>
    <div class="form-group col-md-12">
        <?php echo e(Form::label('type', __('Contract Type'),['class' => 'col-form-label'])); ?>

        <?php echo e(Form::select('type', $contractTypes,null, array('class' => 'form-control multi-select','required'=>'required'))); ?>

        <?php if(count($contractTypes) <= 0): ?>
        <div class="text-muted text-xs">
            <?php echo e(__('Please create new contract type')); ?> <a
                href="<?php echo e(route('contract_type.index')); ?>"><?php echo e(__('here')); ?></a>
        </div>
    <?php endif; ?>
    </div>
     
</div>
<div class="row">
    <div class="form-group col-md-12">
        <?php echo e(Form::label('notes', __('Notes'),['class' => 'col-form-label'])); ?>

        <?php echo Form::textarea('notes', null, ['class'=>'form-control','rows'=>'3']); ?>

    </div>
</div>
<div class="modal-footer pr-0">
    <button type="button" class="btn  btn-light" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
    <?php echo e(Form::submit(__('Create'),array('class'=>'btn  btn-primary'))); ?>

</div>

<?php echo e(Form::close()); ?>

<?php /**PATH /home/sites/1a/7/74fc9abc3b/public_html/resources/views/contract/create.blade.php ENDPATH**/ ?>