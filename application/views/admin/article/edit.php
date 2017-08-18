<h3><?php echo empty($article->id) ? 'Add a new article' : 'Edit article ' . $article->title?></h3>
<?=validation_errors(); ?>
<?=form_open();?>
    <table class="table">
    <tr>
        <td>Publication date</td>
        <td><?=form_input('pubdate',set_value('pubdate',$article->pubdate),'class="datepicker"')?></td>
    </tr>    
    <tr>
        <td>Title</td>
        <td><?=form_input('title',set_value('title',$article->title))?></td>
    </tr>
    <tr>
    	<td>Tag</td>
    	<td><?=form_input('tag',set_value('tag',$article->tag))?></td>
    </tr>
    <tr>
    	<td>Body</td>
    	<td><?=form_textarea('body',set_value('body',$article->body),'class="tinymce"'); ?></td>
    </tr>
    <tr>
    	<td></td>
    	<td><?=form_submit('submit', 'Save', 'class="btn btn-primary"')?></td>
    </tr>
    </table>
<?=form_close();?>
<script>
    $(function() {
        $('.datepicker').datepicker({format: 'yyyy-mm-dd'});
    });
</script>