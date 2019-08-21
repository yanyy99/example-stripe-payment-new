<!DOCTYPE html>
<html >
<?php 
    $customerEmail = "tony@tonyemail.com";
?>
<head>
  <meta charset="UTF-8">
  <title>The New Stripe Checkout</title>  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://js.stripe.com/v3"></script>
</head>

<body>
  <div class="wrapper">
 
  <div class="table">
    <div class="row header green">
      <div class="cell">
        Customer
      </div>
      <div class="cell">
        &nbsp;
      </div>
    </div>
    <div class="row">
      <div class="cell">
        Email
      </div>
      <div class="cell">
        <?php echo $customerEmail;?>
      </div>
    </div>
  </div> 
  
  <div class="table">
    <div class="row header blue">
      <div class="cell">
        Product ID
      </div>
      <div class="cell">
        Description
      </div>
      <div class="cell">
        Quantity
      </div>
      <div class="cell">
        Unit Price
      </div>
      <div class="cell">
        Line Total
      </div> 
    </div>
    
    <div class="row">
      <div class="cell">
        1
      </div>
      <div class="cell">
        Avocado
      </div>
      <div class="cell">
        2
      </div>
      <div class="cell">
        AUD$2.50
      </div>
      <div class="cell">
        AUD$5.00
      </div>
    </div>
    <div class="row">
      <div class="cell">
        2
      </div>
      <div class="cell">
        Kiwifruit
      </div>
      <div class="cell">
        4
      </div>
      <div class="cell">
        AUD$0.60
      </div>
      <div class="cell">
        AUD$2.40
      </div>
    </div>   

    <div class="row">
      <div class="cell">
        &nbsp;
      </div>
      <div class="cell">
        &nbsp;
      </div>
      <div class="cell">
        &nbsp;
      </div>
      <div class="cell-align-right">
        Total
      </div>
      <div class="cell">
        AUD$7.40
      </div>
    </div>
  </div>
  
  <button
      style="background-color:#6772E5;color:#FFF;padding:8px 12px;border:0;border-radius:4px;font-size:1em"
      id="checkout-button"
      role="link">Checkout
  </button>
  <div id="error-message"></div>
  <script>
      var stripe = Stripe('pk_test_key');

      var checkoutButton = document.getElementById('checkout-button');
      checkoutButton.addEventListener('click', function () {
          //when the button is clicked, redirect your customer to Checkout

          stripe.redirectToCheckout({
              items: [{sku: 'sku_FeKyXj88G0YvZ9', quantity: 2},
                      {sku: 'sku_FeTfkk7wz6zZ0P', quantity: 4}],

              successUrl: "http://localhost/success.html",
              cancelUrl: "http://localhost/cancel.html",
              customerEmail: "<?php echo $customerEmail; ?>",
          })
          .then(function (result) {
              if (result.error) {
                  // If `redirectToCheckout` fails due to a browser or network
                  // error, display the error message to your customer.
                  var displayError = document.getElementById('error-message');
                  displayError.textContent = result.error.message;
              }
          });
      });
  </script>
  </div>

  </body>
</html>
