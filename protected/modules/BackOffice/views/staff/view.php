<?php
/* @var $this StaffController */
/* @var $model StaffManage */

$this->breadcrumbs=array(
	'Staff Manages'=>array('index'),
	$model->staff_id,
);

$this->menu=array(
	array('label'=>'List StaffManage', 'url'=>array('index')),
	array('label'=>'Create StaffManage', 'url'=>array('create')),
	array('label'=>'Update StaffManage', 'url'=>array('update', 'id'=>$model->staff_id)),
	array('label'=>'Delete StaffManage', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->staff_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StaffManage', 'url'=>array('admin')),
);
?>

<h1>View StaffManage #<?php echo $model->staff_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'staff_id',
		'staff_name_th',
		'staff_name_en',
		'staff_position',
		'staff_email',
		'staff_tel',
		'staff_create_date',
		'staff_update_date',
		'staff_username',
		'staff_password',
		'staff_status',
		'staff_type_id',
	),
)); ?>
