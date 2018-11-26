//Variables
var pinTot = 0;
var fcTot = 0;
var shipCost = 0;
var totCost = 0;
var tax = 0;
var subTot = 0;

updateTotal();

function updateTotal(){
    
    subTot = pinTot + fcTot + shipCost;
    tax = 0.1 * subTot;
    
    totCost = subTot + tax;
    
    //$('#subtot').val(subTot);
    $('#subtot').empty();
    $('#subtot').append("$" + subTot);
    //$('#tax').val(tax);
    $('#tax').empty();
    $('#tax').append("$" + tax);
    //$('#total').val(totCost);
    $('#total').empty();
    $('#total').append("$" + totCost);
}

$('#pinquant').change(function(){
    pinTot = Number($('#pinquant').val() * 20);
    //$('#pintot').val(pinTot);
    $('#pintot').empty();
    $('#pintot').append("$" + pinTot);
    updateTotal();
});

$('#fcquant').change(function(){
    //console.log("In jQuery fcake");
    fcTot = Number($('#fcquant').val() * 30);
    //console.log(fcTot, $('#fctot').val());
    //$('#fctot').val(fcTot);
    $('#fctot').empty();
    $('#fctot').append("$" + fcTot);
    //console.log($('#fctot').val());
    updateTotal();
});

$('#ship5').change(function(){
    shipCost = Number($('#ship5').val());
    $('#shipcost').val(shipCost);
    updateTotal();
});

$('#ship10').change(function(){
    shipCost = Number($('#ship10').val());
    $('#shipcost').val(shipCost);
    updateTotal();
});

$('#ship15').change(function(){
    shipCost = Number($('#ship15').val());
    $('#shipcost').val(shipCost);
    updateTotal();
});

$("#confirm").click(function(event){
    event.preventDefault();
    $("#terms").css('color', "red");

    if ( $("#terms").is(':checked') ){
        //

        event.submit();
    }
    
});

