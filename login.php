<!-- Starts the session -->
<?php session_start();
  /* Check Login form submitted */
  if (isset($_POST['Submit'])) {

      /* Check and assign submitted Username and Password to new variable */
      $Username = isset($_POST['Username']) ? $_POST['Username'] : '';
      $Password = isset($_POST['Password']) ? $_POST['Password'] : '';
      $User = false;
      if (!empty($Username) && !empty($Password)) {
          $file_handle = fopen("Logins.txt", "r+");
          while (($line = fgets($file_handle)) != false) {
              $parts = explode(";", $line);
              if (trim($parts[0]) === $Username && trim($parts[1]) === $Password) {
                  $User = true;
                  fclose($file_handle);
                  break;
              }
          }

          /* Check Username and Password existence in defined array */
          if ($User == true) {
              /* Success: Set session variables and redirect to Protected page  */
              $_SESSION['loggedIn'] = true;
              $_SESSION['Username'] = $Username;

              header("location:prepare.php");
              exit;
          } else {
              /*Unsuccessful attempt: Set error message */
              $msg="<p>Invalid Login Details <a href='signup.php'>Sign-UP</a></p>";
          }
      }
  }
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title></title>
    <link rel="stylesheet" href="maintheme.css">
  </head>

  <body>

    <main>
      <div id="righttext">

      <form action="" method="post" name="Login_Form">
        <table width="400" border="0" align="center" cellpadding="5" cellspacing="1" class="Table">

          <tr>
            <td colspan="2" align="left" valign="top"><h3>Login</h3></td>
          </tr>
          <tr>
            <td align="right" valign="top">Username</td>
            <td><input name="Username" type="text" class="Input"></td>
          </tr>
          <tr>
            <td align="right">Password</td>
            <td><input name="Password" type="password" class="Input"></td>
          </tr>
          <tr>
            <td> </td>
            <td><input name="Submit" type="submit" value="Login" class="Button3"></td>
          </tr>
        </table>
      </form>

      <?php
      echo isset($msg) ? $msg: '';
       ?>

      <br>
      <br>

      </div>
    </main>

  </body>
</html>
