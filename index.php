<?php

error_reporting(E_NONE);
ini_set("display_errors", 0);
session_start();
$interviewID = session_id();
?>

<!-- first page -->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>Fragebogen</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="Scripts/jquery-2.0.3.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    

   <!-- general css style for index.php -->
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

    <hr style="margin-top: 12px;">
    <div class="prompt">
    	<h1>Pretest</h1>
    	<p>Bitte geben Sie das Passwort für den Pretest des Fragebogens ein:</p>


    	<form action="index1.php" method="POST" autocomplete="off">
			<input type="hidden" name="q" value="base"/>
			<input type="hidden" name="page" value="1"/>
			<input autofocus type="password" name="password" id="password"  name="pw"  placeholder="password" style="width: 100px;"/>
			<input value="OK" type="submit"/>
		</form>
	</div>


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
        </tr>
    </table>
    <div>
        <input name="zomplete" value="yes" type="hidden">
    </div>
    </form>
</div>
</body>
</html>