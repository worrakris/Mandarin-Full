<?php

class StaffController extends Controller {

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

//    public function beforeAction($action) {
//        $http = new CHttpRequest();
//        $referrer_url = $http->getUrlReferrer();
//        Yii::app()->user->returnUrl = $referrer_url;
//        parent::beforeAction($action);
//    }

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
        $model = new StaffManage;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['StaffManage'])) {
            $model->attributes = $_POST['StaffManage'];
//            $model->staff_password = md5($model->staff_password);
//            $model->retype_password = md5($model->retype_password);

            if ($model->saveModel($model->attributes) === true) {
                $this->redirect(array('admin'));
            }
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

        if (isset($_POST['StaffManage'])) {
            $model->attributes = $_POST['StaffManage'];
            if ($model->saveModel($model->attributes) === true) {
                if (isset($_POST['StaffFlag'])) {
                    $this->redirect(Yii::app()->user->returnUrl);
                } else {
                    $this->redirect(array('admin'));
                }
            }
//            if ($model->save())
//                $this->redirect(array('view', 'id' => $model->staff_id));
        } else {
            Yii::app()->user->returnUrl = Yii::app()->request->urlReferrer;
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
        $dataProvider = new CActiveDataProvider('StaffManage');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new StaffManage('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['StaffManage']))
            $model->attributes = $_GET['StaffManage'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return StaffManage the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = StaffManage::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param StaffManage $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'staff-manage-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
