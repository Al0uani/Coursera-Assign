<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Profile</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f8ff;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
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

        input,
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        .gender-group {
            display: flex;
            align-items: center;
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
    <?php include('navbar.html') ?>
</head>
<body>
    <form action="save.php" method="post">
        <label for="Fname">FirstName : </label>
        <input type="text" name="Fname" placeholder="Enter Firstname" required><br>
        <label for="Lname">LastName : </label>
        <input type="text" name="Lname" placeholder="Enter Lastname" required><br>
        <label for="phone">Phone : </label>
        <input type="text" name="phone" placeholder="Enter Phone number" required><br>
        <label>Gender : </label>
        <div class="gender-group">
            <input type="radio" id="male" name="gender" value="male" required>
            <label for="male">Male</label>

            <input type="radio" id="female" name="gender" value="female" required>
            <label for="female">Female</label>
        </div><br>
        <label for="job">Current position: </label>
        <select name="job">
            <option name="job" value="unemployed">Unemployed</option>
            <option name="job" value="employed">Employed</option>
            <option name="job" value="student">Student</option>
            <option name="job" value="other">Other</option>
        </select><br>
        <button type="submit" name="sub">Submit</button>
    </form>
</body>
</html>
<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){

        if(isset($_POST['sub'])){
            $pattern_text='/^[a-zA-Z]{3,16}$/';
            $pattern_phone='/^(?:\+212)\d{9}|(?:05|06|07)\d{8}$/';
            $first=$_POST['Fname'];$first=trim($first);
            $Last=$_POST['Lname'];$Last=trim($Last);
            if(preg_match($pattern_text,$first)){
                if(preg_match($pattern_text,$Last)){
                    $tel=$_POST['phone'];$tel=trim($tel);
                    if(preg_match($pattern_phone,$tel)){
                        $sex=$_POST['gender'];
                        if(isset($sex)){
                            $jobs=$_POST['job'];
                            $data="$first,$Last,$sex,$tel,$jobs\n";
                            $fileHandle = fopen("profiles.txt", "a");
                        if (flock($fileHandle, LOCK_EX)) {
                            fwrite($fileHandle, $data);
                            flock($fileHandle, LOCK_UN);
                            fclose($fileHandle);
                            exit();} 
                            else {echo "Couldn't get the lock!";}
                        }else{echo "<br>Gender not selected";}
                    }else{echo "<br>Invalid Phone";}
                }else{echo "<br>Invalid LastName";}
            }else{echo "Invalid Firstname<br>";}
        }
    }


?>
