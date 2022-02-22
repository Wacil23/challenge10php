<?php
include 'connect.php';

$sql_author = "SELECT * FROM `author`";
$id = $_GET['updateid'];
$sql_livre = "SELECT * FROM `livres` WHERE id=$id";

$all_author = mysqli_query($con, $sql_author);
$all_livre = mysqli_query($con, $sql_livre);
$row2 = mysqli_fetch_assoc($all_livre);
$idDisplay = $row2['authorID'];
$titleDisplay = $row2['title'];
$releaseDisplay = $row2['release_date'];
$priceDisplay = $row2['price'];

if (isset($_POST['submit'])) {
    @$title = $_POST['title'];
    @$author = $_POST['author'];
    @$release = $_POST['release'];
    @$authorID = $_POST['authorID'];
    @$price = $_POST['price'];
    @$submit = $_POST['submit'];
    @$TitleError = "";
    @$AuthorError = "";
    @$PriceError = "";

    $id = $_GET['updateid'];
    $sql_mod = "UPDATE `livres` set title='$title', price=$price , release_date='$release', authorID=$author WHERE id=$id";
    //die($sql_mod);
    $result_mod = mysqli_query($con, $sql_mod);
    if ($result_mod) {
        echo 'update';
    } else {
        die(mysqli_error($con));
    }
    header('location:display.php');
}
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
    <h1>Modifier votre livre</h1>
    <div class="container">
        <form action="" method="post">
            <div>
                <label for="title"> Titre :</label>
                <input type="text" id="title" name="title" value="<?php echo $titleDisplay; ?>">
                <?php
                if (isset($submit)) {
                    if (empty($title))  $TitleError = 'Le titre doit être renseigné';
                    echo $TitleError;
                }
                ?>
            </div>
            <p></p>
            <div>
                <label for="author">Auteur :</label>

                <select name="author" id="author">
                    <?php
                    while ($category = mysqli_fetch_array(
                        $all_author,
                        MYSQLI_ASSOC
                    )) :;
                    ?>
                        <option <?php if ($idDisplay == $category['id']) echo "selected='selected'"; ?> value="<?php echo $category['id'];
                                                                                                                ?>">
                            <?php echo $category['name'];
                            ?>
                        </option>
                    <?php
                    endwhile;
                    // While loop must be terminated
                    ?>
                </select>
                <?php
                if (isset($submit)) {
                    if (empty($author))  $AuthorError = 'Le nom de l\'auteur doit être renseigné';
                    echo $AuthorError;
                }
                ?>
            </div>
            <p></p>
            <div>
                <label for="release">Date de sortie :</label>
                <input type="date" id="release" name="release" value="<?php echo $releaseDisplay; ?>" min="1900-01-01" max="2022-02-15">
            </div>
            <p></p>
            <div>
                <label for="price">Prix :</label>
                <input type="number" id="price" name="price" min="0" max="1000" value="<?php echo $priceDisplay; ?>">€
                <?php
                if (isset($submit)) {
                    if (empty($price))  $PriceError = 'Un prix doit être renseigné';
                    echo $PriceError;
                }
                ?>
            </div>
            <p></p>
            <div>
                <input class="button" type="submit" name="submit" value="Modifier">
            </div>
        </form>
    </div>
</body>

</html>