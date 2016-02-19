<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_custom
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

?>



<?php if($params->get('datatype') == 1): /*tutorial*/ ?>
	<?php if(!$params->get('aleatorio',0)): ?>
            <div class="uk-panel uk-panel-box box-status">
        		<span><?=$dataForum; ?></span>
        		<p>Manuais Gratuitos</p>
            </div>
	<?php else:?>
            <div class="uk-panel uk-panel-box box-status">
        		 <span><?=$params->get('aleatorio',0); ?></span>
        		 <p>Manuais Gratuitos</p>
            </div>
	<?php endif;?>
<?php endif; /*fim tutorial*/ ?>

<?php if($params->get('datatype') == 2): /*solutions*/ ?>
	<?php if(!$params->get('aleatorio',0)): ?>
            <div class="uk-panel uk-panel-box box-status">
        		<span><?=$dataForum; ?></span>
        		<p>Soluções</p>
            </div>
	<?php else:?>
            <div class="uk-panel uk-panel-box box-status">
        		<span><?=$params->get('aleatorio',0); ?></span>
        		<p>Soluções</p>
            </div>
	<?php endif;?>
<?php endif; /*fim solutions*/ ?>

<?php if($params->get('datatype') == 3): /*devices*/ ?>
	<?php if(!$params->get('aleatorio',0)): ?>
            <div class="uk-panel uk-panel-box box-status">
        		<span><?=$dataForum; ?></span>
        		<p>Dispositivos</p>
            </div>
	<?php else:?>
            <div class="uk-panel uk-panel-box box-status">
        		<span><?=$params->get('aleatorio',0); ?></span>
        		<p>Dispositivos</p>
            </div>
	<?php endif;?>
<?php endif; /*fim devices*/ ?>

<?php if($params->get('datatype') == 4): /*porcentagem*/ ?>
<?php if(!$params->get('aleatorio',0)): ?>
	<div class="uk-grid">
	      <div class="uk-width-medium-1-2 uk-container-center">
	        <div class="tm-margin-large-top tm-margin-large-bottom">
	            <div data-uk-circle-chart="{maxPercent:<?=$dataForum;?>,size:220,border:15,timerSeconds:4}"></div>
	        </div>
	        <h3 class="tm-primary-title uk-text-white uk-text-center uk-border-bottom"> <a href="index.php?option=com_kunena&view=home&defaultmenu=302&Itemid=313">Posts Atendidos</a> </h3>
	      </div>
	</div>
<?php else:?>
	<div class="uk-width-medium-1-2 uk-container-center">	    
        <div class="tm-margin-large-top tm-margin-large-bottom">
            <div data-uk-circle-chart="{maxPercent:<?=$params->get('aleatorio',0); ?>,size:220,border:15,timerSeconds:4}"></div>
        </div>
	    <h3 class="tm-primary-title uk-text-white uk-text-center uk-border-bottom">4 ale</h3>
	</div>
<?php endif;?>


<?php endif; /*fim porcentagem*/ ?>


