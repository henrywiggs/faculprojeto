<?php
foreach($res as $obj ){   
?>
<tr>
    <td >
        <a class="mouse-click" onclick="remover(<?=$obj->cod_fornecedor?>,'<?=$obj->nom_fornecedor?>')"><i class="fa-solid fa-trash"></i></a>
    </td>
    <th ><?=$cont?></th>
    <td ><?=$obj->nom_fornecedor?></td>
</tr>
<?php
    $cont++;
}
?>