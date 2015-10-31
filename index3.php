<?php

error_reporting(E_NONE);
ini_set("display_errors", 0);
session_start();
$interviewID = session_id();
$file_feedback ="feedback/" . $interviewID . ".json";
$current ="";
$debugFeedback =""; 
$feedback_json ="";


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
        <form action="index4.php" method="POST" accept-charset="UTF-8" autocomplete="off" id="questionnaireForm">
            <div class="invisible">
                <input type="hidden" name="page" value="4"/>
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
    <h1>Ablauf und Umfang des Fragebogens</h1>
        <table>
            <tbody>
                <tr>
                    <th style="display: table-cell; padding-right: 10px;">Seite</th>
                    <th style="">Inhalt</th>
                </tr>
                <tr>
                    <td>01</td>
                    <td>
                    <strong>Titelblatt</strong>
                    </td>   
                </tr>
                <tr>
                    <td>02</td>
                    <td>
                    <strong>Begriffliche Grundlagen</strong>
                    </td>   
                </tr>
                <tr>
                    <td>03</td>
                    <td>
                    <strong>Ablauf und Umfang des Fragebogens (aktuelle Seite)</strong>
                    </td>   
                </tr>
                <tr>
                    <td>04</td>
                    <td>
                    <strong>Einleitende Fragen</strong>
                      </br>
                      Auf dieser Seite möchten wir Sie bitten, zwei Einstiegsfragen zum Thema zu beantworten.v
                     </td>
                </tr>
                <tr>
                    <td>05</td>
                    <td>
                    <strong>Bewertung der Faktoren</strong>
                    </br>
                    Auf dieser Seite des Fragebogens werden Sie mit Hilfe von Best Worse Scaling alle Faktoren mit Einfluss auf 
                    die Innovationsgewinnung gegeneinander vergleichen und einstufen in "Am wichtisten! und "Am wenigsten wichtig". 
                    Um die Anzahl der Fragen so gering wie möglich zu halten, wird hier das Balance incomplete block design angewendet.
                    </td>   
                </tr>
                <tr>
                    <td>06</td>
                    <td>
                    <strong>Abschließende Fragen</strong>
                </br>
                    Hier möchten wir Ihnen gerne noch abschließende Fragen zur Studie stellen.
                    </td>   
                </tr>
                <tr>
                    <td>07</td>
                    <td>
                    <strong>Feedback</strong>
                    <br/>
                    Auf der letzten Seite haben Sie die Möglichkeit uns ein Feedback zu geben und bei Interesse 
                    Ihre Kontaktdaten für die Übermittlung der Ergebnisse der Studie zu hinterlassen.
                    </td>   
                </tr>
            </tbody>
        </table>
            <p>Das Beantworten der Fragen wird in der Regel zwischen 10 bis 15 Minuten Zeit in Anspruch nehmen.</p>
    
<!-- Feedback textfield -->
<h2 class="debug">Anmerkungen zu Seite 2</h2>

        <div class="debug">
            <p>Sie testen den Fragebogen gerade im Pretest-Modus.</p>
            <p>Fanden Sie auf dieser Seite irgend etwas unverständlich,
            missverständlich oder unklar? Sehen Sie noch irgendwelche Fehler?
            Bitte schreiben Sie hier <strong>alles</strong> auf, was Ihnen auffällt.</p>
            <p>Vielen Dank.</p>

        <div class="textinput"><textarea name="debugFeedback" cols="92" rows="8" style="width: 100%; height: 120px; margin-top: 6px">
        </textarea>
        </div>

        <input name="debugPage" value="3" type="hidden"/>
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
                    <div class="progress" style="width: 25%;"</div>
                    <div class="progresstext">25% ausgefüllt
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