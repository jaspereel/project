<?php
require_once("sql.php");

switch($_GET['go']){
    case 'admin_login':
        $check=select("admin","account='".$_POST['admin_login_id']."' AND password='".md5($_POST['admin_login_password'])."'");
        if($check){
            $_SESSION['admin']=$_POST['admin_login_id'];
            $_SESSION['name']=$check[0]['name'];
            // print_r($check);
            plo("admin_backend.php");
        }
        else echo"<script>alert('帳號或密碼錯誤，請重新輸入!');".jlo('index.php')."</script>";
    break;
    case 'member_login':
        $check=select("member","email='".$_POST['member_login_email']."' AND password='".md5($_POST['member_login_password'])."'");
        if($check){
            // $_SESSION['member']=$_POST['member_login_email'];
            $_SESSION=$check[0];
            // print_r($_SESSION['email']);
            plo("member_backend.php");
        }
        else echo"<script>alert('帳號或密碼錯誤，請重新輸入!');".jlo('index.php')."</script>";
    break;
    case 'logout':
        session_destroy();
        plo("index.php");
    break;
    case 'member_register':
        $_POST['password']=md5($_POST['password']);
        insert($_POST,"member");
    break;
    case 'checkemail':
        $rows=$db->query("SELECT * from member WHERE email='".$_POST['acc']."'")->fetchAll();
        if($rows!=null) echo "此email已被註冊";
        else echo "";
    break;
    case 'member_update':
        if($_POST['phone']!=$_POST['old_phone']){
            update("member","phone='".$_POST['phone']."'",$_SESSION['id']);
            $_SESSION['phone']=$_POST['phone'];
            plo("member_backend.php?go=member_profile");
        }
        if($_POST['address']!=$_POST['old_address']){
            update("member","address='".$_POST['address']."'",$_SESSION['id']);
            $_SESSION['address']=$_POST['address'];
            plo("member_backend.php?go=member_profile");
        }
    break;
    case 'admin_member_select':
        $rows=array();
        $rows=$db->query("SELECT * from member WHERE id='".$_POST['member_id']."'")->fetchAll();
        $all = json_encode($rows);
        echo $all;
    break;
    case 'admin_member_update':
        update("member","last_name='".$_POST['last_name']."',first_name='".$_POST['first_name']."',phone='".$_POST['phone']."',address='".$_POST['address']."'",$_POST['id']);
        plo("admin_backend.php?go=admin_profile");
    break;

    case 'admin_room_insert':
        $_POST['picture_url_1']=addfile_room($_FILES['picture_url_1']);
        $_POST['picture_url_2']=addfile_room($_FILES['picture_url_2']);
        $_POST['picture_url_3']=addfile_room($_FILES['picture_url_3']);
        $_POST['picture_url_4']=addfile_room($_FILES['picture_url_4']);
        insert($_POST,"room");
        plo('admin_backend.php?go=admin_room');
    break;
    case 'admin_room_select':
        $rows=array();
        $rows=$db->query("SELECT * from room WHERE id='".$_POST['room_id']."'")->fetchAll();
        $all = json_encode($rows);
        echo $all;
    break;    
    case 'admin_room_update':
        update("room","name='".$_POST['name']."',total_stock='".$_POST['total_stock']."',price='".$_POST['price']."',max_person='".$_POST['max_person']."',room_size='".$_POST['room_size']."',bed_size='".$_POST['bed_size']."',introduction='".$_POST['introduction']."',equipment='".$_POST['equipment']."'",$_POST['id']);

        // print_r($_FILES);
        // print_r($_POST);
        foreach($_FILES as $file => $values){
            // echo($values['error']."<br>") ;
            if(!$values['error']){
                $_POST[$file]=addfile_room($_FILES[$file]);
                update("room","$file='".$_POST[$file]."'",$_POST['id']);
            }
        }
        plo('admin_backend.php?go=admin_room');
    break; 
    case 'admin_room_del':
        delete("room",$_GET['del']);
        plo('admin_backend.php?go=admin_room');
    break;
    case 'room_select':
        $rows=array();
        $rows=$db->query("SELECT * from room WHERE id='".$_POST['room_id']."'")->fetchAll();
        $all = json_encode($rows);
        echo $all;
    break;    
    case 'admin_news_insert':
        $_POST['title_picture_url']=addfile_news($_FILES['title_picture_url']);
        insert($_POST,"news");
        plo('admin_backend.php?go=admin_news');
    break;
    case 'admin_news_select':
        $rows=array();
        $rows=$db->query("SELECT * from news WHERE id='".$_POST['news_id']."'")->fetchAll();
        $all = json_encode($rows);
        echo $all;
    break;
    case 'admin_news_update':
        update("news","title='".$_POST['title']."',start_day='".$_POST['start_day']."',end_day='".$_POST['end_day']."',content='".$_POST['content']."'",$_POST['id']);
        
        foreach($_FILES as $file => $values){
            // echo($values['error']."<br>") ;
            if(!$values['error']){
                $_POST[$file]=addfile_news($_FILES[$file]);
                update("news","$file='".$_POST[$file]."'",$_POST['id']);
            }
        }
        plo('admin_backend.php?go=admin_news');
    break;     
    case 'news_select':
        $rows=array();
        $rows=$db->query("SELECT * from news WHERE id='".$_POST['news_id']."'")->fetchAll();
        $all = json_encode($rows);
        echo $all;
    break;       
    case 'admin_news_del':
        delete("news",$_GET['del']);
        plo('admin_backend.php?go=admin_news');
    break;
    case 'admin_contact_select':
        $rows=array();
        $rows=$db->query("SELECT * from contact WHERE id='".$_POST['contact_id']."'")->fetchAll();
        $all = json_encode($rows);
        echo $all;
    break;
    case 'admin_contact_update':
        update("contact","reply_content='".$_POST['reply_content']."',reply_date='".$_POST['reply_date']."',reply_person='".$_POST['reply_person']."',reply_flag='".$_POST['reply_flag']."'",$_POST['id']);
        plo('admin_backend.php?go=admin_contact');
    break; 
    case 'admin_contact_del':
        delete("contact",$_GET['del']);
        plo('admin_backend.php?go=admin_contact');
    break;
}
?>