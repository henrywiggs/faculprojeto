<?php
include_once("controller.php");

$pc = new PedidosController();
$pedidos = $pc->buscaValoresPedidos();
?>

<h1>Últimos Pedidos</h1>
<br>

<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Cód. Pedido</th>
            <th>Data</th>
            <th>Cliente</th>
            <th>Valor do Pedido</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($pedidos as $pedido){ ?>
            <tr>
                <td><?= $pedido->cod_pedido ?></td>
                <td><?= $pedido->data_pedido ?></td>
                <td><?= $pedido->nomeCliente ?></td>
                <td>R$ <?= number_format($pedido->valor_pedido, 2, ',', '.') ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>