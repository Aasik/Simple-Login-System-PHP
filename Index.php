<?php
//start session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <script src="E:\Wamp\www\Simple Login\JQuery\jquery.min.js"></script>

<style type="text/css">
    body{
        font-weight:lighter;
        margin-top:1.0em;
        background-color:#000;
        font-family:Helvetica, Arial, FreeSans, san-serif;
        color:#555;
            }

            #container{
                margin:0 auto;
                width:700px;
            }

            h1{
                font-size:3.8em;
                color:#edece8;
                margin-bottom:3px;
                text-shadow:0 1px 0px rgba(0,0,0,0.2);
            }
            h1.small{
                font-size:0.3em;
                font-weight:lighter;
                color:#444;
            }
            h1 a{
                color:#666;
                text-decoration:none;
            }

            h2 {
                font-size:1.5em;
                color:#555;
                text-shadow:0 1px 0px rgba(0,0,0,0.2);
            }
            h3{
                text-align:center;
                color:#555;
                text-shadow:0 1px 0px rgba(0,0,0,0.2);
            }

            a{
                color:#777;

            }
            .description{
                font-size:1.0em;
                margin-bottom:30px;
                margin-top:30px;
                color:#666;
                text-shadow:0 1px 0px rgba(0,0,0,0.2);
            }
            pre{
                color:#fff;
                padding:15px;
            }

            hr {
                border:0;
                width:80%;
                border-bottom:1px solid #aaa;

            }

            .footer{
                padding-top:30px;
                font-weight:lighter;
            }
</style>

<script>
    $(function(){
        var $form_inputs = $('form input');
        var $rainbow_and_border = $('.rain, .border');
        /* Used to provide loping animations in fallback mode*/
        $form_inputs.bind('focus', function(){
            $rainbow_and_border.addClass('end').removeClass('unfocus start');
        });
        $form_inputs.bind('blur',function(){
            $rainbow_and_border.addClass('unfocus start').removeClass('end');
        });
        $form_inputs.first().delay(800).queue(function(){
            $(this).focus();
        });
    });
</script>

