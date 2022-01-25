Vue.component('HeaderCotizacion',{
    template:`
        <div style="font-size: 1em; font-weight: 400;">
            <div class="row" style="font-size: 0.78em;">
                <div class="col-6">
                    <div class="row" >
                        <div class="col-3" ><strong>Nombre:</strong></div>
                        <div class="col-9" >{{cotizacion.name}}</div>
                    </div>

                    <div class="row">
                        <div class="col-3"><strong>Ciudad:</strong> </div>
                        <div class="col-9" >{{cotizacion.nameciudad}}</div>
                    </div>

                    <div class="row">
                        <div class="col-3" ><strong>Tel:</strong></div>
                        <div class="col-9" >{{cotizacion.telefono}}</div>
                    </div>

                    <div class="row">
                        <div class="col-3" ><strong>Email:</strong></div>
                        <div class="col-9">{{cotizacion.email}}</div>
                    </div>              
                </div> 
                <div class="col-6">
                    <div class="row" >
                        <div class="col-4" ><strong>Tipo de tarifa:</strong></div>
                        <div class="col-8" style="background:orange" >{{cotizacion.tipoTarifa}}</div>
                    </div>
                    <div class="row" >
                        <div class="col-4" ><strong>Consumo kWh:</strong></div>
                        <div class="col-8" >{{cotizacion.consumoKW}}</div>
                       
                    </div>
                    <div class="row" >
                        <div class="col-4" ><strong>Incremento Anual:</strong></div>
                        <div class="col-8"  >{{cotizacion.incrementoAnual}}</div>
                       
                    </div>

                    <div class="row" >
                        <div class="col-4" ><strong>DOF:</strong></div>
                        <div class="col-8">{{ cotizacion.dof | currency() }}</div>
                       
                    </div>
                    <div class="row" >
                        <div class="col-4" ><strong>Tarifa {{cotizacion.tipoTarifa}}:</strong></div>
                        <div class="col-8">{{cotizacion.tarifa}}</div>
                       
                    </div>                    
                </div>   
            </div>

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