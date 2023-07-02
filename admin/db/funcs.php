<style>
    .custom-alert {
        position: absolute;
        top: 25%;
        text-align: center;

    }
</style>
<?php

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
?>