<?php 
    session_start();
    if(!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] != 'TRUE'  ){
      header('Location: index.php?login=erro_authenticated');
    }
?>