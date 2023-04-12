<?php
  // Include db config
  require_once 'database.php';

  // Init vars
  $email = $password = '';
  $email_err = $password_err = '';

  // Process form when post submit
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // Sanitize POST
    $_POST = filter_input_array(INPUT_POST);

    // Put post vars in regular vars
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Validate email
    if(empty($email)){
      $email_err = 'Wprowadź email';
    }

    // Validate password
    if(empty($password)){
      $password_err = 'Wprowadź hasło';
    }

    // Make sure errors are empty
    if(empty($email_err) && empty($password_err)){
      // Prepare query
      $sql = 'SELECT first_name, email, password FROM store WHERE email = :email';

      // Prepare statement
      if($stmt = $pdo->prepare($sql)){
        // Bind params
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);

        // Attempt execute
        if($stmt->execute()){
          // Check if email exists
          if($stmt->rowCount() === 1){
            if($row = $stmt->fetch()){
              $hashed_password = $row['password'];
              if(password_verify($password, $hashed_password)){
                // SUCCESSFUL LOGIN
                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['first_name'] = $row['first_name'];
                header('location: store-dashboard.php');
              } else {
                // Display wrong password message
                $password_err = 'Wprowadzone hasło jest nieprawidłowe';
              }
            }
          } else {
            $email_err = 'Nie ma takiego użytkownika, zarejestruj się.';
          }
        } else {
          die('Coś poszło nie tak');
        }
      }
      // Close statement
      unset($stmt);
    }

    // Close connection
    unset($pdo);
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="store-login.css">
    <title>StoreManagerHelp Strona Logowania</title>
</head>

<body>
    <main>
        <h1>Zaloguj się</h1>


        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

            <input type="email" name="email" placeholder="Email" class="<?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
            <span class="invalid-feedback"><?php echo $email_err; ?></span>
            <input type="password" name="password" placeholder="Hasło"class="<?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
            <span class="invalid-feedback"><?php echo $password_err; ?></span>
            <button class="login-button" type="submit" name="submit"><h4>Zaloguj się</h4></button>
        </form>

    </main>

</body>

</html>