<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            .body {
                height: 600px;
                margin: 0 auto;
                display: flex;
                flex-flow: column;
                justify-content: center;
            }
            h1 {
                margin: 0 auto;
                font-size: 5.0em;
                text-shadow: 0 0 50px rgb(105,105,105);
                -webkit-animation-name: 'shining';
                -webkit-animation-duration: 5s;
                -webkit-animation-timing-function: linear;
                -webkit-animation-iteration-count: infinite;
            }
            .t1 {
                color: blue;
                -webkit-animation-name: 'changing1';
                -webkit-animation-duration: 20s;
                -webkit-animation-timing-function: linear;
                -webkit-animation-iteration-count: infinite;
            }
            .t2 {
                color: red;
                -webkit-animation-name: 'changing2';
                -webkit-animation-duration: 20s;
                -webkit-animation-timing-function: linear;
                -webkit-animation-iteration-count: infinite;
            }
            .t3 {
                color: rgb(0,139,0);
                -webkit-animation-name: 'changing3';
                -webkit-animation-duration: 20s;
                -webkit-animation-timing-function: linear;
                -webkit-animation-iteration-count: infinite;
            }
            .t4 {
                color: rgb(255,215,0);
                -webkit-animation-name: 'changing4';
                -webkit-animation-duration: 20s;
                -webkit-animation-timing-function: linear;
                -webkit-animation-iteration-count: infinite;
            }
            @-webkit-keyframes shining {
                from {text-shadow: 0 0 50px rgb(105,105,105); }
                25% {text-shadow: 0 0 25px red;}
                50% {text-shadow: 0 0 10px blue;}
                75% {text-shadow: 0 0 25px green;}
                100% {text-shadow: 0 0 50px rgb(105,105,105);}
            }
            @-webkit-keyframes changing1 {
                from {color: blue;}
                25% {color: red;}
                50% {color: rgb(0,139,0);}
                75% {color: rgb(255,215,0);}
                100% {color: blue;}
            } 
            @-webkit-keyframes changing2 {
                from {color: red;}
                25% {color: rgb(0,139,0);}
                50% {color: rgb(255,215,0);}
                75% {color: blue;}
                100% {color: red;}
            } 
            @-webkit-keyframes changing3 {
                from {color: rgb(0,139,0);}
                25% {color: rgb(255,215,0);}
                50% {color: blue;}
                75% {color: red;}
                100% {color: rgb(0,139,0);}
            } 
            @-webkit-keyframes changing4 {
                from {color: rgb(255,215,0);}
                25% {color: blue;}
                50% {color: red;}
                75% {color: rgb(0,139,0);}
                100% {color: rgb(255,215,0);}
            } 
        </style>
    </head>
    <body>
        <div class="body">
            <h1>
                <span class="t1">H</span>
                <span class="t2">e</span>
                <span class="t3">l</span>
                <span class="t4">l</span>
                <span class="t1">o</span>
                <span class="t1">&nbsp;</span>
                <span class="t2">H</span>
                <span class="t3">C</span>
                <span class="t4">I</span>
            </h1>
        </div>
    </body>
</html>
