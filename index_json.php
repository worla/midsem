<?php
	include("gen.php");
	$cmd=get_datan("cmd");
	
	switch($cmd){
	case 1:
		get_reserved_seats();
		break;
	case 2:
		add_reserved_seat();
		break;
	default:
		echo "{";
		echo jsonn("result",0). ",";
		echo jsons("message","unknown command");
		echo "}";
	}
		
	
	function get_reserved_seats(){
	include ("index_functions.php");
	$id=get_datan("id");
	$v=new index_functions();
	$v->get_reserved_seats();
		$row=$v->fetch();
		if(!$row){
			echo "{";
			echo jsonn("result",0). ",";
			echo jsons("message","seat not found");
			echo "}";
			return;
		}
			echo "{";
			echo '"users":';
			$s=Array();
			do{
			array_push($s,$row);
			$row=$v->fetch();
			}while($row);
			print_r(json_encode($s));
			echo "}";
		}


	
	function add_reserved_seat(){
	include("index_functions.php");
	$v=new index_functions();
	$c=mt_rand(100000,999999);
	$n=get_data("n");
	$l=get_data("l");
	if(!$v->add_reserved_seats($name,$email,$phonenumber)){
	echo mysql_error();
	echo '{"result":0,"message":"reserve not added!!!"}';
	}
	else{
	echo '{"result":1,"message":"reserve added!!!"}';
	}
	}
	

?>