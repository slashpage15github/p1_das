<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Curriculum</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/miestilo.css'>
    <script src='js/validations.js'></script>
</head>
<body>
    <div id="container">
    <form name="forma" enctype="multipart/form-data" action="php/insertar.php" method="post" onsubmit="return valida_curriculum();">
        <h1>Ingreso de Curriculum</h1>
        <div id="row">
            <div class="col-25">
                <label for="nombre">Nombre:</label>
            </div> 
            <div class="col-75">   
                <input type="text" id="f_nom" name="f_nom" placeholder="Escriba Nombre">
            </div>
        </div>

        <div id="row">
            <div class="col-25">
                <label for="apellido">Apellido:</label>
            </div>
            <div class="col-75">
                <input type="text" id="f_ape" name="f_ape" placeholder="Escriba Apellido">
            </div>
        </div>

        <div id="row">
            <div class="col-25">
                <label for="contra">Contraseña:</label>
            </div>
            <div class="col-75size">
                <input type="password" id="f_pwd" name="f_pwd" placeholder="Escriba Contraseña">
            </div>
        </div> 
        
        <div id="row">
            <div class="col-25">
                <label for="contra">RFC:</label>
            </div>    
            <div class="col-75size">            
                <input type="text" id="f_rfc" name="f_rfc" placeholder="Escriba su RFC">
            </div>    
        </div>

        <div id="row">
            <div class="col-25">
                <label for="f_hombre">Genero:</label> 
            </div> 
            <div class="col-75">
                <span>Hombre</span>
                <input type="radio" id="f_genh" name="f_gen" value="H"><br>
                
                <span>Mujer</span>
                <input type="radio" id="f_genm" name="f_gen" value="M">
            </div> 
        </div>

        <div id="row">
            <div class="col-25">
                <label for="curri">Curriculum:</label>
            </div>            
            <div class="col-75">
                <input type="file" id="f_curri" name="f_curri">
            </div>
        </div>
    
        <div id="row">
            <div class="col-25">
                <label for="areade">Área de interes:</label>
            </div>
            <div class="col-75size">
                <select id="areade" name="areade">
                    <option value="0">Seleccione:</option>
                    <option value="1">Salud</option>
                    <option value="2">Informática</option>
                    <option value="3">Deportes</option>
                </select>
            </div>
        </div>

        <div id="row">
        <div class="col-25">
                <label for="suscribe">Suscribirme</label>
            </div>

        <div class="col-75check">
                <input type="checkbox" id="f_suscri" name="f_suscri" value="S" checked>
            </div>
        </div>

        <div id="row2">
            <input class="boton_menu" type="submit" value="Registrar">
            &nbsp;&nbsp;&nbsp;
            <input class="boton_menu" type="reset" value="Limpiar">
        </div>
    </form>
    </div><!-- end container -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>