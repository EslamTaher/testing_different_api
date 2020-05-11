<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<?php
include __DIR__.'/config.php';
echo APP_ID,"_______",APP_SECRET;      

?>
<hr>
    hello worlde fb
    <a href="https://www.facebook.com/v7.0/dialog/oauth?client_id=<?= APP_ID ?>&redirect_uri=<?= REDIRECT_URL?>&state={state-param}">_________facebook</a>
</head>
<body>
    
</body>
</html>