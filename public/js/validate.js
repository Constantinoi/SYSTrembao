/*(function ($) {
    var $form = $("main form");

    $form.on("submit", function (e) {
        e.preventDefault();

        return false;
    });

    $form.validate({
        errorClass: "input-error",
        errorElement: "em",
        submitHandler: function (e) {

            $.ajax({
                url: $form.attr("action"),
                type: "POST",
                data: new FormData($form[0]),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    var main = $("main");

                    main.find(".alert").remove();

                    if (!data.hasOwnProperty("code") || !data.hasOwnProperty("message")) {
                        main.prepend(
                            '<div class="alert alert-danger" role="alert">Ocorreu um erro inesperado.</div>');
                    } else {
                        main.prepend(
                            '<div class="alert alert-' + ((data.code === 200) ? 'success' : 'danger') + '" role="alert">' + data.message + '</div>');

                        if(data.code === 200){
                            $("main form").remove();
                        }
                    }

                    $("html, body").animate({scrollTop: 0}, "slow");
                }
            });

            return false;
        }
    });
})(jQuery);
*/

function getId(id) {
  
  //$("#seletivo").attr("#seletivo",id);
  $("#forme").attr("action",'/inscricao/'+id+'');
  
}





function alteraEtapa(etapa){
    $('#tabEtapas a[href="#etapa'+etapa+']"').tab('show');
  }
  
  

  function validaFormulario(){
    let nome = $('#nome').val();
    let email = $('#email').val();
    let cpf  = $('#cpf').val();
    let rg = $('#rg').val();   
    let sexo = $('#sexo').val();
    let data_nascimento = $('#data_nascimento').val();    
    let cor_raca = $('#cor_raca').val();
    let naturalidade = $('#naturalidade').val();
    let nacionalidade = $('#nacionalidade').val();
    let idade = $('#idade').val();
    let cidade = $('#cidade').val();
    let uf = $('#uf').val();
    let cep = $('#cep').val();
    let bairro = $('#bairro').val();
    let logradouro = $('#logradouro').val();
    let numero = $('#numero').val();
    let complemento = $('#complemento').val();
        /*
   

    let tipo= $('#').val();
    let instituicao = $('#').val();
    let nome_curso = $('#').val();
    let ano_conclusao = $('#').val();
*/
    if(nome == ''){
      alteraEtapa(1);
      $('#nome').focus();
      $('#nome').tooltip('show');
      setTimeout(function () {
        $('#nome').tooltip('destroy');
      }, 3000);
      return;
    }
    if(email == ''){
      alteraEtapa(1);
      $('#email').focus();
      $('#email').tooltip('show');
      setTimeout(function () {
        $('#email').tooltip('destroy');
      }, 3000);
      return;
    }
    if(cpf == ''){
        alteraEtapa(1);
        $('#cpf').focus();
        $('#cpf').tooltip('show');
        setTimeout(function () {
          $('#cpf').tooltip('destroy');
        }, 3000);
        return;
      }
      if(rg == ''){
        alteraEtapa(1);
        $('#rg').focus();
        $('#rg').tooltip('show');
        setTimeout(function () {
          $('#rg').tooltip('destroy');
        }, 3000);
        return;
      }
      if(sexo == ''){
        alteraEtapa(1);
        $('#sexo').focus();
        $('#sexo').tooltip('show');
        setTimeout(function () {
          $('#sexo').tooltip('destroy');
        }, 3000);
        return;
      }
      if(data_nascimento == ''){
        alteraEtapa(1);
        $('#data_nascimento').focus();
        $('#data_nascimento').tooltip('show');
        setTimeout(function () {
          $('#data_nascimento').tooltip('destroy');
        }, 3000);
        return;
      }
      if(estado_civil == ''){
        alteraEtapa(1);
        $('#estado_civil').focus();
        $('#estado_civil').tooltip('show');
        setTimeout(function () {
          $('#estado_civil').tooltip('destroy');
        }, 3000);
        return;
      }
      if(cor_raca == ''){
        alteraEtapa(1);
        $('#cor_raca').focus();
        $('#cor_raca').tooltip('show');
        setTimeout(function () {
          $('#cor_raca').tooltip('destroy');
        }, 3000);
        return;
      }
      if(naturalidade == ''){
        alteraEtapa(1);
        $('#naturalidade').focus();
        $('#naturalidade').tooltip('show');
        setTimeout(function () {
          $('#naturalidade').tooltip('destroy');
        }, 3000);
        return;
      }
      if(nacionalidade == ''){
        alteraEtapa(1);
        $('#nacionalidade').focus();
        $('#nacionalidade').tooltip('show');
        setTimeout(function () {
          $('#nacionalidade').tooltip('destroy');
        }, 3000);
        return;
      }
      if(idade == ''){
        alteraEtapa(1);
        $('#idade').focus();
        $('#idade').tooltip('show');
        setTimeout(function () {
          $('#idade').tooltip('destroy');
        }, 3000);
        return;
      }
      if(cidade == ''){
        alteraEtapa(1);
        $('#cidade').focus();
        $('#cidade').tooltip('show');
        setTimeout(function () {
          $('#').tooltip('destroy');
        }, 3000);
        return;
      }
      if(uf == ''){
        alteraEtapa(1);
        $('#uf').focus();
        $('#uf').tooltip('show');
        setTimeout(function () {
          $('#uf').tooltip('destroy');
        }, 3000);
        return;
      }
      if(cep == ''){
        alteraEtapa(1);
        $('#cep').focus();
        $('#cep').tooltip('show');
        setTimeout(function () {
          $('#cep').tooltip('destroy');
        }, 3000);
        return;
      }
      if(bairro == ''){
        alteraEtapa(1);
        $('#bairro').focus();
        $('#bairro').tooltip('show');
        setTimeout(function () {
          $('#bairro').tooltip('destroy');
        }, 3000);
        return;
      }
      if(logradouro == ''){
        alteraEtapa(1);
        $('#logradouro').focus();
        $('#logradouro').tooltip('show');
        setTimeout(function () {
          $('#logradouro').tooltip('destroy');
        }, 3000);
        return;
      }
      if(num == ''){
        alteraEtapa(1);
        $('#num').focus();
        $('#num').tooltip('show');
        setTimeout(function () {
          $('#num').tooltip('destroy');
        }, 3000);
        return;
      }
      if(complemento == ''){
        alteraEtapa(1);
        $('#complemento').focus();
        $('#complemento').tooltip('show');
        setTimeout(function () {
          $('#complemento').tooltip('destroy');
        }, 3000);
        return;
      }

   
  
    console.log(nome,email,cpf,rg,sexo,data_nascimento,estado_civil,
    naturalidade,nacionalidade,idade,cidade,uf,cep,bairro,logradouro,num
    ,complemento,id);
  }
 