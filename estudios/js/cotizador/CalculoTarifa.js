Vue.component('Calculo-Tarifa',{
    template:`
        <div>
           <h3>Calculo Tarifa</h3>  
           <table class="table table-dark" style="font-size:.75em">
                <thead  class="titulo-tabla">
                    <tr>
                    <th scope="col">Tarifa {{cotizacion.tipoTarifa}}</th>
                    <th scope="col">Consumo kWh</th>
                    <th scope="col">Precio kWh {{cotizacion.anio}}</th>
                    <th scope="col">DAP</th>
                    <th scope="col">IVA</th>
                    <th scope="col">TOTAL</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row" style="background:#F90">{{cotizacion.tipoTarifa}}</th>
                        <td>{{cotizacion.consumoKW}}</td>
                        <td>{{ cotizacion.tarifa | currency() }}</td>
                        <td>{{cotizacion.dap}}</td>
                        <td>{{ cotizacion.ivaTarifa | currency() }}</td>
                        <td> {{ cotizacion.pago | currency() }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>NUEVA TARIFA {{cotizacion.tipoTarifa}}</td>
                        <td style="background:#333; color=white;"> {{ cotizacion.nuevaTarifa  | currency() }} </td>
                        <td></td>                       
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="background:#F30;color=white;">AHORRO {{cotizacion.tipoCalculo}}</td>
                        <td style="background:#F30;color=white;"> {{ cotizacion.ahorro | currency() }} </td>
                        <td style="background:#F30;color=white;">{{cotizacion.porcentajeAh}}% </td>
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
        mixins:[myMixin]
       
});