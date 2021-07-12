<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue chez LARADEEL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<style>
img.displayed {
    display: block;
    margin-left: auto;
    margin-right: auto }
    
.btn:hover
{
    font-weight: 700;
    border-radius: 300px ;
    text-transform: uppercase;
}



.btn
{
    background-color: orangered;
    border-color: orangered;
    border-radius: 300px ;
    
    border-width: 1px;

}


.btn
{
    padding: 0.5rem 1rem;
}
#carouselExampleIndicators{
    width: 50%;
    margin: 0 auto;
    margin-top: 120px;
}
.bas{
    padding: 2rem; 
    margin-left: 300px;
}
</style>
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">RADEEL</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active btn" aria-current="page" href="connexion.php" >Se connecter</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active btn" href="inscription.php" >S'inscrire</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link  active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Plus
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Payer en ligne</a></li>
            <li><a class="dropdown-item" href="contact.html">Réclamer</a></li>
            <!-- <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="contact.html">Contacter nous</a></li> -->
          </ul>
        </li>
        
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search..." aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Rechercher</button>
      </form>
    </div>
  </div>
</nav>

<p>
    <img src="RADEEL.png" alt=""  height="220" width="1220"/>
</p>
<br>

<br>
<div class="container">
<h1 style="font-family:verdana; color:red; text-align:center;"> <b>Bienvenue chez LA R.A.D.E.E.L</b> en ligne </h1>

<h5 style="text-align:center;">
<b>R.A.D.E.E.L. La Régie Autonome Intercommunale de Distribution d'Eau et d'Electricité de la Province de LARACHE

</b>
</h5>
<br>
<hr>

</div>


<div class="cnt">
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" >
  <div class="carousel-indicators" >
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="RADEEL CoronaVirus.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="paiement-en-ligne-radeel-min.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="radeel3.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<br><br><br><br>
</div >

<div class="bas">

<a href="connexion.php"> Connectez vous </a> pour consulter vos: <br>
<ul>
<li>Factures et règlements</li>
<li>Consommations</li>

</ul>
Si vous êtes nouveaux à l'application veuillez  <a href="inscription.php">s'inscrire</a>

</div>


<!-- Footer -->
<footer class="text-center text-lg-start bg-light text-muted">
  <!-- Section: Social media -->
  <section
    class="d-flex justify-content-center justify-content-lg-between p-2 border-bottom"
  >
    <!-- Left -->
    <!-- <div class="me-5 d-none d-lg-block">
      <span>Get connected with us on social networks:</span>
    </div> -->
    <!-- Left -->

    <!-- Right -->
    <!-- <div>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-google"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-linkedin"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-github"></i>
      </a>
    </div> -->
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-5 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3"></i>La R.A.D.E.E.L
          </h6>
          <p>
          La régie autonome intercommunale de distribution d’eau et d’électricité de la Province de Larache
          est un établissement public à caractère industriel et commercial doté de la responsabilité civile
          et de l’autonomie financière.
          Cet établissement a été crée en janvier 1996 conformément au décret n° 2-64-394 du 22 joumada I 1384
          (29 septembre 1964), aux délibérations du syndicat des communes et à l’arrêté de Monsieur le Ministre
          de l’intérieur n° 9-95-96.
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Services assuré
          </h6>
          <p>
            <a href="connexion.php" class="text-reset">Consultation de factures</a>
          </p>
          <p>
            <a href="connexion.php" class="text-reset">Consultation de consommation</a>
          </p>
          
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Useful links
          </h6>
          <p>
            <a href="inscription.php" class="text-reset">Inscription</a>
          </p>
          <p>
            <a href="connexion.php" class="text-reset">Connexion</a>
          </p>
          
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Contact
          </h6>
          <p><i class="fas fa-home me-3"></i> Adresse: 1647, Lotissement Maghreb Al jadid B.P : 11; 92000 Larache Maroc </p>
          
          <p><i class="fas fa-phone me-3"></i> Tél: +212.539.52.09.25</p>
          <p><i class="fas fa-print me-3"></i> Fax: +212.539.52.03.25 </p>
          <p><i class="fas fa-print me-3"></i> N° Eco: 0801.000.042 </p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-2" style="background-color: rgba(0, 0, 0, 0.05);">
  <a href="https://www.linkedin.com/in/farah-al-harrak-522869197/">FARAH AL HARRAK</a> -  
  
    <P class="text-reset fw-bold" >© 2021 : R.A.D.E.E.L</P>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>