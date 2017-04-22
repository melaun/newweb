<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Koruna Příbram
            <?php
            $description;
            if (empty($_GET['url'])) {
                $url = 'home';
            } else {
                $fullUrl = explode('/', $_GET['url']);
                $url = $fullUrl[0];
            }
            switch ($url) {
                case 'home':
                    echo '| Velkoobchod - Maloobchod';
                    $description = 'Koruna - velkoobchod a maloobchod potravin, alkoholu, tabákových výrobků a mnoho dalšího.';
                    break;
                case 'letakoveAkce':
                    echo '| Letákové akce';
                    $description = 'Každý měsíc nové akce s výhodnými cenami pro naše zákaznky.';
                    break;
                case 'sortiment':
                    echo '| Sortiment';
                    $description = 'Vyberte si z nabídky více, jak 6000 položek. .';
                    break;
                case 'objednavka':
                    echo '| Objednání zboží';
                    $description = 'Objednávejte zboží online.';
                    break;
                case 'novinky':
                    echo '| Novinky na Koruně';
                    $description = 'Sledujte co nové jsme pro Vás připravili.';
                    break;
            }
            ?>
        </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


        <link href="bower_components/sanitize-css/sanitize.css" rel="stylesheet" type="text/css"/>
        <link href="css/init.css" rel="stylesheet" type="text/css"/>
        <link href="css/template.css" rel="stylesheet" type="text/css"/>
        <link href="css/color.css" rel="stylesheet" type="text/css"/>
        <link href="css/buttons.css" rel="stylesheet" type="text/css"/>

        <link href="https://fonts.googleapis.com/css?family=Pavanam" rel="stylesheet">
        <script src="bower_components/jquery/dist/jquery.min.js" type="text/javascript"></script>
        <link href="bower_components/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>


        <!-- css for js -->
        <link href="js/hiden-box/hidden-box.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>



        <nav>
            <div class="bg-blue" style="width: 100%;height: 7px"></div>
            <div class="bg-white row" style="margin-bottom: 5px;">
                <!-- Logo
                -->
                <div  class="col-4 padding">
                    <a href="./home">
                        <img src="img/logo.jpg" alt=""/>
                    </a>
                </div>
                <!-- Menu
                -->
                <div class="col-8 menu center">
                    <ul class="">
                        <a href="./velkoobchod"><li>Velkoobchod</li></a>
                        <a href="./cashcarry"><li>Cash&Carry</li></a>
                        <a href="./maloobchod"><li>Maloobchod</li></a>
                        <a href="./eshop"><li>E-Shop</li></a>
                        <a href="./novinky"><li>Novinky</li></a>
                        <a href="./letakoveakce"><li>Letákové akce</li></a>
                        <a href="./letakoveakce"><li>Kariéra</li></a>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="container">
            <!-- ROUTER 
            -->
            <?php
            $path = './views/' . $url . ".html";
            if (file_exists($path)) {
                include $path;
            } else {
                include "./views/error.html";
            }
            ?>
            <!-- END ROUTER 
            -->
        </div>




        <footer class="bg-yellow">
            <ul class="" >
                <li><h4>Kontakt</h4></li>
                <li>Příbram IV</li>
                <li>Březnická 390</li>
                <li>603 887 866</li>
                <li>info@korunapb.cz</li>
                <li>fb.com/korunapb</li>

            </ul>
            <ul class="" >
                <li><h4>Menu</h4></li>
                <li><a href="./home">Domu</a></li>
                <li><a href="./bodovysystem">Bodový systém</a></li>
                <li><a href="./letakoveAkce">Letákové akce</a></li>
                <li><a href="./sortiment">Sortiment</a></li>
                <li><a href="./novinky">Novinky</a></li>
                <li><a href="./objednavka">Objednavka</a></li>

            </ul>
            <ul class="">
                <li><h4>Objednávky</h4></li>
                <li>603 887 866</li>
                <li>info@korunapb.cz</li>
                <li><a href="http://www.korunapb.cz/velkoobchod">Online objednavka</a></li>
                <li><a href="./sortiment">Sortiment</a></li>

            </ul>
            <ul class="">
                <li><h4>Otevírací doba</h4></li>
                <li>Po - Pá : 8:00 - 18:00</li>
                <li>So : 8:00 - 13:00</li>
                <li>Ne : 10:00 - 15:00</li>
            </ul>

        </footer>
        <script>

            $.get("./data/items.json", function (data) {
                var id = 0;
                $('#imgA').attr('src', data[id].imgSrc);
                id++;
                window.setInterval(function () {
                    $('#imgA').attr('src', data[id].imgSrc);
                    $('#priceA').text(data[id].sDPH + ' - ' + id);
                    id++;

                    if (data.length === id) {
                        id = 0;
                    }
                }, 5000);



            });






        </script>


        <script src="js/hiden-box/hidden-box.js" type="text/javascript"></script>
        <script src="js/partnerstable.js" type="text/javascript"></script>

    </body>
</html>
