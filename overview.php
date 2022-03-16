<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Goodcard - track your collection of Pokémon cards</title>
</head>
<body>

<h1>Goodcard - track your collection of Boardgames</h1>

<ul>
    <?php foreach ($cards as $card) : ?>
        <li><?= $card['name'] ?><a href="index.php?action=edit&id=<?=$card['id']?>"> edit </a><a href="index.php?action=delete&id=<?=$card['id']?>"> delete </a></li>
    <?php endforeach; ?>
</ul>
<a href="index.php?action=create">click to create</a>

</body>
</html>