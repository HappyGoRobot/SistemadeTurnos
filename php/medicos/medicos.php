<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Turnos</title>
    <link rel="stylesheet" href="../../styles.css?v=<?php echo time();?>">
    <script>
    function confirmar() {
        var resultado = confirm("¿Está seguro de querer eliminar este registro?");
        if(resultado == true) {
            return true;
        }
        else {
            event.preventDefault();
            location.reload();
        }
    }
    </script>
</head>
<body>
<!--<nav>
        <ul>
            <li>
                <a href="">Complete con sus Datos</a>
            </li>
            <li><a href="">Seleccione Especialidad</a></li>
            <li><a href="">Seleccione Turno Disponible</a></li>
            <li><a href="">Seleccione Obra Social</a></li>
        </ul>
    </nav>--->
    <a style="color: black; position: fixed; left: 1%; top: 2%; font-weight: bold; border: 3px solid #94ADD7; border-radius: 8px; background: rgb(148, 173, 215, 0.7); padding: 3px;" href="../administrador.php">VOLVER</a>
    <div align="center"><h1>ADMINISTRADOR DE: MÉDICOS</h1></div>

    <?php
    require_once("../../php/conectar.php");
    $peticion2 = mysqli_query($medicos, "SELECT * FROM medicos");

    echo '
    <div align="center">
    <div class="tabla">
    <div align="left"><div class="titulo">MÉDICOS</div></div>
    <table>
    <tr>
        <thead>
            <tr>
                <th>NOMBRE COMPLETO</th>
                <th>ESPECIALIDAD</th>
                <th>TELÉFONO</th>
                <th>DIRECCIÓN</th>
                <th><span style="color: green;">ACTUALIZAR</span></th>
                <th><span style="color: red;">ELIMINAR</span></th>
            </tr>
        </thead>
        <tbody>';
        if(mysqli_num_rows($peticion2) > 0){
            while($medicos = mysqli_fetch_assoc($peticion2)){
                echo '
                <tr>
                    <td>'.$medicos['NombreCompletoM'].'</td>
                    <td>'.$medicos['EspecialidadMedica'].'</td>
                    <td>'.$medicos['TelefonoContactoM'].'</td>
                    <td>'.$medicos['DireccionConsulta'].'</td>
                    <td><a class="actualizar" href="editar.php?ID_Medico='.$medicos['ID_Medico'].'&ncm='.$medicos['NombreCompletoM'].'&es='.$medicos['EspecialidadMedica'].'&tfc='.$medicos['TelefonoContactoM'].'&dc='.$medicos['DireccionConsulta'].'">ACTUALIZAR</a> ✔️</td>
                    <td><a class="eliminar" href="../eliminar.php?ID_Medico='.$medicos['ID_Medico'].'" onclick="confirmar();">ELIMINAR</a> ❌</td>
                </tr>';
            }
        }
        else {
            echo '<tr>
            <td colspan="6">No existen registros para mostrar.</td>
            </tr>';
        }
    echo '</tbody></table> <br><button><a href="php/agregarmedico.php">AGREGAR NUEVO MÉDICO</a></button></div>';
?>
<footer>Clínica &copy; <script>document.write(new Date().getFullYear())</script></footer>
</body>
</html>