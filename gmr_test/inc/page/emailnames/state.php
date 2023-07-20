<?php
include '../../../connect.php';
//
if (getItem('email_names',id(),'id=?','state')==0) {
    // Edit
    $active = $con->prepare('UPDATE email_names SET state = 1 WHERE id = ?');
    $active->execute(array(id()));
} else {
    // Edit
    $active = $con->prepare('UPDATE email_names SET state = 0 WHERE id = ?');
    $active->execute(array(id()));
}