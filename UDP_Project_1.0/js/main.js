/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();
});

$( function() {
    $( "#datepicker" ).datepicker();
  } );

function init(){

    
    ajaxLoadData();
    ajaxLoadTags();

}

function ajaxLoadData() {
   
    $.ajax({
        type:"POST",
        url: "php/loadHomeData.php",
        data: {data: "getAllBooks"}, // or function=two if you want the other to be called
        dataType:"html",
        success: function(result){
            $("#products").html(result);
        }
        
    });

}

function ajaxLoadTags(){
    $.ajax({
        type:"POST",
        url: "php/loadHomeData.php",
        data: {data: "getAllTags"}, // or function=two if you want the other to be called
        dataType:"html",
        success: function(result){
             $("#tags").html(result);
            
        }
        
    });
}

