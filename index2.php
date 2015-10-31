<?php

error_reporting(E_NONE);
ini_set("display_errors", 0);
session_start();
$interviewID = session_id();
$debugFeedback ="";
$file_feedback ="feedback/" . $interviewID . ".json";
$current ="";
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

<!-- Html part -->
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
        <form action="index3.php" method="POST" accept-charset="UTF-8" autocomplete="off" id="questionnaireForm">
            <div class="invisible">
                <input type="hidden" name="page" value="3"/>
                <input type="hidden" name="counter" value="<?php echo $_REQUEST['counter'] ?>"/>
            </div>

    <div style="margin-top: 18px">
        <div style="float:left;width:70%">
            <strong>Universität zu Köln</strong><br>
            <br>
            Professur für Wirtschaftsinformatik<br>
            und integrierte Informationssysteme<br>
            Prof. Dr. Christoph Rosenkranz
        </div>
        <div style="float:right;width:30%;text-align:right;">
            <img src="https://www.soscisurvey.de/Innovationen_in_ITO/logo.ger.0311.jpg" alt="logo">
        </div>
        <div style="clear:both;"></div>
    </div>


    <hr style="margin-top: 12px;">

    <h1>Begriffliche Grundlagen</h1>
    <p>Um im Verlauf des Fragebogens zu gewährleisten, dass zentrale Begrifflichkeiten und Thematiken einheitlich 
       verstanden werden, folgt für Sie auf dieser Seite eine Definition der wichtigsten Begriffe und konzeptionellen 
       Grundlagen.</p>
    <p/>
    <h2>Informationstechnologie-Outsourcing</h2>
    Informationstechnologie-Outsourcing (im folgenden ITO) wird als Aufgabe der IT bezogenen Leistungen, wie Softwareentwicklung 
    und Systemüberwachung einer Organisation an externe Auftragnehmer definiert. Im Austausch dazu bietet und steuert der 
    Auftragnehmer die IT-Produkte und IT-Service zu einem vorher vereinbarten Preis über einen vorher definierten Zeitraum.
    <br/>
    (<small> 
    <i>Jin Kim et. al. 2013. The mediatingrole of psychological contract breach in IS outsourcing: inter-firm governance 
        perspective.European Journal of Information Systems, 22(5), 529-547.</i>
    </small>)

    <p/>
    <p/>
    <h2>Innovation</h2>
    Eine Innovation ist eine neue Idee, die in neuen Produkten, Service oder Tätigkeiten umgesetzt wird, welche die     
    Wettbewerbslage der Organisation verbessert und einen zusätzlichen Mehrwert für die Organisation erzeugt. (Bspw. 
    der Einsatz von mobilen Endgeräten ei der Fließbandarbeit, die Entwicklung von vollautomatischen Packrobotern in der 
    Logistik, die Verwendung von neuen Schnittstellen für Software etc.)
    <br/>
    <small>
    <i>(Westerman, G. & Curley, M. 2008. Building It-Enabled Innovation Capabilities at Intel. MIS Quarterly Executive, 
        7(1), 33–48.)</i>
    </small>
    <p/>
    <p/>
    <h2>Innovationsförderung</h2>
    Innovationsförderung beschreibt im Rahmen dieses Fragebogens stets das Erzielen von Innovationen (s.o.) im Rahmen eines 
    ITO-Projektes auf Seiten des Kunden.
    <p/>

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
                <input name="debugPage" value="2" type="hidden"/>
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
                    <div class="progress" style="width: 13%;"</div>
                        <div class="progresstext">13% ausgefüllt
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