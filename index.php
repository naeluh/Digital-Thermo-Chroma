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
    var clientId = "b144351ffb05838";
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
        var clientId = "b144351ffb05838";
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
