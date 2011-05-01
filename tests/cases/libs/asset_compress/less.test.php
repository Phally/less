<?php
class LessProcessorTestCase extends CakeTestCase {

	protected $_LessProcessor = null;

	public function startCase() {
		$this->assertTrue(App::import('Lib', 'Less.asset_compress/Less'));
	}

	public function startTest($method) {
		$this->_LessProcessor = new LessProcessor();
	}

	public function testLessFile() {
		$less = '@pink: #ffaaff;';
		$less .= 'body { background: @pink; }';

		$css = 'body { background:#ffaaff; }';

		$this->assertEqual(trim($this->_LessProcessor->process('pink.less', $less)), $css);
	}

	public function testLessCssFile() {
		$less = '@pink: #ffaaff;';
		$less .= 'body { background: @pink; }';

		$css = 'body { background:#ffaaff; }';

		$this->assertEqual(trim($this->_LessProcessor->process('pink.less.css', $less)), $css);
	}

	public function testOtherFile() {
		$less = '@pink: #ffaaff;';
		$less .= 'body { background: @pink; }';

		$this->assertEqual(trim($this->_LessProcessor->process('pink.css', $less)), $less);
	}
}
?>
