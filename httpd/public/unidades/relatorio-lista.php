<?php
foreach($res as $obj ){   
?>
<tr>
    <th scope="row"><?=$cont?></th>
    <td><?=$obj->nom_unidade?></td>
</tr>
<?php
    $cont++;
}
?>