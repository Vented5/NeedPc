<?php
    session_start();
    if(!isset($_SESSION["email"])){
        $userImage = "../images/icons8-nombre-64.png";
        $userName = "Guest1";
        header('Location: login.html');
    } else {
        $userImage = "../images/". $_SESSION["user_image"];
        $userName = $_SESSION['username'];
    }


?>

<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../stylesheet.css">
    
</head>
<body class="h-100 bg-dark text-white">
<!------ Include the above in your HEAD tag ---------->

<header>
            <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark border-bottom border-primary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="../index.php">
                        <img src="../images/icons8-nfc-n-40.png" alt="">
                        NeedPc?</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                    </li>
                    <!--<li class="nav-item">
                        <a class="nav-link" href="#">Catalogue</a>
                    </li>-->
                    <li class="nav-item">
                        <a class="nav-link active" href="profile.php">Profile</a>
                    </li>
                    </ul>
                    <!--
                    <form class="d-flex my-auto" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
            -->     <H4><?php echo $userName;?></H4>
                    <div class="dropdown">
                    <a class="btn btn-dark dropdown-toggle ms-4 me-2" href="profile.php" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="<?php echo $userImage?>" class="userImgNav flex-img rounded-circle" alt="useer-image">
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                        <li><a id="logout" class="dropdown-item" href="../php/logout.php">Log out</a></li>
                    </ul>
                    </div>
                    
                </div>
                </div>
            </nav>
            </header>


<div class="container emp-profile" id="profile">
            
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img class="userImg flex-img" src="../images/<?php echo $_SESSION["user_image"]; ?>" alt=""/>
                            
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h1>
                                        <?php echo $_SESSION["username"]; ?>
                                    </h1>
                                    <h6>
                                        Web Developer and Designer
                                    </h6>
                                    <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                    
                            </ul>
                        </div>
                        <div class="row">
                    
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>User Id</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $_SESSION["user_id"]?></p>                                                
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Userame</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $_SESSION["username"]?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $_SESSION["email"]?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Description</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Hey I'm using NeedPc!</p>
                                            </div>
                                        </div>
                                    

                            </div>
                            
                        </div>
                    </div>
                </div>


                    </div>
                    <div class="col-md-2">
                        <input  role="button" class="profile-edit-btn" onclick="message()" name="btnAddMore" value="Edit Profile"/>
                    </div>
                </div>
                
                
                     
        </div>
        <script src="../scripts/editProfile.js"></script>
</body>
</html>