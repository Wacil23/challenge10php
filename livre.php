<?php
include 'connect.php';
$sql_author = "SELECT * FROM `author`";
$all_author = mysqli_query($con, $sql_author);
if (isset($_POST['submit'])) {
    @$title = $_POST['title'];
    @$author = $_POST['author'];
    @$release = $_POST['release'];
    @$price = $_POST['price'];
    @$submit = $_POST['submit'];
    @$TitleError = "";
    @$AuthorError = "";
    @$PriceError = "";

    $sql = "insert into `livres` (title,price,release_date,authorID) values('$title','$price','$release',$author)";

    if (!empty($title && $price && $release)) {
        $result = mysqli_query($con, $sql);
        if ($result) {
            header('location:display.php');
        } else {
        }
    }
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
    <h1>Renseignez votre livre préféré</h1>
    <div class="container">
        <div class="content">
            <form action="" method="post">
                <div>
                    <label for="title"> Titre :</label>
                    <input type="text" id="title" name="title" value="<?php echo $title ?>">
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
                        // use a while loop to fetch data 
                        // from the $all_categories variable 
                        // and individually display as an option
                        while ($category = mysqli_fetch_array(
                            $all_author,
                            MYSQLI_ASSOC
                        )) :;
                        ?>
                            <option value="<?php echo $category["id"];
                                            // The value we usually set is the primary key
                                            ?>">
                                <?php echo $category['name'];
                                // To show the category name to the user
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
                    <input type="date" id="release" name="release" value="2022-01-01" min="1900-01-01" max="2022-02-15">
                </div>
                <p></p>
                <div>
                    <label for="price">Prix :</label>
                    <input type="number" id="price" name="price" min="0" max="1000" value="0">€
                    <?php
                    if (isset($submit)) {
                        if (empty($price))  $PriceError = 'Un prix doit être renseigné';
                        echo $PriceError;
                    }
                    ?>
                </div>
                <p></p>
                <div>
                    <input class="button" type="submit" name="submit" value="Ajouter !">
                </div>
            </form>
        </div>
    </div>
</body>

</html>