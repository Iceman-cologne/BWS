<?php

error_reporting(E_NONE);
ini_set("display_errors", 0);
class Config
{
    public static $factors = array('',
        'Der Auftraggeber hat bereits Erfahrungen mit Generierung von Innovationen in IT Outsourcings gesammelt',
        'IT als Treiber für den Unternehmenserfolg',
        'Kommunikation zwischen Geschäftsbereichen und der IT',
        'Existenz einer aus der Unternehmensstrategie ableitbaren Innovation-Sourcing-Strategie',
        'Klare Fokussierung auf die Generierung von Innovation innerhalb eines Outsourcing-Projektes',
        'Vertragsbasierte Beteiligung an Risiko und Rendite',
        'Neue Formen der Vertragsgestaltung, welche die Innovationsgewinnung festhalten',
        'Effektives Konfliktmanagement',
        'Vereinbarte Richtlinien für den Wissensaustausch',
        'Einsatz von Vermittlern Broker zur Erleichterung der Interaktion',
        'Einsatz einer verantwortlichen Einzelperson oder Gruppe "Master of Process"',
        'Existenz einer Roadmap für Innovation',
        'Geographische Entfernung zwischen Auftraggeber und Dienstleister',
        'Technologische Kompabilität zwischen Auftraggeber und Dienstleister',
        'Vernetzung und Zusammenarbeit des Dienstleisters mit anderen Auftraggebern in der Branche',
        'Size matters  Unternehmensgröße des Dienstleisters',
        'Innovationsneigung des Dienstleisters',
        'Fähigkeit Informationen wahrzunehmen und anzuwenden',
        'Übereinstimmung des Wissenstands der Mitarbeiter beider Organisationen',
        'Kompatibilität der Organisationskulturen',
        'Kompatibilität der Innovation Roadmap des Dienstleisters und des Auftraggebers',
        'Proaktivität des Dienstleisters',
        'Entwicklung einer gemeinsamen Vision',
        'Gebrauch von Boundary Objects',
        'Bewertungskatalog zur Beurteilung des Dienstleisters innerhalb der Verhandlungsphase',
        'Hohes Maß an Vertrauen zwischen Auftraggeber und Dienstleister',
        'Strategische Portfolioplanung von IT Innovationen und zugehörigen Investments',
        'Bereitstellung der Infrastruktur um Innovation zu ermöglichen',
        'Messung und kontinuierliches Nachverfolgen der Innovationskraft sowie Veröffentlichen des Status Quo',
        'Durch Flexibilität und Anpassungsfähigkeit geprägte Beziehung zwischen Auftraggeber und Dienstleister',
        'Mitarbeiterschulungen bezüglich Innovationen',
        'Bildung von zwischenbetrieblichen und multifunktionalen Teams',
        'Projektabschluss und Evaluierung des Dienstleisters',
        'Starke Führung durch Auftraggeber',
        'Unterstützung des Top Management über den gesamten Lebenszyklus des Sourcing-Projektes hinweg',
        'Kontinuierlicher Informationsaustausch und Projektausfuührung auf allen Management-Ebenen',
        'Wissensmanagement auf Seiten des Auftraggebers',
        'Win-Win-Situation',
        'Knowledge-Sharing des Auftragnehmers und Auftraggebbers',
        'Zuordnung der Führungskräfte zu einem Paar'
);

