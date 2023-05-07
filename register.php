<?php
// Démarrer la session
session_start();
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Vérifier si les champs ne sont pas vides
    if (empty($email) || empty($username) || empty($password) || empty($confirm_password)) {
        $message = "Please fill in all fields.";
    }

    // Vérifier si l'adresse email est invalide
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Your email is invalid.";
    }

    // Vérifier si le nom d'utilisateur contient au moins 5 caractères
    elseif (strlen($username) < 5) {
        $message = "Username must be at least 5 characters.";
    }

    // Vérifier si le mot de passe est assez sécurisé
    elseif (strlen($password) < 5) {
        $message = "Password must be at least 5 characters.";
    }

    elseif (!preg_match('/[a-z]/', $password)) {
        $message = "1 lowercase letter required for password.";
    }

    elseif (!preg_match('/[A-Z]/', $password)) {
        $message = "1 uppercase letter required for password.";
    }

    elseif (!preg_match("/\d/", $password)) {
        $message = "Password must contain at least 1 digit.";
    }

    elseif (!preg_match('/\w/', $password)) {
        $message = "Password needs at least 1 character.";
    }

    // Vérifier si les mots de passe correspondent
    elseif ($password != $confirm_password) {
        $message = "The passwords do not match.";
    }
    
    // Si toutes les validations sont passées, enregistrer l'utilisateur dans la base de données ou envoyer un email de confirmation
    else {
        // TODO: Enregistrer l'utilisateur dans la base de données ou envoyer un email de confirmation
        $message = "Your account has been successfully created.";
    }
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <title>reversechat</title>
</head>
<body>
    <div class="box">
        <div class="form">
            <h2>Sign up</h2>
            <form method="post" action="register.php">
                <div class="inputBox">
                    <input type="text" required="required" name="email">
                    <span>Email</span>
                    <i></i>
                </div>
                <div class="inputBox">
                    <input type="text" required="required" name="username">
                    <span>Username</span>
                    <i></i>
                </div>
                <div class="inputBox">
                    <input type="password" id="pass" required="required" name="password">
                    <span>Password</span>
                    <i></i>
                    <img src="./red_eye.png" id="eye">
                </div>
                <div class="inputBox">
                    <input type="password" id="pass2" required="required" name="confirm_password">
                    <span>Confirm Password</span>
                    <i></i>
                    <img src="./red_eye.png" id="eye2">
                </div>
                <div class="links">
                    <a class="already">Do you already have an account ?</a>
                    <a href="login.php" class="sign">Sign in</a>
                </div>
                <?php if (isset($message)) { ?>
                    <div id="message" class="error"><?php echo $message; ?></div>
                        <script>
                            setTimeout(function(){
                                var messageDiv = document.getElementById("message");
                                messageDiv.style.display = "none";
                            }, 5000);
                        </script>
                <?php } ?>
                <div class="register">
                    <input type="checkbox" id="register-me" name="register-me">
                    <span>Remember me</span>
                </div>
                <input type="submit" value="Register" class="register-btn">
            </form>
            <script>
            const passwordInput = document.getElementById("pass");
            const eyeIcon = document.getElementById("eye");

            eyeIcon.addEventListener("click", () => {
                const isPasswordVisible = passwordInput.type === "text";
                passwordInput.type = isPasswordVisible ? "password" : "text";
                eyeIcon.src = isPasswordVisible ? "./red_eye.png" : "./green_eye.png";
            });
            </script>
            <script>
            const passwordInput2 = document.getElementById("pass2");
            const eyeIcon2 = document.getElementById("eye2");

            eyeIcon2.addEventListener("click", () => {
                const isPasswordVisible2 = passwordInput2.type === "text";
                passwordInput2.type = isPasswordVisible2 ? "password" : "text";
                eyeIcon2.src = isPasswordVisible2 ? "./red_eye.png" : "./green_eye.png";
            });
            </script>
        </div>
    </div>
</body>
</html>
