<?php
    include("../php/conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Recomendaciones</title>
    </head>
    <body>
        ////////////  Formulario /////////////
        <form action="r.php" method="post">

            //Componente
            <select name="component">
                    <option value="Desktop">Desktop</option>
                </select>
            
            //Tipo de componente
            <SELect name="type">
                <option value="cpu">CCPU</option>
                <option value="motherboards">MOTHERBOARD</option>
                <option value="ram">RAM</option>
                <option value="sto">STO</option>
                <option value="gpu">GPU</option>
                <option value="psu">PSU</option>
            </SELect>
            
            /// BUDGET 
            <select name="budget">
                <option value="1000">1000</option>
                <option value="2000">2000</option>
                <option value="5000">5000</option>
            </select>

            /// NECESSITY 
            <SELEct name="necessity">
                <option value="gaming">Gaming</option>
                <option value="Streaming">Streaming</option>
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
                

                $where = " WHERE price <= " . $budget . " AND id_motherboard = 1";
                $query = "SELECT * FROM " . $type . $where;
                
                echo "El resultado de tu consulta es: <br>";
                foreach ($con->query($query) as $row){
                    print "<br>ID: " . $row['id_motherboard'];
                    print "<br>brand: " . $row['brand'];
                    print "<br>model: " .$row['model']; 
                    print "<br>scket: " .$row['socket'];
                    print "<br>price: " .$row['price'];
                    print "<br>score: " .$row['score'];
                    
                }
            
            
            }
        ?>

    </body>
</html>