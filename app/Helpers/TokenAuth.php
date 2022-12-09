<?php

namespace App\Helpers;

/**
 * TokenAuth 
 * 
 * @author          Hector Coello
 * @license         MIT
 * @version         3.0.0
 * 
 */

class TokenAuth {

    private $key= 'tokens-key-for-api';

	public function __construct($new_key="") {
		if($new_key!=""){
			$this->key = $new_key;
		}
	}

	function set_key($key) {
		$this->key = $key;
	}

	function validate($token, $header=false, $idus=""){

        if($header){
            $token = isset(getallheaders()[$token]) ? getallheaders()[$token] : '';
            $this->token = $token;
        }else{
            $this->token = $token;
        }
		
		if($this->token==""){
			return array('success' => false, 'data' => null, 'detail' => '0000');
		}

		$tk_array = explode(".", $token);

		$tk_array[0]= (isset($tk_array[0]))? $tk_array[0] : "";
		$tk_array[1]= (isset($tk_array[1]))? $tk_array[1] : "";
		$tk_array[2]= (isset($tk_array[2]))? $tk_array[2] : "";

		$text = $tk_array[0] . "." . $tk_array[1];
		$data = json_decode(base64_decode( $tk_array[1]), true);
		
		$hash = ( $tk_array[2] == hash_hmac("sha256", $text, $this->key, false) );
		$user= ( $idus == "" || ( isset( $data['id'] ) && $data['id'] == $idus ) ); 
		$active =  isset( $data['exp'] ) ? ( ( $data['exp'] - time() ) > 0 ) : false;
		$browser = isset( $data['aud'] ) ? ( @$_SERVER['HTTP_USER_AGENT'] == $data['aud'] ) : false; 
		
		$success = ($hash && $user && $active && $browser);

		$detail = ($hash)? 1:0; 
		$detail .= ($user)? 1:0; 
		$detail .= ($active)? 1:0; 
		$detail .= ($browser)? 1:0; 

		return array(
			'success' => $success,
			'data' => ($success) ? $data : null,
			'detail' => $detail
		);

    }
    
    function data($tk=""){
		if($tk==""){
			$tk = $this->token;
		}
		$tk_array = explode(".", $tk);
		$tk_array[1]= (isset($tk_array[1]))? $tk_array[1] : "";
		return json_decode(base64_decode($tk_array[1]),true);
	}

	function generate( $id, $email, $data="", $duracion=1 ){
	  $header = json_encode(array('alg' => "HS256", 'typ' => "JWT"));
	  $time = time();
	  $aud = @$_SERVER['HTTP_USER_AGENT'];
	  $payload = json_encode(array('id' => $id, 'email' => $email, 'data' => $data, 'aud' => $aud, 'iat' => $time, 'exp' => $time + (3600*$duracion)));
	  $encodedHeader= base64_encode($header);
	  $encodedPayload= base64_encode($payload);
	  $signature = hash_hmac("sha256", $encodedHeader . "." . $encodedPayload, $this->key, false);
	  return $encodedHeader . "." . $encodedPayload . "." . $signature;
	}


}  