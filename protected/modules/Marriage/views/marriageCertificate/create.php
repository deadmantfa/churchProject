<?php
$this->breadcrumbs=array(
	'Marriage Certificates'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Marriage Certificates', 'url'=>array('index'), 'visible'=>Yii::app()->user->checkAccess("Marriage.MarriageCertificate.Index")),
	array('label'=>'Manage Marriage Certificates', 'url'=>array('admin'), 'visible'=>Yii::app()->user->checkAccess("Marriage.MarriageCertificate.Admin")),
);
?>

<h1>Create Marriage Certificate</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>