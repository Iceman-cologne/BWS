<?php
error_reporting(E_NONE);
ini_set("display_errors", 0);
session_start();
$interviewID = session_id();
$debugFeedback ="";
$file_feedback ="feedback/" . $interviewID . ".json";
$current ="";


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
    <link rel="stylesheet" type="text/css" href="css/cssIndex4.css"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"/>
    <script src="Scripts/jquery-2.0.3.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script type="text/javascript" src="Scripts/SoSciTools.1186.js"/></script>
    <script type="text/javascript" src="Scripts/SoSciEnhancedInputs.1185.js"/></script>
    

    <style type="text/css">
        h2.debug { background-color: #BBAABB; color: #FFFFFF; padding: 2px 10px 0px 10px; margin-bottom: 0px }
        div.debug   { margin: 0px 0px 32px 0px; padding: 8px 8px 6px 8px; border: 2px solid #BBAABB; color: #999999 }
        div.debug p { margin: 0px 0px 7px 0px }
        h2.debug, div.debug { }
    </style>


<style type="text/css">
            div.SoSciDebug.question,
            div.SoSciDebug.textelement {
                position: relative; width: 100%; font-family: Verdana, Arial, sans-serif; font-size: 12px; font-weight: normal; color: #000000;
            }
            div.SoSciDebug.question:hover,
            div.SoSciDebug.question:focus {
                z-index: 10
            }
            div.SoSciDebug.question div.container,
            div.SoSciDebug.textelement div.container {
                position: absolute;
                width: 60px; top: -8px;
                left: 100%;
                padding-left: 20px;
            }
            div.SoSciDebug.textelement div.container {
                min-width: 60px; width: auto;
                left: 100%;
                padding-left: 20px;
            }
            div.SoSciDebug.question.notes div.container,
            div.SoSciDebug.question div.container:hover {
                width: 200px;
            }
            div.SoSciDebug.textelement div.container:hover {
                min-width: 200px;
            }
            div.SoSciDebug.question.inside div.container,
            div.SoSciDebug.question.notes.inside div.container {
                width: 60px; left: auto; right: 0;
                opacity: 0.6;
                padding-left: 0;
            }
            div.SoSciDebug.textelement.inside div.container {
                min-width: 60px; width: auto; left: auto; right: 0;
                opacity: 0.6;
                padding-left: 0;
            }
            div.SoSciDebug.question.inside:hover div.container,
            div.SoSciDebug.question.notes.inside:hover div.container {
                width: 200px;
            }
            div.SoSciDebug.textelement.inside:hover div.container {
                min-width: 200px;
            }

            div.SoSciDebug.question div.container div.ballot,
            div.SoSciDebug.textelement div.container div.ballot {
                position: absolute;
                left: 0; top: 8px;
                width: 21px; height: 13px;
                background-image:url(https://www.soscisurvey.de//layout/debug.ballot.svg);
                background-repeat: no-repeat;
            }
            div.SoSciDebug.question.pretest div.container div.ballot,
            div.SoSciDebug.textelement.pretest div.container div.ballot {
                background-image:url(https://www.soscisurvey.de//layout/pretest.ballot.svg);
            }
            div.SoSciDebug.question.inside div.container div.ballot,
            div.SoSciDebug.textelement.inside div.container div.ballot {
                display: none;
            }
            div.SoSciDebug.question div.label,
            div.SoSciDebug.textelement div.label {
                padding: 2px 6px;
                font-weight: bold;
                white-space: nowrap;
            }
            div.SoSciDebug.question div.box,
            div.SoSciDebug.textelement div.box {
                margin: 0;
                box-sizing: border-box; -webkit-box-sizing: border-box; -moz-box-sizing: border-box;
                background-color: #FFCC00;
                border: 1px solid #999999; border-radius: 4px 4px; -moz-border-radius: 4px; -webkit-border-radius: 4px
            }
            div.SoSciDebug.question.pretest div.box,
            div.SoSciDebug.textelement.pretest div.box {
                background-color: #BBAABB;
            }

            div.SoSciDebug.question div.notes {
                margin: 1px;
                background-color: #FFEE66;
                font-size: 10px; padding: 3px; min-height: 56px; height: 56px; overflow: hidden
            }
            div.SoSciDebug.question div.notes.empty { display: none }
            div.SoSciDebug.question div.notes.changed { border-color: #FF9900 }
            div.SoSciDebug.question div.notes.error { border-color: #FF0000 }
            div.SoSciDebug.question div.notes p { font-size: inherit; margin: 4px 0 }
            div.SoSciDebug.question div.notes p:first-child { margin-top: 0 }
            div.SoSciDebug.question div.notes p:last-child { margin-bottom: 0 }
            div.SoSciDebug.question div.notes:hover,
            div.SoSciDebug.question div.notes:focus { height: auto; background-color: #FFFFFF }
            div.SoSciDebug.question div.notes.empty:focus { display: block }
            div.SoSciDebug.question:hover div.notes { height: auto }
            div.SoSciDebug.question:hover div.notes.empty { display: block }
</style>



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
    
<!-- JavaScript to check the mandatory fields -->
<script type="text/javascript">
    function chkFormular() {
  if (document.Formular.question1.value == "") {
    alert("Bitte in das ertse Feld etwas eingeben!");
    document.Formular.question1.focus();
    return false;
  }
if (document.Formular.question3.value == "") {
    alert("Bitte in das zweite Feld etwas eingeben!");
    document.Formular.question3.focus();
    return false;
  }}

  </script>

</head>
<body>

<div class="questionary">
    <form name="Formular" action="index5.php" method="POST" accept-charset="UTF-8" autocomplete="off" id="questionnaireForm" onsubmit="return chkFormular()">
            <div class="invisible">
                <input type="hidden" name="page" value="5"/>
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
        <div style="clear:both;">
        </div>
 <hr style="margin-top: 12px;">
   
<h1>Relevanz von ITO</h1>
        <p>Die folgenden Fragen beschäftigten sich mit der allgemeinen Relevanz von ITOProjekten für Ihre Organisation.</p>
        <p>
        <strong>Die Auswertung der Fragen erfolgt anoym und unter Einhaltung der Bestimmungen des Datenschutzgesetzes.</strong>
        </p>
        <p>
        Bitte versuchen Sie die Fragen
        <strong>spontan</strong>
        und in Form von
        <strong>Stichpunkten</strong>
        oder
        <strong>kurzen Sätzen</strong>
        zu beantworten.
        </p>
        <br/>
        <br/>

        <!-- Mandatory field "question1" -->
       <div class="SoSciDebug question pretest">
    <div class="container">
        <div class="ballot"></div>
        <div class="box">
            <div class="label">
            A001

            </div>
        </div>
    </div>
      </div>
       <div id="A001_qst" class="spacing">
          <div class="title">
            <p><label for="A001_01">Welche Ergebnisse sind im Rahmen von ITO-Projekten in Ihrer Organisation relevant?</label></p>
          </div>
            <div class="titlesSpacing"/>
            <table class="question" id="A001_tab" border="0" cellpadding="0" cellspacing="0" width="100%">
                <tbody>
                    <tr class=" hover shadeF1">
                        <td class="text input textinput left">
                            <div class="textinput">
                        <textarea name="question1" style="width: 100%; height: 80px;"></textarea>
                          </div>
          
                        </td>
                    </tr>
                </tbody>
            </table>
   <div class="SoSciDebug question pretest">
      <div class="container">
      <div class="ballot"></div>
      <div class="box">
  <div class="label">
  A003

</div>
  </div>
    </div>
  </div>
  <div id="A003_qst" class="spacing">
    <div class="title">
      <p>
      <label for="A003_01">Was vermissen Sie bei Ihrer täglichen Arbeit im Rahmen von ITO-Projekten von Ihrer Organisation (bspw. Arbeitsmaterial oder haben Sie Probleme bei Prozessen etc.)?</label>
      </p>
    </div>



<table class="question" id="A003_tab" border="0" cellpadding="0" cellspacing="0" width="100%">
  <tbody>
    <tr class=" hover shadeF1">
      <td class="text input textinput left">
        <div class="textinput">
          <textarea name="question3" style="width: 100%; height: 80px;"></textarea>
        </div>
      </td>
    </tr>
  </tbody>
</table>
    

<!-- Debug textfield -->
<h2 class="debug">Anmerkungen zu Seite 4</h2>
    <div class="debug">
        <p>Sie testen den Fragebogen gerade im Pretest-Modus.</p>
        <p>Fanden Sie auf dieser Seite irgend etwas unverständlich,
        missverständlich oder unklar? Sehen Sie noch irgendwelche Fehler?
        Bitte schreiben Sie hier <strong>alles</strong> auf, was Ihnen auffällt.</p>
        <p>Vielen Dank.</p>

    <div class="textinput">
        <textarea name="debugFeedback" cols="92" rows="8" style="width: 100%; height: 120px; margin-top: 6px">
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
          <td class="buttonNext">
              <input class="button" name="submitNext" id="submit0" type="submit" value="Weiter" title="Weiter"/>
          </td>
        </tr>
      </tbody>
    </table>

<hr style="margin-bottom: 14px;">
  <table border="0" cellspacing="0" cellpadding="0" style="margin-bottom: 24px;">
    <colgroup>
      <col width="350">
      <col width="50">
      <col width="200">
    </colgroup>
    <tbody>
      <tr>
          <td><a href="mailto:nikolaus.schmidt@wiso.uni-koeln.de">Nikolaus Schmidt (Wissenschaftlicher
                Mitarbeiter)</a> <br> <a href="mailto:asunay@smail.uni-koeln.de">Aysun Sunay
                (Master-Student)</a><br>
                Universität zu Köln – 2015
          </td>
          <td></td>
          <td>
            <div class="progressbar">
              <div class="progress" style="width: 38%;"></div>
              <div class="progresstext">38% ausgefüllt
              </div>
            </div>
          </td>
      </tr>
      </tbody>
    </table>
  <div>
        <input name="zomplete" value="yes" type="hidden">
  </div>
</form>

    

<script language="JavaScript" type="text/javascript" src="Scripts/SoSciAJAX.js"></script>

<script>
<!--
// Automatically shift labels to the inside, if there is not enough space (200px)
function alignLabels(evt) {
    var divs = document.getElementsByTagName("div");
    for (var i=0; i<divs.length; i++) {
        if (divs[i].classList.contains("SoSciDebug") && (
            divs[i].classList.contains("question") || divs[i].classList.contains("textelement")
        )) {
            divs[i].classList.remove("inside");
            var pos = SoSciTools.getNodePos(divs[i]);
            var right = (window.innerWidth - pos.x - divs[i].offsetWidth);
            // Check space on the right (if placed right)
            if (right < 200) {
                divs[i].classList.add("inside");
            }
        }
    }
}
alignLabels(null);
SoSciTools.attachEvent(window, "resize", alignLabels);


        // Store edits in the notes
        function getNoteContent(note) {
            var content = note.innerHTML;
            content = content.replace(/[\r\n]+/g, "");
            content = content.replace(/<br>|<br\s*\/>/g, "\n");
            content = content.trim();
            return content;
        }
        function onNoteChangeCallback(status, data, ref) {
            var note = ref.note;
            // Change status display
            note.classList.remove("changed");
            if (status == "ok") {
                note.classList.remove("error");
                note.storedContent = ref.content;
            } else {
                note.classList.add("error");
            }
        }
        function onNoteChange(note) {
            if (note.changeTimer) {
                window.clearTimeout(note.changeTimer);
            }
            var noteID = note.getAttribute("id");
            if (noteID.substr(0, 6) != "notes_") {
                alert("Warning: Cannot store note due to invalid ID " + noteID);
            }
            var qLabel = noteID.substr(6);
            // Decode HTML
            var content = getNoteContent(note);
            // Update "empty" class
            if (content == "") {
                note.classList.add("empty");
            } else if (note.classList.contains("empty")) {
                note.classList.remove("empty");
            }
            // Check if any change occured
            if (note.storedContent == content) {
                note.classList.remove("changed");
            } else {
                // Tell server to do the update
                var request = {
                    o : "question.ajax",
                    a : "notes.update",
                    el : qLabel,
                    cn : content
                }
                var reference = {
                    note : note,
                    content : content
                }
                var ajax = new SoSciAJAX("../admin/index.php", request, onNoteChangeCallback, reference);
            }
        }
        function onNoteKey(evt) {
            var note = SoSciTools.getSender(evt);
            // Make unsaved change visible
            if (!note.classList.contains("changed")) {
                note.classList.add("changed");
            }
            // Create timeout
            if (note.changeTimer) {
                window.clearTimeout(note.changeTimer);
            }
            note.changeTimer = window.setTimeout(function(evt) { onNoteChange(note); }, 1000);
        }
        // Add class "notes" to parental DIV als long as editing is active
        function onNoteFocus(evt) {
            var note = SoSciTools.getSender(evt);
            note.hasFocus = true;
            refreshNoteClasses(note);
        }
        // Remove class "notes" from parent, if note is empty
        function onNoteBlur(evt) {
            var note = SoSciTools.getSender(evt);
            note.hasFocus = false;
            refreshNoteClasses(note);
        }
        function refreshNoteClasses(note) {
            var content = getNoteContent(note);
            var container = note.noteQuestion;
            if ((content == "") && !note.hasFocus) {
                container.classList.remove("notes");
            } else {
                container.classList.add("notes");
            }
        }
        function initNotes() {
            // Find the question labels
            var divs = document.getElementsByTagName("div");
            var qLabels = [];
            for (var i=0; i<divs.length; i++) {
                if (divs[i].classList.contains("SoSciDebug") && divs[i].classList.contains("question")) {
                    qLabels.push(divs[i]);
                }
            }
            // Find the notes
            var notes = [];
            for (var i=0; i<qLabels.length; i++) {
                var subs = qLabels[i].getElementsByTagName("div");
                for (var j=0; j<subs.length; j++) {
                    if (subs[j].classList.contains("notes")) {
                        subs[j].noteQuestion = qLabels[i];
                        notes.push(subs[j]);
                    }
                }
            }
            // Init the notes
            for (var i=0; i<notes.length; i++) {
                SoSciTools.attachEvent(notes[i], "keyup", onNoteKey);
                SoSciTools.attachEvent(notes[i], "focus", onNoteFocus);
                SoSciTools.attachEvent(notes[i], "blur", onNoteBlur);
                notes[i].storedContent = getNoteContent(notes[i]);
                refreshNoteClasses(notes[i]);
            }
        }
        initNotes();

        // -->

</script>


<script>
<!--
var SoSciPage = SoSciTools.getPage();  // Instance of SoSciTools.Questionnaire()
var oFbQuestionnaireForm = SoSciPage;
SoSciTools.registerFocus();
SoSciTools.catchEnter();
SoSciEnhancedInputs.instance.initSensitive();
SoSciTools.attachFormInfo();
/**
              * Show warning is browser back button is used
              * or browser window is about to close.
              */
            function oFbCatchLeave() {
                var doWarn = true;
                var qForm = document.getElementById("questionnaireForm");
                var orgSubmit = qForm.submit;

                function warning() {
                    if (doWarn) {
                        var message = "Dies führt u.U. zum Abbruch der Befragung.";
                        return message;
                    } else {
                        // Do not show a warning
                        return;
                    }
                }

                // Must allow to leave the form sometimes
                function oFbAllowLeave() {
                    doWarn = false;
                }

                // (1) Do not warn if form is submitted
                SoSciTools.attachEvent(qForm, "submit", oFbAllowLeave);

                // (2) Neither show warning if form.submit() is used
                qForm.submit = function(evt) {
                    oFbAllowLeave();
                    if (orgSubmit.apply) {
                        orgSubmit.apply(qForm);
                    } else {
                        // Fallback for whoever
                        orgSubmit();
                    }
                }

                // Activate catcher
                window.onbeforeunload = warning;
            }

            // Activate the catcher
            oFbCatchLeave();
            

// -->
</script>



</div>
</body>
<script>
    localStorage.setItem('Firebug','1,1,safari-extension://com.slicefactory.firebug-M6DQ5JZ52E/d46478da/')
</script>
<script type="text/javascript">
var firebugExtensionURL='safari-extension://com.slicefactory.firebug-M6DQ5JZ52E/d46478da/'
</script>
    <script src="safari-extension://com.slicefactory.firebug-M6DQ5JZ52E/d46478da/googleChrome.js"/> 
</html>