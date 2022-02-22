<?php
include 'connect.php';
include 'logout.php';
session_start();
if (isset($_GET['addid'])) {
    $id = $_GET['addid'];
    $sql_co = "select * from `livres` where id =$id";
    $resultco = mysqli_query($con, $sql_co);
}
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
    <table>
        <thead>
            <tr>
                <th scope="col">Titre</th>
                <th>Auteur</th>
                <th>Date</th>
                <th>Prix</th>
                <th>Total</th>
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
                $total = $total + $price;
                echo '<tr>
            <td>' . $title . '</td>
            <td>' . $author . '</td>
            <td>' . $release . '</td>
            <td>' . $price . '€ </td>
            <td>' . $total . '€ </td>
            </tr>';
            }
        }

        ?>
    </table>
</body>

</html>