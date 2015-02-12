<?php
/* @var $this GalleryController */
/* @var $data GalleryManage */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('gallery_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->gallery_id), array('view', 'id'=>$data->gallery_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gallery_capt_th')); ?>:</b>
	<?php echo CHtml::encode($data->gallery_capt_th); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gallery_capt_en')); ?>:</b>
	<?php echo CHtml::encode($data->gallery_capt_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gallery_image')); ?>:</b>
	<?php echo CHtml::encode($data->gallery_image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gallery_update_date')); ?>:</b>
	<?php echo CHtml::encode($data->gallery_update_date); ?>
	<br />


</div>