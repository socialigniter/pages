<div class="widget_<?= $widget_region ?> widget_pages_dropdown_menu" id="widget_<?= $widget_id ?>">
	<ul>	
	<?php foreach ($pages as $nav): if (($nav->type == 'page') && ($nav->details == 'site')): ?>
		<li><a class="nav" href="<?= base_url().'pages/'.$nav->title_url ?>"><?= $nav->title ?></a></li>
		<?php elseif (($nav->type == 'page') && ($nav->details == 'module_page')): ?>
		<li><a class="nav" href="<?= base_url().$nav->title_url ?>"><?= $nav->title ?></a></li>	
		<?php else: ?>
		<li><a class="nav" href="<?= base_url().$nav->title_url ?>"><?= $nav->title ?></a></li>
	<?php endif; endforeach; ?>
	</ul>
</div>