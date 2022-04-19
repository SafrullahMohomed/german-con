<?php
session_start();

include './db-con.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="generator4.css">
    <script defer src="generator4.js"></script>
</head>
<body>

<!--buttons for styles-->
<div id="buttonset">
    <button id="button1">Table</button>
    <button id="button2">Line</button>
    <button id="button3">Separate</button>
    <button id="button4">Tooltip</button>

</div>


<h2>Germany word converter</h2>

<!--search box-->
<div id="search">
    <form action="/" method="post" id="form">
        <textarea id="textData"></textarea>
        <input type="hidden" id="hidden-data" value="">
        <button type="button" id="search-but">Search</button>
    </form>
</div>

<!--table-->
<div id="table">
    <table>
<!--        <tr>-->
<!--            <th>Original</th>-->
<!--            <th>Sellebel</th>-->
<!--            <th>English</th>-->
<!--            <th>Sinhala</th>-->
<!--            <th>Tamil</th>-->
<!---->
<!---->
<!--        </tr>-->
        <?php

//        $arr = array();
        $arr = json_decode($_SESSION['view_data'], true);

        $new_array = array();


        if (is_array($arr) || is_object($arr)) {

            foreach ($arr as $word) {
                $sql = "SELECT * FROM `Data` WHERE Original = '" . $word . "'";
                $statement = $conn->query($sql);
//    $statement->execute();
                $statement = $statement->fetchAll();
                array_push($new_array, $statement);
//        print_r($statement);
            }
        } else {
            echo "it is not an array";
        }


//        print_r($new_array[1]);
                for($i = 0; $i < sizeof($new_array); $i++){
                    if(sizeof($new_array[$i]) != null){
                echo
                "
                    <span class='words-original'>".$new_array[$i][0]['Original']."</span>
                    <span class='words-sileb'>(".$new_array[$i][0]['Sileb'].", </span>
                    <span class='words-english'>".$new_array[$i][0]['English'].", </span>
                    <span class='words-sinhala'>".$new_array[$i][0]['Sinhala'].", </span>
                    <span class='words-tamil'>".$new_array[$i][0]['Tamil'].")&ensp;</span>
                ";
                }}
        ?>


    </table>

    <div id="main-div" class="primary-div">
        <div id="left-div" class="lr-div">
            <?php
            for($i = 0; $i < sizeof($new_array); $i++){
            if(sizeof($new_array[$i]) != null){
            echo
            "
            <span class='words-sileb tooltip'>".$new_array[$i][0]['Sileb']." <span class='tooltiptext'><span class='words-original' id='original-word'>".$new_array[$i][0]['Original']."</span>
            <span class='words-english'>(".$new_array[$i][0]['English'].", </span>
            <span class='words-sinhala'>".$new_array[$i][0]['Sinhala'].", </span>
            <span class='words-tamil'>".$new_array[$i][0]['Tamil'].")&ensp;</span>
            </span></span>
            
            ";
            }}
            ?></div>
        <div id="right-div" class="lr-div"><?php
            for($i = 0; $i < sizeof($new_array); $i++){
                if(sizeof($new_array[$i]) != null){
                    echo
                        "
            <span class='words-original'>".$new_array[$i][0]['Original']."</span>
            <span class='words-english'>(".$new_array[$i][0]['English'].", </span>
            <span class='words-sinhala'>".$new_array[$i][0]['Sinhala'].", </span>
            <span class='words-tamil'>".$new_array[$i][0]['Tamil'].")&ensp;</span>
            ";
                }}
            ?></div>
    </div>
<!--    <div id="next-div" class="primary-div"></div>-->
</div>


</body>
</html>
