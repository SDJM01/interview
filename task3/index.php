<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles/style.css" rel="stylesheet">
    <title>Оставьте свой комментарий!</title>
</head>
<body>
<div>
<form class="comment-form" action="logic.php" method="POST">
    <div class="name-input">
        <label>
            Ваше имя:
            <input type="text" name="name" placeholder="Ведите Ваше имя" required>
        </label>
    </div>
    <div class="comment-input">
            <textarea style="resize:none;" name="comment" placeholder="Ваш комментарий" required></textarea>
    </div>
    <div class="comment-input">
        <button type="submit" name="submitButton">Отправить</button>
    </div>
</form>

</div>

<div class="comment-output">
    <?php require_once "logic.php"?>
    <?php foreach ($data as $value):?>
            <div class="card">
                <h4><?php echo $value['name'] ?></h4>
                <p><?php echo $value['comment'] ?></p>
            </div>
    <?php endforeach; ?>
</div>

</body>
</html>