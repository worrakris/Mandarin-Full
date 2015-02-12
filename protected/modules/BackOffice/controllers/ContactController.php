<?php

class ContactController extends Controller {

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
        $model = $this->loadModel($id);
        if (isset($_POST['ContactReply'])) {
            $reply = $_POST['ContactReply'];
            $name = '=?UTF-8?B?' . base64_encode("Mandarin Golden Valley Hotel and Resort (Khao Yai)") . '?=';
            $subject = '=?UTF-8?B?' . base64_encode('Re: ' . $model->contact_subject) . '?=';
            $headers = "From: $name <" . Yii::app()->user->email . "> \r\n" .
                    "Reply-To: " . Yii::app()->user->email . "}\r\n" .
                    "MIME-Version: 1.0\r\n" .
                    "Content-Type: text/html; charset=UTF-8";
            $reply['msg'] .= "\r\n \r\n Contact Staff: " . Yii::app()->user->fullname . "\r\n \r\n Contact E-Mail: " . Yii::app()->user->email;
            mail($model->contact_email, $subject, $reply['msg'], $headers);

            $model->contact_reply_staff = Yii::app()->user->id;
            $model->contact_reply_date = date("Y-m-d H:i:s");
            $model->contact_reply_msg =  $reply['msg'];
            $model->contact_status = "Reply";
            $model->contact_update_date = date("Y-m-d H:i:s");
            $model->save();
            $this->redirect(array('admin'));
        }
        $model->contact_status = "Read";
        $model->contact_update_date = date("Y-m-d H:i:s");
        $model->save();

        $this->render('view', array(
            'model' => $model,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new ContactUsManage;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['ContactUsManage'])) {
            $model->attributes = $_POST['ContactUsManage'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->contact_id));
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

        if (isset($_POST['ContactUsManage'])) {
            $model->attributes = $_POST['ContactUsManage'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->contact_id));
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
        $dataProvider = new CActiveDataProvider('ContactUsManage');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new ContactUsManage('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['ContactUsManage']))
            $model->attributes = $_GET['ContactUsManage'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return ContactUsManage the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = ContactUsManage::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param ContactUsManage $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'contact-us-manage-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
