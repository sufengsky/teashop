<?php
/*********************/
/*                   */
/*  Dezend for PHP5  */
/*         NWS       */
/*      Nulled.WS    */
/*                   */
/*********************/

define( "ROOTPATH", "../../" );
include( ROOTPATH."includes/admin.inc.php" );
include( "language/".$sLan.".php" );
needauth( 6 );
$pluslable = $_GET['pluslable'];
if ( $pluslable == "" )
{
				exit( );
}
header( "Content-disposition: filename=plusInstall_".$pluslable.".dat" );
header( "Content-type: application/octetstream" );
header( "Pragma: no-cache" );
header( "Expires: 0" );
$client = getenv( "HTTP_USER_AGENT" );
if ( ereg( "[^(]*\\((.*)\\)[^)]*", $client, &$regs ) )
{
				$os = $regs[1];
				if ( eregi( "Win", $os ) )
				{
								$crlf = "\r\n";
				}
}
$str = "";
$msql->query( "select * from {P}_base_plusdefault where pluslable='{$pluslable}' limit 0,1" );
if ( $msql->next_record( ) )
{
				do
				{
								$val = each( &$msql->Record )[1];
								$key = each( &$msql->Record )[0];
								if ( each( &$msql->Record ) )
								{
								}
								else if ( !is_int( $key ) )
								{
												if ( $key != "id" )
												{
																$val = str_replace( "'", "", $val );
																$str .= "".$key."=".$val.",\n";
												}
								}
								else
								{
								}
				} while ( 1 );
}
echo $str;
exit( );
?>
