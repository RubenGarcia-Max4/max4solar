Vue.component('FormaPago',{
    template:`
        <div>
            <h1>DATOS DE PAGO</h1>  

          
          

        </div>
        `,
        props: ['cotizacion'],
        mounted() {
            console.log('Component mounted cotizacion.')
        },
        data() {
            return {
              
            }
        },methods: {
            formatNumber(num) {
                return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
            }
        },
       
});