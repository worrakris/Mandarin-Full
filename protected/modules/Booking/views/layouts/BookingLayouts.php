<?php /* @var $this Controller */ ?>
<?php
ob_start();
$session = new CHttpSession;
$session->open();

$http = new CHttpRequest;
Yii::app()->user->returnUrl = $http->getUrl();

$baseUrl = Yii::app()->request->baseUrl;

$lang = Yii::app()->session['sess_lang'];
if (empty($lang)) {
    Yii::app()->language = 'th';
    $cur_lang = 'th';
} else {
    Yii::app()->language = $lang;
    $cur_lang = $lang;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta content="โรงแรมแมนดารินโกลเด้นวัลเลย์ แอนด์ รีสอร์ท เป็นโรงแรมระดับ 4 ดาว ตั้งอยู่ท่ามกลางธรรมชาติอันสวยงาม 
              ในบรรยากาศที่ร่มรื่นและเขียวขจีของหมู่แมกไม้ ซึ่งรายล้อมด้วยขุนเขาใหญ่น้อยอันตระการ ในเขตวนอุทยานแห่งชาติเขาใหญ่
              โรงแรมแมนดารินโกลเด้นวัลเลย์ แอนด์ รีสอร์ท มีสิ่งอำนวยความสะดวกที่เพียบพร้อมและครบครัน กอปรกับการบริการอย่างละเมียด 
              ที่เปี่ยมล้นด้วยไมตรีและรอยยิ้มของพนักงานผู้ซึ่งได้รับการฝึกฝนมาอย่างดี ด้วยระยะทางเพียง 165 กิโลเมตรจากกรุงเทพฯ 
              ท่านจึงสามารถขับรถถึงได้ในหนึ่งเพลิน ดังนั้น โรงแรมแมนดารินโกลเด้นวัลเลย์ แอนด์ รีสอร์ท เขาใหญ่ จึงเหมาะอย่างยิ่งสำหรับการพักผ่อนของท่านในวันว่าง 
              ไม่ว่าจะเป็นการส่วนตัว เป็นครอบครัวหรือหมู่คณะ" name="description" />
        <meta content="แมนดาริน, Mandarin, เขาใหญ่, Khaoyai, แมนดารินเขาใหญ่, Mandarin Khaoyai, โรงแรม 4 ดาว, อัครสถาน, Hotel" name="Keywords" />
        <meta name="robots" content="index,follow" />

        <!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
        <![endif]-->

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

        <!--Custom CSS-->


        <!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/bootstrap/css/jquery.fullPage.css" />-->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/bootstrap/css/customCss.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/bootstrap/css/jquery.mCustomScrollbar.css" />
        <!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/bootstrap/css/lightbox.css" />-->
        <!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/bootstrap/css/prettify.css" />-->
        <!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/bootstrap/css/bootstrap-combined.min.css" />-->
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/bootstrap/js/jquery-1.11.0.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/bootstrap/js/jquery-ui-1.10.4.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/bootstrap/js/bootstrap.js"></script>
<!--        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/bootstrap/js/vendors/jquery.slimscroll.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/bootstrap/js/jquery.fullPage.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/bootstrap/js/lightbox-2.6.min.js"></script> -->
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/bootstrap/js/jquery.mCustomScrollbar.js"></script>
        <!--<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/bootstrap/js/jquery.bootstrap.wizard.js"></script>-->
        <!--<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/bootstrap/js/prettify.js"></script>-->
<!--<script src="http://www.bootstrapcdn.com/twitter-bootstrap/2.2.1/js/bootstrap.min.js"></script>-->
        <!--[if lt IE 9]>
            <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/bootstrap/lightview/js/excanvas/excanvas.js"></script>
        <![endif]-->
<!--        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/bootstrap/lightview/js/spinners/spinners.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/bootstrap/lightview/js/lightview/lightview.js"></script>

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/bootstrap/lightview/css/lightview/lightview.css"/>-->

        <script type="text/javascript">
            $(document).ready(function () {
//                $('#openBtn').click(function () {
//                    $('.modal-body').load('', function (result) {
//                        $('#myModal').modal('show');
//                    });
//                });
            });

        </script>

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body style="background-color: #ccc;">
        <header id="Mheader">
            <div id="langBar">
                <?php
                if ($cur_lang == 'th') {
                    echo 'TH | ';
                    echo CHtml::link('EN', array('setlanguage', 'lang' => 'en'));
                } else {
                    echo CHtml::link('TH', array('setlanguage', 'lang' => 'th'));
                    echo " | EN";
                }
                ?>
            </div>
            <div id="logBox">
                <button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#myModal">
                    <?php echo Yii::t('translateWord', 'StaffLogIn'); ?>
                </button>

                                            <!--<span><a href="#" id="openBtn" data-toggle="modal" data-target="#myModal"><?php echo Yii::t('translateWord', 'StaffLogIn'); ?></a></span>-->

            </div>
            <div id="logoPNG">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo_bg.png" style="width: 100%"></img>
            </div>
            <div id="headerBooking" >
                <h1>Hotel Booking</h1>
            </div>
        </header>

        <div id="contentsBooking">

            <?php echo $content; ?>
            <div class="clear"></div>

        </div>

        <div id="Mfooter">
            <div style="position: fixed; margin-left: 0;">
                Copyright &copy; <?php echo date('Y'); ?> by MANDARIN GOLDEN VALLEY HOTEL AND RESORT (KHAO YAI). All Rights Reserved.<br/>Power By M-Tech Dreams co.,ltd.
            </div>

            <div style="position: absolute; bottom: 0; right: 0; float: left; display: table; padding: 8px;">
                <!--                <div id="subscribeDiv" style="display: table-cell">
                                    <a data-toggle="modal" href="#form-subscribe" id="subscribeBtn">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icon-letter.png" />
                                    </a>
                                </div>
                                <div style="display: table-cell; padding-left: 4px;"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icon-Facebook.png" /></div>
                                <div style="display: table-cell; padding-left: 4px;"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icon-Twitter.png" /></div>
                                <div style="display: table-cell; padding-left: 4px;"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icon-Instagram.png" /></div>
                                <div style="display: table-cell; padding-left: 4px;"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icon-Pinterest.png" /></div>
                                <div style="display: table-cell; padding-left: 4px;"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icon-Blogger.png" /></div>-->
            </div>

        </div><!-- footer -->

        <!--        <div class="modal fade" id="form-subscribe">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title"><?php echo Yii::t('translateWord', 'SubscribeTitle'); ?></h4>
                            </div>
                            <div class="modal-body">
        <?php echo Yii::t('translateWord', 'SubscribeIntro'); ?>
                                <form class="subscribe">
                                    <fieldset>
                                        <div class="input-group">
                                            <span class="input-group-addon">@</span>
                                            <input name="email" type="text" class="form-control" placeholder="Your E-mail" />
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-success" id="submit">Submit</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
                            </div>
                        </div>
                    </div>
                </div>-->
    </body>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel"><?php echo Yii::t('translateWord', 'StaffLogInHeader'); ?></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label"><?php echo Yii::t('translateWord', 'Username'); ?></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Username">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label"><?php echo Yii::t('translateWord', 'Password'); ?></label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Log In</button>
                            </div>
                        </div>
                    </form>
                </div>
<!--                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Log In</button>
                </div>-->
            </div>
        </div>
    </div>
</html>
<!-- model content -->	
