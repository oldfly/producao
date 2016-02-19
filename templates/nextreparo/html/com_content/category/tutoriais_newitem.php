<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Create a shortcut for params.
$params = $this->item->params;
JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
$canEdit = $this->item->params->get('access-edit');
$info    = $params->get('info_block_position', 0);
?>

<div class="uk-grid uk-grid-collapse"  data-uk-grid-match="{target:'.uk-panel'}" >
    <div class="uk-width-3-10">
    			
    		<!--<?php echo JLayoutHelper::render('joomla.content.intro_image', $this->item); ?>-->
    			
    		<?php 
	    		$layout = new JLayoutFile('introimagem_modelos', $basePath = JPATH_ROOT .'/templates/nextreparo/layouts');
				echo $layout->render($this->item);
 			?>
    	
    </div>
    <div class="uk-width-7-10">
    	<div class="uk-panel uk-panel-box">
    		<?php echo JLayoutHelper::render('joomla.content.blog_style_default_item_title', $this->item); ?>
		
	<!--
		<div class="uk-margin uk-text-center">

			<div class="uk-overlay uk-overlay-hover ">
				<?php echo JLayoutHelper::render('joomla.content.intro_image', $this->item); ?>
				<div class="uk-overlay-panel uk-overlay-background uk-overlay-icon uk-overlay-fade"></div>
				<a href="#alignment" class="uk-position-cover"></a>
			</div>

		</div>
	
		<div class="uk-margin">
			<?php if (!$params->get('show_intro')) : ?>
			<?php echo $this->item->event->afterDisplayTitle; ?>
			<?php endif; ?>
			<?php echo $this->item->event->beforeDisplayContent; ?> <?php echo $this->item->introtext; ?>
		</div>
	-->

	<?php if ($params->get('show_readmore') && $this->item->readmore) :
	if ($params->get('access-view')) :
		$link = JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid, $this->item->language));
	else :
		$menu = JFactory::getApplication()->getMenu();
		$active = $menu->getActive();
		$itemId = $active->id;
		$link = new JUri(JRoute::_('index.php?option=com_users&view=login&Itemid=' . $itemId, false));
		$link->setVar('return', base64_encode(JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid, $this->item->language), false)));
	endif; ?>

	<?php echo JLayoutHelper::render('joomla.content.readmore', array('item' => $this->item, 'params' => $params, 'link' => $link)); ?>

<?php endif; ?>

    	</div>
    </div>
</div>


