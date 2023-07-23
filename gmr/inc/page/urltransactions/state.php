<?php
//
require '../../lib/phpmailer/index.php';
include '../../../connect.php';
//
if (getItem('url_transactions',id(),'id=?','ut_state')==0) {
    // Edit
    $active = $con->prepare('UPDATE url_transactions SET ut_state = 1 WHERE id = ?');
    $active->execute(array(id()));
} else {
    // Edit
    $active = $con->prepare('UPDATE url_transactions SET ut_state = 0 WHERE id = ?');
    $active->execute(array(id()));
}
// Get Status
$status = getItem('url_transactions',id(),'id=?','ut_state');
// Get UserName
$username = getItem('url_transactions',id(),'id=?','username');
//
$id = getItem('users',$username,'username=?','id');
// Get Url
$url = getItem('url_transactions',id(),'id=?','ut_url');
// Get Main Email
$reciverEmail = getItem('users',$username,'username=?','main_email');
//
$total = getCount('url_transactions','ut_state=1 and username=?',array($username));
//
$withdrawal = 0;
foreach (getData('transactions','user_id=?',array($id)) as $all) {
    $withdrawal += $all['balance'];
}
//
$remaining = $total - $withdrawal;
// Defaine Messages
$message = 'Null';
//
if (getItem('settings',1,'id=?','url_email') == 1) {
    //
    if ($status == 1) {
        $message = "عزيزي العميل $username تم قبول تقييمك من الرابط $url وتم زيادة رصيدك بمقدار نقطة واحدة<br>";
    //
    } elseif ($status == 0) {
        $message = "عزيزي العميل $username تم رفض تقييمك من الرابط $url وتم نقصان رصيدك بمقدار نقطة واحدة.<br>";
        $message .= "اسباب رفض التقييم :<br>";
        $message .= "1 - البريد الالكتروني غير فعال في امكانية النقييم بسبب انه جديد او غير متفاعل<br>";
        $message .= "2 - قمت بحذف تقييمك<br>";
    }
    $message .= "اجمالي نقاطتك : $total<br>";
    $message .= "المتبقي: $remaining<br>";
    $message .= "اجمالي السحبيات: $withdrawal<br>";
    //
    send_mail("$reciverEmail","GoogleMapReviews@pscye.com","Psc@2023","Get Mony From Gmail",$message,"smtp.hostinger.com","465");
}