    public static $descriptions = array("",
        "Beschreibt, dass der Auftraggeber bereits Erfahrungen mit Innovationsgewinnung in ITO-Projekten gesammelt hat.",
        "Mit jedem weiteren ITO-Projekt, welches der Auftraggeber durchführt, kann er an alte Erfahrungen anknüpfen und aus diesen lernen.",
        "Beschreibt, dass die IT Abteilung als ein Treiber für den Unternehmenserfolg angesehen wird und nicht ausschließlich als Kostenstelle.",
        "Beschreibt, dass ein guter Kommunikationsfluss zwischen der IT Abteilung und anderen Geschäftsbereichen das Verständnis der geschäftsspezifischen Probleme und Herausforderungen des Unternehmens erhöht. Dies kann zu einer verbesserten Identifizierung und Implementierung von Innovationen führen.",
        "Beschreibt, dass die Innovation-Sourcing-Strategie ein wichtiges Element der Technologiestrategie ist. Sie spezifiziert, welche Innovationen oder welche Teile des Innovationsprozesses extern beschafft werden, wie man diese implementiert und woher diese zu beziehen sind.",
        "Beschreibt eine klare Fokussierung auf die Generierung von Innovation innerhalb eines Outsourcing-Projektes und nicht auf die Reduktion der Kosten. Liegt der Fokus auf Kostenreduktion, wird der DIenstleister keine Kapazitäten haben, um auch noch Innovation zu generieren.",
        "Beschreibt die vertragliche Regelung, dass beide Parteien (Auftraggeber und Dienstleister) an Risiken und Renditen aus dem Projekt beteiligt sind. ITO-Projeke,in denen zusätzlich Innovationen generiert werden sollen, sind einem noch höheren Risiko ausgesetzt.",
        "Beschreibt, dass bei der Gestaltung von ITO-Projektverträgen Anreize geschaffen werden sollten, die die Generieung von Innovationen begünstigen (bspw. Austausch von Wissen und Best Practices zwischen Auftraggeber und Dienstleister)",
        "Beschreibt, dass flexible Konfliktlösungs-/ und Anpassungs-Prozesse (z.B. definierte Eskalationsprozesse) eingesetzt werden, um die kontinuierliche Zusammenarbeit zwischen Auftraggeber und Dienstleister sicherzustellen.",
        "Beschreibt, dass sich Wissensaustausch zwischen Auftraggeber und Dienstleister positiv auf die Innovationsleistung auswirkt. Um die Generierung von Innovation in ITO-Projekten zu stärken, können Richtlinien aufgestellt werde, die einen Wissenaustausch fördern.",
        "Beschreibt, dass zwischen dem Auftraggeber und Dienstleister unparteiische Vermittler (\"Broker\") bei der Kommunikation helfen und gemeinsames Verständnis ermöglichen.",
        "Beschreibt, dass eine Einzelperson oder Gruppe, welche über  detailliertes Wissen über internen Geschäftsprozessen und entsprechende Kompetenzen aufweist, bei der Wahl eines passenden Dienstleisters eingesetzt werden.",
        "Die Innovation Roadmap definiert die zu erzielenden Innovationen und wie diese zu erreichen sind (bspw. in welche Technologien investiert werden sollen) - nur aus Auftraggebersicht.",
        "Beschreibt die geographische Entfernung (z.B. Nearshore / Offshore) bei der Zusammenarbeit von Teams in ITO-Projekten. Die Qualität der Zusammenarbeit nimmt mit geringerer geographischen Entfernung zu.",
        "Beschreibt, dass Auftraggeber und Dienstleister ähnliche technologische Fähigkeiten haben. Dies kann zu einer besseren Kommunikation untereinander führen, die wiederum die Innovationsfähigkeit fördert.",
        "Beschreibt die Vernetzung und Zusammenarbeit des Dienstleisters mit anderen Auftraggebern in der gleichen Branche. Umso höher die Vernetzung des Dienstleisters mit anderen Auftraggebern ist, umso wahrscheinlicher, dass sie die branchenspezifische Herausforderungen kennen.",
        "Beschreibt, dass große Dienstleister besser Innovationen fördern. Je größer das Unternehmen ist, desto häufiger und größer sind die Innovationen.",
        "Beschreibt die Fähigkeit des Dienstleisters Innovationen zu generieren. Berücksichtigt die Haltung des Dienstleisters bzgl. Innovation, u.a. die Behandlung von Belohnungsstrukturen für innovative Mitarbeiter.",
        "Beschreibt die Fähigkeit, den Wert von neuen Informationen zu erkennen, diese zu verarbeiten und anzuwenden, dass sie auch eine Wertsteigerung im eigenen Unternehmen zur Folge hat.",
        "Beschreibt, dass sich das Wissen der Mitarbeiter von Auftraggebern und Dienstleistern ergänzen. Je höher die Übereinstimmung des Wissens vom Auftraggeber und Dienstleister ist, desto eher können beide Seiten von der gegenseitigen Kooperation profitieren.",
        "Beschreibt, dass die Unternehmenskulturen von Auftraggeber und Dienstleister Auswirkung auf den gemeinsamen Innovationsprozess haben. Dies setzt voraus, dass in den Organisationskulturen Innovationen wertgeschätzt werden.",
        "Beschreibt, wie gut die Ziele und Aktivitäten der Innovation Roadmap zwischen Auftraggeber und Dienstleister vereinbar sind (innerhalb der Verhandlungsphase).",
        "Beschreibt die Fähigkeit des Dienstleisters, aus eigenen Antrieb Konzepte für Innovationen zu entwickeln und sie zu kommunizieren.",
        "Beschreibt, dass Auftraggeber und Dienstleister zusammen an einer Vision arbeiten und dies setzt vorraus, dass interne und externe Mitarbeiter dazu inspiriert werden, diese Atmosphäre zu erzeugen.",
        "Ein Boundary Object ist bspw.eine Technologie, ein Satz von Regeln oder Dokumente, welche sowohl dem Auftraggeber als auch dem Dienstleister vertraut sind und bei der Zusammenarbeit unterstützten. Diese stellen ein gemeinsames Verständnis zur Koordination von Zielen zwischen den Gruppen dar. Abhängig von der Art der Zusammenarbeit sollten verschiedene Typen von Boundary Objects zur Koordination zwischen den Gruppen gewählt werden.",
        "Beschreibt, dass in der Verhandlungsphase des ITO-Projektes ein Bewertungskatalog mit innovationsfokussierten Kriterien zur Beurteilung des Dienstleisters hinsichtlich der Gewinnung von Innovationen erstellt wird (z.B. Dienstleister hat eine eigene Abteilung für Innovationsförderung, Innovationen werden aktiv gemessen, etc.)",
        "Beschreibt, dass in ITO Innovation-Projekten im Gegensatz zu ITO-Projekten in denen es nur um Kostensenkung geht, ein größeres Vertrauen zwischen Auftraggeber und Dienstleister vorhanden ist oder aufgebaut werden muss.",
        "Beschreibt, dass Investitionen in ITO-Projekten strategisch geplant und über die gesamte Laufzeit gemanagent werden müssen, um die Generierung von Innovationen zielgerichtet im Projekt einzusetzen.",
        "Beschreibt, dass z.B. Innovationszentren oder Innovationsplattformen eingerichtet werden, um Innovationsgewinnung zu erzielen.",
        "Beschreibt die Messung und das kontinuierliche Nachverfolgen der Innovationskraft (z.B. \"Anzahl umgesetzter Innovationen im letzten Jahr\") sowie Veröffentlichungen des Status Quo",
        "Beschreibt, dass die Beziehung zwischen Auftraggeber und Dienstleister flexibel und anpassungsfähig ist. Feste Ziele werden definiert, der Weg zur Zielerreichtung wird aber nicht beschrieben.",
        "Beschreibt, dass durch gezielte Workshops und Schulungen Mitarbeiter in einem Team den Innovationsprozess gezielt lernen sowie kontrollieren und steuern können.",
        "Beschreibt, dass gemeinsame Teams zwischen Auftraggeber und Dienstleister gebildet werden, um Probleme in verschiedenen Geschäftsbereichen zu identifizieren, Verbesserungsvorschläge zu liefern und Innovationen zu generieren.",
        "Beschreibt die Durchführung eines Projektabschlusses nach jedem ITO-Projekt mit beispielsweise einer Bewertung des Dienstleisters hinsichtlich dem Grad der Innovationsgewinnung.",
        "Beschreibt, dass der Auftraggeber eine starke Führung bei Problemen im Rahmen des ITO-Pojektes verfolgt und nach neuen Wegen zur Problemlösung sucht. Adaptive Probleme können im Gegensatz zu technischen Problemen nicht einfach delegiert und überwacht werden.",
        "Beschreibt, dass das Top Management während der gesamten Projektlaufzeit das ITO-Projekt untersützt und im besten Fall durch einen hochrangigen IT Mitarbeiter geleitet wird.",
        "Beschreibt, wie die meisten Organisationen 3 Kontaktpunkte (Top-level mgmt., leitende Mitarbeiter, operative Mitarbeiter) zum Informationsaustausch und zur Projektausführung nutzen, um über den aktuellen Stand bezüglich Innovationen informiert zu sein.",
        "Beschreibt, dass der Auftraggeber strukturiert den Wissenszugewinn von ITO-Projekten verwaltet und zugänglich macht. Die Wissensmanagementstrategie beeinflusst die Generierung von Innovation, denn Wissen ist die Grundvoraussetzung von Innovation.",
        "Beschreibt, dass sowohl Auftraggeber als auch Dienstleister einen Mehrwert aus dem ITO-Projekt ziehen, wenn beide Parteien nicht nur ihre eigenen Interessen verfolgen, sondern auch die Interessen der jeweils anderen Partei ausreichend berücksichtigen.",
        "Beschreibt, dass Knowledge-Sharing gerade in ausgereiften Industrien die Innovation der Auftragnehmer sowie der Auftraggeber fördern kann.",
        "Ein Paar aus aussergewöhnlichen Gegenspielern aus der Organization der Auftraggeber und Aufftragnehmer."



    );
    
