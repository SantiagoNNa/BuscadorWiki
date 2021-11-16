$('body').on('click', '.search', function() {
    
    var busqueda = $('#input_Busqueda').val();
    var parameters = {
      action: "search",
      table: "APIWIKI",
      busq : busqueda
    };

    $.ajax({
       
        type: "POST",
        url: "busquedaControl.php",
        data: $.param(parameters),
        //dataType: "json",
        success: function(result) {
            if(result === 1 ){
                console.log("ERROR MI PAPA")
            }else{
                //console.log("Aqui viene el " + result);
                $("#showResults").html(result);    
            }
              
        },error :function(){
            alert("Se presento  un error!! Debe Ingresar palabra clave")
        }
    });
 });