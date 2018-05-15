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
		$this->host = $host;
		$this->pdo = Db::pdo();

		$host->add_hook($host::HOOK_TOOLBAR_BUTTON, $this);
	}
	///Experimental get users name
	function CDM_EXPANDED() {
		if (!$user_id) {
			$user_id = $_SESSION["uid"];
		}
		$sth = $this->pdo->prepare("SELECT CDM_EXPANDED FROM ttrss_user_prefs WHERE owner_uid = ?");
		$sth->execute([$user_id]);
		$value = $sth->fetchColumn(0);
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
