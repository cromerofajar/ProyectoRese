<!DOCTYPE html><?php
  session_start();
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Kabanino Games</title>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel='icon' href='imagenes/icono.png' type='image/x-icon' sizes="16x16"/>
        <script src="./componentes/botones.js"></script>
    </head>
    <body>
      <div class="container">
        <header>
            <div><img id="imagenLogo" src="imagenes/kabaninoGames.png"></div>
        </header>
        <div id="menu">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="#">Inicio<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Login
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <form method="post"> 			
                            <?php
                              include_once("login.php");
                            ?>
                       </form>
                    </div>
                </li>
                <?php
                  include_once("componentes/pestanasnuevas.php");
                  if(isset($_COOKIE["Usuario"])){
                    if($_SESSION["Rango"]==1 && $_SESSION["Usuario"]==$_COOKIE["Usuario"]){
                ?>
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Admin
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <form method="post">
                        <button class="btn btn-info btn-block" type="button" id="AnadirJuego">Nuevo juego</button>
                        <button class="btn btn-info btn-block" type="button" id="ModificarJuego">Modificar juego</button>
                        <button class="btn btn-info btn-block" type="button" id="EliminarJuego">Eliminar juego</button>
                        <button class="btn btn-info btn-block" type="button" id="EliminarResena">Eliminar Reseña</button>
                        </form>
                    </div>
                </li>
                <?php
                  }}
                ?>
              </ul>
            </div> 
          </nav>
          <div>
              <div class="card" id="cartaResenas">
                    <h1 id="tituloResena">Seleccione una reseña para poder verla</h1>
                    <h3 id="tituloJuego"></h3>
                    <p id="resena"></p>
                    <p id="nombreUsuRese"></p>
              </div>
           </div>
        </div>
      </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>