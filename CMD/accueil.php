<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O'FOOD</title>
    <link rel="stylesheet" href="style.css">
</head>
<body >

<div class="login-page">
  <div class="form">
    <form class="login-form" method="POST" action="../ACCESS/admin_log.php">
      <h2></i> Login as an admin</h2>
      <input type="text" name="email" placeholder="Email" required />
      <input type="password" name="password" placeholder="Password" required/>
      <div class="rows">
                <?php if(isset($_SESSION['state'])){?>

                    <p class="status"><?php echo $_SESSION['state']?></p>
                <?php }
                ;
                session_unset();
                session_destroy();
                ?>
      </div>
      <div class="btn">
        <input type="submit" value="Login" class="botn" name="submit">
        <!-- <button type="submit">Create</button> -->
      </div>
      <p class="message">Not registered? <a class="tec" href="sign.php">Create an account</a></p>
    </form> 
  </div>
</div>
</body>
</html>
