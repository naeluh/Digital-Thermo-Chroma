
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>gradient mask on mouse move with paper.js</title>
  <script type='text/javascript' src='//code.jquery.com/jquery-1.9.1.js'></script>
  <script type='text/javascript' src="http://files.hulea.org/paperjs-v0.9.18/dist/paper-full.min.js"></script>
  <script type='text/javascript' src="http://yourimage.io/dev_2/js/plugins.js"></script>
  <style type='text/css'>
    button, csws html, input, select, textarea {
    color:#222
}
::-moz-selection {
    background:#b3d4fc;
    text-shadow:none
}
::selection {
    background:#b3d4fc;
    text-shadow:none
}
hr {
    display:block;
    height:1px;
    border:0;
    border-top:1px solid #ccc;
    margin:1em 0;
    padding:0
}
fieldset {
    border:0;
    margin:0;
    padding:0
}
textarea {
    resize:vertical
}
.chromeframe {
    margin:.2em 0;
    background:#ccc;
    color:#000;
    padding:.2em 0
}
.wrapper {
    width:90%;
    margin:0 5%
}
.header-container {
    border-bottom:20px solid #e44d26
}
.footer-container, .main aside {
    border-top:20px solid #e44d26
}
.footer-container, .header-container, .main aside {
    background:#f16529
}
.title {
    color:#fff
}
nav ul {
    margin:0;
    padding:0
}
nav a {
    display:block;
    margin-bottom:10px;
    padding:15px 0;
    text-align:center;
    text-decoration:none;
    font-weight:700;
    color:#fff;
    background:#e44d26
}
nav a:hover, nav a:visited {
    color:#fff
}
nav a:hover {
    text-decoration:underline
}
.main {
    padding:30px 0
}
.main article h1 {
    font-size:2em
}
.main aside {
    color:#fff;
    padding:0 5% 10px
}
.footer-container footer {
    color:#fff;
    padding:20px 0
}
.ie7 .title {
    padding-top:20px
}
.show_hidepallete {
    display:block
}
body>div.palettejs-panel>table>tr>td:nth-child(1) {
    padding:5px;
    margin:6px;
    border-spacing:10px
}
body>div.palettejs-panel>table>tr>td:nth-child(2) {
    position:relative;
    top:4px;
    left:10px
}
body>div.palettejs-panel>table>tr>td {
    padding:5px;
    margin:6px
}
body>div.palettejs-panel {
    background-color:rgba(0, 0, 0, .5);
    position:absolute;
    top:0;
    font-weight:700;
    text-transform:uppercase;
    padding:10px 20px 10px 10px;
    color:#fff;
    overflow:hidden;
    margin:20px
}
#mycanvas {
    display:block;
    position:absolute;
    width:100%;
    height:100%
}
#preloader {
    position:fixed;
    top:0;
    left:0;
    right:0;
    bottom:0;
    background-color:rgba(255, 255, 255, 1);
    z-index:100
}
#status {
    position:fixed;
    top:22.5%;
    left:0;
    right:0;
    margin:auto;
    width:50%;
    background:rgba(255, 255, 255, .9);
    padding:0;
    -moz-box-shadow:0 0 0 rgba(0, 0, 0, .4);
    -webkit-box-shadow:0 0 0 rgba(0, 0, 0, .4);
    -o-box-shadow:0 0 0 rgba(0, 0, 0, .4);
    -ms-box-shadow:0 0 0 rgba(0, 0, 0, .4);
    box-shadow:0 0 0 rgba(0, 0, 0, .4);
    font-family:"Lucida Console", Monaco, monospace;
    font-size:10px
}
#fps {
    color:#000;
    top:0;
    left:0;
    position:fixed;
    margin:1%;
    font-size:30px;
    background-color:#fff;
    padding:7px;
    box-shadow:0 0 18px
}
@-webkit-keyframes blink {
    0% {
        opacity:1
    }
    50% {
        opacity:0
    }
    100% {
        opacity:1
    }
}
@-moz-keyframes blink {
    0% {
        opacity:1
    }
    50% {
        opacity:0
    }
    100% {
        opacity:1
    }
}
@-o-keyframes blink {
    0% {
        opacity:1
    }
    50% {
        opacity:0
    }
    100% {
        opacity:1
    }
}
@-ms-keyframes blink {
    0% {
        opacity:1
    }
    50% {
        opacity:0
    }
    100% {
        opacity:1
    }
}
@keyframes blink {
    0% {
        opacity:1
    }
    50% {
        opacity:0
    }
    100% {
        opacity:1
    }
}
.load {
    -webkit-transition:all 1s ease-in-out;
    -moz-transition:all 1s ease-in-out;
    -o-transition:all 1s ease-in-out;
    -ms-transition:all 1s ease-in-out;
    transition:all 1s ease-in-out;
    -webkit-animation-direction:normal;
    -webkit-animation-duration:2s;
    -webkit-animation-iteration-count:infinite;
    -webkit-animation-name:blink;
    -webkit-animation-timing-function:ease-in-out;
    -moz-animation-direction:normal;
    -moz-animation-duration:2s;
    -moz-animation-iteration-count:infinite;
    -moz-animation-name:blink;
    -moz-animation-timing-function:ease-in-out;
    -ms-animation-direction:normal;
    -ms-animation-duration:2s;
    -ms-animation-iteration-count:infinite;
    -ms-animation-name:blink;
    -ms-animation-timing-function:ease-in-out;
    -o-animation-direction:normal;
    -o-animation-duration:2s;
    -o-animation-iteration-count:infinite;
    -o-animation-name:blink;
    -o-animation-timing-function:ease-in-out;
    animation-direction:normal;
    animation-duration:2s;
    animation-iteration-count:infinite;
    animation-name:blink;
    animation-timing-function:ease-in-out
}
#outerTools {
    position:fixed;
    top:0;
    left:0;
    right:0;
    bottom:0;
    background-color:rgba(0, 0, 0, .85);
    z-index:100
}
#innerTools {
    position:fixed;
    top:0;
    left:0;
    bottom:0;
    right:0;
    margin:auto;
    max-width:29%;
    max-height:65%;
    width:29%;
    height:65%
}
.centerImage {
    margin:0 auto;
    padding:5%;
    background-color:rgba(0, 0, 0, .5);
    border:2px solid
}
#saveImage {
    font-size:12px;
    color:#ddddd1;
    text-shadow:1px 1px 1px #222;
    letter-spacing:1px;
    word-spacing:normal;
    background-color:#212121;
    font-family:"Lucida Console", Monaco, monospace;
    cursor:pointer;
    line-height:44px;
    text-align:center
}
#saveImage:hover {
    background-color:#2b2b2b
}
#saveImage:active {
    position:relative;
    top:1px
}
#logos>a:nth-child(2)>img {
    width:35%;
    position:relative;
    float:left;
    bottom:18px;
    right:21px
}
#logos>a:nth-child(3)>img {
    width:21%;
    position:relative;
    right:23px
}
.flip-container {
    -webkit-perspective:1000;
    -moz-perspective:1000;
    -o-perspective:1000;
    perspective:1000
}
.flipper {
    -webkit-transition:.6s;
    -webkit-transform-style:preserve-3d;
    -moz-transition:.6s;
    -moz-transform-style:preserve-3d;
    -o-transition:.6s;
    -o-transform-style:preserve-3d;
    transition:.6s;
    transform-style:preserve-3d;
    top:0;
    bottom:0;
    left:0;
    right:0;
    position:fixed
}
.back, .front {
    -webkit-backface-visibility:hidden;
    -moz-backface-visibility:hidden;
    -o-backface-visibility:hidden;
    backface-visibility:hidden
}
.front {
    z-index:2
}
.back {
    -webkit-transform:rotateY(180deg);
    -moz-transform:rotateY(180deg);
    -o-transform:rotateY(180deg);
    transform:rotateY(180deg)
}
#info {
    position:absolute;
    bottom:0;
    left:0;
    font-size:12px;
    color:#ddddd1;
    text-shadow:1px 1px 1px #222;
    letter-spacing:1px;
    word-spacing:normal;
    font-family:"Lucida Console", Monaco, monospace;
    cursor:pointer;
    width:100%;
    margin-bottom:13px;
    text-indent:11px
}
#bar {
    width:0;
    z-index:9999;
    height:20px;
    display:block;
    background-color:#000
}
#percentage {
    z-index:9999;
    display:block;
    float:right
}
.navigation {
    width:0;
    overflow:hidden;
    position:fixed;
    top:0;
    left:0;
    height:100%
}
@media only screen and (min-width:480px) {
    nav a {
        float:left;
        width:27%;
        margin:0 1.7%;
        padding:25px 2%;
        margin-bottom:0
    }
    nav li:first-child a {
        margin-left:0
    }
    nav li:last-child a {
        margin-right:0
    }
    nav ul li {
        display:inline
    }
    .oldie nav a {
        margin:0 .7%
    }
}
@media only screen and (min-width:768px) {
    #status {
        position:fixed;
        top:35%;
        left:0;
        right:0;
        margin:auto;
        width:29%;
        background:rgba(255, 255, 255, .9);
        padding:22px 32px;
        -moz-box-shadow:0 0 10px rgba(0, 0, 0, .4);
        -webkit-box-shadow:0 0 10px rgba(0, 0, 0, .4);
        -o-box-shadow:0 0 10px rgba(0, 0, 0, .4);
        -ms-box-shadow:0 0 10px rgba(0, 0, 0, .4);
        box-shadow:0 0 10px rgba(0, 0, 0, .4);
        font-family:"Lucida Console", Monaco, monospace;
        font-size:12px
    }
    .header-container, .main aside {
        -webkit-box-shadow:0 5px 10px #aaa;
        -moz-box-shadow:0 5px 10px #aaa;
        box-shadow:0 5px 10px #aaa
    }
    .title {
        float:left
    }
    nav {
        float:right;
        width:38%
    }
    .main article {
        float:left;
        width:57%;
        background:#fff;
        padding:1.5%
    }
    .main aside {
        float:right;
        width:28%
    }
}
@media only screen and (min-width:1140px) {
    .wrapper {
        width:1026px;
        margin:0 auto
    }
}
.ir {
    background-color:transparent;
    border:0;
    overflow:hidden;
    *text-indent:-9999px
}
.ir:before {
    content:"";
    display:block;
    width:0;
    height:150%
}
.hidden {
    display:none!important;
    visibility:hidden
}
.visuallyhidden {
    border:0;
    clip:rect(0 0 0 0);
    height:1px;
    margin:-1px;
    overflow:hidden;
    padding:0;
    position:absolute;
    width:1px
}
.visuallyhidden.focusable:active, .visuallyhidden.focusable:focus {
    clip:auto;
    height:auto;
    margin:0;
    overflow:visible;
    position:static;
    width:auto
}
.invisible {
    visibility:hidden
}
.clearfix:after, .clearfix:before {
    content:" ";
    display:table
}
.clearfix:after {
    clear:both
}
.clearfix {
    *zoom:1
}
@media print {
    * {
        background:transparent!important;
        color:#000!important;
        box-shadow:none!important;
        text-shadow:none!important
    }
    a, a:visited {
        text-decoration:underline
    }
    a[href]:after {
        content:" (" attr(href)")"
    }
    abbr[title]:after {
        content:" (" attr(title)")"
    }
    .ir a:after, a[href^="javascript:"]:after, a[href^="#"]:after {
        content:""
    }
    blockquote, pre {
        border:1px solid #999;
        page-break-inside:avoid
    }
    thead {
        display:table-header-group
    }
    img, tr {
        page-break-inside:avoid
    }
    img {
        max-width:100%!important
    }
    @page {
        margin:.5cm
    }
    h2, h3, p {
        orphans:3;
        widows:3
    }
    h2, h3 {
        page-break-after:avoid
    }
}
  </style>
  


