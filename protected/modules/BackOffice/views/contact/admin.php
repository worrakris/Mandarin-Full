<?php

/* @var $this ContactController */
/* @var $model ContactUsManage */

$this->pageTitle = "Customer Contact";
$this->breadcrumbs = array(
    'Customer Contact',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#contact-us-manage-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'contact-us-manage-grid',
    'dataProvider' => $model->search(),
    'columns' => array(
         array(
            'name' => 'contact_status',
//            'value' => '$data->contact_status',
            'value' => function($data) {
        if ($data->contact_status === 'New') {
            return '<span class="label label-success">' . $data->contact_status . '</span>';
        } else {
            return '<span class="label label-warning">' . $data->contact_status . '</span>';
        }
    },
            'type' => 'raw',
            'filter' => false,
            'htmlOptions' => array('style' => 'width: 5%; text-align: center;'),
        ),
        array(
            'name' => 'contact_name',
            'value' => '$data->contact_name',
            'filter' => false,
            'htmlOptions' => array('style' => 'width: 15%;'),
        ),
        array(
            'name' => 'contact_subject',
            'value' => '$data->contact_subject',
            'filter' => false,
        ),
//        array(
//            'name' => 'contact_description',
//            'value' => '$data->contact_description',
//            'filter' => false,
//        ),
        array(
            'name' => 'contact_create_date',
            'value' => '$data->contact_create_date',
            'filter' => false,
            'htmlOptions' => array('style' => 'width: 15%; text-align: center;'),
        ),
       
        array(
            'class' => 'CButtonColumn',
            'template' => '{view}',
            'buttons' => array(
                'view' => array(
                    'label' => '<button class="btn btn-primary btn-sm">View</button>',
                    'imageUrl' => false,
                    'options' => array('title' => 'View'),
                ),
            ),
            'htmlOptions' => array('style' => 'width: 110px; vertical-align: top; text-align: center'),
        ),
    ),
));
?>
