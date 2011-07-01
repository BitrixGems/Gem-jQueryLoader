<?php
/**
 * Подключаем jQuery :)
 *
 * @author		Vladimir Savenkov <iVariable@gmail.com>
 *
 */
class BitrixGem_jQueryLoader extends BaseBitrixGem{

	protected $aGemInfo = array(
		'GEM'			=> 'jQueryLoader',
		'AUTHOR'		=> 'Vladimir Savenkov',
		'AUTHOR_LINK'	=> 'http://bitrixgems.ru',
		'DATE'			=> '06.02.2011',
		'VERSION'		=> '0.1',
		'NAME' 			=> 'jQueryLoader',
		'DESCRIPTION' 	=> "Демо-кирпичик, позволяющий подключить jQuery \n @TODO: выбор источника",
		'CHANGELOG'		=> 'Таки сделал выбор версии и места подключения jQuery. Чтоб гем не был совсем уж бесполезным :)',
		'REQUIREMENTS'	=> '',
	);
		
	public function initGem(){
		$aOptions = $this->getOptions();
		$bShow = false;
		switch( $aOptions['sWhere'] ){

			case 'ADMIN':
				$bShow = defined( 'ADMIN_SECTION' );
				break;

			case 'PUBLIC':
				$bShow = !defined( 'ADMIN_SECTION' );
				break;

			case 'BOTH':
				$bShow = true;
				break;

		}
		if( $bShow ){
			global $APPLICATION;
			$APPLICATION->AddHeadScript( 'http://ajax.googleapis.com/ajax/libs/jquery/'.$aOptions['sVersion'].'/jquery.min.js' );
		}
	}

	public function needAdminPage(){
		return true;
	}
	public function showAdminPage(){
		$aOptions = $this->getOptions();
		require_once( dirname(__FILE__).'/options/adminOptionPage.php' );
	}
	public function processAdminPage( $aOptions ){
		$aLevels = array();
		if( !empty( $aOptions['jQueryLoader'] ) ){
			$this->setOptions( $aOptions['jQueryLoader'] );
		}
	}


	protected function getOptions(){
		$aOptions = include( dirname(__FILE__).'/options/options.php' );
		$aDefaultOptions = array(
			'sWhere' 	=> 'ADMIN',
			'sVersion' 	=> '1.5',
		);
		if( !is_array( $aOptions ) ) $aOptions = $aDefaultOptions;
		$aOptions = array_merge( $aDefaultOptions, $aOptions );
		return $aOptions;	
	}

	protected function setOptions( $aOptions ){
		return file_put_contents(
			dirname(__FILE__).'/options/options.php',
			'<?php return '.var_export( $aOptions, true ).';?>'
		);
	}
	
}
?>