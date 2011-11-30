
							<div class="drawHead">
								<a class="closeDraw" href="#">关闭<span>×</span></a>
							</div>
							<div>
								<img src="<?php echo base_url("upload/".$item['talentPhoto']);?>" />
								<?php echo $item['talentName']?>
							</div>
							<div>
							<?php if ($bought) {?>
								<span id="talentContact" class="normalLink">电话:<?php echo $item['talentMobile']?></span>
							<?php } else {?>
								<span id="talentContact" class="normalLink">若满意可点击<a id="buy">获取</a><span class="normalLink">获取联系方式,你的积分还有：<?php echo $point?>分</span></span>
							<?php }?>
							</div>
							<hr class="dashboard"/>
							<div class="divVod">
								<a
								href="<?php echo base_url("upload/".$item['talentVod']);?>"
								style="display:block;width:320px;height:240px"
								id="player"> </a>
								<!-- this will install flowplayer inside previous A- tag. -->

							</div>
							<hr class="dashboard"/>
							<input type="hidden" id="itemId" value="<?php echo $item['id']?>" />
							<div class="note">
								<textarea class="note" id="note" name="note" readonly><?php echo $item['note']?></textarea>
							</div>
<script>


$(document).ready(function() {

flowplayer("<?php echo "player" ?>", "<?php echo base_url("resource/flowplayer/flowplayer-3.2.7.swf");?>",
{
clip :
{
autoPlay : false,
autoBuffering : true
}
});
}
);

				$(".closeDraw").click(function()
				{
					$(".draw").html("");
					$(".draw").hide();
				});
				$('#buy').click(function()
						{
					$("#talentContact").load("<?php echo site_url('companyMain/buyRecord');?>", {"recordId":$("#itemId").val()});
						});
		</script>