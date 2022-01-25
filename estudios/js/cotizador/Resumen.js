Vue.component('Resumen',{
    template:`
        <div>
            <h3>Toneladas de CO2 Ahorrado</h3>  
       	
            <table class="table table-dark" style="font-size:.75em">
                <thead class="titulo-tabla">
                    <tr>
                      
                        <th scope="col">CO2 Ahorrado</th>
                        <th scope="col">Equivalencia Hectareas de pino plantadas</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">{{cotizacion.co2}}</th>
                        <td style="background: #F36;color=white;">{{cotizacion.arbol}} 
                            <a href="http://www.fao.org/docrep/ARTICLE/WFC/XII/0043-B2.HTM" target="_blank" >
                            <i class='fas fa-tree' style='font-size:24px; color:green; vertical-align: bottom;'></i>                            
                            </a>
                        </td>                       
                    </tr>
                </tbody>                   
            </table>

            <h3>Resumén</h3>  
            <table class="table table-dark" style="font-size:.75em; float:right">              
                <tbody>
                    <tr>                       
                        <td  class="bg-warning">Pago Acumulado a CFE sin Panel</td>
                        <td >{{ parseFloat(cotizacion.acumulado[19]).toFixed(2) | currency()   }}  </td>
                       
                    </tr>                            
                    <tr>                       
                        <td  class="bg-warning" >Inversión</td>
                        <td >{{ parseFloat(cotizacion.TotalDesglose).toFixed(2) | currency()  }}</td>
                       
                    <tr>                       
                        <td  class="bg-warning">Ahorro Total Acumulado</td>
                        <td >{{ cotizacion.ahorroTotal | currency() }}</td>
                       
                    </tr>                            
                                            
                </tbody>
            </table>

            <h3>Datos de Pago</h3>
	   
	     <div id="contacta"  @click="whatsApp"  >
                 <img src="http://max4energiasolar.com.mx/images/whatsapp.png" width="250" />
            </div>	
            <div class="row" style="font-size: 0.8em; font-weight: 400;">
                <div class="col-sm-6">
                    

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
                            <div class="col-6"><strong>Num de Cuenta:</strong></div>                  
                            <div class="col-6"> 1402783-01</div>                  
                        </div>

                        <div class="row">
                            <div class="col-6"><strong>CLABE:</strong></div>                  
                            <div class="col-6">030010140278301011</div>                  
                        </div>

                        <div class="row">
                            <div class="col-6"><strong>RFC:</strong></div>                  
                            <div class="col-6">TSA050111H76</div>                  
                        </div>

                        <div class="row">
                            <div class="col-6"><strong>TITULAR:</strong></div>                  
                            <div class="col-6">TECNOLOGIA Y SOLUCIONES APLICADAS S.A DE C.V</div>                  
                        </div>

                        <div class="row">
                            <div class="col-6"><strong>DESTINO:</strong></div>                  
                            <div class="col-6">Aguascalientes, Ags</div>                  
                        </div>
                            
                        <div class="row">
                            <div class="col-6"><strong>Correo:</strong></div>                  
                            <div class="col-6">perla_mm@max4systems.com</div>                  
                        </div>
                        <div class="row">
                            <div class="col-6"><strong>Teléfono:</strong></div>                  
                            <div class="col-6">449-9157710</div>                  
                        </div>                
                    </div>
                
                    
                </div>
                <div class="col-sm-6">
                
                    


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
                            <div class="col-6"><strong>Num de Cuenta:</strong></div>                  
                            <div class="col-6"> 0411532820</div>                  
                        </div>

                        <div class="row">
                            <div class="col-6"><strong>CLABE:</strong></div>                  
                            <div class="col-6">072010004115328206</div>                  
                        </div>

                        <div class="row">
                            <div class="col-6"><strong>RFC:</strong></div>                  
                            <div class="col-6">TSA050111H76</div>                  
                        </div>

                        <div class="row">
                            <div class="col-6"><strong>TITULAR:</strong></div>                  
                            <div class="col-6">TECNOLOGIA Y SOLUCIONES APLICADAS S.A DE C.V</div>                  
                        </div>

                        <div class="row">
                            <div class="col-6"><strong>DESTINO:</strong></div>                  
                            <div class="col-6">Aguascalientes, Ags</div>                  
                        </div>
                            
                        <div class="row">
                            <div class="col-6"><strong>Correo:</strong></div>                  
                            <div class="col-6">perla_mm@max4systems.com</div>                  
                        </div>
                        <div class="row">
                            <div class="col-6"><strong>Teléfono:</strong></div>                  
                            <div class="col-6">449-9157710</div>                  
                        </div>                
                    </div>       

                    
                </div>

            </div>

            


            


        </div>
        `,
        computed:{
	     ...Vuex.mapState(['showCotizacion','showForm','loadig','urlDescarga','isDescarga']),	
            ...Vuex.mapGetters({
                 cotizacion: 'getCotizacion'
             }),
                         
         } ,
        mounted() {
            console.log('Component mounted cotizacion.')
        },
        data() {
            return {
              
            }
        },methods: {
		 whatsApp({commit}){                        
                        var text=encodeURIComponent('Buen dia me interesan los paneles te envio mi cotizacion: '+this.urlDescarga);
                        window.open('https://api.whatsapp.com/send?phone='+phone+'&text='+text);
                    }    
           
        },
       
});