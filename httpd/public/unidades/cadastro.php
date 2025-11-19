<h5 class="card-title fw-semibold mb-4">Cadastro do Unidades<h5>

<form id="formUnidade" method="POST" enctype="multipart/form-data">
  
  <div class="mb-3">
    <label for="nom_unidade" class="form-label">Nome</label>
    <input type="input" class="form-control" maxlength='25' id="nom_unidade" name="nom_unidade" aria-describedby="unidadeAjuda" required>
    <div id="unidadeAjuda" class="form-text">Informe o nome da unidade.</div>
  </div>

  <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>

<script>
  $("form#formUnidade").submit(function(e) {
    
    e.preventDefault();
    
    var data = new FormData(this);
    
    $.ajax({
        url: "./unidades/controller.php",
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