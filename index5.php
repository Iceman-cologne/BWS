<?php
error_reporting(E_NONE); 
ini_set("display_errors", 0);

include_once("config.inc.php");  //include all other files

session_start();
$interviewID = session_id();
$history_json = "";
$same = false;
$error =false;
$file_feedback ="feedback/" . $interviewID . ".json";
$file_data = "data/" . $interviewID . ".json";
$file_question ="question/" . $interviewID . ".txt";
$current ="";
$datei ="";
$text ="";
$counterstand = $_REQUEST['counter'];

    
//Validation Question A001_1 & A003_01
    if ($_REQUEST["question1"]) {
    $datei = fopen($file_question, "w+");
    if(!$datei) {

        die ("File could not be opened for writing.");
       } else {
         $text = "Befragter Nr." .$_REQUEST["counter"] . "\r\n";
         $text .= $_REQUEST["question1"] . "\r\n";
         $text .= $_REQUEST['question3'];

         fwrite($datei, "$text");
         fclose($datei);

         }  
       } 

// Validate feedback textarea and open JSON file to save the comment     
if (isset($_REQUEST["debugFeedback"]) && !empty($_REQUEST["debugFeedback"])){
    $current = $_REQUEST["debugFeedback"];
    $feedback_json = json_encode($current); // encode to JSON 
    file_put_contents($file_feedback, $feedback_json, FILE_APPEND | LOCK_EX); //use of file_put_contents open and close JSON file
} else {
    file_put_contents($file_feedback, $debugFeedback);
}


$BestWorseScaling = new BestWorseScaling(ComparisonList::getArguments());

if (isset($_REQUEST["comp-id"]) && $_REQUEST["comp-value1"] && $_REQUEST["comp-value2"]) {
    $Comparison = new Comparison($_REQUEST["offset"], $_REQUEST["comp-a"], $_REQUEST["comp-b"], $_REQUEST["comp-c"], $_REQUEST["comp-d"]);
    $Comparison->setBest($_REQUEST["comp-value1"]);
    $Comparison->setWorse($_REQUEST["comp-value2"]);
    
    $BestWorseScaling->addComparison($Comparison);
  

    $history_json = json_encode($BestWorseScaling->getComparisons());
    file_put_contents($file_data, $history_json, FILE_APPEND | LOCK_EX);
    $nextID = (int)$_REQUEST["comp-id"];
    $Comparison = ComparisonList::getNext($nextID, $BestWorseScaling); 
    } else {
    $Comparison = ComparisonList::getNext(0, $BestWorseScaling);
    }

if (isset($BestWorseScaling))
    $progress = 40 + ($offset*3) / count(Config::$factors1) * 40 ;
else
    $progress = 40;



?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>Fragebogen</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="Scripts/jquery-2.0.3.js"></script>
    <script src='Scripts/jquery.debug.js'></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    

<style type="text/css">

    .accordion {
    overflow:hidden;
}

/*----- Section Titles -----*/
.accordion-section-title {
    width:100%;
    transition:all linear 0.15s;
    /* Type */
    font-size:1em;
    color:#fff;
}
 
.accordion-section-title.active, .accordion-section-title:hover {
   
    /* Type */
    text-decoration:none;
}
 
.accordion-section:last-child .accordion-section-title {
    border-bottom:none;
}
 
/*----- Section Content -----*/
.accordion-section-content {
    padding:5px;
    display:none;
}  
       
</style>


