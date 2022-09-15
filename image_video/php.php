<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAVIO | WebCam</title>
</head>
<style media="screen">

    body {
        background-color:#145d;
    }
    
    .container{
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    #ma_Camera {
        border : 5px solid #2EB82E;
        border-radius: 10px;
    }

    .container  button{
        width:480px;
        padding: 12px;
        border: none;
        border-radius: 20px;
        cursor:pointer;
        font-size: 16px;
    }


    .container >button {
        background:#3605ca;
        color:white;
    }

    .container a button {
        background:#2EB82E;
        color:white;
    }
</style>
<body onload = "configure();">

<div class="container">
    <div id="ma_Camera">
    </div>

    


    <div id="resultat" style = "visibily: hidden; position: absolute;">

    </div>
    <br>
    <button type="button" onclick= "saveSnap();">Enregister Photo</button>
    <br>
    <a href="image_video.php"><button  type="button" name="button1">Transferer  &#x2192;</button> </a>

</div>
    
    <script type="text/javascript" src="../asset/webcam.min.js">

    </script>

    <script type="text/javascript">
    function configure() {
        Webcam.set({
            width: 480,
            height: 360,
            image_format: 'jpeg',
            jpeg_quality: 90
        });

        Webcam.attach('#ma_Camera');
    }


    function saveSnap(){
        Webcam.snap(function(data_uri){
            document.getElementById('resultat').innerHTML = '<img id ="webcam" src="'+data_uri+'"/>';
        });

        Webcam.reset();

        var hexaimage_video = document.getElementById("webcam").src;
        Webcam.upload(hexaimage_video, 'function.php', function(code,text){
            alert('Save Successfully');
            
        })
    }
/*
    var video_el = document.getElementById('stream-elem');
    var startBtn = document.getElementById('start_video');
    var endBtn = document.getElementById('stop_video');
    
    const settings = {
        video:true,
        audio:false
    }
    startBtn.addEventListener('click', function (e)){
        navigator.mediaDevices.getUserMedia(setting).then(stream) => {
          video_el.srcObject = stream
        }
        <video id="stream-elem" controls = "controls" width="480">
        <source type="">
    </video>
    }*/
    </script>
    

</body>
</html>