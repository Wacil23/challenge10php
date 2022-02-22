<?php
$pseudoErr = null;
if (isset($_POST['submit'])) {
    if (!empty($_POST['pseudo'])) {
        session_start();
        $_SESSION['pseudo'] = $_POST['pseudo'];
        header('location:display.php');
        exit;
    }
}

$submit = $_POST['submit'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST">

        <input type="text" name="pseudo" placeholder="Entrez votre pseudo">
        <?php
        if (isset($submit) && empty($_POST['pseudo'])) $pseudoErr = 'Veuillez entrer un utilisateur valide';
        echo $pseudoErr;
        ?>
        <button type="submit" name="submit">Se connecter</button>
    </form>
</body>

</html>