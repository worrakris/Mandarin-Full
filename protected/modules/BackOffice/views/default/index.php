<?php
/* @var $this DefaultController */
$this->pageTitle = "Dashboard";
$this->breadcrumbs = array(
    "Dashboard",
);

$contact = Yii::app()->db->createCommand('SELECT contact_id FROM tbl_customer_contact WHERE contact_status =\'New\'')->queryAll();
$cntContact = count($contact);

$today = date("Y-m-d");
$visitor = Yii::app()->db->createCommand('SELECT id FROM tbl_visitor_counter WHERE log_date = \'' . $today . '\'')->queryAll();
$cntVisitor = count($visitor);

$yesterday = date("Y-m-d H:i:s", mktime(0, 0, 0, date("m")  , date("d"), date("Y")));
$subscriber = Yii::app()->db->createCommand('SELECT email FROM tbl_subscription WHERE subscribe_date >= \'' . $yesterday . '\'')->queryAll();
$cntSubscribe = count($subscriber);
?>

<div class="row">
    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>
                    <?php echo $cntContact; ?>
                </h3>
                <p>
                    New Contact Messages
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-chatbubble-working"></i>
            </div>

        </div>
    </div><!-- ./col -->
    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>
                    <?php echo $cntVisitor; ?>
                </h3>
                <p>
                    Today's visitors
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-eye"></i>
            </div>
        </div>
    </div><!-- ./col -->
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
    </div><!-- ./col -->
<!--    <div class="col-lg-3 col-xs-6">
         small box 
        <div class="small-box bg-red">
            <div class="inner">
                <h3>
                    65
                </h3>
                <p>
                    Unique Visitors
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div> ./col -->
</div><!-- /.row -->

<!-- top row -->
<div class="row">
    <div class="col-xs-12 connectedSortable">

    </div><!-- /.col -->
</div>
<!-- /.row -->

