<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Note. It is important to remove spaces between elements.
?>

<div id="ktop">
	<div id="ktopmenu">
		<div id="ktab">
			<ul class="menu">
				<?php foreach ($list as $i => &$item): ?>
				<?php 
						$flink = $item->flink;
						$flink = JFilterOutput::ampReplace(htmlspecialchars($flink));
				?>
					<li class="<?=(($item->id == $active_id) OR ($item->type == 'alias' AND $item->params->get('aliasoptions') == $active_id))?'active':'';?>"><a href="<?=$flink;?>"><span><?=$item->title;?></span></a></li>
				<?php endforeach;?> 
				
			</ul>
		</div>
		</div>
		<span class="ktoggler fltrt"><a class="ktoggler close" title="Collapse" rel="kprofilebox"></a></span>
</div>






