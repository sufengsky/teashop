<?php
define("ROOTPATH", "");
include(ROOTPATH."includes/common.inc.php");
include(ROOTPATH."member/language/".$sLan.".php");
include(ROOTPATH."member/includes/member.inc.php");

$act = $_POST['act'];

switch($act){

	//设置来自应用模块的cookie
	case "setcookie":
		
		$cookietype=$_POST["cookietype"];
		$cookiename=$_POST["cookiename"];

		
		switch($cookietype){
			
			//新建购物车
			case "new":

				$goodstype=$_POST["goodstype"];
				$gid=$_POST["gid"];
				$nums=$_POST["nums"];
				$fz=$_POST["fz"];
				
				if($nums=="" || intval($nums)<1 || ceil($nums)!=$nums){
					echo "1000";
					exit;
				}

				$CART=$goodstype."|".$gid."|".$nums."|".$fz."#";
				setcookie($cookiename,$CART);
		
			break;

			
			//添加商品到购物车
			case "add":

				$goodstype=$_POST["goodstype"];
				$gid=$_POST["gid"];
				$nums=$_POST["nums"];
				$fz=$_POST["fz"];

				if($nums=="" || intval($nums)<1 || ceil($nums)!=$nums){
					echo "1000";
					exit;
				}
				
				$NEWCART=$goodstype."|".$gid."|".$nums."|".$fz."#";

				$OLDCOOKIE=$_COOKIE[$cookiename];
				
				if($OLDCOOKIE==""){
					setcookie($cookiename,$NEWCART);
				}else{
					$array=explode("#",$OLDCOOKIE);
					$tnums=sizeof($array)-1;
					$CART="";
					$ifex="0";
					for($t=0;$t<$tnums;$t++){
						$fff=explode("|",$array[$t]);
						$oldgoodstype=$fff[0];
						$oldgid=$fff[1];
						$oldacc=$fff[2];
						$oldfz=$fff[3];
						
						if($goodstype=="zh"){
							$CART.=$oldgoodstype."|".$oldgid."|".$oldacc."|".$oldfz."#";
						}else{
							if($goodstype==$oldgoodstype && $gid==$oldgid && $fz==$oldfz){
								$newacc=$oldacc+$nums;
								$CART.=$oldgoodstype."|".$oldgid."|".$newacc."|".$oldfz."#";
								$ifex="1";
							}else{
								$CART.=$oldgoodstype."|".$oldgid."|".$oldacc."|".$oldfz."#";
							}
						}
					}

					if($ifex!="1"){
						$CART.=$NEWCART;
					}
					
					setcookie($cookiename,$CART);

				}			

			break;


			//删除购物车中单个商品
			case "del":

				$goodstype=$_POST["goodstype"];
				$gid=$_POST["gid"];
				$nums=$_POST["nums"];

				$OLDCOOKIE=$_COOKIE[$cookiename];

				$array=explode("#",$OLDCOOKIE);
				$tnums=sizeof($array)-1;
				$CART="";
				for($t=0;$t<$tnums;$t++){
					$fff=explode("|",$array[$t]);
					$oldgoodstype=$fff[0];
					$oldgid=$fff[1];
					$oldacc=$fff[2];
					$oldfz=$fff[3];

					if($goodstype!=$oldgoodstype || $gid!=$oldgid || $nums!=$oldacc){
						$CART.=$oldgoodstype."|".$oldgid."|".$oldacc."|".$oldfz."#";
					}
				}

				setcookie($cookiename,$CART);

			break;


			//修改购物车单个商品数量
			case "modi":

				$goodstype=$_POST["goodstype"];
				$gid=$_POST["gid"];
				$fz=$_POST["fz"];
				$nums=$_POST["nums"];

				if($nums=="" || intval($nums)<1 || ceil($nums)!=$nums){
					echo "1000";
					exit;
				}

				$OLDCOOKIE=$_COOKIE[$cookiename];

				$array=explode("#",$OLDCOOKIE);
				$tnums=sizeof($array)-1;
				$CART="";
				for($t=0;$t<$tnums;$t++){
					$fff=explode("|",$array[$t]);
					$oldgoodstype=$fff[0];
					$oldgid=$fff[1];
					$oldacc=$fff[2];
					$oldfz=$fff[3];

					if($gid==$oldgid && $fz==$oldfz){
						$CART.=$oldgoodstype."|".$oldgid."|".$nums."|".$oldfz."#";
					}else{
						$CART.=$oldgoodstype."|".$oldgid."|".$oldacc."|".$oldfz."#";
					}
				}

				setcookie($cookiename,$CART);

			break;


			//清空购物车
			case "empty":
				setcookie($cookiename);
			break;
		
		}

		echo "OK";
		exit;

	break;	

}
?>