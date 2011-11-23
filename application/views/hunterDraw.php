<script>
				$(".closeDraw").click(function()
				{
					$(".draw").hide();
				});
				$('#saveNote').click(function()
						{
					$("#saveNoteInfo").load("<?php echo site_url('hunterMain/saveNote');?>", {"note":$("#note").val(), "recordId":$("#itemId").val()});
						});
		</script>
							<div class="drawHead">
								<a class="closeDraw" href="#">关闭<span>×</span></a>
							</div>
							<div>
								<img src="<?php echo base_url("upload/".$item['talentPhoto']);?>" />
								<?php echo $item['talentName']?>
							</div>
							<div>
								<span class="normalLink">电话:<?php echo $item['talentMobile']?></span>
							</div>
							<hr class="dashboard"/>
							<div class="divVod">
								<a
								href="<?php echo base_url("upload/".$item['talentVod']);?>"
								style="display:block;width:320px;height:240px"
								id="player<?php echo $item['id'];?>"> </a>
								<!-- this will install flowplayer inside previous A- tag. -->
								<?php
								$tmpUrl = base_url("resource/flowplayer/flowplayer-3.2.7.swf");
								$tmpStr = <<<LONG
<script>
flowplayer("player{$item['id']}", "{$tmpUrl}",
{
clip :
{
autoPlay : false,
autoBuffering : true
}
});
</script>
LONG;
								echo $tmpStr;
								?>
							</div>
							<hr class="dashboard"/>
							<input type="hidden" id="itemId" value="<?php echo $item['id']?>" />
							<div class="note">
								<textarea class="note" id="note" name="note"><?php echo $item['note']?></textarea>
							</div>
							<div>
								<button id="saveNote">保存</button>
								<div id="saveNoteInfo"></div>
							</div>
