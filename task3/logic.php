<?php


require_once 'core/database.php';

$database = new Database();

// если нажата кнопка, добавляем комментарий в базу данных и делаем редирект
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submitButton'])) {
        $params = [
            'name' => htmlspecialchars($_POST['name']),
            'comment' => htmlspecialchars($_POST['comment']),
        ];
        $database->query( 'INSERT INTO comments (name, comment) VALUES (:name, :comment)',$params);
        redirect('index.php');
    }
  }

$data = $database->read('SELECT * FROM comments');
function redirect($path)
{
    header('Location: ' . $path);
    exit;
}