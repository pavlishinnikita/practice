<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/form.css">
    <script src="js/validation.js"></script>
    <title>Title</title>
</head>
<body>
<form name="mainForm" action="index.php?action=weather" method="post" class="" name="weatherForm" onsubmit="return validate();">
    <label for="etCity">Your city:</label><input type="text" placeholder="Enter your city" name="city" id="etCity" class="etCustom" required>
    <label for="etDate">Your date:</label><input type="date" placeholder="YYYY-MM-DD" name="date" id="etDate" class="etCustom">
    <p><b>Select units: </b></p>
    <p><input name="userDeg" type="radio" value="" checked>Kelvins</p>
    <p><input name="userDeg" type="radio" value="imperial">Fahrenheit</p>
    <p><input name="userDeg" type="radio" value="metric">Celsius</p>
    <input type="submit" id="btnSubmit" name="btnSubmit" value="Send...">
</form>
</body>
</html>
