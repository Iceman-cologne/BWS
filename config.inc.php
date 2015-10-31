<?php

error_reporting(E_NONE);
ini_set("display_errors", 0);

include_once("lib/Comparison.class.php");
include_once("lib/ComparisonList.class.php");
include_once("lib/Config.class.php");
include_once("lib/BestWorseScaling.class.php");

// Algorithmus zur Generierung der Fragenpaare
$z = array();
$factorCount = count(Config::$factors1);
$id = 0;
$befragter = (int)$_REQUEST["counter"];
$offset = 0;

	if (isset($_REQUEST["offset"])) {
	   $offset = $_REQUEST["offset"];
	}
	if (isset($_REQUEST["comp-id"])) {
	    $id = $_REQUEST["comp-id"];
	}

	switch ($befragter) {

		case 1:
		$fragebogen = Config::$factors1;
		break;
		case 2:
		$fragebogen = Config::$factors2;
		break;
		case 3:
		$fragebogen = Config::$factors3;
		break;
		case 4:
		$fragebogen = Config::$factors4;
		break;
		case 5:
		$fragebogen = Config::$factors5;
		break;
		case 6:
		$fragebogen = Config::$factors6;
		break;
		case 7:
		$fragebogen = Config::$factors7;
		break;
		case 8:
		$fragebogen = Config::$factors8;
		break;
		case 9:
		$fragebogen = Config::$factors9;
		break;
		case 10:
		$fragebogen = Config::$factors10;
		break;
		case 11:
		$fragebogen = Config::$factors11;
		break;
		case 12:
		$fragebogen = Config::$factors12;
		break;
		case 13:
		$fragebogen = Config::$factors13;
		break;
		default: 
		$fragebogen = Config::$factors13;;
	}

//if ($offset == 0) {
//	Befragter();
	//$befragter = $GLOBALS["letzerbefragter"];

//}

/*if($offset==10) {
	//$GLOBALS["letzerbefragter"]++;
header("Location: http://playmachine.de/html/index6.php");
	exit;
}*/



//echo '<br>Seitencounter: ' . $id. ' - ';
//echo $factorCount;
/*function Befragter (){
	static $befragter =0;
	$befragter++;
	if ($befragter <12){
		Befragter();
	}
	$befragter =0;
}
*/

for($i = $offset*4; $i < ($offset+1)*4; $i++){
        $z[$i%4]= $fragebogen[$i];  
 //echo "$i : " . $z[$i%4] . " / " . Config::$factors[$z[$i%4]] . " </br>";
}

$factor_A=$z[0];
$factor_B=$z[1];
$factor_C=$z[2];
$factor_D=$z[3];
          

$compareData = new stdClass();
$compareData->id = $id;

	$compareData->aAlt = Config::$factors[$factor_A];
	$compareData->aDesc = Config::$descriptions[$factor_A];
	$compareData->bAlt = Config::$factors[$factor_B];
	$compareData->bDesc = Config::$descriptions[$factor_B];
	$compareData->cAlt = Config::$factors[$factor_C];
	$compareData->cDesc = Config::$descriptions[$factor_C];
	$compareData->dAlt = Config::$factors[$factor_D];
	$compareData->dDesc = Config::$descriptions[$factor_D];
    
Config::$factorObjects[] = $compareData;

$offset++;
$id++;
