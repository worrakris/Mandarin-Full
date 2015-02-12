<?php
/* @var $this StaffController */
/* @var $model StaffManage */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'staff_id'); ?>
		<?php echo $form->textField($model,'staff_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'staff_name_th'); ?>
		<?php echo $form->textField($model,'staff_name_th',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'staff_name_en'); ?>
		<?php echo $form->textField($model,'staff_name_en',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'staff_position'); ?>
		<?php echo $form->textField($model,'staff_position',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'staff_email'); ?>
		<?php echo $form->textField($model,'staff_email',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'staff_tel'); ?>
		<?php echo $form->textField($model,'staff_tel',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'staff_create_date'); ?>
		<?php echo $form->textField($model,'staff_create_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'staff_update_date'); ?>
		<?php echo $form->textField($model,'staff_update_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'staff_username'); ?>
		<?php echo $form->textField($model,'staff_username',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'staff_status'); ?>
		<?php echo $form->textField($model,'staff_status',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'staff_type_id'); ?>
		<?php echo $form->textField($model,'staff_type_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->