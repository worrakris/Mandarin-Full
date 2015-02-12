<?php
/* @var $this TblNewsController */
/* @var $dataProvider CActiveDataProvider */

$this->pageTitle = "News Management";
$this->breadcrumbs=array(
	'News Management',
);

$this->menu=array(
	array('label'=>'Create TblNews', 'url'=>array('create')),
	array('label'=>'Manage TblNews', 'url'=>array('admin')),
);
?>

<h1>Tbl News</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
