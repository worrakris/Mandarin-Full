<?php
/* @var $this ContactController */
/* @var $model ContactUsManage */

$this->breadcrumbs=array(
	'Contact Us Manages'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ContactUsManage', 'url'=>array('index')),
	array('label'=>'Manage ContactUsManage', 'url'=>array('admin')),
);
?>

<h1>Create ContactUsManage</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>