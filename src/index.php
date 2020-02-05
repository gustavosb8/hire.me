<?php require_once('fragments/header.php'); ?>

<main>
  <section id="urlbox" class="boxes">
    <h1>Cole a URL a ser encolhida</h1>
    <form id="form">
      <div id="formurl">
        <input id="url" type="text" name="url" placeholder="Digite o link aqui">
        <input id="alias" type="text" name="alias" placeholder="Digite o alias, se houver">

        <br><br>

        <div>
          <input id="enviar" type="button" value="Enviar">
        </div>
      </div>
    </form>    
    <p class="boxtextcenter">Ferramenta desenvolvida para teste realizado pelo Digital Lab para vaga de Desenvolvedor Pleno. Com a Shorturl.io é possível encurtar urls/links para ser utilizado posteriormente ou simplesmente recrutar o desenvolvedor que a desenvolveu para o time de feras do Digital Lab.</p>
  </section>

  <section id="shortenurlbox" class="boxes">
    <h1>Aqui está url encolhida, como prometido...</h1>
    <div id="formurl" style="max-width: 400px;">

      <input id="shortenedurl" type="text" value="" onclick="if (!window.__cfRLUnblockHandlers) return false; this.select();" data-cf-modified-b0eb5000c0afb5563ec9ef7e-="">
      <div id="formbutton">
        <input id="btnCopiar" type="button" data-clipboard-target="#shortenedurl" class="copy" value="Copy URL">
      </div>


    </div>

    <h4 id="timetaken" class="boxtextcenter"></h4>

    <p class="boxtextcenter">Ferramenta desenvolvida para teste realizado pelo Digital Lab para vaga de Desenvolvedor Pleno. Com a Shorturl.io é possível encurtar urls/links para ser utilizado posteriormente ou simplesmente recrutar o desenvolvedor que a desenvolveu para o time de feras do Digital Lab.</p>

    <a href="" class="colorbutton">Voltar</a>
  </section>

  <section id="funcionalidades" class="boxes">   
    <h2>Outras Funcionalidades</h2>
    <br>
    <a href="ranking" class="colorbutton">Links mais encurtados</a>

  </section>

</main>

<script type="text/javascript">

  $(document).ready(function(){

    $('#shortenurlbox').hide();

    $('#enviar').click(function(){

      var url = $('#url').val();
      var alias = $('#alias').val();


      if(url != ""){
        $.ajax({
          type: 'PUT',
          dataType: 'text',
          url: "https://shorturlio.herokuapp.com/create",
          data: JSON.stringify({"url": url, "CUSTOM_ALIAS": alias, "time": Math.floor(+new Date() / 1000)}), // dados que são necessários para o backend receber as informações. time para o timestamp unix timestamp
          complete: function() {
            //alert('Complete');
          },
          success: function(data, msg) {
            
            //console.log(data);
            
            
            var obj = (jQuery.parseJSON(data));

            if(typeof obj.ERR_CODE === "undefined"){

              $('#urlbox').hide();
              $('#shortenurlbox').show();

              $('#shortenedurl').val(obj.url);
              $('#timetaken').text("... E demorou só "+obj.statistics.time_taken+" ms");
            }else{
              $('#urlbox').hide();
              $('#shortenurlbox').show();

              $('#shortenedurl').val(obj.url);
              $('#timetaken').text("... Seu alias já exitia :P");
            }

            
            
            

          },
          error: function(xhr,er) {
            console.log(xhr);
            console.log(er);
          }
        }); 


      }else{
        alert("Digite uma url para continuar");
      }
    });

    $('#btnCopiar').click(function(){
      
      var $temp = $("<input>");
      $("body").append($temp);
      $temp.val($('#shortenedurl').val()).select();
      document.execCommand("copy");
      $temp.remove();
    });

  });


</script>

<?php require_once('fragments/footer.php'); ?>
