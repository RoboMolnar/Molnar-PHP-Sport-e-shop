<?php 

session_start(); 

include "dbkonekt.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $uname = validate($_POST['uname']);

    $passx = validate($_POST['password']);
    $pass = md5($passx, FALSE);

    if (empty($uname)) {

        header("Location: login.php?error=Nezadali ste meno");

        exit();

    }else if(empty($pass)){

        header("Location: login.php?error=Nezadali ste heslo");

        exit();

    }else{

        $sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['user_name'] === $uname && $row['password'] === $pass) {

                echo "Logged in!";

                $_SESSION['user_name'] = $row['user_name'];

                $_SESSION['name'] = $row['name'];

                $_SESSION['id'] = $row['id'];

                header("Location: index.php");

                exit();

            }else{

                header("Location: login.php?error=Nesprávne meno alebo heslo");

                exit();

            }

        }else{

            header("Location: login.php?error=Nesprávne meno alebo heslo");

            exit();

        }

    }

}else{

    header("Location: logout.php");

    exit();

}
?>
