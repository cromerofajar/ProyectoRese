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
  xhttp.open("GET", "./componentes/cargarJs.php?llamar="+$id, true);     
  xhttp.send(); 
//  para que no se siga el link que llama a esta función
}
function nuevo($titulo){
  var xhttp = new XMLHttpRequest();       
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var echo = this.responseText;
        var funciono = JSON.parse(echo);
        if(!funciono){
          $("#cartaResenas").children().remove();
          $("#cartaResenas").html("<h1>Error al insertar</h1>");
        }else{
          $("#cartaResenas").children().remove();
          $("#cartaResenas").html("<h1 id='tituloResena'>Seleccione una reseña para poder verla</h1><h3 id='tituloJuego'></h3><p id='resena'></p><p id='nombreUsuRese'></p>");
        }
      }
  };
  xhttp.open("GET", "./componentes/cargarJs.php?nuevo="+$titulo, true);     
  xhttp.send(); 
}
function cargar(){
  var xhttp = new XMLHttpRequest();       
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var juegos = this.responseText;
        var juego = JSON.parse(juegos);
        for(i=0;i<juego.length;i++){
          $("#selector").append("<option>"+juego[i]+"</option>");
        }
      }
  };
  xhttp.open("GET", "./componentes/cargarJs.php?cargar=si", true);     
  xhttp.send(); 
}

function cargarRese(){
  var xhttp = new XMLHttpRequest();       
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var juegos = this.responseText;
        var juego = JSON.parse(juegos);
        for(i=0;i<juego.length;i++){
          $("#selector").append("<option>"+juego[i][0]+"</option>");
        }
      }
  };
  xhttp.open("GET", "./componentes/cargarJs.php?buscar=si", true);     
  xhttp.send(); 
}

function modificar($juego,$nuevoNombre){
  var xhttp = new XMLHttpRequest();       
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var echo = this.responseText;
        var funciono = JSON.parse(echo);
        if(!funciono){
          $("#cartaResenas").children().remove();
          $("#cartaResenas").html("<h1>Error al modificar</h1>");
        }else{
          $("#cartaResenas").children().remove();
          $("#cartaResenas").html("<h1 id='tituloResena'>Seleccione una reseña para poder verla</h1><h3 id='tituloJuego'></h3><p id='resena'></p><p id='nombreUsuRese'></p>");
        }
      }
  };
  xhttp.open("GET", "./componentes/cargarJs.php?juego="+$juego+"&nuevoNJ="+$nuevoNombre, true);     
  xhttp.send(); 
}

function eliminar($juego){
  var xhttp = new XMLHttpRequest();       
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var echo = this.responseText;
        var funciono = JSON.parse(echo);
        if(!funciono){
          $("#cartaResenas").children().remove();
          $("#cartaResenas").html("<h1>Error al eliminar</h1>");
        }else{
          $("#cartaResenas").children().remove();
          $("#cartaResenas").html("<h1 id='tituloResena'>Seleccione una reseña para poder verla</h1><h3 id='tituloJuego'></h3><p id='resena'></p><p id='nombreUsuRese'></p>");
        }
      }
  };
  xhttp.open("GET", "./componentes/cargarJs.php?eliminar="+$juego, true);     
  xhttp.send(); 
}
function eliminarRese($resena){
  var xhttp = new XMLHttpRequest();       
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var echo = this.responseText;
        var funciono = JSON.parse(echo);
        if(!funciono){
          $("#cartaResenas").children().remove();
          $("#cartaResenas").html("<h1>Error al eliminar</h1>");
        }else{
          $("#cartaResenas").children().remove();
          $("#cartaResenas").html("<h1 id='tituloResena'>Seleccione una reseña para poder verla</h1><h3 id='tituloJuego'></h3><p id='resena'></p><p id='nombreUsuRese'></p>");
        }
      }
  };
  xhttp.open("GET", "./componentes/cargarJs.php?eliminarRese="+$resena, true);     
  xhttp.send(); 
}
function nuevaR($titulo,$juego,$resena){
  if($resena.length<=2000){
    $("#contados").text();
  var xhttp = new XMLHttpRequest();       
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var echo = this.responseText;
        console.log(echo);
        var funciono = JSON.parse(echo);
        if(!funciono){
          $("#cartaResenas").children().remove();
          $("#cartaResenas").html("<h1>Error al añadir</h1>");
        }else{
          $("#cartaResenas").children().remove();
          $("#cartaResenas").html("<h1 id='tituloResena'>Seleccione una reseña para poder verla</h1><h3 id='tituloJuego'></h3><p id='resena'></p><p id='nombreUsuRese'></p>");
        }
      }
  };
  xhttp.open("GET", "./componentes/cargarJs.php?titulo="+$titulo+"&juego="+$juego+"&resena="+$resena, true);     
  xhttp.send(); }else{
    $("#contados").text("El maximo son 2000 caracteres y tienes "+$resena.length);
    }

}
function contar($resena){
  if($resena.length<=2000){
  $("#contados").text("  "+$resena.length+" caracteres");
  }else{
    
  $("#contados").text("El maximo son 2000 caracteres y tienes "+$resena.length);
  }
}

