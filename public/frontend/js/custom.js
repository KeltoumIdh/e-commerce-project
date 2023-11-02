$(document).ready(function() {
  
  $('.addToCart-btn').click(function(e) {
    e.preventDefault();

    var product_id = $(this).closest('.product_data').find('.prod_id').val();
    var product_qty = $(this).closest('.product_data').find('.qty-input').val();

     $.ajaxSetup({
     headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
    }); 

    
   
    $.ajax({
      method:"POST",
      url:"/ajouter-au-panier",
      data: {
        'product_id': product_id,
        'product_qty': product_qty,
      },
      success: function(response){
         swal(response.status);
      }
    });

  });


  $('.increment-btn').click(function(e)
  {
    e.preventDefault();
    
    var inc_value = $(this).closest('.product_data').find('.qty-input').val();
    var value = parseInt(inc_value,10);
    value = isNaN(value) ? 0 : value;
    if (value < 10){
      value++;
      $(this).closest('.product_data').find('.qty-input').val(value);
    }
  });

  
  $('.decrement-btn').click(function(e)
  {
    e.preventDefault();
    
    var dec_value = $(this).closest('.product_data').find('.qty-input').val();
    var value = parseInt(dec_value,10);
    value = isNaN(value) ? 0 : value;
    if (value > 1){
      value--;
      $(this).closest('.product_data').find('.qty-input').val(value);
    }
  });

  $.ajaxSetup({
    headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
   }); 

 
    $('.delete-cart-item').click(function(e){
      e.preventDefault();

    
       var prod_id = $(this).closest('.product_data').find('.prod_id').val();
      $.ajax({
        method: "POST",
        url: "delete-cart-item",
        data: {
          'prod_id': prod_id
        },
        success: function(response){
           window.location.reload();
          
          swal("",response.status, "success");
        }
      });

  });

  $('.changeQty').click(function (e)
  {
      e.preventDefault();

      var prod_id = $(this).closest('.product_data').find('.prod_id').val();
      var qty = $(this).closest('.product_data').find('.qty-input').val();
      data= {
        'prod_id': prod_id,
        'prod_qty': qty,
      },
      $.ajax({
        method: "POST",
        url: "update-cart",
        data:data,
        success: function(response){
          window.location.reload();
        }
      });
    });
   
});




  
const radioInputs = document.querySelectorAll('input[name="livraison"]');

// Ajouter un écouteur d'événement pour chaque élément radio
radioInputs.forEach(function(input) {
  input.addEventListener('change', function() {
    // Récupérer le prix du mode de livraison sélectionné
    const selectedPrice = input.dataset.price;

    // Mettre à jour le texte du span avec le prix sélectionné
    document.getElementById('livraison-price').textContent = ` ${selectedPrice} DH`;
  });
});








  