<?php echo e(Form::open(['url' => 'roles', 'enctype' => 'multipart/form-data'])); ?>

    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <?php echo e(Form::label('', __('Name'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::text('name', null, ['class' => 'form-control', 'required' => ''])); ?>

            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="form-group">                
                <?php echo e(Form::label('', __('Default Break'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::number('default_break', null, ['class' => 'form-control', 'placeholder' => __('0 Minutes')])); ?>

            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="form-group">
                <?php echo e(Form::label('', __('Colour'), ['class' => 'form-label'])); ?>                
                <?php echo e(Form::input('color', 'color', '#eeeeee', array('class' => 'form-control', 'style' => 'min-height:40px;'))); ?>

            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <?php echo e(Form::label('', __(' Employee'), ['class' => 'form-label'])); ?>

                <?php echo Form::select('employees[]', $employees_select, null, ['required' => false, 'multiple' => 'multiple', 'id'=>'choices-multiple-location_id' ,'class'=> 'form-control multi-select']); ?>                
            </div>
        </div>
        <div class="modal-footer border-0 p-0">
            <button type="button" class="btn  btn-light" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
            <button type="submit" class="btn  btn-primary"><?php echo e(__('Create')); ?></button>
        </div>
    </div>
<?php echo e(Form::close()); ?>

<?php /**PATH /home/sites/1a/7/74fc9abc3b/public_html/resources/views/role/create.blade.php ENDPATH**/ ?>