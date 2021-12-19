<?php
   include "./assets/inc/functions.php";
   //build the query
    if((isset($_REQUEST['action'])) && ($_REQUEST['action']=='login')){
        // build the query 
        //  $email = mysqli_real_escape_string($conn, $_REQUEST['email'])
       $email =  fillterString($_REQUEST['email']);
       $password =  fillterString($_REQUEST['password']);

        $sql = "SELECT * FROM users_tbl WHERE email = '$email'";
      $result =   mysqli_query($conn, $sql) or die(mysqli_error($conn));
      //  if the user email is correct
      if(mysqli_num_rows($result)>0){
         $row = mysqli_fetch_assoc($result);
         $salt= $row['salt'];
         $has_pass= hash('sha512', $salt.$salt.$password.$salt);
        //  var_dump($has_pass);
//         SELECT column_name(s)
        // FROM table1
        // INNER JOIN table2
        // ON table1.column_name = table2.column_name;
          $sql = "SELECT users_tbl.fname, users_tbl.lname, users_tbl.email, roles_tbl.role_name FROM users_tbl  INNER JOIN roles_tbl ON users_tbl.role_id = roles_tbl.id WHERE email = '$email' AND password = '$has_pass'";
          $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
          if(mysqli_num_rows($result)>0){
           $row = mysqli_fetch_assoc($result);
           // created session 
            $user =  $_SESSION['userinfo'] = $row;
            // var_dump($user['fname']);
            $username= $user['fname']." ".$user['lname'];
            $response = array(
                "status" => 200,
                "msg" => "Welcome",
                 "user" => "$username"
           );
           echo json_encode($response);
          }else{
            $response = array(
                "status" => 404,
                "msg" => "unauthorized"
           );
           echo json_encode($response);
          }
          
    
      }else{
         $response = array(
              "status" => 404,
              "msg" => "unauthorized"
         );
         echo json_encode($response);
      }
       
    }
    if((isset($_REQUEST['action']))&&($_REQUEST['action']=='logout')){
        session_destroy();
        $response = array(
            "status" => 201
       );
       echo json_encode($response);
    }
?>