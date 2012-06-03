<?php
$this->breadcrumbs=array(
	'Baptism Certificates'=>array('index'),
	$model->childName.' '.$model->surname=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Baptism Certificate', 'url'=>array('index'), 'visible'=>Yii::app()->user->checkAccess("Baptism.BaptismCertificate.Index")),
	array('label'=>'Create Baptism Certificate', 'url'=>array('create'), 'visible'=>Yii::app()->user->checkAccess("Baptism.BaptismCertificate.Create")),
	array('label'=>'View Baptism Certificate', 'url'=>array('view', 'id'=>$model->id), 'visible'=>Yii::app()->user->checkAccess("Baptism.BaptismCertificate.View")),
	array('label'=>'Manage Baptism Certificate', 'url'=>array('admin'), 'visible'=>Yii::app()->user->checkAccess("Baptism.BaptismCertificate.Admin")),
);
?>

<h1>Update Baptism Certificate #<?php echo $model->id.' - '.$model->childName.' '.$model->surname; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>