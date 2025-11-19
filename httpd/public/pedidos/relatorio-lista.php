<?php
foreach($res as $obj ){   
?>
<tr>
    <th scope="row"><?=$cont?></th>
    <td><?=$obj->cod_pedido?></td>
</tr>
<?php
    $cont++;
}
?>