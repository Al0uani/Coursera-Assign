<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Profiles</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;text-align:center;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <?php include('navbar.html') ?>
    <table>
        <?php
            echo "<tr><th>FirstName</th><th>LastName</th><th>Gender</th><th>Phone</th><th>Job</th></tr>";
            $data = file_get_contents("profiles.txt");
            $lines = explode("\n", $data);
            foreach ($lines as $line) {
                if (!empty($line)) {
                    $seperline = explode(",", $line);
                    echo "<tr>";
                    foreach ($seperline as $x) {
                        echo "<td>$x</td>";
                    }
                    echo "</tr>";
                }
            }
        ?>
    </table>
    <table>
        <?php
         echo "<tr><th>JOBS</th><th>TOTAL</th><th>PERCENTAGE</th></tr>";
         $data = file_get_contents("profiles.txt");
         $lines = explode("\n", $data);
         $listjob=array();$size=0;
         foreach($lines as $line){
            if(!empty($line)){
            $size+=1;
            $seperline = explode(",", $line);
            array_push($listjob,$seperline[4]);
        }}
        $listjob=array_count_values($listjob);
        foreach($listjob as $key=>$value){
            $temp=round(($value/$size)*100,2);
            echo "<tr><td>$key</td><td>$value</td><td>$temp</td></tr>";

        }
        
        ?>
    </table>
</body>
</html>
