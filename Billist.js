let restaurantName = $('#restaurantName').val();
let date = $("#date-box").val();
let billAmount = $("#billAmt").val();
let tipAmount = $("#tipAmt").val();
let totalAmount = $("#totalBill").val();
let totalBill = $("#totalBill").val();
let tipPercent = $("#tipPercentage").val();

  $('#slider').on('input', function(){
    $('#tipPercentage').val($('#slider').val());
  });

  $("#calculateTotalBill").click(function() {
    billAmount = $("#billAmt").val();
    tipAmount = $("#tipAmt").val();
    tipPercent = $("#tipPercentage").val();

    tipAmount = (((+billAmount) * (+tipPercent)) / 100).toFixed(2);
    finalAmount = (+billAmount + +tipAmount).toFixed(2);

    var tipAmt = $("#tipAmt").hide().fadeIn(250).val("$" + tipAmount);
    var totalBill = $("#totalBill").hide().fadeIn(250).val("$" + finalAmount);
  })

  const saveValues = () => {
    restaurantName = $('#restaurantName').val();
    date = $("#date-box").val();
    totalBill = $("#totalBill").val();

    localStorage.setItem("restaurantName", restaurantName);
    localStorage.setItem("date", date);
    localStorage.setItem("billAmount", billAmount);
    localStorage.setItem("tipAmount", tipAmount);
    localStorage.setItem("totalBill", totalBill);
  }
