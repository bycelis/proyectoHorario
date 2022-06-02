<?php include ('login.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <title></title>
</head>
<body>
    <center>
        <div class="sectionlogin">
            <h1>login</h1>
            <center>
                <div class="sctionform">
                    <form  method="Post">
                        <input type="text" name="usuario" placeholder="usuario" values="" />
                        <br>
                        <input type="password" name="passwordd" placeholder="clave" values="" maxlength="30" />
                        <br>
                        <input type="submit" class="button" value="INGRESAR" />
                    </form>
                </div>
            </center>
        </div>
    </center>
</body>
</html>