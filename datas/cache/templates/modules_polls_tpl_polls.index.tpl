a:5:{s:9:"POLL_VIEW";O:11:"Cotpl_block":2:{s:7:" * data";a:0:{}s:6:"blocks";a:3:{i:0;O:10:"Cotpl_data":1:{s:9:" * chunks";a:11:{i:0;s:16:"<div id = "poll_";i:1;O:9:"Cotpl_var":3:{s:7:" * name";s:7:"POLL_ID";s:7:" * keys";N;s:12:" * callbacks";N;}i:2;s:18:"">
	<form action="";i:3;O:9:"Cotpl_var":3:{s:7:" * name";s:13:"POLL_FORM_URL";s:7:" * keys";N;s:12:" * callbacks";N;}i:4;s:30:"" method="post" id="poll_form_";i:5;O:9:"Cotpl_var":3:{s:7:" * name";s:7:"POLL_ID";s:7:" * keys";N;s:12:" * callbacks";N;}i:6;s:24:"" class="ajax post-poll_";i:7;O:9:"Cotpl_var":3:{s:7:" * name";s:7:"POLL_ID";s:7:" * keys";N;s:12:" * callbacks";N;}i:8;s:93:";index.php;e=polls&mode=ajax&poll_theme=index">
		<input type="hidden" name="poll_id" value="";i:9;O:9:"Cotpl_var":3:{s:7:" * name";s:7:"POLL_ID";s:7:" * keys";N;s:12:" * callbacks";N;}i:10;s:11:"" />
		<ul>";}}s:9:"POLLTABLE";O:11:"Cotpl_block":2:{s:7:" * data";a:0:{}s:6:"blocks";a:1:{i:0;O:10:"Cotpl_data":1:{s:9:" * chunks";a:5:{i:0;s:11:"<li><label>";i:1;O:9:"Cotpl_var":3:{s:7:" * name";s:10:"POLL_INPUT";s:7:" * keys";N;s:12:" * callbacks";N;}i:2;s:0:"";i:3;O:9:"Cotpl_var":3:{s:7:" * name";s:12:"POLL_OPTIONS";s:7:" * keys";N;s:12:" * callbacks";N;}i:4;s:13:"</label></li>";}}}}i:1;O:10:"Cotpl_data":1:{s:9:" * chunks";a:5:{i:0;s:33:"<li><button type="submit" title="";i:1;O:9:"Cotpl_var":3:{s:7:" * name";s:3:"PHP";s:7:" * keys";a:2:{i:0;s:1:"L";i:1;s:10:"polls_Vote";}s:12:" * callbacks";N;}i:2;s:2:"">";i:3;O:9:"Cotpl_var":3:{s:7:" * name";s:3:"PHP";s:7:" * keys";a:2:{i:0;s:1:"L";i:1;s:10:"polls_Vote";}s:12:" * callbacks";N;}i:4;s:38:"</button></li>
		</ul>
	</form>
</div>";}}}}s:15:"POLL_VIEW_VOTED";O:11:"Cotpl_block":2:{s:7:" * data";a:0:{}s:6:"blocks";a:3:{i:0;O:10:"Cotpl_data":1:{s:9:" * chunks";a:1:{i:0;s:20:"<table class="main">";}}s:9:"POLLTABLE";O:11:"Cotpl_block":2:{s:7:" * data";a:0:{}s:6:"blocks";a:1:{i:0;O:10:"Cotpl_data":1:{s:9:" * chunks";a:9:{i:0;s:25:"<tr class="small">
		<td>";i:1;O:9:"Cotpl_var":3:{s:7:" * name";s:12:"POLL_OPTIONS";s:7:" * keys";N;s:12:" * callbacks";N;}i:2;s:30:"</td>
		<td class="textright">";i:3;O:9:"Cotpl_var":3:{s:7:" * name";s:8:"POLL_PER";s:7:" * keys";N;s:12:" * callbacks";N;}i:4;s:3:"% (";i:5;O:9:"Cotpl_var":3:{s:7:" * name";s:10:"POLL_COUNT";s:7:" * keys";N;s:12:" * callbacks";N;}i:6;s:105:")</td>
	</tr>
	<tr>
		<td colspan="2">
			<div class="bar_back">
				<div class="bar_front" style="width:";i:7;O:9:"Cotpl_var":3:{s:7:" * name";s:8:"POLL_PER";s:7:" * keys";N;s:12:" * callbacks";N;}i:8;s:35:"%;"></div>
			</div>
		</td>
	</tr>";}}}}i:1;O:10:"Cotpl_data":1:{s:9:" * chunks";a:5:{i:0;s:266:"</table>
<script type="text/javascript">
	function anim(){
		$(".bar_front").each(function(){
			var percentage = $(this).width();
			if (percentage!=""){$(this).width(0).animate({width: percentage}, "slow");}
		});
	}
	anim();
</script>
<p class="small textcenter">";i:1;O:9:"Cotpl_var":3:{s:7:" * name";s:3:"PHP";s:7:" * keys";a:2:{i:0;s:1:"L";i:1;s:5:"Votes";}s:12:" * callbacks";N;}i:2;s:2:": ";i:3;O:9:"Cotpl_var":3:{s:7:" * name";s:11:"POLL_VOTERS";s:7:" * keys";N;s:12:" * callbacks";N;}i:4;s:4:"</p>";}}}}s:18:"POLL_VIEW_DISABLED";O:11:"Cotpl_block":2:{s:7:" * data";a:0:{}s:6:"blocks";a:3:{i:0;O:10:"Cotpl_data":1:{s:9:" * chunks";a:1:{i:0;s:7:"<table>";}}s:9:"POLLTABLE";O:11:"Cotpl_block":2:{s:7:" * data";a:0:{}s:6:"blocks";a:1:{i:0;O:10:"Cotpl_data":1:{s:9:" * chunks";a:3:{i:0;s:11:"<tr>
		<td>";i:1;O:9:"Cotpl_var":3:{s:7:" * name";s:12:"POLL_OPTIONS";s:7:" * keys";N;s:12:" * callbacks";N;}i:2;s:12:"</td>
	</tr>";}}}}i:1;O:10:"Cotpl_data":1:{s:9:" * chunks";a:3:{i:0;s:11:"<tr>
		<td>";i:1;O:9:"Cotpl_var":3:{s:7:" * name";s:3:"PHP";s:7:" * keys";a:2:{i:0;s:1:"L";i:1;s:18:"rat_registeredonly";}s:12:" * callbacks";N;}i:2;s:21:"</td>
	</tr>
</table>";}}}}s:16:"POLL_VIEW_LOCKED";O:11:"Cotpl_block":2:{s:7:" * data";a:0:{}s:6:"blocks";a:3:{i:0;O:10:"Cotpl_data":1:{s:9:" * chunks";a:1:{i:0;s:7:"<table>";}}s:9:"POLLTABLE";O:11:"Cotpl_block":2:{s:7:" * data";a:0:{}s:6:"blocks";a:1:{i:0;O:10:"Cotpl_data":1:{s:9:" * chunks";a:9:{i:0;s:11:"<tr>
		<td>";i:1;O:9:"Cotpl_var":3:{s:7:" * name";s:12:"POLL_OPTIONS";s:7:" * keys";N;s:12:" * callbacks";N;}i:2;s:30:"</td>
		<td class="textright">";i:3;O:9:"Cotpl_var":3:{s:7:" * name";s:8:"POLL_PER";s:7:" * keys";N;s:12:" * callbacks";N;}i:4;s:3:"% (";i:5;O:9:"Cotpl_var":3:{s:7:" * name";s:10:"POLL_COUNT";s:7:" * keys";N;s:12:" * callbacks";N;}i:6;s:123:")</td>
	</tr>
	<tr>
		<td colspan="2" class="textright">
			<div class="bar_back">
				<div class="bar_front" style="width:";i:7;O:9:"Cotpl_var":3:{s:7:" * name";s:8:"POLL_PER";s:7:" * keys";N;s:12:" * callbacks";N;}i:8;s:35:"%;"></div>
			</div>
		</td>
	</tr>";}}}}i:1;O:10:"Cotpl_data":1:{s:9:" * chunks";a:9:{i:0;s:12:"</table>
<p>";i:1;O:9:"Cotpl_var":3:{s:7:" * name";s:3:"PHP";s:7:" * keys";a:2:{i:0;s:1:"L";i:1;s:4:"Date";}s:12:" * callbacks";N;}i:2;s:1:" ";i:3;O:9:"Cotpl_var":3:{s:7:" * name";s:16:"POLL_SINCE_SHORT";s:7:" * keys";N;s:12:" * callbacks";N;}i:4;s:1:" ";i:5;O:9:"Cotpl_var":3:{s:7:" * name";s:3:"PHP";s:7:" * keys";a:2:{i:0;s:1:"L";i:1;s:5:"Votes";}s:12:" * callbacks";N;}i:6;s:1:" ";i:7;O:9:"Cotpl_var":3:{s:7:" * name";s:11:"POLL_VOTERS";s:7:" * keys";N;s:12:" * callbacks";N;}i:8;s:5:" </p>";}}}}s:10:"INDEXPOLLS";O:11:"Cotpl_block":2:{s:7:" * data";a:0:{}s:6:"blocks";a:3:{s:4:"POLL";O:11:"Cotpl_block":2:{s:7:" * data";a:0:{}s:6:"blocks";a:1:{i:0;O:10:"Cotpl_data":1:{s:9:" * chunks";a:7:{i:0;s:24:"<a class="strong" href="";i:1;O:9:"Cotpl_var":3:{s:7:" * name";s:10:"IPOLLS_URL";s:7:" * keys";N;s:12:" * callbacks";N;}i:2;s:2:"">";i:3;O:9:"Cotpl_var":3:{s:7:" * name";s:12:"IPOLLS_TITLE";s:7:" * keys";N;s:12:" * callbacks";N;}i:4;s:6:"</a>
	";i:5;O:9:"Cotpl_var":3:{s:7:" * name";s:11:"IPOLLS_FORM";s:7:" * keys";N;s:12:" * callbacks";N;}i:6;s:0:"";}}}}s:5:"ERROR";O:11:"Cotpl_block":2:{s:7:" * data";a:0:{}s:6:"blocks";a:1:{i:0;O:10:"Cotpl_data":1:{s:9:" * chunks";a:3:{i:0;s:35:"<p class="small strong textcenter">";i:1;O:9:"Cotpl_var":3:{s:7:" * name";s:12:"IPOLLS_ERROR";s:7:" * keys";N;s:12:" * callbacks";N;}i:2;s:4:"</p>";}}}}i:0;O:10:"Cotpl_data":1:{s:9:" * chunks";a:5:{i:0;s:37:"<p class="small textcenter"><a href="";i:1;O:9:"Cotpl_var":3:{s:7:" * name";s:10:"IPOLLS_ALL";s:7:" * keys";N;s:12:" * callbacks";N;}i:2;s:2:"">";i:3;O:9:"Cotpl_var":3:{s:7:" * name";s:3:"PHP";s:7:" * keys";a:2:{i:0;s:1:"L";i:1;s:18:"polls_viewarchives";}s:12:" * callbacks";N;}i:4;s:8:"</a></p>";}}}}}