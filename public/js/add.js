

    /*
    
    
    var nome_empresaValidador = {
        row: '.form-group col-md-6',   // The title is placed inside a <div class="form-group col-md-6"> element
        validators: {
            notEmpty: {
                message: 'Informe o nome da Empresa'
            }
        }
    },
    data_inicioValidador  = {
        row: '.form-group col-md-6',
        validators: {
            notEmpty: {
                message: 'Informe uma data'
            },
            date: {
                message: 'Informe uma data'
            }
        }
    },
    data_fimValidador = {
        row: '.form-group col-md-6',
        validators: {
            notEmpty: {
                message: 'Informe uma data'
            },
            date: {
                message: 'Informe uma data'
            }
        }
    },
   cargoValidador = {
        row: '.form-group col-md-6',
        validators: {
            notEmpty: {
                message: 'Informe o cargo'
            },
            text:{
                    message: 'Somente texto'
            }
        }
    },
   descricaoValidador = {
        row: '.form-group col-md-6',
        validators: {
            notEmpty: {
                message: 'Informe a descrição'
            }
            ,text:{
                message: 'Somente texto'
        }
        }
    },
    ;
   


    $('#form')//click (function(e) {
        
        .formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                'experiencias[0][nome_empresa]': nome_empresaValidador,
                'experiencias[0][data_inicio]': data_inicioValidador,
                'experiencias[0][data_fim]': data_fimValidador,
                'experiencias[0][cargo]': cargoValidador,
                'experiencias[0][descricao]': descricaoValidador,
            }
        })

        on('click', '.#add_field', function() {
            x=0;
            x++;
            var $template = $('#experienciaTemplate'),
                $clone    = $template
                                .clone()
                                .removeClass('hide')
                                .removeAttr('id')
                                .attr('data-x', x) 
                                .insertBefore($template);
                                
            // Update the name attributes
            $clone          
                .find('[name="nome_empresa"]').attr('name', 'experiencias[' + x + '][nome_empresa]').end()
                .find('[name="data_inicio"]').attr('name', 'experiencias[' + x + '][data_inicio]').end()
                .find('[name="data_fim"]').attr('name', 'experiencias[' + x + '][data_fim]').end()
                .find('[name="cargo"]').attr('name', 'experiencias[' + x + '][cargo]').end()
                .find('[name="descricao"]').attr('name', 'experiencias[' + x + '][descricao]').end();

            // Add new fields
            // Note that we also pass the validator rules for new field as the third parameter
            $('#form')
                .formValidation('addField', 'experiencias[' + x + '][nome_empresa]',nome_empresaValidador)
                .formValidation('addField', 'experiencias[' + x + '][data_inicio]',data_inicioValidador)
                .formValidation('addField', 'experiencias[' + x + '][data_fim]',data_fimValidador)
                .formValidation('addField', 'experiencias[' + x + '][cargo]',cargoValidador )
                .formValidation('addField', 'experiencias[' + x + '][descricao]',descricaoValidador );
        })

        // Remove button click handler
        .on('click', '.remover_campo', function() {
            var $row  = $(this).parents('.form-group'),
                index = $row.attr('data-book-index');

            // Remove fields
            $('#form')
                .formValidation('removeField', $row.find('[name="experiencias[' + x + '][nome_empresa]"]'))
                .formValidation('removeField', $row.find('[name="experiencias[' + x + '][data_inicio]"]'))
                .formValidation('removeField', $row.find('[name="experiencias[' + x + '][data_fim]"]'))
                .formValidation('removeField', $row.find('[name="experiencias[' + x + '][cargo]"]'))
                .formValidation('removeField', $row.find('[name="experiencias[' + x + '][descricao]"]'));

            // Remove element containing the fields
            $row.remove();
        });

        */
        $(document).ready(function() {
            var campos_max = 10;   //max de 10 campos 
            var x = 1; // campos iniciais    
        $('#add_field').click (function(e) {      

            e.preventDefault();     //prevenir novos clicks
           
            if (x < campos_max) {
               //if(validaForm(x)){
                        $('#form').append('<div class="form-group col-md-6">\
                        <hr>\
                        <div class="form-group {{$errors->has("experiencias['+x+'][nome_empresa]")  ? "has-error": ""}}">\
                        <label>Nome empresa</label>\
                        <input   placeholder="Nome da empresa" type="text" class="form-control" id="nome_empresa" name="experiencias['+x+'][nome_empresa]" >\
                        </div>\
                        <div class="form-group {{$errors->has("experiencias['+x+'][nome_empresa]")  ? "has-error": ""}}">\
                        <label>Data de Ínicio</label>\
                        <input  placeholder="Data de início" type="date" class="form-control" id="data_inicio" name="experiencias['+x+'][data_inicio]" >\
                        </div>\
                        <div class="form-group {{$errors->has("experiencias['+x+'][nome_empresa]")  ? "has-error": ""}}">\
                        <label>Data de Término</label>\
                        <input  placeholder="Data término" type="date" class="form-control" id="data_fim" name="experiencias['+x+'][data_fim]"  >\
                        </div>\
                        <div class="form-group {{$errors->has("experiencias['+x+'][nome_empresa]")  ? "has-error": ""}}">\
                        <label>Cargo</label>\
                        <input  placeholder="Cargo" type="text" class="form-control" id="cargo"   name="experiencias['+x+'][cargo]" >\
                        </div>\
                        <div class="form-group {{$errors->has("experiencias['+x+'][nome_empresa]")  ? "has-error": ""}}">\
                        <label>Descrição</label>\
                        <textarea  placeholder="Descrição" class="form-control" id="descricao"  rows="3"  name="experiencias['+x+'][descricao]"  ></textarea>\
                        </div>\
                        <hr>\
                        <button id="remover_campo"   class="btn btn-danger"> Remover</button>\
                        </div>');
                        x++;   
               }
             
            
        }); 
    // Remover o div anterior
    $('#form').on("click","#remover_campo",function(e) {
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
    });

});  



