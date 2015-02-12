<?php
/* @var $this SubscriptionController */
/* @var $model SubscriptionManage */

$this->breadcrumbs=array(
	'Subscription Manages'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SubscriptionManage', 'url'=>array('index')),
	array('label'=>'Manage SubscriptionManage', 'url'=>array('admin')),
);
?>

<h1>Create SubscriptionManage</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>