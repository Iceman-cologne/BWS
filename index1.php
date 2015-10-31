<?php

error_reporting(E_NONE);
ini_set("display_errors", 0);
session_start();
$interviewID = session_id();
$debugFeedback ="";
$password="test";
$login= false;
$file_feedback ="feedback/" . $interviewID . ".json";
$current ="";
$counterstand =0;
$feedback_json = "";
$page ="1";

//Open data for counter as txt. file 
$datei = fopen("counter.txt", "r+");
$counterstand = fgets($datei, 100);
$counterstand = intval($counterstand);

    if ($counterstand >=12) {
        $counterstand = 0;
    }
    if(!isset($_SESSION['counter_ip'])) {
    $counterstand++;
    $datei = fopen("counter.txt", "w+");
    rewind($datei);
    fwrite($datei, $counterstand);
    $_SESSION['counter_ip'] = true; 
    echo $counterstand;
    fclose($datei); 
    }

// Password validation
    if (isset($_POST['password']) && $_POST['password'] == $password) {   
    } else {  
    header('Location:index.php'); 
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

<!-- Html code -->  
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>Fragebogen</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="Scripts/jquery-2.0.3.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    
<!-- css inline style for index1.php -->
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
        <form action="index2.php" method="POST" accept-charset="UTF-8" autocomplete="off" id="questionnaireForm">
            <div class="invisible">
                <input type="hidden" name="page" value="2"/>
                <input type="hidden" name="counter" value="<?php echo $counterstand; ?>"/>
            </div>

 <!-- header -->
    <div style="margin-top: 18px">
        <div style="float:left;width:70%">
            <strong>Universität zu Köln</strong><br><br>
            Professur für Wirtschaftsinformatik<br>
            und integrierte Informationssysteme<br>
            Prof. Dr. Christoph Rosenkranz
        </div>
        <div style="float:right;width:30%;text-align:right;">
            <img src="https://www.soscisurvey.de/Innovationen_in_ITO/logo.ger.0311.jpg" alt="logo">
        </div>
        <div style="clear:both;"></div>
    </div>
    <!-- Headline -->
    <hr style="margin-top: 12px;">
        <h1>Evaluation von Faktoren zur Innovationsgewinnung in ITO-Projekten</h1>
            <p>Im Rahmen der folgenden Befragung, möchten wir versuchen, ein besseres wissenschaftliches Verständnis 
            für die Wichtigkeit von einzelnen Faktoren zur Förderung von Innovationen im Rahmen von IT-Outsourcing-Projekten 
            zu erlangen.</p>
            <p>
                <strong>Die Auswertung der gesamten Studie erfolgt anoym und unter Einhaltung der Bestimmungen des
                Datenschutzgesetzes.</strong>und im Rahmen eines wissenschaftlichen Papiers anonymisiert veröffentlicht.
                <br/>
                <br/>
                Die folgende Befragung basiert auf den von Boehm, Michalik, Schmidt und Basten erarbeiteten Faktoren mit
                Einfluss auf die Innovationsgewinnung in IT-Outsourcing- Projekten aus ihrer Arbeit "Innovate on 
                Purpose - Factors Contributing to Innovation in IT Outsourcing" (2014).</p>
                <br/>

            <p style="text-align: center;">
            Universtität zu Köln
            <br/>
            Professur für Wirtschaftsinformatik und integrierte Informationssysteme
            <br/>
            Direktor: Prof. Dr. Christoph Rosenkranz
            <br/>
            Pohligstr. 1, 50969 Köln
            </p>
            <br/>

            <p style="text-align: center;">
            Ansprechpartner:
            <br/>
            Nikolaus Schmidt (Wissenschaftlicher Mitarbeiter) nikolaus.schmidt@wiso.unikoeln. de
            <br/>
            Aysun Sunay (Master-Student) asunay@smail.uni-koeln.de
            </p>
            <br/>
            <p style="text-align: center;">Pretest im Rahmen der Masterthesis: Empirische Überprüfung eines Frameworks zur Förderung Innovationen in IT-Outsourcing Projekten</p>

        <!-- Debug textfield -->
        <h2 class="debug">Anmerkungen zu Seite 1</h2>
            <div class="debug">
                <p>Sie testen den Fragebogen gerade im Pretest-Modus.</p>
                <p>Fanden Sie auf dieser Seite irgend etwas unverständlich,
                missverständlich oder unklar? Sehen Sie noch irgendwelche Fehler?
                Bitte schreiben Sie hier <strong>alles</strong> auf, was Ihnen auffällt.</p>
                <p>Vielen Dank.</p>

                <div class="textinput">
                <textarea name="debugFeedback" cols="92" rows="8" style="width: 100%; height: 120px; margin-top: 6px"></textarea>
                </div>
                <input name="debugPage" value="1" type="hidden"/>
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

    <!-- Footer -->
    <hr style="margin-bottom: 14px;">
    <table border="0" cellspacing="0" cellpadding="0" style="margin-bottom: 24px;">
        <colgroup>
            <col width="350">
            <col width="50">
            <col width="200">
        </colgroup>
        <tr>
            <td>
                <a href="mailto:nikolaus.schmidt@wiso.uni-koeln.de">Nikolaus Schmidt (Wissenschaftlicher
                Mitarbeiter)</a> 
                <br> 
                <a href="mailto:asunay@smail.uni-koeln.de">Aysun Sunay
                (Master-Student)</a>
                <br>
                Universität zu Köln – 2015
            </td>
            <td></td>
            <td>
                <div class="progressbar">
                    <div class="progress" style="width: 0%;"</div>
                        <div class="progresstext">0% ausgefüllt</div>
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