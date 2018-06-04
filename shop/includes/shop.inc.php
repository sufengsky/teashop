<?php
/*********************/
/*                   */
/*  Dezend for PHP5  */
/*         NWS       */
/*      Nulled.WS    */
/*                   */
/*********************/

function shopconfig( )
{
				global $msql;
				$msql->query( "select * from {P}_shop_config" );
				while ( $msql->next_record( ) )
				{
								$variable = $msql->f( "variable" );
								$value = $msql->f( "value" );
								$GLOBALS['SHOPCONF'][$variable] = $value;
				}
}

function getmemberprice( $gid, $price )
{
				global $tsql;
				if ( islogin( ) )
				{
								$membertypeid = $_COOKIE['MEMBERTYPEID'];
								$pricerule = $GLOBALS['SHOPCONF']['PriceRule'];
								if ( $pricerule == "1" )
								{
												$tsql->query( "select `pr` from {P}_shop_pricerule where `membertypeid`='{$membertypeid}'" );
												if ( $tsql->next_record( ) )
												{
																$pr = $tsql->f( "pr" );
																$price = $price * $pr;
																return $price;
												}
												else
												{
																return $price;
												}
								}
								else
								{
												$tsql->query( "select `price` from {P}_shop_memberprice where `gid`='{$gid}' and `membertypeid`='{$membertypeid}'" );
												if ( $tsql->next_record( ) )
												{
																$price = $tsql->f( "price" );
																return $price;
												}
												else
												{
																return $price;
												}
								}
				}
				else
				{
								return $price;
				}
}

function accountcent( $cent, $price )
{
				$centopen = $GLOBALS['SHOPCONF']['CentOpen'];
				$centmodle = $GLOBALS['SHOPCONF']['CentModle'];
				$centrate = $GLOBALS['SHOPCONF']['CentRate'];
				if ( $centopen == "1" && islogin( ) )
				{
								if ( $centmodle == "1" )
								{
												return floor( $cent );
								}
								else
								{
												$cent = $price * $centrate;
												return floor( $cent );
								}
				}
}

function shopstarnums( $n, $RP )
{
				$str = "";
				if ( $n < 0.5 )
				{
								$str = "<img src=".$RP."shop/templates/images/icon_star_1.gif>";
								$str .= "<img src=".$RP."shop/templates/images/icon_star_1.gif>";
								$str .= "<img src=".$RP."shop/templates/images/icon_star_1.gif>";
								$str .= "<img src=".$RP."shop/templates/images/icon_star_1.gif>";
								$str .= "<img src=".$RP."shop/templates/images/icon_star_1.gif>";
				}
				if ( 0.5 <= $n && $n < 1 )
				{
								$str = "<img src=".$RP."shop/templates/images/icon_star_3.gif>";
								$str .= "<img src=".$RP."shop/templates/images/icon_star_1.gif>";
								$str .= "<img src=".$RP."shop/templates/images/icon_star_1.gif>";
								$str .= "<img src=".$RP."shop/templates/images/icon_star_1.gif>";
								$str .= "<img src=".$RP."shop/templates/images/icon_star_1.gif>";
				}
				if ( 1 <= $n && $n < 1.5 )
				{
								$str = "<img src=".$RP."shop/templates/images/icon_star_2.gif>";
								$str .= "<img src=".$RP."shop/templates/images/icon_star_1.gif>";
								$str .= "<img src=".$RP."shop/templates/images/icon_star_1.gif>";
								$str .= "<img src=".$RP."shop/templates/images/icon_star_1.gif>";
								$str .= "<img src=".$RP."shop/templates/images/icon_star_1.gif>";
				}
				if ( 1.5 <= $n && $n < 2 )
				{
								$str = "<img src=".$RP."shop/templates/images/icon_star_2.gif>";
								$str .= "<img src=".$RP."shop/templates/images/icon_star_3.gif>";
								$str .= "<img src=".$RP."shop/templates/images/icon_star_1.gif>";
								$str .= "<img src=".$RP."shop/templates/images/icon_star_1.gif>";
								$str .= "<img src=".$RP."shop/templates/images/icon_star_1.gif>";
				}
				if ( 2 <= $n && $n < 2.5 )
				{
								$str = "<img src=".$RP."shop/templates/images/icon_star_2.gif>";
								$str .= "<img src=".$RP."shop/templates/images/icon_star_2.gif>";
								$str .= "<img src=".$RP."shop/templates/images/icon_star_1.gif>";
								$str .= "<img src=".$RP."shop/templates/images/icon_star_1.gif>";
								$str .= "<img src=".$RP."shop/templates/images/icon_star_1.gif>";
				}
				if ( 2.5 <= $n && $n < 3 )
				{
								$str = "<img src=".$RP."shop/templates/images/icon_star_2.gif>";
								$str .= "<img src=".$RP."shop/templates/images/icon_star_2.gif>";
								$str .= "<img src=".$RP."shop/templates/images/icon_star_3.gif>";
								$str .= "<img src=".$RP."shop/templates/images/icon_star_1.gif>";
								$str .= "<img src=".$RP."shop/templates/images/icon_star_1.gif>";
				}
				if ( 3 <= $n && $n < 3.5 )
				{
								$str = "<img src=".$RP."shop/templates/images/icon_star_2.gif>";
								$str .= "<img src=".$RP."shop/templates/images/icon_star_2.gif>";
								$str .= "<img src=".$RP."shop/templates/images/icon_star_2.gif>";
								$str .= "<img src=".$RP."shop/templates/images/icon_star_1.gif>";
								$str .= "<img src=".$RP."shop/templates/images/icon_star_1.gif>";
				}
				if ( 3.5 <= $n && $n < 4 )
				{
								$str = "<img src=".$RP."shop/templates/images/icon_star_2.gif>";
								$str .= "<img src=".$RP."shop/templates/images/icon_star_2.gif>";
								$str .= "<img src=".$RP."shop/templates/images/icon_star_2.gif>";
								$str .= "<img src=".$RP."shop/templates/images/icon_star_3.gif>";
								$str .= "<img src=".$RP."shop/templates/images/icon_star_1.gif>";
				}
				if ( 4 <= $n && $n < 4.5 )
				{
								$str = "<img src=".$RP."shop/templates/images/icon_star_2.gif>";
								$str .= "<img src=".$RP."shop/templates/images/icon_star_2.gif>";
								$str .= "<img src=".$RP."shop/templates/images/icon_star_2.gif>";
								$str .= "<img src=".$RP."shop/templates/images/icon_star_2.gif>";
								$str .= "<img src=".$RP."shop/templates/images/icon_star_1.gif>";
				}
				if ( 4.5 <= $n && $n < 5 )
				{
								$str = "<img src=".$RP."shop/templates/images/icon_star_2.gif>";
								$str .= "<img src=".$RP."shop/templates/images/icon_star_2.gif>";
								$str .= "<img src=".$RP."shop/templates/images/icon_star_2.gif>";
								$str .= "<img src=".$RP."shop/templates/images/icon_star_2.gif>";
								$str .= "<img src=".$RP."shop/templates/images/icon_star_3.gif>";
				}
				if ( 5 <= $n )
				{
								$str = "<img src=".$RP."shop/templates/images/icon_star_2.gif>";
								$str .= "<img src=".$RP."shop/templates/images/icon_star_2.gif>";
								$str .= "<img src=".$RP."shop/templates/images/icon_star_2.gif>";
								$str .= "<img src=".$RP."shop/templates/images/icon_star_2.gif>";
								$str .= "<img src=".$RP."shop/templates/images/icon_star_2.gif>";
				}
				return $str;
}

