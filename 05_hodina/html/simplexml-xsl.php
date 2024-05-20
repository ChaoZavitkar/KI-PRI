<?php
// Create the XML document
$xml = new DOMDocument('1.0', 'utf-8');
$xml->formatOutput = true;

// Create root element
$fakulty = $xml->createElement('fakulty');
$xml->appendChild($fakulty);

// Connect to the database
$db = new mysqli("database", "admin", "heslo", "univerzita");

// Check the connection
if ($db->connect_error) {
  die("Connection failed: " . $db->connect_error);
}

// Fetch fakulty from the database
$result = $db->query('SELECT id, nazev, dekan FROM Fakulta WHERE id = 1');
if ($result) {
  while ($row = $result->fetch_assoc()) {
    $fakulta = $xml->createElement('fakulta');
    $fakulty->appendChild($fakulta);

    $fakulta->setAttribute('id', $row['id']);
    $fakulta->appendChild($xml->createElement('nazev', $row['nazev']));

    if ($row['dekan']) {
      $dekanResult = $db->query("SELECT jmeno, prijmeni, email FROM Osoba WHERE id=" . $row['dekan']);
      if ($dekanResult) {
        $dekanRow = $dekanResult->fetch_assoc();
        $dekan = $xml->createElement('dekan');
        $fakulta->appendChild($dekan);
        $dekan->appendChild($xml->createElement('jmeno', $dekanRow['jmeno']));
        $dekan->appendChild($xml->createElement('prijmeni', $dekanRow['prijmeni']));
        $dekan->appendChild($xml->createElement('email', $dekanRow['email']));
      }
    }
  }
}

// Close the database connection
$db->close();

// Set the XML header and output the XML
header('Content-Type: application/xml');
echo $xml->saveXML();