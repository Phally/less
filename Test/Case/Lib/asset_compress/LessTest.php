<?php

App::import('Lib', 'Less.asset_compress/filter/LessFilter');
class LessTest extends CakeTestCase {

	protected $_LessFilter = null;

	public function setUp() {
      parent::setUp();
		$this->_LessFilter = new LessFilter();
	}

	public function testLessFile() {
		$less = '@pink: #ffaaff;';
		$less .= 'body { background: @pink; }';

		$css = "body {\n  background: #ffaaff;\n}";

		$this->assertEqual(trim($this->_LessFilter->input('pink.less', $less)), $css);
	}

	public function testLessCssFile() {
		$less = '@pink: #ffaaff;';
		$less .= 'body { background: @pink; }';

		$css = "body {\n  background: #ffaaff;\n}";

		$this->assertEqual(trim($this->_LessFilter->input('pink.less.css', $less)), $css);
	}

	public function testOtherFile() {
		$less = '@pink: #ffaaff;';
		$less .= 'body { background: @pink; }';

		$this->assertEqual(trim($this->_LessFilter->input('pink.css', $less)), $less);
	}

   /**
    * Test that import works, and looks for files relative to the filtered file.
    */
	public function testImportFile() {
      $parentName = TMP . DS . 'LessFilterPluginTestParent.less';
      $childFile = TMP . DS . 'LessFilterPluginTest.less';

      $file = fopen($childFile, 'w');
      fwrite($file, 'a { text-align: right; }');
      fclose($file);

		$less = '@import "LessFilterPluginTest.less";';

      $css = "a {\n  text-align: right;\n}";

		$this->assertEqual(trim($this->_LessFilter->input($parentName, $less)), $css);
      unlink($childFile);
	}
}
