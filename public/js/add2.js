$(document).ready(function() {
    var campos_max = 10;  //max de 10 campos
    var x = 0; // campos iniciais
    var y = 1;
    var button = $('#add_field_edit');

    if (button.attr('data-contador') > 0) {
        y += parseInt(button.attr('data-contador'));
        }
    
    //alert(y);

    // CREATE------------------
    $('#add_field2').click (function(e) {
            e.preventDefault();     //prevenir novos clicks
            if (x < campos_max) {
                    
                    $('#form2').append('<div class="form-group col-md-6">\
                             <hr>\
                             <div class="form-group {{$errors->has("formacoes['+x+'][tipo]")  ? "has-error": ""}}">\
                             <label>Formação/Curso</label>\
                             <select class="form-control" id="tipo" name="formacoes['+x+'][tipo]">\
                                    <option value"">Selecione</option>\
                                    <option value"Curso de Capacitação">Curso de Capacitação</option>\
                                    <option value"Doutorado Completo">Doutorado Completo</option>\
                                    <option value"Doutorado Incompleto">Doutorado Incompleto</option>\
                                    <option value"Mestrado Completo">Mestrado Completo</option>\
                                    <option value="Mestrado Incompleto">Mestrado Incompleto</option>\
                                    <option value="Pós-Graduação Completa">Pós-Graduação Completa</option>\
                                    <option value="Pós-Graduação Incompleta">Pós-Graduação Incompleta</option>\
                                    <option value="Graduação Completa">Graduação Completa</option>\
                                    <option value="Graduação Incompleta">Graduação Incompleta</option>\
                                    <option value="Ensino Médio Completo">Ensino Médio Completo</option>\
                                    <option value="Ensino Médio Incompleto">Ensino Médio Incompleto</option>\
                                    <option value="Ensino Médio Técnico">Ensino Médio Técnico</option>\
                                    <option value="Ensino Fundamental Completo">Ensino Fundamental Completo</option>\
                                    <option value="Ensino Fundamental Incompleto">Ensino Fundamental Incompleto</option>\
                             </select>\
                             </div>\
                             <div class="form-group {{$errors->has("formacoes['+x+'][instituicao]")  ? "has-error": ""}}">\
                             <label>Instituição</label>\
                             <input class="form-control"  placeholder="Nome da Instituição" type="text" id="instituicao"  name="formacoes['+x+'][instituicao]">\
                             </div>\
                             <div class="form-group {{$errors->has("formacoes['+x+'][nome_curso]")  ? "has-error": ""}}">\
                             <label>Nome do Curso</label>\
                             <input class="form-control"  placeholder="Digite o curso" type="text"  id="nome_curso"  name="formacoes['+x+'][nome_curso]"  >\
                             </div>\
                             <div class="form-group {{$errors->has("formacoes['+x+'][ano_conclusao]")  ? "has-error": ""}}">\
                             <label>Ano de Conclusão</label>\
                             <input  class="form-control" placeholder="Ano de conclusão" type="date"  id="ano_conclusao"    name="formacoes['+x+'][ano_conclusao]" >\
                             </div>\
                             <br>\
                             <button id="remover_campo"   class="btn btn-danger"> Remover</button>\
                             </div>');
                    x++;
            }
    });
    $('#form2').on("click","#remover_campo",function(e) {
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
});

        // END CREATE
               //EDIT      

        button.click (function(e) {
                e.preventDefault();     //prevenir novos clicks              
                if (y < campos_max) {           
                        
                        $('#formEdit').append('<div id="cont" value="'+y+'" class="form-group col-md-6">\
                                <hr>\
                                <div class="form-group {{$errors->has("formacoes['+y+'][tipo]")  ? "has-error": ""}}">\
                                <label>Formação/Curso</label>\
                                <select class="form-control" id="tipo" name="formacoes['+y+'][tipo]">\
                                        <option value"">Selecione</option>\
                                        <option value"Curso de Capacitação">Curso de Capacitação</option>\
                                        <option value"Doutorado Completo">Doutorado Completo</option>\
                                        <option value"Doutorado Incompleto">Doutorado Incompleto</option>\
                                        <option value"Mestrado Completo">Mestrado Completo</option>\
                                        <option value="Mestrado Incompleto">Mestrado Incompleto</option>\
                                        <option value="Pós-Graduação Completa">Pós-Graduação Completa</option>\
                                        <option value="Pós-Graduação Incompleta">Pós-Graduação Incompleta</option>\
                                        <option value="Graduação Completa">Graduação Completa</option>\
                                        <option value="Graduação Incompleta">Graduação Incompleta</option>\
                                        <option value="Ensino Médio Completo">Ensino Médio Completo</option>\
                                        <option value="Ensino Médio Incompleto">Ensino Médio Incompleto</option>\
                                        <option value="Ensino Médio Técnico">Ensino Médio Técnico</option>\
                                        <option value="Ensino Fundamental Completo">Ensino Fundamental Completo</option>\
                                        <option value="Ensino Fundamental Incompleto">Ensino Fundamental Incompleto</option>\
                                </select>\
                                </div>\
                                <div class="form-group {{$errors->has("formacoes['+y+'][instituicao]")  ? "has-error": ""}}">\
                                <label>Instituição</label>\
                                <input class="form-control"  placeholder="Nome da Instituição" type="text" id="instituicao"  name="formacoes['+y+'][instituicao]">\
                                </div>\
                                <div class="form-group {{$errors->has("formacoes['+y+'][nome_curso]")  ? "has-error": ""}}">\
                                <label>Nome do Curso</label>\
                                <input class="form-control"  placeholder="Digite o curso" type="text"  id="nome_curso"  name="formacoes['+y+'][nome_curso]"  >\
                                </div>\
                                <div class="form-group {{$errors->has("formacoes['+y+'][ano_conclusao]")  ? "has-error": ""}}">\
                                <label>Ano de Conclusão</label>\
                                <input  class="form-control" placeholder="Ano de conclusão" type="date"  id="ano_conclusao"    name="formacoes['+y+'][ano_conclusao]" >\
                                </div>\
                                <br>\
                                <button id="remover_campo"   class="btn btn-danger"> Remover</button>\
                                </div>');
                                y++;
                                
                }
        });

        //END EDIT

    // Remover o div anterior
   



    
});


    
