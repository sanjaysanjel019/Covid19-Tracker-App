<?php
include "logic.php"
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COVID-19 Tracker App</title>

    <!--Bootstrap CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Thambi+2:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- FOnt Awesome Library-->
    <script src="https://kit.fontawesome.com/875ff7f83a.js" crossorigin="anonymous"></script>
    <!-- custom CS-->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container-fluid bg-light p-5 text-center my-3 ">
        <h1>Covid-19 Traker App</h1>
        <h5> Keep latest information about the latest Global Pandemic</h5>

    </div>


    <div class="container my-5 ">
        <h2 class="text-center">World Information</h2>
        <div class="row text-center pb-10">

            <div class="card " style="width: 18rem;">
                <div class="card-body text-warning">
                    <h5 class="card-title ">Total Confirmed Cases</h5>
                    <?php echo $total_confirmed_cases ?>
                </div>
            </div>


            <div class="card" style="width: 18rem;">
                <div class="card-body text-success">
                    <h5 class="card-title">Total Recovered</h5>
                    <?php echo $total_recovered ?>
                </div>
            </div>


            <div class="card" style="width: 18rem;">
                <div class="card-body text-danger">
                    <h5 class="card-title">Total Deaths</h5>
                    <?php echo $total_deaths ?>
                </div>
            </div>






        </div>
    </div>

    <div class="container-fluid">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Countries</th>
                    <th scope="col">Confirmed</th>
                    <th scope="col">Recovered</th>
                    <th scope="col">Deceased</th>
                </tr>
            </thead>
            <tbody>
                <!-- The reason for doing this is that HTML tags cannot be placed inside PHP code but we want our data to be displayed to the index file.-->
                <?php
                foreach ($data as $key => $value) {
                    $increased = $value[$days_count]['confirmed'] - $value[$days_count_prev]['confirmed'];
                ?>
                    <tr>
                        <th> <?php echo $key; ?> </th>
                        <td>
                            <?php echo $value[$days_count]['confirmed'] ?>
                            <?php if ($increased != 0) { ?>
                                <small class="text-danger pl-3"><i class="fas fa-arrow-up"></i><?php echo  $increased ?> </small>
                            <?php } ?>
                        </td>

                        <td style="color: green">
                            <?php echo $value[$days_count]['recovered'] ?>
                        </td>

                        <td style="color: red">
                            <?php echo $value[$days_count]['deaths'] ?>
                        </td>
                    </tr>


                <?php } ?>

            </tbody>
        </table>
    </div>
</body>

</html>