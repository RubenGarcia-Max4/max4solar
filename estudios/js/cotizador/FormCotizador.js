Vue.component('Formulario',{
    template:`
        <div  id="app" style="font-size: 0.8em;  font-weight: 400;">            
            <form action="" v-on:submit.prevent="checkForm" style="margin-top:40px;">                    
                <div class="form-group">
                    <div class="row">
                        <div class="col-2">
                            <label for="recipient-name">Nombre:</label>
                        </div>

                        <div class="col-sm-10">
                            <input type="name" v-model="name" name="name" class="form-control" id="recipient-name" >
                            <span class="text-danger" v-if="validationErrors.name" v-text="validationErrors.name"></span>
                        </div>
                    </div>                        
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-2">
                            <label for="recipient-name">Tel:</label>
                        </div>
                        <div class="col-sm-4">
                            <input type="number" v-model="telefono" class="form-control" id="recipient-name">
                            <span class="text-danger" v-if="validationErrors.telefono" v-text="validationErrors.telefono"></span>
                        </div>
                        <div class="col-sm-2">
                            <label for="recipient-name">Email:</label>
                        </div>
                        <div class="col-sm-4">
                            <input type="email"  v-model="email" name="email" class="form-control" id="recipient-name">  
                            <span class="text-danger" v-if="validationErrors.email" v-text="validationErrors.email"></span>                              
                        </div>
                    </div>                                     
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-2">
                            <label for="recipient-name">Estado:</label>
                        </div>
                        <div class="col-sm-4">
                            <select id="ciudad" name="ciudad" class="form-control" v-model="ciudad">
                                <option value='13'>AGUASCALIENTES</option>
                                    <option value='1' >B.C NORTE</option>
                                    <option value='2' >B.C SUR</option>
                                    <option value='31'>CAMPECHE</option>
                                    <option value='9' >COAHUILA</option>
                                    <option value='15'>COLIMA</option>
                                    <option value='4' >CHIHUAHUA</option>
                                    <option value='30'>CHIAPAS</option>
                                    <option value='6' >DURANGO</option>
                                    <option value='23'>ESTADO DE MÉXICO</option>
                                    <option value='16'>GUANAJUATO</option>
                                    <option value='24'>GUERRERO</option>
                                    <option value='19'>HIDALGO</option>
                                    <option value='14'>JALISCO</option>
                                    <option value='22'>MÉXICO DF</option>
                                    <option value='21'>MICHOACAN</option>
                                    <option value='25'>MORELOS</option>
                                    <option value='20'>MORELOS</option>
                                    <option value='7' >NAYARIT</option>
                                    <option value='10'>NUEVO LEON</option>
                                    <option value='28'>OAXACA</option>
                                    <option value='27'>PUEBLA</option>
                                    <option value='17'>QUERETARO</option>
                                    <option value='32'>QUINTANA ROO</option>
                                    <option value='12'>SAN LUIS POTOSI</option>
                                    <option value='5' >SINALOA</option>
                                    <option value='3' >SONORA </option>
                                    <option value='29'>TABASCO</option>
                                    <option value='11'>TAMAULIPAS</option>
                                    <option value='26'>TLAXCALA</option>
                                    <option value='18'>VERACRUZ</option>
                                    <option value='33'>YUCATAN</option>
                                    <option value='8'>ZACATECAS</option>
                            </select>

                            <span class="text-danger" v-if="validationErrors.ciudad" v-text="validationErrors.ciudad"></span>              
                        </div>
                        <div class="col-2">
                            <label for="recipient-name">Tarifa:</label>
                        </div>
                        <div class="col-sm-4">                            
                            <select class="custom-select" id="inputGroupSelect01" v-model="tarifa">                                   
                                <option value="0">Seleccionar Tipo Tarifa</option>
                                <option value="1">TARIFA 1</option>
                                <option value="2">TARIFA DAC</option>
                                <option value="3">TARIFA GDMTO</option>
                                <option value="4">TARIFA GDMTH</option>
                                <option value="5">TARIFA PDBT</option>                                  
                            </select> 
                            <span class="text-danger" v-if="validationErrors.tarifa" v-text="validationErrors.tarifa"></span>              
                        </div>
                    </div>                                     
                </div>

                <div class="form-group mt-4">
                    <div class="row">
                        <div class="col-sm-2">
                            <label for="recipient-name">Calculo:</label>
                        </div>
                        <div class="col-sm-4">
                            <select class="custom-select" id="inputGroupSelect01" v-model="calculo">                                   
                                <option value="1">Bimsetral</option>
                                <option value="2">Mensual</option>                                  
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <label for="recipient-name">Cuanto Pago:</label>
                        </div>
                        <div class="col-sm-4">
                            <input type="number" step="any"  v-model="pago"  name="pago" class="form-control" id="recipient-name">
                            <span class="text-danger" v-if="validationErrors.pago" v-text="validationErrors.pago"></span>
                        </div>
                    </div>                                     
                </div>


                <div class="modal-footer">
                <p class="text-danger" style="left:20px;"  v-if="errors.length">
                    <b>Campo(s) Requerido(s):</b>               
                </p>
                    <button type="button" class="btn btn-danger py-2 px-5 miBtn" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success py-2 px-5 miBtn">Cotizar</button>
                </div>

            </form>                        
        </div>
        `,
        data() {
            return {
                name: null,
                email: null,
                ciudad: 13,
                tarifa:0,
                pago: null,
                telefono:null,
                calculo:2,
                errors:[],
                validationErrors: {
                    name: null,
                    email: null,
                    ciudad: null,
                    tarifa:null,
                    pago: null,
                    telefono:null,               
                }
            }
        },
        computed: {
            ...Vuex.mapState(['cotizacion'])
        },
        methods: {
            checkForm: function(){          
                this.errors = [];
                this.validationErrors = {
                    name: null,
                    email: null,
                    ciudad: null,
                    tarifa:null,
                    pago: null,
                    telefono:null,               
                }    
                
               

                if (!this.name) {
                    this.errors.push({name:'Nombre es un campo requerido'});
                    this.validationErrors.name ='Nombre es un campo requerido';
                }

                if (!this.email) {
                    this.errors.push('Email required.');
                    this.validationErrors.email ='Se requiere un email valido';
                } else if (!this.validEmail(this.email)) {
                    this.errors.push('Valid email required.');
                    this.validationErrors.email ='Se requiere un email valido';
                }

                if (!this.ciudad) {
                    this.errors.push('Ciudad es un campo requerido');
                    this.validationErrors.ciudad ='Ciudad es un campo requerido';
                } 

                if (!this.pago) {
                    this.errors.push('Pago es un campo requerido');
                    this.validationErrors.pago ='Pago es un campo requerido';
                } 

                if (!this.telefono) {
                    this.errors.push('Telefono es un campo requerido');
                    this.validationErrors.telefono ='Telefono es un campo requerido';
                } 
                
                
                if (!this.tarifa || this.tarifa==0) {
                    this.errors.push('Seleccione una tarifa');
                    this.validationErrors.tarifa ='Tarifa es un campo requerido';
                } 

                
                if (this.errors.length == 0) {
                        this.submitFormulario()
                }
            }, validEmail: function (email) {
                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(email);
            },submitFormulario(){
                const cotizacion ={
                    nombre: this.name,
                    email: this.email,
                    ciudad: this.ciudad,
                    tarifa: this.tarifa,
                    pago: this.pago,
                    telefono: this.telefono,
                    calculo: this.calculo
            }
            let protocol = window.location.protocol;
		//alert(protocol );
           /* axios.get('http://localhost/PAGINAS/max4ene/controller/ObtenerCotizacion.php?name='+this.name+'&email='+this.email+'&ciudad='+this.ciudad+'&tarifa='+this.tarifa+'&pago='+this.pago+'&telefono='+this.telefono+'&calculo='+this.calculo)*/
            axios.get(protocol+'//max4energiasolar.com.mx/controller/ObtenerCotizacion.php?name='+this.name+'&email='+this.email+'&ciudad='+this.ciudad+'&tarifa='+this.tarifa+'&pago='+this.pago+'&telefono='+this.telefono+'&calculo='+this.calculo)
                .then((response)=>{  
                    const miCotizacion = response.data;  
                    this.$store.commit("makeCotizar",miCotizacion);
                    this.name = null;
                    this.email= null;
                    this.ciudad = 13;
                    this.tarifa=3;
                    this.pago = null;
                    this.telefono = null;
                    this.calculo =2;
                    this.errors = [];
                });
        },        
    }
});
