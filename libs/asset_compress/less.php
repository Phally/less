<?php
App::import('Model', 'AssetCompress.AssetProcessorInterface');
App::import('Vendor', 'Less.lessphp/lessc', array('file' => 'lessphp/lessc.inc.php'));

/**
 * LessProcessor for Mark Story's Asset Compress plugin.
 *
 * @author Frank de Graaf (Phally)
 * @license MIT
 */
class LessProcessor implements AssetProcessorInterface {

	/**
	 * Supported extensions for this processor.
	 *
	 * @var array
	 */
	protected $_extensions = array('.less', '.less.css');

	/**
	 * Parses LESS CSS code.
	 *
	 * @param string $fileName The filename of the file.
	 * @param string $content content of *.css files.
	 * @return string
	 */
	public function process($fileName, $content) {
		foreach ($this->_extensions as $extension) {
			if (strtolower(substr($fileName, -strlen($extension))) == $extension) {
				$lessc = new lessc();
				return $lessc->parse($content);
			}
		}
		return $content;
	}
}
?>