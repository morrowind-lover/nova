<?php $string = random_string('alnum', 8);?>

<script type="text/javascript" src="<?php echo base_url() . APPFOLDER;?>/assets/js/jquery.qtip.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		$('table.zebra tbody > tr:nth-child(odd)').addClass('alt');
		
		$("a[rel*=facebox]").click(function(){
			var id = $(this).attr('myID');
			var action = $(this).attr('myAction');
			
			if (action == 'delete')
				var location = '<?php echo site_url('ajax/del_role');?>/' + id + '/<?php echo $string;?>';
			
			if (action == 'view')
				var location = '<?php echo site_url('ajax/info_users_with_role');?>/' + id + '/<?php echo $string;?>';
				
			if (action == 'duplicate')
				var location = '<?php echo site_url('ajax/duplicate_role/'. $string);?>';
			
			$.facebox(function(){
				$.get(location, function(data){
					$.facebox(data);
				});
			});
			
			return false;
		});
		
		$('a[rel=tooltip]').each(function(){
			$(this).qtip({
				content: $(this).attr('tooltip'),
				position: {
					corner: {
						tooltip: 'bottomLeft',
						target: 'topRight'
					}
				},
				style: { 
					border: {
						width: 1,
						radius: 4,
					},
					name: 'dark',
					fontSize: '90%'
				}
			});
		});
	});
</script>