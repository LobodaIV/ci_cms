		<!-- Main content -->
		<div class="col-md-9">

			<div class="container">
				<div class="row">
<?php if (count($articles)): foreach($articles as $article): ?>
				<article class="col-md-9">
					<?php echo get_snippet($article)?>
				</article>
<?php endforeach; endif;?>
				</div>
			</div>

<?php if ($pagination): ?>
			<section class="pagination"><?=$pagination;?></section>
<?php endif; ?>
		</div><!-- ./Main content -->

		<!-- Sidebar -->
		<div class="col-md-3 sidebar">
			<h2 class="">Recent News</h2>
			<?=$this->load->view('sidebar')?>
		</div>