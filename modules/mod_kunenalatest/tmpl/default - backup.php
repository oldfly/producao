<?php
/**
 * Kunena Latest Module
 * @package Kunena.mod_kunenalatest
 *
 * @copyright (C) 2008 - 2015 Kunena Team. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link http://www.kunena.org
 **/
defined ( '_JEXEC' ) or die ();
?>

<!-- <div class="<?php echo $this->params->get ( 'moduleclass_sfx' )?> klatest <?php echo $this->params->get ( 'sh_moduleshowtype' )?>">
	<ul class="klatest-items">
		<?php if (empty ( $this->topics )) : ?>
			<li class="klatest-item"><?php echo JText::_('MOD_KUNENALATEST_NO_MESSAGE') ?></li>
		<?php else : ?>
			<?php $this->displayRows (); ?>
		<?php endif; ?>
	</ul>
	<?php if ($this->topics && $this->params->get ( 'sh_morelink' )): ?>
	<p class="klatest-more"><?php echo JHtml::_('kunenaforum.link', $this->params->get ( 'moreuri' ), JText::_ ( 'MOD_KUNENALATEST_MORE_LINK' ) ); ?></p>
	<?php endif; ?>
</div> -->

<div data-uk-grid-margin="" class="uk-grid">
    <div class="uk-width-large-1-3 uk-width-medium-1-2"><div class="uk-panel uk-panel-box uk-panel-box-primary"><code>.uk-width-medium-1-2</code> <code>.uk-width-large-1-3</code></div></div>
    <div class="uk-width-large-1-3 uk-width-medium-1-2"><div class="uk-panel uk-panel-box"><code>.uk-hidden-medium</code> <code>.uk-width-large-1-3</code></div></div>
    <div class="uk-width-large-1-3 uk-width-medium-1-2"><div class="uk-panel uk-panel-box uk-panel-box-primary"><code>.uk-width-medium-1-2</code> <code>.uk-width-large-1-3</code></div></div>
</div>