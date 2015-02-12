<?php
/* @var $this GalleryController */
/* @var $model GalleryManage */

$this->pageTitle = "Gallery Management";
$this->breadcrumbs = array(
    'Gallery Management',
);

$this->menu = array(
    array('label' => 'Add More Image', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#gallery-manage-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="row">
    <div class="col-md-10">
        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'gallery-manage-grid',
            'dataProvider' => $model->search(),
            'template' => '{pager}{items}{pager}',
            'columns' => array(
                array(
                    'name' => 'gallery_image',
                    'type' => 'raw',
                    'value' => 'CHtml::image(Yii::app()->request->baseUrl . "/images/gallery/" . $data->gallery_image, "", array("width" => "100%"))',
                    'htmlOptions' => array('style' => 'width: 30%;'),
                ),
                array(
                    'name' => 'gallery_capt_th',
                    'htmlOptions' => array('style' => 'width: 30%;'),
                ),
                array(
                    'name' => 'gallery_capt_en',
                    'htmlOptions' => array('style' => 'width: 30%;'),
                ),
                array(
                    'class' => 'CButtonColumn',
                    'template' => '{update} {delete}',
                    'buttons' => array(
                        'update' => array(
                            'label' => '<i class="ion ion-compose"></i>',
                            'imageUrl' => false,
                            'options' => array('title' => 'Update'),
                        ),
                        'delete' => array(
                            'label' => '<i class="ion ion-trash-a"></i>',
                            'imageUrl' => false,
                            'options' => array('title' => 'Delete'),
                        ),
                    ),
                    'htmlOptions' => array('style' => 'width: 10%; font-size: 14pt; text-align: center'),
                ),
            ),
        ));
        ?>
    </div>
    <div class="col-md-2">
        <div class="span-5 last">
            <div id="sidebar">
<?php
$this->beginWidget('zii.widgets.CPortlet', array(
    'title' => 'Operations',
));
$this->widget('zii.widgets.CMenu', array(
    'items' => $this->menu,
    'htmlOptions' => array('class' => 'operations'),
));
$this->endWidget();
?>
            </div><!-- sidebar -->
        </div>
    </div>
</div>