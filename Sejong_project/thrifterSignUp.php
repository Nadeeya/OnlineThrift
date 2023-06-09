<?php
include 'database.php';


$username = $_POST['username'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password_1 = $_POST['password_1'];
$password_2 = $_POST['password_2'];

$message = [];

if (isset($_POST['signup_seller']) && $_POST['signup_seller'] == 'Submit') {

    //Checking if user already exist in the database
    $user_check = "SELECT * FROM seller WHERE username ='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($conn, $user_check);
    $user = mysqli_fetch_assoc($result);

    if (empty($username) || empty($email) || empty($password_1) || empty($password_2)) {
        $message[] = "Please fill in all fields";
    } else if ($user) {
        if ($user['username'] === $username) {
            $message[] = "Username already exists, please go back and register a new one";
        }
        if ($user['email'] === $email) {
            $message[] = "email already exists, please go back and register a new one";
        }
    } else if ($password_1 != $password_2) {
        $message[] = "Please enter the same password";
    }

}

echo "<h3 style='text-align: center; margin-top: 10px;'>" . implode(", ", $message) . "</h3></br>";

if (count($message) == 0) {
    $sql = "INSERT INTO buyer (username, phone ,  email, password) VALUES
  ('$username','$phone', '$email', '$password_1')";

    if (mysqli_query($conn, $sql)) {
        echo "<h3>Registration Successful!</h3>
        <p>Will direct you to your home page momentarily</p>";
        header('refresh: 2; url=index.php?username=' . $username);
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    mysqli_close($conn);

} else {
    echo "<p style='text-align:center;'>Will redirect you back momentarily</p>";
    header('refresh: 2; url=sellerSignUpPage.html');
}
