<?php
    include("../php/conexion.php");
?>
<!DOCTYPE html>
<html lang="en" class="d-flex h-100 html">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Recomendaciones</title>
        <link rel="stylesheet" href="../stylesheet.css">
    </head>
    <body class="d-flex w-100 m-0 bg-image flex-column">
        <!-- ///////////   NAVBAR    // //////////////////  -->
        <nav class=" d-flex border-bottom border-primary bg-dark">
            <div class="d-flex w-100 p-2 align-items-center">
                <img src="../images/icons8-nfc-n-60.png">
                <h1 class="mx-3 fs-3 text-white">NeedPc?</h1>
                <a href="pages/login.html" class="ms-auto" style="width: 64px;height: 64px;">
                    <img src="../images/icons8-user-64.png" alt="profile">
                </a>
            </div>
        </nav>

        <div class="bg-dark h-100 p-5 mx-custom text-white">

            ////////////  Formulario /////////////
            <form class="d-flex flex-column " action="r.php" method="post">
                <h2>Want to build something today?</h2>
                
                <!-- COMPONENT -->
                <select name="component">
                        <option value="Desktop">Desktop</option>
                    </select>
                
                <!-- TYPE COMPONENT -->
                <h3>Select a component</h3>
                <SELect name="type">
                    <option value="cpu">CCPU</option>
                    <option value="motherboards">MOTHERBOARD</option>
                    <option value="ram">RAM</option>
                    <option value="sto">STO</option>
                    <option value="gpu">GPU</option>
                    <option value="psu">PSU</option>
                </SELect>
                
                <!-- BUDGET -->
                <h3>Select a budget</h3>
                <select name="budget">
                    <option value="1000">1000</option>
                    <option value="2000">2000</option>
                    <option value="5000">5000</option>
                </select>

                <!-- NECESSITY -->
                <h3>Select a necessity</h3>
                <SELEct name="necessity">
                    <option value="videoGames">Gaming</option>
                    <option value="streaming">Streaming</option>
                    <option value="design">Design</option>
                    <option value="office">Office</option>
                </SELEct>

                <input type="submit" name="btn">
            </form>


            <?php
                /////////////  BOTON ENVIAR    //////////////
                if(isset($_POST['btn'])){
                    
                    ////////////   Variables de consuta / ////////
                    $component = $_POST['component'];
                    $type = $_POST['type'];
                    $necessity = $_POST['necessity'];
                    $budget = $_POST['budget'];
                    
                    switch($necessity){
                        case 'videoGames':
                            $primaryTable = 'grahphic_cards';
                            $relativeValue = $budget/4;
                            $v1 = "NVIDIA";
                            $v2 = "AMD";
                            break;
                        case 'office':
                            $primaryTable = 'processors';
                            $relativeValue = $budget/4;
                            $v1 = "Intel";
                            $v2 = "AMD";    
                            break;
                        case 'design':
                            $primaryTable = 'hdd';
                            $relativeValue = $budget/10;
                            $v1 = "HDD";
                            $v2 = "SDD";
                            $v3 = "M2";
                            break;
                        case 'streaming':
                            $primaryTable = 'graphic_cards';
                            $relativeValue = $budget/4;
                            $v1 = "NVIDIA";
                            $v2 = "AMD";
                            break;
                    }
                    $where = " WHERE price <= ". $relativeValue;
                    $query = "SELECT * FROM " . $primaryTable . $where;

                    
                    echo "
                        <p class='caption'> El resultado de tu consulta es: </p>
                        <table class='table'>
                            <tr>
                                <th class='th'>id</th>
                                <th class='th'>brand</th>
                                <th class='th'>model</th>
                                <th class='th'>socket</th>
                                <th class='th'>price</th>                        
                                <th class='th'>score</th>
                            </tr>";
                    
                    foreach ($con->query($query) as $row){
                            print "<tr><td class='td'>" . $row['id_motherboard'];
                            print "</td><td class='td'>" . $row['brand'];
                            print "</td><td class='td'>" .$row['model']; 
                            print "</td><td class='td'>" .$row['socket'];
                            print "</td><td class='td'>" .$row['price'];
                            print "</td><td class='td'>" .$row['score'] . "</tr>";
                        }
                    echo "</table>";
                }
            ?>
        </div>
    </body>
</html>