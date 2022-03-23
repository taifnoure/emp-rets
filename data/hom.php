<?php
session_start();
if(!isset($_SESSION['USER'])){
  header("location: logn.php");
}
include 'connect.php';
  include 'delete.php';
$date=date('Y-m-d');

 ?>
<!DOCTYPE html>
<html lang="en" dir="rtl">
  <head>
    <meta charset="utf-8">
    <title>الصفحة الرئيسية</title>

    <link rel="stylesheet" href="hom.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Changa:wght@600&display=swap" rel="stylesheet">

<meta thhp-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


<link rel="stylesheet" href="hom.css">

<style media="screen">
  td{
    color:black !important;
  }
</style>
  </head>
  <body>

  <?php
    // الاتصال مع قاعدة البيانات
include 'connect.php';
$user_n=$_SESSION['ID'];
$user_d=$_SESSION['DEPT'];
$res=mysqli_query($con,"select * from ampere where amp_date_in='$date' and amp_use_id='$user_n' and amp_dep_id='$user_d' ");

// كود التاكد من الاتصال مع قاعدة البيانات
if (!$con){
  echo
    die('خطا في الاتصال مع قاعدة البيانات');
  }


// ارسال البيانات المدخلة الى قاعدة البياتات

    $name='';
    $transre='';
    $phone='';
    $feeder='';
    $address='';
    $holidays='';
    $ro='';
    $pep='';
    $off='';
    $ret='';
    $notes='';


    if (isset($_POST['name'])){
           $name=$_POST['name'];
      }
      if (isset($_POST['transre'])){
           $transre=$_POST['transre'];
      }
      if (isset($_POST['phone'])){
           $phone=$_POST['phone'];
      }
      if (isset($_POST['feeder'])){
           $feeder=$_POST['feeder'];
      }
      if (isset($_POST['address'])){
           $address=$_POST['address'];
      }
      if (isset($_POST['holidays'])){
           $holidays=$_POST['holidays'];
      }
      if (isset($_POST['ro'])){
           $ro=$_POST['ro'];
      }
      if (isset($_POST['pep'])){
           $pep=$_POST['pep'];
      }
      if (isset($_POST['off'])){
           $off=$_POST['off'];
      }
      if (isset($_POST['ret'])){
           $ret=$_POST['ret'];
      }
      if (isset($_POST['notes'])){
           $notes=$_POST['notes'];
      }

      $sqls='';
    if (isset($_POST['add'])){

         $sqls="insert into ampere (name,transre,phone,feeder,address,holidays
         ,ro,pep,off,ret,notes,amp_dep_id,amp_use_id,amp_date_in)values('$name','$transre','$phone','$feeder','$address',
         '$holidays','$ro','$pep','$off','$ret','$notes','$user_n','$user_d','$date')";
      $q=   mysqli_query($con,$sqls);
         header("location: #");
         // الاستعلام عن الخطا اذا لم يتم ارسال البيانات الى قاعدة البيانات
         if(!$q){
          echo mysqli_error($con);
         }

         if(isset($q)){
       // echo "تم ارسال البيانات بنجاح";
       echo '<script type="text/javascript"> alert("تم حفظ البيانات المدخلة") </script>';
     }
     else {
       echo "no";
     }

    }
    if(isset($q)){
  // echo "تم ارسال البيانات بنجاح";
  echo '<script type="text/javascript"> alert("تم حفظ البيانات المدخلة") </script>';
}
?>







       <!-- عمل قائمة ادخال البيانات مخفية -->
     <details >

       <summary dir="up" scrollamount="2">اضافة</summary>

    <marquee direction="left" scrollamount="35" height="600px" behavior="slide">


       <aside>
     <div id="div">
       <form class="" action="#" method="post">


                 <h1>ادخل بيانات  الجدول</h1>


       <input class="spes"type="text" name="name" placeholder="اسم المبلغ"    title="اكتب اسمك الثلاثي"required>

         <input class="spes"type="number" name="transre" placeholder="رقم المحولة"  title="اكتب رقم الوحة الموجودة في المحولة"required>
          <br><br>
         <input class="spes"type="number" name="phone" placeholder="رقم الهاتف"  title="اكتب رقم الهاتف المواطن"required>

        <input class="spes"type="text"name="feeder" placeholder="اسم المغذي"  title="اكتب اسم المغذي">
         <br><br>
        <input class="long"type="text" name="address" placeholder="العنوان"  title="اكتب عنوان دقيق"required>

       <br><br>
       <input class="long"type="text" name="holidays" placeholder="نوع العطل"  title="اكتب نوع العطل بصورة دقيقة"required>
       <br>
       انجز<input class="ok"type="radio" name="ro"value="انجز" title="انجز" >
       لم ينجز<input class="ok"type="radio" name="ro"value="لم ينجز" title="لم ينجز" >
       <br>
       وقت التبليغ<input class="spes"type="time" name="pep" placeholder="وقت التبليغ" value="وقت التبليغ" title="اكتب وقت تبليغ العطل" required>

       وفت الخروج<input class="spes"type="time" name="off" placeholder="وقت الخروج"  title="اكتب وقت خروج المجموعة"  >

       وقت العودة<input class="spes"type="time" name="ret" placeholder="وقت العودة"  title="اكتب  وقت الانجاز" >
      <br><br>
       <input class="long"type="text" name="notes" placeholder="الملاحظات"  title="اكتب   ملاحضاتك مع الانجاز او عدمه">
       <br><br>

       <input id="w" type="submit" name="add" value="حفظ">
       <!-- <input id="w" type="submit" name="add" value="حفظ" onclick="location.href='teble.html';"> -->

       <br><br>
     </form>
     </div>
   </aside>
   </marquee>
     </details>





     <!-- عرض البيانات -->

     <!-- <details class="left">
       <summary>عرض البيانات</summary> -->
       <!-- <marquee direction="up" scrollamount="35" height="100%" behavior="slide"> -->

       <table id="tbl">
            <tr>
              <th>id</th>
              <th>اسم المبلغ</th>
              <th>رقم المحولة</th>
              <th>رقم الهاتف</th>
              <th>اسم المغذي</th>
              <th>العنوان</th>
              <th>نوع العطل</th>
              <th>الانجاز</th>
              <th>وقت التبليغ</th>
              <th>وقت الخروج</th>
              <th>وقت العودة</th>
              <th>الملاحضات</th>
              <th>حذف</th>

            </tr>

            <?php
          while ($row = mysqli_fetch_assoc($res)) { ?>

            <tr>



                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['transre']; ?></td>
                  <td><?php echo $row['phone']; ?></td>
                  <td><?php echo $row['feeder']; ?></td>
                  <td><?php echo $row['address']; ?></td>
                  <td><?php echo $row['holidays']; ?></td>
                  <td><?php echo $row['ro']; ?></td>
                  <td><?php echo $row['pep']; ?></td>
                  <td><?php echo $row['off']; ?></td>
                  <td><?php echo $row['ret']; ?></td>
                  <td><?php echo $row['notes']; ?></td>
                  <!-- <td> <a href="appdate.php?id=<?php echo $row['id'];?>"><img src="img/2.png"width="20"height="20" alt="لوكو"></a> </td> -->
                  <td> <a href="?id=<?php echo $row['id'];?>"><img src="img/3.png"width="20"height="20" alt="لوكو"></a> </td>

           </tr>
         <?php }  ?>

      <!-- </details>
    </marquee> -->




  </body>
</html>
