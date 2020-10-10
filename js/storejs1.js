    
function cart_no(n){
    var number_box = document.getElementById('cart-number');
    var crt_no = document.getElementById('crt-no');
    var no;
    //if(n!=0){
    no = crt_no.innerText;
    no=parseInt(no);
    no=no+n;
    //}
    //else {no=0;}
    console.log(n,no);
    if(no>0){
        number_box.style.display='block';
        crt_no.innerText=no;
    }
    else{
        number_box.style.display='none';
        crt_no.innerText=no;
    }
    $.ajax({
        url: 'cart_no.php',
        method: 'post',
        data: {count:no},
        success: function(){console.log("done1");}
    });  
}

var addToCartButtons = document.getElementsByClassName('shop-item-button');
for (var i = 0; i < addToCartButtons.length; i++) 
{
    var add_button = addToCartButtons[i];
    add_button.addEventListener('click', addToCartClicked);
}

function addToCartClicked(event) 
{
    var added_button = document.getElementsByClassName("added");
    var button = event.target;

    for (var i = 0; i < added_button.length; i++) {
        if (added_button[i] == button) {
                swal({
                        title: "This item is already added to the cart!",
                        icon:"info"
                    });

                return;
        }
        else{
            swal({
                title: "Item added to the cart!",
                icon:"success"
            });
        }
    }
    button.classList.add("added");
    //cart_no(1);
    var shopItem = button.parentElement.parentElement;
    var title = shopItem.getElementsByClassName('shop-item-title')[0].innerText;
    $.ajax({
        url: 'cart_no.php',
        method: 'post',
        data: {data:title},
        success: function(response)
        {
            console.log(parseInt(response));
            if(parseInt(response)==0)
            {   swal({
                title: "This item is already added to the cart!",
                icon:"info"
                });
            }
            else{
                swal({
                    title: "Item added to the cart!",
                    icon:"success"
                });
            }

            cart_no(parseInt(response));
        }
    });    

    /*var shopItem = button.parentElement.parentElement;
    var title = shopItem.getElementsByClassName('shop-item-title')[0].innerText;
    var price = shopItem.getElementsByClassName('shop-item-price')[0].innerText;
    var imageSrc = shopItem.getElementsByClassName('shop-item-image')[0].src;
    addItemToCart(title, price, imageSrc);
    updateCartTotal();   */      
}
       