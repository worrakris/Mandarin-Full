<?php
/* @var $this ContactController */
/* @var $model ContactUsManage */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-us-manage-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_name'); ?>
		<?php echo $form->textField($model,'contact_name',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'contact_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_email'); ?>
		<?php echo $form->textField($model,'contact_email',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'contact_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_subject'); ?>
		<?php echo $form->textField($model,'contact_subject',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'contact_subject'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_description'); ?>
		<?php echo $form->textArea($model,'contact_description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'contact_description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_status'); ?>
		<?php echo $form->textField($model,'contact_status',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'contact_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_create_date'); ?>
		<?php echo $form->textField($model,'contact_create_date'); ?>
		<?php echo $form->error($model,'contact_create_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_update_date'); ?>
		<?php echo $form->textField($model,'contact_update_date'); ?>
		<?php echo $form->error($model,'contact_update_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->