<?php
session_start();
include "../core/functions.php";
include "../core/validation.php";
$errors = [];




if(checkRequestMethod("POST") && checkPostInput("email")){

    foreach($_POST as $key => $value){
        $$key = sanitizeInput($value);
    }
    

    if(!requiredVal($email)){
        $errors[] = "Please type your Email";
    }elseif(!emailVal($email)){
        $errors[]= "Please type valid Email";
    }

    if(!requiredVal($password)){
        $errors[] = "Please type your password";
    }

    
    if(empty($errors)){
        $dataIO = [$email ,sha1($password) ];
        $users_file = fopen("../Data/users.csv","a+");
        $array = [];
        while (($dataCSV = fgetcsv($users_file)) !== false) {
            $array[] = $dataCSV;
        }
        fclose($users_file); 


        
        $i = 0;
        while($i <= count($array)){
        if ( $i!=count($array) && $array[$i][1] == $email && $array[$i][2] == sha1($password) ){
            $_SESSION['auth'] = [$name = $array[$i][0]  , $email];
            redirect("../index.php");
            die();
            break;
        }
        if($i == count($array)){
            $errors[] = "Please check Your Email Or Password again";
            $_SESSION['errors'] = $errors ;
            if(isset($errors)){
                redirect("../login.php");

            }
        }
        $i++ ;
        }
      

        
        
      
        


    }else{
        $_SESSION['errors'] = $errors;
        header("location:../login.php");
        die;
    }
}




?>