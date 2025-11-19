<?php
foreach($res as $obj ){   
?>
<tr>
    <td >
        <a class="mouse-click" onclick="remover(<?=$obj->cod_categoria?>,'<?=$obj->nom_categoria?>')"><i class="fa-solid fa-trash"></i></a>
    </td>
    <th ><?=$cont?></th>
    <td ><?=$obj->nom_categoria?></td>
</tr>
<?php
    $cont++;
}
?>