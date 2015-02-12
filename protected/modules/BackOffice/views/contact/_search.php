<?php
/* @var $this ContactController */
/* @var $model ContactUsManage */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'contact_id'); ?>
		<?php echo $form->textField($model,'contact_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contact_name'); ?>
		<?php echo $form->textField($model,'contact_name',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contact_email'); ?>
		<?php echo $form->textField($model,'contact_email',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contact_subject'); ?>
		<?php echo $form->textField($model,'contact_subject',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contact_description'); ?>
		<?php echo $form->textArea($model,'contact_description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contact_status'); ?>
		<?php echo $form->textField($model,'contact_status',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contact_create_date'); ?>
		<?php echo $form->textField($model,'contact_create_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contact_update_date'); ?>
		<?php echo $form->textField($model,'contact_update_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->