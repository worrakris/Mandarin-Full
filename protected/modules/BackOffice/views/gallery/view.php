<?php
echo "Test";

print_r($data);
foreach($data as $key => $value) {
    echo $key . "-" . $value;
}
die();

?>
<?php
/* @var $this GalleryController */
/* @var $model GalleryManage */

$this->breadcrumbs=array(
	'Gallery Manages'=>array('index'),
	$model->gallery_id,
);

$this->menu=array(
	array('label'=>'List GalleryManage', 'url'=>array('index')),
	array('label'=>'Create GalleryManage', 'url'=>array('create')),
	array('label'=>'Update GalleryManage', 'url'=>array('update', 'id'=>$model->gallery_id)),
	array('label'=>'Delete GalleryManage', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->gallery_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GalleryManage', 'url'=>array('admin')),
);
?>

<h1>View GalleryManage #<?php echo $model->gallery_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'gallery_id',
		'gallery_capt_th',
		'gallery_capt_en',
		'gallery_image',
		'gallery_update_date',
	),
)); ?>
