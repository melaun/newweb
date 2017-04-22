/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var url = "./data/data.json";

var getData = function () {
    $.get(url)
            .done(function (){return })
            .fail()
            .always();


};

$("#Date").append(data.startDate);
$("#Date").append(" - " + data.endDate);
$.each(data.items, function () {
    console.log(this);
})

