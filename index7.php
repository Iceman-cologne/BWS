<?php

error_reporting(E_NONE);
ini_set("display_errors", 0);
session_start();
$interviewID = session_id();
$debugFeedback ="";
$file_feedback ="feedback/" . $interviewID . ".json";
$file_person ="person_data/" . $interviewID . ".json";
$current ="";
$history_json ="";


//Question ohne page 7  (A001_1 & A003_01) validation and save to file "person_data"
    if ($_REQUEST["A301"]) {
    $datei = fopen($file_person, "w+");
    if(!$datei) {

        die ("File could not be opened for writing.");
       } else {
         $text = "Befragter Nr." .$_REQUEST["counter"] . "\r\n";
         $text .= $_REQUEST["A301"] . "\r\n";
         $text .= (int)$_REQUEST['A302_01']. "\r\n";
         $text .= $_REQUEST['A303_01'];

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




?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>Fragebogen</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="Scripts/jquery-2.0.3.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
   
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

    <div class="questionary">
        <form action="index8.php" method="POST" accept-charset="UTF-8" autocomplete="off" id="questionnaireForm">
            <div class="invisible">
                <input type="hidden" name="page" value="8"/>
                <input type="hidden" name="counter" value="<?php echo $_REQUEST['counter']; ?>"/>
               
                
            </div>

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
    <h1>Ihre Meinung zum Fragebogen</h1>
        <p>Wir möchten uns an dieser Stelle für Ihre Bemühungen im Rahmen der Beantwortung des Fragebogens noch einmal ausdrücklich
        bedanken. Im folgenden Feld haben Sie die Möglichkeit uns ein persönliches Feedback zu unserem Fragebogen mit auf
        den Weg zu geben.</p>

    <div class="SoSciDebug question pretest">
        
<div class="titleSpacing"/>

<table class="question" id="A401_tab" border="0" cellpadding="0" cellspacing="0" width="100%">
    <tbody>
        <tr class=" hover shadeF1">
            <label for="A401_01">Ihr Feedback zum Fragebogen:</label>
</p>
</div>
<div class="titleSpacing"/>

<table class="question" id="A401_tab" border="0" cellpadding="0" cellspacing="0" width="100%">

    <tbody>
        <tr class=" hover shadeF1">
            <td class="text input textinput left">
                <div class="textinput">
<textarea autofocus name="A401_01" id="A401_01" style="width: 100%; height: 100px;"/></textarea>
</div>
</td>
</tr>
</tbody>
</table>
</div>


<div class="SoSciDebug question pretest">
   
<div id="A402_qst" class="spacing">
    <div class="title">
    </br>

<p>Falls Sie Interesse an den Ergebnissen dieser Befragung haben oder für eine weitere Befragung zur Verfügung stehen, haben Sie die Möglichkeit hier Ihre Kontaktdaten anzugeben.</p>
</div>

<div class="explanation">
<p>Die Erhebung dieser Daten erfolgt getrennt von Ihren anderen Antworten, was eine Personalisierung Ihres Antwortdatensatzes unmöglich macht.</p>
</div>
<div class="titleSpacing"/>
<table class="question" id="A402_tab" border="0" cellpadding="0" cellspacing="0" width="100%">

    <colgroup>
<col width="24px" class="inputCSR"/>
<col/>
</colgroup>
<tbody>
    <tr>
        <td class="contact input center">
<input name="A402_information" id="A402_information" value="Ja, ich möchte die Ergebnisse dieser Befragung erhalten." type="checkbox"/>
</td>
<td class="itemtext item text">
<label for="A402_information">Ja, ich möchte die Ergebnisse dieser Befragung erhalten.</label>
</td>
</tr><td class="contact input center">
<input name="A402_customA" id="A402_customA" value="Ja, ich stehe für weitere Befragungen zur Verfügung." type="checkbox"/>
</td>
<td class="itemtext item text">
<label for="A402_customA">Ja, ich stehe für weitere Befragungen zur Verfügung.</label>
</td>
</tr>
</tbody>
</table>
<div style="margin-top: 8px; display: none;" id="A402_contact">

    <table class="question" id="A402_tab" border="0" cellpadding="0" cellspacing="0" width="100%">

        <colgroup>
<col width="150px"/>
<col/>
</colgroup>
<tbody>
    <tr class=" shadeF1">
        <td class="itemtext item text">
<label for="A402_email">Ihre Kontaktdaten (Vor- und Nachname, Unternehmensname, eMail-Adresse)</label>
</td>
<td class="text input textinput left">
<div class="textinput">
<textarea name="A402_email" id="A402_email" style="width: 100%; height: 150px;" rows="60" cols="9"/></textarea>
</div>
</td>
</tr>
</tbody>
</table>
</div>

<script type="text/javascript">
function modContactUpdate() {
                var obj = new Array( 
                    document.getElementById("A402_lottery"), 
                    document.getElementById("A402_information"), 
                    document.getElementById("A402_panel"),
                    document.getElementById("A402_customA"),
                    document.getElementById("A402_customB"),
                    document.getElementById("A402_customC")
                );

                var anyChecked = false;
                var checkboxes = 0;
                for (var i=0; i<obj.length; i++) {
                    if (obj[i]) {
                        checkboxes++;
                        if (obj[i].checked) anyChecked = true;
                        if (!obj[i].onclick) {
                            obj[i].onclick = modContactUpdate;
                        }
                    }
                }
                
                var block = document.getElementById("A402_contact");
                if (anyChecked || (checkboxes == 0)) {
                    block.style.display = "";
                } else {
                    block.style.display = "none";
                }
            }
            modContactUpdate();

</script>
</div>

    <p>Sollten Sie weiterführende Fragen hinsichtlich der Befragung haben, wenden Sie sich bitte an Nikolaus Schmidt:</p>
        <p>
        Telefon: +49 221 470 5373
        <br/>
        E-Mail: nikolaus.schmidt@wiso.uni-koeln.de
        </p>
        <p>Wir bedanken uns noch einmal für Ihre Aufmerksamkeit und wünschen Ihnen einen schönen Tag.</p>


    
    <h2 class="debug">Anmerkungen zu Seite 7</h2>

            <div class="debug">
                <p>Sie testen den Fragebogen gerade im Pretest-Modus.</p>

                <p>Fanden Sie auf dieser Seite irgend etwas unverständlich,
                missverständlich oder unklar? Sehen Sie noch irgendwelche Fehler?
                Bitte schreiben Sie hier <strong>alles</strong> auf, was Ihnen auffällt.</p>

                <p>Hinter oder über jeder Frage sehen Sie eine Kennung, etwa <span class="debug">[AB01]</span>.
                Wenn Sie etwas zu einer Frage anmerken möchten, geben Sie bitte diese Kennung
                (nicht die Nummer der Frage) an. Vielen Dank.</p>




            <div class="textinput"><textarea name="debugFeedback" cols="92" rows="8" style="width: 100%; height: 120px; margin-top: 6px">
            </textarea>
            </div>

             <input name="debugPage" value="7" type="hidden"/>
            </div>



        <table cellspacing="0" cellpadding="0" border="0" width="100%" class="submitButtons" id="buttonsAuto">
        <colgroup>
            <col width="50%">
            <col width="50%">
            </colgroup> 
            <tbody>
                <tr>
                <td class="buttonBack"></td>
                <td class="buttonNext">
                    <input class="button" name="submitNext" id="submit0" type="submit" value="Weiter" title="Weiter"/>
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
                    <div class="progress" style="width: 88%;"</div>
                    <div class="progresstext">88% ausgefüllt
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

</html>