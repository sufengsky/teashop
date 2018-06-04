<?php
/*********************/
/*                   */
/*  Dezend for PHP5  */
/*         NWS       */
/*      Nulled.WS    */
/*                   */
/*********************/

function plussetsel( $var )
{
				if ( $var == "1" )
				{
								return "block";
				}
				else
				{
								return "none";
				}
}

function plusvalsel( $var )
{
				if ( !isset( $var ) || $var == "" || $var == "0" )
				{
								return "0";
				}
				else
				{
								return $var;
				}
}

function plusdefvalue( $var, $new )
{
				if ( !isset( $var ) || $var == "" || $var == "0" )
				{
								return $new;
				}
				else
				{
								return $var;
				}
}

function plusvalnone( $var )
{
				if ( !isset( $var ) || $var == "" || $var == "0" )
				{
								return "none";
				}
				else
				{
								return $var;
				}
}

function plusvaldef( $var )
{
				if ( !isset( $var ) || $var == "" || $var == "0" )
				{
								return "0";
				}
				else if ( $var == "-1" )
				{
								return "-1";
				}
				else
				{
								return "1";
				}
}

function plusinputdis( $var, $iname )
{
				if ( !isset( $var ) || $var == "" || $var == "0" || $var == "-1" )
				{
								return " style='visibility:hidden' ";
				}
				else
				{
								return " ";
				}
}

function plustrdis( $trname )
{
				if ( !isset( $trname ) || $trname == "-1" )
				{
								return " style='display:none' ";
				}
				else
				{
								return "";
				}
}

function plustrmuldis( $trname, $set_ifmul, $set_pluslocat )
{
				if ( !isset( $trname ) || $trname == "-1" )
				{
								if ( $set_ifmul == "0" && $set_pluslocat == "all" )
								{
												return "";
								}
								else
								{
												return " style='display:none' ";
								}
				}
				else
				{
								return "";
				}
}

?>
