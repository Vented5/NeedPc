<?php
  session_start();
  if(!isset($_SESSION["email"])){
    $userImage = "images/icons8-nombre-64.png";
    $userName = "Guest1";
  } else {
    $userImage = "images/". $_SESSION["user_image"];
    $userName = $_SESSION['username'];
  }
?>

<html lang="en" class="h-100"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Carousel Template · Bootstrap v5.2</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/carousel/">
    <link rel="stylesheet" href="stylesheet.css">
    

    

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.2/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.2/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.2/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
<link rel="icon" href="/docs/5.2/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#712cf9">


 
    
    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
  </head>
  <body class="h-100">
    
<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark border-bottom border-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <img src="images/icons8-nfc-n-40.png" alt="">
            NeedPc?</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <!--<li class="nav-item">
            <a class="nav-link" href="#">Catalogue</a>
          </li>-->
          <li class="nav-item">
            <a class="nav-link active" href="pages/profile.php">Profile</a>
          </li>
        </ul>
        <!--
        <form class="d-flex my-auto" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
-->     <H4><?php echo $userName;?></H4>
        <div class="dropdown">
          <a class="btn btn-dark dropdown-toggle ms-4 me-2" href="pages/profile.php" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="<?php echo $userImage?>" class="userImgNav flex-img rounded-circle" alt="useer-image">
          </a>

          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="pages/profile.php">Profile</a></li>
            <li><a id="logout" class="dropdown-item" href="php/logout.php">Log out</a></li>
          </ul>
        </div>
        
      </div>
    </div>
  </nav>
</header>

<main class="bg-dark text-white"> <!-- /////////  MAIN  /////////////////////-->

  <div id="myCarousel" class="carousel slide mb-5" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-label="Slide 1" aria-current="true"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2" class=""></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3" class=""></button>
    </div>
    <div class="carousel-inner"> 
         <div class="carousel-item carousel-item-next carousel-item-start">
            <img src="images/pexels-photo-6432056 (1).jpeg" class="img-fluid" alt="">

            <div class="container">
            <div class="carousel-caption text-start">
            <h1>Looking for advice?.</h1>
            <H4>Find the component that find your needs, use the recomendation tool.</h4>
            <p><a class="btn btn-lg btn-primary" href="pages/r.php">Start now</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="images/pexels-jake-guzman-6716692 (2) (1).jpg" class="img-fluid" alt="">
        <div class="container">
          <div class="carousel-caption">
            <h1>Something more specific?.</h1>
            <p>Log in and enjoy improved builds!.</p>
            <!--<p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>-->
          </div>
        </div>
      </div>
      <div class="carousel-item active carousel-item-start">
        <img src="images/pexels-photo-6432056 (1).jpeg" class="img-fluid" alt="">
        <div class="container">
          <div class="carousel-caption text-end">
            <h1>Custom recomendations.</h1>
            <p>Improved and cheaper options available!.</p>
            <!--<p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>-->
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>


  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row">
      <div class="col-lg-4">
        <img src="images/pexels-yugantar-sambhangphe-4034204 140x140.jpg" alt="" class="rounded-circle">
        <h2 class="fw-normal">Design & 3D</h2>
        <p>Focused on all the users that may need free space for all the brilliant works.</p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <img src="images/pexels-suludan-diliyaer-596750 140X140.jpg" alt="" class="rounded-circle">
        <h2 class="fw-normal">Videogames</h2>
        <p>Looking for something more fun?... try our recommendations designed for players and streamers.</p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <img src="images/pexels-magda-ehlers-1054713 140x140.jpg" alt="" class="rounded-circle">
        
        <h2 class="fw-normal">Proffesional Software</h2>
        <p>Heavy files processing or specialized profesional software?, you may need more than a toaster.</p>
        <!--<p><a class="btn btn-secondary" href="#">View details »</a></p>-->
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->


    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading fw-normal lh-1">Each user is different. <span class="text-muted">And so your Pc!</span></h2>
        <p class="lead">NeedPc? Is a project developed and inspired by all of those computer users, family and friends, that often may ask "Which computer should I look for?".</p>
        <p class="lead"></p>
      </div>
      <div class="col-md-5">
      <img src="images/pexels-lucie-liz-3165335.jpg" class="flex-img" alt="Wenas noches">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading fw-normal lh-1">How does it work?. <span class="text-muted">See for yourself.</span></h2>
        <p class="lead">NeedPc? runs with one directive in mind, maximize eficiency and minimize the cost, of curse, the prcices may vary and we ecourage users to improve their technologyknowledge.</p>
      </div>
      <div class="col-md-5 order-md-1">
        <img src="images/pexels-hasan-albari-1229861(1).jpg" class="flex-img" alt="Wenas noches">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading fw-normal lh-1">And lastly, why NeedPc?. <span class="text-muted">Checkmate.</span></h2>
        <p class="lead">NeedPC? has a continuous growth in data recopilation, and can make accurate recomendations based on the individual needs.</p>
      </div>
      <div class="col-md-5">
        <img src="images/pexels-mateusz-dach-450035(1).jpg" class="flex-img" alt="Wenas noches">
        
      </div>
    </div>

    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->


  <!-- FOOTER -->
  <footer class="container">
    <p class="float-end"><a href="#">Back to top</a></p>
    <p>© 2022 NeedPc?, Inc. · <a href="#">Privacy</a> · <a href="#">Terms</a></p>
  </footer>
</main>


    <script src="Bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="scripts/logout.js"></script>
      
  

</body></html>