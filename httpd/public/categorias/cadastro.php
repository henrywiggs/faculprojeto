<h5 class="card-title fw-semibold mb-4">Cadastro do Categoria<h5>

<form id="formCategoria" method="POST" enctype="multipart/form-data">
  
  <div class="mb-3">
    <label for="nom_categoria" class="form-label">Nome</label>
    <input type="input" class="form-control" maxlength='25' id="nom_categoria" name="nom_categoria" aria-describedby="categoriaAjuda" required>
    <div id="categoriaAjuda" class="form-text">Informe o nome da categoria.</div>
  </div>

  <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>

<script>
  $("form#formCategoria").submit(function(e) {
    
    e.preventDefault();
    
    var data = new FormData(this);
    
    $.ajax({
        url: "./categorias/controller.php",
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