    public static $factors1= array(30,15, 33, 3, 18, 21, 7, 39, 19, 10, 34, 8, 27, 20, 13, 24, 32, 1, 36, 28, 
                                   6, 31, 4, 40, 2, 35, 25, 23, 9, 5, 26, 17, 37, 16, 12, 22, 11, 14, 38, 29);
    
    public static $factors2= array(40, 18, 33, 12, 24, 35, 34, 7, 14, 28, 17, 23, 29, 10, 16, 3, 13, 21, 15, 19,
                                   9, 38, 22, 27, 31, 1, 5, 25, 11, 30, 6, 26, 36, 2, 20, 8, 4, 32, 39, 37);
    
    public static $factors3= array(4, 29, 17, 30, 24, 6, 39, 37, 14, 10, 12, 32, 23, 31, 16, 11, 8, 35, 3, 5,
                                   7, 36, 19, 22, 2, 21, 40, 27, 33, 1, 13, 34, 15, 20, 26, 28, 35, 18, 38, 9);
    
    public static $factors4= array(23, 40, 29, 22, 3, 24, 39, 33, 4, 9, 34, 28, 10, 38, 2, 13, 6, 16, 17, 19, 
                                   37, 21, 5, 14, 12, 1, 20, 35, 8, 31, 26, 18, 32, 30, 7, 25, 36, 11, 15, 27);
    
