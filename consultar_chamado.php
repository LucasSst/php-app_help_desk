<?php 
   require_once 'access_validator.php'
?>
<?php
  $calls = array();

  $file = fopen('files.hd', 'r');

  while(!feof($file)){
    $record = fgets($file);
    $data_call = explode('#',$record);
   
    if($_SESSION['profile_id'] == 2) {
      if ($_SESSION['id'] != $data_call[0]){
        continue;
      }
    }
    
    if(count($data_call) < 3){
      continue;
    }
    
    $calls[] = $record;
  }
  
  fclose($file);


?>
<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <ul class='navbar-nav'>
        <li class='nav-item'>
          <a class='nav-link' href="logoff.php">SAIR</a>
        </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">
              
              <?php 
                foreach($calls as $call) { ?>
                <?php
                  $data_call = explode('#',$call);
                  
                ?>
              <div class="card mb-3 bg-light">
                <div class="card-body">
                  <h5 class="card-title"><?= $data_call[1];?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?= $data_call[2];?></h6>
                  <p class="card-text"><?= $data_call[3];?></p>

                </div>
              </div>
              <?php } ?>

              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" href='home.php'>Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>