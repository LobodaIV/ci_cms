<section>
	<h2>
		Pages
	</h2>
	<?=anchor('admin/page/edit', '<span class="glyphicon glyphicon-plus"></span> Add page')?>
	<table class="table table-stripe">
		<thead>
			<tr>
				<th>Title</th>
				<th>Parent</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php if (count($pages)): foreach($pages as $page):?>
			<tr>
				<td><?php echo anchor('admin/page/edit/' . $page->id, $page->title); ?></td>
				<td><?php echo $page->parent_tag ?></td>
				<td><?php echo btn_edit('admin/page/edit/' . $page->id); ?></td>
				<td><?php echo btn_delete('admin/page/delete/' . $page->id); ?></td>
			</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="3">We coud not find any pages.</td>
				</tr>
			<?php endif; ?>
		</tbody>
	</table>
</section>
