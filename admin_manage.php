<?php
if(!defined("e107_INIT")) {
	require_once("../../class2.php");
}
require_once(e_HANDLER."userclass_class.php");
if(!getperms("P")){ header("location:".e_BASE."index.php"); exit;}
require_once(e_ADMIN."auth.php");
define("WOWREC", e_PLUGIN."wowrecruit_menu/");
include_lan(WOWREC."languages/".e_LANGUAGE.".php");

if(e_QUERY){
	$tmp = explode(".", e_QUERY);
	$action = $tmp[0];
	$id = $tmp[1];
	unset($tmp);
}

if(isset($_POST['confirmrecruitdelete'])){
	$sql->db_Delete("wowrecruit_needed", "id='".intval($_POST['id'])."'");
	$message = WOWREC_MANAGE01."#".$_POST['id']."!";
}
if(isset($_POST['updatecount'])){
	$sql->db_Update("wowrecruit_needed", "count='".intval($_POST['newcount'])."' WHERE id='".intval($_POST['id'])."'");
	$message = WOWREC_MANAGE02;
}

if($action == "del"){
	$topcap = WOWREC_MANAGE03;
	$toptext = "
	<form method='post' action='".e_SELF."'>
	".WOWREC_MANAGE04."#".$id."?<br />
	<input type='submit' class='button' name='confirmrecruitdelete' value='".WOWREC_MANAGE05."'> <input type='submit' class='button' value='".WOWREC_MANAGE06."'>
	<input type='hidden' name='id' value='".$id."'>
	</form>";
}

if($action == "edit"){
	$topcap = WOWREC_MANAGE07;
	$sql2->db_Select("wowrecruit_needed", "*", "id='".$id."'");
	while($row2 = $sql2->db_Fetch()){
		$editclass = $row2['class'];
		$editspec = $row2['spec'];
		$editcount = $row2['count'];
	}
	$toptext = "
	<form method='post' action='".e_SELF."'>
	".WOWREC_MANAGE08.$editspec." ".$editclass."s:
	<input type='text' size='5' class='tbox' style='text-align:center;' name='newcount' value='".$editcount."'><br /><br />
	<input type='submit' class='button' name='updatecount' value='".WOWREC_MANAGE09."'> <input type='submit' class='button' value='".WOWREC_MANAGE10."'>
	<input type='hidden' name='id' value='".$id."'>
	</form>";
}

if (isset($message)) {
	$ns->tablerender("", "<div style='text-align:center'><b>".$message."</b></div>");
}

if (isset($toptext)) {
	$ns->tablerender($topcap, "<div style='text-align:center'>".$toptext."</div>");
}

if(check_class($pref['wowrecruit_manageclass'])){
	
	$text = "<div style='text-align:center'>
	<table style='width:50%' class='fborder'>
	<tr>
	<td style='width:15%;' class='fcaption'>".WOWREC_MANAGE11."</td>
	<td style='width:25%;' class='fcaption'>".WOWREC_MANAGE12."</td>
	<td style='width:25%;' class='fcaption'>".WOWREC_MANAGE13."</td>
	<td style='width:25%;' class='fcaption'>".WOWREC_MANAGE14."</td>
	<td style='width:10%;' class='fcaption'>&nbsp;</td>
	</tr>";

	if($sql->db_Count("wowrecruit_needed", "(*)") > 0){
		$sql->db_Select("wowrecruit_needed", "*");
		while($row = $sql->db_Fetch()){
			$text .= "
			<tr>
			<td class='forumheader3'>".$row['id']."</td>
			<td class='forumheader3'>".$row['class']."</td>
			<td class='forumheader3'>".$row['spec']."</td>
			<td class='forumheader3'>".$row['count']."</td>
			<td class='forumheader3' style='text-align:center;'>
			<a href='".WOWREC."admin_manage.php?edit.".$row['id']."'>".ADMIN_EDIT_ICON."</a> 
			<a href='".WOWREC."admin_manage.php?del.".$row['id']."'>".ADMIN_DELETE_ICON."</a>
			</td>
			</tr>
			";
		}
	}else{
		$text .= "<tr>
		<td colspan='4' style='text-align:center;' class='forumheader3'>".WOWREC_MANAGE15."</td>
		</tr>";
	}
	$text .= "</table>
	</div>";

}else{
	$text = WOWREC_MANAGE16;
}

$ns->tablerender(WOWREC_MANAGE17, $text);
require_once(e_ADMIN."footer.php");
?>