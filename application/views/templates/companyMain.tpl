<script>
	$(document).ready(function() {
		$("#tt2").click(function() {
			if($("#dropdown").is(":hidden")) {
				$("#dropdown").show();
			} else {
				$("#dropdown").hide();
			}
		});
		$(".word").click(function() {
			$(".draw").html("");
			$(".draw").hide();
			$(".draw").load("{cw_ci_site_url path='companyDraw/index'}/" + $("#contentItemId", this).val(), function(responseText, textStatus, XMLHttpRequest) {
				if(textStatus == 'success') {
					$(".draw").show()
				}
			});
		});
	});

</script>
<div class="info span-24 last"></div>
<div class="large span-22">
	<div class="main prepend-1 span-13">
		<div class="pdraw">
			<div class="draw"></div>
		</div>
		<!--{foreach $hunterTalentRecord as $item}-->
		<div class="content">
			<div class="clogo">
				<img src="{cw_ci_base_url}resource/pic/default_profile_6_normal.png" />
			</div>
			<div class="word">
				<input type="hidden" id="contentItemId" value="{$item['id']}"/>
				<div class="ctitle">
					{$item['talentName']}
				</div>
				<div class="ccontent">
					{$item['note']}
				</div>
				<div class="ctime">
					{$item['updated']}
				</div>
			</div>
		</div>
		<!--{/foreach}-->
		<div class="head">
			{cw_ci_create_links}
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
	</div>
</div>
