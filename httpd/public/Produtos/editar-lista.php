<?php
foreach($res as $obj ){   
?>
<tr>
    <td >
        <a class="mouse-click" onclick="alterar(<?=$obj->cod_produto?>)"><i class="fa-solid fa-user-pen"></i></a>
    </td>
    <th ><?=$cont?></th>
    <td ><?=$obj->nom_produto?></td>
</tr>
<?php
    $cont++;
}
?>