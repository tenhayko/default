<?php

namespace App\Notifications\Firebase;
use App\TaiXe;

class Devicetoken
{	
	public function getTokenByCode($code){
		$token = TaiXe::where('code', $code)->where('delete', false)->where('status', 1)->first();
		if ($token) {
			return array($token->code);//token
		}
		return false;
	}
	public function getAllTokens(){
		$token = TaiXe::select('code')->where('delete', false)->where('status', 1)->get();
		if ($token) {
			$token = $token->toArray();
			$tokens = array(); 
			foreach ($token as $key => $value) {
				 array_push($tokens, $value['code']);
			}
			return $tokens;
		}
		return false;
    }
}
