Vue.component('Calculo-Anual',{
    template:`
        <div>
            <h3>Calculo de Ahorro Anual <br> Retorno de inversión a {{cotizacion.anioRetorno}} años </h3>  

           
            <div class="row" style="font-size: 0.8em; font-weight: 400;" >
                <div class="col-6">
                <div  class="row">
                    <div class="col-3 bg-warning">PERIODO</div>
                    <div class="col-4 bg-warning">PAGO ANUAL</div>
                    <div class="col-5 bg-warning">AHORRO ACUMULADO </div>
                </div>
                    <ul class="list-group">
                        <li class="list-group-item"                            
                            v-for="(el,index) in cotizacion.acumulado" class="tablanormal"
                            v-if="index < 10"    
                            >
                               
                                <div  class="row">
                                    <div class="col-3 bg-success">Año {{index+1}} </div>
                                    <div class="col-4"> {{  parseFloat(cotizacion.retornoAnio[index]).toFixed(2) | currency() }} </div>
                                    <div class="col-5" v-bind:class="{                               
                                        'retorno': index+1 <= cotizacion.anioRetorno                                
                                    }"> {{  parseFloat(el).toFixed(2) | currency() }} </div>
                                </div>
                        </li>
                    </ul>
                </div>

                
                <div class="col-6">
                    <div  class="row">
                        <div class="col-3 bg-warning">PERIODO</div>
                        <div class="col-4 bg-warning">PAGO ANUAL</div>
                        <div class="col-5 bg-warning" >AHORRO ACUMULADO </div>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item"                            
                            v-for="(el,index) in cotizacion.acumulado" class="tablanormal2"
                            v-if="index > 9"    
                            >
                               
                                <div  class="row">
                                    <div class="col-3 bg-success">Año {{index+1}} </div>
                                    <div class="col-4"> {{ parseFloat(cotizacion.retornoAnio[index]).toFixed(2) | currency()  }} </div>
                                    <div class="col-5" v-bind:class="{                               
                                        'retorno': index+1 <= cotizacion.anioRetorno                                
                                    }"> {{ parseFloat(el).toFixed(2) | currency() }} </div>
                                </div>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        `,
        computed:{
            ...Vuex.mapGetters({
                 cotizacion: 'getCotizacion'
             }),
                         
         } ,
        data() {
            return {
              
            }
        },methods: {
           
        },
       
});