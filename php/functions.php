<?php
// functions
include "db.php";

function _http_res($time, $dir){
  echo "<meta http-equiv='refresh' content='{$time};url={$dir}'>";
}

function _innerjs($msg){
  echo "<script>alert('$msg')</script>";
}

function _document_js($id, $style){
    echo "<script>let {$id} = document.getElementById('{$id}');{$id}.style.{$style};</script>";
}

function _innerhtml(){
  echo "
   <style></style>
   
  ";
}

function _pictureHundler($connect, $table, $cssid, $style, $SqlPicture, $SqlPhone){
  $picturesql = "select current_profile from {$table} where phone = ?"; 
  $picturesqlq = mysqli_stmt_init($connect);
  if (!mysqli_stmt_prepare($picturesqlq, $picturesql)) {
    echo "sql error";
  } else {
    mysqli_stmt_bind_param($picturesqlq,"s",$SqlPhone);
    mysqli_stmt_execute($picturesqlq);
    $picturesqlq_result = mysqli_stmt_get_result($picturesqlq);
    $picturesqlF = mysqli_fetch_assoc($picturesqlq_result);
  }
  
    $pictureVar = $picturesqlF["current_profile"];    
    $customDesign = "<style>#$cssid{ $style }</style>";
   
  if ($picturesqlF["current_profile"] == "") {
    echo "{$customDesign} <img src='../main/xbin/img/sys/def.jpg' id='$cssid' alt='defaultprofile'/>";
  } else {
    echo "{$customDesign} <img src='../main/xbin/img/users/$pictureVar' id='$cssid' alt='$pictureVar'/>";
  }
  
}


function _antiRoot_($connect,$sesPhone){
   // anti root
   $stmt = mysqli_stmt_init($connect);
   if (!mysqli_stmt_prepare($stmt, "select * from users where phone = ?")) {
      session_destroy();
      exit();
   } else {
      mysqli_stmt_bind_param($stmt,"s",$sesPhone);
      mysqli_stmt_execute($stmt);
      $usercheck_R = mysqli_stmt_get_result($stmt);
   }
    $usercheck = mysqli_fetch_assoc($usercheck_R);
    if (empty($usercheck["phone"])) {
      //session_destroy();
      _http_res(0,"../login/");
      _innerjs("Account deleted");
      exit();
   }
}

function _fetch_record_number_($connect, $sql_code, $column, $phone){
  $stmt = mysqli_stmt_init($connect);
  $sql = "select * from ".$sql_code." where {$column} = ?";
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "sql error";
  } else {
    mysqli_stmt_bind_param($stmt, "s", $phone);
    mysqli_stmt_execute($stmt);
    $stmt_RES = mysqli_stmt_get_result($stmt);
    $stmt_ROWS = mysqli_num_rows($stmt_RES);
      
        return $stmt_ROWS;
      
  }
}


function _fetch_read_file_($connect, $phone, $table, $column_name, $size, $dir){
  $stmt_f = mysqli_stmt_init($connect);
  $stmt_f_sql = "select {$column_name} from {$table} where phone = ?";
  

    if (!mysqli_stmt_prepare($stmt_f, $stmt_f_sql)) {
      echo "something went wrong from [ _fetch_read_file_(); ] function";
    } else {
      mysqli_stmt_bind_param($stmt_f, "s", $phone);
      mysqli_stmt_execute($stmt_f);
      $stmt_f_Res = mysqli_stmt_get_result($stmt_f);
      $stmt_f_Row = mysqli_num_rows($stmt_f_Res);
      $destination = $dir;

        for ($i = 1; $i <= $stmt_f_Row; $i++) {
          $stmt_f_Fetch = mysqli_fetch_assoc($stmt_f_Res);
          $file = $stmt_f_Fetch["{$column_name}"];

            if (file_exists("{$destination}{$file}")) {
              
              // echo "{$destination}{$file} available ". $file_size ."mb<br>";

                    if ($size == "byte"){
                        
                        if ($stmt_f_Row == 0) {
                          return $stmt_f_Row;
                        } else {
                          $byte_file_size = filesize("{$destination}{$file}");
                          return $byte_file_size * $stmt_f_Row;
                        }

                    } else if ($size=="megabyte") {
                       
                        if ($stmt_f_Row == 0) {
                          return $stmt_f_Row;
                        } else {
                           $file_size = round(filesize("{$destination}{$file}") / 1024 / 1024, 2);
                           return $file_size * $stmt_f_Row;
                        }

                    }

            }

        }

    }

}


// this function will only work if the _fetch_read_file_(); is mentioned
/* 
    These two function are there to help count the number of
    fetches from the server through the database, and reduce the dublicates of 
    [ _fetch_read_file_() ] function.

        _fetch_total_size_MB_
          This function fetches the file allocated in the server using the database 
          query made and customized by the user and looks for the directory path then 
          outputs the size of the file or files in megabytes(MB) size

        _fetch_total_size_B_
          This function fetches the file allocated in the server using the database 
          query made and customized by the user and looks for the directory path then 
          outputs the size of the file or files in bytes(B) size

*/
function _fetch_total_size_MB_($connect, $phone, $songTable, $imgTable){
  return _fetch_read_file_($connect, $phone, $songTable, "songs", "megabyte","../main/xbin/mp3/users/") + 
					_fetch_read_file_($connect, $phone, $songTable, "picture", "megabyte","../main/xbin/img/users/") + 
					_fetch_read_file_($connect, $phone, "businesstable", "pictures", "megabyte","../main/xbin/img/users/business/") +
					_fetch_read_file_($connect, $phone, "imagesdump", "image", "megabyte","../main/xbin/img/users/") + 
					_fetch_read_file_($connect, $phone, "musicdump", "songs", "megabyte","../main/xbin/mp3/users/") + 
				  _fetch_read_file_($connect, $phone, "musicdump", "picture", "megabyte","../main/xbin/img/users/") +
          _fetch_read_file_($connect, $phone, $imgTable, "image", "megabyte","../main/xbin/img/users/");
}

function _fetch_total_size_B_($connect, $phone, $songTable, $imgTable){
  return _fetch_read_file_($connect, $phone, $songTable, "songs", "byte","../main/xbin/mp3/users/") + 
					_fetch_read_file_($connect, $phone, $songTable, "picture", "byte","../main/xbin/img/users/") + 
					_fetch_read_file_($connect, $phone, "businesstable", "pictures", "byte","../main/xbin/img/users/business/") +
					_fetch_read_file_($connect, $phone, "imagesdump", "image", "byte","../main/xbin/img/users/") + 
					_fetch_read_file_($connect, $phone, "musicdump", "songs", "byte","../main/xbin/mp3/users/") + 
				  _fetch_read_file_($connect, $phone, "musicdump", "picture", "byte","../main/xbin/img/users/") +
          _fetch_read_file_($connect, $phone, $imgTable, "image", "byte","../main/xbin/img/users/");
}



function ai_delete_folder_($dir){
  if (!file_exists($dir)) {
    echo "";
  }
  if (!is_dir($dir)) {
    return unlink($dir);
  }

  foreach ( scandir($dir) as $item ) {
    if ($item == '.' || $item == '..') {
      continue;
    }

    if (!ai_delete_folder_($dir . DIRECTORY_SEPARATOR . $item)) {
      return false;
    }

  }
    return rmdir($dir);
}

function _ajax_($version){
    $link = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js";
    if (empty($version)) {
        echo $link;
    } else {
      $link = "https://ajax.googleapis.com/ajax/libs/jquery/{$version}/jquery.min.js";
      echo $link;
    }
}

function _print_($msg){
  echo "{$msg}";
}
