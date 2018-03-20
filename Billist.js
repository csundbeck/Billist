let restaurantName = $("#restaurantName").val();
let billAmount = $("#billAmt").val();
let tipAmount = $("#tipAmt").val();
let totalAmount = $("#totalBill").val();
let totalBill = $("#totalBill").val();
let tipPercent = $("#tipPercentage").val();

 var billEntree = {
   "Restaurant Name": restaurantName.value,
   "Bill Amount": billAmount.value,
   "Tip Amount": tipAmount.value,
   "Total Bill": totalBill.value,
 };

  $('#slider').on('input', function(){
    $('#tipPercentage').val($('#slider').val());
  });

  $("#calculateTotalBill").click(function() {
    billAmount = $("#billAmt").val();
    tipAmount = $("#tipAmt").val();
    tipPercent = $("#tipPercentage").val();

    tipAmount = (((+billAmount) * (+tipPercent)) / 100).toFixed(2);
    finalAmount = (+billAmount + +tipAmount).toFixed(2);

    $("#tipAmt").val("$" + tipAmount);
    $("#totalBill").val("$" + finalAmount);
  })

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
}
