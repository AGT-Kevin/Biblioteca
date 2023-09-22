<?php
include('../conexion.php');
$dato = $_POST['dato'];

$consulta = "SELECT * FROM comentarios WHERE
    remitente LIKE '%$dato%' OR
    correo LIKE '%$dato%' OR
    mensaje LIKE '%$dato%' OR
    asunto LIKE '%$dato%' OR
    fecha LIKE '%$dato%'
    ORDER BY id_comentario ASC";

$registro = mysqli_query($con, $consulta);

echo '<table class="table table-striped table-condensed table-hover table-responsive" width="800">
    <tr>   
        <th width="100"></th>
        <th width="200">Remitente</th>
        <th width="200">Correo</th>
        <th width="400">Prestamo</th>
        <th width="200">Contacto</th>
        <th width="200">Fecha Envío</th>
        <th width="50">Opciones</th>
    </tr>';
if(mysqli_num_rows($registro) > 0){
    while($registro2 = mysqli_fetch_array($registro)){
        echo '<tr>
            <td></td>
            <td>'.$registro2['remitente'].'</td>
            <td>'.$registro2['correo'].'</td>
            <td>'.$registro2['mensaje'].'</td>
            <td>'.$registro2['asunto'].'</td>
            <td>'.$registro2['fecha'].'</td>
            <td>
                <a href="javascript:eliminarComentario('.$registro2['id_comentario'].');">
                <img src="../images/delete.png" width="15" height="15" alt="delete" title="Eliminar" /></a>
            </td>
        </tr>';
    }
}else{
    echo '<tr>
        <td colspan="6">No se encontraron resultados</td>
    </tr>';
}
echo '</table>';
?>
