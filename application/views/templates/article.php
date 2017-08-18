		<!-- Main content -->
		<div class="col-md-9">
			<article>
				<h2><?=e($article->title);?></h2>
				<p class="pubdate"><?=e($article->pubdate);?></p>
				<?=$article->body;?>
			</article>
		</div><!-- ./Main content -->

		<!-- Sidebar -->
		<div class="col-md-3 sidebar">
			<h2 class="">Recent News</h2>
			<?=$this->load->view('sidebar')?>
		</div>