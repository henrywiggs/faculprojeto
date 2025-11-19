<?php
  include_once("../../Config/conexao.php");
  include_once("../../Controller/Clientes-Controller.php");
  include_once("../../Controller/Produtos-Controller.php");

  $uc = new ClientesController();
  $clientes = $uc->buscaTodos();
   $pc = new ProdutosController();
  $produtos = $pc->buscaTodos();
?>

<h5 class="card-title fw-semibold mb-4">Fazer pedido</h5>

<form id="formPedido" method="POST" enctype="multipart/form-data">
  
  <label for="codigoCliente">Cliente</label><br>
  <select id="codigoCliente" name="codigoCliente" required>
      <option value="" disabled selected>Selecione uma opção</option>

      <?php foreach($clientes as $cliente){ ?>
          <option value=<?= $cliente->codigoCliente ?>>
              <?= $cliente->nomeCliente ?>
          </option>
      <?php } ?>

  </select>
  <br><br>

 <table style="border-collapse: collapse; width: 100%;">
    <thead>
        <tr>
            <th style="border: 1px solid #000; padding: 6px; width: 80px;">Código</th>
            <th style="border: 1px solid #000; padding: 6px; width: 300px;">Nome do Produto</th>
            <th style="border: 1px solid #000; padding: 6px; width: 120px;">Valor</th>
            <th style="border: 1px solid #000; padding: 6px; width: 120px;">Quantidade</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($produtos as $produto){ ?>
            <tr>
                <td style="border: 1px solid #000; padding: 6px;"><?= $produto->cod_produto ?></td>

                <td style="border: 1px solid #000; padding: 6px;">
                    <?= $produto->nom_produto ?>
                </td>

                <td style="border: 1px solid #000; padding: 6px;">
                    R$ <?= $produto->vlr_unitario ?>
                </td>

                <td style="border: 1px solid #000; padding: 6px; text-align: center;">
                    <input type="number" id="qtd_produto" name="qtd_produto[<?= $produto->cod_produto ?>]"  min="0" value="0" style="width: 60px;">
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>



   </br></br>

  <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>

<script>
  $("form#formPedido").submit(function(e) {
    
    e.preventDefault();
    
    var data = new FormData(this);
    
    $.ajax({
        url: "./pedidos/controller.php",
        type: "POST",
        data: data,
        mimeType: "multipart/form-data",
        contentType: false,
        cache: false,
        processData:false,
        beforeSend: function () {
                //Aqui adicionas o loader
                $('#corpo').html("<div class=\"text-center\"><div class=\"spinner-border\" role=\"status\"></div><div class=\"spinner-grow text-danger\" role=\"status\"></div></div>");
        },
        success: function(result){        
            $('#corpo').html(result);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $('#corpo').html(textStatus + errorThrown);
        }
    });
});
</script>