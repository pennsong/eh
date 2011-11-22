<div class="span-24 last top">
	<?php
	$log_in = FALSE;
	$tmpStr = "";
	if ($this->session->userdata('userId') && $this->session->userdata('type'))
	{
		if ($this->session->userdata('type') == 'hunter')
		{
			$this->db->where('id', $this->session->userdata('userId'));
			$this->db->from('hunter');
			if ($this->db->count_all_results() > 0)
			{
				$log_in = TRUE;
			}
		}
		else if ($this->session->userdata('type') == 'company')
		{
			$this->db->where('id', $this->session->userdata('userId'));
			$this->db->from('company');
			if ($this->db->count_all_results() > 0)
			{
				$log_in = TRUE;
			}
		}
	}
?>
	<div class="prepend-1 span-4"><img
		src="<?php echo base_url("resource/pic/a.png");?>" />
	</div>
	<div class="prepend-12 span-5 last" id="div_profile">
		<?php if ($log_in) {
		?>
		<a id="tt2" href="#"><img id="img_new"
		src="<?php echo base_url("resource/pic/default_profile_6_normal.png");?>" /><span
		id="test"><?php echo $this->session->userdata('userAccount')
			?></span></a>
		<span id="bar"></span> <a id="logout" href="<?php echo base_url("index.php/login/logout") ?>">退出</a>
		<?php }?>
	</div>
</div>
<!-- end #header -->