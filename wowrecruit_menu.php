<?php
if (!defined('e107_INIT')) { exit; }
define("WOWREC", e_PLUGIN."wowrecruit_menu/");
include_lan(WOWREC."languages/".e_LANGUAGE.".php");

if(isset($pref['plug_installed']['avalanche'])){
	$useAvalanche = true;
}else{
	$useAvalanche = false;
}

$applyurl = ($useAvalanche == true ? e_PLUGIN."avalanche/apply.php" : (($pref['wowrecruit_url']) ? $pref['wowrecruit_url'] : "#"));

function recruitBlock($class, $spec, $needed){
	return "
	<tr>
		<td><img src='".WOWREC."images/".strtolower(str_replace(" ", "", $class)).".jpg' style='border:0; width:20px; height:20px;' /></td>
		<td style='text-align:right;'>".$needed."</td>
		<td><span class='wow_".strtolower(str_replace(" ", "", $class))."'>".$spec." ".$class.($needed > 1 ? "s" : "")."</span></td>
	</tr>";
}

$text = "
<table border='0' style='width=100%' cellspacing='1' cellpadding='1'>
<tr>
	<td colspan='3' style='text-align: center;'>
		".WOWREC_MENU01."<br />&nbsp;
	</td>
</tr>";

if($sql->db_Count("wowrecruit_needed", "(*)") > 0){
	$sql->db_Select("wowrecruit_needed", "*", "ORDER BY count DESC", "no-where");
	while($row = $sql->db_Fetch()){
		$text .= recruitBlock($row['class'], $row['spec'], $row['count']);
	}
}else{
	$text .= "<tr>
	<td colspan='3' style='text-align:center;'>".WOWREC_MENU02."</td>
	</tr>";
}

$text .= "
<tr>
	<td colspan='3' style='text-align: center;'>
		<br /><a href='".$applyurl."'>".WOWREC_MENU03."</a>
	</td>
</tr>
</table>";

$ns->tablerender(WOWREC_MENU04, $text, 'wowrecruit');

?>