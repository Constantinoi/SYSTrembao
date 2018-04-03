 // --------------------------- JS-functions  -------------------------------------------//

// obj JS com função que auto invoca
 var shoppingCart = (function() {

    // *************************** Private methods and properties ****************************** //  
    var cart = []; // array de carrinhos de compras
    
    //  descrição do objeto
    function Produto(id, nome, valor, qtd){    
        this.id = id;
        this.nome = nome;
        this.valor = valor;
        this.qtd = qtd;     
    };

    // salva o pedido caso o usuário saia da página
    function saveCart(){
        // parse JSON  to string
        localStorage.setItem("shoppingCart", JSON.stringify(cart));  
    };

    // pega o pedido do local storage e transforma em um Obj JS
    function loadCart(){
        // String  to JSON  
        this.cart = JSON.parse(localStorage.getItem("shoppingCart"));   
    };

    loadCart();
    // END*************************** Private methods and properties ******************************END //  
    
    // *************************** Public methods and properties ****************************** //  
   
    var obj = {};

    // add um produto
    obj.addProduto = function(id, nome, valor, qtd){     
        for(var i in cart){
            if(cart[i].nome === nome){   //não add produto se já existir um  igual no carrinho
                cart[i].qtd += qtd; // add à quantidade existente
                saveCart();
                return;
            }
        }
        var produto = new Produto(id, nome, valor, qtd);
        cart.push(produto); 
        saveCart();
    };

    // remover um produto do pedido    
    obj.removeProduto = function(nome){    
        for(var i in cart){
            if(cart[i].nome === nome){
                cart[i].qtd --;
                if(cart[i].qtd === 0){
                    cart.splice(i, 1); // remove da array quando a qtd chegar em zero | parametros ( index, quantidade )
                }
                break; 
            }
        }
        saveCart();
    };

    //remove um dado produto por completo do pedido
    obj.removeProdutoAll = function(nome){
        for(var i in cart){
            if(cart[i].nome === nome){
                cart.splice(i,1);
                break;
            }
        }
        saveCart();
    };

    // remove todos os produtos do carrinho
    obj.clearCart = function(){     
        cart=[]; // gg  ;)
        saveCart();
    };
    
    // retorna o número total de produtos
    obj.countCart = function(){    
        var totalCount = 0;
        for(var i in cart){
            totalCount += cart[i].qtd;
        }
        return totalCount;
    };

    // retorna o valor total de todos o produtos no carrinho
    obj.totalCost = function(){   
        var totalCost = 0;
        for(var i in cart){
            totalCost += (cart[i].valor  * cart[i].qtd);
        }
        return totalCost.toFixed(2);
    };
    
    // retorna o valor total de um dado produto dentro do carrinho
    obj.totalProdutoCost = function(nome){ 
        var totalCost = 0;
        for(var i in cart){
            if(cart[i].nome === nome ){
                totalCost += (cart[i].valor  * cart[i].qtd);
            }
        }
        return totalCost;
    };

    // retorna uma cópia da array original
    obj.listCart = function(){    
        var cartCopy = [];
        for(var i in cart){
            var produto = cart[i];
            var produtoCopy = {}; // obj JS
            for(var p in produto){
                produtoCopy[p] = produto[p];
            }
            produtoCopy.total = (produto.valor * produto.qtd).toFixed(2);
            cartCopy.push(produtoCopy);
        }
        return cartCopy;  
    };
     // END*************************** Public methods and properties ******************************END // 
    return obj;
 })(); 

// END--------------------------- JS-functions  -------------------------------------------END//

