<?php
    session_start();

    $file = fopen('files.hd', 'a');

    $title = str_replace('#', '-' , $_POST['title']);
    $category =  str_replace('#', '-' , $_POST['category']);
    $description = str_replace('#', '-' , $_POST['description']);
    
    $text = $_SESSION['id'] . '#' . $title . '#'. $category .'#'. $description . PHP_EOL;

    fwrite($file, $text);
    fclose($file);
    //echo $text;

    header('Location: abrir_chamado.php');
?>