<?php
$cotizacion = json_decode($_POST['logs']);

$apikey = '21ae9bcf-c3c7-4f5f-b9ce-cf82a7003072';
//$apikey = 'fadca1ea-cf64-4c8b-b547-1f6292c98994';
$value  = '

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <title>Cotizacion</title>
    <link rel="stylesheet" href="http://localhost/PAGINAS/max4ene/css/spinner.css">
    
</head>
<body>



<div class="container" style="font-size: 1em; font-weight: 400;">
   
    <div class="row" style="font-size: 1em;">
        <div class="col-6"  style="position: relative;   padding-right: 15px; padding-left: 15px;  width: 45%;  display: inline-block; vertical-align: top;">
            <div class="row" >
                <div class="col-3" style="display: inline-block; flex: 0 0 25%; max-width: 25%;" ><strong>Nombre:</strong></div>
                <div class="col-9" style=" display: inline-block; flex: 0 0 70%; max-width: 70%;"  >'.$cotizacion[0]->name.'</div>
            </div>

            <div class="row">
                <div class="col-3" style=" display: inline-block; flex: 0 0 25%; max-width: 25%;"><strong>Ciudad:</strong> </div>
                <div class="col-9" style=" display: inline-block; flex: 0 0 70%; max-width: 70%;" >'.$cotizacion[0]->nameciudad.'</div>
            </div>

            <div class="row">
                <div class="col-3" style=" display: inline-block; flex: 0 0 25%; max-width: 25%;" ><strong>Tel:</strong></div>
                <div class="col-9" style=" display: inline-block; flex: 0 0 70%; max-width: 70%;" >'.$cotizacion[0]->telefono.'</div>
            </div>

            <div class="row">
                <div class="col-3" style=" display: inline-block;flex: 0 0 25%; max-width: 25%;" ><strong>Email:</strong></div>
                <div class="col-9" style=" display: inline-block;flex: 0 0 70%; max-width: 70%;">'.$cotizacion[0]->email.'</div>
            </div>              
        </div> 
        <div class="col-6"  style="position: relative; padding-right: 15px; padding-left: 15px;  width: 45%;  display: inline-block; vertical-align: top;">
            <div class="row" >
                <div class="col-4" style=" display: inline-block; flex: 0 0 33.333333%;max-width: 33.333333%;" ><strong>Tipo de tarifa:</strong></div>
                <div class="col-8" style=" display: inline-block; background:orange;flex: 0 0 65%; max-width: 65%;" >'.$cotizacion[0]->tipoTarifa.'</div>
            </div>
            <div class="row" >
                <div class="col-4" style=" display: inline-block; flex: 0 0 33.333333%;max-width: 33.333333%;" ><strong>Consumo kWh:</strong></div>
                <div class="col-8" style=" display: inline-block; flex: 0 0 65%; max-width: 65%;" >'.$cotizacion[0]->consumoKW.'</div>                       
            </div>
            <div class="row" >
                <div class="col-4" style=" display: inline-block; flex: 0 0 33.333333%;max-width: 33.333333%;" ><strong>Incremento Anual:</strong></div>
                <div class="col-8" style=" display: inline-block; flex: 0 0 65%; max-width: 65%;"  >'.$cotizacion[0]->incrementoAnual.'</div>                       
            </div>
            
            <div class="row" >
                <div class="col-4" style=" display: inline-block; flex: 0 0 33.333333%;max-width: 33.333333%;" ><strong>DOF:</strong></div>
                <div class="col-8" style=" display: inline-block; flex: 0 0 65%; max-width: 65%;">$'.$cotizacion[0]->dof.'</div>                       
            </div>
            <div class="row" >
                <div class="col-4" style=" display: inline-block; flex: 0 0 33.333333%;max-width: 33.333333%;" ><strong>Tarifa '.$cotizacion[0]->tipoTarifa.':</strong></div>
                <div class="col-8" style=" display: inline-block; flex: 0 0 65%; max-width: 65%;">'.$cotizacion[0]->tarifa.'</div>       
            </div>                    
        </div>   
    </div>

    <br />
    <h3 style="text-align: center;">Calculo Tarifa</h3>  
    <table class="table table-dark"  style="font-size:1em;>
         <thead  class="titulo-tabla">
             <tr>
             <th scope="col">Tarifa '.$cotizacion[0]->tipoTarifa.'</th>
             <th scope="col">Consumo kWh</th>
             <th scope="col">Precio kWh '.$cotizacion[0]->anio.'</th>
             <th scope="col">DAP</th>
             <th scope="col">IVA</th>
             <th scope="col">TOTAL</th>
             <th scope="col"></th>
             </tr>
         </thead>
         <tbody>
             <tr>
                 <th scope="row" style="background:#F90">'.$cotizacion[0]->tipoTarifa.'</th>
                 <td>'.$cotizacion[0]->consumoKW.'</td>
                 <td>$'.$cotizacion[0]->tarifa.'</td>
                 <td>'.$cotizacion[0]->dap.'</td>
                 <td>$'.$cotizacion[0]->ivaTarifa.'</td>
                 <td> $'.  number_format($cotizacion[0]->pago,2) .'</td>
             </tr>
             <tr>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td>NUEVA TARIFA '.$cotizacion[0]->tipoTarifa.'</td>
                 <td style="background:#333; color=white;"> $'.  number_format($cotizacion[0]->nuevaTarifa ,2) .' </td>
                 <td></td>                       
             </tr>
             <tr>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td style="background:#F30;color=white;">AHORRO '.$cotizacion[0]->tipoCalculo.'</td>
                 <td style="background:#F30;color=white;"> $'.  number_format($cotizacion[0]->ahorro,2) .' </td>
                 <td style="background:#F30;color=white;">'.$cotizacion[0]->porcentajeAh.'% </td>
             </tr>
            
         </tbody>
  </table>

  <br />

  <h3 style="text-align: center;">Calculo de Paneles Solares</h3>  
  <table class="table table-dark"  style="font-size:1em;>
      <thead class="titulo-tabla">
          <tr>
              <th scope="col">TIPO DE PANEL SOLAR</th>
              <th scope="col">ENERGIA '.$cotizacion[0]->tipoCalculo.'</th>
              <th scope="col">CANTIDAD PANELES</th>
              <th scope="col">POT INSTALADA kW</th>                    
          </tr>
      </thead>
      <tbody>
          <tr>
              <th scope="row" style="background:#F90">'.$cotizacion[0]->tipoPanel.'</th>
              <td>'.$cotizacion[0]->energiaCalculo.'</td>
              <td style="background: #F36;color=white;">'.$cotizacion[0]->cantidadPanel.'</td>
              <td>'.$cotizacion[0]->potInstalada.'</td>
          </tr>
         
       
      </tbody>
  </table>



  <h3 style="text-align: center;">Inversion</h3>
  <table class="table table-dark"  style="font-size:1em;>
      <thead class="titulo-tabla">
          <tr>             
              <th scope="col">TOTAL DE $'.$cotizacion[0]->cantidadPanel.' PANELES</th>
              <th scope="col">NUEVO PRECIO WATT MXN S/IVA</th>
              <th scope="col">PRECIO POR WATT Solar S/IVA USD</th>
              <th scope="col">PRECIO CAMBIO (DOF)</th>
          </tr>
      </thead>
      <tbody>
          <tr>             
              <td> $'.number_format($cotizacion[0]->TotalDesglose,2).'</td>
              <td> $'.number_format( $cotizacion[0]->precioWhatMxN,2) .'</td>
              <td> $'.number_format( $cotizacion[0]->precioWhatUSD,2) .'</td>
              <td> $'. number_format($cotizacion[0]->dof,2) .'</td>
          </tr>   
      </tbody>                
  </table>

  <table class="table table-dark" style="font-size:1em; >
      <thead class="titulo-tabla">
          <tr>
           
              <th scope="col" style="background:#F90">DESGLOSE</th>
              <th scope="col" style="background:#F90">PRECIO UNITARIO</th>
              <th scope="col" >CANTIDAD</th>
              <th scope="col" >TOTAL</th>                     
          </tr>
      </thead>
      <tbody >
          <tr>                       
              <td >PANELES</td>
              <td > $'.number_format( $cotizacion[0]->precioUnitario,2) .'</td>
              <td >'.$cotizacion[0]->cantidadPanel.'</td>
              <td > $'.number_format( $cotizacion[0]->totalPanelesSinIva,2) .'</td>
          </tr>                            
          <tr>                       
              <td >Monitoreo</td>
              <td > $'.number_format( $cotizacion[0]->monitor,2) .'</td>
              <td >'.$cotizacion[0]->meses.'</td>
              <td > $'. number_format($cotizacion[0]->monitor*12,2) .'</td>
          </tr>  
         ';
         
         if($cotizacion[0]->isMedidorVerifcacion){
            $value .= '
                <tr>                       
                    <td >Verificación e Inspección</td>
                    <td > $'. number_format($cotizacion[0]->verifiacion,2) .'</td>
                    <td >'. $cotizacion[0]->cantidadPanel.'</td>
                    <td > $'.number_format($cotizacion[0]->totalVerificacion,2) .'</td>
                </tr>                            
                <tr>                       
                    <td>Medidor</td>
                    <td> '.number_format($cotizacion[0]->medidor,2) .'</td>
                    <td>1</td>
                    <td> $'.number_format($cotizacion[0]->medidor,2) .'</td>
                </tr>  
                ';  
         }
         
        

        $value .='<tr>                       
              <td ></td>
              <td ></td>
              <td >Subtotal</td>
              <td > $'.number_format($cotizacion[0]->subTotal,2) .'</td>
          </tr>                            
          <tr>                       
              <td ></td>
              <td ></td>
              <td >iva</td>
              <td > $'. number_format($cotizacion[0]->ivaDesglose,2) .'</td>
          </tr>  
          <tr>                       
              <td ></td>
              <td ></td>
              <td >Total</td>
              <td > $'. number_format($cotizacion[0]->TotalDesglose,2) .'</td>
          </tr>                            
      </tbody>
  </table>

    <br />
    <br />
    <br />
    <h3 style="text-align: center;">Calculo de Ahorro Anual <br> Retorno de inversión a '.$cotizacion[0]->anioRetorno.' años </h3>  

           
    <div class="row" style="font-size: 1em; font-weight: 400;" >
        <div class="col-6"  style="position: relative;   padding-right: 15px; padding-left: 15px;  width: 45%;  display: inline-block; vertical-align: top;">
            <div  class="row">
                <div class="col-3 bg-warning" style="flex: 0 0 25%; max-width: 25%;  display:inline-block"">PERIODO</div>
                <div class="col-4 bg-warning" style="flex: 0 0 33.333333%;max-width: 33.333333%; display:inline-block;">PAGO ANUAL</div>
                <div class="col-5 bg-warning" style="display:inline-block; -webkit-box-flex: 0; -ms-flex: 0 0 40%;  flex: 0 0 40%; max-width: 40%; background: #F36;   color: white;">AHORRO ACUMULADO </div>
            </div>
            <ul class="list-group">

