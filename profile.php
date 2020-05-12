<?php

session_start();
// echo $_SESSION['token'];

// curl -i -X GET \
//  "https://graph.facebook.com/v7.0/2623227407999939_2618945935094753?access_token=EAAJmDR30rToBAEWW417Lyjtzz5P0WycLsl8AXbTTCZA39D2OKz0QrsTjOhSGKGL2TKe5g6YwgaMFf1l6KJWTTBvbny9CZCzUSDsGQv986u8H7MLmDK6Wp8BWavNAv8xetF81lZAqh0JfdCfmqOsbaXlnZBfZBZCkfYiQNXsQaR5c6LfUVyrqNT2EII9Mq6QVgBs5wyfHAhOq6ZBDacbGEQ0ElfZBON9HUKPvcAZBKWVwPMwZDZD"

$curl = curl_init();
// echo "https://graph.facebook.com/v7.0/2623227407999939_2618945935094753?access_token=".$_SESSION['token'];
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
  CURLOPT_URL =>   "https://graph.facebook.com/v7.0/me?fields=last_name%2Cpicture%2Cname%2Cposts%7Breactions%7D&access_token=".$access_token  ,
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
if (  property_exists($da->posts->data[1] , 'reactions')){
  // var_dump(($da->posts->data[1]->reactions->data));
}
// var_dump(count($da->posts->data));
$most =0;
$post ;

foreach ($da->posts->data as &$vv) {
  // var_dump($vv);
  // echo "<hr>";
  if (  property_exists($vv , 'reactions')){
    // echo "<hr>";
    // var_dump(count($vv->reactions->data));
    if (count($vv->reactions->data)>$most){
      $most= count($vv->reactions->data) ;
      $post = $vv;
    }
    
  }
}
echo $most;
echo "<h1> the most likely post is  with likes ($most) </h1>";
var_dump($post);
// likees for post   $da->posts->data[0]->reactions->data
echo "<hr>";
var_dump(property_exists($da, 'name'));
echo "<hr>";

// var_dump($da);


// var_dump( json_decode( $response));

?>
<hr>
<!-- <?php   print_r( $da) ; ?> -->
hello
<hr>
<h1>image:</h1>
<img style="width: 190px" src="<?= $da->picture->data->url?>" alt="n" srcset="">

<h1>name:</h1>

<h3> <?= $da->name?> </h3>


<h1>id:</h1>

<h3> <?= $da->id?> </h3>
<!-- //////////////////////////////////////////////// -->
<?php