<style>
    li{
        color:red;
    }
    .border,.rain{
        height:207px;
        width:320px;
    }

    /*Layout with mask*/
    .rain{
        padding:10px 12px 12px 10px;
        -moz-box-shadow:10px 10px 10px rgba(0,0,0,0.1) inset, -9px -9px 8px rgba(0,0,0,0.1) inset;
        -webkit-box-shadow:8px 8px 8px rgba(0,0,0,0.1) inset, -9px  -9px 8px rgba(0,0,0,0.1) inset;
        box-shadow:8px 8px 8px rgba(0,0,0,0.1) inset, -9px -9px 8px rgba(0,0,0,0.1) inset;
        margin:10px auto 50px auto;

    }

    /*Artificial border to clear border to bypass mask*/
    .border{
        padding:1px;
        -moz-border-radius:5px;
        -webkit-border-radius:5px;
        border-radius:5px;
        height:205px;
    }

    .border,
    .rain,
    .border.start,
    .rain.start{
        background-repeat:repeat-x, repeat-x, repeat-x,repeat-x;
        background-position:0 0, 0 0, 0 0, 0 0;
        /*Blue-ish Green Fallback for Mozilla*/
        background-image:-moz-linear-gradient(left,#09BA5E 0%, #00C7CE 15%, #2472CF 26%, #00C7CE 48%, #0CCF91 91%, #09BA5E 100%);
        /*Add "highlight" Texture to the Animation*/
        background-image:webkit-gradient(linear,left top,right top, color-stop(1%,rgba(0,0,0,0.3)), color-stop(23%,rgba(0,0,0,0.1)), color-stop(40%, rgba(255,231,87,0.1)),color-stop:(70%,rgba(255,231,87,0.1)),color-stop(80%,rgba(0,0,0,0.,)),color-stop(100%, rgba(0,0,0,0.25)));
        /*Starting color*/
        background-color:#39f;
        /*Just do soething for IE-suck*/
        filter:progid:DXImageTransform.Microsoft.gradient(startColorstr= '#00BA1B', endColorstr = '#00BA1B', GradientType=1);

    }

    /*Non--keyframe fallback animation*/
    .border.end,
    .rain.end{
        -moz-transition-property:background-position;
        -moz-transition-duration:30s;
        -moz-transition-timing-function:linear;
        -webkit-transition-property:background-position;
        -webkit-transition-duration:30s;
        -webkit-transition-timing-function:linear;
        -o-transition-property:background-position;
        -o-transition-duration:30s;
        -o-transition-timing-function:linear;
        transition-property:background-position;
        transition-duration:30s;
        transition-timing-function:linear;
        background-position: -5400px 0, -4600px 0, +3800px 0,-3000px 0;
    }

/*keyfram-licious animation*/
@-webkit-keyframes colors{
    0%{background-color:#39f;}
    15%{background-color:#F246C9;}
    30%{background-color:#4453F2;}
    45%{background-color:#44F262;}
    60%{background-color:#F257D4;}
    75%{background-color:#EDF255;}
    90%{background-color:#F20006;}
    100%{background-color:#39f;}
}

.border,
.rain{
    -webkit-animation-direction:normal;
    -webkit-animation-duration:20s;
    -webkit-animation-iteration-count:infinite;
    -webkit-animation-name:colors;
    -webkit-animation-timing-function:ease;
}

/*In-Active State Style*/
.border.unfocus{
    background:#333 !important;
    -moz-box-shadow:0px 0px 15px rgba(255,255,255,0.2);
    -webkit-box-shadow:0px 0px 15px rgba(255,255,255,0.2);
    box-shadow:0px 0px 15px rgba(255,255,255,0.2);
    -webkit-animation-name:none;
}

.rain.unfocus{
    background:#000 !important;
    -webkit-animation-name:none;
}

/*Regular form Styles*/
form{
background:#212121;
-moz-border-radius:5px;
-webkit-border-radius:5px;
border-radius:5px;
height:100%;
width:100%;
background:-moz-radial-gradient(50%,46%, 90deg, circle closest-corner, #252525, #090909);
background:-webkit-gradient(radial,50%, 50%, 0, 50%, 50%,150,from(#252525),to(#090909));

}


form label{
    display:block;
    padding:10px 10px 5px 15px;
    font-size:11px;
    color:#777;
}

form input{
    display:block;
    margin:5px 10px 10px 15px;
    width:85%;
    background:#111;
    -moz-box-shadow:0px 0px 4px #000 inset;
    -webkit-box-shadow:0px 0px 4px #000 inset;
    box-shadow:0px 0px 4px #000 inset;
    outline:1px solid #333;
    border:1px solid #000;
    padding:5px;
    color:#444;
    font-size:16px;
}

form input:focus{
    outline:1px solid #555;
    color:#FFF;
}

#but{
    color:#999;
    padding:5px 10px;
    float:right;
    margin:5px 0;
    font-weight:lighter;
    background:#45484d;
    margin-top:5px;
    margin-bottom:5px;
    margin-right:22px;
    width:94px;
}











</style>

</head>
<body>

<div style="margin:0 auto; width:300px;">
<?php
    if(isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) > 0){
    echo '<ul class="err">';
    foreach($_SESSION['ERRMSG_ARR'] as $msg){
        echo '<li>',$msg,'</li>';
    }
    echo '</ul>';
    unset($_SESSION['ERRMSG_ARR']);
    }
?>

</div>


<div class="rain">
    <div class="borer start">
        <form action="login.php" method="post" name="loginSystem">
            <label for="email">Username</label>
            <input type="text" name="username" placeholder = "Username"/>
            <label for="pwd">Password</label>
            <input type="password" name="pass" placeholder="Password"/>
            <input type="submit" value="Login" id="but"/>


        </form>
    </div>


</div>



</body>
</html>

