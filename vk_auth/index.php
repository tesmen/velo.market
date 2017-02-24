<?
SESSION_START();
define ('PATH', explode('velo.market', __DIR__)[0].'velo.market');
include PATH.'/backend/header.php';
include PATH.'/backend/params.php';
include PATH.'/backend/connect.php';
//include PATH.'/backend/debug.php';
?>

<?php

$client_id = '4793056'; // ID приложения
$client_secret = 'aeBv6Pw1LXhIQZyFq9YD'; // Защищённый ключ
$redirect_uri = 'http://velo.market/vk_auth/index.php'; // Адрес сайта

$url = 'http://oauth.vk.com/authorize';

$params = array(
	'client_id'     => $client_id,
	'redirect_uri'  => $redirect_uri,
	'response_type' => 'code'
);
$link =  $url . '?' . urldecode(http_build_query($params));

	if (!isset($_GET['code'])) {header("Location: " . $link);} else {

    $result = false;
    $params = array(
        'client_id' => $client_id,
        'client_secret' => $client_secret,
        'code' => $_GET['code'],
        'redirect_uri' => $redirect_uri
    );

    $token = json_decode(file_get_contents('https://oauth.vk.com/access_token' . '?' . urldecode(http_build_query($params))), true);

    if (isset($token['access_token'])) { 
        $params = array(
            'uids'         => $token['user_id'],
            'fields'       => 'uid,first_name,last_name,screen_name,sex,bdate,photo_big',
            'access_token' => $token['access_token']
        );

        $userInfo = json_decode(file_get_contents('https://api.vk.com/method/users.get' . '?' . urldecode(http_build_query($params))), true);
        if (isset($userInfo['response'][0]['uid'])) {
            $userInfo = $userInfo['response'][0];
            $result = true;
        }
    }

    if ($result) { $userapproved = 1; }
}
?>

<? 

if ($userapproved == 1) {
	$query = sprintf("SELECT * FROM users WHERE vk_uid='%s'", 
	mysql_real_escape_string($userInfo['uid']));
	$result = mysql_query($query);
	$array = mysql_fetch_array($result);
	//echo $query . '<br>';
	//print_r($array);
	$userexists = mysql_num_rows(mysql_query($query));

	switch($userexists) {
		case 0: $register = 1;  unset($auth); break;
		case 1: $auth = 1;  unset($register); break;
	}
	//echo 'userexists: ' . $userexists;
	//echo '<br>register: ' . $register;
	//echo '<br>auth: ' . $auth;
}
if ($register == 1) {
	$query = sprintf("INSERT INTO users (vk_uid, vk_first_name, vk_screen_name, vk_sex, vk_bdate, vk_photo_big) VALUES('%s','%s','%s','%s','%s','%s')", 
	mysql_real_escape_string($userInfo['uid']),
	mysql_real_escape_string($userInfo['first_name']),
	mysql_real_escape_string($userInfo['screen_name']),
	mysql_real_escape_string($userInfo['sex']),
	mysql_real_escape_string($userInfo['bdate']),
	mysql_real_escape_string($userInfo['photo_big'])
	);
	//echo '<BR>' . $query;
	mysql_query($query);
	$_SESSION['id'] = $array[0];
	$_SESSION['login'] = $userInfo['first_name'];
	header("Location: http://velo.market/");
}
if ($auth == 1) {
	$_SESSION['id'] = $array[0];
	$_SESSION['login'] = $userInfo['first_name'];
	header("Location: http://velo.market/");
}



// echo "Социальный ID пользователя: " . $userInfo['uid'] . '<br />';
// echo "Имя пользователя: " . $userInfo['first_name'] . '<br />';
// echo "Ссылка на профиль пользователя: " . $userInfo['screen_name'] . '<br />';
// echo "Пол пользователя: " . $userInfo['sex'] . '<br />';
// echo "День Рождения: " . $userInfo['bdate'] . '<br />';
// echo '<img src="' . $userInfo['photo_big'] . '" />'; echo "<br />";

?>
</body>
</html>