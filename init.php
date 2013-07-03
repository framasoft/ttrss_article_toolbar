<?php
class framarticle_toolbar extends Plugin {

	private $link;
	private $host;

	function about() {
		return array(0.3,
			"Toolbar for easy access to feed functions, based on https://github.com/idoxlr8/article_toolbar",
			"ldidry", false);
	}

	function init($host) {
		$this->dbh = $host->get_dbh();
		$this->host = $host;

		$host->add_hook($host::HOOK_TOOLBAR_BUTTON, $this);
	}
	///Experimental get users name
	function CDM_EXPANDED() {
		if (!$user_id) {
			$user_id = $_SESSION["uid"];
		}
		$result = db_query("SELECT CDM_EXPANDED FROM ttrss_user_prefs WHERE owner_uid = $user_id");
		$value  = db_fetch_result($result, 0, "CDM_EXPANDED");
		return $value;
	}

	function get_js() {
		return file_get_contents(dirname(__FILE__) . "/toolbar.js");
	}

	function HOOK_TOOLBAR_BUTTON() {
		require_once dirname(__FILE__) . "/toolbar.php";
	}

	function api_version() {
		return 2;
	}
}
?>
