<section>
	<h2>
		Articles
	</h2>
	<?=anchor('admin/article/edit', '<span class="glyphicon glyphicon-plus"></span> Add article')?>
	<table class="table table-stripe">
		<thead>
			<tr>
				<th>Title</th>
				<th>Pubdate</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php if (count($articles)): foreach($articles as $article):?>
			<tr>
				<td><?php echo anchor('admin/article/edit/' . $article->id, $article->title); ?></td>
				<td><?php echo $article->pubdate ?></td>
				<td><?php echo btn_edit('admin/article/edit/' . $article->id); ?></td>
				<td><?php echo btn_delete('admin/article/delete/' . $article->id); ?></td>
			</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="3">We coud not find any articles.</td>
				</tr>
			<?php endif; ?>
		</tbody>
	</table>
</section>
