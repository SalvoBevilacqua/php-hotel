<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotel</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>
    <?php
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
        ]
    ];

    include 'filter.php';
    ?>

    <div class="d-flex flex-column align-items-center mt-5">
        <form action="index.php" method="GET">
            <button type="submit" class="btn btn-dark my-2">With Parking?</button>
            <select class="form-select" aria-label="parking" name="filter">
                <option value="all">All</option>
                <option value="yes">Yes</option>
                <option value="none">No</option>
            </select>
        </form>

        <div class="d-flex justify-content-center p-5">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col" class="text-center">Parking</th>
                        <th scope="col" class="text-center">Vote</th>
                        <th scope="col" class="text-center">Distance to center</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($hotels_filtered as $key => $value) { ?>
                        <tr>
                            <th scope="row"><?php echo $key; ?></th>
                            <td><?php echo $value['name']; ?></td>
                            <td class="text-center"><?php
                                                    echo $value['parking'] ? 'Yes' : 'No';
                                                    ?></td>
                            <td class="text-center"><?php echo $value['vote']; ?></td>
                            <td class="text-center"><?php echo $value['distance_to_center']; ?> Km</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>