<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<fieldset class="column">
		<div class="row">
			<?php echo $form->label($model,'groomFatherFullName'); ?>
			<?php echo $form->textField($model,'groomFatherFullName'); ?>
		</div>

		<div class="row">
			<?php echo $form->label($model,'groomMotherFullName'); ?>
			<?php echo $form->textField($model,'groomMotherFullName'); ?>
		</div>

		<div class="row">
			<?php echo $form->label($model,'groomDOB'); ?>
			<?php 
				$this->widget('zii.widgets.jui.CJuiDatePicker',
					array(
						'model'=>$model,
						'attribute'=>'groomDOB',
						'value' => $model->groomDOB,
					)
				);
			?>
		</div>

		<div class="row">
			<?php echo $form->label($model,'groomNationality'); ?>
			<?php 
				$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
					'name'=>'groomNationality',
					'source'=>$this->createUrl('/Common/countriesAutoComplete'),
					// additional javascript options for the autocomplete plugin
					'options'=>array(
							'showAnim'=>'fold',
							'select'=>'js:function(event, ui){
											var data = ui.item.value.split(" - ");
											jQuery("#groomNationality").val(data[1]);
											jQuery("#MarriageCertificate_groomNationality").val(data[0]);
											return false;
										}'
					),

				));
			?>
			<?php echo $form->hiddenField($model,'groomNationality'); ?>
		</div>

		<div class="row">
			<?php echo $form->label($model,'groomProfession'); ?>
			<?php echo $form->textField($model,'groomProfession'); ?>
		</div>

		<div class="row">
			<?php echo $form->label($model,'groomStatus'); ?>
			<?php echo $form->dropDownList($model,'groomStatus',commonFunc::getMarriageStatus(), array('empty'=>'--Select--')); ?>
		</div>
	</fieldset>
	<div class="column span-1">&nbsp;</div>
	<fieldset class="column">
		<div class="row">
			<?php echo $form->label($model,'brideFatherFullName'); ?>
			<?php echo $form->textField($model,'brideFatherFullName'); ?>
		</div>

		<div class="row">
			<?php echo $form->label($model,'brideMotherFullName'); ?>
			<?php echo $form->textField($model,'brideMotherFullName'); ?>
		</div>

		<div class="row">
			<?php echo $form->label($model,'brideDOB'); ?>
			<?php 
				$this->widget('zii.widgets.jui.CJuiDatePicker',
					array(
						'model'=>$model,
						'attribute'=>'brideDOB',
						'value' => $model->brideDOB,
					)
				);
			?>
		</div>

		<div class="row">
			<?php echo $form->label($model,'brideNationality'); ?>
			<?php 
				$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
					'name'=>'brideNationality',
					'source'=>$this->createUrl('/Common/countriesAutoComplete'),
					// additional javascript options for the autocomplete plugin
					'options'=>array(
							'showAnim'=>'fold',
							'select'=>'js:function(event, ui){
											var data = ui.item.value.split(" - ");
											jQuery("#brideNationality").val(data[1]);
											jQuery("#MarriageCertificate_brideNationality").val(data[0]);
											return false;
										}'
					),

				));
			?>
			<?php echo $form->hiddenField($model,'brideNationality'); ?>
		</div>

		<div class="row">
			<?php echo $form->label($model,'brideStatus'); ?>
			<?php echo $form->dropDownList($model,'brideStatus',commonFunc::getMarriageStatus(), array('empty'=>'--Select--')); ?>
		</div>
	</fieldset>
	<div class="column span-1">&nbsp;</div>
	<fieldset class="column">
		<div class="row">
			<?php echo $form->label($model,'firstWitnessFullName'); ?>
			<?php echo $form->textField($model,'firstWitnessFullName'); ?>
		</div>

		<div class="row">
			<?php echo $form->label($model,'firstWitnessDomicile'); ?>
			<?php echo $form->textField($model,'firstWitnessDomicile'); ?>
		</div>

		<div class="row">
			<?php echo $form->label($model,'secondWitnessFullName'); ?>
			<?php echo $form->textField($model,'secondWitnessFullName'); ?>
		</div>

		<div class="row">
			<?php echo $form->label($model,'secondWitnessDomicile'); ?>
			<?php echo $form->textField($model,'secondWitnessDomicile'); ?>
		</div>
	</fieldset>
	<br class="clear" />
	<fieldset class="inline">
		<div class="row">
			<?php echo $form->label($model,'minister'); ?>
			<?php echo $form->textField($model,'minister'); ?>
		</div>

		<div class="row">
			<?php echo $form->label($model,'remark'); ?>
			<?php echo $form->textArea($model,'remark',array('rows'=>6, 'cols'=>50)); ?>
		</div>
	</fieldset>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->