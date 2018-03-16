let restaurantName = "";
let billAmount = 0.00;
let tipAmount = 0.00;
let totalAmount = 0.00;
let totalBill = 0.00;
let tipPercent = 0.00;

 var billEntree = {
   "Restaurant Name": restaurantName.value,
   "Bill Amount": billAmount.value,
   "Tip Amount": tipAmount.value,
   "Total Bill": totalBill.value,
 };

  $('#slider').on('input', function(){
    $('#tipPercentage').val($('#slider').val());
  });

  document.getElementById("calculateTotalBill").onclick = function() {
    billAmount = document.getElementById("billAmt").value;
    tipAmount = document.getElementById("tipAmt").value;
    tipPercent = document.getElementById("tipPercentage").value;

    tipAmount = (((+billAmount) * (+tipPercent)) / 100).toFixed(2);
    finalAmount = (+billAmount + +tipAmount).toFixed(2);

    document.getElementById("tipAmt").value = "$" + tipAmount;
    document.getElementById("totalBill").value = "$" + finalAmount;
  }

   //Save data button
   document.getElementById("submit").onclick = function() {

     $(function() {
       $('#billForm').submit(function(event) {
         event.preventDefault();

         var newBillEntree = $(this);
         var submitButton = $('input[type=submit]', newBillEntree);

         $.ajax({
           type: 'POST',
           url: newBillEntree.prop('action'),
           accept: {
             javascript: 'application/javascript'
           },
           data: newBillEntree.serialize(),
           beforeSend: function() {
             submitButton.prop('disabled', 'disabled');
           }
          }).done(function(data) {
            submitButton.prop('disabled', false);
          });
        });
      });

//Clear button
  document.getElementById("clear").onclick = function() {
    document.getElementById("restaurantName").value = null;
    document.getElementById("billAmt").value = null;
    document.getElementById("tipAmt").value = null;
    document.getElementById("tipPercentage").value = null;
    document.getElementById("totalBill").value = null;

  }
}
