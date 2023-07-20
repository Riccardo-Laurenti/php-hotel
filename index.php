<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Php Hotel</title>
    <style>
        form {
            gap: 2rem;
        }

        .my_input {
            width: 3rem;
        }
    </style>
</head>

<body>
    <?php
    $parking = isset($_GET["parking"]);
    $vote = $_GET["vote"];

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

    if ($parking === true) {
        $hotels = array_filter($hotels, function ($hotel) {
            return $hotel["parking"] === true;
        });
    } elseif ($parking === false) {
        $hotels = array_filter($hotels, function ($hotel) {
            return $hotel["parking"] === false;
        });
    }

    if ($vote !== '') {
        $hotels = array_filter($hotels, function ($hotel) use ($vote) {
            return $hotel["vote"] >= $vote;
        });
    }

    foreach ($hotels as $hotel) {
        foreach ($hotel as $key => $value) {
        }
    }

    ?>
    <div class="container">

        <form action="./" method="get" class="my-5 d-flex justify-content-center align-items-center">
            <div class="d-flex align-items-center my_range-container">
                <label for="vote" class="form-label m-0 me-3">
                    Vote
                </label>
                <input type="number" class="my_input" name="vote" id="vote" min="1" max="5" step="1">
            </div>
            <div class="form-check m-0">
                <input type="checkbox" class="form-check-input" name="parking" id="parking">
                <label class="m-0 form-check-label" for="exampleCheck1">
                    Parking
                </label>
            </div>
            <button type="submit" class="btn btn-primary">
                Submit
            </button>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <?php
                    foreach ($hotel as $key => $value) {
                    ?>
                        <th scope="col">
                            <?php
                            if ($key === "distance_to_center") {
                                $key = str_replace("_", " ", $key);
                            }
                            echo ucwords($key);
                            ?>
                        </th>
                    <?php
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($hotels as $hotel) {
                ?>
                    <tr>
                        <?php
                        foreach ($hotel as $key => $value) {
                        ?>
                            <td>
                                <?php
                                if ($value === true) {
                                    $value = "true";
                                } elseif ($value === false) {
                                    $value = "false";
                                }
                                echo $value
                                ?>
                            </td>
                        <?php
                        }
                        ?>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>