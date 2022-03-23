
<?php
include 'connect.php';
if($_POST && $_GET['id']){
    $sql = "UPDATE ampere SET 
    name='".$_POST["name"]."',
    transre='".$_POST["transre"]."',
    phone='".$_POST["phone"]."',
    feeder='".$_POST["feeder"]."',
    address='".$_POST["address"]."',
    holidays='".$_POST["holidays"]."', 
    ro='".$_POST["ro"]."', 
    pep='".$_POST["pep"]."', 
    off='".$_POST["off"]."', 
    ret='".$_POST["ret"]."', 
    notes='".$_POST["notes"]."' 
    WHERE id='".$_GET['id']."'";
    mysqli_query($con,$sql);

    header('location: hom.php');
}

if($_GET['id']){
    $id = $_GET['id'];
    $sql = "SELECT * FROM ampere WHERE id='$id'";
    $res = mysqli_fetch_assoc(mysqli_query($con,$sql));
    
    
}

?>

<div id="div">
       <form class="" action="update.php?id=<?=$res['id']?>&action=update" method="post">


                 <h1>ادخل بيانات  الجدول</h1>


       <input class="spes"type="text" name="name" placeholder="اسم المبلغ" value="<?=$res['name']?>"   title="اكتب اسمك الثلاثي"required>

         <input class="spes"type="number" name="transre" placeholder="رقم المحولة"  value="<?=$res['transre']?>" title="اكتب رقم الوحة الموجودة في المحولة"required>
          <br><br>
         <input class="spes"type="number" name="phone" placeholder="رقم الهاتف"  value="<?=$res['phone']?>" title="اكتب رقم الهاتف المواطن"required>

        <input class="spes"type="text"name="feeder" placeholder="اسم المغذي"  value="<?=$res['feeder']?>" title="اكتب اسم المغذي">
         <br><br>
        <input class="long"type="text" name="address" placeholder="العنوان"  value="<?=$res['address']?>" title="اكتب عنوان دقيق"required>

       <br><br>
       <input class="long"type="text" name="holidays" placeholder="نوع العطل"  value="<?=$res['holidays']?>" title="اكتب نوع العطل بصورة دقيقة"required>
       <br>
       انجز<input class="ok"type="radio" name="ro"value="انجز" <?php echo ($res['ro'] == 'انجز')?'checked':'';?> title="انجز" required>
       لم ينجز<input class="ok"type="radio" name="ro"value="لم ينجز" <?php echo ($res['ro'] == 'لم ينجز')?'checked':'';?>  title="لم ينجز" required>
       <br>
       وقت التبليغ<input class="spes"type="time" name="pep" placeholder="وقت التبليغ" value="<?=$res['pep']?>" value="وقت التبليغ" title="اكتب وقت تبليغ العطل" required>

       وفت الخروج<input class="spes"type="time" name="off" placeholder="وقت الخروج" value="<?=$res['off']?>" title="اكتب وقت خروج المجموعة"  >

       وقت العودة<input class="spes"type="time" name="ret" placeholder="وقت العودة" value="<?=$res['ret']?>" title="اكتب  وقت الانجاز" >
      <br><br>
       <input class="long"type="text" name="notes" placeholder="الملاحظات" value="<?=$res['notes']?>" title="اكتب   ملاحضاتك مع الانجاز او عدمه">
       <br><br>

       <input id="w" type="submit" name="add" value="حفظ">
       <!-- <input id="w" type="submit" name="add" value="حفظ" onclick="location.href='teble.html';"> -->

       <br><br>
     </form>
     </div>
