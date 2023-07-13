<style>
    .custom-alert {
        position: absolute;
        top: 25%;
        text-align: center;

    }
</style>
<?php
//FrontEnd process
// define('SITE_URL', 'http://localhost:3000/mambocabana');
// define('ABOUT_IMG_PATH', SITE_URL.'images/about/');
// define('CAROUSEL_IMG_PATH', SITE_URL.'images/about/');
// define('FACILITIES_IMG_PATH', SITE_URL.'images/facilitites/');
// define('ROOMS_IMG_PATH', SITE.URL.'images/rooms/');
// define('USERS_IMG_PATH',SITE_URL.'images/users/');

//BackEnd process UPLOADs
// define('UPLOAD_IMAGE_PATH', $_SERVER['DOCUMENT_ROOT'].'mambocabana/images/');
// define('ABOUT_FOLDER','about/');
// define('CAROUSEL_FOLDER','carousel/');
// define('FACILITIES_FOLDER','facilities/');
// define('ROOMS_FOLDER','rooms/');
// define('USERS_FOLDER','users/');


//TODO



function adminLogin(){
    session_start();
    if(!(isset($_SESSION['adminLogin']) && $_SESSION['adminLogin']==true)){
       // header("Location: index.php");
       echo "<script>
        window.location.href='index.php';
       </script>";
    }
    session_regenerate_id(true);
}

function redirect($url)
{
    echo "<script>
    window.location.href = '$url';
    </script>";
    exit;
}



function alert($type, $msg)
{
    $bs_class = ($type == "success") ? "alert-success" : "alert-danger";
    echo <<<alert
    <div class="alert $bs_class alert-dismissible fade show custom-alert" role="alert">
        <strong class="ms-3">$msg</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
     </div>
    alert;
}

//upload image
function uploadImage($image, $folder){
    $valid_mime = ['image/jpeg', 'image/jpg','image/png','image/webp'];
    $img_mime = $image['type'];

    if(!in_array($img_mime, $valid_mime)){
        return 'inv_img'; //Invalid Image Format
    }
    else if(($image['size']/(1024*1024))>20){
        return 'inv_size'; //Invalid Image Size (Above 20MB)
    }
    else{
        $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
        $rname = 'IMG_'.random_int(11111,99999).".$ext";

        $img_path = UPLOAD_IMAGE_PATH.$folder.$rname;
        if(move_uploaded_file($image['tmp_name'],$img_path)){
            return $rname;
        }
        else{
            return 'upd_failed';
        }
    }
}

//delete image
function deleteImage($image, $folder){
    if(unlink(UPLOAD_IMAGE_PATH.$folder.$image)){
        return true;
    }
    else{
        return false;
    }
}

//SVG/ICON Upload
function uploadSVGImage($image, $folder){
    $valid_mime = ['image/svg+xml'];
    $img_mime = $image['type'];

    if(!in_array($img_mime, $valid_mime)){
        return 'inv_img';
    }
    else if(($image['size']/(1024*1024))>20){
        return 'inv_size';
    }
    else{
        $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
        $rname = 'IMG_'.random_int(11111,99999).".$ext";

        $img_path = UPLOAD_IMAGE_PATH.$folder.$rname;
        if(move_uploaded_file($image['tmp_name'],$img_path)){
            return $rname;
        }
        else{
            return 'upd_failed';
        }
    }
}
?>