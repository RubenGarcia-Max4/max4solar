<?php
require_once 'ControllerCotizador.php';
if ((isset($_GET["ciudad"]) && !empty($_GET["ciudad"])) && (isset($_GET["tarifa"]) && !empty($_GET["tarifa"])) && (isset($_GET["calculo"]) && !empty($_GET["calculo"])) && (isset($_GET["pago"]) && !empty($_GET["pago"]))) {
    $cotizador = new Cotizador();
    $name = $_GET['name'];
    $email = $_GET['email'];
    $ciudad = $_GET['ciudad'];    
    $tarifa = $_GET['tarifa'];
    $calculo = $cotizador->get_calulo($_GET['calculo']);
    $pago = $_GET['pago'];
    $telefono = $_GET['telefono'];
    $nuevTarifa = 180;
    $iva = 0.16;
    $meses = $calculo == "Mensual" ? 12 : 6;
    $monitor = 350;
    $verifiacion =  450;
    $tipoPanel =($cotizador->get_paneles('')*1000);
    $incrementoAnual = 5;

   
    $region =  $cotizador->get_region($ciudad);       
    $nameCiudad  =  $cotizador->get_Estado($ciudad);
    $datosTarifa = json_decode($cotizador->get_tarifa($tarifa));
    $consumo = $cotizador->pago_kwh($datosTarifa->tarifa,$iva,$pago);
    $energiaCalculo =  $cotizador->get_energiaSolarEstado($ciudad,$meses,$cotizador->get_paneles(''));
    $cantPanel =  $cotizador->cantidadPaneles($consumo,$ciudad,$meses,$cotizador->get_paneles(''));
    $potInstalada = $cotizador->potInstaladaKw($cotizador->get_paneles(''),$cantPanel);
    $precioPanel = $cotizador->precioUnitarioPaneles($cotizador->get_paneles(''));
    $ivaPanel = $precioPanel * $iva;
    $precioIvaPanel = $precioPanel+$ivaPanel;
    $todosPaneles = ($precioIvaPanel * $cantPanel);
    $precioWhatMxN = $cotizador->precioWhatMxN($precioPanel,$energiaCalculo,$meses);
    $precioWattUSD = $cotizador->get_precioWattUSD($precioPanel,$cotizador->get_dof(),$tipoPanel);
    $totalVerificacion = $verifiacion * $cantPanel;
    $medidor = 25000;

    $isMedidorVerifcacion = true;
    $subTotal = ($precioPanel*$cantPanel)+($monitor*$meses)+($verifiacion*$cantPanel)+$medidor;
    if ($tarifa != 3 &&  $tarifa != 4) {
        $isMedidorVerifcacion = false;
        $subTotal = ($precioPanel*$cantPanel)+($monitor*$meses);       
    }
    
    $ivaDesglose = $subTotal*0.16;
    $totalAPagar =$subTotal+$ivaDesglose;
    $anio1 =round($pago*$meses);
    $temp = ($consumo * $meses)*20;
    $co2 = ($temp / 1000)*0.582;
    $arbol = ($co2/20)/25.23;

    $valor=[];
    
    $retornoInversion =0;
    $bandera = false;
    for ($i=0; $i <19; $i++) { 
        if ($i == 0) {
           $anio =   $anio1;
           $valor[] =$anio;
        }
      
        $anio =$cotizador->AnualIncremento($incrementoAnual,$anio);
        $valor[] = $anio;      
    }
    $acumulado =[];
    $suma = 0;
    foreach ($valor as $key ) {
        $suma =  $key + $suma;
        $acumulado[] = $suma;
    }

    $an =1;
    foreach ($acumulado as $key2 ) {
       if($key2 > $totalAPagar){
           $retornoInversion = $an;
           break;
       }
       $an ++;        
    }

    $arrayName = array(
                'name' =>   $name,
                'email' =>   $email,
                'ciudad' =>   $ciudad,                
                'nameciudad' =>   $nameCiudad,                
                'tipoTarifa' =>   $datosTarifa->tipoTarifa,
                'tarifaandurl' => $datosTarifa->url,
                'tarifa' => $datosTarifa->tarifa,
                'tipoCalculo'=> $calculo,
                'anio' =>  date('Y'),
                'dap' => 0,
                'ivaTarifa' => round(($datosTarifa->tarifa *$iva),4),               
                'pago' =>     round( $pago,2),
                'telefono' =>   $telefono,
                'region'  =>  $region,               
                'consumoKW'=> round($consumo,1),
                'nuevaTarifa'=>  $nuevTarifa,
                'ahorro' =>   $pago- $nuevTarifa,
                'porcentajeAh'=>  round((($pago-$nuevTarifa)*100)/$pago,2),
                'incrementoAnual' =>  $cotizador->get_incrementoAnual(),
                'dof' => number_format($cotizador->get_dof(),2),
                'tipoPanel' => $tipoPanel,
                'energiaCalculo'=> round($energiaCalculo,4),
                'cantidadPanel'=> $cantPanel,
                'meses' => $meses,
                'potInstalada'=> $potInstalada,
                'precioUnitario'=> $precioPanel,
                'panelIva'=> ($ivaPanel),
                'panelTotal'=>$precioIvaPanel,
                'totalPanelTodos' => $todosPaneles,
                'precioWhatMxN' => $precioWhatMxN,
                'precioWhatUSD' => $precioWattUSD,
                'totalPanelesSinIva'=> ($precioPanel*$cantPanel),
                'monitor'=> $monitor,
                'verifiacion' => $verifiacion,
                'totalVerificacion' => $totalVerificacion,
                'medidor' => $medidor,
                'subTotal' => round($subTotal,2),
                'isMedidorVerifcacion' => $isMedidorVerifcacion,
                'ivaDesglose' => round($ivaDesglose,2),
                'TotalDesglose' => $totalAPagar,
                'retornoAnio'=> $valor,
                'anioRetorno'=>   $retornoInversion,
                'acumulado' => $acumulado,
                'co2' => $co2,
                'arbol' => round($arbol,2),
                'ahorroTotal' => round(($acumulado[19] - $totalAPagar),2)
               
                

     );


    $json = json_encode(["seller"=>$sellerId,"area"=>3,"category"=>12,"name"=>$name,"lastname1"=>"Desconocido","lastname2"=>"","enterprise"=>"energy","cellphone"=>$telefono,"email"=>$email,"platform" => "http://max4energiasolar.com.mx","admin" => 1,"grades" => '']);

    $curl = curl_init();
        curl_setopt_array($curl, array(
        //CURLOPT_URL => "http://localhost/crmmax4/crmmax4/public/api/createContactFromPlatform",
            CURLOPT_URL => "http://www.max4erp.net/api/createContactFromPlatform",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $json,
            CURLOPT_HTTPHEADER => array(
                "Cache-Control: no-cache",
                'Accept: application/json',
                'Content-Type: application/json',
            ),
        ));
 
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if($err){
         //   echo 'error';
        }else{
            // echo "Aqui la respuesta ".$response;
        }


   

     
    // $salida[] = $arrayName;
    echo json_encode($arrayName);
}else{
    $arrayName = array('stauts' => 'Error 001' );
    echo json_encode($arrayName);
}

?>