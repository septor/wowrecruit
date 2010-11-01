<?php

/*
+ ----------------------------------------------------------------------------+
|     e107 website system
|
|     Copyright (C) 2001-2002 Steve Dunstan (jalist@e107.org)
|     Copyright (C) 2008-2010 e107 Inc (e107.org)
|
|
|     Released under the terms and conditions of the
|     GNU General Public License (http://gnu.org)
+----------------------------------------------------------------------------+
*/

$eplug_admin = TRUE;
require_once("../../class2.php");
if (!getperms("4")) { header("location:".e_BASE."index.php"); exit ;}
include_lan(e_PLUGIN."wowrecruit_menu/languages/".e_LANGUAGE.".php");
require_once(e_ADMIN."auth.php");

if ($_POST['update_menu']) {
	unset($menu_pref['wowrecruit_menu']);
	$menu_pref['wowrecruit_menu'] = $_POST['pref'];
	$tmp = addslashes(serialize($menu_pref));
	$sql->db_Update("core", "e107_value='$tmp' WHERE e107_name='menu_pref' ");
	$ns->tablerender("", "<div style=\'text-align:center\'><b>".WOWREC_SAVESUCCESS."</b></div>");
}

$text = '
	<div style="text-align:center">
	<form action="'.e_SELF.'?'.e_QUERY.'" method="post">
	<table style="width:85%" class="fborder" >

	<tr>
	<td style="width:30%" class="forumheader3">'.WOWREC_CLASS01.'</td>
	<td style="width:70%" class="forumheader3">
	<select name="pref[deathknight]" class="tbox">
	<option value="'.WOWREC_LAN01.'"'.($menu_pref['wowrecruit_menu']['deathknight'] == WOWREC_LAN01 ? ' selected="selected"' : '').'>'.WOWREC_LAN01.'</option>
	<option value="'.WOWREC_LAN02.'"'.($menu_pref['wowrecruit_menu']['deathknight'] == WOWREC_LAN02 ? ' selected="selected"' : '').'>'.WOWREC_LAN02.'</option>
	<option value="'.WOWREC_LAN03.'"'.($menu_pref['wowrecruit_menu']['deathknight'] == WOWREC_LAN03 ? ' selected="selected"' : '').'>'.WOWREC_LAN03.'</option>
	<option value="'.WOWREC_LAN04.'"'.($menu_pref['wowrecruit_menu']['deathknight'] == WOWREC_LAN04 ? ' selected="selected"' : '').'>'.WOWREC_LAN04.'</option>
	</td>
	</tr>

	<tr>
	<td style="width:30%" class="forumheader3">'.WOWREC_CLASS02.'</td>
	<td style="width:70%" class="forumheader3">
	<select name="pref[druid]" class="tbox">
	<option value="'.WOWREC_LAN01.'"'.($menu_pref['wowrecruit_menu']['druid'] == WOWREC_LAN01 ? ' selected="selected"' : '').'>'.WOWREC_LAN01.'</option>
	<option value="'.WOWREC_LAN02.'"'.($menu_pref['wowrecruit_menu']['druid'] == WOWREC_LAN02 ? ' selected="selected"' : '').'>'.WOWREC_LAN02.'</option>
	<option value="'.WOWREC_LAN03.'"'.($menu_pref['wowrecruit_menu']['druid'] == WOWREC_LAN03 ? ' selected="selected"' : '').'>'.WOWREC_LAN03.'</option>
	<option value="'.WOWREC_LAN04.'"'.($menu_pref['wowrecruit_menu']['druid'] == WOWREC_LAN04 ? ' selected="selected"' : '').'>'.WOWREC_LAN04.'</option>
	</td>
	</tr>

	<tr>
	<td style="width:30%" class="forumheader3">'.WOWREC_CLASS03.'</td>
	<td style="width:70%" class="forumheader3">
	<select name="pref[hunter]" class="tbox">
	<option value="'.WOWREC_LAN01.'"'.($menu_pref['wowrecruit_menu']['hunter'] == WOWREC_LAN01 ? ' selected="selected"' : '').'>'.WOWREC_LAN01.'</option>
	<option value="'.WOWREC_LAN02.'"'.($menu_pref['wowrecruit_menu']['hunter'] == WOWREC_LAN02 ? ' selected="selected"' : '').'>'.WOWREC_LAN02.'</option>
	<option value="'.WOWREC_LAN03.'"'.($menu_pref['wowrecruit_menu']['hunter'] == WOWREC_LAN03 ? ' selected="selected"' : '').'>'.WOWREC_LAN03.'</option>
	<option value="'.WOWREC_LAN04.'"'.($menu_pref['wowrecruit_menu']['hunter'] == WOWREC_LAN04 ? ' selected="selected"' : '').'>'.WOWREC_LAN04.'</option>
	</td>
	</tr>

	<tr>
	<td style="width:30%" class="forumheader3">'.WOWREC_CLASS04.'</td>
	<td style="width:70%" class="forumheader3">
	<select name="pref[mage]" class="tbox">
	<option value="'.WOWREC_LAN01.'"'.($menu_pref['wowrecruit_menu']['mage'] == WOWREC_LAN01 ? ' selected="selected"' : '').'>'.WOWREC_LAN01.'</option>
	<option value="'.WOWREC_LAN02.'"'.($menu_pref['wowrecruit_menu']['mage'] == WOWREC_LAN02 ? ' selected="selected"' : '').'>'.WOWREC_LAN02.'</option>
	<option value="'.WOWREC_LAN03.'"'.($menu_pref['wowrecruit_menu']['mage'] == WOWREC_LAN03 ? ' selected="selected"' : '').'>'.WOWREC_LAN03.'</option>
	<option value="'.WOWREC_LAN04.'"'.($menu_pref['wowrecruit_menu']['mage'] == WOWREC_LAN04 ? ' selected="selected"' : '').'>'.WOWREC_LAN04.'</option>
	</td>
	</tr>

	<tr>
	<td style="width:30%" class="forumheader3">'.WOWREC_CLASS05.'</td>
	<td style="width:70%" class="forumheader3">
	<select name="pref[paladin]" class="tbox">
	<option value="'.WOWREC_LAN01.'"'.($menu_pref['wowrecruit_menu']['paladin'] == WOWREC_LAN01 ? ' selected="selected"' : '').'>'.WOWREC_LAN01.'</option>
	<option value="'.WOWREC_LAN02.'"'.($menu_pref['wowrecruit_menu']['paladin'] == WOWREC_LAN02 ? ' selected="selected"' : '').'>'.WOWREC_LAN02.'</option>
	<option value="'.WOWREC_LAN03.'"'.($menu_pref['wowrecruit_menu']['paladin'] == WOWREC_LAN03 ? ' selected="selected"' : '').'>'.WOWREC_LAN03.'</option>
	<option value="'.WOWREC_LAN04.'"'.($menu_pref['wowrecruit_menu']['paladin'] == WOWREC_LAN04 ? ' selected="selected"' : '').'>'.WOWREC_LAN04.'</option>
	</td>
	</tr>

	<tr>
	<td style="width:30%" class="forumheader3">'.WOWREC_CLASS06.'</td>
	<td style="width:70%" class="forumheader3">
	<select name="pref[priest]" class="tbox">
	<option value="'.WOWREC_LAN01.'"'.($menu_pref['wowrecruit_menu']['priest'] == WOWREC_LAN01 ? ' selected="selected"' : '').'>'.WOWREC_LAN01.'</option>
	<option value="'.WOWREC_LAN02.'"'.($menu_pref['wowrecruit_menu']['priest'] == WOWREC_LAN02 ? ' selected="selected"' : '').'>'.WOWREC_LAN02.'</option>
	<option value="'.WOWREC_LAN03.'"'.($menu_pref['wowrecruit_menu']['priest'] == WOWREC_LAN03 ? ' selected="selected"' : '').'>'.WOWREC_LAN03.'</option>
	<option value="'.WOWREC_LAN04.'"'.($menu_pref['wowrecruit_menu']['priest'] == WOWREC_LAN04 ? ' selected="selected"' : '').'>'.WOWREC_LAN04.'</option>
	</td>
	</tr>

	<tr>
	<td style="width:30%" class="forumheader3">'.WOWREC_CLASS07.'</td>
	<td style="width:70%" class="forumheader3">
	<select name="pref[rogue]" class="tbox">
	<option value="'.WOWREC_LAN01.'"'.($menu_pref['wowrecruit_menu']['rogue'] == WOWREC_LAN01 ? ' selected="selected"' : '').'>'.WOWREC_LAN01.'</option>
	<option value="'.WOWREC_LAN02.'"'.($menu_pref['wowrecruit_menu']['rogue'] == WOWREC_LAN02 ? ' selected="selected"' : '').'>'.WOWREC_LAN02.'</option>
	<option value="'.WOWREC_LAN03.'"'.($menu_pref['wowrecruit_menu']['rogue'] == WOWREC_LAN03 ? ' selected="selected"' : '').'>'.WOWREC_LAN03.'</option>
	<option value="'.WOWREC_LAN04.'"'.($menu_pref['wowrecruit_menu']['rogue'] == WOWREC_LAN04 ? ' selected="selected"' : '').'>'.WOWREC_LAN04.'</option>
	</td>
	</tr>

	<tr>
	<td style="width:30%" class="forumheader3">'.WOWREC_CLASS08.'</td>
	<td style="width:70%" class="forumheader3">
	<select name="pref[shaman]" class="tbox">
	<option value="'.WOWREC_LAN01.'"'.($menu_pref['wowrecruit_menu']['shaman'] == WOWREC_LAN01 ? ' selected="selected"' : '').'>'.WOWREC_LAN01.'</option>
	<option value="'.WOWREC_LAN02.'"'.($menu_pref['wowrecruit_menu']['shaman'] == WOWREC_LAN02 ? ' selected="selected"' : '').'>'.WOWREC_LAN02.'</option>
	<option value="'.WOWREC_LAN03.'"'.($menu_pref['wowrecruit_menu']['shaman'] == WOWREC_LAN03 ? ' selected="selected"' : '').'>'.WOWREC_LAN03.'</option>
	<option value="'.WOWREC_LAN04.'"'.($menu_pref['wowrecruit_menu']['shaman'] == WOWREC_LAN04 ? ' selected="selected"' : '').'>'.WOWREC_LAN04.'</option>
	</td>
	</tr>

	<tr>
	<td style="width:30%" class="forumheader3">'.WOWREC_CLASS09.'</td>
	<td style="width:70%" class="forumheader3">
	<select name="pref[warlock]" class="tbox">
	<option value="'.WOWREC_LAN01.'"'.($menu_pref['wowrecruit_menu']['warlock'] == WOWREC_LAN01 ? ' selected="selected"' : '').'>'.WOWREC_LAN01.'</option>
	<option value="'.WOWREC_LAN02.'"'.($menu_pref['wowrecruit_menu']['warlock'] == WOWREC_LAN02 ? ' selected="selected"' : '').'>'.WOWREC_LAN02.'</option>
	<option value="'.WOWREC_LAN03.'"'.($menu_pref['wowrecruit_menu']['warlock'] == WOWREC_LAN03 ? ' selected="selected"' : '').'>'.WOWREC_LAN03.'</option>
	<option value="'.WOWREC_LAN04.'"'.($menu_pref['wowrecruit_menu']['warlock'] == WOWREC_LAN04 ? ' selected="selected"' : '').'>'.WOWREC_LAN04.'</option>
	</td>
	</tr>

	<tr>
	<td style="width:30%" class="forumheader3">'.WOWREC_CLASS10.'</td>
	<td style="width:70%" class="forumheader3">
	<select name="pref[warrior]" class="tbox">
	<option value="'.WOWREC_LAN01.'"'.($menu_pref['wowrecruit_menu']['warrior'] == WOWREC_LAN01 ? ' selected="selected"' : '').'>'.WOWREC_LAN01.'</option>
	<option value="'.WOWREC_LAN02.'"'.($menu_pref['wowrecruit_menu']['warrior'] == WOWREC_LAN02 ? ' selected="selected"' : '').'>'.WOWREC_LAN02.'</option>
	<option value="'.WOWREC_LAN03.'"'.($menu_pref['wowrecruit_menu']['warrior'] == WOWREC_LAN03 ? ' selected="selected"' : '').'>'.WOWREC_LAN03.'</option>
	<option value="'.WOWREC_LAN04.'"'.($menu_pref['wowrecruit_menu']['warrior'] == WOWREC_LAN04 ? ' selected="selected"' : '').'>'.WOWREC_LAN04.'</option>
	</td>
	</tr>

	<tr>
	<td style="width:30%" class="forumheader3">'.WOWREC_LAN05.'</td>
	<td style="width:70%" class="forumheader3">
	<input type="text" class="tbox" name="pref[recruit_url]" value="'.(($menu_pref['wowrecruit_menu']['recruit_url']) ? $menu_pref['wowrecruit_menu']['recruit_url'] : '#').'" />
	</td>
	</tr>

	<tr>
	<td colspan="2" class="forumheader" style="text-align: center;"><input class="button" type="submit" name="update_menu" value="'.WOWREC_SAVE.'" /></td>
	</tr>
	</table>
	</form>
	</div>
	';

$ns->tablerender(WOWREC_CONFTITLE, $text);

require_once(e_ADMIN."footer.php");

?>
