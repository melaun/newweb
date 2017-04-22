/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var url = "./data/partners.json";
var pathToFolder = "./img/partners/";
var i;
var replaceList;
var usedList;
var fadeTime = 1000;

/**
 * start App
 * @returns {undefined}
 */
getPartners();

/**
 * stahnu partnery a spustim app
 * @returns {undefined}
 */
function getPartners() {
    $.ajax({
        url: url,
        success: function (data, textStatus, jqXHR) {
            startApp(data);
        }});
}

function startApp(data) {
    /**
     *      pripravim list s prvnimi 48 polozkami
     **/
    usedList = data.slice();
    usedList.splice(48, data.length - 48);
    printDefData(usedList);
    /**
     *      pripravim nahradni list
     **/
    replaceList = data.slice();
    replaceList.splice(0, 48);

    chnageRandomPartner();

}

function chnageRandomPartner() {
    var rndUsedList = Math.floor(Math.random() * usedList.length) + 0;
    var rndReplaceList = Math.floor(Math.random() * replaceList.length) + 0;
    //console.log("used number = "+rndUsedList);
    //console.log("replaced number = "+rndReplaceList);
    var objUsedList = usedList[rndUsedList];
    var objReplacedList = replaceList[rndReplaceList];
    //console.log("used number = "+objUsedList.logoSrc);
    //console.log("replaced number = "+objReplacedList.logoSrc);

    //vyjmu obr z listu a dam misto nej novy
    usedList.splice(rndUsedList, 1, objReplacedList);
    //vyjmu obr z listu a dam misto nej novy    
    replaceList.splice(rndReplaceList, 1, objUsedList);
    //printList(replaceList);

    changeImg(objUsedList.logoSrc, objReplacedList.logoSrc, function () {
        
        //rekurze
        chnageRandomPartner();
        //console.log("Ukoncena funkce");
    });
}

function changeImg(oldPath, newPath, callback) {
    //najdu img
    var img = $("div[style*='" + oldPath + "']");
    img.fadeOut(800, function () {
       // console.log("prvni fade");
        img.css("background-image", "url(./img/partners/" + newPath + ")");
        callback();
    }).fadeIn(4000,function(){
    //    console.log("druhy fade");
    });
}



function printList(list) {
    console.log("--------------- Start List ---------------");
    $.each(list, function () {
        console.log(this.logoSrc)
    })
    console.log("--------------- End List ---------------");
}

function printDefData(data) {
    $.each(data, function () {

        //$("#partnersContainer").append("<div class='col-1'><div class='inside img-box bg-white'><img src='./img/partners/" + this.logoSrc + "' /></div></div>");
        $("#partnersContainer").append("<div class='col-1'><div class='inside bg-white'><div style='height:5em;background:url(./img/partners/" + this.logoSrc + ");background-repeat:no-repeat;background-position:center;background-size:contain'></div></div></div>");
        //console.log("<div class='col-1' style='height:5em;background:url(./img/partners/" + this.logoSrc + ")'>aaa</div>");
    });
}



