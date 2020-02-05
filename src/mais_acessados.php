<?php require_once('fragments/header.php'); ?>

<link rel="stylesheet" type="text/css" href="resources/DataTables/datatables.min.css"/>

<script type="text/javascript" src="resources/DataTables/datatables.min.js"></script>

<main>
  <section id="urlbox">
    <h1>Ranking de Urls Mais Acessadas</h1>
    <table id="table_id"></table>

    <div>
      <button><a style="color: white" href="/">Voltar</a></button>
    </div>
    <p class="boxtextcenter">Ferramenta desenvolvida para teste realizado pelo Digital Lab para vaga de Desenvolvedor Pleno. Com a Shorturl.io é possível encurtar urls/links para ser utilizado posteriormente ou simplesmente recrutar o desenvolvedor que a desenvolveu para o time de feras do Digital Lab.</p>
  </section>


</main>

<script type="text/javascript">

  $(document).ready(function(){

    $.ajax({
          type: 'PUT', // Use POST with X-HTTP-Method-Override or a straight PUT if appropriate.
          dataType: 'text', // Set datatype - affects Accept header
          url: "https://shorturlio.herokuapp.com/retrieve", // A valid URL
          //contentType: 'application/json',
          //headers: {"X-HTTP-Method-Override": "PUT"}, // X-HTTP-Method-Override set to PUT.
          data: "buscatodos", // access in body, // Some data e.g. Valid JSON as a string
          complete: function() {
            //alert('Complete');
          },
          success: function(data, msg) {
            //console.log(data);

            var obj = (jQuery.parseJSON(data));

            var dataSet = new Array;
            if (!('error' in obj)) {
              $.each(obj, function (index, value) {
                var tempArray = new Array;
                for (var o in value) {
                  tempArray.push(value[o]);
                }
                dataSet.push(tempArray);
              })

              $('#table_id').DataTable({
                data: dataSet,
                columns: [
                { title: "Ranking" },
                { title: "Url" },
                { title: "Qtd" }
                ],
                "language": {
                    "sUrl": "resources/json/Portuguese-Brasil.json"
                }
              });
            }
            else {
              alert(obj.error);
            }
            
          },
          error: function(xhr,er) {
            console.log(xhr);
            console.log(er);
          }
        });
});


</script>

<?php require_once('fragments/footer.php'); ?>
