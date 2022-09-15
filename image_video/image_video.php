<?php
    require 'function.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAVIO | Données</title>
</head>
<style media="screen">
     body {
         text-align:center;
        background-color:#145d;
        color:white;
     }
     table {
        display:flex;
        justify-content:center;
       
     }

     .play {
        border-radius:20px;
     }
     td {
        font-weight:bold;
        font-size:20px;
     }

     label {
        position: relative;
        bottom: 14px;
    }

     button {
        width:300px;
        padding: 12px;
        border: none;
        border-radius: 20px;
        cursor:pointer;
        font-size: 16px;
        background:#2EB82E;
        color:white;
        font-weight:bold;
     }
     button:hover {
        background:#2EB85A;
     }

     .cal {
        border-radius:20px;
     }
</style>
<body>
    <h2>Base De Données de SAVIO &#128515;</h2>
    <table border=2 cellspacing = 0 cellpadding = 0>
        <tr>
            <td><img  class="cal" src="../key.png" alt="" width="50"> </td>
            <td><img  class="cal" src="../cal.png" alt="" width="50"> </td>
            <td><img  class="cal" src="../phit.jpg" alt="" width="50"></td>
            <td><img  class="cal" src="../play.png" alt="" width="50"></td>
            <td><img  class="cal" src="../audio.png" alt="" width="50"></td>
        </tr>
        <?php 
        $rendu = mysqli_query($connect , "SELECT * FROM table_camera ORDER BY id ASC");
        ?>

        <?php while($result = mysqli_fetch_assoc($rendu)){?>
            <tr>
            <td><?php echo($result['id']); ?></td>
            <td><?php echo($result['Date_send']); ?></td>
            <td><img src="img/<?php echo($result['image']); ?> " width = 400 alt=""></td>
            <td>
                <video width = 400  controls="controls" preload="auto"  alt="">
                    <source src="video/<?php echo($result['video']); ?>"  type="video/mp4"/>
                </video>
            </td>
            <td>
                <audio src="audio/<?php echo($result['audio']); ?>"  controls="controls" preload="auto" type="audio/mp3"  alt="">
                   
                </audio>
            </td>
        </tr>
        <?php }?>      
    </table>


    <br>

    <a href="index.html"><button type="button" name="button1"> <label for="">Refaire une Prise</label>   <img  class="play" src="../ret.jpg"  width="40" height="40" alt=""> </button> </a>
    
</body>
</html>