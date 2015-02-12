<?php
/* @var $this StaffController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Staff Manages',
);

$this->menu=array(
	array('label'=>'Create StaffManage', 'url'=>array('create')),
	array('label'=>'Manage StaffManage', 'url'=>array('admin')),
);
?>

<h1>Staff Manages</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
