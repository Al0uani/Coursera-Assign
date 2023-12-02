<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Profiles</title>
</head>
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
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px; /* Add margin to separate form and navbar */
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            width: 30%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
<body>
    <?php include('navbar.html'); ?>
    <form action="search.php" method="post">
        <label for="Userin">Profile : </label>
        <input type="text" name="Userin" placeholder="Enter name"><br>
        <button type="submit" name="sub">Search</button>
    </form>
    <table>
        <?php
            $pattern_text='/^[a-zA-Z]{3,16}$/';
            echo "<tr><th>FirstName</th><th>LastName</th><th>Gender</th><th>Phone</th><th>Job</th></tr>";
            if(isset($_POST['sub'])){
                $in=$_POST['Userin'];
                if(preg_match($pattern_text,$in)){
                $data=file_get_contents("profiles.txt");
                $lines=explode("\n",$data);
                foreach($lines as $line){
                if(!empty($line)){
                    $col=explode(",",$line);
                    if(strtolower($col[0])==strtolower($in) || strtolower($col[1])==strtolower($in)){
                       echo "<tr>";
                       foreach($col as $x){echo "<td>$x</td>";}
                       echo "</tr>";}}
                    
        }}}
        ?>
    </table>
</body>
</html>