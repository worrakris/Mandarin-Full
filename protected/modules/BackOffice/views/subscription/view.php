<?php
/* @var $this SubscriptionController */
/* @var $model SubscriptionManage */

$this->breadcrumbs=array(
	'Subscription Manages'=>array('index'),
	$model->email,
);

$this->menu=array(
	array('label'=>'List SubscriptionManage', 'url'=>array('index')),
	array('label'=>'Create SubscriptionManage', 'url'=>array('create')),
	array('label'=>'Update SubscriptionManage', 'url'=>array('update', 'id'=>$model->email)),
	array('label'=>'Delete SubscriptionManage', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->email),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SubscriptionManage', 'url'=>array('admin')),
);
?>

<h1>View SubscriptionManage #<?php echo $model->email; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'email',
		'subscribe_date',
		'status',
	),
)); ?>