$(document).ready(function(){
  $("#tituloResenas").children().on("click",function(){
    $("#cartaResenas").children().remove();
    $("#cartaResenas").html("<h1 id='tituloResena'>Cargando su Reseña</h1><h3 id='tituloJuego'></h3><p id='resena'></p><p id='nombreUsuRese'></p>");
    if(this.id=="nueva resena"){
      $("#cartaResenas").children().remove();
    $("#cartaResenas").html("<form>"+
    "<label for='titulo'>Titulo: </label><input type='text' id='tituloJ' name='titulo'><br>"+
    "<label for='seleccionar'>Selecciona juego a añadir reseña: </label><select id='selector' name='seleccionar' id='selected'><br>"+
    "<textarea name='texto' id='rese' cols='100' rows='5' max='2000'></textarea><br>"+
    "<label for=comprobar>Comprobar caracteres</label><input type='checkbox' id='compro' name='comprobar'><span id=contados></span>"+
    "</form><button class='btn btn-info btn-block' type='button' id='anadirR'>Añadir</button><br><button class='btn btn-info btn-block' type='button' id='cancelar'>Cancelar</button>");
    cargar(); 
    }else{
      seleccionarGenero(this.id);
    }
  })
  $("#AnadirJuego").on("click",function(){
    $("#cartaResenas").children().remove();
    $("#cartaResenas").html("<form><label for='titulo'>Titulo: </label><input type='text' id='tituloJ' name='titulo'></form><button class='btn btn-info btn-block' type='button' id='anadirJ'>Añadir</button><br><button class='btn btn-info btn-block' type='button' id='cancelar'>Cancelar</button>");
  })
  
  $("#ModificarJuego").on("click",function(){
    $("#cartaResenas").children().remove();
    $("#cartaResenas").html("<form><label for='seleccionar'>Selecciona juego a modificar: </label><select id='selector' name='seleccionar' id='selected'></select><br><label for='titulo'>Titulo: </label><input type='text' id='tituloJ' name='titulo'></form><button class='btn btn-info btn-block' type='button' id='modifica'>Modificar</button><br><button class='btn btn-info btn-block' type='button' id='cancelar'>Cancelar</button>");
    cargar(); 
  })
  $("#EliminarJuego").on("click",function(){
    $("#cartaResenas").children().remove();
    $("#cartaResenas").html("<form><label for='seleccionar'>Selecciona juego a eliminar: </label><select id='selector' name='seleccionar' id='selected'></select><br><label for='confirmar'>Seguro que desea eliminar este juego?</label><input type='checkbox' name='confirmar' id='confir'></form><button class='btn btn-info btn-block' type='button' id='eliminar'>Eliminar</button><br><button class='btn btn-info btn-block' type='button' id='cancelar'>Cancelar</button>");
    cargar(); 
  })
  
  $("#EliminarResena").on("click",function(){
    $("#cartaResenas").children().remove();
    $("#cartaResenas").html("<form><label for='seleccionar'>Selecciona la reseña a eliminar: </label><select id='selector' name='seleccionar' id='selected'></select><br><label for='confirmar'>Seguro que desea eliminar este juego?</label><input type='checkbox' name='confirmar' id='confir'></form><button class='btn btn-info btn-block' type='button' id='eliminarRese'>Eliminar</button><br><button class='btn btn-info btn-block' type='button' id='cancelar'>Cancelar</button>");
    cargarRese(); 
  })
})
$(document).on("click","#cancelar",function(){
  $("#cartaResenas").children().remove();
  $("#cartaResenas").html("<h1 id='tituloResena'>Seleccione una reseña para poder verla</h1><h3 id='tituloJuego'></h3><p id='resena'></p><p id='nombreUsuRese'></p>");
})

$(document).on("click","#anadirJ",function(){
  $tituloJ=$("#tituloJ").val();
  if($tituloJ!=""){
    nuevo($tituloJ);
  } 
})
$(document).on("click","#modifica",function(){
  $seleccionado=$("#selector").val();
  $tituloJ=$("#tituloJ").val();
  if($tituloJ!=""){
    modificar($seleccionado,$tituloJ);
  } 
})
$(document).on("click","#eliminar",function(){
  $seleccionado=$("#selector").val();
  $confirmacion=$("#confir").is(':checked');
  console.log($confirmacion);
  if($confirmacion){
    eliminar($seleccionado);
  }else{
    $("#cartaResenas").children().remove();
    $("#cartaResenas").html("<h1 id='tituloResena'>No acepto el borrado</h1><h3 id='tituloJuego'></h3><p id='resena'></p><p id='nombreUsuRese'></p>");
  }
})
$(document).on("click","#eliminarRese",function(){
  $seleccionado=$("#selector").val();
  $confirmacion=$("#confir").is(':checked');
  console.log($seleccionado);
  if($confirmacion){
    eliminarRese($seleccionado);
  }else{
    $("#cartaResenas").children().remove();
    $("#cartaResenas").html("<h1 id='tituloResena'>No acepto el borrado</h1><h3 id='tituloJuego'></h3><p id='resena'></p><p id='nombreUsuRese'></p>");
  }
})
$(document).on("click","#anadirR",function(){
  $tituloJ=$("#tituloJ").val();
  $seleccionado=$("#selector").val();
  $resena=$("#rese").val();
  $compro=$("#compro").is(':checked');
  if($tituloJ!=""&&$resena!=""&& !$compro){
    nuevaR($tituloJ,$seleccionado,$resena);
  }else if($compro){
    contar($resena);
  }
})
