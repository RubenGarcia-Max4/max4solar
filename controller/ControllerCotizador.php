<?php
class Cotizador 
{
    private $incrementoAnual;
    function __construct(){  
        $this->incrementoAnual = 5;
    } 

    public function get_dof(){
        $app_id = 'a6dca556344b4660b32aa036276c019a';
        $oxr_url = "https://openexchangerates.org/api/latest.json?app_id=" . $app_id;

        // Open CURL session:
        $ch = curl_init($oxr_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // Get the data:
        $json = curl_exec($ch);
        curl_close($ch);

        // Decode JSON response:
        $oxr_latest = json_decode($json);

        // You can now access the rates inside the parsed object, like so:
        $result = $oxr_latest->rates->MXN;
        // -> eg. "1 USD equals: 0.656741 GBP at 11:11, 11th December 2015"			
        return 	$result;

    }

    public function get_incrementoAnual(){
        return $this->incrementoAnual;
    }

    public function get_calulo($calculo){
        if($calculo == 1){
            return "Bimsetral";
        }else{
            return "Mensual";
        }
    }    

    public function pago_kwh($tarifa,$iva,$pago){//lo que pagas lo convertimos a consumo
        $ivaTarifa = $tarifa * $iva;
        $consumo = $pago /($tarifa + $ivaTarifa);

        return  $consumo;
    }		

    public function get_Estado($ciudad){

        switch ($ciudad) {         
            case '13': return 'AGUASCALIENTES';
            break;
            case '1': return 'B.C NORTE';
            break;
            case '2': return 'B.C SUR';
            break;
            case '31': return 'CAMPECHE';
            break;
            case '9': return 'COAHUILA';
            break;
            case '15': return 'COLIMA';
            break;
            case '4': return 'CHIHUAHUA';
            break;
            case '30': return 'CHIAPAS';
            break;
            case '6': return 'DURANGO';
            break;
            case '23': return 'ESTADO DE MÉXICO';
            break;
            case '16': return 'GUANAJUATO';
            break;
            case '24': return 'GUERRERO';
            break;
            case '19': return 'HIDALGO';
            break;
            case '14': return 'JALISCO';
            break;
            case '22': return 'MÉXICO DF';
            break;
            case '21': return 'MICHOACAN';
            break;
            case '25': return 'MORELOS';
            break;
            case '20': return 'MORELOS';
            break;
            case '7': return '>NAYARIT';
            break;
            case '10': return 'NUEVO LEON';
            break;
            case '28': return 'OAXACA';
            break;
            case '27': return 'PUEBLA';
            break;
            case '17': return 'QUERETARO';
            break;
            case '32': return 'QUINTANA ROO';
            break;
            case '12': return 'SAN LUIS POTOSI';
            break;
            case '5':  return 'SINALOA';
            break;
            case '3': return 'SONORA ';
            break;
            case '29': return 'TABASCO';
            break;
            case '11': return 'TAMAULIPAS';
            break;
            case '26': return 'TLAXCALA';
            break;
            case '18': return 'VERACRUZ';
            break;
            case '33': return 'YUCATAN';
            break;
            case '8': return 'ZACATECAS';
            break;
            default:
               return "Elemnto no existente";
            break;
        }
    }
    public function get_region($estado){		
        if($estado==1 or $estado==2 or $estado==3){
            //SONORA / BAJA CALIFORNIA
            $value="NOROESTE";
        }elseif($estado==4 or $estado==6  or $estado==9){
            //CHIHUAHUA, DURANGO, COAHUILA
            $value="NORTE";
        }elseif($estado==10 or $estado==11 or $estado==12 or $estado==18){
            //NUEVO LEON, TAMAULIPAS, SAN LUIS POTOSI, VERACRUZ, 
            $value="NOROESTE";
        }elseif($estado==7 or $estado==14 or $estado==15 or $estado==13 or $estado==16 or $estado==17 or $estado==19 or $estado==24 or $estado==26 or $estado==27 or $estado==30 or $estado==29){
            //NAYARIT, JALISCO, COLIMA, MICHOACAN, AGS, GUANAJUATO, QUERETARO, HIDALGO, GUERRERO, TLAXCALA, PUEBLA, CHIAPAS, TABASCO, 
            $value="SUR";
        }elseif($estado==33 or $estado==31 or $estado==32){
            //YUCATAN, CAMPECHE, QUINTANA ROO
            $value="PENINSULAR";
        }else{
            //DISTRITO FEDERAL,MEXICO, MORELOS 
            $value="CENTRAL";
        }	
            
        return $value;
    }

    

    public function get_tarifa($tarifa){       
        $LABELtarifa ="";
        $nuevaTarifa =0;
        $url ="";

        if($tarifa == 1){ 
            $LABELtarifa="1";
            $nuevaTarifa =2.8;
            $url ="http://app.cfe.gob.mx/Aplicaciones/CCFE/Tarifas/Tarifas/Tarifas_casa.asp?Tarifa=DAC2003&anio=2018";
        }
        if($tarifa == 2){ 
            $LABELtarifa="DAC";
            $nuevaTarifa =4.56;
            $url ="http://app.cfe.gob.mx/Aplicaciones/CCFE/Tarifas/Tarifas/Tarifas_casa.asp?Tarifa=DAC2003&anio=2018";
        }
        if($tarifa == 3){ 
            $LABELtarifa="GDMTO";
            $nuevaTarifa = 2.50;
            $url ="http://app.cfe.gob.mx/Aplicaciones/CCFE/Tarifas/Tarifas/tarifas_negocio.asp?Tarifa=OM&Anio=2018&mes=4";
        }
        if($tarifa == 4){ 
            $LABELtarifa="GDMTH";
            $nuevaTarifa =2.80;
            $url ="http://app.cfe.gob.mx/Aplicaciones/CCFE/Tarifas/Tarifas/tarifas_negocio.asp?Tarifa=HM&Anio=2018&mes=4";
        }
        if($tarifa == 5){ 
            $LABELtarifa="PDBT";
            $nuevaTarifa =4.13;
            $url ="http://app.cfe.gob.mx/Aplicaciones/CCFE/Tarifas/Tarifas/tarifas_negocio.asp?Tarifa=2&Anio=2018&mes=4";
        }

        $arrayName = array(
                    'tipoTarifa'=>$LABELtarifa,
                    'tarifa' => $nuevaTarifa,
					'url' => $url);
        return  json_encode($arrayName); 

    }

    public function get_paneles($panel){
        switch ($panel) {
            case ".32":
                return .32;
            break;
            case ".256":
                return .256;
            break;
            case ".325":
                return .325;
            break;
            case ".380":
                return .380;
            break;
            case ".370":
                return .370;
            break;
            case ".390":
                return .390;
            break;
            case ".400":
                return .400;
            break;
            
            default:
                return .325;
                break;
        }
     
    }


    public function get_energiaSolarEstado($ciudad,$bimestral,$tipoPanel){
	
        switch ($ciudad) { 
            case' 1':   $value=5.25; break;
            case' 2':   $value=5.69; break;
            case' 3':   $value=5.73; break;
            case' 4':   $value=5.59; break;
            case' 5':   $value=5.98; break;
            case' 6':   $value=5.73; break;
            case' 7':   $value=5.88; break;
            case' 8':   $value=5.76; break;
            case' 9':   $value=5.16; break;
            case' 10':   $value=5.16; break;
            case' 11':   $value=5.28; break;
            case' 12':   $value=5.49; break;
            case' 13':   $value=5.91; break;
            case' 14':   $value=5.81; break;
            case' 15':   $value=5.61; break;
            case' 16':   $value=5.79; break;
            case' 17':   $value=5.86; break;
            case' 18':   $value=4.6; break;
            case' 19':   $value=5.16; break;
            case' 20':   $value=5.94; break;
            case' 21':   $value=5.58; break;
            case' 22':   $value=5.46; break;
            case' 23':   $value=5.46; break;
            case' 24':   $value=5.68; break;
            case' 25':   $value=5.94; break;
            case' 26':   $value=5.4; break;
            case' 27':   $value=5.4; break;
            case' 28':   $value=5.26; break;
            case' 29':   $value=4.94; break;
            case' 30':   $value=5.15; break;
            case' 31':   $value=5.85; break;
            case' 32':   $value=4.98; break;
            case' 33':   $value=5.3; break;
        }	
    
        
        if ($bimestral == 12) {
            return ($tipoPanel*$value*30)*0.9;
        }else{
            return ($tipoPanel*$value*60)*0.9;
        }
        
    }
    public function cantidadPaneles($consumo,$estado,$bimestral,$tipoPanel){
        return ceil ($consumo/$this->get_energiaSolarEstado($estado,$bimestral,$tipoPanel));
    }

    public function potInstaladaKw($tipoPanel,$cantPaneles){
        return ($this->get_PanelSolarKws($tipoPanel)*$cantPaneles)/1000;
    }
    
    public function get_PanelSolarKws($tipoPanel){
        return $tipoPanel * 1000;
    }

    public function precioUnitarioPaneles($tipoPanel){
        /*return round($this->get_PanelSolarKws($tipoPanel)*$this->get_precioWattUSD2()*$this->get_cambioUSD(),2);*/
        return 7199;
    }

    public function get_precioWattUSD2(){
        return 1.3243;
    }

    public function get_cambioUSD(){    
        $app_id = 'a6dca556344b4660b32aa036276c019a';
        $oxr_url = "https://openexchangerates.org/api/latest.json?app_id=" . $app_id;
    
        // Open CURL session:
        $ch = curl_init($oxr_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    
        // Get the data:
        $json = curl_exec($ch);
        curl_close($ch);
    
        // Decode JSON response:
        $oxr_latest = json_decode($json);
    
        // You can now access the rates inside the parsed object, like so:
        $result = $oxr_latest->rates->MXN;
        // -> eg. "1 USD equals: 0.656741 GBP at 11:11, 11th December 2015"			
        return 	$result;
    }

    public function precioWhatMxN($precioPanel,$energiaCalculo,$calculo){
        $meses = 6;
        if ($calculo == 12) {
            $meses = 12;
        }

        return number_format($precioPanel/(($energiaCalculo*$meses)*20),2);

    }

    public function get_precioWattUSD($precioPanel,$usd,$panelTipo){
        return ($precioPanel/$usd)/$panelTipo;
    }


    public function AnualIncremento($incrementoAnual,$ANO){
        //return (($incrementoAnual*.01)*$ANO)+$ANO;
        return round((($incrementoAnual*.01)*$ANO)+$ANO,2);
    }

    
    
    
    

}    
    

?>