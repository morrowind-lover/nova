<script type="text/javascript" src="<?php echo url::base().APPFOLDER.'/assets/js/jquery.countdown.js';?>"></script>

<script type="text/javascript">
	$(document).ready(function(){
		$('input:first').focus();
		
		$('#countdown').countDown({
			startNumber: 5,
			startFontSize: '1em',
			endFontSize: '1em'
		});
	});
</script>