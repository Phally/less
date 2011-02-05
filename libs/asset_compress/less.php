<?php
App::import('Model', 'AssetCompress.AssetFilterInterface');
App::import('Vendor', 'Less.lessphp/lessc', array('file' => 'lessphp/lessc.inc.php'));

/**
 * LessFilter for Mark Story's Asset Compress plugin.
 *
 * @author Frank de Graaf (Phally)
 * @license MIT
 */
final class LessFilter implements AssetFilterInterface {

	/**
	 * Parses LESS css code.
	 *
	 * @param string $content content of *.css files.
	 * @return string
	 * @access public
	 */
	public function filter($content) {
		$lessc = new lessc();
		return $lessc->parse($content);
	}
}