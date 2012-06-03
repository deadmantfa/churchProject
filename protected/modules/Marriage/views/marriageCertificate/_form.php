<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'marriage-certificate-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<fieldset class="inline">
		<div class="column">
			<?php echo $form->labelEx($model,'year'); ?>
			<?php echo $form->dropDownList($model,'year',commonFunc::getYears(), array('empty'=>'--Select--')); ?>
			<?php echo $form->error($model,'year'); ?>
		</div>
		<div class="column span-1">&nbsp;</div>
		<div class="column">
			<?php echo $form->labelEx($model,'dateOfMarriage'); ?>
			<?php 
				$this->widget('zii.widgets.jui.CJuiDatePicker',
					array(
						'model'=>$model,
						'attribute'=>'dateOfMarriage',
						'value' => $model->dateOfMarriage,
					)
				);
			?>
			<?php echo $form->error($model,'dateOfMarriage'); ?>
		</div>
	</fieldset>
	<br class="clear" />
	<fieldset class="column">
		<div class="row">
			<?php echo $form->labelEx($model,'groomName'); ?>
			<?php echo $form->textField($model,'groomName'); ?>
			<?php echo $form->error($model,'groomName'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'groomSurname'); ?>
			<?php echo $form->textField($model,'groomSurname'); ?>
			<?php echo $form->error($model,'groomSurname'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'groomFatherFullName'); ?>
			<?php echo $form->textField($model,'groomFatherFullName'); ?>
			<?php echo $form->error($model,'groomFatherFullName'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'groomMotherFullName'); ?>
			<?php echo $form->textField($model,'groomMotherFullName'); ?>
			<?php echo $form->error($model,'groomMotherFullName'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'groomDOB'); ?>
			<?php 
				$this->widget('zii.widgets.jui.CJuiDatePicker',
					array(
						'model'=>$model,
						'attribute'=>'groomDOB',
						'value' => $model->groomDOB,
					)
				);
			?>
			<?php echo $form->error($model,'groomDOB'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'groomNationality'); ?>
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
			<?php echo $form->error($model,'groomNationality'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'groomProfession'); ?>
			<?php echo $form->textField($model,'groomProfession'); ?>
			<?php echo $form->error($model,'groomProfession'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'groomStatus'); ?>
			<?php echo $form->dropDownList($model,'groomStatus',commonFunc::getMarriageStatus(), array('empty'=>'--Select--')); ?>
			<?php echo $form->error($model,'groomStatus'); ?>
		</div>
	</fieldset>
	<div class="column span-1">&nbsp;</div>
	<fieldset class="column">
		<div class="row">
			<?php echo $form->labelEx($model,'brideName'); ?>
			<?php echo $form->textField($model,'brideName'); ?>
			<?php echo $form->error($model,'brideName'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'brideSurname'); ?>
			<?php echo $form->textField($model,'brideSurname'); ?>
			<?php echo $form->error($model,'brideSurname'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'brideFatherFullName'); ?>
			<?php echo $form->textField($model,'brideFatherFullName'); ?>
			<?php echo $form->error($model,'brideFatherFullName'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'brideMotherFullName'); ?>
			<?php echo $form->textField($model,'brideMotherFullName'); ?>
			<?php echo $form->error($model,'brideMotherFullName'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'brideDOB'); ?>
			<?php 
				$this->widget('zii.widgets.jui.CJuiDatePicker',
					array(
						'model'=>$model,
						'attribute'=>'brideDOB',
						'value' => $model->brideDOB,
					)
				);
			?>
			<?php echo $form->error($model,'brideDOB'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'brideNationality'); ?>
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
			<?php echo $form->error($model,'brideNationality'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'brideStatus'); ?>
			<?php echo $form->dropDownList($model,'brideStatus',commonFunc::getMarriageStatus(), array('empty'=>'--Select--')); ?>
			<?php echo $form->error($model,'brideStatus'); ?>
		</div>
	</fieldset>
	<div class="column span-1">&nbsp;</div>
	<fieldset class="column">
		<div class="row">
			<?php echo $form->labelEx($model,'firstWitnessFullName'); ?>
			<?php echo $form->textField($model,'firstWitnessFullName'); ?>
			<?php echo $form->error($model,'firstWitnessFullName'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'firstWitnessDomicile'); ?>
			<?php echo $form->textField($model,'firstWitnessDomicile'); ?>
			<?php echo $form->error($model,'firstWitnessDomicile'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'secondWitnessFullName'); ?>
			<?php echo $form->textField($model,'secondWitnessFullName'); ?>
			<?php echo $form->error($model,'secondWitnessFullName'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'secondWitnessDomicile'); ?>
			<?php echo $form->textField($model,'secondWitnessDomicile'); ?>
			<?php echo $form->error($model,'secondWitnessDomicile'); ?>
		</div>
	</fieldset>
	<br class="clear" />
	<fieldset class="inline">
		<div class="row">
			<?php echo $form->labelEx($model,'minister'); ?>
			<?php echo $form->textField($model,'minister'); ?>
			<?php echo $form->error($model,'minister'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'remark'); ?>
			<?php echo $form->textArea($model,'remark',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'remark'); ?>
		</div>
	</fieldset>
	<br class="clear" />
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->