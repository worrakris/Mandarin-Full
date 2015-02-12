<?php
/* @var $this ContactController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Contact Us Manages',
);

$this->menu=array(
	array('label'=>'Create ContactUsManage', 'url'=>array('create')),
	array('label'=>'Manage ContactUsManage', 'url'=>array('admin')),
);
?>

<h1>Contact Us Manages</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
