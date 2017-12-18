<ul class="list iconfont">
<?php foreach((array) $groups['list_item'] as $increment=>$context){ ?>
	<?php
	$indent = NULL;
	$indent = $context['indent'];

	if ( ! empty( $indent ) and $indent !== '0' ) {
		$indent = ' style="margin-left: ' . $indent . 'px;"';	
	} else {
		$indent = NULL;
	}
	?>	
	<li<?php echo $indent; ?>><i class="fa fa-<?php echo $context['icon']; ?>"></i><?php echo $context['list_item']; ?></li>
<?php } ?>
</ul>
