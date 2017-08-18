<?php $this->load->view('admin/page_head'); ?>
<body style="background: #555;">
<!-- Modal -->
<div id="myModal" class="modal show" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
 
	  <?php $this->load->view($subview) ?>

      <div class="modal-footer">
        &copy; <?=date('Y-m-d H:i:s')?>
      </div>
    </div>

  </div>
</div>
</body>
<?php $this->load->view('admin/page_footer'); ?>