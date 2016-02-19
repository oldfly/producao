<?php
/**
 * Kunena Component
 *
 * @package       Kunena.Administrator
 *
 * @copyright (C) 2008 - 2015 Kunena Team. All rights reserved.
 * @license       http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link          http://www.kunena.org
 **/
defined('_JEXEC') or die ();

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_kunena'))
{
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}

// Check if installation hasn't been completed.
if (is_file(__DIR__ . '/install.php'))
{
	require_once __DIR__ . '/install.php';

	if (class_exists('KunenaControllerInstall'))
	{
		return;
	}
}

$app = JFactory::getApplication();

// Safety check to prevent fatal error if 'System - Kunena Forum' plug-in has been disabled.
if ($app->input->getCmd('view') == 'install' || !class_exists('KunenaForum') || !KunenaForum::isCompatible('4.0'))
{
	// Run installer instead..
	require_once __DIR__ . '/install/controller.php';

	$controller = new KunenaControllerInstall();

	// TODO: execute special task that checks what's wrong
	$controller->execute($app->input->getCmd('task'));
	$controller->redirect();

	return;
}

if ($app->input->getCmd('view') == 'uninstall')
{
	$allowed = $app->getUserState('com_kunena.uninstall.allowed');

	if ($allowed)
	{
		require_once __DIR__ . '/install/controller.php';
		$controller = new KunenaControllerInstall;
		$controller->execute('uninstall');
		$controller->redirect();

		$app->setUserState('com_kunena.uninstall.allowed', null);

		return;
	}
}

if($app->input->getCmd('view') == 'ajax'){

	$doc 		= JFactory::getDocument();
	$config 	= JFactory::getConfig();
	$retorno 	= array("erro"=>1,"msn"=>"Não foi possivel enviar o email!");
	$email 		=  $app->input->post->get('email','', 'STRING');
	$code 		=  $app->input->post->get('code','','STRING');

	if($email && $code){

		$sender = array(
				$config->get( 'mailfrom' ),
    			$config->get( 'fromname' ) 
			);
		$urlloja = JURI::root().'loja/'; 
		$layout = <<<HTML
		<p>Obrigado por ajudar nosso forum com suas dicas preciosas, é por isso que estamos
		disponibilizando um cupom de desconto para uso em nossa loja.</p>
		<p><b>Cupom:</b> {$code}</p>
		<p><a target="_blank" href="{$urlloja}">{$urlloja}</a><p>

HTML;
		$mail = JFactory::getMailer();
			$mail->isHTML(true);
			$mail->Encoding = 'base64';
			$mail->addRecipient($email);
			$mail->setSender($sender);
			$mail->setSubject('Cupom - [Reparo sem lágrimas]');
			$mail->setBody($layout);
			$send = $mail->Send();
			if($send !== true){	
			 	$retorno = array("erro"=>1,"msn"=>"Erro no processo de envio.<br />".$send->__toString());			
			}else{
				$retorno = array("erro"=>0,"msn"=>"E-mail enviado com sucesso para {$email} com o código code {$code}.");			
			}
		
	}elseif(!$code){
		$retorno = array("erro"=>1,"msn"=>"O codigo do cupom precisa ser informado!");
	}

	$doc->setMimeEncoding('application/json');
	
	JResponse::setHeader('Content-Disposition','attachment;filename="progress-report-results.json"');
	echo json_encode($retorno);
	$app->close();

//	return;

}

// Initialize Kunena Framework.
KunenaForum::setup();

// Initialize custom error handlers.
KunenaError::initialize();

// Kunena has been successfully installed: Load our main controller.
$controller = KunenaController::getInstance();
$controller->execute($app->input->getCmd('task'));
$controller->redirect();

// Remove custom error handlers.
KunenaError::cleanup();
