<?php
/* @var $this PromotionsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Promotions',
);

$this->menu=array(
	array('label'=>'Create TblPromotions', 'url'=>array('create')),
	array('label'=>'Manage TblPromotions', 'url'=>array('admin')),
);
?>

<h1>Tbl Promotions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
