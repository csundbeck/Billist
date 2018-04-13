let restaurantName;
let date;
let billAmount;
let tipAmount;
let totalAmount;
let totalBill;
let tipPercent = $('tipPercentage').val();

  $( function() {
    $( "#datepicker" ).datepicker({ minDate: -20, maxDate: "+1M +10D" });
  });

  $('#slider').on('input', function(){
    $('#tipPercentage').val($('#slider').val());
    document.getElementById("tipPercentage").innerHTML = tipPercent + "%";

    billAmount = $("#billAmt").val();
    tipAmount = $("#tipAmount").val();
    tipPercent = $("#tipPercentage").val();

    tipAmount = (((+billAmount) * (+tipPercent)) / 100).toFixed(2);
    finalAmount = (+billAmount + +tipAmount).toFixed(2);

    let tipAmt = $("#tipAmount").val("$" + tipAmount);
    let totalBill = $("#totalBill").val("$" + finalAmount);
  });

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
