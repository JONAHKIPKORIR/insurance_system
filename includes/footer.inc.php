<style>
    footer{
       position: relative;
        bottom: 0;
        left: 0;right: 0;
        background: #111;
        height: auto;
        width: auto;
        color: #fff;
        padding-top: 40px;
        
    }
    .footer-content {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        text-align: center;
    }
    .footer-content h3 {
        font-size: 2.0rem;
        line-height: 3rem;
        font-weight: 500;
        text-transform: capitalize;
    }
    .footer-content p {
        max-width: 500px;
        margin: 10px auto;
        line-height: 30px;
        font-size: 15px;
        color: #fff;
        text-align: justify;
    }
    ul.socials {
        display: flex;
        margin: 1rem;
        align-items: center;
        justify-content: center;
        list-style: none;
    }
    .socials  li {
        margin: 0 10px;
        
    }
    .socials a{
        text-decoration: none;
        color: #fff;
        border: 1.1px solid white;
        padding: 10px;
        border-radius: 50%;
        
    }
    .socials a img{
        font-size: 1.1rem;
        width: 20px;
        transition: color .4s ease;
    }

    .footer-bottom {
        
        
        background: #000;
        height: auto;
        width: 100%;
        padding: 20px;
        padding-bottom: 40px;
        text-align: center;
    }
    .footer-bottom p {
        font-size: 16px;
        float: left;
        word-spacing: 2px;
        text-transform: capitalize;
    }
    .footer-bottom p a {
        text-decoration: none;
        color: green;
        font-size: 16px;
    }
    .footer-menu {
        float: right;
    }
    ul.f-menu {
        display: flex;
    }
    .f-menu li {
        display: block;
        padding-right: 10px;
    }
    .footer-menu ul li a{
    color: #cfd2d6;
    text-decoration: none;
    }
    .footer-menu ul li a:hover{
    color: cadetblue;
    }


    @media(max-width:500px) {
        .footer-bottom{
            display: flex;
            justify-content: flex-start;
        }
    }
    </style>
    
    <footer>
        <div class="footer-content">
            <h3>JPlus Insurance System</h3>
            <p>Jplus Insurance System Is web based system owned by Jplus Insurance Company and developed by Jonah Kiplimo. With this System, a customer applies for an insurance cover then the covers are managed by the System administrators in the Jplus Company</p>
            
            <ul class="socials">
                <li><a href="#"><img src="gif/facebook-gif.gif" style="width: 20px; height:20px;" alt=""></a></li>
                <li><a href="#"><img src="gif/twitter-gif.gif" style="width: 20px; height:20px;" alt=""></a></li>
                <li><a href="#"><img src="gif/instagram-gif.gif" style="width: 20px; height:20px;" alt=""></a></li>
                <li><a href="#"><img src="gif/linkedin-gif.gif" style="width: 20px; height:20px;" alt=""></a></li>
                <li><a href="#"><img src="gif/youtube-gif.gif" style="width: 20px; height:20px;" alt=""></a></li>

            </ul>

            <div class="footer-bottom">
                <p>copyright &copy;2022 <a href="#">Jkips Insurance System;Jonah Kiplimo (developer)</a></p>
                <div class="footer-menu">
                    <ul class="f-menu">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="login.php">Client</a></li>
                        <li><a href="login.php">Admin</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    


<!--
<link rel="stylesheet" type="text/css" href="style.css">
<style>
    
</style>

<footer>
    <div class="footer">
        <div class="row">
            <div class="col-sm-6">
                Copyright 2022 by Jonah Kip
            </div>
            <div class="col-sm-6" text-right>
                Designed by Jonah Kip
            </div>
        </div>
    </div>

-->



</footer>