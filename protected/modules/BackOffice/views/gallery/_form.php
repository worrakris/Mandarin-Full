<?php
/* @var $this GalleryController */
/* @var $model GalleryManage */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gallery-manage-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'gallery_capt_th'); ?>
		<?php echo $form->textField($model,'gallery_capt_th',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'gallery_capt_th'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gallery_capt_en'); ?>
		<?php echo $form->textField($model,'gallery_capt_en',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'gallery_capt_en'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gallery_image'); ?>
		<?php echo $form->textField($model,'gallery_image',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'gallery_image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gallery_update_date'); ?>
		<?php echo $form->textField($model,'gallery_update_date'); ?>
		<?php echo $form->error($model,'gallery_update_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->