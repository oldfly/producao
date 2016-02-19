<?php
/**
* @package   Warp Theme Framework
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

// get application
$app = JFactory::getApplication();

// get item id
$itemid = intval($params->get('set_itemid', 0));

?>
<style type="text/css">
	.uk-box-search-home{
		
	}
	.uk-field-search-home{ width: 75%; font-size: 16px !important; text-align: left; padding: 10px !important; line-height: 20px !important; height: 20px !important}
	.uk-button-home{ position: relative;right:5px; bottom: 6px}
	
	/* Tablet and bigger */
@media (min-width: 768px) {
  .uk-box-search-home{ 
  	position: relative; 
  
  }
 
}
/* Desktop and bigger */
@media (min-width: 960px) {
  
 
}
/* Large screen and bigger */
@media (min-width: 1220px) {

  
}
@media (max-width: 480px) {
 

}


</style>


<div class="uk-box-search-home  uk-container-center uk-width-large-2-3 uk-width-medium-1-2"  data-uk-margin>
	<form id="search-<?php echo $module->id; ?>" class="uk-search-home" action="<?php echo JRoute::_('index.php'); ?>" method="post" role="search" <?php if($module->position !== 'offcanvas'):?>data-uk-search="{'source': '<?php echo JRoute::_("index.php?option=com_search&tmpl=raw&type=json&ordering=&searchphrase=all");?>', 'param': 'searchword', 'msgResultsHeader': '<?php echo JText::_("TPL_WARP_SEARCH_RESULTS"); ?>', 'msgMoreResults': '<?php echo JText::_("TPL_WARP_SEARCH_MORE"); ?>', 'msgNoResults': '<?php echo JText::_("TPL_WARP_SEARCH_NO_RESULTS"); ?>', flipDropdown: 1}"<?php endif;?>>
		<input class="uk-field-search-home" type="search" name="searchword" placeholder="<?php echo JText::_('TPL_WARP_SEARCH'); ?>">
		<span class="uk-button uk-button-home uk-button">Buscar | <i class="uk-icon-search"></i></span>
		<input type="hidden" name="task" value="search">
		<input type="hidden" name="option" value="com_search">
		<input type="hidden" name="Itemid" value="<?php echo $itemid > 0 ? $itemid : $app->input->getInt('Itemid'); ?>">
	</form>
</div>