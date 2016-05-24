<?php 
// semua hal yang berhubungan dengan utility sistem

/**
* Author Rois New VersiOn
*/
class Utility
{
	
	public function __construct()
	{
		// parent::__construct();
	}

	public function checkLogin($session)
	{
		if (!isset($_SESSION[$session])) {
			header("Location: login.php");
		}
		
	}

	public function diLoginPage($session)
	{
		if (isset($_SESSION[$session])) {
			header("Location: index.php");
		}
	}
}

?>