<?php
if (getItem('url_transactions',id(),'id=?','checked') == 0) {
    $checked = $con->prepare('UPDATE url_transactions SET checked = 1 WHERE id = ?');
    $checked->execute(array(id()));
}
header('location:'.getItem('url_transactions',id(),'id=?','ut_url'));