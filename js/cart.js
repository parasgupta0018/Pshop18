
    updateCartTotal();

    var rem_btn = document.getElementsByClassName('remove-button');
    for (var i = 0; i < rem_btn.length; i++) 
    {
        var rem_button = rem_btn[i];
        rem_button.addEventListener('click', removeCartItem);
    }
        
    var quantity = document.getElementsByClassName('cart-quantity-input');
    for (var i = 0; i < quantity.length; i++) 
    {
        var quan_input = quantity[i];
        quan_input.addEventListener('change', quantityChanged);
    }
       
       var purchase = document.getElementsByClassName('btn-purchase')[0];
       purchase.addEventListener('click', purchaseClicked);
          
       function purchaseClicked() 
       {    
            
           
            $.ajax({
                url: 'rem_item.php',
                method: 'post',
                data:{purchase:"purchase"},
                success: function(respo){
                    console.log(respo);
                    if(respo==1)
                    {swal({
                        title: "Thank you for your purchase!",
                        icon:"success"
                    }).then((value) => {
                        if (value){window.location = "home.php";}});
                    }
                    else if(respo==2){
                        swal({
                            title: "Login/Signup to purchase!",
                            icon:"info"
                        }).then((value) => {
                            if (value){$(document).ready(function(){
                                $(".modal").modal("open");
                            });}});
                    }
                    else{
                        swal({
                            title: "No item in cart!",
                            icon:"error"
                        });
                    }
                }
            });
            //updateCartTotal();
            $.ajax({
                url: 'orderconfirm.php',
                method: 'post',
                data:{confirm: "order confirmed"},
                success: function(){
                    
                }
            });
           
       }

       function removeCartItem(event) 
       {
           var buttonClicked = event.target;
           var rem_title = buttonClicked.parentElement.parentElement.getElementsByClassName('cart-title1')[0].innerText;
           buttonClicked.parentElement.parentElement.remove();
           updateCartTotal();
           cart_no(-1);
           console.log(rem_title);
           $.ajax({
            url: 'rem_item.php',
            method: 'post',
            data: {remove: rem_title},
            success: function(){console.log();}
        });    
    
       }
       
     //  var quantityInputs = document.getElementsByClassName('cart-quantity-input');
     //  for (i = 0; i < quantityInputs.length; i++) {
     //       var input = quantityInputs[i];
     //      input.addEventListener('change', quantityChanged);
     //  }
       
       function quantityChanged(event)
       {
            var input = event.target;
            if (isNaN(input.value) || input.value <= 0) {
                input.value = 1;
            }
            
            var quan_title = input.parentElement.parentElement.getElementsByClassName('cart-title1')[0].innerText;
            console.log(input.value,quan_title)
            $.ajax({
                url: 'rem_item.php',
                method: 'post',
                data: {quantity: input.value, qt: quan_title},
                success: function(resp){updateCartTotal();console.log(resp);}
            });    
       }
       
       function updateCartTotal()
       {
           var total = 0;
           var cartRows = document.getElementsByClassName('add-item');

            for (var i = 0; i < cartRows.length; i++) 
            {
                
                var priceElement = cartRows[i].getElementsByClassName('cart-price');
                var quantityElement = cartRows[i].getElementsByClassName('cart-quantity-input')[0];
                var price = parseFloat(priceElement[0].innerText.replace('₹', ''));
            
                var quantity = 1;
                quantity=quantityElement.value;
                
                total = total +(price * quantity);
            }
            
           total = Math.round(total * 100) / 100;
           
           document.getElementsByClassName('tfootprice')[0].innerText= '₹' + total;
           
       }
       