<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@900&display=swap" rel="stylesheet">
    <title>MainPage</title>
</head>
<style>
    *{margin:0px;}
    img{
        width:100%;
        height: 100px;
        object-fit:cover;
        margin-bottom:0px
    }
    h1{
        display:flex;
        justify-content:center;
        align-items:center;
        padding:50px;
        font-family: 'Poppins', sans-serif;
    }
    .container{
            background-color:lightgray;
            transform: translate(0%,100%);
            box-shadow: 5pt 0pt 5pt black;
    }
    body{
        background:rgb(86,128,128);
    }

</style>
<body>
    <header>
        <img src="https://www.nachhaltigkeitspreis.de/media/3-Wettbewerb/3-Design/2021/DNP_Keyvisual_Design_2021_01.jpg">
    </header>
    <?php  include('navbar.html') ?>
    <div class="container"><h1>Welcome to the Revision Website</h1></div>
</body>
</html>