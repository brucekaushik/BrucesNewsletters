<?php

function validate_string($in_str){

	/*
	 (string) -> string

	strips $in_str off any characters that are not a-z A-Z 0-9 _ - & whitespace
	check the length of the new string
	if its not equal, return the string
	otherwise, return a string "bad input.
	*/

	$str = preg_replace("/[^a-zA-Z0-9_\- ]/", "", $in_str);
	if(strlen($str) != 0){
		return $str;
	}else{
		return "bad input";
	}

}

function validate_textarea($in_str){

	/*
	 (string) -> string

	strips $in_str off any characters that are not a-z A-Z 0-9 _ - & whitespace
	check the length of the new string
	if its not equal, return the string
	otherwise, return a string "bad input.
	*/
	
	$in_str = preg_replace("/'/", "&prime;", $in_str);
	$in_str = strip_tags($in_str, "<b><p><div><br><i><u><a><ul><li><ol>");
	
	return $in_str;

}

function validate_email($in_email){

	$str = preg_replace("/[^a-zA-Z0-9@_\-\. ]/", "", $in_email);
	
	if(strlen($str) != 0){
		
		$atpos = strpos($str,"@");
		$dotpos = strpos($str,".",$atpos);
		$no_of_dots = substr_count($str,".",$atpos);
		
		if($no_of_dots <= 2){
			$dotpos = strpos($str,".",$atpos);
		}else{
			$dotpos = $atpos; // so that the below condition fails, no other reason	
		}				
				
		if($atpos == 0){
			return "bad input";
		}else if($dotpos > $atpos + 2){
			return $str;
		}else{
			return "bad input";
		}
		
	}else{
		return "bad input";
	}

}