function countyunfeiw( $w, $p, $gs )
{
				$yunfei = 0;
				$arr = explode( "|", $gs );
				$a1 = $arr[0];
				$b1 = $arr[1];
				$b2 = $arr[2];
				$c1 = $arr[3];
				$c2 = $arr[4];
				$c3 = $arr[5];
				$c4 = $arr[6];
				$d1 = $arr[7];
				$d2 = $arr[8];
				$d3 = $arr[9];
				$d4 = $arr[10];
				$e1 = $arr[11];
				$e2 = $arr[12];
				$f1 = $arr[13];
				$f2 = $arr[14];
				if ( $a1 != "" )
				{
								$yunfei = $yunfei + $a1;
				}
				if ( $b1 != "" && $b2 != "" )
				{
								if ( $w <= $b1 )
								{
												$yunfei = $yunfei + $b2;
												$w = 0;
								}
								else
								{
												$yunfei = $yunfei + $b2;
												$w = $w - $b1;
								}
				}
				if ( 0 < $w && $c1 != "" && $c2 != "" && $c2 != "0" && $c3 != "" )
				{
								$cha = $c1 - $b1;
								if ( $w <= $cha )
								{
												$dw = ceil( $w / $c2 );
												$yunfei = $yunfei + $dw * $c3;
												$w = 0;
								}
								else
								{
												$dw = ceil( $cha / $c2 );
												$yunfei = $yunfei + $dw * $c3;
												$w = $w - $cha;
								}
				}
				if ( 0 < $w && $d1 != "" && $d2 != "" && $d2 != "0" && $d3 != "" )
				{
								$dw = ceil( $w / $d2 );
								$yunfei = $yunfei + $dw * $d3;
				}
				$priyunfei = $yunfei;
				if ( $e1 != "" && $e2 != "" && 0 < $e2 )
				{
								if ( $e1 <= $p )
								{
												$yunfei = $priyunfei - $priyunfei * $e2 / 100;
								}
				}
				if ( $f1 != "" && $f2 != "" && 0 < $f2 )
				{
								if ( $f1 <= $p && $e1 < $f1 )
								{
												$yunfei = $priyunfei - $priyunfei * $f2 / 100;
								}
				}
				return $yunfei;
}

function countyunfeip( $w, $p, $dgs )
{
				$yunfei = 0;
				$arr = explode( "|", $dgs );
				$m1 = $arr[0];
				$m2 = $arr[1];
				$m3 = $arr[2];
				$n1 = $arr[3];
				$n2 = $arr[4];
				$n3 = $arr[5];
				$p1 = $arr[6];
				$p2 = $arr[7];
				$p3 = $arr[8];
				if ( $m1 != "" && ( $m2 != "" || $m3 != "" ) )
				{
								if ( $p <= $m1 )
								{
												if ( $m2 != "" )
												{
																$yunfei = $yunfei + $m2;
																return $yunfei;
												}
												else
												{
																$yunfei = $yunfei + $p * $m3 / 100;
																return $yunfei;
												}
								}
				}
				$priyunfei = $yunfei;
				if ( $n1 != "" && ( $n2 != "" || $n3 != "" ) )
				{
								if ( $n1 < $p )
								{
												if ( $n2 != "" )
												{
																$yunfei = $priyunfei + $n2;
												}
												else
												{
																$yunfei = $priyunfei + $p * $n3 / 100;
												}
								}
				}
				if ( $p1 != "" && ( $p2 != "" || $p3 != "" ) && $n1 < $p1 )
				{
								if ( $p1 < $p )
								{
												if ( $p2 != "" )
												{
																$yunfei = $priyunfei + $p2;
												}
												else
												{
																$yunfei = $priyunfei + $p * $p3 / 100;
												}
								}
				}
				return $yunfei;
}

shopconfig( );
?>
