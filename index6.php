<?php

error_reporting(E_NONE);
ini_set("display_errors", 0);
include_once("config.inc.php");

session_start();
$interviewID = session_id();
$debugFeedback ="";
$file_feedback ="feedback/" . $interviewID . ".json";
$file_data = "data/" . $interviewID . ".json";
$current ="";
$history_json ="";
$same = false;



//if (!isset($_REQUEST["history"]))
  //  $_REQUEST["history"] = file_get_contents("data/" . $interviewID . ".json");





// Validate feedback textarea and open JSON file to save the comment     
if (isset($_REQUEST["debugFeedback"]) && !empty($_REQUEST["debugFeedback"])){
    $current = $_REQUEST["debugFeedback"];
    $feedback_json = json_encode($current); // encode to JSON 
    file_put_contents($file_feedback, $feedback_json, FILE_APPEND | LOCK_EX); //use of file_put_contents open and close JSON file
} else {
    file_put_contents($file_feedback, $debugFeedback);
}


$BestWorseScaling = new BestWorseScaling(ComparisonList::getArguments());

    //if (!empty($_REQUEST["history"])) {
        //$history = json_decode($_REQUEST["history"]);
        //foreach ($history as $ComparisonData) {
        //$ComparisonNew = new Comparison($ComparisonData->_id, $ComparisonData->_optionA, $ComparisonData->_optionB, $ComparisonData->_optionC, $ComparisonData->_optionD);
        //$ComparisonNew->setBest($ComparisonData->_best);
        //$ComparisonNew->setWorse($ComparisonData->_worse);

        //$BestWorseScaling->addComparison($ComparisonNew);
        //}
        //}

if (isset($_REQUEST["comp-id"]) && $_REQUEST["comp-value1"] && $_REQUEST["comp-value2"]) 
    $Comparison = new Comparison($_REQUEST["offset"], $_REQUEST["comp-a"], $_REQUEST["comp-b"], $_REQUEST["comp-c"], $_REQUEST["comp-d"]);
    $Comparison->setBest($_REQUEST["comp-value1"]);
    $Comparison->setWorse($_REQUEST["comp-value2"]);
    
    $BestWorseScaling->addComparison($Comparison);

    $history_json = json_encode($BestWorseScaling->getComparisons());
    file_put_contents($file_data, $history_json, FILE_APPEND | LOCK_EX);
    $nextID = (int)$_REQUEST["comp-id"];
    $Comparison = ComparisonList::getNext($nextID, $BestWorseScaling);


   

        //foreach ($history as $ComparisonData) {
        //$ComparisonNew = new Comparison($ComparisonData->_id, $ComparisonData->_optionA, $ComparisonData->_optionB, $ComparisonData->_optionC, $ComparisonData->_optionD);
        //$ComparisonNew->setBest($ComparisonData->_best);
        //$ComparisonNew->setWorse($ComparisonData->_worse);

        //$BestWorseScaling->addComparison($ComparisonNew);
        //}
        //}

    //if (isset($_REQUEST["comp-id"]) && $_REQUEST["comp-value1"] && $_REQUEST["comp-value2"]) 
    //$Comparison = new Comparison($_REQUEST["offset"], $_REQUEST["comp-a"], $_REQUEST["comp-b"], $_REQUEST["comp-c"], $_REQUEST["comp-d"]);
    //$Comparison->setBest($_REQUEST["comp-value1"]);
    //$Comparison->setWorse($_REQUEST["comp-value2"]);
    
    //$BestWorseScaling->addComparison($Comparison);

    //$history_json = json_encode($BestWorseScaling->getComparisons());
    //file_put_contents($file_data, $history_json, FILE_APPEND | LOCK_EX);
    //$nextID = (int)$_REQUEST["comp-id"];
    //$Comparison = ComparisonList::getNext($nextID, $BestWorseScaling);


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



<script type="text/javascript">
    function chkFormular() {
  if (document.Formular.A301.value == -9) {
    alert("Bitte in das ertse Feld etwas eingeben!");
    document.Formular.A301.focus();
    return false;
  }
if (document.Formular.A302_01.value == "") {
    alert("Bitte in das zweite Feld etwas eingeben!");
    document.Formular.A302_01.focus();
    return false;
  }
  if (document.Formular.A303_01.value == "") {
    alert("Bitte in das zweite Feld etwas eingeben!");
    document.Formular.A303_01.focus();
    return false;
}}

  </script>
</head>


