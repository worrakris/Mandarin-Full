<?php

class SubscriptionController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = 'BackOfficeLayouts';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        $users = Yii::app()->db->createCommand('SELECT staff_username FROM tbl_staff WHERE staff_type_id>=1')->queryAll();
        foreach ($users as $key => $value) {
            $users[$key] = array_shift($value);
        }
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('admin', 'create', 'update', 'view', 'index', 'delete'),
                'users' => $users,
            ),
            array('allow',
                'actions' => array('unsubcribe'),
                'users' => array('*'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new SubscriptionManage;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['SubscriptionManage'])) {
            $model->attributes = $_POST['SubscriptionManage'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->email));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['SubscriptionManage'])) {
            $model->attributes = $_POST['SubscriptionManage'];
            if ($model->save())
                $this->redirect(array('admin'));
       
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
//        $dataProvider = new CActiveDataProvider('SubscriptionManage');
//        $this->render('index', array(
//            'dataProvider' => $dataProvider,
//        ));
        if (isset($_POST['Newsletter'])) {
            $modelNews = $_POST['Newsletter'];
            $all_subscriber = Yii::app()->db->createCommand('SELECT email FROM tbl_subscription')->queryAll();
            $cntAllSubscribe = count($all_subscriber);
            $mail_to = array();
//            $ndx = 0;
            $counter = 0;
            foreach ($all_subscriber as $value) {
                array_push($mail_to, $value);
                $counter++;
                if ($counter >= 50) {
                    $name = '=?UTF-8?B?' . base64_encode("Mandarin Golden Valley Hotel and Resort (Khao Yai)") . '?=';
                    $subject = '=?UTF-8?B?' . base64_encode($modelNews['subject']) . '?=';
                    $headers = "From: $name <noreply@mandarin-khaoyai.com> \r\n" .
                            "Reply-To: \r\n" .
                            "MIME-Version: 1.0\r\n" .
                            "Content-Type: text/html; charset=UTF-8";
                    $headers .= 'BCC: ' . implode(",", $mail_to) . "\r\n";
                    mail(NULL, $modelNews['subject'], $modelNews['msg'], $headers);
                    unset($mail_to);
                    $mail_to = array();
                    $counter = 0;
                }
            }
        }
        $this->render('index');
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new SubscriptionManage('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['SubscriptionManage']))
            $model->attributes = $_GET['SubscriptionManage'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionUnsubcribe($id) {
        $model = $this->loadModel($id);
        if ($model !== null) {
            $result = $model->delete();
            $this->render('unsubcribe', array(
                'email' => $id,
            ));
        } else {
            $this->redirect(Yii::app()->baseUrl);
        }
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return SubscriptionManage the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = SubscriptionManage::model()->findByPk($id);
//        if ($model === null)
//            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param SubscriptionManage $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'subscription-manage-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('default/error', $error);
        }
    }
}
