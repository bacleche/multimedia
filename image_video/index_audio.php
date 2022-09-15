<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAVIO | Songs</title>
</head>
<style media="screen">

    body {
        background-color:#145d;
    }
    
    .container{
        display: flex;
        flex-direction: column;
        align-items: center;
        position: relative;
        top:200px;
    }

  
    .container  button{
        width:150px;
        padding: 12px;
        border: none;
        border-radius: 20px;
        cursor:pointer;
        font-size: 16px;
    }
    .container > .flex {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .container >.flex >button {
        width:200px;
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
    }
</style>
<body >

<div class="container">

    <audio  src="" controls="controls" id="stream-elem" type="audio/mp3">
    </audio>
    <br>
    <div class="flex">
    <button type="button" id="start_song" class="video" onclick= "">Enregister le son</button>
    <br>
    <button type="button" id="stop_song" class="video" onclick= "">Arreter L'enregistrement</button>
    </div>
    <br>
    <a href="image_video.php"><button  type="button" name="button1">Transferer  &#x2192;</button> </a>
    <br>
    <a href="index.html"><button type="button" name="button1"> <label for="">Retour</label>   <img  class="play" src="../ret.jpg"  width="40" height="40" alt=""> </button> </a>
</div>

    <script type="text/javascript">
  

    var song_el = document.getElementById('stream-elem');
    var startBtn = document.getElementById('start_song');
    var endBtn = document.getElementById('stop_song');
    
    const settings = {
        audio:true
    }
    startBtn.addEventListener('click', function (e){
        navigator.mediaDevices.getUserMedia(settings).then((stream) => {
          song_el.srcObject = stream

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
              var new_song = document.createElement('audio')
              new_song.autoplay = true
              new_song.controls = true
              new_song.innerHTML = `<audio controls="controls" src="${window.URL.createObjectURL(new Blob(blobContainer))} type="audio.mp3"></audio>`
              document.body.prepend(new_song);

              var formdata = new FormData();
              formdata.append('blobFile', new Blob(blobContainer));


              fetch('upload_song.php' , {
                method: 'POST',
                body: formdata
              })
               alert('Audio Enregistrer avec succès');
            }
        })
    })

    endBtn.addEventListener('click', function (e) {
        song_el.pause();
        recorder.stop();
    })
        
    </script>
    

</body>
</html>