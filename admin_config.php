<?php
if(!defined("e107_INIT")) {
	require_once("../../class2.php");
	$eplug_admin = true;
}
require_once(e_HANDLER."userclass_class.php");
if(!getperms("P")){ header("location:".e_BASE."index.php"); exit;}
require_once(e_ADMIN."auth.php");
include_lan(e_PLUGIN."wowrecruit_menu/languages/".e_LANGUAGE.".php");

if (isset($_POST['updatesettings'])) {
	$pref['wowrecruit_manageclass'] = $_POST['wowrecruit_manageclass'];
	$pref['wowrecruit_url'] = $_POST['wowrecruit_url'];
	save_prefs();
	$message = WOWREC_CONF01;
}
if (isset($message)) {
	$ns->tablerender("", "<div style='text-align:center'><b>".$message."</b></div>");
}

$text = "
<div style='text-align:center'>
<form method='post' action='".e_SELF."'>
<table style='width:75%' class='fborder'>
<tr>
<td style='width:50%' class='forumheader3'>".WOWREC_CONF02."</td>
<td style='width:50%; text-align:right' class='forumheader3'>
".r_userclass('wowrecruit_manageclass', $pref['wowrecruit_manageclass'], 'off', 'nobody,member,admin,classes')."
</td>
</tr>
<tr>
<td style='width:50%' class='forumheader3'>".WOWREC_CONF03."</td>
<td style='width:50%; text-align:right' class='forumheader3'>
<input size='40' class='tbox' type='text' name='wowrecruit_url' value='".$pref['wowrecruit_url']."'>
</td>
</tr>
<tr>
<td colspan='2' style='text-align:center' class='forumheader'>
<input class='button' type='submit' name='updatesettings' value='".WOWREC_CONF04."' />
</td>
</tr>
</table>
</form>
</div>
";

$ns->tablerender(WOWREC_CONF05, $text);
require_once(e_ADMIN."footer.php");
?>