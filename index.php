   
<?php
    include_once 'includes/User.php';
    include_once 'includes/UserSession.php';
    
    $userSession = new UserSession();
    $user = new User();


    if(isset($_SESSION['user'])){
        
            $user->setUser($userSession->getCurrentUser());
            include_once 'views/home.php';

    }
        else if(isset($_POST['txtUsername']) && isset($_POST['txtPassword'])){
            
            $userForm = $_POST['txtUsername'];
            $passForm = $_POST['txtPassword'];

            $user = new User();

            if($user->userExists($userForm, $passForm)){
            
                $userSession->setCurrentUser($userForm);
                $user->setUser($userForm);

                include_once 'views/home.php';
            
            }
                else{
            
                    $errorLogin = "Nombre de usuario y/o password incorrecto";
                    include_once 'views/Login.php';
                }
        }
                else{
            
                include_once 'views/Login.php';
                }



?>
