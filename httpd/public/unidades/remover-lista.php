<?php
foreach($res as $obj ){   
?>
<tr>
    <td >
        <a class="mouse-click" onclick="remover(<?=$obj->cod_unidade?>,'<?=$obj->nom_unidade?>')"><i class="fa-solid fa-trash"></i></a>
    </td>
    <th ><?=$cont?></th>
    <td ><?=$obj->nom_unidade?></td>
</tr>
<?php
    $cont++;
}
?>