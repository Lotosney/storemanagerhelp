<?php
// Include db config
require_once 'database.php';

// Init vars
$username = $fname = $lname = $phone = $email = $region = $address = $password = $confirm_password = '';
$username_err = $fname_err = $lname_err = $phone_err = $email_err = $region_err = $address_err = $password_err = $confirm_password_err = '';

// Process form when post submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize POST
    $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

    // Put post vars in regular vars
    $username =  trim($_POST['username']);
    $fname = trim($_POST['first_name']);
    $lname = trim($_POST['last_name']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $region = trim($_POST['region']);
    $address = trim($_POST['address']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    // Validate email
    if (empty($email)) {
        $email_err = 'wprowadź email';
    } elseif (!preg_match("/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/", $email)) {
        $email_err = "Format emaila jest nieprawidłowy";
    } else {
        // Prepare a select statement
        $sql = 'SELECT store_id FROM store WHERE email = :email';

        if ($stmt = $pdo->prepare($sql)) {
            // Bind variables
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);

            // Attempt to execute
            if ($stmt->execute()) {
                // Check if email exists
                if ($stmt->rowCount() === 1) {
                    $email_err = 'Ten mail jest już w bazie';
                }
            } else {
                die('Coś poszło nie tak');
            }
        }

        unset($stmt);
    }

    // Validate name
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

    if (empty($region)) {
        $region_err = 'Wybierz region';
    }
    if (empty($address)) {
        $address_err = 'Podaj adres';
    }
    // Validate password
    if (empty($password)) {
        $password_err = 'Wprowadź hasło';
    } elseif (!preg_match('/(?=[A-Za-z0-9@#$%^&+!=]+$)^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@#$%^&+!=])(?=.{8,}).*$/', $password)) {
        $password_err = 'Hasło musi mieć conajmniej 8 znaków, <br> w tym jedną cyfrę oraz <br>  jedną dużą i małą literę ';
    }

    // Validate Confirm password
    if (empty($confirm_password)) {
        $confirm_password_err = 'Proszę potwierdzić hasło';
    } else {
        if ($password !== $confirm_password) {
            $confirm_password_err = 'Hasła nie pasują do siebie';
        }
    }

    // Make sure errors are empty
    if (empty($username_err) && empty($fname_err) && empty($lname_err) && empty($phone_err) && empty($email_err) && empty($region_err) && empty($address_err)  && empty($password_err) && empty($confirm_password_err)) {
        // Hash password
        $password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare insert query
        $sql = 'INSERT INTO store (username, first_name, last_name, phone,  email, region, address, password) VALUES (:username, :first_name, :last_name, :phone, :email, :region , :address, :password)';

        if ($stmt = $pdo->prepare($sql)) {
            // Bind params
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':first_name', $fname, PDO::PARAM_STR);
            $stmt->bindParam(':last_name', $lname, PDO::PARAM_STR);
            $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':region', $region, PDO::PARAM_STR);
            $stmt->bindParam(':address', $address, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);

            // Attempt to execute
            if ($stmt->execute()) {
                // Redirect to login
                header('location: ../store-login.php');
            } else {
                die('Coś poszło nie tak');
            }
        }
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
    <title> Store Register Page</title>
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
            <input list="region" type="region" name="region" placeholder="Wybierz swój region" class="<?php echo (!empty($region_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $region; ?>">
            <datalist id="region">
                <option value="Zachodniopomorskie">
                <option value="Pomorskie">
                <option value="Warmińsko-Mazurskie">
                <option value="Lubuskie">
                <option value="Wielkopolskie">
                <option value="Kujawsko-Pomorskie">
                <option value="Łódzkie">
                <option value="Podlaskie">
                <option value="Mazowieckie">
                <option value="Lubelskie">
                <option value="Podkarpackie">
                <option value="Małopolskie">
                <option value="Opolskie">
                <option value="Dolnośląskie">
                <option value="Śląskie">
                <option value="Świętokrzyskie">
            </datalist>
            <span class="invalid-feedback"><?php echo $region_err; ?></span>
            <input type="address" name="address" placeholder="Adres" class="<?php echo (!empty($address_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $address; ?>">
            <span class="invalid-feedback"><?php echo $address_err; ?></span>
            <input type="password" name="password" placeholder="Hasło" class="<?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
            <span class="invalid-feedback"><?php echo $password_err; ?></span>
            <input type="password" name="confirm_password" placeholder="Powtórz Hasło" class=" <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
            <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            <button class= "register-button" type="submit" name="submit"><h4>Zarejestruj się</h4></button>
            <a href="store-login.php">Masz już konto? Zaloguj się</a>
        </form>

    </main>

</body>

</html>