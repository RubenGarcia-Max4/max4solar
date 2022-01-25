Vue.component('Calculo-Paneles',{
    template:`
        <div>           
            <h3>Calculo de Paneles Solares</h3>  
            <table class="table table-dark" style="font-size:.75em">
                <thead class="titulo-tabla">
                    <tr>
                        <th scope="col">TIPO DE PANEL SOLAR</th>
                        <th scope="col">ENERGIA {{cotizacion.tipoCalculo}}</th>
                        <th scope="col">CANTIDAD PANELES</th>
                        <th scope="col">POT INSTALADA kW</th>                    
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row" style="background:#F90">{{cotizacion.tipoPanel}}</th>
                        <td>{{cotizacion.energiaCalculo}}</td>
                        <td style="background: #F36;color=white;">{{cotizacion.cantidadPanel}}</td>
                        <td>{{cotizacion.potInstalada}}</td>
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