let restaurantName;
let date;
let billAmount;
let tipAmount;
let totalAmount;
let totalBill;

//Datepicker function
  $(function() {
    $("#datepicker").datepicker({ minDate: -30, maxDate: "+0D" });
  });

//Tip slider function (also outputs tip amount and total amount values)
  $('#slider').on('input', function(){
    $('#tipPercentage').val($('#slider').val());
    document.getElementById("tipPercentage").innerHTML = $("#tipPercentage").val() + "%";

    billAmount = $("#billAmt").val();
    tipAmount = $("#tipAmount").val();

//Formatting the outputs
    tipAmount = (((+billAmount) * (+$("#tipPercentage").val())) / 100).toFixed(2);
    finalAmount = (+billAmount + +tipAmount).toFixed(2);

    let tipAmt = $("#tipAmount").val("$" + tipAmount);
    let totalBill = $("#totalBill").val("$" + finalAmount);
  });

  const saveValues = () => {
    restaurantName = $('#restaurantName').val();
    date = $("#date-box").val();
    totalBill = $("#totalBill").val();

//Old method of persisting getween pages (Still used for safe measure)
//All data storage has moved to database
    localStorage.setItem("restaurantName", restaurantName);
    localStorage.setItem("date", date);
    localStorage.setItem("billAmount", billAmount);
    localStorage.setItem("tipAmount", tipAmount);
    localStorage.setItem("totalBill", totalBill);
  };

//Reetting the value of the percentage box
  $("#clear").click(function() {
    $("#tipPercentage").text("--%");
  });
