<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAVIO | Video</title>
</head>
<style media="screen">

    body {
        background-color: rgba(17, 68, 85, 0.867);
        text-align:center;  
    }
    
    .container{
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .container > .flex {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

  
    .container  button{
        width:480px;
        padding: 12px;
        border: none;
        border-radius: 20px;
        cursor:pointer;
        font-size: 16px;
    }

    .container >.flex >button {
        width:300px;
        background:red;
        color:white;
    }
    .container >button {
        background:#3605ca;
        color:white;
    }

    .container a button {
        background:#2EB82E;
        color:white;
        width: 150px;
    }

    .vi{
        position: relative;
        left:1px;
        background: rgba(54, 155, 189, 0.867);;
    }

    .play{
        border-radius:15px;
    } 
    label {
        position: relative;
        bottom: 14px;
    }
</style>
<body  style="" >

<div class="container">

    <video class="vi " controls="controls" id="stream-elem" width="350" height="400">
        <source src="" type="">
    </video>
    <br>
    <div class="flex">
    <button type="button" id="start_video" class="video" onclick= "">Enregister Video</button>
    <br>
    <button type="button" id="stop_video" class="video" onclick= "">Arreter Enregistrement</button>
    </div>
    <br>
    <a href="image_video.php"><button  type="button" name="button1">Transferer  &#x2192;</button> </a>

    <br>

    <a href="index.html"><button type="button" name="button1"> <label for="">Retour</label>   <img  class="play" src="../ret.jpg"  width="40" height="40" alt=""> </button> </a>

</div>

    <script type="text/javascript">
  

    var video_el = document.getElementById('stream-elem');
    var startBtn = document.getElementById('start_video');
    var endBtn = document.getElementById('stop_video');
    
    const settings = {
        video:true,
        audio:true
    }
    startBtn.addEventListener('click', function (e){
        navigator.mediaDevices.getUserMedia(settings).then((stream) => {
          video_el.srcObject = stream

          recorder = new MediaRecorder(stream)
          
          recorder.start();

          const blobContainer = [];

          recorder.ondataavailable = function (e) {
            blobContainer.push(e.data)
          }


          recorder.onerror = function (e) {
              return console.log(e.error || new Errow(e.name));
          }

          recorder.onstop = function (e) {
              console.log(window.URL.createObjectURL(new Blob(blobContainer)));
              var new_Video = document.createElement('video')
              new_Video.height ='400'
              new_Video.width = '600'
              new_Video.autoplay = true
              new_Video.controls = true
              new_Video.innerHTML = `<source src="${window.URL.createObjectURL(new Blob(blobContainer))} type="video/mp4">`
              document.body.prepend(new_Video);

              var formdata = new FormData();
              formdata.append('blobFile', new Blob(blobContainer));
              fetch('upload.php' , {
                method: 'POST',
                body: formdata
              }).then((res)=>res.json()).then(()=>{
                alert('tokoss')
              })
            }
        })
    })

    endBtn.addEventListener('click', function (e) {
        video_el.pause();
        recorder.stop();
    })
        
    </script>
    

</body>
</html>