<?php
//Datos de conexión
$_GET['display'] = "asf";
include("conectarwol.php");
$conexion = new mysqli($mysql_host,$mysql_user,$mysql_password,$mysql_database) or die ("Imposible conectarse, intentalo más tarde");
//Recuperamos variables
$nombre_usuario = $_POST['nombre_usuario'];
//Consulta
$query = "Select * from usuario where usuario_nombre ='$nombre_usuario'";
$resultado = $conexion->query($query);
while ($row = $resultado->fetch_object()) {
    $usuario_rol = $rol_confirmed;
    if ($row->usuario_status == "ACTIVO") {
        $act = "INACTIVO";
    } else {
        $act = "ACTIVO";
    }

    if ($rol_confirmed == "WEBMASTER") {
        printUser($row);
        echo "<input type='submit' value='Cambiar estado a: $act' onclick='cambiar_status_usuario(event,".'"'.$nombre_usuario.'"'.",".'"'.$act.'"'.");'>";
        echo "<input type='submit' value='Borrar' onclick='borrar_usuario(event,".'"'.$nombre_usuario.'"'.");'>";
    } else {
        if ($rol_confirmed == 'MODOP') {
            printUser($row);
            echo "<input type='submit' value='Borrar' onclick='borrar_usuario(event,".'"'.$nombre_usuario.'"'.");'>";
        } else {
            if ($rol_confirmed == 'ADMINISTRADOR') {
                printUser($row);
                echo "<input type='submit' value='Cambiar estado a: $act' onclick='cambiar_status_usuario(event,".'"'.$nombre_usuario.'"'.",".'"'.$act.'"'.");'>";
                echo "<input type='submit' value='Borrar' onclick='borrar_usuario(event,".'"'.$nombre_usuario.'"'.");'>";
            }else{
                printUser($row);
            }
        }
    }
}
function printUser($row){
    echo "<table>";
        //ID
        echo "<tr>";            
            echo "<td>ID</td>";
            echo "<td><input type='text' value='".$row->usuario_id."' readonly></td>";
        echo "</tr>";
        //Nombre
        echo "<tr>";
            echo "<td>Nombre</td>";
            echo "<td><input type='text' value='".$row->usuario_nombre."' readonly></td>";
        echo "</tr>";
        //Correo
        echo "<tr>";
            echo "<td>Correo</td>";
            echo "<td><input type='text' value='".$row->usuario_correo."' readonly></td>";
        echo "</tr>";
        //Edad
        echo "<tr>";
            echo "<td>Edad</td>";
            echo "<td><input type='text' value='".$row->usuario_edad."' readonly></td>";
        echo "</tr>";
        //Estado
        echo "<tr>";
            echo "<td>Estado</td>";
            echo "<td><input type='text' value='".$row->usuario_status."' readonly></td>";
        echo "</tr>";
        //Fecha registro
        echo "<tr>";
            echo "<td>Fecha de registro</td>";
            echo "<td><input type='text' value='".$row->usuario_fecha_registro."' readonly></td>";
        echo "</tr>";
        //Rol
        echo "<tr>";
            echo "<td>Rol</td>";
            echo "<td><input type='text' value='".$row->usuario_rol."' readonly></td>";
        echo "</tr>";
    echo "</table>";
}
?>