<!-- general css -->
<style type="text/css">
        body {
            padding-bottom: 24px
        }

        div.questionary {
            width: 600px;
            margin: 0px auto
        }

        hr {
            height: 2px;
            border: 0px;
            background-color: transparent;
            border-bottom: 2px solid #CCCCCC;
            margin: 24px 0px 28px 0px;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>
<body>
    <!--[if lt IE 7]>
<div style="clear: both; padding: 10px 20px 10px 20px; background-color: #FF9900; color: white; font-size: 16px">
    <strong>Warnung:</strong> Sie verwenden eine hoffnungslos veraltete Version des Internet Explorers. Im Interesse
    Ihrer eigenen Sicherheit sollten Sie der Empfehlung von Microsoft folgen und Ihren Browser aktualisieren: <a
    href="http://windows.microsoft.com/de-de/internet-explorer/download-ie" target="_blank" style="color: #EEEEEE">Internet
    Explorer aktualisieren</a></div> <![endif]-->


<div class="questionary">
    <div style="margin-top: 18px">
        <div style="float:left;width:70%">
            <strong>Universität zu Köln</strong><br><br>
            Professur für Wirtschaftsinformatik<br>
            und integrierte Informationssysteme<br>
            Prof. Dr. Christoph Rosenkranz
        </div>
        <div style="float:right;width:30%;text-align:right;">
            <img src="https://www.soscisurvey.de/Innovationen_in_ITO/logo.ger.0311.jpg" alt="">
        </div>
        <div style="clear:both;"></div>
    </div>
    <hr style="margin-top: 12px;">
    <form name="bws"method="POST" action="<?php if ($offset >=10) {  // check if offset reached 10 loops to determine the 
        echo "index6.php";   //end of the item list to point out the end of the items 
    } else {
        echo "index5.php";}?>" accept-charset="UTF-8" autocomplete="off" id="questionnaireForm">
        <div class="invisible">
            <input type="hidden" name="page" value="6"/>
            <input type="hidden" name="counter" value="<?php echo $_REQUEST['counter']; ?>"/>
            <input type="hidden" name="history" value='<?php echo $history_json; ?>'/>
            <input type="hidden" name="offset" value="<?php echo $offset; ?>"/>
            <input type="hidden" name="comp-id" value="<?php echo $Comparison->id; ?>"/>
            <input type="hidden" name="comp-a" value="<?php echo $Comparison->aAlt; ?>"/>
            <input type="hidden" name="comp-b" value="<?php echo $Comparison->bAlt; ?>"/>
            <input type="hidden" name="comp-c" value="<?php echo $Comparison->cAlt; ?>"/>
            <input type="hidden" name="comp-d" value="<?php echo $Comparison->dAlt; ?>"/>
        </div>
        

         
<h1>Evaluation von Faktoren zur Innovationsgewinnung in ITO-Projekten</h1>
    <?php if ($same=== true): ?>
    <div class="feedbackItem">
        <p>Das gleiche Item kann nicht zweimal ausgewählt werden. Bitte berichtigen Sie und kleicken dann auf Weiter</p>
    </div>
    <?php endif; ?>

    <?php if ($error=== true): ?>
    <div class="feedback">
        <p>Bitte beantworten Sie auch diese Frage und klicken Sie anschliessend auf weiter – Ihre Antwort auf die Frage ist für die Studie sehr wichtig.</p>
    </div>
    <?php endif; ?>
    <p>Im folgenden Teil des Fragebogens werden jeweils vier Faktoren in einem Set präsentiert, welche die Innovationsgewinnung
    in ITO-Projekten nachweislich fördern.</p>
    <p>Ihre Aufgabe ist es zu bestimmmen, welcher der genannten Faktoren in Ihrem persönlichen Tätigkeitsfeld
    (bspw. in Ihrem aktuellen ITO-Projekt) Ihrer Meinung nach am wichtiger ist und am wenigsten wichtig ist.
    </p><table border="1" width="100%" cellpadding="5" cellspacing="5">
    <tr> <!--Headline itemssets -->
    	<td>am wichtigsten</td>
    	<td align="center"><font size="3">Innovationsfördernde Faktoren</td>
    		<td>am wenigsten wichtig</td>
    </tr>
 <!--///////////////////////////////////////////////////////////////////////////////-->
    <tr bgcolor="#BBAABB"> <!--FaktorA-->
       <td width="1%" style="text-align: middle;">
       	<input type="radio" name="comp-value1" checked="checked" value="<?php echo $Comparison->aAlt; ?>"/></td>
        <td width="90%"><?php echo $Comparison->aAlt; ?>
        	<div class="accordion">
        	<div class="accordion-section">
        		<a class="accordion-section-title" href="#accordion-1">mehr</a>
        		<div id="accordion-1" class="accordion-section-content">
        		<p><?php echo $Comparison->aDesc;?></p> 
        		</div>
        	</div>
        	</div>	
        </td>
                
        <td align="right;">
            <input type="radio" name="comp-value2" value="<?php echo $Comparison->aAlt; ?>"/></td>
    </tr>
   <!--///////////////////////////////////////////////////////////////////////////////-->
    <tr><!--Faktor B-->
       <td align="middle;"> 
       <input type="radio"name="comp-value1" value="<?php echo $Comparison->bAlt; ?>"/></td>
       	<td width="90%"><?php echo $Comparison->bAlt; ?>
       		<div class="accordion">
        	<div class="accordion-section">
        		<a class="accordion-section-title" href="#accordion-2">mehr</a>
        		<div id="accordion-2" class="accordion-section-content">
        		<p><?php echo $Comparison->bDesc;?></p>
        		</div>
        	</div>
        	</div>	
       	</td>
        <td align="middle;">
        <input type="radio" name="comp-value2" checked="checked" value="<?php echo $Comparison->bAlt; ?>"/></td>
    </tr> 
   <!--///////////////////////////////////////////////////////////////////////////////-->
    <tr bgcolor="BBAABB"> <!-- Faktor C -->
        <td align="middle;">
       	<input type="radio"name="comp-value1" value="<?php echo $Comparison->cAlt; ?>"/></td>
       	<td width="90%"><?php echo $Comparison->cAlt; ?>
       		<div class="accordion">
        	<div class="accordion-section">
        		<a class="accordion-section-title" href="#accordion-3">mehr</a>
        		<div id="accordion-3" class="accordion-section-content">
        		<p><?php echo $Comparison->cDesc;?></p>
        		</div>
        	</div>
        	</div>	
       	</td>
        <td align="middle;"> 
       	<input type="radio" name="comp-value2" value="<?php echo $Comparison->cAlt; ?>"/></td>
    </tr> 
   <!--///////////////////////////////////////////////////////////////////////////////-->
    <tr> <!-- Faktor D -->
        <td align="middle;"> 
        <input type="radio"name="comp-value1" value="<?php echo $Comparison->dAlt; ?>"/></td>
       	<td width="90%"><?php echo $Comparison->dAlt; ?>
       		<div class="accordion">
        	<div class="accordion-section">
        		<a class="accordion-section-title" href="#accordion-4">mehr</a>
        		<div id="accordion-4" class="accordion-section-content">
        		<p><?php echo $Comparison->dDesc;?></p>
        		</div>
        	</div>
        </div>	
        </td>
        <td align="middle;">
        <input type="radio" name="comp-value2" value="<?php echo $Comparison->dAlt; ?>"/></td>
    </tr> 
