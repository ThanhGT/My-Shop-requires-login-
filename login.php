<?php
    include('header.php');
    include('config.php');

    session_start();


    if(isset($_SESSION['user_id']) && isset($_SESSION['role']) && $_SESSION['role'] == 1){
        header('location: dashboard.php');
    }


    $errors = '';
    $newerrors ="";
    
    if(!empty($_POST)){
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(trim($username) == '' || trim($password) == ''){
            $errors .= 'Please enter a username/password';
        }
        else{
            $sql = "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password' ";

            $result = $db->query($sql);

            if($result->num_rows == 1){
               $row = $result->fetch_assoc();

               $_SESSION['user_id'] = $row['user_id'];
               $_SESSION['name'] = $row['name'];
               $_SESSION['role'] = $row['role'];

               header('location: dashboard.php');
            }
            else{
                $errors .= 'Username or Password not correct <br/>';
            }
        }
        $newusername = $_POST['newusername'];
        $newpassword = $_POST['newpassword'];
        if(trim($username) == '' || trim($password) == ''){
            $newerrors .= 'Please enter a username/password';
        }
        else {
            #$sql = INSERT INTO `users` (`user_id`, `username`, `password`, `name`, `email`, `phone_number`, `role`, `date_created`) VALUES (NULL, CURRENT_TIMESTAMP);
        }
    }
?>
  
  <form name="loginForm" method="POST" action="login.php" >
    <label>Username</label>
    <input id="username" placeholder="username" type="text" name="username"><br/>

    <label>Password</label>
    <input id="password" placeholder="Password" type="password" name="password"><br/>

    <input type="submit" value="Submit">
    <p id="errors"><?php echo $errors; ?></p>
  </form>  
<!--
  <form name="newAccount" method="POST" action="login.php" >
    <h2>Create New Account</h2>
    <label>Username</label>
    <input id="newusername" placeholder="Username" type="text" name="newusername"><br/>

    <label>Password</label>
    <input id="newpassword" placeholder="Password" type="password" name="newpassword"><br/>
    <input type="submit" value="Submit">
    <p id="errors"><?php echo $newerrors; ?></p>
  </form>-->
<?php include('footer.php'); 

#INSERT INTO `users` (`user_id`, `username`, `password`, `name`, `email`, `phone_number`, `role`, `date_created`) VALUES (NULL, 'user', 'pass', 'user', 'ryan.dominic.henry@gmail.com', '647521792', '0', CURRENT_TIMESTAMP);