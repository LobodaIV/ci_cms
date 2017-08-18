		<!-- Main content -->
		<div class="col-md-9">
			<div class="container">
				<div class="row">
					<div class="col-md-9">
						<?php if (isset($articles[0])) echo get_snippet($articles[0])?>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">

					<div class="col-md-5">
						<?php if (isset($articles[1])) echo get_snippet($articles[1])?>
					</div>
					<div class="col-md-4">
						<?php if (isset($articles[2])) echo get_snippet($articles[2],30	)?>
					</div>
				</div>
			</div>
		</div>

		<!-- Sidebar -->
		<div class="col-md-3 sidebar">
			<h2 class="">Recent News</h2>
			<hr>

			<?=anchor($news_archive_link, '<span class="glyphicon glyphicon-chevron-right"></span> News Archive');?>
			<ul>
				<?php foreach($articles as $article):?>
					<li>
						<?=anchor(article_link($article), "<h3>$article->title</h3><h2>$article->pubdate</h2>");?>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>