<?php
session_start();
if ($_SESSION['user_name'] != "admin") {
                        header("Location: index.php");
                }

 ?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>CMS</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!--

TemplateMo 546 Sixteen Clothing

https://templatemo.com/tm-546-sixteen-clothing

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">

  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.php"><h2>Oceľové <em>Svaly</em></h2><?php if (isset($_SESSION['user_name']))
{ echo '<font color="green"> Ste prihlásený ako používateľ '.$_SESSION['user_name'];}?></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Domov
                  <span class="sr-only">(current)</span>
                </a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="products.php">Naše produkty</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="about.php">O nás</a>
              </li>
	      <li class="nav-item">

 	<a class="nav-link" <?php if (isset($_SESSION['user_name'])) {
             echo 'href="logout.php">Logout';}
                else {
                        echo 'href="login.php">Login';}
                ?>
                </a>
             </li>

              <li class="nav-item">
                <a class="nav-link" href="contact.php">Kontaktujte nás</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Page Content -->
    <div class="page-heading cms-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>Manažment používateľov</h4>
              <h2><font color="blue">CMS</font></h2>
            </div>
          </div>
        </div>
      </div>
    </div>


<!-- sem pojde cms editacny kod -->
     <form action="profile_update.php" method="post">
	<br><br>
        <h2><center>Editácia používateľov</center></h2>
	<br>

        <?php if (isset($_GET['error'])) { ?>

            <p class="error"><?php echo $_GET['error']; ?></p>

        <?php } ?>

	<div  style ="text-align:center;">
   meno*: <input type="text" name="name" ><br>
 
   heslo*: <input type="text" name="pass"><br>
 
   email*: <input type="email" name="email"><br>
 
   Nový používateľ: <input type="checkbox" name="status" value="status"><br>
   
   Vymazať používateľa: <input type="checkbox" name="delete" value="delete"><br><br>
   
   <input type="submit" name="edit">
   <br><br><br>
   Zoznam používateľov:

<?php
 include "dbkonekt.php";
 $sql = "SELECT user_name FROM users";
$result = mysqli_query($conn, $sql);
echo '<b>';
foreach ($result as $row) {
	#echo '<tr><td>' . implode('</td><td>', $row) . '</td></tr>';
	echo implode('',$row).", ";
}

mysqli_close($conn);


?>


</div>

     </form>





<!-- sem pojde cms editacny kod -->
    
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Všetky práva vyhradené &copy; 2023 Oceľové svaly, s.r.o.
            
            - Dizajn: <a rel="nofollow noopener" href="http://localhost" target="_blank">OceloveSvaly</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>


  </body>

</html>
