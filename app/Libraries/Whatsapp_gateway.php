<?php
namespace App\Libraries; 
class Whatsapp_gateway{
    /* 
    *   Libraries Name: Waviro Ci4 LIbraries
    *   Author: Farraz Web Project
    *   Version: 1.0 - Beta
    */
    protected $message = 'Test Send OTP';
    protected $recipient = null;
    protected $response = null;
    protected $error = null;
    protected $success = true;
    protected $notifyUrl = '';
    protected $secretKey = '';
    protected $waviroUrl = '';
    public function __call($method, $args = null){
        return $this->call($method, $args);
    }
    public static function __callStatic($method, $args = null){
        return (new static())->call($method, $args);
    }
    private function call($method, $args = null){
        if(!method_exists($this, '_'.$method)){
            throw new \Exception('Call undefined method ' . $method);
        }
        $this->secretKey = $_ENV['WAVIRO_KEY'];
        $this->waviroUrl = $_ENV['WAVIRO_URL'];
        return $this->{'_' . $method}(...$args);
    }
    private function _setMessage(string $message = null){
        $this->message = $message;
        return $this;
    }
    private function _setRecipient(string $recipient = null){
        $this->matchRecipient($recipient);
        $this->recipient = $recipient;
        return $this;
    }
    private function matchRecipient(&$number){
        $first = substr($number, 0, 1);
        $sisa = substr($number, 1);
        if($first == '0'){
            $number = '62'.$sisa;
        }
        if($first == '+'){
            $number = $sisa;
        }
    }
    private function _setNotifyUrl(string $url = null)
    {
        $this->notifyUrl = $url;
        return $this;
    }
    
    private function _getResponse(){
        return $this->response;
    }
    private function _getError(){
        return $this->error;
    }
    private function _checkSuccess(){
        return $this->success;
    }
    private function _send(){
        if(empty($this->waviroUrl)){
            throw new \Exception('Waviro Url Not Set Up Correctly in Env File');
        }
        if(empty($this->secretKey)){
            throw new \Exception('Secret Key Not Set Up Correctly in Env File');
        }
        if(empty($this->recipient)){
            throw new \Exception('Recipient Not Set Up Correctly');
        }
        $postdata = array('nohp' => $this->recipient, 'pesan' => $this->message);
        if(!empty($this->notifyUrl)){
            $postdata['notifyurl'] = $this->notifyUrl;
        }

        $payload = json_encode($postdata);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->waviroUrl);
        curl_setopt($ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json; charset=utf-8',
                'SecretKey:'.$this->secretKey
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
        $rs = @$response['message'];
        $error = @$response['errorMessage'];
        curl_close($ch);
        if ($response['success'] == true){
        }elseif($response['success'] == false){
            log_message('error', '[Waviro Error] {message}', ['message' => $rss]);
            $this->success = false;
        }
        if(!empty($rs)){
            $this->response = $rs;
        }
        if(!empty($error)){
            $this->error = $error;
        }
        return $this;
    }
}