';



        $i = 0;
        foreach ($cotizacion[0]->acumulado as $key) {

            if($i<10){
                $anios = $i +1;
                $clasR ='style="display:inline-block; -webkit-box-flex: 0; -ms-flex: 0 0 40%;  flex: 0 0 40%;  max-width: 40%;"';
                if ($anios <=  $cotizacion[0]->anioRetorno ) {
                    $clasR ='style="display:inline-block; -webkit-box-flex: 0; -ms-flex: 0 0 40%;  flex: 0 0 40%; max-width: 40%; background: #F36;   color: white;"';
                }

                $value .=' 
                    <li class="list-group-item"  class="tablanormal">
                        <div  class="row">				
                            <div class="col-3 bg-success" style="flex: 0 0 25%; max-width: 25%; display:inline-block;">Año '.$anios.' </div>
                            <div class="col-4" style="flex: 0 0 33.333333%;max-width: 33.333333%; display:inline-block;"> $'.number_format( round( $cotizacion[0]->retornoAnio[$i],2) ,2).' </div>
                            <div class="col-5"  '.$clasR.'> $'. number_format( round($key,2), 2).' </div>
                        </div>
                       
                    
                    </li>
                ';
                
            }
            

            $i ++;
        }
                     
                    


$value .='    
        </ul>
    </div> 
    
    <div class="col-6"  style="position: relative;   padding-right: 15px; padding-left: 15px;  width: 45%;  display: inline-block; vertical-align: top;">
        <div  class="row">
            <div class="col-3 bg-warning" style="flex: 0 0 25%; max-width: 25%; display:inline-block;">PERIODO</div>
            <div class="col-4 bg-warning" style="flex: 0 0 33.333333%;max-width: 33.333333%; display:inline-block;">PAGO ANUAL</div>
             <div class="col-5 bg-warning" style="display:inline-block; -webkit-box-flex: 0; -ms-flex: 0 0 40%;  flex: 0 0 40%; max-width: 40%; background: #F36;   color: white;">AHORRO ACUMULADO </div>
        </div>
        <ul class="list-group">

