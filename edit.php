<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
</head>
<body>
<h1>Goodcard - edit your collection of Boardgames</h1>



    
    <ul>      
    
       <li>Name=<?= $card['name'] ?></li>
       <li>Score=<?=$card['score']?></li>
       <li>Link=<?=$card['link']?></li>
    
    </ul>
    
    <form action="" method="get">
        <label for="Name">Change the name of the game</label>
        <input type="text" id="name"name="name" placeholder="<?=$card['name'] ?>"></br>
        <label for="score">Change your score (between 0 and 10):</label>
        <input type="text" id="score"name="score" placeholder="<?=$card['score'] ?>"></br>
        <label for="link">Change link:</label>
        <input type="text"id="link" name="link" placeholder="<?=$card['link'] ?>"></br>
        <input type="hidden" name="id"value="<?=$card['id'] ?>">
        <input type="submit" name="action" value="edit">
    </form>

    
    
   
    <a href="index.php">click to go back to overview</a>

</body>
</html>