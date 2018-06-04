<?php
/*********************/
/*                   */
/*  Dezend for PHP5  */
/*         NWS       */
/*      Nulled.WS    */
/*                   */
/*********************/

function memberconfig( )
{
				global $msql;
				$msql->query( "select * from {P}_member_config" );
				while ( $msql->next_record( ) )
				{
								$variable = $msql->f( "variable" );
								$value = $msql->f( "value" );
								$GLOBALS['MEMBERCONF'][$variable] = $value;
				}
				$msql->query( "select * from {P}_member_centset" );
				if ( $msql->next_record( ) )
				{
								$GLOBALS['MEMBERCONF']['centname1'] = $msql->f( "centname1" );
								$GLOBALS['MEMBERCONF']['centname2'] = $msql->f( "centname2" );
								$GLOBALS['MEMBERCONF']['centname3'] = $msql->f( "centname3" );
								$GLOBALS['MEMBERCONF']['centname4'] = $msql->f( "centname4" );
								$GLOBALS['MEMBERCONF']['centname5'] = $msql->f( "centname5" );
				}
}

function membertypelist( )
{
				global $msql;
				$nowtypeid = $_GET['membertypeid'];
				$typelist = "";
				$msql->query( "select * from {P}_member_type where ifcanreg='1'" );
				while ( $msql->next_record( ) )
				{
								$membertypeid = $msql->f( "membertypeid" );
								$membertype = $msql->f( "membertype" );
								if ( $nowtypeid == $membertypeid )
								{
												$typelist .= "<option value='".$membertypeid."' selected>".$membertype."</option>";
								}
								else
								{
												$typelist .= "<option value='".$membertypeid."'>".$membertype."</option>";
								}
				}
				return $typelist;
}

function birthyear( $yy )
{
				$FormString = "";
				if ( !isset( $yy ) )
				{
								$yy = 1970;
				}
				$t = 1902;
				for ( ;	$t <= 2008;	$t++	)
				{
								if ( $yy == $t )
								{
												$FormString .= "<option value='{$t}' selected>{$t}</option>";
								}
								else
								{
												$FormString .= "<option value='{$t}' >{$t}</option>";
								}
				}
				return $FormString;
}

function birthmonth( $mm )
{
				$FormString = "";
				$t = 1;
				for ( ;	$t <= 12;	$t++	)
				{
								if ( $mm == $t )
								{
												$FormString .= "<option value='{$t}' selected>{$t}</option>";
								}
								else
								{
												$FormString .= "<option value='{$t}' >{$t}</option>";
								}
				}
				return $FormString;
}

function birthday( $dd )
{
				$FormString = "";
				$t = 1;
				for ( ;	$t <= 31;	$t++	)
				{
								if ( $dd == $t )
								{
												$FormString .= "<option value='{$t}' selected>{$t}</option>";
								}
								else
								{
												$FormString .= "<option value='{$t}' >{$t}</option>";
								}
				}
				return $FormString;
}

function passlist( $passtype )
{
				global $strPass1;
				global $strPass2;
				global $strPass3;
				global $strPass4;
				$str = "<option value=".$strPass1." ".seld( $strPass1, $passtype ).">".$strPass1."</option>\r\n\t\t\t  <option value=".$strPass2." ".seld( $strPass2, $passtype ).">".$strPass2."</option>\r\n\t\t\t  <option value=".$strPass3." ".seld( $strPass3, $passtype ).">".$strPass3."</option>\r\n\t\t\t  <option value=".$strPass4." ".seld( $strPass4, $passtype ).">".$strPass4."</option>";
				return $str;
}

function zonelist( $zoneid )
{
				global $fsql;
				global $tsql;
				$FormString .= "<script language=javascript>";
				$fsql->query( "select * from {P}_member_zone where pid = '0' order by xuhao" );
				$i = 0;
				while ( $fsql->next_record( ) )
				{
								$zone_id = $fsql->f( "catid" );
								$zone = $fsql->f( "cat" );
								$FormString .= "pList.add(new province(\"{$zone}\",\"{$zone_id}\"));";
								$tsql->query( "select * from {P}_member_zone where pid = '{$zone_id}'  order by xuhao " );
								$e = 0;
								while ( $tsql->next_record( ) )
								{
												$szoneid = $tsql->f( "catid" );
												$szone = $tsql->f( "cat" );
												$FormString .= "pList.addAt('{$i}',new area(\"{$szone}\",\"{$szoneid}\"));";
												if ( $szoneid == $zoneid )
												{
																$Province = $i;
												}
												$e++;
								}
								if ( $e < 1 )
								{
												$FormString .= "pList.addAt('{$i}',new area(\"ALL\",\"{$zone_id}\"));";
												if ( $zone_id == $zoneid )
												{
																$Province = $i;
												}
								}
								$i++;
				}
				$FormString .= "</script>";
				$ZONE['str'] = $FormString;
				$ZONE['pr'] = $Province;
				return $ZONE;
}

function membercentwidth( $cent )
{
				$a = ceil( $cent / 100 ) + 1;
				if ( 105 <= $a )
				{
								return 105;
				}
				return $a;
}

memberconfig( );
?>
