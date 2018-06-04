<?php

function remove_remarks( $sql )
{
	$i = 0;
	while ( $i < strlen( $sql ) )
	{
		if ( $sql[$i] == "#" && ( $i == 0 || $sql[$i - 1] == "\n" ) )
		{
			$j = 1;
			while ( $sql[$i + $j] != "\n" )
			{
				$j++;
				if ( strlen( $sql ) < $j + $i )
				{
					break;
				}
			}
			$sql = substr( $sql, 0, $i ).substr( $sql, $i + $j );
		}
		$i++;
	}
	return $sql;
}

function split_sql_file( $sql, $delimiter )
{
	$sql = trim( $sql );
	$char = "";
	$last_char = "";
	$ret = array( );
	$string_start = "";
	$in_string = FALSE;
	$escaped_backslash = FALSE;
	
	for ( $i = 0;	$i < strlen( $sql );	++$i	)
	{
		$char = $sql[$i];
		if ( $char == $delimiter && !$in_string )
		{
			$ret[] = substr( $sql, 0, $i );
			$sql = substr( $sql, $i + 1 );
			$i = 0;
			$last_char = "";
		}
		if ( $in_string )
		{
			if ( $char == "\\" )
			{
				if ( $last_char != "\\" )
				{
					$escaped_backslash = FALSE;
				}
				else
				{
					$escaped_backslash = !$escaped_backslash;
				}
			}
			if ( $char == $string_start && ( $char == "`" || !( $last_char == "\\" && !$escaped_backslash ) ) )
			{
				$in_string = FALSE;
				$string_start = "";
			}
		}
		else if ( $char == "\"" || $char == "'" || $char == "`" )
		{
			$in_string = TRUE;
			$string_start = $char;
		}
		$last_char = $char;
	}
	if ( !empty( $sql ) )
	{
		$ret[] = $sql;
	}
	return $ret;
}

?>
