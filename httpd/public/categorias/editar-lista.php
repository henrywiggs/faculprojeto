<?php
foreach($res as $obj ){   
?>
<tr>
    <td >
        <a class="mouse-click" onclick="alterar(<?=$obj->cod_categoria?>)"><i class="fa-solid fa-user-pen"></i></a>
    </td>
    <th ><?=$cont?></th>
    <td ><?=$obj->nom_categoria?></td>
</tr>
<?php
    $cont++;
}
?>