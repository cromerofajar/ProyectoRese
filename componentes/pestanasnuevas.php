<?php
require_once("resenasDB.php");
?>
<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    </head>
    <body>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Juegos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <form method="post" id="juegosVisibles"> 			
                  <?php
                  resenasDB::buscarJuegos();
                  ?>
            </form>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Reseñas
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <form method="post" id="juegosVisibles"> 			
                  <?php
                  resenasDB::buscarResenas();
                  ?>
            </form>
        </div>
    </li>
    </body>
    </html>
    
<?php
?>