		  
		  var phone = "";
          var seller =  Math.floor(Math.random()*2);
          var text=encodeURIComponent('¡Quiero más información de Paneles Solares para Empresas!');
          switch(seller){
                 case 0: phone='5214491425091'; break;
                 case 1: phone='5214493217279'; break; 
                        }
          function whatsApp(){
              
              window.open('https://api.whatsapp.com/send?phone='+phone+'&text='+text);

          }

