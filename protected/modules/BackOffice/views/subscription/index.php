<?php
/* @var $this SubscriptionController */
/* @var $dataProvider CActiveDataProvider */

$this->pageTitle = "E-Newsletter Management";
$this->breadcrumbs = array(
    'E-Newsletter Management',
);

$this->menu = array(
    array('label' => 'Subscriber Management', 'url' => array('admin')),
);

$all_subscriber = Yii::app()->db->createCommand('SELECT email FROM tbl_subscription')->queryAll();
$cntAllSubscribe = count($all_subscriber);

$yesterday = date("Y-m-d H:i:s", mktime(0, 0, 0, date("m"), date("d"), date("Y")));
$subscriber = Yii::app()->db->createCommand('SELECT email FROM tbl_subscription WHERE subscribe_date >= \'' . $yesterday . '\'')->queryAll();
$cntSubscribe = count($subscriber);
?>
<div class="row">
    <div class="col-lg-10 col-md-10">
        <div class="row">
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3>
                            <?php echo $cntAllSubscribe; ?>
                        </h3>
                        <p>
                            Subscribers
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-stalker"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>
                            <?php echo $cntSubscribe; ?>
                        </h3>
                        <p>
                            Today's Subscriber
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <!-- quick email widget -->
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'subscription-form',
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
                        <h3 class="box-title">Create E-Newsletter</h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
<!--                            <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>-->
                        </div><!-- /. tools -->
                    </div>
                    <div class="box-body">

                        <!--                            <div class="form-group">
                                                        <input type="email" class="form-control" name="emailto" placeholder="Email to:"/>
                                                    </div>-->
                        <div class="form-group">
                            <input type="text" class="form-control" name="Newsletter[subject]" id ="Newsletter_subject" placeholder="Subject"/>
                        </div>
                        <div>
                            <textarea name="Newsletter[msg]" id="Newsletter_msg" class="mailtext" placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                        </div>
                        </form>
                    </div>
                    <div class="box-footer clearfix">
                        <button type="submit" class="pull-right btn btn-default" id="sendEmail">Send <i class="fa fa-arrow-circle-right"></i></button>
                    </div>
                </div>
                <?php $this->endWidget(); ?>
            </div>
        </div>
    </div>
    <div class="col-lg-2 col-md-2">
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
