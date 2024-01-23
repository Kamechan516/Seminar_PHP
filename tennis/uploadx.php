<?php
  //アップロード処理(ファイル存在と正しい手順でアップロードされたか検証)
  if(isset($_FILES["image"]) && (is_uploaded_file($_FILES["image"]["tmp_name"])))
  {
      $old_name = $_FILES["image"]["tmp_name"];
      $new_name = date("YmdHis");
      $new_name .= mt_rand();
      $size = getimagesize($_FILES['image']['tmp_name']);
      switch ($size[2])
      {
        case IMAGETYPE_JPEG:
          $new_name .= '.jpg';
          break;
        case IMAGETYPE_GIF:
          $new_name .= '.gif';
          break;
        case IMAGETYPE_PNG:
          $new_name .= '.png';
          break;
        default:
          header("Location: ./upload.html");
          exit();
      }
      
      //アップロード処理
      $status = move_uploaded_file($old_name,"album/".$new_name);
      if($status == true)
      {
      	echo '<form method="post" action="./upload.html" style="display: inline"><button>アップロード完了</button></form>';
      }
      else
      {
      	echo '<form method="post" action="./upload.html" style="display: inline"><button>アップロード失敗</button></form>';
      }
    }
?>
