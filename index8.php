<?php

error_reporting(E_NONE);
ini_set("display_errors", 0);
session_start();
$interviewID = session_id();
$debugFeedback ="";
$file_feedback ="feedback/" . $interviewID . ".json";
$current ="";
$file_question2 ="feedback_end/" . $interviewID . ".txt";
$file_question1 ="feedback_checkbox/" . $interviewID . ".json";


//Offene Fragen A001_1 & A003_01
if (($_REQUEST['A402_information'] && $_REQUEST["A402_email"]) || ($_REQUEST['A402_customA'] && $_REQUEST["A402_email"])){
    $datei1 = fopen($file_question1, "w+");
    if(!$datei1) {

        die ("File could not be opened for writing.");
       } else {

         if ($_REQUEST['A402_information'] && $_REQUEST["A402_email"]){
          $text = "Befragter Nr." .$_REQUEST["counter"] . "\r\n";
          $text .= $_REQUEST['A402_information'] . "\r\n";
          $text .= $_REQUEST["A402_email"]; 

             fwrite($datei1, "$text");
         fclose($datei1); 
     }


          if ($_REQUEST['A402_customA'] && $_REQUEST["A402_email"]){
                $text = "Befragter Nr." .$_REQUEST["counter"] . "\r\n";
                $text .= $_REQUEST['A402_customA'] . "\r\n";
                $text .= $_REQUEST["A402_email"]; }
    

         fwrite($datei1, "$text");
         fclose($datei1);

         }  
       } 

    if ($_REQUEST["A401_01"]) {
    $datei = fopen($file_question2, "w+");
    if(!$datei) {

        die ("File could not be opened for writing.");
       } else {
         $text = "Befragter Nr." .$_REQUEST["counter"] . "\r\n";
         $text .= $_REQUEST["A401_01"];
        

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

    <h1>Vielen Dank für Ihre Teilnahme!</h1>
    <p>Wir möchten uns ganz herzlich für Ihre Mithilfe bedanken.</p>
    <p>Ihre Antworten wurden gespeichert, Sie können das Browser-Fenster nun schließen.</p>
    <div style="padding-bottom: 20px;"/>
    <div style="border: 2px solid rgb(255, 153, 0); padding: 2px 10px 0px; background-color: rgb(255, 153, 0); color: rgb(255, 255, 255); 
    font-weight: bold; margin: 42px 0px 0px;">Einladung zum Umfrage Panel</div>
    
    <div style="border: 2px solid rgb(255, 153, 0); padding: 0px 10px 8px; margin-bottom: 42px;">
        <p>Liebe Teilnehmerin,
        <br/>
        lieber Teilnehmer,</p>
        wir würden Sie gerne zu weiteren wissenschaftlichen Befragungen einladen. Das Panel achtet Ihre Privatsphäre, gibt Ihre E-Mail-Adresse 
        nicht an Dritte weiter und wird Ihnen pro Jahr maximal vier Einladungen zu qualitativ hochwertigen Studien zusenden.
    </p>
    <form action="https://www.playmachine.de/test" method="POST" style="margin: 0px;">

<colgroup>
<col width="60"/>
<col/>
<col width="160"/>
</colgroup>
    <tbody>
        <tr>
            <td style="vertical-align: middle; padding-right: 10px;">E-Mail:</td>
            <td>
                <input name="email" id="email" value="" style="width: 100%;" maxlength="255"/>
                <input type="hidden" name="a" value="register"/>
                <input type="hidden" name="r" value="https://www.soscisurvey.de"/>
            </td>
                <td style="vertical-align: middle; padding-left: 10px;">
                <input type="submit" value="Am Panel teilnehmen"/>
            </td>
        </tr>
    </tbod>
</table>
</form>
    <p>Sie erhalten eine Bestätigungsmail, bevor Ihre E-Mail-Adresse in das Panel aufgenommen wird (Double Opt-In). So wird s
    ichergestellt, dass niemand außer Ihnen Ihre E-Mail-Adresse einträgt.</p>
    <p><strong>Der Fragebogen, den Sie gerade ausgefüllt haben, wurde gespeichert. Sie können das Browserfenster selbstverständlich 
    auch schließen, ohne am Umfrage Panel teilzunehmen.</strong></p>  

</div>
<input name="debugPage" value="4" type="hidden"/>
        
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
                
            </td>
        </tr>
    </table>
    <div>
        <input name="zomplete" value="no" type="hidden">
    </div>
    </form>
</div>

</body>
</html>