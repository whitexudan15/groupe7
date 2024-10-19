<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cours - Programmation</title>
    <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php require_once './navbar.php' ?>

    <div style="min-height: 50vh !important;" class="container d-flex justify-content-center">
        <div class="row border p-3 bg-white shadow w-100">
            <table id="t_article" class="table table-striped w-100">
                <thead style="font-size: 20px;">
                    <tr>
                        <th>Code</th>
                        <th>Cours</th>
                        <th>Crédit/Session</th>
                        <th>Date de début</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>

                    <div class="displayed">
                        <tr>
                            <td> INF1325</td>
                            <td>INFORMATIQUE</td>
                            <td>3 Crédits / 30H</td>
                            <td>2024-10-23</td>
                            <td>
                                <a class='btn btn-outline-primary btn-xs rounded-0'>Details</a>
                                <a class='btn btn-warning btn-xs rounded-0'>Modifier</a>
                                <a class='btn btn-danger btn-xs rounded-0'>Déprogrammer</a>
                            </td>
                        </tr>
                    </div>
                    <div class="details"></div>
                </tbody>
            </table>
        </div>
    </div>

    <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>