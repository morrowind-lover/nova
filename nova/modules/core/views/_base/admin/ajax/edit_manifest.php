<?php echo text_output($header, 'h2');?>

<?php echo form_open('site/manifests/edit');?>
	<table class="table100">
		<tbody>
			<tr>
				<td class="cell-label"><?php echo $label['name'];?></td>
				<td class="cell-spacer"></td>
				<td><?php echo form_input($inputs['name']);?></td>
			</tr>
			<tr>
				<td class="cell-label"><?php echo $label['order'];?></td>
				<td class="cell-spacer"></td>
				<td><?php echo form_input($inputs['order']);?></td>
			</tr>
			<tr>
				<td class="cell-label"><?php echo $label['display'];?></td>
				<td class="cell-spacer"></td>
				<td>
					<?php echo form_radio($inputs['display_y']) .' '. form_label($label['on'], 'display_y');?>
					<?php echo form_radio($inputs['display_n']) .' '. form_label($label['off'], 'display_n');?>
				</td>
			</tr>
			<tr>
				<td class="cell-label"><?php echo $label['default'];?></td>
				<td class="cell-spacer"></td>
				<td>
					<?php echo form_radio($inputs['default_y']) .' '. form_label($label['yes'], 'default_y');?>
					<?php echo form_radio($inputs['default_n']) .' '. form_label($label['no'], 'default_n');?>
				</td>
			</tr>
			<tr>
				<td class="cell-label"><?php echo $label['desc'];?></td>
				<td class="cell-spacer"></td>
				<td><?php echo form_textarea($inputs['desc']);?></td>
			</tr>
			<tr>
				<td class="cell-label"><?php echo $label['header'];?></td>
				<td class="cell-spacer"></td>
				<td><?php echo form_textarea($inputs['header']);?></td>
			</tr>
		</tbody>
	</table>
	<?php echo form_hidden('id', $id);?>