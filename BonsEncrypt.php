<?php

class BonsEncrypt{
	
	private $cry = Array();
	private $cryAlp = Array();
	
	public function __construct(){
		$this->cry = array(0=>5,1=>3,2=>9,3=>2,4=>7,5=>6,6=>1,7=>8,8=>0,9=>4);
		$this->cryAlp = array(0=>"e",1=>"x",2=>"w",3=>"c",4=>"z",5=>"f",6=>"b",7=>"k",8=>"a",9=>"d","."=>"s","-"=>"t",","=>"u"," "=>"v");
	}
	
	public function encryptAsNumber($e,$k){
		if(strlen($e)>10)die("max encrypt digits is 10");
		if(strlen($e) >= $k)die("Request encrypt must be lesser than its length");
		if(strlen($e) == 0){$e=0;};
		$e = preg_replace("#[^0-9.-, ]#","", $e);
                if($e == ""){$e=0;}
                
		$ct =  $e;
		$jump = ($k-1)-strlen($e);
		$ct = str_split($ct,1);
		$ency = $this->cry[(strlen($e))];
		$n = 0;
		for($a=0;$a<$k-1;$a++){
			if($jump > 0){
				if($a%2 == 1){
					$ency .=rand(0,9);
					$jump -=1;
				}else{
					if(isset($ct[$n])){
						$ency.=$this->cry[$ct[$n]];
						$n++;
					}else{
						$ency .=rand(0,9);
						$jump -=1;
					}
				}
			}else{
				$ind = $ct[$n];
				$ency.= $this->cry[$ind];
				$n++;
			}
		}
		return $ency;
	}
	
	public function decryptNumber($e){
                if($e == ""){return "";}
		$ar = str_split($e,1);
		$len = array_search($ar[0], $this->cry);
		$jump = strlen($e)-($len+1);
		$val = "";
		for($i=1;$i<strlen($e);$i++){
			if($i%2==0){
				if($jump >0){
					$jump--;
				}else{
					$val .=array_search($ar[$i], $this->cry);
				}
			}else{
				if($len > 0){
					$val .=array_search($ar[$i], $this->cry);
					$len--;
				}else{
					$jump--;
				}
			}
		}
		return $val;
	}
	
	public function encryptAsAlphabets($e,$k){
		$characters = 'abcdefghijklmnopqrstuvwxyz';
		round($e);
		if(strlen($e)>10)die("max encrypt digits is 10 echo ".$e);
		if(strlen($e) >= $k)die("Request encrypt must be lesser than its length");
		if(strlen($e) ==0){$e=0;};
                $e = preg_replace("#[^0-9.]#","", $e);
                if($e == ""){$e=0;}
		$ct =  $e;
		$jump = ($k-1)-strlen($e);
		$ct = str_split($ct,1);
		$ency = $this->cryAlp[(strlen($e))];
		$n = 0;
		for($a=0;$a<$k-1;$a++){
			if($jump > 0){
				if($a%2 == 1){
					$ency .=$characters[rand(0, strlen($characters) - 1)];
					$jump -=1;
				}else{
					if(isset($ct[$n])){
						$ency.=$this->cryAlp[$ct[$n]];
						$n++;
					}else{
						$ency .=$characters[rand(0, strlen($characters) - 1)];
						$jump -=1;
					}
				}
			}else{
				$ency.=$this->cryAlp[$ct[$n]];
				$n++;
			}
		}
		return $ency;
	}
	
	public function decryptAlphabets($e){
                if($e == ""){return "";}
		$ar = str_split($e,1);
		$len = array_search($ar[0], $this->cryAlp);
		$jump = strlen($e)-($len+1);
		$val = "";
		for($i=1;$i<strlen($e);$i++){
			if($i%2==0){
				if($jump >0){
					$jump--;
				}else{
					if($ar[$i] == "."){
						$val .= ".";
					}else{
						$val .=array_search($ar[$i], $this->cryAlp);
					}
				}
			}else{
				if($len > 0){
					if($ar[$i] == "."){
						$val .= ".";
					}else{
						$val .=array_search($ar[$i], $this->cryAlp);
					}
					$len--;
				}else{
					$jump--;
				}
			}
		}
		return $val;
	}
	
}
?>
