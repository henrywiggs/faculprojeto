<?php
foreach($res as $obj ){   
?>
<tr>
    <td >
        <a class="mouse-click" onclick="remover(<?=$obj->cod_pedido?>)"><i class="fa-solid fa-trash"></i></a>
    </td>
    <th ><?=$cont?></th>
    <td ><?=$obj->cod_pedido?></td>
</tr>
<?php
    $cont++;
}
?>