<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Welcome!</title>
    </head>
    <body>
        <h1>Fun Place</h1>
        <ul>
            <p><a href="licks.php">licks</a></p>
            <p><a href="songs.php">songs</a></p>
            <p><a href="training.php">training</a></p>
        </ul>
        <h2>This is songs</h2>
        <?php
        $conn = mysqli_connect("localhost", "root", "010929", "test");
        $sql = "SELECT * FROM topic LIMIT 100";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result)){
            $escaped_title = htmlspecialchars($row['title']);
            echo '<p><a href="licks.php?id='.$row['id'].'">'.$escaped_title.'</a></p>';
        }

        $article = array(
            'title'=>'Welcome',
            'description'=>'Hello'
        );
        if(isset($_GET['id'])){
            $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
            $sql = "SELECT * FROM topic WHERE id={$filtered_id}";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
            $article['title']= htmlspecialchars($row['title']);
            $article['description']=htmlspecialchars($row['description']);
        }
        
        ?>
        <a href="create.php">create</a>
        <h2><?=htmlspecialchars($article['title'])?></h2>
        <?=htmlspecialchars($article['description'])?>
    </body>   
</html>