';
       

    $a = 0;
    foreach ($cotizacion[0]->acumulado as $key) {

        if($a>9){
            $clasR ='style="display:inline-block; -webkit-box-flex: 0; -ms-flex: 0 0 40%;  flex: 0 0 40%;  max-width: 40%;"';
            if ($a <=  $cotizacion[0]->anioRetorno ) {
                $clasR ='style="display:inline-block; -webkit-box-flex: 0; -ms-flex: 0 0 40%;  flex: 0 0 40%; max-width: 40%; background: #F36;   color: white;"';
            }
            $value .=' 
                <li class="list-group-item"  class="tablanormal">
                    <div  class="row">
                        <div class="col-3 bg-success" style="flex: 0 0 25%; max-width: 25%; display:inline-block">Año '.$a.' </div>
                        <div class="col-4" style="flex: 0 0 33.333333%;max-width: 33.333333%; display:inline-block"> $'.number_format( round( $cotizacion[0]->retornoAnio[$a],2) ,2).' </div>
                        <div class="col-5" '.$clasR.'> $'. number_format( round($key,2), 2).' </div>
                    </div>
                
                
                </li>
            ';
            
        }
        

        $a ++;
    }
        


$value .='    
        </ul>
    </div>   
    
    




    <h3>Toneladas de CO2 Ahorrado</h3>  
       	
    <table class="table table-dark" style="font-size:1em">
        <thead class="titulo-tabla">
            <tr>
              
                <th scope="col">CO2 Ahorrado</th>
                <th scope="col">Equivalencia Hectareas de pino plantadas</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">'.$cotizacion[0]->co2.'</th>
                <td style="background: #F36;color=white;">'.$cotizacion[0]->arbol.' 
                    <a href="http://www.fao.org/docrep/ARTICLE/WFC/XII/0043-B2.HTM" target="_blank" >
                    <i class="fas fa-tree" style="font-size:24px; color:green; vertical-align: bottom;"></i>                            
                    </a>
                </td>                       
            </tr>
        </tbody>                   
    </table>

    <h3>Resumén</h3>  
    <table class="table table-dark" style="font-size:1em; float:right">              
        <tbody>
            <tr>                       
                <td  class="bg-warning">Pago Acumulado a CFE sin Panel</td>
                <td >$'. number_format( round($cotizacion[0]->acumulado[19],2) ,2) .'  </td>
               
            </tr>                            
            <tr>                       
                <td  class="bg-warning" >Inversión</td>
                <td >$'. number_format( round($cotizacion[0]->TotalDesglose,2) ,2) .'</td>
               
            <tr>                       
                <td  class="bg-warning">Ahorro Total Acumulado</td>
                <td >$'. number_format( round($cotizacion[0]->ahorroTotal,2) ,2) .'</td>
               
            </tr>                            
                                    
        </tbody>
    </table>

    <h3>Datos de Pago</h3>

    <div class="row" style="font-size: 1em; font-weight: 400;">
        <div class="col-6"  style="position: relative;   padding-right: 15px; padding-left: 15px;  width: 45%;  display: inline-block; vertical-align: top;">
            

            <div class="OpcionCubo" >
                <div class="row">
                    <div class="col-12"> <img src="https://ahorrodeenergia.mx/C_IMG/ban_bajio.png"  border="0"></div>
                </div>

                <div class="row">
                    <div class="col-12"> <img src="https://ahorrodeenergia.mx/C_IMG/img_ban_bajio.png"  border="0"></div>
                </div>

                <div class="row">
                    <div class="col-12"> 	Depósito bancario:</div>
                </div>

                <div class="row">
                    <div class="col-12">
                    <strong>Tecnología y Soluciones Aplicadas S.A. de C.V.</strong><br>
                    </div>                  
                </div>
                <div class="row">
                    <div class="col-12">
                        <strong>Banco del Bajío</strong><br>
                    </div>                  
                </div>
                <div class="row">
                    <div class="col-6"  style="position: relative;   padding-right: 15px; padding-left: 15px;  width: 45%;  display: inline-block; vertical-align: top;"><strong>Num de Cuenta:</strong></div>                  
                    <div class="col-6"  style="position: relative;   padding-right: 15px; padding-left: 15px;  width: 45%;  display: inline-block; vertical-align: top;"> 1402783-01</div>                  
                </div>

                <div class="row">
                    <div class="col-6" style="position: relative;   padding-right: 15px; padding-left: 15px;  width: 45%;  display: inline-block; vertical-align: top;"><strong>CLABE:</strong></div>                  
                    <div class="col-6" style="position: relative;   padding-right: 15px; padding-left: 15px;  width: 45%;  display: inline-block; vertical-align: top;">030010140278301011</div>                  
                </div>

                <div class="row">
                    <div class="col-6" style="position: relative;   padding-right: 15px; padding-left: 15px;  width: 45%;  display: inline-block; vertical-align: top;"><strong>RFC:</strong></div>                  
                    <div class="col-6" style="position: relative;   padding-right: 15px; padding-left: 15px;  width: 45%;  display: inline-block; vertical-align: top;">TSA050111H76</div>                  
                </div>

                <div class="row">
                    <div class="col-6" style="position: relative;   padding-right: 15px; padding-left: 15px;  width: 45%;  display: inline-block; vertical-align: top;"><strong>TITULAR:</strong></div>                  
                    <div class="col-6" style="position: relative;   padding-right: 15px; padding-left: 15px;  width: 45%;  display: inline-block; vertical-align: top;">TECNOLOGIA Y SOLUCIONES APLICADAS S.A DE C.V</div>                  
                </div>

                <div class="row">
                    <div class="col-6" style="position: relative;   padding-right: 15px; padding-left: 15px;  width: 45%;  display: inline-block; vertical-align: top;"><strong>DESTINO:</strong></div>                  
                    <div class="col-6" style="position: relative;   padding-right: 15px; padding-left: 15px;  width: 45%;  display: inline-block; vertical-align: top;">Aguascalientes, Ags</div>                  
                </div>
                    
                <div class="row">
                    <div class="col-6" style="position: relative;   padding-right: 15px; padding-left: 15px;  width: 45%;  display: inline-block; vertical-align: top;"><strong>Correo:</strong></div>                  
                    <div class="col-6" style="position: relative;   padding-right: 15px; padding-left: 15px;  width: 45%;  display: inline-block; vertical-align: top;">perla_mm@max4systems.com</div>                  
                </div>
                <div class="row">
                    <div class="col-6" style="position: relative;   padding-right: 15px; padding-left: 15px;  width: 45%;  display: inline-block; vertical-align: top;"><strong>Teléfono:</strong></div>                  
                    <div class="col-6" style="position: relative;   padding-right: 15px; padding-left: 15px;  width: 45%;  display: inline-block; vertical-align: top;">449-9157710</div>                  
                </div>                
            </div>
        
            
        </div>
        <div class="col-6" style="position: relative;   padding-right: 15px; padding-left: 15px;  width: 45%;  display: inline-block; vertical-align: top;">
        
            


            <div class="OpcionCubo" >
                <div class="row">
                    <div class="col-12"> <img src="https://ahorrodeenergia.mx/C_IMG/ban_bajio.png"  border="0"></div>
                </div>

                <div class="row">
                    <div class="col-12"> <img src="https://ahorrodeenergia.mx/C_IMG/banorte.png"  border="0"></div>
                </div>

                <div class="row">
                    <div class="col-12"> 	Depósito bancario:</div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                    <strong>Tecnología y Soluciones Aplicadas S.A. de C.V.</strong><br>
                    </div>                  
                </div>
                <div class="row">
                    <div class="col-12">
                        <strong>Banorte</strong><br>
                    </div>                  
                </div>
                <div class="row">
                    <div class="col-6"  style="position: relative;   padding-right: 15px; padding-left: 15px;  width: 45%;  display: inline-block; vertical-align: top;"><strong>Num de Cuenta:</strong></div>                  
                    <div class="col-6" style="position: relative;   padding-right: 15px; padding-left: 15px;  width: 45%;  display: inline-block; vertical-align: top;"> 0411532820</div>                  
                </div>

                <div class="row">
                    <div class="col-6" style="position: relative;   padding-right: 15px; padding-left: 15px;  width: 45%;  display: inline-block; vertical-align: top;"><strong>CLABE:</strong></div>                  
                    <div class="col-6" style="position: relative;   padding-right: 15px; padding-left: 15px;  width: 45%;  display: inline-block; vertical-align: top;">072010004115328206</div>                  
                </div>

                <div class="row">
                    <div class="col-6" style="position: relative;   padding-right: 15px; padding-left: 15px;  width: 45%;  display: inline-block; vertical-align: top;"><strong>RFC:</strong></div>                  
                    <div class="col-6" style="position: relative;   padding-right: 15px; padding-left: 15px;  width: 45%;  display: inline-block; vertical-align: top;">TSA050111H76</div>                  
                </div>

                <div class="row">
                    <div class="col-6" style="position: relative;   padding-right: 15px; padding-left: 15px;  width: 45%;  display: inline-block; vertical-align: top;"><strong>TITULAR:</strong></div>                  
                    <div class="col-6" style="position: relative;   padding-right: 15px; padding-left: 15px;  width: 45%;  display: inline-block; vertical-align: top;">TECNOLOGIA Y SOLUCIONES APLICADAS S.A DE C.V</div>                  
                </div>

                <div class="row">
                    <div class="col-6" style="position: relative;   padding-right: 15px; padding-left: 15px;  width: 45%;  display: inline-block; vertical-align: top;"><strong>DESTINO:</strong></div>                  
                    <div class="col-6" style="position: relative;   padding-right: 15px; padding-left: 15px;  width: 45%;  display: inline-block; vertical-align: top;">Aguascalientes, Ags</div>                  
                </div>
                    
                <div class="row">
                    <div class="col-6" style="position: relative;   padding-right: 15px; padding-left: 15px;  width: 45%;  display: inline-block; vertical-align: top;"><strong>Correo:</strong></div>                  
                    <div class="col-6" style="position: relative;   padding-right: 15px; padding-left: 15px;  width: 45%;  display: inline-block; vertical-align: top;">perla_mm@max4systems.com</div>                  
                </div>
                <div class="row">
                    <div class="col-6" style="position: relative;   padding-right: 15px; padding-left: 15px;  width: 45%;  display: inline-block; vertical-align: top;"><strong>Teléfono:</strong></div>                  
                    <div class="col-6" style="position: relative;   padding-right: 15px; padding-left: 15px;  width: 45%;  display: inline-block; vertical-align: top;">449-9157710</div>                  
                </div>                
            </div>       

            
        </div>

    </div>

    
