

    
window.calculate = function() {
        
    console.log("calculate called");

    var amount;
    var percentage;
    var vatAmount;
    var total;


    amount = document.getElementById("appbundle_invoice_amount").value;
    
    if (amount == '') {
        
        document.getElementById('amountError').style.display = 'block';
        document.getElementById("appbundle_invoice_vatAmount").value = "";
        document.getElementById("appbundle_invoice_amountWithVat").value = "";

    } else {
        document.getElementById('amountError').style.display = 'none';
        vat(amount);        
        
    }
}

    function vat(amount) {

        console.log('vat called');
        percentage = document.getElementById("appbundle_invoice_vatPercentage").value;
        vatAmount = (amount / 100) * percentage;
        
        total = parseFloat(amount) + parseFloat(vatAmount); 
        
        document.getElementById("appbundle_invoice_vatAmount").value = vatAmount;
        document.getElementById("appbundle_invoice_amountWithVat").value = total;

        
    }
    console.log("calculate loaded");