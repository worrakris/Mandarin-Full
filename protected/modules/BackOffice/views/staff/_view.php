<?php
/* @var $this StaffController */
/* @var $data StaffManage */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('staff_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->staff_id), array('view', 'id'=>$data->staff_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('staff_name_th')); ?>:</b>
	<?php echo CHtml::encode($data->staff_name_th); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('staff_name_en')); ?>:</b>
	<?php echo CHtml::encode($data->staff_name_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('staff_position')); ?>:</b>
	<?php echo CHtml::encode($data->staff_position); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('staff_email')); ?>:</b>
	<?php echo CHtml::encode($data->staff_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('staff_tel')); ?>:</b>
	<?php echo CHtml::encode($data->staff_tel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('staff_create_date')); ?>:</b>
	<?php echo CHtml::encode($data->staff_create_date); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('staff_update_date')); ?>:</b>
	<?php echo CHtml::encode($data->staff_update_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('staff_username')); ?>:</b>
	<?php echo CHtml::encode($data->staff_username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('staff_password')); ?>:</b>
	<?php echo CHtml::encode($data->staff_password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('staff_status')); ?>:</b>
	<?php echo CHtml::encode($data->staff_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('staff_type_id')); ?>:</b>
	<?php echo CHtml::encode($data->staff_type_id); ?>
	<br />

	*/ ?>

</div>