<!-- 웹 페이지 컨텐츠 수정 후 넘어가는 위치! cf.web_insert.php -->

<?php

  $web_update_num=$_REQUEST['num'];

  $web_title=nl2br($_REQUEST['web_title']);
  $web_title=addslashes($web_title);
  $web_serial=$_REQUEST['web_serial'];
  $web_client=$_REQUEST['web_client'];
  $web_domain=$_REQUEST['web_domain'];
  $web_desc=nl2br($_REQUEST['web_desc']);
  $web_desc=addslashes($web_desc);
  $regist_day=date("Y-m-d");


  // web page image upload directory
  $img_upload_dir=$_SERVER['DOCUMENT_ROOT'].'/gold/data/web_page/pc/';
  $mobile_upload_dir=$_SERVER['DOCUMENT_ROOT'].'/gold/data/web_page/mobile/';
  $thumb_upload_dir=$_SERVER['DOCUMENT_ROOT'].'/gold/data/web_page/thumb/';

   //   main image
   $main_name=$_FILES['main']['name'];
   $main_tmp_name=$_FILES['main']['tmp_name'];
   $main_error=$_FILES['main']['error'];

   //   sub image
   $mobile_name=$_FILES['mobile']['name'];
   $mobile_tmp_name=$_FILES['mobile']['tmp_name'];
   $mobile_error=$_FILES['mobile']['error'];


   //   thumbnail image
   $thumbnail_name=$_FILES['thumbnail']['name'];
   $thumbnail_tmp_name=$_FILES['thumbnail']['tmp_name'];
   $thumbnail_error=$_FILES['thumbnail']['error'];


  // echo  $web_title, $web_serial, $web_client, $web_domain, $web_desc, 
  // $main_name, $mobile_name, $thumb_name, $regist_day;

  // main image upload
  if($main_name && !$main_error){

    $uploaded_main_file= $img_upload_dir.$main_name;
    if(!move_uploaded_file($main_tmp_name, $uploaded_main_file)){
        echo"
          <script>
            alert('사진이 업로드 되지 않았습니다!');

          </script>
        ";
        exit;  
    }  
  }else{
    $main_name='';
  }

  // sub image upload
  if($mobile_name && !$mobile_error){
  
      $uploaded_mobile_file= $mobile_upload_dir.$mobile_name;
      if(!move_uploaded_file($mobile_tmp_name, $uploaded_mobile_file)){
          echo"
            <script>
              alert('사진이 업로드 되지 않았습니다!');
  
            </script>
          ";
          exit;
      }
  }else{
      $sub_name='';
  }


  // thumbnail image upload
  if($thumbnail_name && !$thumbnail_error){
  
      $uploaded_thumbnail_file= $thumb_upload_dir.$thumbnail_name;
      if(!move_uploaded_file($thumbnail_tmp_name, $uploaded_thumbnail_file)){
          echo"
            <script>
              alert('사진이 업로드 되지 않았습니다!');
  
            </script>
          ";
          exit;  
      }
  }else{
      $thumbnail_name='';
  }

  // database connect
  include $_SERVER['DOCUMENT_ROOT'].'/gold/php_process/connect/db_connect.php';
  

  $sql="UPDATE gold_web SET gold_web_tit='$web_title', gold_web_ser='$web_serial',  gold_web_des='$web_desc', gold_web_img='$main_name', gold_web_mimg='$mobile_name', gold_web_thumb='$thumbnail_name', gold_web_cli='$web_client',  gold_web_reg='$regist_day', gold_web_dom='$web_domain'  WHERE gold_web_num = '$web_update_num'";




  mysqli_query($dbConn, $sql);

  echo "
  <script>
    location.href='/gold/pages/web/web.php';
  </script>
"


?>