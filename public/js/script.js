$(document).ready(function(){
    $(".navbar-toggle").click(function(){
        $(".menu").toggleClass("menu-open");
    })
});




/*
var lista2 = {
    'init': function()
    {
        this.form = document.getElementById('form2');
        this.tab = document.getElementById('etapa3');
    },
    
    'insere': function()
    {
        var novoForm = this.form.cloneNode(true);
        novoForm.style.display = '';
        console.log('novoForm => ', novoForm);
        this.tab.appendChild(novoForm);
    },
    
    'remove': function(el)
    {
        el.parentNode.removeChild(el);
    }
};

lista2.init();


var lista = {
    'init': function()
    {
        this.form = document.getElementById('form');
        this.tab = document.getElementById('etapa2');
    },
    
    'insere': function()
    {
        var novoForm = this.form.cloneNode(true);
        novoForm.style.display = '';
        console.log('novoForm => ', novoForm);
        this.tab.appendChild(novoForm);
    },
    
    'remove': function(el)
    {
        el.parentNode.removeChild(el);
    }
};
lista.init();
*/



