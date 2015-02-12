<?php
/* @var $this PromotionsController */
/* @var $data TblPromotions */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('promotion_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->promotion_id), array('view', 'id'=>$data->promotion_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('promotion_title_th')); ?>:</b>
	<?php echo CHtml::encode($data->promotion_title_th); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('promotion_title_en')); ?>:</b>
	<?php echo CHtml::encode($data->promotion_title_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('promotion_content_th')); ?>:</b>
	<?php echo CHtml::encode($data->promotion_content_th); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('promotion_content_en')); ?>:</b>
	<?php echo CHtml::encode($data->promotion_content_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('promotion_picture')); ?>:</b>
	<?php echo CHtml::encode($data->promotion_picture); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('promotion_create_date')); ?>:</b>
	<?php echo CHtml::encode($data->promotion_create_date); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('promotion_start_date')); ?>:</b>
	<?php echo CHtml::encode($data->promotion_start_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('promotion_expire_date')); ?>:</b>
	<?php echo CHtml::encode($data->promotion_expire_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('promotion_update_date')); ?>:</b>
	<?php echo CHtml::encode($data->promotion_update_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('promotion_status')); ?>:</b>
	<?php echo CHtml::encode($data->promotion_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('promotion_creator')); ?>:</b>
	<?php echo CHtml::encode($data->promotion_creator); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('promotion_type')); ?>:</b>
	<?php echo CHtml::encode($data->promotion_type); ?>
	<br />

	*/ ?>

</div>