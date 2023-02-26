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
        <h2>This is songs</h2>
        <?php
        $conn = mysqli_connect("localhost", "root", "010929", "test");
        $sql = "SELECT * FROM topic LIMIT 100";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result)){
            $escaped_title = htmlspecialchars($row['title']);
            echo '<p><a href="songs.php?id='.$row['id'].'">'.$escaped_title.'</a></p>';
        }

        $article = array(
            'title'=>'Welcome',
            'description'=>'Hello'
        );
        $update_link = '';
        $delete_link = '';
        if(isset($_GET['id'])){
            $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
            $sql = "SELECT * FROM topic WHERE id={$filtered_id}";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
            $article['title']= htmlspecialchars($row['title']);
            $article['description']=htmlspecialchars($row['description']);

            $update_link ='<a href="update.php?id='.$_GET['id'].'">update</a>';
            $delete_link ='
            <form action="process_delete.php" method="POST">
                <input type="hidden" name="id" value="'.$_GET['id'].'">
                <input type="submit" value="delete">
            </form>
            ';
        }
        
        ?>
        <a href="create.php">create</a>
        <?=$update_link?>
        <?=$delete_link?>
        <h2><?=htmlspecialchars($article['title'])?></h2>
        <?=htmlspecialchars($article['description'])?>
    </body>   
</html>