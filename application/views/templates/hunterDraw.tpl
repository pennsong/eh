<div class="drawHead">
	<a class="closeDraw" href="#">关闭<span>×</span></a>
</div>
<div>
	<img style="display:block;width:320px;height:240px" src="{url}upload/{$item['talentPhoto']}" />
	{$item['talentName']}
</div>
<div>
	<span class="normalLink">电话:{$item['talentMobile']}</span>
</div>
<hr class="dashboard"/>
<div class="divVod">
	<a
	href="{url}upload/{$item['talentVod']}"
	style="display:block;width:320px;height:240px"
	id="player"> </a>
	<!-- this will install flowplayer inside previous A- tag. -->
</div>
<hr class="dashboard"/>
<input type="hidden" id="itemId" value="{$item['id']}" />
<div class="note">
	<textarea class="note" id="note" name="note">{$item['note']}</textarea>
</div>
<div>
	<button id="saveNote">
		保存
	</button>
	<div id="saveNoteInfo"></div>
</div>
<script>
	$(document).ready(function() {
		flowplayer("player", "{url}resource/flowplayer/flowplayer-3.2.7.swf", {
			clip : {
				autoPlay : false,
				autoBuffering : true
			}
		});
	});
	$(".closeDraw").click(function() {
		$(".draw").html("");
		$(".draw").hide();
	});
	$('#saveNote').click(function() {
		$("#saveNoteInfo").load("{url type='site' url='hunterMain/saveNote'}", {
			"note" : $("#note").val(),
			"recordId" : $("#itemId").val()
		});
	});

</script>