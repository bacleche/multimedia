<?php $connect = mysqli_connect("localhost","root","","my_webcam") ;

if(isset($_FILES["blobFile"]["tmp_name"])) {
    $tmpName = $_FILES["blobFile"]["tmp_name"];
    $imageName = date("Y.m.d") . " - " . date("h.i.sa") . ' audio.mp3';
    $imagebd = "Pas de photo";
    $video = "pas de video";
    move_uploaded_file($tmpName, 'audio/' . $imageName );

    $date = date("Y/m/d") . " & " . date("h:i:sa"); 
    $query = "INSERT INTO table_camera VALUES('', '$date','$imagebd','$video','$imageName')";
    mysqli_query($connect,$query);
}

?>