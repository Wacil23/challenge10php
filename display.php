<?php include 'connect.php';
include 'logout.php';
session_start();
$pseudo = $_SESSION['pseudo'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="php.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <button class="btn"><a href="livre.php"><img src="plus.png" alt=""></a></button>
    </div>
    <h1>Bienvenu <?php echo $pseudo ?></h1>
    <table>
        <thead>
            <tr>
                <th scope="col">Titre</th>
                <th>Auteur</th>
                <th>Date</th>
                <th>Prix</th>
                <th>Opérations</th>
            </tr>
        </thead>
        <?php
        $sql_display = "SELECT livres.*, author.name FROM `livres` LEFT JOIN author ON author.id = livres.authorID";
        $resultat = mysqli_query($con, $sql_display);
        if ($resultat) {
            while ($row = mysqli_fetch_assoc($resultat)) {
                $id = $row['id'];
                $title = $row['title'];
                $release = $row['release_date'];
                $author = $row['name'];
                $price = $row['price'];
                echo '<tr>
            <td>' . $title . '</td>
            <td>' . $author . '</td>
            <td>' . $release . '</td>
            <td>' . $price . '€ </td>
            <td><button><a href="update.php?updateid=' . $id . '"><img src="edit.png"></img></a></button></td>
            <td><button><a href="cart.php?addid=' . $id . '">Acheter</a></button></td>
            <td><button><a href="delete.php?deleteid=' . $id . '">Supprimer</a></button></td>
            </tr>';
            }
        }

        ?>
    </table>



</body>

</html>