<?php $this->load->view('admin/page_head'); ?>
  <body>
    <nav class="navbar navbar-static-top navbar-inverse">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?=site_url('/admin/dashboard')?>"><?=$meta_title?></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><?=anchor('admin/page', 'pages')?></li>
            <li><?=anchor('admin/page/order', 'order pages')?></li>
            <li><?=anchor('admin/article', 'news articles')?></li>
            <li><?=anchor('admin/user', 'users')?></li>
          </ul>
        </div><!-- /.navbar-collapse -->

        </div><!-- /.container -->
    </nav>

    <div class="container">
        
        <div class="row">
          <!-- Main content -->
          <div class="col-md-9">
              <?php $this->load->view($subview); ?>
          </div><!--end of col-md-9 -->

          <!-- Sidebar -->
          <div class="col-md-3">
            <section>
              <?=mailto($this->session->userdata('email'),
              '<span class="glyphicon glyphicon-user"></span>' . $this->session->userdata('email'))?><br>
              <?=anchor('admin/user/logout', 
              '<span class="glyphicon glyphicon-off"></span> logout')?><br>
            </section>
          </div>

        </div><!-- /row -->
    </div><!-- /container -->

<?php $this->load->view('admin/page_footer'); ?>