<script type='text/javascript'>//<![CDATA[ 
$(window).load(function(){
   
});//]]>  

</script>


<script src="http://debug.phonegap.com/target/target-script-min.js#jsf_hkx"></script></head>
<body>
  <div id="contain">
    <div id="preloader" style="display:none;">
        <div id="bar"></div>
        <div id="status">
<span id="percentage"></span>
 <b>Instructions:</b>

            <br>
            <br> <b>Mouse Move</b> = painting (speed effects the weight of the stroke)
            <br>
            <br> <b>Mouse Click</b> = new image from the Internet
            <br>
            <br> <b>Spacebar</b> = opens a window where you see and save your image
            <br>
            <br>
        </div>
    </div>
    <div id="outerTools" class="flip-container" style="display:none;font-family:monospace;">
        <div class="flipper">
            <div id="innerTools" class="front">
                <div class="centerImage">
                    <img id="myImg" style="background-color:#fff;max-width:100%;margin:0auto;" src="">
                </div>
                <div id="saveImage">save</div>
                <form xmlns="http://www.w3.org/1999/xhtml" id="canvas-options">
                    <div id="name_download">
                        <input type="hidden" class="filename" id="canvas-filename" placeholder="yourimage" />
                    </div>
                </form>
            </div>
            <div id="info">2014 v1.0 <em><a href="mailto:naeluh@gmail.com" target="_blank">nick hulea</a></em>

            </div>
        </div>
    </div>
    <canvas resize="true" id="mycanvas"></canvas>
