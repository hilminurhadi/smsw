<?php
/* Creator : YarzCode */
/* Auto Delete Post Facebook */
function curl($url, $fields = null, $cookie = null) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if($fields !== null) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        }  
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5000);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
}
 
$token = 'EAAAAAYsX7TsBAKD1bnLhGxFWYvEVgHBj4L8KViZB7g8o3Yx2rYhwLBx1ZAKT3vB5AILpIXYdfhupIsI96LoUW87jeXWeIHNA6h1vG8WWjcz2PwR3QkNP8wZC0ZB841xE2mnZCBV4NtyuWxhzF9BdLKX6vVRBc1pzgd0QYWOJAWYXKiFZAnBfALJYqZCqbiXNlfxtFzzTb8L1xpucf3fzirK'; // Access Token
$uu = curl("https://graph.facebook.com/me/posts?access_token=$token&limit=30000&fields=id,name");
$ua = json_decode($uu);
 
 
foreach($ua->data as $ahyar) {
    $n = '?privacy={"value":"SELF"}';
    $cu = curl("https://graph.facebook.com/v3.1/".$ahyar->id."/".$n, 'access_token='.$token);
    if(@json_decode($cu,1)['success'] == true)
    {
        echo $ahyar->id." Success set to privacy.\n";
    } else {
         echo $ahyar->id." Failed set to privacy.\n";       
    }
}