function validaExp(){
        indice = x;
        indice = indice -1;
        let nome_empresa = $('#experiencias['+indice+'][nome_empresa]').val();
        let data_inicio = $('#experiencias['+indice+'][data_inicio]').val();
        let data_fim = $('#experiencias['+indice+'][data_fim]').val();
        let cargo = $('#experiencias['+indice+'][cargo]').val();
        let descricao = $('#experiencias['+indice+'][descricao]').val();


        if(nome_empresa == ''){
                alteraEtapa(1);
                $('#nome_empresa').focus();
                $('#nome_empresa').tooltip('show');
                setTimeout(function () {
                  $('#nome_empresa').tooltip('destroy');
                }, 3000);
                return false;
        }
        if(data_inicio == ''){
                alteraEtapa(1);
                $('#data_inicio').focus();
                $('#data_inicio').tooltip('show');
                setTimeout(function () {
                  $('#data_inicio').tooltip('destroy');
                }, 3000);
                return false;
        }
        if(data_fim == ''){
                alteraEtapa(1);
                $('#data_fim').focus();
                $('#data_fim').tooltip('show');
                setTimeout(function () {
                  $('#data_fim').tooltip('destroy');
                }, 3000);
                return false;
        }
        if(cargo == ''){
                alteraEtapa(1);
                $('#cargo').focus();
                $('#cargo').tooltip('show');
                setTimeout(function () {
                  $('#cargo').tooltip('destroy');
                }, 3000);
                return false;
        }
        if(descricao == ''){
                alteraEtapa(1);
                $('#descricao').focus();
                $('#descricao').tooltip('show');
                setTimeout(function () {
                  $('#descricao').tooltip('destroy');
                }, 3000);
                return false;
        }
        return true;
}
