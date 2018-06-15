<?php
//    #Instance of the db connectivity
   // include_once '/Write.php';
//?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <title>Untitled Document</title>
</head>
<style>
    td {
        background-color: white;
    }
</style>
<body>
<h3>
    <center>Parameter Values</center>
</h3>
<table border="1" cellspacing="0.5" cellpadding="1">
    <tbody bgcolor=#D7BEBE
    <tr>
        <th scope="col">Date and Time</th>
        <th scope="col">Solar volt PV</th>
        <th scope="col">Battery volt</th>
        <th scope="col">Turbine volt</th>
        <th scope="col">Pump volt</th>
        <th scope="col">Solar current</th>
        <th scope="col">Pump current</th>
        <th scope="col">Lower to upper flow</th>
        <th scope="col">Upper to turbine flow</th>
        <th scope="col">Water to farm flow</th>
        <th scope="col">Water to upper reservoir(Gallon)</th>
        <th scope="col">Water to farm</th>
        <th scope="col">Upper reservoir full</th>
        <th scope="col">Lower reservoir full</th>
        <th scope="col">Turbine valve</th>
        <th scope="col">Upper reservoir valve</th>
        <th scope="col">Water to farm valve</th>
        <th scope="col">Location Latitude</th>
        <th scope="col">Location Longitude</th>
        <th scope="col">System ON</th>
        <th scope="col">State</th>

    </tr>
    <?php

    $servername = "localhost";
    $username = "Aman19592";
    $password = "***********";
    $dbname = "cleantech_db";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    $url = new SplFixedArray(20);
    $url[0] = (float)$_GET["A01"];
    $url[1] = (float)$_GET["A02"];
    $url[2]=(float)$_GET["A03"];
    $url[3]=(float)$_GET["A04"];
    $url[4]=(float)$_GET["A05"];
    $url[5]=(float)$_GET["A06"];
    $url[6]=(float)$_GET["A07"];
    $url[7]=(float)$_GET["A08"];
    $url[8]=(float)$_GET["A09"];
    $url[9]=(float)$_GET["A10"];
    $url[10]=(float)$_GET["A11"];
    $url[11]=(float)$_GET["A12"];
    $url[12]=(float)$_GET["A13"];
    $url[13]=(float)$_GET["A14"];
    $url[14]=(float)$_GET["A15"];
    $url[15]=(float)$_GET["A16"];
    $url[16]=(float)$_GET["A17"];
    $url[17]=(float)$_GET["A18"];
    $url[18]=(float)$_GET["A19"];
    $url[19]=(float)$_GET["A20"];
    $PSTTime = strtotime("-7 Hours");
    $dateToday = date("Y/m/d H:i:sa",$PSTTime);
   // $datetoday  = DATE("H:i", STRTOTIME("1:30 pm"));

    if ($url[0] > 0) {
        $sqlInsert = "INSERT INTO sensor_values2(TimeStampDate, V_Solar, V_Battery, V_Turbine, V_Pump, I_Solar, I_Pump, 
I_Lower_Pump, I_Upper_Turbine, I_Water_Farm,Water_uppertank_in_Gallon, Water_uppertank_to_lowertank, Upper_reservoir_full, 
Lower_reservoir_full, Turbine_valve, Upper_reservoir_valve, Water_to_farm_valve, Latitude, Longitude, System_On, State) 
VALUES ('$dateToday',$url[0],$url[1],$url[2],$url[3],$url[4],$url[5],$url[6],$url[7],$url[8],$url[9],$url[10],$url[11],$url[12],$url[13],$url[14],
$url[15],$url[16],$url[17],$url[18],$url[19]);";
        $resultInsert = mysqli_query($conn, $sqlInsert);
    }

    ?>
    <?php
    //$PSTTime=strtotime("-9 Hours");
    //$dateToday=date("Y/m/d h:i:sa",$PSTTime);

    $sql = "SELECT  * FROM  sensor_values2 order by IDData
 
 
 desc";
    $result = mysqli_query($conn, $sql);
    $NumberOfRows = mysqli_num_rows($result);


    if ($NumberOfRows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $rowData[] = $row;

        }
    }
    ?>



    <?php


    for ($r = 0; $r < $NumberOfRows; $r++) {
        echo "<tr>";
        echo "<td>";
        echo $rowData[$r]["TimeStampDate"];
        echo "</td>";
        echo "<td>";
        echo $rowData[$r]["V_Solar"];
        echo "</td>";
        echo "<td>";
        echo $rowData[$r]["V_Battery"];
        echo "</td>";
        echo "<td>";
        echo $rowData[$r]["V_Turbine"];
        echo "</td>";
        echo "<td>";
        echo $rowData[$r]["V_Pump"];
        echo "</td>";
        echo "<td>";
        echo $rowData[$r]["I_Solar"];
        echo "</td>";
        echo "<td>";
        echo $rowData[$r]["I_Pump"];
        echo "</td>";
        echo "<td>";
        echo $rowData[$r]["I_Lower_Pump"];
        echo "</td>";
        echo "<td>";
        echo $rowData[$r]["I_Upper_Turbine"];
        echo "</td>";
        echo "<td>";
        echo $rowData[$r]["I_Water_Farm"];
        echo "</td>";
        echo "<td>";
        echo $rowData[$r]["Water_uppertank_in_Gallon"];
        echo "</td>";
        echo "<td>";
        echo $rowData[$r]["Water_uppertank_to_lowertank"];
        echo "</td>";
        echo "<td>";
        echo $rowData[$r]["Upper_reservoir_full"];
        echo "</td>";
        echo "<td>";
        echo $rowData[$r]["Lower_reservoir_full"];
        echo "</td>";
        echo "<td>";

        echo $rowData[$r]["Turbine_valve"];
        echo "</td>";
        echo "<td>";
        echo $rowData[$r]["Upper_reservoir_valve"];
        echo "</td>";
        echo "<td>";
        echo $rowData[$r]["Water_to_farm_valve"];
        echo "</td>";
        echo "<td>";
        echo $rowData[$r]["Latitude"];
        echo "</td>";
        echo "<td>";
        echo $rowData[$r]["Longitude"];
        echo "</td>";
        echo "<td>";
        echo $rowData[$r]["System_on"];
        echo "</td>";
        echo "<td>";
        echo $rowData[$r]["State"];
        echo "</td>";

        echo "</tr>";
    }
    ?>

    </tbody>
</table>


</body>