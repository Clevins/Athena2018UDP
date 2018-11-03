/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$.urlParam = function(name){
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results===null) {
       return null;
    }
    return decodeURI(results[1]) || 0;
};

$(document).ready(function() {
    ajaxLoadData();
    ajaxLoadTags();
    ajaxLoadBook($.urlParam('id'));
    ajaxLoadSellers($.urlParam('id'));
});



function ajaxLoadData() {

    $.ajax({
        type: "POST",
        url: "php/loadHomeData.php",
        data: {data: "getAllBooks"}, // or function=two if you want the other to be called
        dataType: "html",
        success: function (result) {
            $("#products").html(result);
        }

    });

}

function ajaxLoadTags() {
    $.ajax({
        type: "POST",
        url: "php/loadHomeData.php",
        data: {data: "getAllTags"}, // or function=two if you want the other to be called
        dataType: "html",
        success: function (result) {
            $("#tags").html(result);
        }

    });
}




function ajaxLoadBook(id){
   $.ajax({
        type: "POST",
        url: "php/loadHomeData.php",
        data: {data: "getBook",bookId: id}, // or function=two if you want the other to be called
        dataType: "html",
        success: function (result) {
            $("#book").html(result);
        }
    });
}

function ajaxLoadSellers(id){
   $.ajax({
        type: "POST",
        url: "php/loadHomeData.php",
        data: {data: "getSellers",bookId: id}, // or function=two if you want the other to be called
        dataType: "html",
        success: function (result) {
            $("#sellers").html(result);
        }
    });
}
