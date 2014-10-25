<?php
include_once("adb.php");

class index_functions extends adb{
	    function index_functions(){
        adb::adb();
    }
	//SEATS
	//RESERVED
	function get_reserved_seats(){
	$query="select * from users";
	return $this->query($query);
	}
	
	function add_reserved_seats($name,$email,$phonenumber){
	$query="insert into reserved set name='$name',email=$email,phonenumber='$phonenumber'";
	return $this->query($query);
	}

}
?>