<?php
/* @var $this GalleryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Gallery Manages',
);

$this->menu=array(
	array('label'=>'Create GalleryManage', 'url'=>array('create')),
	array('label'=>'Manage GalleryManage', 'url'=>array('admin')),
);
?>

<h1>Gallery Manages</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
