<?php     
    session_start();

    
    echo('<hr />');
    $user_authenticated = false ;
    $user_id = null;
    $profile_user_id = null;

    $profile = [1=> 'Administrativo', 2 => 'Usuário'];

    $users_app = array(
        ['id' => 1, 'email' => 'adm@teste.com', 'password' => '12345', 'profile_id' => 1],
        ['id' => 2, 'email' => 'user@teste.com', 'password' => '1234' , 'profile_id' => 1],
        ['id' => 3, 'email' => 'nicole@teste.com', 'password' => '1234', 'profile_id' => 2],
        ['id' => 4, 'email' => 'lucas@teste.com', 'password' => '1234', 'profile_id' => 2],
        ['id' => 5, 'email' => 'joao@teste.com', 'password' => 'joao', 'profile_id' => 2],

    );

    foreach($users_app as $user) {
        if ($user['email'] == $_POST['email'] &&  $user['password'] == $_POST['password']){
            $user_authenticated = true;
            $user_id = $user['id'];
            $profile_user_id = $user['profile_id'];
        }
    }

    if ($user_authenticated){

        $_SESSION['authenticated'] = 'TRUE';
        $_SESSION['id'] = $user_id;
        $_SESSION['profile_id'] = $profile_user_id;
        header('Location: home.php');
        
    }else {
        $_SESSION['authenticated'] = 'FALSE'; 
        header('Location: index.php?login=erro');
    }



?>