';






$value .='
</div>


   

<div>
    <img src="http://ahorrodeenergia.mx/images/informacion.png" width="100%">

    <img src="http://ahorrodeenergia.mx/images/certificado1.png" width="100%">
    <img src="http://ahorrodeenergia.mx/images/certificado2.png" width="95%">
    <img src="http://ahorrodeenergia.mx/images/certificado3.png" width="98%">
</div>


</body>
</html>
  


';



$fecha = date('Y/m/d H:i:s');
$nFecha =str_replace("/","_", $fecha);
$nFecha = explode(" ", $nFecha);
$n = sanear_string($cotizacion[0]->name);
$nombre_archivo = str_replace(" ","_",$n );
$NAMEpdf= $nombre_archivo."_".$cotizacion[0]->cantidadPanel."P_".$nFecha[0].".pdf";
$nuevoNombre = urlencode($NAMEpdf);


$postdata = http_build_query(
    array(
        'apikey' => $apikey,
        'value' => $value,
        'MarginBottom' => '10',
        'MarginTop' => '10',
	 'MarginLeft' => '5',
	 'MarginRight' => '5'
    )
);


$opts = array('http' =>
    array(
        'method'  => 'POST',
        'header'  => 'Content-type: application/x-www-form-urlencoded', 
        'content' => $postdata
    )
);

