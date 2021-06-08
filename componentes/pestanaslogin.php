<?php
if(isset($_COOKIE["Usuario"])){
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    </head>
    <body>
        <div class="row login-container">
            <?php if (isset($mensajeError)) { ?>
                <div  class="alert alert-danger" role="alert"><?=$mensajeError?></div>
            <?php } ?>
            <div class="form-box">
                <form id="resetForm" action="<?php echo htmlspecialchars('login.php');?>" method="POST">
                    <button name="Salir" class="btn btn-warning btn-block Salir" type="submit">Cerrar Sesión</button>
                </form> 
            </div>
        </div>
    </body>
    </html>
    <?php
}else{
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    </head>
    <body>
        <div class="row">
            <div class="col-md-12 login-form-header">
                <p class="login-form-font-header">Iniciar Sesión</span><p>
            </div>
        </div>
        <div class="row login-container">
            <?php if (isset($mensajeError)) { ?>
                    <div  class="alert alert-danger" role="alert"><?=$mensajeError?></div>
            <?php } ?>
            <div class="form-box">
                <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                    <input name="usuario" type="text" placeholder="usuario" autofocus>
                    <input type="password" name="contra" placeholder="contraseña">
                    <button name="iniciar" class="btn btn-info btn-block login" type="submit">Login</button>
                    <button name="registrarse" class="btn btn-info btn-block login" type="submit">Registrarse</button>
                </form>
            </div>
        </div>
    </body>
    </html>
<?php
}
?>