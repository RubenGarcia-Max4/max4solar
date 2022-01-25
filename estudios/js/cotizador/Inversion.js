Vue.component('Inversion',{
    template:`
        <div>
            <h3>Inversion</h3>
            <table class="table table-dark" style="font-size:.75em">
                <thead class="titulo-tabla">
                    <tr>                        
                        <th scope="col">TOTAL DE {{cotizacion.cantidadPanel}} PANELES</th>
                        <th scope="col">NUEVO PRECIO WATT MXN S/IVA</th>
                        <th scope="col">PRECIO POR WATT Solar S/IVA USD</th>
                        <th scope="col">PRECIO CAMBIO (DOF)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>                        
                        <td>  {{ parseFloat(cotizacion.TotalDesglose).toFixed(2) | currency() }} </td>
                        <td> {{ cotizacion.precioWhatMxN | currency() }}</td>
                        <td> {{ cotizacion.precioWhatUSD | currency() }}</td>
                        <td> {{ cotizacion.dof | currency() }}</td>
                    </tr>   
                </tbody>                
            </table>

            <table class="table table-dark" style="font-size:.75em; float:right">
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
                        <td > {{ cotizacion.precioUnitario | currency() }}</td>
                        <td >{{cotizacion.cantidadPanel}}</td>
                        <td > {{ cotizacion.totalPanelesSinIva | currency() }}</td>
                    </tr>                            
                    <tr>                       
                        <td >Monitoreo</td>
                        <td > {{ cotizacion.monitor | currency() }}</td>
                        <td >12</td>
                        <td > {{ cotizacion.monitor*12 | currency() }}</td>
                    </tr>  
                                      
                    <tr v-if="cotizacion.isMedidorVerifcacion">                       
                        <td >Verificación e Inspección</td>
                        <td > {{ cotizacion.verifiacion | currency() }}</td>
                        <td >{{cotizacion.cantidadPanel}}</td>
                        <td > {{ cotizacion.totalVerificacion | currency() }}</td>
                    </tr>                            
                    <tr v-if="cotizacion.isMedidorVerifcacion">                       
                        <td>Medidor</td>
                        <td> {{ cotizacion.medidor | currency() }}</td>
                        <td>1</td>
                        <td> {{ cotizacion.medidor| currency() }}</td>
                    </tr>                            
                    <tr>                       
                        <td ></td>
                        <td ></td>
                        <td >Subtotal</td>
                        <td > {{ cotizacion.subTotal| currency() }}</td>
                    </tr>                            
                    <tr>                       
                        <td ></td>
                        <td ></td>
                        <td >iva</td>
                        <td > {{ cotizacion.ivaDesglose | currency() }}</td>
                    </tr>  
                    <tr>                       
                        <td ></td>
                        <td ></td>
                        <td >Total</td>
                        <td > {{ parseFloat(cotizacion.TotalDesglose).toFixed(2) | currency() }}</td>
                    </tr>                            
                </tbody>
            </table>

        </div>
        `,
        computed:{
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
        },
       
});