$context  = stream_context_create($opts);
 
// Convert the HTML string to a PDF using those parameters
$result = file_get_contents('http://api.html2pdfrocket.com/pdf', true, $context);
file_put_contents('../PDF/'.$nuevoNombre, $result);



$url_to_shorten="http://max4energiasolar.com.mx/PDF/".$nuevoNombre;

	
$json = json_encode(["nickname"=>"tracker","token"=>"eQ532A1hWC","pass"=>"tracker","url"=>$url_to_shorten]);
$curl = curl_init();
    curl_setopt_array($curl, array(
       
   	CURLOPT_URL => "https://www.mx4.mx/api/getUrl",
   	CURLOPT_RETURNTRANSFER => true,
 	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
       CURLOPT_TIMEOUT => 30,
   	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
       CURLOPT_CUSTOMREQUEST => "POST",
 	CURLOPT_POSTFIELDS => $json,
       CURLOPT_HTTPHEADER => array(
         "Cache-Control: no-cache",
         "accept: */*",
         "accept-language: en-US,en;q=0.8",
          "content-type: application/json",
            ),
       ));
 
       $response = curl_exec($curl);
       $err = curl_error($curl);
       curl_close($curl);
	if($err){
             // echo ' aqui hubo error: '.$err;
       }else{
           $json=json_decode($response,true);
           $url = $json['data'];
		
       }
		

		
	echo "http://".$url;


	$nombre_archivo = "log/logs.txt";
	$datetimeFormat = 'Y-m-d H:i:s';
	$date = new \DateTime();
    	// If you must have use time zones
    	// $date = new \DateTime('now', new \DateTimeZone('Europe/Helsinki'));
    	$date->setTimestamp($timestamp);		
	if(file_exists($nombre_archivo)){
	    $mensaje = "\r\n El Archivo $nombre_archivo se ha modificado      ".$url_to_shorten."  \r\n";
	}else{
	    $mensaje = "\r\n :     ".$url_to_shorten." \r\n";
	}

	if($archivo = fopen($nombre_archivo, "a")){
	   if(fwrite($archivo, $date->format($datetimeFormat). "  ".$url_to_shorten.  "\r\n")){}
	   fclose($archivo);	
	}else{
	    if(fwrite($archivo, $date->format($datetimeFormat). "  ".$url_to_shorten.  "\r\n")){}
	    fclose($archivo);
	}
	


	function sanear_string($string){ 
    		$string = trim($string);
 
    		$string = str_replace(
        		array('�', '�', '�', '�', '�', '�', '�', '�', '�'),
        		array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
       		$string
    		);
 
    		$string = str_replace(
        		array('�', '�', '�', '�', '�', '�', '�', '�'),
        		array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
        		$string
    		);
 
    		$string = str_replace(
        		array('�', '�', '�', '�', '�', '�', '�', '�'),
        		array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
       		$string
    		);
 
    		$string = str_replace(
        		array('�', '�', '�', '�', '�', '�', '�', '�'),
        		array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
        		$string
    		);
 
    		$string = str_replace(
        		array('�', '�', '�', '�', '�', '�', '�', '�'),
        		array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
        		$string
    		);
 
    		$string = str_replace(
        		array('�', '�', '�', '�'),
        		array('n', 'N', 'c', 'C',),
        		$string
    		);

 
   		return $string;
	}






?>