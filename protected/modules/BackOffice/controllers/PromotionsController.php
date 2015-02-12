<?php

class PromotionsController extends Controller {

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
        $model = new TblPromotions;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['TblPromotions'])) {
            $model->attributes = $_POST['TblPromotions'];
            $imageFile = CUploadedFile::getInstance($model, 'promotion_picture');
            if ($imageFile !== null) {
//                $fileExt = $imageFile->getExtensionName();
                $imageFilename = Yii::getPathOfAlias('images') . "/upload/promotion/" . date("YmdHis") . $imageFile;
                $model->promotion_picture = $imageFile;
            }
            if ($model->save()) {
                if ($imageFile !== null) {
                    $model->promotion_picture->saveAs($imageFilename);
                    $model->promotion_picture = date("YmdHis") . $imageFile;
                    $model->save();
                }
                $this->redirect(array('view', 'id' => $model->promotion_id));
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

        if (isset($_POST['TblPromotions'])) {
            $model->attributes = $_POST['TblPromotions'];
            $imageFile = CUploadedFile::getInstance($model, 'promotion_picture');
            if ($imageFile !== null) {
//                $fileExt = $imageFile->getExtensionName();
                $imageFilename = Yii::getPathOfAlias('images') . "/upload/promotion/" . date("YmdHis") . $imageFile;
                $model->promotion_picture = $imageFile;
            }
            if ($model->save()) {
                if ($imageFile !== null) {
                    $model->promotion_picture->saveAs($imageFilename);
                    $model->promotion_picture = date("YmdHis") . $imageFile;
                    $model->save();
                }
                $this->redirect(array('view', 'id' => $model->promotion_id));
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
        $dataProvider = new CActiveDataProvider('TblPromotions');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new TblPromotions('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['TblPromotions']))
            $model->attributes = $_GET['TblPromotions'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return TblPromotions the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = TblPromotions::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param TblPromotions $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'tbl-promotions-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
