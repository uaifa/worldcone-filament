<?php


if(!function_exists('userRoles')){
	function userRoles($data){
		$data = (int)$data;
		if($data == 1){
			return 'User';
		}else if($data == 2){
			return 'Admin';
		}
		return $data;
	}
}