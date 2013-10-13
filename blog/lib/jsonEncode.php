<?php
	function arrayEncode(&$arr){
		foreach($arr as $k => $v){
			if(is_array($v)){
			arrayEncode($arr[$k]);
			}else{
				$arr[$k] = urlencode($v);
			}
			if(is_string($k)){
				$nk = urlencode($k);
				if($nk != $k){
					$arr[$nk] = $arr[$k];
					unset($arr[$k]);
				}
			}
		}
	}
	function my_json($arr){
		arrayEncode($arr);
		return urldecode(json_encode($arr));
	}
?>