<?php

// Array Hotel
$hotels = [
    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],
];

// Array Hotel filtrati
$filter_hotels = $hotels;

// Filtro presenza parcheggio
// Se è vera filtra gli Hotel
if ($_GET['parking'] ?? false) {
    $filter_hotels = array_filter($filter_hotels, function ($hotel) {
        return $hotel['parking'] === true;
    });
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Hotel</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Lista Hotel</h1>

        <!-- Form per il filtro del parcheggio -->
        <form method="GET" class="d-flex flex-column">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="parking" value="1" id="parkingCheck" <?php echo ($_GET['parking'] ?? '') === '1' ? 'checked' : ''; ?>>
                <label class="form-check-label" for="parkingCheck">
                    Parcheggio
                </label>
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <button type="submit" class="btn btn-primary col-2 ">Filtra</button>
            </div>
        </form>

        <!-- Tabella degli hotel -->
        <table class="table table-striped">

            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrizione</th>
                    <th>Parcheggio</th>
                    <th>Voto</th>
                    <th>Distanza dal Centro (km)</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($filter_hotels as $hotel) : ?>
                    <tr>
                        <td><?= $hotel['name'] ?></td>
                        <td><?= $hotel['description'] ?></td>
                        <td><?= $hotel['parking'] ? 'Presente' : 'Non presente' ?></td>
                        <td>
                            <?php for ($i = 0; $i < $hotel['vote']; $i++) : ?>
                                <i class="fa-solid fa-star"></i>
                            <?php endfor; ?>
                        </td>
                        <td><?= $hotel['distance_to_center'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    </div>
</body>

</html>