<?php
$this->breadcrumbs=array(
	'Marriage Certificates'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Marriage Certificates', 'url'=>array('index'), 'visible'=>Yii::app()->user->checkAccess("Marriage.MarriageCertificate.Index")),
	array('label'=>'Create Marriage Certificate', 'url'=>array('create'), 'visible'=>Yii::app()->user->checkAccess("Marriage.MarriageCertificate.Create")),
	array('label'=>'View Marriage Certificate', 'url'=>array('view', 'id'=>$model->id), 'visible'=>Yii::app()->user->checkAccess("Marriage.MarriageCertificate.View")),
	array('label'=>'Manage Marriage Certificates', 'url'=>array('admin'), 'visible'=>Yii::app()->user->checkAccess("Marriage.MarriageCertificate.Admin")),
);
?>

<h1>Update Marriage Certificate <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>