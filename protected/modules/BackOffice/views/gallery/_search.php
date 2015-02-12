<?php
/* @var $this GalleryController */
/* @var $model GalleryManage */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'gallery_id'); ?>
		<?php echo $form->textField($model,'gallery_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gallery_capt_th'); ?>
		<?php echo $form->textField($model,'gallery_capt_th',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gallery_capt_en'); ?>
		<?php echo $form->textField($model,'gallery_capt_en',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gallery_image'); ?>
		<?php echo $form->textField($model,'gallery_image',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gallery_update_date'); ?>
		<?php echo $form->textField($model,'gallery_update_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->