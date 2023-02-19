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
        <form action="process_create.php" method="POST">
            <p><input type="text" name="title" placeholder="title"></p>
            <p><textarea name = "description" ></textarea></p>
            <p><input type="submit"></p>
    </body>   
</html>