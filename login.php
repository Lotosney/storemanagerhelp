<?php

  require_once 'database.php';
  $email = $password = '';
  $email_err = $password_err = '';


  if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $_POST = filter_input_array(INPUT_POST);


    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if(empty($email)){
      $email_err = 'Wprowadź email';
    }

    if(empty($password)){
      $password_err = 'Wprowadź hasło';
    }


    if(empty($email_err) && empty($password_err)){

      $sql = 'SELECT first_name, email, password FROM store WHERE email = :email';

      if($stmt = $pdo->prepare($sql)){

        $stmt->bindParam(':email', $email, PDO::PARAM_STR);

        if($stmt->execute()){
          if($stmt->rowCount() === 1){
            if($row = $stmt->fetch()){
              $hashed_password = $row['password'];
              if(password_verify($password, $hashed_password)){
                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['first_name'] = $row['first_name'];
                header('location: dashboard.php');
              } else {
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
      unset($stmt);
    }

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
    <title>StoreManagerHelp - Logowanie</title>
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
            <a href="register.php">Nie masz konta? Zarejestruj się</a>
        </form>

    </main>

</body>

</html>