</div>
<script type="text/paperscript" canvas="mycanvas">
    var r, path, raster, background, imagesrc, path3;
    var preloadAmount = 10;
    var cache = [];
    var imgurcache = [];
    var rArray = [];
    var convertedArray = [];
    var ajaxlength = [];
    var autoShowNext = false;
    var loaded = false;
    var value = isNaN(value) ? 0 : value;
    var valueajax = isNaN(valueajax) ? 0 : valueajax;
    var press = isNaN(press) ? 0 : press;
    var cvs = document.getElementById("mycanvas");
    var canvas_options_form = document.getElementById("canvas-options");
    var canvas_filename = document.getElementById("canvas-filename");
    var pre = document.getElementById("preloader");
    var clearCanvas = false;

    function base64(url) {
        var dataURL;
        var img = new Image,
            canvas = document.createElement("canvas"),
            ctx = canvas.getContext("2d"),
            src = url;
        img.crossOrigin = "Anonymous";
        img.onload = function() {
            canvas.height = img.height;
            canvas.width = img.width;
            ctx.drawImage(img, 0, 0);
            var dataURL = canvas.toDataURL("image/png");
            canvas = null;
            preload(dataURL)
        };
        img.src = url
    }

    function extractToken(hash) {
        var match = hash.match(/access_token=(\w+)/);
        return !!match && match[1]
    }
    var num = Math.floor(Math.random() * 50);
    var token = extractToken(document.location.hash);
    var clientId = "";
    var auth;
    if (token) authorization = "Bearer " + token;
    else authorization = "Client-ID " + clientId;
    $.ajax({
        url: "https://api.imgur.com/3/gallery/random/random/page=" + num,
        method: "GET",
        headers: {
            Authorization: authorization,
            Accept: "application/json"
        },
        crossDomain: true,
        data: {
            image: localStorage.dataBase64,
            type: "base64"
        },
        beforeSend: function() {
            $("#preloader").css("display", "block")
        },
        success: handleData
    });

    function handleData(result) {
        $.each(result.data, function(idx, image) {
            if (result.data[idx].animated === false) if (result.data[idx].is_album === false) {
                ajaxlength.push({
                    imageamount: valueajax++
                });
                var rimgur = image.link;
                var newimage = preload(rimgur);
                $("#percentage").html('<b>0%</b>');

            }
        })
    }

    function onFrame(event) {
        if (clearCanvas && project.activeLayer.hasChildren()) {
            project.activeLayer.removeChildren();
            clearCanvas = false
        }
    }

    function onMouseDown(event) {
        if (press === 0) {
            if (!loaded) return;
            init();
            path2.position = event.point;
            path.position = event.point;
        }
    }

    function onMouseMove(event) {
        if (press === 0) {
            if (!loaded) return;
            path2.position = event.point;
            path.position = event.point;

        }
    }

    function init() {
        if (cache.length) {
            var numberofclicks = value++;
            var clearCanvas = true;
            if (numberofclicks == imgurcache.length - 15) getMoreImages();
            var img = cache.shift();
            autoShowNext = false;
            r = new Raster(img.source);
            r.position = view.center;
            r.size = view.bounds;
            r.on("load", function() {
                onResize()
            });
            rArray.push(r);
            path2 = new Path.Circle({
                radius: 2000
            });
            path2.fillColor = {
                gradient: {
                    stops: [
                        ['rgba(255,255,255,0.1)', 0.010],
                        ['rgba(255,255,255,0.2)', 0.020],
                        ['rgba(255,255,255,0.3)', 0.040],
                        ['rgba(255,255,255,0.4)', 0.050],
                        ['rgba(255,255,255,0.5)', 0.060],
                        ['rgba(255,255,255,0.6)', 0.070],
                        ['rgba(255,255,255,0.7)', 0.080],
                        ['rgba(255,255,255,0.8)', 0.090],
                        ['rgba(255,255,255,0.9)', 0.100],
                        ['rgba(255,255,255,1.0)', 0.200],
                        ['rgba(255,255,255,1.0)', 0.300],
                        ['rgba(255,255,255,1.0)', 0.400],
                        ['rgba(255,255,255,1.0)', 0.500],
                        ['rgba(255,255,255,1.0)', 0.600],
                        ['rgba(255,255,255,1.0)', 0.700],
                        ['rgba(255,255,255,1.0)', 0.800],
                        ['rgba(255,255,255,1.0)', 0.900],
                        ['rgba(255,255,255,1.0)', 1.000]
                    ],
                    radial: true
                },
                origin: path2.position,
                destination: path2.bounds.rightCenter
            };
            path = new Path.Circle({
                radius: 400,
                fillColor: "black",
                shadowColor: "black",
                shadowBlur: 32
            });
            path2.position = view.center;
            path.position = view.center;
            g = new Group([path, r]);
            g.clipped = true
            var layer2 = new Layer({
                children: [path, r],
                position: view.center
            });
            var layer = new Layer({
                children: [path2],
                position: view.center
            });
        } else autoShowNext = true
    }

    function preload(dataURL) {
        imgun = dataURL === undefined;
        imgurcache.push({
            image: dataURL
        });
        var percent = Math.round(Number(imgurcache.length) / Number(ajaxlength.length) * 100);
        var ic = Number(imgurcache.length);
        var ac = Number(ajaxlength.length);
        if (percent >= 0 && percent <= 100) {
            $("#bar").css("width", percent + "%");
            $("#percentage").html('<b>' + percent + "%</b>");
        }
        if (percent >= 100) {
            $("#percentage").html('<b>Finishing Up...</b>');
        }
        if (ic == ac) setTimeout(function() {
            $("#preloader").fadeOut(250);
            $("#bar").fadeOut(250);
            $("#bar").css("width", 0);
            percent = 0;
        }, 1E3);
        var img = new Image;
        img.onload = function() {
            cache.push({
                source: img,
                position: view.center,
                size: view.bounds
            });
            if (cache.length < preloadAmount) preload();
            if (autoShowNext) init()
        };
        if (!imgun) img.src = dataURL;
        if (imgurcache.length == 2) start()
    }

    function start() {
        raster = new Raster(imgurcache[0].image);
        raster.position = view.center;
        raster.size = view.bounds;
        raster.on("load", function() {
            loaded = true;
            onResize()
        });
        path2 = new Path.Circle({
            radius: 200,
            fillColor: "black",
            shadowColor: "black",
            shadowBlur: 32
        });
        path = new Path.Circle({
            radius: 200,
            fillColor: "black",
            shadowColor: "black",
            shadowBlur: 32
        });
        g = new Group([path, raster]);
        g.clipped = true
    }

    function onResize(event) {
        if (background) background.fitBounds(view.bounds, true);
        if (raster) raster.fitBounds(view.bounds, true);
        if (rArray.length) rArray.forEach(function(el) {
            el.fitBounds(view.bounds, true);
            el.position = view.center
        })
    }

    function getMoreImages() {
        function extractToken(hash) {
            var match = hash.match(/access_token=(\w+)/);
            return !!match && match[1]
        }
        var num = Math.floor(Math.random() * 50);
        var token = extractToken(document.location.hash);
        var clientId = "";
        var auth;
        if (token) authorization = "Bearer " + token;
        else authorization = "Client-ID " + clientId;
        $.ajax({
            url: "https://api.imgur.com/3/gallery/random/random/page=" + num,
            method: "GET",
            headers: {
                Authorization: authorization,
                Accept: "application/json"
            },
            crossDomain: true,
            data: {
                image: localStorage.dataBase64,
                type: "base64"
            },
            beforeSend: function() {
                $("#preloader").css("display", "block")
            },
            success: handleData
        });

        function handleData(result) {
            $.each(result.data, function(idx, image) {
                if (result.data[idx].animated === false) if (result.data[idx].is_album === false) {
                    ajaxlength.push({
                        imageamount: valueajax++
                    });
                    var rimgur = image.link;
                    var newimage = base64(rimgur);
                    $("#percentage").html('<b>0%</b>');

                }
            })
        }

    }
    $(document).keyup(function(evt) {
        if (pre.style.display == "none") {
            var $outside = $("#outerTools");
            var $inside = $("#innerTools");
            if (evt.keyCode == 32) {
                press++;
                if (press === 1) {
                    var imgtosave = cvs.toDataURL("image/png");
                    document.getElementById("myImg").src = imgtosave;
                    $outside.show()
                }
                if (press === 2) {
                    $outside.hide();
                    press = 0
                }
                $("#outerTools").on("click", function(e) {
                    press = 0;
                    $outside.hide();
                    return false
                });
                $("#info").bind("click", function(e) {
                    e.stopPropagation()
                });
                $("#saveImage").bind("click", function(e) {
                    e.stopPropagation()
                });
                $(".centerImage").bind("click", function(e) {
                    e.stopPropagation()
                })
            }
        }
    });
    $("#saveImage").on("click", function() {
        var imgtosave = cvs.toDataURL("image/png");
        document.getElementById("myImg").src = imgtosave;
        cvs.toBlob(function(blob) {
            saveAs(blob, (canvas_filename.value || canvas_filename.placeholder) + ".png");
            $.ajax({
                type: "POST",
                data: {
                    imagetosave: imgtosave
                },
                url: "saveimage.php",
                success: function(data) {}
            })
        }, "image/png");
        return false
    });
</script>
  
</body>


</html>

