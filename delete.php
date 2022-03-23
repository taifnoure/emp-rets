<!-- <?php

function delete(){
    $host='localhost';
    $user='root';
    $pass='';
    $db='volt';

    // إجراء الإتصال
    $con= mysqli_connect($host,$user,$pass,$db);


    // التحقق من الإتصال
    if (!$con) {
        die("فشل الإتصال: " . mysqli_connect_error());
    }

    // لحذف سجل بالجدول SQL بناء جملة
    $id=$_GET['id'];
    $sql = "DELETE FROM ampere WHERE id=$id";
    $q=mysqli_query($con, $sql);


    // تنفيذ الإستعلام
    if ($q) {
        echo "تم حذف السجل بنجاح";
    }



    // else {
    //     echo "فشل حذف السجل: " . mysqli_error($con);
    // }

    // إغلاق الإتصال
mysqli_close($con);
}
 ?> -->
