<?php
//
$lang = 'en';
$dir = 'ltr';
$style = '<link rel="stylesheet" href="lay/css/en.css">';
$navbar = 'me';
//
if (getItem('settings',1,'id=?','languages') == 'ar') {
    $lang = 'ar'; $dir = 'rtl'; $navbar = 'ms';
    $style = '<link rel="stylesheet" href="lay/css/ar.css">';
}
//
function words ($word) {
    static $allWords = array(
        /*************** Title ***************/
        'Add New Email Name' => 'اضافة اسم بريد جديد',
        'Users' => 'المستخدمين',
        'Login' => 'تسجيل الدخول',
        'Check Email' => 'التحقق من الريد الالكتروني',
        'Profile' => 'الملف الشخصي',
        'Dashboard' => 'لوحة التحكم',
        'Last 5 Admins' => 'اخر 5 مشرفين',
        'Last 5 Users' => 'اخر 5 مستخدمين',
        'Last 5 Transactions' => 'اخر 5 تحويلات',
        'Add New Admin' => 'اضافة مشرف جديد',
        'Edit Admin' => 'تعديل المشرف',
        'Add Customer New' => 'اضافة عميل جديد',
        'Edit Customer' => 'تعديل العميل',
        'Add New User' => 'اضافة مستخدم جديد',
        'Edit User' => 'تعديل المستخدم',
        'Add New Cash Withdrawal' => 'اضافة عملية سحب',
        'Add New Url Transactions' => 'اضافة تحويل رابط جديد',
        'Settings' => 'الاعدادات',
        'General' => 'العامة',
        'Languages' => 'اللغات',
        'Settings Email' => 'اعدادات البريد الالكتروني',
        'Email Names' => 'اسماء البريد الالكتروني',
        /*************** Errors ***************/
        'Enter User Name' => 'ادخل اسم المستخدم',
        'User Name Or Password Is Incorrect' => 'اسم المستخدم او كلمة المرور غير صحيحة',
        'Enter Password' => 'ادخل كلمة المرور',
        'Enter Phone' => 'ادخل رقم الهاتف',
        'Enter Main Email' => 'ادخل البريد الالكتروني الرئيسي',
        'Enter Reenter Password' => 'ادخل تاكيد كلمة المرور',
        'The Password Is Not Equal' => 'كلمة المرور غير متساوية',
        'Enter Email' => 'ادخل البريد الالكتروني',
        'Email Is Not Exists' => 'البريد الالكتروني غير موجود',
        'Enter Old Password' => 'ادخل كلمة المرور القديمة',
        'Enter New Password' => 'ادخل كلمة المرور الجديدة',
        'Password Cannot Be Less Then 8 Characters' => 'يجب ان تكون كلمة المرور اكبر من 8 احرف',
        'The Old Password Is Incorrect' => 'كلمة المرور القديمة غير صحيحة',
        'User Name Is Exists' => 'اسم المستخدم موجود',
        'Enter Full Name' => 'ادخل الاسم الكامل',
        'Full Name Is Exists' => 'الاسم الكامل موجود',
        'Enter Location' => 'ادخل الموقع',
        'Location Is Exists' => 'الموقع موجود',
        'Enter Balance' => 'ادخل الرصيد',
        'The Balance Is Not Available' => 'الرصيد اكبر من المتاح',
        'Enter Email Name' => 'ادخل اسم البريد الالكتروني',
        'Email Name Is Exists' => 'اسم البريد الالكتروني موجود',
        'Enter Url' => 'ادخل الرابط',
        'Url Is Exists' => 'الرابط موجود',
        'Settings Languages' => 'اعدادات الغة',
        'Chosse Language' => 'اختر الغة',
        'Chosse' => 'اختيار',
        /*************** Add And Edit ***************/
        'User Name' => 'اسم المستخدم',
        'Password' => 'كلمة المرور',
        'Create New Account' => 'انشاء حساب جديد',
        'Change Password' => 'تغيير كلمة المرور',
        'Forget Password' => 'نسيت كلمة المرور',
        'Reenter Password' => 'تاكيد كلمة المرور',
        'Phone' => 'رقم الهاتف',
        'Main Email' => 'البريد الالكتروني الرئيسي',
        'All Emails' => 'كل البريدات الالكترونية',
        'Add' => 'اضافة',
        'Email' => 'البريد الالكتروني',
        'Old Password' => 'كلمة المرور القديمة',
        'New Password' => 'كلمة المرور الجديدة',
        'Edit' => 'تعديل',
        /*************** Topbar ***************/
        'Show Profile' => 'عرض الملف الشخصي',
        'Logout' => 'تسجيل الخروج',
        /*************** Sidebar ***************/
        'Report' => 'التقرير',
        'Url Report' => 'تقرير الروابط',
        'Admins' => 'المشرفين',
        'Customers' => 'العملاء',
        'Users' => 'المستخدمين',
        'Transactions' => 'التحويلات',
        'Url Transactions' => 'تحويلات الروابط',
        /*************** Navbar ***************/
        'Total' => 'الاجمالي',
        'Remaining' => 'المتبقي',
        'Withdrawal' => 'السحبيات',
        'Search' => 'البحث',
        'Back' => 'رجوع',
        'Excel' => 'اكسيل',
        /*************** Table ***************/
        '#' => 'م',
        'Customer' => 'العميل',
        'Balance' => 'الرصيد',
        'Description' => 'الوصف',
        'Date' => 'التاريخ',
        'State' => 'الحالة',
        'Control' => 'التحكم',
        'Add Date' => 'تاريخ الاضافة',
        'Url' => 'الروابط',
        'Full Name' => 'الاسم الكامل',
        'Total Url' => 'اجمالي الروابط',
        'Enabled' => 'مفعل',
        'Disabled' => 'غير مفعل',
        'Total Balance' => 'اجمالي الرصيد',
        'Emails' => 'البريدات الالكترونية',
        'Location' => 'الموقع',
        'ID' => 'المعرف',
        'Email Name' => 'اسم البريد الالكتروني',
        /*************** Success ***************/
        'Added Successfully' => 'تمت الاضافة بنجاح',
    );
    if (getItem('settings',1,'id=?','languages') == 'ar') {
        return $allWords[$word];
    } else {
        return $word;
    }
}