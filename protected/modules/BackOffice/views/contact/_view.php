<?php
/* @var $this ContactController */
/* @var $data ContactUsManage */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->contact_id), array('view', 'id'=>$data->contact_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_name')); ?>:</b>
	<?php echo CHtml::encode($data->contact_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_email')); ?>:</b>
	<?php echo CHtml::encode($data->contact_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_subject')); ?>:</b>
	<?php echo CHtml::encode($data->contact_subject); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_description')); ?>:</b>
	<?php echo CHtml::encode($data->contact_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_status')); ?>:</b>
	<?php echo CHtml::encode($data->contact_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_create_date')); ?>:</b>
	<?php echo CHtml::encode($data->contact_create_date); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_update_date')); ?>:</b>
	<?php echo CHtml::encode($data->contact_update_date); ?>
	<br />

	*/ ?>

</div>