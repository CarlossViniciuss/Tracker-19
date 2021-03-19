<?php include("logic.php"); ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!--Bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/1dac1de2fd.js" crossorigin="anonymous"></script>

    <!--CSS-->
    <link rel="stylesheet" href="style.css">

    <title>TRack</title>
</head>

<body>
    <!----------------------TOPO---------------------->
    <header>
        <div class="container-fluid bg-dark p-5 text-center ">
            <h1 class="text-muted">Covid-19 Tracker</h1>
            <h5 class="text-muted">Projeto opensource para pesquisar os casos de COVID-19 pelo Brasil</h5>

            <div class="container pt-3">
                <div class="row">
                    <div class="bg-light col-4">
                        <h5 class="text-muted">Confirmados</h5>
                        <?php echo $apiExec->infected ?>
                    </div>
                    <div class="bg-light col-4">
                        <h5 class="text-muted">Recuperados</h5>
                        <?php echo $apiExec->recovered ?>
                    </div>
                    <div class="bg-light col-4">
                        <h5 class="text-muted">Obitos</h5>
                        <?php echo $apiExec->deceased ?>
                    </div>
                </div>
            </div>
            <h5 class="pt-3 text-muted">Atualizado em: </h5>
            <h6 class="text-muted"><?php echo $apiExec->lastUpdatedAtApify ?></h6>
        </div>

    </header>
    <!----------------------TOPO---------------------->


    <!----------------------Tabela---------------------->
    <table class="table text-center table-striped table-dark table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">UF</th>
                <th scope="col">Infectados</th>

            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($apiExec->infectedByRegion as $uf) {
            ?>
                <tr>
                    <th><?php echo $uf->state; ?></th>
                    <td>
                        <?php echo $uf->count; ?>
                    </td>

                </tr>

            <?php  }
            ?>

        </tbody>

    </table>
    <!----------------------Tabela---------------------->


    <!----------------------GraficoHTML---------------------->

    <div class="container">
        <div id="columnchart_material" style="display: block; margin-left: auto; margin-right: auto;  width: 90%; height: 300px;"></div>
    </div>

    <!----------------------GraficoHTML---------------------->


    <!----------------------GaficoJS---------------------->

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['bar']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['.', 'Recuperados', 'Infectados', 'Obito'],
                ['.', <?php echo $apiExec->recovered ?>, 0, 0],
                ['.', 0, <?php echo $apiExec->infected ?>, 0],
                ['.', 0, 0, <?php echo $apiExec->deceased ?>]
            ]);

            var options = {
                chart: {
                    title: 'Total',
                    subtitle: 'Recuperados, infectados e obitos: 2021',
                }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>

    <!----------------------GraficoJS---------------------->


</body>


</html>