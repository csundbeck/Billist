<script src="http://code.jquery.com/jquery.js"></script>
<script type="text/javascript">

var billAmount = document.getElementById("billAmt").value;
var tipAmount = document.getElementById("tipAmt").value;
var totalAmount = 0.00;
var totalBill = "";
var tipPercent = document.getElementById("tipPercentage").value;

// document.getElementById("calculateTotalBill").onclick = function() {
//
//   billAmount = document.getElementById("billAmt").value;
//   tipAmount = document.getElementById("tipAmt").value;
//   totalAmount = +billAmount + +tipAmount;
//
//   totalBill = "$" + totalAmount.toFixed(2);
//
//   document.getElementById("totalBill").value = totalBill;
//
//   tipPercentage = Math.round((tipAmount / billAmount) * 100);
//
//   document.getElementById("tipPercentage").value = tipPercentage + "%";
// }

  $('#slider').on('input', function(){
    $('#tipPercentage').val($('#slider').val());
  });

  document.getElementById("calculateTotalBill").onclick = function() {
    billAmount = document.getElementById("billAmt").value;
    tipAmount = document.getElementById("tipAmt").value;
    tipPercent = document.getElementById("tipPercentage").value;

    tipAmount = ((+billAmount) * (+tipPercent)) / 100;
    finalAmount = +billAmount + +tipAmount;

    totalTip = "$" + tipAmount.toFixed(2);
    finalBill = "$" + finalAmount.toFixed(2);

    document.getElementById("tipAmt").value = totalTip;
    document.getElementById("totalBill").value = finalBill;
  }

</script>
