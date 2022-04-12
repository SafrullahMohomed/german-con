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
    <link rel="stylesheet" href="generator.css">
    <script defer src="generator.js"></script>
</head>
<body>

<h2>Germany word converter</h2>

<!--search box-->
<div id="search">
    <form action="/" method="post" id="form">
        <textarea id="textData"></textarea>
        <input type="text" id="hidden-data" value="">
        <button type="button" id="search-but">Search</button>
    </form>
</div>

<!--table-->
<div id="table">
    <table>
        <tr>
            <th>Original</th>
            <th>Sellebel</th>
            <th>English</th>
            <th>Sinhala</th>
            <th>Tamil</th>


        </tr>
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
                "<tr>
                    <td>".$new_array[$i][0]['Original']."</td>
                    <td>".$new_array[$i][0]['Sileb']."</td>
                    <td>".$new_array[$i][0]['English']."</td>
                    <td>".$new_array[$i][0]['Sinhala']."</td>
                    <td>".$new_array[$i][0]['Tamil']."</td>
                </tr>";
                }}
        ?>


    </table>

</div>


</body>
</html>
