<?php
$this->breadcrumbs=array(
	'Marriage Certificates'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Marriage Certificates', 'url'=>array('index'), 'visible'=>Yii::app()->user->checkAccess("Marriage.MarriageCertificate.Index")),
	array('label'=>'Create Marriage Certificate', 'url'=>array('create'), 'visible'=>Yii::app()->user->checkAccess("Marriage.MarriageCertificate.Create")),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('marriage-certificate-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Marriage Certificates</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'marriage-certificate-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'filterPosition'=>'footer',
	'htmlOptions'=>array('class'=>'grid-view span-22'),
	'columns'=>array(
		array(
			'name' => 'year',
			'value' => 'CHtml::encode($data->year)',
			'filter'=>commonFunc::getYears()
		),
		'dateOfMarriage',array(
			'name' => 'groomName',
			'type' => 'raw',
			'value' => 'CHtml::encode($data->groomName)'
		),
		array(
			'name' => 'groomSurname',
			'type' => 'raw',
			'value' => 'CHtml::encode($data->groomSurname)'
		),
		array(
			'name' => 'brideName',
			'type' => 'raw',
			'value' => 'CHtml::encode($data->brideName)'
		),
		array(
			'name' => 'brideSurname',
			'type' => 'raw',
			'value' => 'CHtml::encode($data->brideSurname)'
		),
		array(
			'class'=>'bootstrap.widgets.BootButtonColumn',
			'template'=>'{view}{update}{print}{delete}',
			'buttons'=>array
			(
				'view' => array
				(
					'visible'=>'Yii::app()->user->checkAccess("Marriage.MarriageCertificate.View")'
				),
				'update' => array
				(
					'visible'=>'Yii::app()->user->checkAccess("Marriage.MarriageCertificate.Update")'
				),
				'delete' => array
				(
					'visible'=>'Yii::app()->user->checkAccess("Marriage.MarriageCertificate.Delete")'
				),
				'print' => array
				(
					'label'=>'Print Baptism Certificate',
					'icon'=>'icon-print',
					'url'=>'Yii::app()->createUrl("Baptism/baptismCertificate/print", array("id"=>$data->id))',
					'visible'=>'Yii::app()->user->checkAccess("Marriage.MarriageCertificate.Print")'
				),
			),
			'htmlOptions'=>array('class'=>'span2'),
		),
	),
)); ?>
