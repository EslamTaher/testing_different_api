<?php

session_start();
echo $_SESSION['token'];

// curl -i -X GET \
//  "https://graph.facebook.com/v7.0/2623227407999939_2618945935094753?access_token=EAAJmDR30rToBAEWW417Lyjtzz5P0WycLsl8AXbTTCZA39D2OKz0QrsTjOhSGKGL2TKe5g6YwgaMFf1l6KJWTTBvbny9CZCzUSDsGQv986u8H7MLmDK6Wp8BWavNAv8xetF81lZAqh0JfdCfmqOsbaXlnZBfZBZCkfYiQNXsQaR5c6LfUVyrqNT2EII9Mq6QVgBs5wyfHAhOq6ZBDacbGEQ0ElfZBON9HUKPvcAZBKWVwPMwZDZD"

$curl = curl_init();
echo "https://graph.facebook.com/v7.0/2623227407999939_2618945935094753?access_token=".$_SESSION['token'];
// if (isset($_SESSION["token"])) {
//     $access_token = $_SESSION["token"];
//     echo $access_token;
//     $user_data = file_get_contents("https://graph.facebook.com/v3.2/me/?fields=picture,name&access_token=$access_token");   
//     $user_data = json_decode($user_data);
//     var_dump( $user_data);
// }
// else {
//     header("location: /login.php" );
//     exit;
// }


$access_token =$_SESSION['token'];
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://graph.facebook.com/v3.2/me/?fields=picture,name&access_token=$access_token",
  
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);
$da=json_decode( $response);
var_dump( json_decode( $response));

?>
<hr>
<?php   print_r( $da) ; ?>
hello
<img src="<?= $da->picture->data->url?>" alt="n" srcset="">