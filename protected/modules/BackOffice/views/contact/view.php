<?php
/* @var $this ContactController */
/* @var $model ContactUsManage */

$this->pageTitle = "Customer Contact";
$this->breadcrumbs = array(
    'Customer Contact' => array('admin'),
    '<' . $model->contact_email . '>',
);

$this->menu = array(
    array('label' => 'Customer Contact', 'url' => array('admin')),
);
?>
<div class="row">
    <div class="col-md-10">
        <div class="box box-info">
            <div class="box-header">
                <span class="box-title">
                    <?php echo $model->contact_subject; ?><br/>
                    <h5><i class="fa fa-user"></i> <?php printf("%s (%s)", $model->contact_name, $model->contact_email); ?></h5>
                </span>
            </div>
            <div class="box-body">
                <?php echo $model->contact_description; ?>
            </div>
            <div class="box-footer clearfix">
                <b>Contact Date: </b><?php echo $model->contact_create_date; ?>
            </div>
        </div>
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'contact-reply-form',
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation' => false,
            'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));
        ?>
        <div class="box box-info">
            <div class="box-header">
                <i class="fa fa-envelope"></i>
                <h3 class="box-title">Reply</h3>
            </div>
            <div class="box-body">
                <div>
                    <textarea name="ContactReply[msg]" id ="ContactReply_msg" class="mailtext" placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>

            </div>
            <div class="box-footer clearfix">
                <button type="submit" class="pull-right btn btn-default" id="sendEmail">Send <i class="fa fa-arrow-circle-right"></i></button>
            </div>
        </div>
<?php $this->endWidget(); ?>

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

