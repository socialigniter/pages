<form name="content_editor_form" id="content_editor_form" action="<?= $form_url ?>" method="post" enctype="multipart/form-data">

	<div id="content_wide_content">
		<h3>Title</h3>
		<input type="text" name="title" id="title" class="input_full" placeholder="Super Cute Cat Photos" value="<?= $title ?>">
		<span id="title_error"></span>
		<p id="title_slug" class="slug_url"></p>

		<?php if ($details == 'site'): ?>
		<h3>Content</h3>
		<span id="wysiwyg_content_error"></span>		
		<?= $wysiwyg ?>

	    <h3>Category</h3>
	    <p><?= form_dropdown('category_id', $categories, $category_id, 'id="category_id"') ?></p>

	    <h3>Parent Page</h3>
	    <p><?= form_dropdown('content_id', $parent_pages, $parent_id) ?></p>
		<?php endif; ?>

		<h3>Layout</h3>
		<p><?php foreach ($layouts as $layout): ?>
			<a id="layout_<?= $layout ?>" class="layout_picker <?php if ($layout == $layout_selected) echo 'layout_selected'; ?>" href="#"><?= display_nice_file_name($layout) ?></a>
		<?php endforeach; ?>
		<div class="clear"></div>
		</p>

	    <h3>Tags</h3>
	    <p><input name="tags" type="text" id="tags" placeholder="Cats, Cuteness, OMG, Lulz" size="75" /></p>

		<h3>Access</h3>
		<p><?= form_dropdown('access', config_item('access'), $access) ?></p>
	
		<h3>Comments</h3>
		<p><?= form_dropdown('comments_allow', config_item('comments_allow'), $comments_allow) ?></p>
		
		<input type="hidden" name="details" id="details" value="<?= $details ?>">
		<input type="hidden" name="geo_lat" id="geo_lat" value="<?= $geo_lat ?>" />
		<input type="hidden" name="geo_long" id="geo_long" value="<?= $geo_long ?>" />

	</div>
	
	<div id="content_wide_toolbar">
		<?= $content_publisher ?>
	</div>	
	
</form>
<div class="clear"></div>

<script type="text/javascript">

// Elements for Placeholder
var validation_rules = [{
	'selector' 	: '#title', 
	'rule'		: 'require',
	'field'		: 'You need a title for your page', 
	'action'	: 'label'
},{
	'selector' 	: '#wysiwyg_content',
	'rule'		: 'require', 
	'field'		: 'You need some content on this page', 
	'action'	: 'label'
}]

$(document).ready(function()
{
	// Slugify
	$('#title').slugify({url: base_url + 'pages/', slug:'#title_slug', name:'title_url', slugValue:'<?= $title_url ?>'});

	// Autocomplete Tags
	autocomplete("[name=tags]", 'api/tags/all');
	
	
	/* Pick Layout */
	$('.layout_picker').live('click', function(e)
	{
		e.preventDefault();
		var value		= $(this).attr('id');
		var layout 		= value.replace('layout_','');
		$('#layout').val(layout);
		$('.layout_picker').removeClass('layout_selected');
		$(this).addClass('layout_selected');
	});
	

	// Add Category
	$('#category_id').categoryManager(
	{
		action		: 'create',			
		module		: 'pages',
		type		: 'category',
		title		: 'Add Category'
	});

	// Specify API URL
	$.data(document.body, 'api_url', $('#content_editor_form').attr('action'));
	
});
</script>