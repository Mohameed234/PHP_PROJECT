<?php
session_start();
include "../core/functions.php";
include "../core/validation.php";
$errors = [];


if(checkRequestMethod("POST") && checkPostInput("name")) {
   
    foreach($_POST as $key => $value ){
        $$key = sanitizeInput($value);
    }
} 

// Validations 
// name => required , min:3 , max:25 

if(!requiredVal($name)){
    $errors[] = "Name is required";
}elseif(!minVal($name , 3)){
    $errors[] = "Name must be greater than 3 chars";
}elseif(!maxVal($name , 25)){
    $errors[] = "Name must be smaller than 25 chars";
}




// email => required , email

if(!requiredVal($email)){
    $errors[] = "Email is required";
}



// password => required , min:6 , max:20

if(!requiredVal($password)){
    $errors[] = "Password is required";
}elseif(!minVal($password , 6)){
    $errors[] = "Password must be greater than 6 chars";
}elseif(!maxVal($password , 20)){
    $errors[] = "Password must be smaller than 20 chars";
}






if(empty($errors)){
    $users_file = fopen("../Data/users.csv", "a+");
    $data = [$name , $email , sha1($password)];
    fputcsv($users_file , $data);
    //redirect
    $_SESSION['auth'] = [$name , $email];
    redirect("../index.php");
    die();

}else{
    $_SESSION['errors'] = $errors;
    redirect("../register.php");
    die;
}







?>