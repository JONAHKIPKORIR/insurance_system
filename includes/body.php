


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        .slider-frame{
            overflow: hidden;
            height: 500px;
            width: 1200px;
            
            margin-top: 30px;
            margin-left: 5%;
            margin-right: 5%;
            margin-bottom: 30px;
            
        }
        @-webkit-keyframes slide_animation{
            0%{left: 0px;}
            10%{left: 0px;}
            20%{left: 1200px;}
            30%{left: 1200px;}
            40%{left: 2400px;}
            50%{left: 2400px;}
            60%{left: 1200px;}
            70%{left: 1200px;}
            80%{left: 0px;}
            90%{left: 0px;}
            100%{left: 0px;}
        }
        .slide-images{
            width: 3600px;
            height: 500px;
            margin: 0 0 0 -2400px;
            position: relative;
            -webkit-animation-name: slide_animation;
            -webkit-animation-duration: 33s;
            -webkit-animation-iteration-count: infinite;
            -webkit-animation-direction: alternate;
            -webkit-animation-play-state: running;
        }
        .image-container{
            width: 1200px;
            height: 500px;
            position: relative;
            float: left;
        }
    </style>
</head>
<body>
    
<div class="body-section">
        <div class="slider-frame">
                <div class="slide-images">
                        
                        <div class="image-container">
                            <h2 class="image-title">Image 1</h2>
                            <img class="image" src="images/green-wallpaper.jpg" alt="">  
                        </div> 
                        <div class="image-container">
                            <h2 class="image-title">Image 2</h2>
                            <img class="image" src="images/6.jpg" alt="">  
                        </div>

                        <div class="image-container">
                            <h2 class="image-title">Image 3</h2>
                            <img class="image" src="images/green-wallpaper.jpg" alt="">  
                        </div>
                        <div class="image-container">
                            <h2 class="image-title">Image 3</h2>
                            <img class="image" src="images/green-wallpaper.jpg" alt="">  
                        </div> 

                </div>
            </div>
     </div>
    
</body>
</html>