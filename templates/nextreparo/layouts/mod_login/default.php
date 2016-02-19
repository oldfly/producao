<?php
/**
* @package   yoo_gusto
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

// no direct access
defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');

?>

<form class="uk-form" action="<?php echo JRoute::_('index.php', true, $params->get('usesecure')); ?>" method="post">

    <?php if ($params->get('pretext')) : ?>
    <div class="uk-form-row">
        <?php echo $params->get('pretext'); ?>
    </div>
    <?php endif; ?>

    <div class="uk-form-row uk-flex uk-flex-middle" data-uk-margin>
        <input class="uk-form-small uk-margin-small-right" type="text" name="username" size="18" placeholder="<?php echo JText::_('MOD_LOGIN_VALUE_USERNAME') ?>" autocomplete="off">

        <input class="uk-form-small uk-margin-small-right" type="password" name="password" size="18" placeholder="<?php echo JText::_('JGLOBAL_PASSWORD') ?>" autocomplete="off">

        <?php if (count($twofactormethods) > 1): ?>
        <input class="uk-form-small uk-margin-small-right" type="text" name="secretkey" tabindex="0" size="18" placeholder="<?php echo JText::_('JGLOBAL_SECRETKEY') ?>" />
        <?php endif; ?>

        <button class="uk-button uk-button-small uk-button-primary uk-margin-small-right" value="<?php echo JText::_('JLOGIN') ?>" name="Submit" type="submit"><?php echo JText::_('JLOGIN') ?></button>

        <?php if (JPluginHelper::isEnabled('system', 'remember')) : ?>
        <div class="uk-margin-small-left">
            <?php $number = rand(); ?>
            <input id="modlgn-remember-<?php echo $number; ?>" class="uk-margin-small-right" type="checkbox" name="remember" value="yes" checked>
            <label for="modlgn-remember-<?php echo $number; ?>" class="tm-text-small"><?php echo JText::_('MOD_LOGIN_REMEMBER_ME') ?></label>
        </div>
        <?php endif; ?>

    </div>

    <ul class="uk-list uk-margin-bottom-remove" style="display: none;">
        <li><a href="<?php echo JRoute::_('index.php?option=com_users&view=reset'); ?>"><?php echo JText::_('MOD_LOGIN_FORGOT_YOUR_PASSWORD'); ?></a></li>
        <li><a href="<?php echo JRoute::_('index.php?option=com_users&view=remind'); ?>"><?php echo JText::_('MOD_LOGIN_FORGOT_YOUR_USERNAME'); ?></a></li>
        <?php $usersConfig = JComponentHelper::getParams('com_users'); ?>
        <?php if ($usersConfig->get('allowUserRegistration')) : ?>
        <li><a href="<?php echo JRoute::_('index.php?option=com_users&view=registration'); ?>"><?php echo JText::_('MOD_LOGIN_REGISTER'); ?></a></li>
        <?php endif; ?>
    </ul>

    <?php if($params->get('posttext')) : ?>
    <div class="uk-form-row">
        <?php echo $params->get('posttext'); ?>
    </div>
    <?php endif; ?>

    <input type="hidden" name="option" value="com_users">
    <input type="hidden" name="task" value="user.login">
    <input type="hidden" name="return" value="<?php echo $return; ?>">
    <?php echo JHtml::_('form.token'); ?>
</form>
