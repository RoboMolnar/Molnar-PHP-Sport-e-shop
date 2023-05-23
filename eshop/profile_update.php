<?php
session_start();
if ($_SESSION['user_name'] != "admin") {
                        header("Location: index.php");
                }


if ($_POST['name'] && $_POST['pass'] && $_POST['email']) {

	include "dbkonekt.php";
	 $meno = $_POST['name'];
	 $heslo = md5($_POST['pass'], FALSE);	
	 $mail = $_POST['email'];	

	 $sql = "SELECT * FROM users WHERE user_name='$meno'";
	 $vymaz = "DELETE FROM users WHERE user_name='$meno'";
	 $update = "UPDATE users SET password='$heslo', email='$mail' WHERE user_name='$meno'";
	 $insert = "INSERT INTO users (user_name, password, email) VALUES ('$meno', '$heslo', '$mail')";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
		if ($_POST['delete'] && $meno == "admin") {
			header("Location: cms.php?error=Používateľa $meno nemožno z databázy odstrániť.");
			exit();
		}
		if ($_POST['delete'] && $meno != "admin") {                                                                                 #vymazanie usera z DB
		mysqli_query($conn, $vymaz);
                header("Location: cms.php?error=Mažem používateľa $meno z databázy.");
		exit();
		}
		mysqli_query($conn, $update);
		header("Location: cms.php?error=Editujem existujúceho používateľa $meno");		#editacia existujuceho uzivatela
		exit();
	}


	if ($_POST['status']) {
                mysqli_query($conn, $insert);
		header("Location: cms.php?error=Vytváram nového používateľa $meno");			#vytvorenie noveho uzivatela
		exit();


	} else {
                header("Location: cms.php?error=Takýto používateľ v databáze neexistuje!!! Ak ho chcete vytvoriť, zaškrtnite políčko Nový používateľ.");
                exit();

	}  

}
else header("Location: cms.php?error=Nevyplnili ste jedno z povinných políčok *");



?>

