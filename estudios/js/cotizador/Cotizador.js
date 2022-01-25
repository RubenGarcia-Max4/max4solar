Vue.component('Cotizador',{
    template:`    
        <div>
            <div style="margin-bottom: 70px;">
                <transition-group name="fade">
                    <HeaderCotizacion v-if="index == 1" :key="1"  ></HeaderCotizacion>  
                    <Calculo-Tarifa  v-if="index == 1" :key="2"></Calculo-Tarifa>  
                </transition-group>
            
                <transition name="fade">
                    <Calculo-Paneles  v-if="index == 2" ></Calculo-Paneles>
                </transition>
                <transition name="fade">
                    <Inversion  v-if="index == 3" ></Inversion>
                </transition>

                <transition name="fade">
                    <Calculo-Anual v-if="index == 4" ></Calculo-Anual>
                </transition>
                <transition name="fade">
                    <Resumen v-if="index == 5" ></Resumen>
                </transition>
            </div>
            <div class="row m-0 fixed-bottom p-2" style="background-color: #eee;">
                <div class="col-4 mc">
                    <button class="w-100 mbntb"   @click="paginaAnterior" :disabled="!btnShowBefore"> 
                        <i class='fas fa-angle-double-left' style='font-size:24px; vertical-align: text-bottom;'></i>
                        <div class="mt-1" style="display: inline-block;"> {{textAnt}}</div>
                    </button>
                </div>
                <div class="col-4 mc">
                    <button class="w-100 mbntb" @click="paginaSiguiente" :disabled="!btnShowNext">
                        <div class="mt-1"  style="display: inline-block;"> {{textSig}} </div>
                        <i class='fas fa-angle-double-right' style='font-size:24px; vertical-align: text-bottom;'></i>
                    </button>
                </div>
               
                <div class="col-4 mc">
                    <button class="mbntb" @click="crearNuevaCotizacion">Nueva Cotización</button>
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
              index : 1,
              textSig : 'C. de Paneles',
              textAnt : '',
              btnShowNext : true,
              btnShowBefore : false 
            }
        },methods: {
            resetCotizaciom(){
                this.$emit('new','');
            }, paginaSiguiente(){                
                this.index  < 5 ? this.index++:this.index=1               
                this.pagina()
                console.log("pagina siguiente "+this.index );
            },
            paginaAnterior(){
                this.index <= 1 ? this.index=1:this.index--
                this.pagina()
                console.log("pagina anterior "+this.index );
            },
            pagina(){              
                switch (this.index) {
                    case 1:                       
                        this.textAnt ="";                        
                        this.textSig ="C. Tarifa";   
                        this.btnShowBefore = false                     
                        this.btnShowNext = true                     
                    break;
                    case 2: 
                        this.btnShowBefore = true                          
                        this.textAnt ="C. Tarifa";                       
                        this.textSig = "Inversion";                        
                    break;
                    case 3: 
                        this.textAnt ="C. de Paneles";   
                        this.textSig = "Ahorro Anual";                        
                    break;
                    case 4: 
                        this.textAnt ="Inversión";   
                        this.textSig = "Resumen";  
                        this.btnShowNext = true                       
                    break;
                    case 5: 
                        this.textAnt ="Ahorro Anual";   
                        this.textSig = "";  
                        this.btnShowNext = false                      
                    break;
                    default:   
                    break
                }
            },
            ... Vuex.mapActions(['crearNuevaCotizacion'])
        },actions:{
           
        }
       
});
