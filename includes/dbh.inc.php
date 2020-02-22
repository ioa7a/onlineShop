<?php

session_start();

$dbServername = "localhost:8090";
$dbUsername = "root";
$dbPassword = "";
$userDB = "online_shop";
$errors = array();

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $userDB);
// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required. "); }
		if (empty($password_1)) { array_push($errors, "Password is required. "); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO login_info (username, password)
					  VALUES('$username', '$password')";

			if(mysqli_query($conn, $query)){

			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: index_admin.php');}
			else {
				array_push($errors, "Something went wrong.");
			}
		}

	}
//LOGIN
if (isset($_POST['login_user'])) {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password = md5($password);

    if (empty($username)) {
    array_push($errors, "Username is required.");
		}
    if (empty($password)) {
        array_push($errors, "Password is required.");
		}

    if (count($errors) == 0) {
        //cautam numele utilizatorului si parola lui in baza de date
	$query = "SELECT * FROM login_info WHERE username='$username' AND password='$password'";
	$results = mysqli_query($conn, $query);
        if(mysqli_num_rows($results) == 1){
            //daca utilizatorul exista in baza de date, este logat si trimis la pagina principala
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: index_admin.php'); }



    else {
            array_push($errors, "Wrong username/password combination. Please try again.");
        }
			}
}

?>
