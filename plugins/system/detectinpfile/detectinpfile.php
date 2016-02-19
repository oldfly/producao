<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
 
jimport( 'joomla.plugin.plugin' );
 
/**
 * Example system plugin
 */
class plgSystemDetectinpfile extends JPlugin
{
	protected $functions_list;
/**
* Constructor.
*
* @access protected
* @param object $subject The object to observe
* @param array   $config  An array that holds the plugin configuration
* @since 1.0
*/
public function __construct( &$subject, $config )
{
parent::__construct( $subject, $config );

$this->functions_list = array(
		'fopen'				=>JText::_('It was detected php fopen'),
		'fsockopen'			=>JText::_('It was detected php fsockopen'),
		'move_uploaded_file'=>JText::_('It was detected php move_uploaded_file'),
		'file_put_contents'	=>JText::_('It was detected php file_put_contents'),
		'eval'				=>JText::_('It was php detected eval'),
		'shell_exec'		=>JText::_('It was detected php shell_exec'),
		'exec('				=>JText::_('It was detected php exec'),
		'escapeshellcmd'	=>JText::_('It was detected php escapeshellcmd'),
		'system'			=>JText::_('It was detected system'),
		'escapeshellarg'	=>JText::_('It was detected php escapeshellarg'),
		'popen'				=>JText::_('It was detected php popen')
	);
 
// Do some extra initialisation in this constructor if required
}
 
	/**
	* Do something onAfterRender
	*/
	function onAfterRender()
	{


		$admin = $this->params->get('detectinpfile_check_in_adm');

		$check_access = ($admin)?1:JFactory::getApplication()->isSite();

		if ($check_access){

			JLog::addLogger(
		       array(
		            // Sets file name
		            'text_file' => 'detectinpfile.injectonsfile.php',
		            'text_entry_format' => '{DATETIME} {PRIORITY} {MESSAGE}'
		       ),
		       // Sets messages of all log levels to be sent to the file
		       JLog::ALL,
		       // Definir a categoria para o log de erros
		       array('plg_detectinpfile')
		   );

			$detected = array();

			$req = '';
			if(isset($_REQUEST)){

				$req = htmlentities(htmlspecialchars(print_r($_REQUEST,true)));
				
			}

			if(isset($_FILES)){
				$req .= htmlentities(htmlspecialchars(print_r($_FILES,true)));
			}

			foreach ($this->functions_list as $k => $func) {
				$pos = strpos($req, $k);

				if($pos===false){
					//falso positivo
				}else{
					$detected['msn'][] = $func; 
				}
			}


			if($detected){
				$detected['vales_request']  =  $req;
				$detected['current_url'] 	= htmlentities(htmlspecialchars(JURI::current()));
				$jinput 					= JFactory::getApplication()->input;
				$detected['current_opt'] 	= $jinput->get('option');
				$detected['ip'] 			= $_SERVER['REMOTE_ADDR'];

				$log_reg 	= "msn:(--".implode(',', $detected['msn'])."--) - ";
				$log_reg   .= "requests:(--".$detected['vales_request']."--) - ";
				$log_reg   .= "urlaction:(--".$detected['current_url']."--) - ";
				$log_reg   .= "component:(--".$detected['current_opt']."--) - ";
				$log_reg   .= "ip:(--".$detected['ip']."--) - ";

				JLog::add(JText::_('PHP injection detected ').$log_reg, JLog::WARNING, 'plg_detectinpfile');
			}
		}

	}
}