<?php

class BaptismCertificateController extends RController
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
		if(Yii::app()->user->checkAccess('Baptism.BaptismCertificate.View')){
			$this->render('view',array(
				'model'=>$this->loadModel($id),
			));
		} else {
			$this->accessDenied();
		}
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		if(Yii::app()->user->checkAccess('Baptism.BaptismCertificate.Create')){
			$model=new BaptismCertificate;

			// Uncomment the following line if AJAX validation is needed
			//$this->performAjaxValidation($model);
			if(isset($_POST['BaptismCertificate']))
			{
				$model->attributes=$_POST['BaptismCertificate'];
				$model->remark = $_POST['BaptismCertificate']['remark'];
				$model->domicile2 = $_POST['BaptismCertificate']['domicile2'];
				$model->domicile3 = $_POST['BaptismCertificate']['domicile3'];
				$model->domicile4 = $_POST['BaptismCertificate']['domicile4'];
				if($model->save()){
					$this->redirect(array('view','id'=>$model->id));
					Yii::app()->end();
				}
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
		if(Yii::app()->user->checkAccess('Baptism.BaptismCertificate.Update')){
			$model=$this->loadModel($id);
			if(isset($_POST['BaptismCertificate']))
			{
				$model->attributes=$_POST['BaptismCertificate'];
				$model->remark = $_POST['BaptismCertificate']['remark'];
				$model->domicile2 = $_POST['BaptismCertificate']['domicile2'];
				$model->domicile3 = $_POST['BaptismCertificate']['domicile3'];
				$model->domicile4 = $_POST['BaptismCertificate']['domicile4'];
				if($model->save()){
					if(array_key_exists('jstsav',$_POST)){
						Yii::app()->user->setFlash('success', "<strong>Data saved!</strong>");
						$this->redirect(array('view','id'=>$model->id));
						Yii::app()->end();
					} else if(array_key_exists('savprn',$_POST)){
						Yii::app()->user->setFlash('success', "Saved and Printed");
						$this->redirect(array('print','id'=>$model->id,'redir'=>true));
						Yii::app()->end();
					}
				} 
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
		if(Yii::app()->user->checkAccess('Baptism.BaptismCertificate.Delete')){
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
		if(Yii::app()->user->checkAccess('Baptism.BaptismCertificate.Index')){
			$dataProvider=new CActiveDataProvider('BaptismCertificate');
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
		if(Yii::app()->user->checkAccess('Baptism.BaptismCertificate.Admin')){
			$model=new BaptismCertificate('search');
			$model->unsetAttributes();  // clear any default values
			if(isset($_GET['BaptismCertificate']))
				$model->attributes=$_GET['BaptismCertificate'];

			$this->render('admin',array(
				'model'=>$model,
			));
		} else {
			echo $this->accessDenied();
		}
	}
	
	/**
	 * Manages all models.
	 */
	public function actionPrint($id)
	{
		if(Yii::app()->user->checkAccess('Baptism.BaptismCertificate.Print')){
			$model=$this->loadModel($id);
//			$pdf = new baptismPdf('P','mm',array('format'=>'E4','Rotate'=>-90));
			
			$format['MediaBox']['lly'] = 190;
			$format['MediaBox']['urx'] = 220;
			$format['BleedBox']['llx'] = 0;
//			$format['BleedBox']['lly'] = 190;
//			$format['BleedBox']['urx'] = 220;
//			$format['BleedBox']['ury'] = 0;
//			$format['CropBox']['llx'] = 0;
//			$format['CropBox']['lly'] = 190;
//			$format['CropBox']['urx'] = 220;
//			$format['CropBox']['ury'] = 0;
//			$format['ArtBox']['llx'] = 5;
//			$format['ArtBox']['lly'] = 190;
//			$format['ArtBox']['urx'] = 220;
//			$format['ArtBox']['ury'] = 5;
//			$format['TrimBox']['llx'] = 0;
//			$format['TrimBox']['lly'] = 190;
//			$format['TrimBox']['urx'] = 220;
//			$format['TrimBox']['ury'] = 0;
			$pdf = new baptismPdf('P','mm',$format);
			$pdf->SetMargins(PDF_MARGIN_LEFT, 0, PDF_MARGIN_RIGHT);
			$pdf->SetAutoPageBreak(true, 40);
//			$pdf->setFontSubsetting(false);

			// add a page
			$pdf->AddPage();
			$pdf->printData($model);
			$pdf->Output('Baptism Certificate-'.$model->childName.' '.$model->surname.' - '.  date('d-M-Y').'.pdf', 'D');
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
		$model=BaptismCertificate::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='BaptismCertificate-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
