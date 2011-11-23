		<script>
			$(document).ready(function()
			{
				$("#tt2").click(function()
				{
					if($("#dropdown").is(":hidden"))
					{
						$("#dropdown").show();
					}
					else
					{
						$("#dropdown").hide();
					}
				});
				$(".word").click(function()
				{
					$(".draw").hide();
					$(this).siblings(".draw").show();
				});
				$(".closeDraw").click(function()
				{
					$(".draw").hide();
				});
			});

		</script>
			<div class="info span-24 last">
			</div>
			<div class="large span-22">
				<div class="main prepend-1 span-13">
					<?php foreach ($hunterTalentRecord as $item){
					?>
					<div class="content">
						<div class="draw">
							<div class="drawHead">
								<a class="closeDraw" href="#">关闭<span>×</span></a>
							</div>
							<div>
								<img src="<?php echo base_url("upload/".$item['talentPhoto']);?>" />
								<?php echo $item['talentName']?>
							</div>
							<div>
								<span class="normalLink">若满意可点击</span><a id="buy">获取</a><span class="normalLink">获取联系方式,你的积分还有：100分</span>
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
							<div class="note">
								<textarea class="note">备注信息</textarea>
							</div>
						</div>
						<div class="clogo">
							<img src="<?php echo base_url("resource/pic/default_profile_6_normal.png");?>" />
						</div>
						<div class="word">
							<div class="ctitle">
								<span><?php echo $item['talentName']?></span>
							</div>
							<div class="ccontent">
								<span><?php echo $item['note']?></span>
							</div>
							<div class="ctime">
								<?php echo $item['updated']?>
							</div>
						</div>
					</div>
					<?php }?>
					<div class="head">
							<?php echo $this->pagination->create_links();?>
					</div>
				</div>
				<div class="dashboard prepend-1 span-7">
					<div>
						<span class="dashTitle">欢迎您！</span>
						<hr class="dashboard"/>
					</div>
					<div class="dashboard prepend-1 span-7">
						<div>
							<span class="mail">点击左侧列表中的项目显示详细信息</span>
						</div>
					</div>

