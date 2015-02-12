<?php

class TblNewsController extends Controller {

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
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new TblNews;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['TblNews'])) {
            $model->attributes = $_POST['TblNews'];
            $imageFile = CUploadedFile::getInstance($model, 'news_picture');
            if ($imageFile !== null) {
//                $fileExt = $imageFile->getExtensionName();
                $imageFilename = Yii::getPathOfAlias('images') . "/upload/news/" . date("YmdHis") . $imageFile;
                $model->news_picture = $imageFile;
            }
            if ($model->save()) {
                if ($imageFile !== null) {
                    $model->news_picture->saveAs($imageFilename);
                    $model->news_picture = date("YmdHis") . $imageFile;
                    $model->save();
                }
                $this->redirect(array('view', 'id' => $model->news_id));
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

        if (isset($_POST['TblNews'])) {
            $model->attributes = $_POST['TblNews'];
            $imageFile = CUploadedFile::getInstance($model, 'news_picture');
            if ($imageFile !== null) {
//                $fileExt = $imageFile->getExtensionName();
                $imageFilename = Yii::getPathOfAlias('images') . "/upload/news/" . date("YmdHis") . $imageFile;
                $model->news_picture = $imageFile;
            }
            if ($model->save()) {
                if ($imageFile !== null) {
                    $model->news_picture->saveAs($imageFilename);
                    $model->news_picture = date("YmdHis") . $imageFile;
                    $model->save();
                }
                $this->redirect(array('view', 'id' => $model->news_id));
            }
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
        $dataProvider = new CActiveDataProvider('TblNews');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
//        $layout = 'BackOfficeLayouts';
        $model = new TblNews('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['TblNews'])) {
            $model->attributes = $_GET['TblNews'];
        }
        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return TblNews the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = TblNews::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param TblNews $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'tbl-news-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