</table>

<h2 class="debug">Anmerkungen zu Seite 5</h2>

<div class="debug">
    <p>Sie testen den Fragebogen gerade im Pretest-Modus.</p>

    <p>Fanden Sie auf dieser Seite irgend etwas unverständlich,
    missverständlich oder unklar? Sehen Sie noch irgendwelche Fehler?
    Bitte schreiben Sie hier <strong>alles</strong> auf, was Ihnen auffällt.</p>
    <p>Vielen Dank.</p>

    <div class="textinput"><textarea name="debugFeedback" cols="92" rows="8" style="width: 100%; height: 120px; margin-top: 6px">
    </textarea>
    </div>
    <input name="debugPage" value="4" type="hidden"/>
	</div>
    <table cellspacing="0" cellpadding="0" border="0" width="100%" class="submitButtons" id="buttonsAuto">
        <colgroup>
            <col width="50%">
            <col width="50%">
        </colgroup> 
            <tbody>
                <tr>
                    <td class="buttonBack"></td>
                    <td class="buttonNext"><input class="button" name="absenden" id="submit0" type="submit" value="Weiter" >
                    </td>
                </tr>
            </tbody>
           
        </table>
    </form>

    <hr style="margin-bottom: 14px;">
    <table border="0" cellspacing="0" cellpadding="0" style="margin-bottom: 24px;">
        <colgroup>
            <col width="350">
            <col width="50">
            <col width="200">
        </colgroup>
        <tr>
            <td><a href="mailto:nikolaus.schmidt@wiso.uni-koeln.de">Nikolaus Schmidt (Wissenschaftlicher
                Mitarbeiter)</a> <br> <a href="mailto:asunay@smail.uni-koeln.de">Aysun Sunay
                (Master-Student)</a><br>
                Universität zu Köln – 2015
            </td>
            <td></td>
            <td>
                <div class="progressbar">
                    <div class="progress" style="width: <?php echo $progress; ?>%">&nbsp;</div>
                    <div class="progresstext">
                        <?php echo $progress; ?>% ausgefüllt
                    </div>
                </div>
            </td>
        </tr>
    </table>
    <div>
        <input name="zomplete" value="yes" type="hidden">
    </div>
</form>
</div>
</body>
<script language="JavaScript" type="text/javascript" src="Scripts/javascripta.js"></script>
<!-- <script type="text/javascript">(window.onerror) </script> -->
</html>