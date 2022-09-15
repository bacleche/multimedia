<?php 

$connect = mysqli_connect("localhost","root","","my_webcam") ; 

if(isset($_FILES["blobFile"]["tmp_name"])) {
    $tmpName = $_FILES["blobFile"]["tmp_name"];
    $imageName = date("Y.m.d") . " - " . date("h.i.sa") . ' stream_video.mp4';
    $imagebd = "Pas de photo";
    $audio = "pas de audio";
    move_uploaded_file($tmpName, 'video/' . $imageName );

    $date = date("Y/m/d") . " & " . date("h:i:sa"); 
    $query = "INSERT INTO table_camera VALUES('', '$date','$imagebd','$imageName','$audio')";
    mysqli_query($connect,$query);
}

?>