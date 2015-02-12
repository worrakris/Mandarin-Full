<?php
/* @var $this ContactController */
/* @var $model ContactUsManage */

$this->breadcrumbs=array(
	'Contact Us Manages'=>array('index'),
	$model->contact_id=>array('view','id'=>$model->contact_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ContactUsManage', 'url'=>array('index')),
	array('label'=>'Create ContactUsManage', 'url'=>array('create')),
	array('label'=>'View ContactUsManage', 'url'=>array('view', 'id'=>$model->contact_id)),
	array('label'=>'Manage ContactUsManage', 'url'=>array('admin')),
);
?>

<h1>Update ContactUsManage <?php echo $model->contact_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>