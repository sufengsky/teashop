<?php
define("ROOTPATH", "../../");
include(ROOTPATH."includes/common.inc.php");

$g=$_GET["g"];
$arr=explode("|",$g);
$groupid=$arr[0];
$rp=$arr[1];

echo "<";
echo "?xml ";
echo "version='1.0'  encoding='utf-8' ";
echo "?";
echo ">\n";
echo "<bcaster autoPlayTime='3'>\n";

	$msql->query("select * from {P}_advs_lb  where groupid='$groupid' order by xuhao limit 0,9");
	while($msql->next_record()){
		$id=$msql->f('id');
		$src=$msql->f('src');
		$url=$msql->f('url');
		$src=$rp.$src;
		echo "<item item_url='".$src."'  link='".$url."'  itemtitle=''></item>\n";
	}
echo "</bcaster>";
?>
