<?php 
	$data = $_POST;
	
    if( isset($data['doLogOut']) ){
		unset($_SESSION['logged_user']);
		
		header("LOCATION: {$_SERVER['PHP_SELF']}");
	}
?>
