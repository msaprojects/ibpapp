<?php
    session_start();
    $profile = "103.238.203.168:9999/login";       
    $ch = curl_init($profile);

    $basedata = array(
        'username'=> $_POST['username'],
        'password'=> $_POST['password']
    );

   
    $de = json_encode($basedata);

    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $de);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/x-www-form-urlencoded"));
    
    $response = curl_exec($ch);
    $dee = json_decode($response, true);
//echo $dee['data'][0]['idcustomer'];

    if ($dee['data'][0]['nama']!=""){
        $_SESSION['nama'] = $dee['data'][0]['nama'];
        $_SESSION['idcustomer'] = $dee['data'][0]['idcustomer'];
        $_SESSION['logged_in'] = "true";

        header('Location: datagrupkavling.php');
    }else{
	die("login gagal");
        header('Location: login.php');
    }

?>
