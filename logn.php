<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>تسجيل الدخول</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Changa:wght@600&display=swap" rel="stylesheet">

  <meta thhp-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>

      <?php
      session_start();
      include 'connect.php';
      if(isset($_POST['submit'])){
        $user=$_POST['user'];
        $password=$_POST['password'];

        $query="select * from users where use_name='$user' and use_password='$password'
                and use_status='1' and use_delete='0' ";
        $select=mysqli_query($con,$query);

        $count=mysqli_num_rows($select);
        if($count==1){
          $row = mysqli_fetch_assoc($select);
          $_SESSION['ID']=$row['use_id'];
          $_SESSION['USER']=$row['use_name'];
          $_SESSION['DEPT']=$row['use_dep_id'];

          header("location: hom.php");
        }else{
          $msg="خطا في عملية تسجيل الدخول";
        }
      }


       ?>

       <h2 style="color:red"> <?php if(isset($msg)) echo $msg; ?> </h2>

     <form class="" action="#" method="post">
       <h2>تسجيل الدخول</h2>

       <input type="text" name="user" value="" placeholder="الاسم" required><br><br>
       <input type="password" name="password" value="" placeholder="الباسوورد" required><br><br>
       <input class="submit"type="submit" name="submit" value="الدخول">

     </form>



  </body>
</html>
