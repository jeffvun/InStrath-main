<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InStrath</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="icon" href="https://strathmore.edu/wp-content/uploads/2016/10/cropped-coatofarms-300x300.jpg" sizes="32x32">
    <link rel='stylesheet' type='text/css' media='screen' href='/assets/css/camera.css'>
    <script src="//code.jquery.com/jquery-3.3.1.min.js"></script>  
</head>
<body>
    <main id="webcam-app">
        <?php include_once("../../templates/navbar.php"); ?>
        <div class="form-control webcam-start" id="webcam-control">
                <label class="form-switch">
                <input type="checkbox" id="webcam-switch">
                <i></i> 
                <span id="webcam-caption">Click to Start Camera</span>
                </label>      
                <button id="cameraFlip" class="btn d-none"></button>                  
        </div>
        <div id="errorMsg" class="col-12 col-md-6 alert-secondary d-none">
            Fail to start camera, please allow permision to access camera. <br/>
            If you are browsing through social media built in browsers, <br/>
            you would need to open the page in Sarafi (iPhone)/ Chrome (Android)<br/>
            <button id="closeError" class="btn btn-primary ml-3">OK</button>
        </div>
        <div class="md-modal md-effect-12">
            <div id="app-panel" class="app-panel md-content row p-0 m-0">     
                <div id="webcam-container" class="webcam-container col-12 d-none p-0 m-0">
                    <video id="webcam" autoplay playsinline width="640" height="480"></video>
                    <canvas id="canvas" class="d-none"></canvas>
                    <div class="flash"></div>
                    <audio id="snapSound" src="/assets/audio/demo_audio_snap.wav" preload = "auto"></audio>
                </div>
                <div id="cameraControls" class="cameraControls">
                    <a href="#" id="exit-app" title="Exit App" class="d-none"><i class="material-icons">close</i></a>
                    <a href="#" id="take-photo" title="Take Photo"><i class="material-icons">take_picture</i></a>
                    <a href="#" id="download-photo" download="selfie.png" target="_blank" title="Save Photo" class="d-none"><i class="material-icons">download</i></a>  
                    <a href="#" id="resume-camera"  title="Resume Camera" class="d-none"><i class="material-icons">resume</i></a>
                </div>
            </div>        
        </div>
        <div class="md-overlay"></div>
    </main>
    <script type="text/javascript" src="https://unpkg.com/webcam-easy/dist/webcam-easy.min.js"></script>
    <script src="/assets/js/camera.js"></script>
</body>
</html>