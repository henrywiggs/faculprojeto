<?php
foreach($res as $obj ){   
?>
<tr>
    <th scope="row"><?=$cont?></th>
    <td><?=$obj->nom_categoria?></td>
</tr>
<?php
    $cont++;
}
?>