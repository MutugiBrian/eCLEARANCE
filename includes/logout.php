<?php
ob_start();
session_start();
ob_clean();
	session_destroy();
	echo "<script language=\"javascript\">window.location.href=\"index.php\";</script>";
	exit();
?>