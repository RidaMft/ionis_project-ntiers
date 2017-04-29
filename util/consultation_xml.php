<?php

$dbLocation = 'mysql:dbname=archi_ntiers;host=localhost';
$dbUser = 'root';
$dbPass = 'root';
$db = new PDO($dbLocation, $dbUser, $dbPass);


$dbConsultations = $db->prepare("SELECT * FROM consultation");

$dbConsultations->execute();
$consultations = $dbConsultations->fetchAll(PDO::FETCH_ASSOC);


$xml = new XMLWriter();

//$xml->openURI("php://output");
$xml->openURI("consultations.xml");

$xml->startDocument('1.0','UTF-8');
$xml->setIndent(true);

$xml->startElement('consultations');

foreach ($consultations as $consultation) {
    $xml->startElement("consultation");
    $xml->startElement("id");
    //$xml->writeAttribute('id', $produit['id']);
    $xml->writeRaw($consultation['id']);
    $xml->endElement();

    $xml->startElement("login");
    $xml->writeRaw($consultation['login']);
    $xml->endElement();

    $xml->startElement("json");
    $xml->writeRaw($consultation['json']);
    $xml->endElement();

    $xml->startElement("date");
    $xml->writeRaw($consultation['date']);
    $xml->endElement();

    $xml->endElement();
}

$xml->endElement();

header('Content-type: application/xml; charset=utf-8');
header('Content-type: text/xml');
$xml->flush();
?>