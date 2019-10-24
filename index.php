<?php

if (isset($_POST['depart']) && !empty($_POST['depart'])) {
    if (isset($_POST['arrivee']) && !empty($_POST['arrivee'])) {
        $arrivee = $_POST['arrivee'];
        $depart = $_POST['depart'];


        $url = 'https://fr.distance24.org/route.json?stops=' . $_POST['depart'] . '|' . $_POST['arrivee'];
        $json = file_get_contents($url);
        $fichier_json = json_decode($json, true);
        $distance = $fichier_json['distance'];


        $vitesseMax = 90;

        $temps = ($distance / $vitesseMax);

        function duree($distance)
        {
            for ($vitesse = 1; $vitesse <= 90; $vitesse + 10) {
                $temps = $distance / $vitesse;

                if ($vitesse = 90) {
                    break;
                }
                break;
            }
            for ($vitesse = 90; $vitesse >= 0; $vitesse - 10) {
                $temps = $distance / $vitesse;

                if ($vitesse = 0) {
                    break;
                }
                break;
            }
            return $temps;
        }
        //var_dump($temps);

        $duree = duree($distance);

        // var_dump(duree($distance));
        //header('location:index.php');


    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Calcul routier</title>
</head>

<body>
    <div class="parent">
        <h1 class="text-center">Projet calcul routier</h1>
        <form method="post" id="formulaire">
            <div class="form">
                <div class="form-group ville">
                    <label>Ville de depart</label>
                    <input name="depart" type="text" class="form-control" id="depart">
                </div>
                <div class="form-group ville">
                    <label>Ville d'arrivee</label>
                    <input name="arrivee" type="text" class="form-control" id="arriver">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Calculer</button>
        </form>
    </div>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Ville de depart</th>
                        <th scope="col">Ville d'arrivee</th>
                        <th scope="col">Distance</th>
                        <th scope="col">Temps</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $depart ?></td>
                        <td><?php echo $arrivee ?></td>
                        <td><?php echo $distance ?></td>
                        <td><?php echo $duree ?></td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>

</body>

</html>