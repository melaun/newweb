/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(".hidden-box").click(function () {
    if ($(this).hasClass('hidden-box')) {
        $(this).toggleClass('hidden-box open-box');
    } else {
        $(this).toggleClass('open-box hidden-box ');
    }
});