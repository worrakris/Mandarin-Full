<?php

class DefaultController extends Controller {

    public $layout = 'BackOfficeLayouts';

    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        $users = Yii::app()->db->createCommand('SELECT staff_username FROM tbl_staff')->queryAll();
        foreach ($users as $key => $value) {
            $users[$key] = array_shift($value);
        }
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'logout', 'error'),
                'users' => $users,
            ),
            array('allow',
                'actions' => array('login', 'error'),
                'users' => array('*'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex() {
        $this->render('index');
    }

    public function actionLogin() {
        //$this->layout = "";

        $model = new LoginForm;
        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
//            print_r($_POST['LoginForm']);

            $model->attributes = $_POST['LoginForm'];
//            echo "<pre>";
//            print_r($model);
//            echo "</pre>";
//            die();
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login()) {
                $this->redirect(Yii::app()->user->returnUrl);
            } else {
                //$this->render('error', array('code' =>'slfdkslfksld'));
//                $this->render('index');
            }
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    public function actionLogout() {
        Yii::app()->user->logout(false);
        Yii::app()->user->returnUrl = Yii::app()->createUrl('/BackOffice/');
        $this->redirect(Yii::app()->user->loginUrl);
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

}