    public static $factors5= array(3, 26, 40, 34, 33, 29, 28, 19, 7, 15, 6, 2, 5, 36, 28, 24, 4, 12, 23, 8, 16, 
                                    9, 21, 1, 20, 22, 14, 31, 27, 17, 32, 18, 10, 37, 35, 25, 30, 13, 11, 39);
    
    public static $factors6= array(9, 39, 40, 16, 23, 5, 20, 32, 17, 24, 8, 7, 18, 35, 4, 15, 11, 2, 28, 37, 1,
                                    30, 21, 22, 33, 10, 6, 27, 13, 34, 38, 31, 12, 36, 29, 14, 25, 3, 19, 14);
	
	public static $factors7= array(16, 38, 7, 28, 11, 19, 8, 1, 32, 24, 22, 3, 6, 29, 20, 25, 14, 34, 18, 27,
                                    5, 40, 15, 10, 36, 31, 35, 39, 17, 13, 12, 33, 21, 26, 2, 33, 4, 37, 30, 23);
	
	public static $factors8= array(4, 27, 1, 7, 29, 5, 39, 2, 11, 33, 9, 25, 13, 16, 14, 24, 26, 37, 18, 10, 8,
                                    32, 31, 15, 6, 34, 23, 36, 21, 28, 12, 3, 40, 35, 22, 17, 20, 30, 19, 38);
	
	public static $factors9= array(8, 28, 30, 27, 3, 6, 18, 1, 22, 10, 4, 11, 26, 39, 7, 14, 24, 31, 12, 2, 19,
                                    23, 9, 20, 36, 13, 40, 25, 21, 29, 34, 32, 33, 35, 5, 16, 37, 38, 15, 17);
	
	public static $factors10= array(34, 2, 30, 5, 28, 40, 32, 35, 37, 3, 9, 36, 39, 15, 23, 1, 11, 18, 19, 24,
                                    17, 20, 10, 21, 16, 4, 25, 26, 29, 27, 31, 7, 22, 8, 13, 33, 14, 12, 6, 38);
	
	public static $factors11= array(13, 1, 26, 37, 22, 28, 18, 5, 30, 10, 31, 17, 4, 33, 14, 36, 2, 16, 19, 32,
                                     7, 38, 3, 23, 20, 40, 34, 11, 9, 15, 29, 24, 8, 21, 35, 6, 27, 39, 25, 12);
	
	public static $factors12= array(1, 15, 2, 14, 38, 33, 31, 32, 6, 9, 28, 10, 3, 20, 4, 13, 12, 5, 7, 11, 24, 
                                    21, 25, 23, 39, 17, 34, 22, 18, 36, 30, 16, 26, 19, 35, 27, 8, 37, 29, 40);
	
	public static $factors13= array(28, 31, 2, 3, 40, 1, 24, 10, 17, 11, 36, 21, 34, 15, 12, 25, 27, 4, 5, 19, 
                                    18, 13, 29, 23, 22, 32, 26, 6, 14, 9, 30, 35, 20, 7, 33, 37, 8, 38, 39, 16);
	
	
    
    

    public static $factorObjects = array();
}

function __autoload($clsname)
{
    $path = "/html/test/php/";
    set_include_path(get_include_path() . PATH_SEPARATOR . $path);
    $file = str_replace("_", "/", $clsname) . ".php";
    include_once($file);
}