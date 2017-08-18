<?php $this->load->view('page_head'); ?>
<body>

<div class="container">
	<nav class="navbar navbar-default">
	  <div class="container-fluid">

	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <?=anchor(site_url('home'), config_item('site_name'), 'class="navbar-brand"')?>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	     	<?=get_menu($menu);?>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
</div>

<div class="container">
	<div class="row">
		<?=$this->load->view('templates/' . $subview)?>
	</div>
</div>

<?php $this->load->view('page_footer'); ?>
