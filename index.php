<html>
    <head>
        <?php
        /**
         * Created by PhpStorm.
         * User: DrCarloMarlo
         * Date: 08.02.2018
         * Time: 14:59
         */
        // session_start();
        include_once "engineClass.php"; // фаил класса Engine
        $engine = new Engine(); //создание нового объекта класса Engine
        //Подключаем конфигурационный файл
        include './config.php';

        $link = mysqli_connect("localhost", "root", "usbw", "schoolbindItem");

        /* проверяем соединение */
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }

        /* возвращаем имя текущей базы данных */
        if ($result = mysqli_query($link, "SELECT DATABASE()")) {
            $row = mysqli_fetch_row($result);
            printf("Default database is %s.\n", $row[0]);
            mysqli_free_result($result);
        }

        /* возвращаем имя текущей базы данных */
        if ($result = mysqli_query($link, "SELECT DATABASE()")) {
            $row = mysqli_fetch_row($result);
            printf("Default database is %s.\n", $row[0]);
            mysqli_free_result($result);
        }
        ?>
        <meta charset="UTF-8">
        <title>Привязаные к школам дома - House Bind on Shcool - самый простой способ узнать к какой школе привязан Ваш дом.</title>
        <link rel="stylesheet" href="cascadSS.css">
        <link rel="stylesheet" href="caruselCSS.css">
        <script type="text/javascript" src='/library/jquery-3.2.1.js'></script>
    </head>

    <body>
        <div id="wrapper">
            <?php
            $i = $engine->getContentPage(); //выбор движком подключаемой страницы из POST
            include 'templatePage/header.php'; //подключение Header сайта

            include ( $i ); // подключение Контента

            mysqli_close($link);
            ?>
        </div>
    </body>
</html>
