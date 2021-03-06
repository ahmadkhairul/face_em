<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>tracking.js - face alignment with camera</title>
  <link rel="stylesheet" href="assets/demo.css">

  <script src="build/tracking.js"></script>
  <script src="build/data/face-min.js"></script>
  <script src="src/alignment/training/Landmarks.js"></script>
  <script src="src/alignment/training/Regressor.js"></script>
  <script src="jquery-1.10.1.min.js"></script>

 
  <style>
  video, canvas {
    margin-left: 230px;
    margin-top: 120px;
    position: absolute;
  }
  </style>
</head>
<body>
  <div class="demo-frame">
    <div class="demo-container">
      <video id="video" width="320" height="240" preload autoplay loop muted></video>
      <canvas id="canvas" width="320" height="240"></canvas>
      <div id="isi"></div>
    </div>
  </div>

  <script>
    window.onload = function() {
      var video = document.getElementById('video');
      var canvas = document.getElementById('canvas');
      var context = canvas.getContext('2d');

      var tracker = new tracking.LandmarksTracker();
      tracker.setInitialScale(4);
      tracker.setStepSize(2);
      tracker.setEdgesDensity(0.1);

      tracking.track('#video', tracker, { camera: true });

      tracker.on('track', function(event) {

        context.clearRect(0,0,canvas.width, canvas.height);

        if(!event.data) return;

          event.data.faces.forEach(function(rect) {
            context.strokeStyle = '#a64ceb';
            context.strokeRect(rect.x, rect.y, rect.width, rect.height);
            context.font = '11px Helvetica';
            context.fillStyle = "#fff";
            context.fillText('x: ' + rect.x + 'px', rect.x + rect.width + 5, rect.y + 11);
            context.fillText('y: ' + rect.y + 'px', rect.x + rect.width + 5, rect.y + 22);
            
            var snapshotContext = canvas.getContext('2d');
            snapshotContext.drawImage(video, 0, 0, video.width, video.height);
            var dataURI = canvas.toDataURL('image/png'); // can also use 'image/png'
            //This dataURI is what you would use to get the actual image
         
            console.log(dataURI);
    
          });

          event.data.landmarks.forEach(function(landmarks) {
            for(var l in landmarks){
              context.beginPath();
              context.fillStyle = "#fff"
              context.arc(landmarks[l][0],landmarks[l][1],1,0,2*Math.PI);
              context.fill();
            }
          });        
      });

      var gui = new dat.GUI();
      gui.add(tracker, 'edgesDensity', 0.1, 0.5).step(0.01).listen();
      gui.add(tracker, 'initialScale', 1.0, 10.0).step(0.1).listen();
      gui.add(tracker, 'stepSize', 1, 5).step(0.1).listen();

    };
  </script>

</body>
</html>
