<?php
App::import('Model', 'AssetCompress.AssetProcessorInterface');
App::import('Vendor', 'Less.lessphp/lessc', array('file' => 'lessphp/lessc.inc.php'));

/**
 * LessFilter for Mark Story's Asset Compress plugin.
 *
 * @author Frank de Graaf (Phally)
 * @license MIT
 */
final class LessProcessor implements AssetProcessorInterface {

	/**
	 * Parses LESS css code.
	 *
	 * @param string $fileName The filename of the file.
	 * @param string $content content of *.css files.
	 * @return string
	 * @access public
	 */
	public function process($fileName, $content) {
		if (substr($fileName, -9) != '.less.css') {
			return $content;
		}
		$lessc = new lessc();
		return $lessc->parse($content);
	}
}