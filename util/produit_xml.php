<?php

$dbLocation = 'mysql:dbname=archi_ntiers;host=localhost';
$dbUser = 'root';
$dbPass = 'root';
$db = new PDO($dbLocation, $dbUser, $dbPass);


$dbProduits = $db->prepare("SELECT * FROM produit");
// fetch all artists
$dbProduits->execute();
$produits = $dbProduits->fetchAll(PDO::FETCH_ASSOC);


$xml = new XMLWriter();

//$xml->openURI("php://output");
$xml->openURI("produits.xml");

$xml->startDocument('1.0','UTF-8');
$xml->setIndent(true);

$xml->startElement('produits');

foreach ($produits as $produit) {
    $xml->startElement("produit");
    $xml->startElement("id");
    //$xml->writeAttribute('id', $produit['id']);
    $xml->writeRaw($produit['id']);
    $xml->endElement();

    $xml->startElement("sku");
    $xml->writeRaw($produit['sku']);
    $xml->endElement();

    $xml->startElement("libelle");
    $xml->writeRaw($produit['libelle']);
    $xml->endElement();

    $xml->startElement("prix");
    $xml->writeRaw($produit['prix']);
    $xml->endElement();

    $xml->startElement("quantite");
    $xml->writeRaw($produit['quantite']);
    $xml->endElement();

    $xml->startElement("description");
    $xml->writeRaw($produit['description']);
    $xml->endElement();

    $xml->startElement("tva");
    $xml->writeRaw($produit['tva']);
    $xml->endElement();

    $xml->startElement("etat");
    $xml->writeRaw($produit['etat']);
    $xml->endElement();
    
    $xml->startElement("login");
    $xml->writeRaw($produit['login']);
    $xml->endElement();

    $xml->startElement("date");
    $xml->writeRaw($produit['date']);
    $xml->endElement();

    $xml->startElement("login_update");
    $xml->writeRaw($produit['login_update']);
    $xml->endElement();

    $xml->startElement("date_update");
    $xml->writeRaw($produit['date_update']);
    $xml->endElement();



    $xml->endElement();
}

$xml->endElement();

header('Content-type: application/xml; charset=utf-8');
header('Content-type: text/xml');
$xml->flush();
?>