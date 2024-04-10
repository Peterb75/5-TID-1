<?php
require 'vendor/autoload.php'; // Incluye el autoloader de Composer

// Crea una nueva instancia de cliente MongoDB
$client = new MongoDB\Client('mongodb://localhost:27017');

// Selecciona la base de datos y la colección
$collection = $client->mongoPractica1->peliculas;

// Obtener todos los documentos
$cursor = $collection->find([]);

// Obtener documentos con writer igual a "Quentin Tarantino"
$cursor = $collection->find(['writer' => 'Quentin Tarantino']);

// Obtener documentos con actors que incluyan a "Brad Pitt"
$cursor = $collection->find(['actors' => 'Brad Pitt']);

// Obtener documentos con franchise igual a "The Hobbit"
$cursor = $collection->find(['franchise' => 'The Hobbit']);

// Obtener todas las películas de los 90s
$cursor = $collection->find(['year' => ['$gte' => 1990, '$lt' => 2000]]);

// Obtener las películas estrenadas entre el año 2000 y 2010
$cursor = $collection->find(['year' => ['$gte' => 2000, '$lte' => 2010]]);

// Agregar sinopsis a "The Hobbit: An Unexpected Journey"
$collection->updateOne(
   ['title' => 'The Hobbit: An Unexpected Journey'],
   ['$set' => ['synopsis' => 'A reluctant hobbit, Bilbo Baggins, sets out to the Lonely Mountain with a spirited group of dwarves to reclaim their mountain home - and the gold within it - from the dragon Smaug.']]
);

// Agregar sinopsis a "The Hobbit: The Desolation of Smaug"
$collection->updateOne(
   ['title' => 'The Hobbit: The Desolation of Smaug'],
   ['$set' => ['synopsis' => 'The dwarves, along with Bilbo Baggins and Gandalf the Grey, continue their quest to reclaim Erebor, their homeland, from Smaug. Bilbo Baggins is in possession of a mysterious and magical ring.']]
);

echo "<table border='1'>";
echo "<tr><th>Title</th><th>Writer</th><th>Year</th><th>Actors</th><th>Franchise</th><th>Synopsis</th></tr>";

foreach ($cursor as $document) {
    echo "<tr>";
    echo "<td>".$document['title']."</td>";
    echo "<td>".$document['writer']."</td>";
    echo "<td>".$document['year']."</td>";
    echo "<td>".implode(", ", $document['actors'])."</td>";
    echo "<td>".$document['franchise']."</td>";
    echo "<td>".$document['synopsis']."</td>";
    echo "</tr>";
}

echo "</table>";
?>