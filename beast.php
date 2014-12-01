<?php

/**
 * Execute a PHP template file and return the result as a string.
 *
 * Inspiration from:
 * http://www.bigsmoke.us/php-templates/functions
 */
class Beast {

	protected $opts;

	public function __construct($opts = array()) {

		// for convenience, if $opts is a string, assume it's meant to
		// be the path where templates are held.
		if(is_string($opts)) {
			$opts = array(
				'path' => $opts,
			);
		}

		$this->opts = $opts;
	}

	/**
	 * where is Beast looking for the template?
	 *
	 * @param $filename {string} Filename.
	 * @returns filename prepended by path.
	 */
	public function getPath($filename) {
		$path = '';
		if(isset($this->opts['path'])) {
			$path = $this->opts['path'].DIRECTORY_SEPARATOR;
		}
		$result = $path.$filename;

		return $result;
	}

	/*
	 * "obscure" argument-names by prepending "beast_".  this will reduce
	 * the chance of collision between the supplied variables.
	 */
	protected function _render($beast_template_filename, $beast_vars = array()) {

		// be compatible with arrays *and* objects
		if(is_object($beast_vars)) {
			$beast_vars = get_object_vars($beast_vars);
		}

		// import into current symbol-table
		extract($beast_vars);

		if (isset($this->opts['include_globals']) && $this->opts['include_globals']) {
			extract($GLOBALS, EXTR_SKIP);
		}

		if(!file_exists($beast_template_filename)) {
			throw new Exception("Unable to find template file:  {$beast_template_filename}");
		}

		ob_start();

		require($beast_template_filename);

		$beast_applied_template = ob_get_contents();
		ob_end_clean();

		return $beast_applied_template;
	}

	public function render($filename, $vars = array()) {

		if(empty($filename)) {
			throw new Exception("Can't render a file with no name");
		}

		// prepend path if it was specified
		return $this->_render($this->getPath($filename), $vars);
	}

	public function renderString($txt, $vars = array()) {
		$filename = tempnam(sys_get_temp_dir(), 'bst');
		$handle = fopen($filename, "w");
		fwrite($handle, $txt);
		fclose($handle);

		try {
			$result = $this->_render($filename, $vars);
		} catch (Exception $e) {
			unlink($filename);
			throw $e;
		}
		unlink($filename);

		return $result;
	}
}

?>
