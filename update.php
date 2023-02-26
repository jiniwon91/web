<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Welcome!</title>
    </head>
    <body>
        <h1>Hello</h1>
        <ul>
            <p><a href="licks.php">licks</a></p>
            <p><a href="songs.php">songs</a></p>
            <p><a href="training.php">training</a></p>
        </ul>
        <?php
        $conn = mysqli_connect("localhost", "root", "010929", "test");

        if(isset($_GET['id'])){
            $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
            $sql = "SELECT * FROM topic WHERE id={$filtered_id}";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
            $article['title']= htmlspecialchars($row['title']);
            $article['description']=htmlspecialchars($row['description']);
        }
        ?>
        <form action="process_update.php" method="POST">
            <input type="hidden" name="id" value="<?=$_GET['id']?>">
            <p><input type="text" name="title" placeholder="title" value="<?=$article['title']?>"></p>
            <p><textarea name = "description" placeholder="description"><?=$article['description']?></textarea></p>
            <p><input type="submit"></p>
        </form>
    </body>   
</html>