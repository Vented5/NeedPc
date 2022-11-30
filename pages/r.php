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

        <div id="main" class="bg-dark h-100 p-5 mx-custom text-white">

            <!--////////////  Formulario /////////////-->
            <form class="d-flex flex-column " method="post">
                
                <h2 class="text-center">Want to build something today?</h2>
                

                <!-- NECESSITY -->
                <h2>Select a necessity</h2>
                
                    <label for="videoGames">Video Games</label>
                    <input type="radio" name="necessity" value="videoGames">
                    <label for="streaming">Streaming</label>
                    <input type="radio" name="necessity" value="streaming">
                    <label for="dessign">Design</label>
                    <input type="radio" name="necessity" value="design">
                    <label for="office">Office</label>
                    <input type="radio" name="necessity" value="videoGames">
                
                <!-- BUDGET -->
                <h2>Select a budget</h2>
                
                <select name="budget">
                    <option value="1000">1000</option>
                    <option value="2000">2000</option>
                    <option value="5000">5000</option>
                    <option value="600">Other</option>
                </select>

                <input type="text" name="mm" id="tfBudget">

                <!--
                <SELect name="type">
                    <option value="cpu">CCPU</option>
                    <option value="motherboards">MOTHERBOARD</option>
                    <option value="ram">RAM</option>
                    <option value="sto">STO</option>
                    <option value="gpu">GPU</option>
                    <option value="psu">PSU</option>
                </SELect>
                -->
             
                <BUTton name="btn">Need</BUTton>                
            </form>
           
            <?php
                /////////////  BOTON ENVIAR    //////////////
                if(isset($_POST['btn'])){
                    
                    ////////////   Variables de consuta / ////////
                    $nSelect = $_POST['necessity'];
                    $budget = $_POST['budget'];

                    //valor promedio de una componente respecto al total/presupuestp
                    $rvCpu = $budget/4; 
                    $rvGpu = $budget/5;
                    $rvSto = $budget/6;
                    $rvMobo = $budget/6;
                    $rvPsu = $budget/10;
                    $rvRam = $budget/10; //La ram se suele vender en modulos de 2

                    $v1 = "Intel";
                    $v1_1 = "NVIDIA"; 
                    $v2 = "AMD";
                            

                    $necessity = new Necessity();
                    switch($nSelect){
                        case 'videoGames':
                            $necessity->setMins(3, 2048, 3, 8, 500, 350);
                            break;
                        case 'office':
                            $primaryTable = 'processors';
                            $necessity->setMins(1, 0, 1, 4, 250, 0);

                            break;
                        case 'design':
                            $primaryTable = 'hdd';
                            $necessity->setMins(1, 0, 1, 4, 250, 0);
                            break;
                        case 'streaming':
                            $primaryTable = 'graphic_cards';
                            $necessity->setMins(3, 2048, 3, 8, 500, 350);
                            break;
                        case 'proSoftware':
                            $necessity->setMins(5, 4096, 5, 16, 1000, 500);
                            break;
                    }
                    //valores de compatibilidad posibles
                    $cpuI = new Processor();
                    $cpuI->queryCpu($rvCpu, $necessity, $v1);

                    $gpuI = new Graphic_card();
                    $gpuI->queryGpu($rvGpu, $necessity, $v1_1);

                    $moboI = new Motherboard();
                    $moboI->queryMobo($rvMobo, $cpuI);

                    $psuI = new Power_supply_unit();
                    $psuI->queryPsu($rvPsu, $necessity);    
                    
                    //una ves seleccionado el procesador datermina el tier del equipo
                    if($cpuI->cpu_gen = 3){
                        $tier = 2;
                    }else if($cpuI->cpu_gen = 5){
                        $tier = 3;
                    }else if($cpuI->cpu_gen = 5 or $cpuI->cpu_gen = 9){
                        $tier = 4;
                    }else{
                        $tier = 1;
                    }
                
                    $ramQuantity = $tier;
                    $ramMemory = 16;
                    $ramMemory = 8;
                    $ramMemory = 4;
                    
                    $ramPrice = $rvRam;
                    
                    $ramI = new RAM();
                    $ramI->queryRam($ramPrice, $ramMemory);
                     
                    //Almacenamiento ideal
                    $stoType = "HDD";
                    $stoI = new Storage_units(); 
                    $stoI->querySto($rvSto, $stoType);
                                        
                    echo "El modelo del cou es: " . $cpuI->cpu_model . "<br>El modelo de la gpu es: " . $gpuI->model . "<br>La Motherboard sera: ". $moboI->model , "<br>La fuente sera: " . $psuI->model . "<br>La ram sera: ". $ramI->brand . $ramI->capacity . "GB<br>El almacenamiento sera: ".$stoI->brand." ".$stoI->model.$stoI->capacity;
                    
                    
                }
                
                
                class Necessity {
                    public $minCpu;
                    public $minGpu;
                    public $minMobo;
                    public $minRam;
                    public $minSto;
                    public $minPsu;
                
                    function setMins($cpu, $gpu, $mobo, $ram, $sto, $psu){
                        $this->minCpu = $cpu;
                        $this->minGpu = $gpu;
                        $this->minMobo = $mobo;
                        $this->minRam = $ram;
                        $this->minSto = $sto;
                        $this->minPsu = $psu;
                    }

                }

                class Processor {
                    public $cpu_id, $cpu_brand, $cpu_model, $cpu_socket, $cpu_cores, $cpu_threads, $cpu_frequency, 
                    $cpu_memoryType, $cpu_includesGpu, $cpu_gpuModel, $cpu_gpuShaders, $cpu_gpuFrequency, $cpu_price, 
                    $cpu_score, $cpu_consumption, $cpu_gen;

                    function setValues($id, $b, $m, $s, $c, $t, $f, $mt, $iG, $gM, $gS, $gF, $p, $sc, $cons, $g){
                        $this->cpu_id=$id; $this->cpu_brand=$b; $this->cpu_model=$m; $this->cpu_socket=$s; $this->cpu_cores=$c;
                        $this->cpu_threads=$t; $this->cpu_frequency=$f; $this->cpu_memoryType=$mt; $this->cpu_includesGpu=$iG;
                        $this->cpu_gpuModel=$gM; $this->cpu_gpuShaders=$gS; $this->cpu_gpuFrequency=$gF; $this->cpu_price=$p;
                        $this->cpu_score=$sc; $this->cpu_consumption=$cons; $this->cpu_gen=$g; 
                    }
                    function queryCpu($price, $need, $var){
                        require("../php/conexion.php");
                        //procesador ideal
                        $query = 'SELECT * FROM processors WHERE price <= ' . $price . ' AND gen >= ' . $need->minCpu . ' AND brand = "'. $var . '" ORDER BY score DESC LIMIT 1';
                        
                        foreach ($con->query($query) as $row){
                            $this->setValues($row['id_cpu'], $row['brand'], $row['model'], $row['socket'], $row['cpu_cores'], $row['threads'], $row['frequency'], $row['Memory Type'], $row['GPU included'], $row['GPU model'], $row['GPU shaders'], $row['GPU frequency'], $row['price'], $row['score'], $row['Consumption'], $row['gen']); 
                        }
                    }
                }

                class Motherboard {
                    public $id, $brand; public $model; public $size; public $socket; public $bus; public $ram_slots; public $tech;
                    public $frequency; public $price; public $score;

                    function setValues($id, $br, $m, $si, $so, $bu, $rs, $t, $f, $p, $sc){
                        $this->id=$id; $this->brand=$br; $this->model=$m; $this->size=$si; $this->socket=$so;
                        $this->bus=$bu; $this->ram_slots=$rs; $this->tech=$t; $this->frequency=$f; $this->price=$p; $this->score=$sc;
                    }
                    function queryMobo($price, $cpu){
                        require("../php/conexion.php");
                        //Motherbord ideal
                        $query = 'SELECT * FROM motherboards WHERE price <= ' . $price . ' AND socket = "' . $cpu->cpu_socket .'" ORDER BY score DESC LIMIT 1';
                        
                        foreach ($con->query($query) as $row){
                            $this->setValues($row['id_motherboard'], $row['brand'], $row['model'], $row['size'], $row['socket'], $row['bus'], $row['ram_slots'], $row['technology'], $row['ram_frequency'],  $row['price'], $row['score']);
                        } 
                    }
                }
 
                class Graphic_card {
                    public $id, $brand, $model, $chip, $bus, $memory, $tech, $gClock, $mClock, $shaders, $cons, $price, $score, $comp; 
                    function setValues($id, $br, $mo, $ch, $bu, $mm, $t, $gc, $mc, $sh, $cons, $p, $sc, $comp){
                        $this->id=$id; $this->brand=$br; $this->model=$mo; $this->chip=$ch; $this->bus=$bu; $this->memory=$mm; $this->tech=$t;
                        $this->gClock=$gc; $this->mClock=$mc; $this->shaders=$sh; $this->cons=$cons; $this->price=$p; $this->score=$sc; $this->comp=$comp;
                    }
                    function queryGpu($price, $need, $var){
                        require("../php/conexion.php");
                        //gpu ideal
                        $query = 'SELECT * FROM graphic_cards WHERE price <= ' . $price . ' AND memory >= ' . $need->minGpu . ' AND Compatibility = "'. $var .'" ORDER BY score DESC LIMIT 1';
                               
                        foreach ($con->query($query) as $row){
                            $this->setValues($row['id_gpu'], $row['brand'], $row['model'], $row['gpu_chip'], $row['bus'], $row['memory'], $row['memory_tech'], $row['gpu_clock'], $row['memory_clock'], $row['shaders'], $row['consumtion'], $row['price'], $row['score'], $row['Compatibility']);
                        }
                    }
                }

                class Power_supply_unit {
                    public $id, $brand, $model, $sata, $power, $size, $cert, $temp, $type, $price, $score;
                    function setValues($id, $b, $m, $sa, $po, $pr, $si, $crtf, $tmp, $ty, $sc){
                        $this->id=$id; $this->brand=$b; $this->model=$m; $this->sata=$sa; $this->power=$po; $this->size=$si;
                        $this->price=$pr; $this->cert=$crtf; $this->temp=$tmp; $this->type=$ty; $this->score=$sc;
                    }
                    function queryPsu($price, $need){
                        require("../php/conexion.php");
                        //Power ideal
                        $query = 'SELECT * FROM power_supplies WHERE price <= ' . $price . ' AND power >= ' . $need->minPsu .' ORDER BY score DESC LIMIT 1';
                                
                        foreach ($con->query($query) as $row){
                            $this->setValues($row['id_powersupply'], $row['brand'], $row['model'], $row['sata_connection'], $row['power'], $row['price'], $row['size'], $row['certification'], $row['temperature'], $row['type'], $row['score']);
                        }           
                    }
                }

                class RAM {
                    public $id, $brand, $model, $capacity, $tech, $frequency, $price, $score;
                    function setValues($id, $b, $m, $c, $t, $f, $p, $s){
                        $this->id=$id; $this->brand=$b; $this->model=$m; $this->capacity=$c; $this->tech=$t; $this->frequency=$f; $this->price=$p; $this->score=$s;
                    }
                    function queryRam($price, $memory){
                        require("../php/conexion.php");
                        //Ram ideal
                        $query = 'SELECT * FROM ram WHERE price <= ' . $price . ' AND capacity = ' . $memory .' ORDER BY score DESC LIMIT 1';
                        
                        foreach ($con->query($query) as $row){
                            $this->setValues($row['id_ram'], $row['brand'], $row['model'], $row['capacity'], $row['tech'], $row['frequency'], $row['price'], $row['score']);
                        } 
                    }
                }

                class Storage_units {
                    public $id, $type, $brand, $model, $capacity, $rSpeed, $wSpeed, $price, $score;
                    function setValues($id, $t, $b, $m, $c, $rs, $ws, $p, $s){
                        $this->id=$id; $this->type=$t; $this->model=$m; $this->brand=$b; $this->capacity=$c; $this->rSpeed=$rs; $this->wSpeed=$ws; $this->price=$p; $this->score=$s;
                    }
                    function querySto($price, $type){
                        require("../php/conexion.php");
                        //selecciona un sto que cumpla con el precio, tipo y sea el mejor valorado
                        $query = 'SELECT * FROM storage_disks WHERE price <= '.$price.' AND type = "'.$type.'" ORDER BY score LIMIT 1'; 
                                
                        foreach ($con->query($query) as $row){
                            $this->setValues($row['id_storage'], $row['type'], $row['brand'], $row['model'], $row['capacity'], $row['r_speed'], $row['w_speed'], $row['price'], $row['score']);
                        }
                    }
                }
                
                
                
            ?>
        </div>
    </body>
</html>