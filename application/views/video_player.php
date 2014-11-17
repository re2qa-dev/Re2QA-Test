<?php
echo 'play video now';

echo '<script language="javascript" src="'.base_url().'js/jquery.js"></script>
<script type="text/javascript" src="'.base_url().'jwplayer/jwplayer.js"></script>
				<div id="myElement">Loading the player...</div>';

echo "<script type='text/javascript'>
		jwplayer('myElement').setup({
			'flashplayer': 'jwplayer/jwplayer.flash.swf',
			'file': 'uploads/gallery/".$file_name."',
			'width': '520',
			'height': '340',
			'margin': '0 auto'
		});
		</script>";