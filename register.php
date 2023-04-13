<?php

require_once 'database.php';

$username = $fname = $lname = $phone = $email  = $password = $confirm_password = '';
$username_err = $fname_err = $lname_err = $phone_err = $email_err = $password_err = $confirm_password_err = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);
    $username =  trim($_POST['username']);
    $fname = trim($_POST['first_name']);
    $lname = trim($_POST['last_name']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    if (empty($email)) {
        $email_err = 'Wprowadź email';
    } elseif (!preg_match("/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/", $email)) {
        $email_err = "Format emaila jest nieprawidłowy";
    } else {
        $sql = 'SELECT store_id FROM store WHERE email = :email';

        if ($stmt = $pdo->prepare($sql)) {
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            if ($stmt->execute()) {
                if ($stmt->rowCount() === 1) {
                    $email_err = 'Ten mail jest już w bazie';
                }
            } else {
                die('Coś poszło nie tak');
            }
        }

        unset($stmt);
    }


    if (empty($username)) {
        $username_err = 'Wprowadź nazwę firmy';
    }
    if (empty($fname)) {
        $fname_err = 'Wprowadź  imię';
    }
    if (empty($lname)) {
        $lname_err = 'Wprowadź  nazwisko';
    }

    if (empty($phone)) {
        $phone_err = 'Wprowadź numer telefonu';
    }



    if (empty($password)) {
        $password_err = 'Wprowadź hasło';
    } elseif (!preg_match('/(?=[A-Za-z0-9@#$%^&+!=]+$)^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@#$%^&+!=])(?=.{8,}).*$/', $password)) {
        $password_err = 'Hasło musi mieć conajmniej 8 znaków, <br> w tym jedną cyfrę oraz <br>  jedną dużą i małą literę ';
    }


    if (empty($confirm_password)) {
        $confirm_password_err = 'Proszę potwierdzić hasło';
    } else {
        if ($password !== $confirm_password) {
            $confirm_password_err = 'Hasła nie pasują do siebie';
        }
    }

    if (empty($username_err) && empty($fname_err) && empty($lname_err) && empty($phone_err) && empty($email_err)   && empty($password_err) && empty($confirm_password_err)) {

        $password = password_hash($password, PASSWORD_DEFAULT);


        $sql = 'INSERT INTO store (username, first_name, last_name, phone,  email,  password) VALUES (:username, :first_name, :last_name, :phone, :email, :password)';

        if ($stmt = $pdo->prepare($sql)) {

            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':first_name', $fname, PDO::PARAM_STR);
            $stmt->bindParam(':last_name', $lname, PDO::PARAM_STR);
            $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);


            if ($stmt->execute()) {
                header('location: login.php');
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
    <title> StoreManagerHelp - Rejestracja</title>
</head>

<body>
    <main>
        <h1>Zarejestruj się</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" novalidate>
            <input type="text" name="username" placeholder="Nazwa Firmy" class="<?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
            <span class="invalid-feedback"><?php echo $username_err; ?></span>
            <input type="text" name="first_name" placeholder="Imię" class="<?php echo (!empty($fname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $fname; ?>">
            <span class="invalid-feedback"><?php echo $fname_err; ?></span>
            <input type="text" name="last_name" placeholder="Nazwisko" class="<?php echo (!empty($lname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $lname; ?>">
            <span class="invalid-feedback"><?php echo $lname_err; ?></span>
            <input type="tel" name="phone" placeholder="Telefon" class="<?php echo (!empty($phone_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $phone; ?>">
            <span class="invalid-feedback"><?php echo $phone_err; ?></span>
            <input type="email" name="email" placeholder="Email" class="<?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
            <span class="invalid-feedback"><?php echo $email_err; ?></span>
            <input type="password" name="password" placeholder="Hasło" class="<?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
            <span class="invalid-feedback"><?php echo $password_err; ?></span>
            <input type="password" name="confirm_password" placeholder="Powtórz Hasło" class=" <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
            <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            <button class= "register-button" type="submit" name="submit"><h4>Zarejestruj się</h4></button>
            <a href="login.php">Masz już konto? Zaloguj się</a>
        </form>

    </main>

</body>

</html>