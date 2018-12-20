/*global $ */
$(document).ready(function() {
    getDashboard();
    
});//documentReady

//Builds main page
function getDashboard(){
    $.ajax({
    type: "GET",
    url: "getDashboard.php",
    dataType: "json",
    success: function(data, status) {

      console.log("Got data", data);
      $("#races").append(
          $("<tr>")
          .html("<td>ID</td>" + 
          "<td>Date</td>" + 
          "<td>Start Time (24 Hour)</td>" + 
          "<td>Location</td>" + 
          "<td><img src='img/racing-add.png' onclick='newRace()'></td>"));
      for (var i = 0; i < data.length; i++){
          $("#races").append(
            $("<tr>")
              .append(
                $("<td>").html(data[i].ID)
              )
              .append(
                $("<td>")
                  .html(data[i].date)
              )
              .append(
                $("<td>")
                  .html(data[i].start_time)
              )
              .append(
                $("<td>")
                  .html(data[i].place)
              )
              .append(
                $("<button>")
                    .attr("type", "button")
                    .attr("data-toggle", "modal")
                    .attr("data-target", "#exampleModal")
                    .append($("<img>")
                        .attr("src", "img/racing-actions-edit.png")
                        .attr("onclick", "openModal("+ data[i].ID +")"))
                        )
                .append($("<button>")
                    .append($("<img>")
                        .attr("src", "img/racing-actions-cancel.png")
                        .attr("onclick", "archiveRace("+ data[i].ID +")"))
              )
          );
      }
    },
    error: function(err) {
      console.log("Didn't get data", err);
    }
 });
}


//Building page for each button option
function newRace(){
    $.ajax({
        ttype: "POST",
        url: "newRace.php",
        dataType: "json",
        contentType: "application/json",
        data: JSON.stringify(thingData),
        success: function(data, status) {
          
          console.log("Got data", data);
        },
        error: function(err) {
          console.log("Didn't get data", err);
        }
     });
}


//openModal variant which was supposed to allow user to edit a race
/*
function openModal(ID){
    var muhID = {"ID": ID};
    $.ajax({
        type: "POST",
        url: "openModal.php",
        dataType: "json",
        contentType: "application/json",
        data: JSON.stringify(muhID),//{ID:ID},
        success: function(data, status) {
            $(".modal-body").empty();
            $(".modal-body").append(data);
           console.log("Got data", data);
        },
        error: function(err) {
          console.log("Didn't get data", err);
        }
     });
}

function editRace(){
    $.ajax({
        type: "POST",
        url: "editRace.php",
        dataType: "json",
        contentType: "application/json",
        data: {ID:$("#hiddenID").val()},
        success: function(data, status) {
            
            
            getDashboard();
           console.log("Got data", data);
        },
        error: function(err) {
          console.log("Didn't get data", err);
        }
     });
}
*/

function archiveRace(ID){
    
    $.ajax({
        type: "POST",
        url: "archiveRace.php",
        dataType: "json",
        contentType: "application/json",
        data: {ID:ID},
        success: function(data, status) {
            getDashboard();
           console.log("Got data", data);
        },
        error: function(err) {
          console.log("Didn't get data", err);
        }
     });
}