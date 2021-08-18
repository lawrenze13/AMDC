<?php 

function is_loggedin(){
    $session = session('loggedUser');
		$loggedin = isset($session);
		if($loggedin){
			return true;
		}else{		
			return false;
		}
}

?>