<body>

    <div class="questionary">
        <form action="index7.php" name="Formular" method="POST" accept-charset="UTF-8" autocomplete="off" id="questionnaireForm" onsubmit="return chkFormular()">
            <div class="invisible">
                <input type="hidden" name="page" value="7"/>
                <input type="hidden" name="counter" value="<?php echo $_REQUEST['counter']; ?>"/>
                <input type="hidden" name="offset" value="<?php echo $offset; ?>"/>
                
               <!-- <input type="hidden" name="history" value='<?php echo $history_json; ?>'/>-->
              
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

    Abschließende Fragen
    <h1>Abschließende Fragen</h1>
    <p>Um ihre bisherigen Antworten in einem standardisierten Kontext zu anderen Befragten auszuwerten, benötigen 
    wir an dieser Stelle noch wenige persönliche Informationen zu Ihnen und Ihrer Organisation.</p>
    <p><strong>Die hier abgefragten Angaben werden selbstverständlich vertraulich behandelt und anonymisiert 
    verwendet.</strong></p>
    <p>Eine Veröffentlichung, die Rückschlüsse auf Ihre persönlichen Angaben zulässt wird nicht stattfinden. 
    Die an dieser Stelle erhobenen Daten werden – wie alle Daten aus diesem Fragebogen – im Rahmen der Analyse anonym und als großes Ganzes in Form von Durchschnittswerten veröffentlicht. Die Informationen zu Ihrer Person dienen lediglich einer feineren Gruppierung der von Ihnen angegebenen Daten und den Daten anderer Befragten.
    </p>

    <div id="A301_qst" class="spacing">
        <div class="title">
            <p>
                <span class="number">1.</span>
                <span class="numbered">In welcher Branche arbeiten Sie hauptsächlich im Zusammenhang mit ITO-Projekten?</span>
                </p>
    </div>
        <div class="titleSpacing"/>
        <table class="question" id="A301_tab" cellspacing="0" cellpadding="0" width="100%" border="0">
            <tbody>
                <tr class="shadeH0">
                    <td class="dropdown input">
                        <select name="A301" id="A301" size="1">
                            <option value="-9">[Bitte auswählen]</option>
                            <option value="Automobilindustrie">Automobilindustrie</option>
                            <option value="Bauwirtschaft">Bauwirtschaft</option>
                            <option value="Bergbau und Rohstoffe">Bergbau und Rohstoffe</option>
                            <option value="Bio- und Gentechnologie">Bio- und Gentechnologie</option>
                            <option value="Chemie und Pharmazie">Chemie und Pharmazie</option>
                            <option value="Elektrotechnik- und Elektronikindustrie<">Elektrotechnik- und Elektronikindustrie</option>
                            <option value="Energieversorgung">Energieversorgung</option>
                            <option value="Entsorgung und Recycling">Entsorgung und Recycling</option>
                            <option value="Ernährungsindustrie">Ernährungsindustrie</option>
                            <option value="Erziehung und Unterricht">Erziehung und Unterricht</option>
                            <option value="Feinmechanik und Optik">Feinmechanik und Optik</option>
                            <option value="Forschung und Entwicklung">Forschung und Entwicklung</option>
                            <option value="Freie Berufe">Freie Berufe</option>
                            <option value="Gesundheitswirtschaft">Gesundheitswirtschaft</option>
                            <option value="Grundstücks- und Wohnungswesen">Grundstücks- und Wohnungswesen</option>
                            <option value="Holz- und Möbelindustrie">Holz- und Möbelindustrie</option>
                            <option value="Informationstechnik und Telekommunikationstechnik">Informationstechnik und Telekommunikationstechnik</option>
                            <option value="Kredit- und Versicherungsgewerbe">Kredit- und Versicherungsgewerbe</option>
                            <option value="Kultur- und Kreativwirtschaf">Kultur- und Kreativwirtschaft</option>
                            <option value="Land- und Forstwirtschaft">Land- und Forstwirtschaft</option>
                            <option value="Luft- und Raumfahrt">Luft- und Raumfahrt</option>
                            <option value="Maritime Wirtschaft">Maritime Wirtschaft</option>
                            <option value="Maschinen- und Anlagebau">Maschinen- und Anlagebau</option>
                            <option value="Papier- und Druckindustrie">Papier- und Druckindustrie</option>
                            <option value="Pflegewirtschaft">Pflegewirtschaft</option>
                            <option value="Post">Post</option>
                            <option value="Schienenfahrzeugbau">Schienenfahrzeugbau</option>
                            <option value="Schuhindustrie8">Schuhindustrie</option>
                            <option value="Sportwirtschaft">Sportwirtschaft</option>
                            <option value="Stahl und Metall">Stahl und Metall</option>
                            <option value="Textil und Bekleidung">Textil und Bekleidung</option>
                            <option value="Tourismus">Tourismus</option>
                            <option value="Verkehr, Transport und Vermietung beweglicher Güter">Verkehr, Transport und Vermietung beweglicher Güter</option>
                            <option value="Andere">Andere</option>
                            </select>
                        </td>
                    </tr>
            </tbody>
        </table>
        </div>
        <div class="SoSciDebug question pretest">
            <div class="container">
           </br>
       </br>
</div>

<div id="A302_qst" class="spacing">
    <div class="title">
        <p>
<span class="number">2.</span>
<span class="numbered">
<label for="A302_01">Wie viele Jahre Berufserfahrung haben Sie mit ITO-Projekten?</label>
</span>
</p>
</div>
<div class="explanation">
<p>Geben Sie bitte eine Zahl an (1 oder 1,5 oder 2,25 etc.)</p>
</div>
<div class="titleSpacing"/>

<table class="question" id="A302_tab" border="0" cellpadding="0" cellspacing="0" width="100%">
    <tbody>
        <tr class=" hover shadeF1">
            <td class="text input textinput left">
                <input name="A302_01" id="A302_01" type="text" style="width: 80px;" value=""/>
Jahre
</td>
</tr>
</tbody>
</table>
</div>
<div class="SoSciDebug question pretest">

<div class="container">
</br>
</br>
</div>

<div id="A303_qst" class="spacing">

<div class="title">
    <p>
<span class="number">3.</span>


<span class="numbered">
<label for="A303_01">In welcher Position arbeiten Sie zur Zeit in Ihrem Unternehmen?</label>
</span>
</p>
</div>
<div class="titleSpacing"/>

<table class="question" id="A303_tab" border="0" cellpadding="0" cellspacing="0" width="100%">
    <tbody>
        <tr class=" hover shadeF1">
            <td class="text input textinput left">
                <div class="textinput">
<input name="A303_01" id="A303_01" type="text" style="width: 100%;" value=""/>
</div>
</td>
</tr>
</tbody>
</table>
</div>
    
    <h2 class="debug">Anmerkungen zu Seite 6</h2>

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

             <input name="debugPage" value="6" type="hidden"/>
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
                    <div class="progress" style="width: 75%;"</div>
                    <div class="progresstext">75% ausgefüllt
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