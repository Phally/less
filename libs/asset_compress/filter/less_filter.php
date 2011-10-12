<?php

/**
 * LessFilter for Mark Story's Asset Compress plugin.
 *
 * @author Frank de Graaf (Phally)
 * @author Netboy <netboy@netboy.pl>
 * @license MIT
 */
class LessFilter extends AssetFilter {

	/**
	 * Supported extensions and other settings of this filter.
	 *
	 * @var array
	 */
	protected $_settings = array(
		'extensions' => array('.less', '.less.css'),
		'file' => 'lessphp/lessc.inc.php',
		'path' => 'lessphp/lessc'
	);	

	/**
	 * Parses LESS CSS code.
	 *
	 * @param string $fileName The filename of the file.
	 * @param string $content content of *.css files.
	 * @return string
	 */
	public function input($fileName, $content) {
		$options = array('file' => $this->_settings['file']);
		if (!App::import('Vendor', $this->_settings['path'], $options)) {
			$options['file'] = 'less/vendors/' . $this->_settings['file'];
			App::import('Vendor', 'Less.' . $this->_settings['path'], $options);
		}
		foreach ($this->_settings['extensions'] as $extension) {
			if (strtolower(substr($fileName, -strlen($extension))) == $extension) {
				$lessc = new lessc();
				return $lessc->parse($content);
			}
		}
		return $content;
	}
}
?>