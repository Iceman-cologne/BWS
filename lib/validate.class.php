<?php

class validate {

session_start();
$interviewID = session_id();
$debugFeedback ="";
$file_feedback ="feedback/" . $interviewID . ".json";
$file_data ="data/" . $interviewID . ".json";
$current ="";
$history_json ="";
$same = false;	


public static function check_debugFeedback() {

if (!isset($_REQUEST["debugFeedback"]))
        $_REQUEST["debugFeedback"] = file_get_contents($file_feedback);
       $current = $_REQUEST["debugFeedback"];

       return $current;


if (isset($_REQUEST["debugFeedback"]) && !empty($_REQUEST["debugFeedback"])){
    $current = $_REQUEST["debugFeedback"];
    file_put_contents($file_feedback, $current, FILE_APPEND | LOCK_EX);
    //$debugFeedback = $_REQUEST["debugFeedback"];

    return $current;
}
else {
    file_put_contents($file_feedback, $debugFeedback);
    return null;
}



public static function check_history(){
	if (isset($_REQUEST['history']))
	$_REQUEST["history"] = file_get_contents($file_data);
	return $_REQUEST["history"];
}








?>