<?php
/**
 * Kunena Component
 * @package Kunena.Template.Blue_Eagle
 * @subpackage Common
 *
 * @copyright (C) 2008 - 2015 Kunena Team. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link http://www.kunena.org
 **/
defined ( '_JEXEC' ) or die ();
?>
<!-- Module position: kunena_bottom -->
<?php $this->displayModulePosition( 'kunena_bottom' ); ?>
<?php if (isset($this->rss)) : ?>
<div class="krss-block"><?php echo $this->rss; ?></div>
<?php endif; ?>

