$(document).ready(function() {
    $(".openModal").click(function(e){
        //console.log($(this).text().trim());
        $("#loading").show();
        $.ajax({
            type: "POST",
            url: "api/getPetInfo.php",
            dataType: "JSON",
            data: {"name": $(this).text().trim()},
            success: function(data,status) {
                console.log(data);
                $("#name").html(data.name);
                $("#pic").attr("src","img/" + data.pictureURL);
                $("#age").html("Age: " + (2018 - parseInt(data.yob)));
                $("#breed").html("Breed: " + data.breed);
                $("#desc").html(data.description);
                $("#loading").hide();
            },
            complete: function(data,status) {
                //alert(status);
            }
        });//ajax
        
    });//function
    
});//documentReady