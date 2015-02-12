<?php
/* @var $this TblNewsController */
/* @var $data TblNews */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('news_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->news_id), array('view', 'id'=>$data->news_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('news_title_th')); ?>:</b>
	<?php echo CHtml::encode($data->news_title_th); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('news_title_en')); ?>:</b>
	<?php echo CHtml::encode($data->news_title_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('news_content_th')); ?>:</b>
	<?php echo CHtml::encode($data->news_content_th); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('news_content_en')); ?>:</b>
	<?php echo CHtml::encode($data->news_content_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('news_picture')); ?>:</b>
	<?php echo CHtml::encode($data->news_picture); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('news_create_date')); ?>:</b>
	<?php echo CHtml::encode($data->news_create_date); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('news_expire_date')); ?>:</b>
	<?php echo CHtml::encode($data->news_expire_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('news_update_date')); ?>:</b>
	<?php echo CHtml::encode($data->news_update_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('news_status')); ?>:</b>
	<?php echo CHtml::encode($data->news_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('news_creator')); ?>:</b>
	<?php echo CHtml::encode($data->news_creator); ?>
	<br />

	*/ ?>

</div>