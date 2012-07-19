<script type="text/javascript">
	$(document).on('change', '#baseDrop', function(){

		// get the value from the dropdown
		var rank = $('#baseDrop option:selected').text();

		// put the new image in the div
		$('#basePreview').html('').append('<img src="<?php echo Uri::base(false);?>app/assets/common/<?php echo $genre;?>/ranks/<?php echo $rank;?>/base/' + rank +'">');
	});
</script>

<form method="post">
	<br>
	<div class="control-group">
		<label class="control-label"><?php echo lang('name', 1);?></label>
		<div class="controls">
			<input type="text" name="name" class="span4">
		</div>
	</div>

	<div class="control-group">
		<label class="control-label"><?php echo lang('new base image', 2);?></label>
		<div class="controls">
			<?php echo Form::select('base', 0, $bases, array('class' => 'span4', 'id' => 'baseDrop'));?>
			<div id="basePreview"></div>
		</div>
	</div>

	<div class="form-actions">
		<button class="btn btn-primary"><?php echo lang('action.submit', 1);?></button>
		<?php echo Form::hidden('id', $id);?>
		<?php echo Form::hidden('action', 'duplicate');?>
	</div>
</form>