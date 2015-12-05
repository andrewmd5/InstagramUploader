<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta name="description" content="Upload files that aren't going anywhere.">
    <meta name="author" content="Andrew Sampson">

    <title>Secure Upload</title>
    <style type="text/css">
        a{ text-decoration: none; color: #333}
        h1{ font-size: 1.9em; margin: 10px 0}
        p{ margin: 8px 0}
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            -webkit-font-smoothing: antialiased;
            -moz-font-smoothing: antialiased;
            -o-font-smoothing: antialiased;
            font-smoothing: antialiased;
            text-rendering: optimizeLegibility;
        }
        body{
            font: 12px Arial,Tahoma,Helvetica,FreeSans,sans-serif;
            text-transform: inherit;
            color: #333;
            background: #e7edee;
            width: 100%;
            line-height: 18px;
        }
        .wrap{
            width: 500px;
            margin: 15px auto;
            padding: 20px 25px;
            background: white;
            border: 2px solid #DBDBDB;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            overflow: hidden;
            text-align: center;
        }
        .status{
            /*display: none;*/
            padding: 8px 35px 8px 14px;
            margin: 20px 0;
            text-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);
            color: #468847;
            background-color: #dff0d8;
            border-color: #d6e9c6;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
        }
        input[type="submit"] {
            cursor:pointer;
            width:100%;
            border:none;
            background:#991D57;
            background-image:linear-gradient(bottom, #8C1C50 0%, #991D57 52%);
            background-image:-moz-linear-gradient(bottom, #8C1C50 0%, #991D57 52%);
            background-image:-webkit-linear-gradient(bottom, #8C1C50 0%, #991D57 52%);
            color:#FFF;
            font-weight: bold;
            margin: 20px 0;
            padding: 10px;
            border-radius:5px;
        }
        input[type="submit"]:hover {
            background-image:linear-gradient(bottom, #9C215A 0%, #A82767 52%);
            background-image:-moz-linear-gradient(bottom, #9C215A 0%, #A82767 52%);
            background-image:-webkit-linear-gradient(bottom, #9C215A 0%, #A82767 52%);
            -webkit-transition:background 0.3s ease-in-out;
            -moz-transition:background 0.3s ease-in-out;
            transition:background-color 0.3s ease-in-out;
        }
        input[type="submit"]:active {
            box-shadow:inset 0 1px 3px rgba(0,0,0,0.5);
        }
    </style>

</head>
<body>

<h1 class="status_return">
    <div id="sentback">
       Instagram upload test
    </div>
</h1>

<div class="wrap">

    <p>Valid formats jpg, png, gif</p>
    <br />
    <br />
    <!-- Multiple file upload html form-->
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Username
		<input type="text" id="username" name="username">
		Password
		<input type="password" id="password" name="password">
		Caption
        <input type="text" id="caption" name="caption">
        <input type="file" name="files[]" multiple="" accept="image/*"/>
        </br>
        <input type="submit" value="Upload">
    </form>
</div>

<script src="js/app.js"></script>
<script src="js/jquery.js"></script>
</body>
</html>