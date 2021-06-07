function seleccionarGenero($id){
  var xhttp = new XMLHttpRequest();       
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var datos = this.responseText;
        var resena = JSON.parse(datos);
        $("#tituloResena").text(resena.datos[0][1]);
        $("#resena").text(resena.datos[0][2]);
        $("#tituloJuego").text(resena.datos[0][0]);
        $("#nombreUsuRese").text(resena.datos[0][3]);
      }
  };
  xhttp.open("GET", "./componentes/llamadasJs.php?llamar="+$id, true);     
  xhttp.send(); 
//  para que no se siga el link que llama a esta función
}
$(document).ready(function(){
  $("#tituloResenas").children().on("click",function(){
    if(this.id=="nueva resena"){
      $("#tituloResena").text("Escriba su reseña")
      $("#resena").text("");
      $("#tituloJuego").text("");
      $("#nombreUsuRese").text("");
    }else{
      seleccionarGenero(this.id);
    }
  })
})
