<?php

class SiteController extends Controller {

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        
        $modelContact = new TblCustomerContact();
        if(Yii::app()->getRequest()->getIsAjaxRequest()) {
            echo CActiveForm::validate(array($modelContact));
            Yii::app()->end();
        }
        if (isset($_POST['TblCustomerContact'])) {
            $modelContact->attributes = $_POST['TblCustomerContact'];
            if ($modelContact->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($modelContact->contact_name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($modelContact->contact_subject) . '?=';
                $headers = "From: $name <{$modelContact->contact_email}>\r\n" .
                        "Reply-To: {$modelContact->contact_email}\r\n" .
                        "MIME-Version: 1.0\r\n" .
                        "Content-Type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['saleEmail'], $subject, $modelContact->contact_description, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $modelContact->contact_status = "New";
                date_default_timezone_set("Asia/Bangkok");
                $modelContact->contact_create_date = date("Y-m-d H:i:s");
                date_default_timezone_set("UTC");
                $modelContact->save();
                $this->refresh();
            }
        }
        $this->render('index', array('modelContact' => $modelContact));
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact() {
//        $model = new TblCustomerContact();
//        if (isset($_POST['TblCustomerContact'])) {
//            $model->attributes = $_POST['TblCustomerContact'];
//            if ($model->validate()) {
//                $name = '=?UTF-8?B?' . base64_encode($model->contact_name) . '?=';
//                $subject = '=?UTF-8?B?' . base64_encode($model->contact_subject) . '?=';
//                $headers = "From: $name <{$model->contact_email}>\r\n" .
//                        "Reply-To: {$model->contact_email}\r\n" .
//                        "MIME-Version: 1.0\r\n" .
//                        "Content-Type: text/plain; charset=UTF-8";
//
//                mail(Yii::app()->params['adminEmail'], $subject, $model->contact_description, $headers);
//                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
//                $model->contact_status = "New";
//                date_default_timezone_set("Asia/Bangkok");
//                $model->contact_create_date = date("Y-m-d H:i:s");
//                date_default_timezone_set("UTC");
//                $model->save();
//                $this->refresh();
//            }
//        }
//        $this->render('index', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }
    

}
