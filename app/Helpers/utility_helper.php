<?php 

function check_recaptcha($userIp,$recaptchaResponse){
    // $userIp=$this->request->ip_address();

    $google_recaptcha= '6LeFoW8bAAAAAINEObi_ll2LBv7IwhPJUJuVrQhE';
    $secret = '6LeFoW8bAAAAAIZ-vn2Y9qY4g59v4XNUD2_inmUY';

    $url="https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$recaptchaResponse."&remoteip=".$userIp;

    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, $url); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    $output = curl_exec($ch); 
    curl_close($ch);      
        
    $status= json_decode($output, true);

    return $status['success'];
}

function send_wa($phone, $message){

    $postdata = array(
        'nohp' => $phone,
        'pesan' => $message,
        // 'notifyurl' => "https://www.example.com/notify_url.php"
    );

    $payload = json_encode($postdata);

    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, "https://apicarmelanugerahmandiri.waviro.com/api/sendwa"); 
    curl_setopt($ch, 
        CURLOPT_HTTPHEADER, 
        array( 
            'Content-Type: application/json; charset=utf-8', 
            'SecretKey:0JvJjB8nnnzpUnizBjU5' 
            )
        ); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
    curl_setopt($ch, CURLOPT_HEADER, FALSE); 
    curl_setopt($ch, CURLOPT_POST, TRUE); 
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
    
    $response = curl_exec($ch); 
    $rss = $response; 
    $response = json_decode($response, TRUE); 
    // $rs = $response['message']; 
    curl_close($ch); 

    if ($response['success'] == "true")
    {
        //Write your code here if response success 
        // echo 'success';
    }elseif($response['success'] == "false")
    { 
        //Write your code here if response fail 
        // echo 'false';
    }
}