<?php session_start();
include('includes/db.php');

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM land_agent WHERE user_name='$username' AND password='$password'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if ($result->num_rows > 0){

        $_SESSION['role'] = $row['user_id'];
        $_SESSION['id'] = $row['land_agent_id'];
        $_SESSION['username'] = $row['user_name'];
        $_SESSION['loc'] = $row['land_agent_location'];
        $_SESSION['login'] = 'yes';

        if($row['user_id']==1){
            header("location:pages/index/index.php");
        }

        if($row['user_id']==2){
            header("location:pages/agent/psagent.php");
            
        }

        if($row['user_id']==3){
            header("location:pages/agent/agent.php");
            
        }
        
    } else {
       $a="Please Input Valid Login Details";
    }
}
?> 



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CodeStar Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="dist/css/style.css">
  </head>
  <body >
    <div class="container  p-3" style="margin-top:200px;">
        <div class="form col-md-12 d-flex justify-content-center ">
            <form action="" method="post" class="pdiv p-5 bg-light">
           <p style="font-size: 20px; padding:10px;">Real Estate Management</p>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Username</label><br>
                    <input type="text" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Password</label><br>
                    <input type="text" name="password" required>
                </div>
                <input type="submit" name="submit" value="login"><br><br>
                <?php if (isset($_POST['submit'])){?><span class="text-danger"> <?php echo $a?></span><?php }?>
            </form>
       </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>