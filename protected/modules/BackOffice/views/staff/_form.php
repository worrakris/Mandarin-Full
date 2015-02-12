<?php
/* @var $this StaffController */
/* @var $model StaffManage */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'staff-manage-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <div class="col-lg-2 col-md-2">
            <?php echo $form->labelEx($model, 'staff_name_th'); ?>
        </div>
        <div class="col-lg-10 col-md-10">
            <?php echo $form->textField($model, 'staff_name_th', array('size' => 60, 'maxlength' => 250)); ?>
            <?php echo $form->error($model, 'staff_name_th'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2">
            <?php echo $form->labelEx($model, 'staff_name_en'); ?>
        </div>
        <div class="col-lg-10 col-md-10">
            <?php echo $form->textField($model, 'staff_name_en', array('size' => 60, 'maxlength' => 250)); ?>
            <?php echo $form->error($model, 'staff_name_en'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2">
            <?php echo $form->labelEx($model, 'staff_position'); ?>
        </div>
        <div class="col-lg-10 col-md-10">
            <?php echo $form->textField($model, 'staff_position', array('size' => 60, 'maxlength' => 250)); ?>
            <?php echo $form->error($model, 'staff_position'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2">
            <?php echo $form->labelEx($model, 'staff_email'); ?>
        </div>
        <div class="col-lg-10 col-md-10">
            <?php echo $form->textField($model, 'staff_email', array('size' => 60, 'maxlength' => 200)); ?>
            <?php echo $form->error($model, 'staff_email'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2">
            <?php echo $form->labelEx($model, 'staff_tel'); ?>
        </div>
        <div class="col-lg-10 col-md-10">
            <?php echo $form->textField($model, 'staff_tel', array('size' => 60, 'maxlength' => 200)); ?>
            <?php echo $form->error($model, 'staff_tel'); ?>
        </div>
    </div>
    <?php if ($show) { ?>
        <div class="row">
            <div class="col-lg-2 col-md-2">
                <?php echo $form->labelEx($model, 'staff_status'); ?>
            </div>
            <div class="col-lg-10 col-md-10">
                <input type="hidden" value="<?php echo date("Y-m-d H:i:s"); ?>" name="StaffManage[staff_create_date]" id="StaffManage_staff_create_date" />
                <input type="hidden" value="<?php echo date("Y-m-d H:i:s"); ?>" name="StaffManage[staff_update_date]" id="StaffManage_staff_update_date" />
                <?php echo ZHtml::enumDromDownListUpdate($model, 'staff_status', array('class' => 'span5', 'maxlength' => 8)); ?>
                <?php echo $form->error($model, 'staff_status'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-2">
                <?php echo $form->labelEx($model, 'staff_type_id'); ?>
            </div>
            <div class="col-lg-10 col-md-10">
                <?php echo CHtml::dropDownList('StaffManage[staff_type_id]', $model->staff_type_id, CHtml::listData(StaffType::model()->findAll(), 'staff_type_id', 'staff_type_name')); ?>
                <?php echo $form->error($model, 'staff_type_id'); ?>
            </div>
        </div>
    <?php } else { ?>
        <input type="hidden" value="<?php echo $model->staff_create_date; ?>" name="StaffManage[staff_create_date]" id="StaffManage_staff_create_date" />
        <input type="hidden" value="<?php echo date("Y-m-d H:i:s"); ?>" name="StaffManage[staff_update_date]" id="StaffManage_staff_update_date" />
        <input type="hidden" value="<?php echo $model->staff_status; ?>" name="StaffManage[staff_status]" id="StaffManage_staff_status" />
        <input type="hidden" value="<?php echo $model->staff_type_id; ?>" name="StaffManage[staff_type_id]" id="StaffManage_staff_type_id" />
        <input type="hidden" value="1" name="StaffFlag" id="StaffFlag" />
    <?php } ?>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12"></div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12"><h4><b>Username & Password</b></h4></div>
    </div>
    <div class="row">
        <div class="col-lg-2 col-md-2">
            <?php echo $form->labelEx($model, 'staff_username'); ?>
        </div>
        <div class="col-lg-10 col-md-10">
            <?php echo $form->textField($model, 'staff_username', array('size' => 20, 'maxlength' => 20)); ?>
            <?php echo $form->error($model, 'staff_username'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2">
            <label for="StaffManage_staff_password" class="required">Password <span class="required">*</span></label>
        </div>
        <div class="col-lg-10 col-md-10">
            <?php echo $form->passwordField($model, 'staff_password', array('size' => 20, 'maxlength' => 20)); ?>
            <?php echo $form->error($model, 'staff_password'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2">
            <label for="StaffManage_retype_password" class="required">Re-type Password <span class="required">*</span></label>
        </div>
        <div class="col-lg-10 col-md-10">
            <?php echo $form->passwordField($model, 'retype_password', array('size' => 20, 'maxlength' => 20)); ?>
        </div>
    </div>
    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->