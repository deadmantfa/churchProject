<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
	<div class="span2">
		<p>
			<h2>Sidebar 1</h2>
			<?php
				$this->beginWidget('zii.widgets.CPortlet', array(
					'title'=>'Operations',
				));
				$this->widget('zii.widgets.CMenu', array(
					'items'=>$this->menu,
					'htmlOptions'=>array('class'=>'operations'),
				));
				$this->endWidget();
			?>
		</p>
	</div>
	<div id="content" class="span16">
		<?php echo $content; ?>
	</div><!-- content -->
	<div class="span2">
		<p>
			<h2>Sidebar 2</h2>
			Sidebar content here
		</p>
	</div>
</div>
<?php $this->endContent(); ?>
