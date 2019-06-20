<?php
if (isset($_REQUEST['password']) && !empty($_REQUEST['password'])) {
    echo ('Password: '.$_REQUEST['password'].' = ' . password_hash($_REQUEST['password'],PASSWORD_DEFAULT));
#    exit;
}
?>
<BR><BR>
<FORM ACTION="#">
    WACHTWOORD: <INPUT TYPE="TEXT" NAME="password" VALUE="<?PHP echo $_REQUEST['password']; ?>"><BR>
    <BR>
    <INPUT TYPE="SUBMIT" VALUE="SUBMIT">
</FORM>