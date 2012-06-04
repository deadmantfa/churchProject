<?php

class MarriageCertificateController extends RController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'rights', // perform access control for CRUD operations
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		if(Yii::app()->user->checkAccess('Marriage.MarriageCertificate.View')){
			$this->render('view',array(
				'model'=>$this->loadModel($id),
			));
		} else {
			echo $this->accessDenied();
		}
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		if(Yii::app()->user->checkAccess('Marriage.MarriageCertificate.Create')){
			$model=new MarriageCertificate;

			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);

			if(isset($_POST['MarriageCertificate']))
			{
				$model->attributes=$_POST['MarriageCertificate'];
				if($model->save())
					$this->redirect(array('view','id'=>$model->id));
			}

			$this->render('create',array(
				'model'=>$model,
			));
		} else {
			echo $this->accessDenied();
		}
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		if(Yii::app()->user->checkAccess('Marriage.MarriageCertificate.Update')){
			$model=$this->loadModel($id);

			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);

			if(isset($_POST['MarriageCertificate']))
			{
				$model->attributes=$_POST['MarriageCertificate'];
				if($model->save())
					$this->redirect(array('view','id'=>$model->id));
			}

			$this->render('update',array(
				'model'=>$model,
			));
		} else {
			echo $this->accessDenied();
		}
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->user->checkAccess('Marriage.MarriageCertificate.Delete')){
			if(Yii::app()->request->isPostRequest)
			{
				// we only allow deletion via POST request
				$this->loadModel($id)->delete();

				// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
				if(!isset($_GET['ajax']))
					$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
			}
			else
				throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		} else {
			echo $this->accessDenied();
		}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		if(Yii::app()->user->checkAccess('Marriage.MarriageCertificate.Index')){
			$dataProvider=new CActiveDataProvider('MarriageCertificate');
			$this->render('index',array(
				'dataProvider'=>$dataProvider,
			));
		} else {
			echo $this->accessDenied();
		}
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		if(Yii::app()->user->checkAccess('Marriage.MarriageCertificate.Admin')){
			$model=new MarriageCertificate('search');
			$model->unsetAttributes();  // clear any default values
			if(isset($_GET['MarriageCertificate']))
				$model->attributes=$_GET['MarriageCertificate'];

			$this->render('admin',array(
				'model'=>$model,
			));
		} else {
			echo $this->accessDenied();
		}
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=MarriageCertificate::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='marriage-certificate-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
