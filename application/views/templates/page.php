		<!-- Main content -->
		<div class="col-md-9">
			<article>
				<h2><?=e($page->title)?></h2>
				<?=$page->body;?>
			</article>
		</div>
		<!-- Sidebar -->
		<div class="col-md-3 sidebar">
			<h2 class="">Recent News</h2>
			<?=$this->load->view('sidebar')?>
		</div>