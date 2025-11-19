<?php
foreach($res as $obj ){   
?>
<tr>
    <td >
        <a class="mouse-click" onclick="remover(<?=$obj->cod_produto?>,'<?=$obj->nom_produto?>')"><i class="fa-solid fa-trash"></i></a>
    </td>
    <th ><?=$cont?></th>
    <td ><?=$obj->nom_produto?></td>
</tr>
<?php
    $cont++;
}
?>