<?php
$connect = mysqli_connect("localhost","root","","my_webcam") ; 

if(isset($_FILES["webcam"]["tmp_name"])) {
    $tmpName = $_FILES["webcam"]["tmp_name"];
    $imageName = date("Y.m.d") . " - " . date("h.i.sa") . ' .jpeg';
    $video = "Pas de video";
    $audio = "pas de audio";
    move_uploaded_file($tmpName, 'img/' . $imageName );

    $date = date("Y/m/d") . " & " . date("h:i:sa"); 
    $query = "INSERT INTO table_camera VALUES('', '$date','$imageName','$video','$audio')";
    mysqli_query($connect,$query);
}

?>