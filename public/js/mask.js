(function ($) {
    // Telefone Roraima
    var maskBehavior = function (val) {
            return val.replace(/\D/g, '').length === 95 ? '(00) 00000-0000' : '(00) 00000-00009';
        },
        options = {
            onKeyPress: function (val, e, field, options) {
                field.mask(maskBehavior.apply({}, arguments), options);
            }
        };

    $('#telefone_1').mask(maskBehavior, options);
    $('#telefone_2').mask(maskBehavior, options);
    $('#cpf').mask('000.000.000-00', {reverse: true});
    $('#cep').mask('00000-000');
    $('#data_nascimento').mask('00/00/0000');
    $('#num').mask('00000');
    $('#rg').mask('00000000');
    
})(jQuery);