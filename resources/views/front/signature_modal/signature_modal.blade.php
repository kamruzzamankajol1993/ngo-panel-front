
<style>
    .containerr
            {
                position: absolute;
                top: 10%; left: 10%; right: 0; bottom: 0;
            }
    .imageBox
    {
        position: relative;
        height: 160px;
        width: 400px;
        border:1px solid #aaa;
        background: #fff;
        overflow: hidden;
        background-repeat: no-repeat;
        cursor:move;
    }




    .imageBox .thumbBox
    {
        position: absolute;
        top: 66%;
        left: 50%;
        width: 303px;
        height: 83px;
        margin-top: -63px;
        margin-left: -148px;
        box-sizing: border-box;
        border: 1px solid rgb(102, 102, 102);
        box-shadow: 0 0 0 1000px rgba(0, 0, 0, 0.5);
        background: none repeat scroll 0% 0% transparent;
    }

    .imageBox .spinner
    {
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        text-align: center;
        line-height: 400px;
        background: rgba(0,0,0,0.7);
    }


        /* img {
            display: block;
            max-width: 100%;
        }
        .preview {
            text-align: center;
            overflow: hidden;
            width: 160px;
            height: 160px;
            margin: 10px;
            border: 1px solid red;
        }

        .section{
            margin-top:150px;
            background:#fff;
            padding:50px 30px;
        }
        .modal-lg{
            max-width: 1000px !important;
        } */

        .action
            {
                width: 400px;
                height: 30px;
                margin: 10px 0;
            }




            .cropped>img
            {
                margin-right: 10px;
            }


    </style>
    <script>
        /**
     * Created by ezgoing on 14/9/2014.
     */
    'use strict';
    var cropbox = function(options){
        var el = document.querySelector(options.imageBox),
        obj =
        {
            state : {},
            ratio : 1,
            options : options,
            imageBox : el,
            thumbBox : el.querySelector(options.thumbBox),
            spinner : el.querySelector(options.spinner),
            image : new Image(),
            getDataURL: function ()
            {
                var width = this.thumbBox.clientWidth,
                    height = this.thumbBox.clientHeight,
                    canvas = document.createElement("canvas"),
                    dim = el.style.backgroundPosition.split(' '),
                    size = el.style.backgroundSize.split(' '),
                    dx = parseInt(dim[0]) - el.clientWidth/2 + width/2,
                    dy = parseInt(dim[1]) - el.clientHeight/2 + height/2,
                    dw = parseInt(size[0]),
                    dh = parseInt(size[1]),
                    sh = parseInt(this.image.height),
                    sw = parseInt(this.image.width);

                canvas.width = width;
                canvas.height = height;
                var context = canvas.getContext("2d");
                context.drawImage(this.image, 0, 0, sw, sh, dx, dy, dw, dh);
                var imageData = canvas.toDataURL('image/png');
                return imageData;
            },
            getBlob: function()
            {
                var imageData = this.getDataURL();
                var b64 = imageData.replace('data:image/png;base64,','');
                var binary = atob(b64);
                var array = [];
                for (var i = 0; i < binary.length; i++) {
                    array.push(binary.charCodeAt(i));
                }
                return  new Blob([new Uint8Array(array)], {type: 'image/png'});
            },
            zoomIn: function ()
            {
                this.ratio*=1.1;
                setBackground();
            },
            zoomOut: function ()
            {
                this.ratio*=0.9;
                setBackground();
            }
        },
        attachEvent = function(node, event, cb)
        {
            if (node.attachEvent)
                node.attachEvent('on'+event, cb);
            else if (node.addEventListener)
                node.addEventListener(event, cb);
        },
        detachEvent = function(node, event, cb)
        {
            if(node.detachEvent) {
                node.detachEvent('on'+event, cb);
            }
            else if(node.removeEventListener) {
                node.removeEventListener(event, render);
            }
        },
        stopEvent = function (e) {
            if(window.event) e.cancelBubble = true;
            else e.stopImmediatePropagation();
        },
        setBackground = function()
        {
            var w =  parseInt(obj.image.width)*obj.ratio;
            var h =  parseInt(obj.image.height)*obj.ratio;

            var pw = (el.clientWidth - w) / 2;
            var ph = (el.clientHeight - h) / 2;

            el.setAttribute('style',
                    'background-image: url(' + obj.image.src + '); ' +
                    'background-size: ' + w +'px ' + h + 'px; ' +
                    'background-position: ' + pw + 'px ' + ph + 'px; ' +
                    'background-repeat: no-repeat');
        },
        imgMouseDown = function(e)
        {
            stopEvent(e);

            obj.state.dragable = true;
            obj.state.mouseX = e.clientX;
            obj.state.mouseY = e.clientY;
        },
        imgMouseMove = function(e)
        {
            stopEvent(e);

            if (obj.state.dragable)
            {
                var x = e.clientX - obj.state.mouseX;
                var y = e.clientY - obj.state.mouseY;

                var bg = el.style.backgroundPosition.split(' ');

                var bgX = x + parseInt(bg[0]);
                var bgY = y + parseInt(bg[1]);

                el.style.backgroundPosition = bgX +'px ' + bgY + 'px';

                obj.state.mouseX = e.clientX;
                obj.state.mouseY = e.clientY;
            }
        },
        imgMouseUp = function(e)
        {
            stopEvent(e);
            obj.state.dragable = false;
        },
        zoomImage = function(e)
        {
            var evt=window.event || e;
            var delta=evt.detail? evt.detail*(-120) : evt.wheelDelta;
            delta > -120 ? obj.ratio*=1.1 : obj.ratio*=0.9;
            setBackground();
        }

        obj.spinner.style.display = 'block';
        obj.image.onload = function() {
            obj.spinner.style.display = 'none';
            setBackground();

            attachEvent(el, 'mousedown', imgMouseDown);
            attachEvent(el, 'mousemove', imgMouseMove);
            attachEvent(document.body, 'mouseup', imgMouseUp);
            var mousewheel = (/Firefox/i.test(navigator.userAgent))? 'DOMMouseScroll' : 'mousewheel';
            attachEvent(el, mousewheel, zoomImage);
        };
        obj.image.src = options.imgSrc;
        attachEvent(el, 'DOMNodeRemoved', function(){detachEvent(document.body, 'DOMNodeRemoved', imgMouseUp)});

        return obj;
    };

    </script>
<div class="container">
    <div class="imageBox">
        <div class="thumbBox"></div>
        <div class="spinner" style="display: none">Loading...</div>
    </div>
    <div class="action">

        <input type="file" accept="image/png" class="file form-control" id="file" style="float:left; width: 250px">

        {{-- <input type="file" name="digital_signature" accept="image/png" style="float:left; width: 250px" class="form-control file" id="file">
        <small id="digital_signature_text" class="text-danger"></small> --}}

        {{-- <input type="file" class="file" id="file" > --}}

        <button type="button" data-toggle="tooltip" data-placement="top" title="Zoom In" class="btn btn-primary btn-sm" id="btnZoomIn" value="+" style="float: right;margin-left: 5px;"><i class="fa fa-plus" aria-hidden="true"></i></button>
        <button type="button" data-toggle="tooltip" data-placement="top" title="Zoom Out"  class="btn btn-danger btn-sm"  id="btnZoomOut" value="-" style="float: right;margin-left: 5px;"><i class="fa fa-minus" aria-hidden="true"></i></button>
    </div>
    <div class="cropped">

    </div>
    <button type="button" data-toggle="tooltip" data-placement="top" title="Save" class="btn btn-success btn-sm" id="btnCrop" value="Crop" style="float: right;margin-left: 5px;">সংরক্ষণ করুন</button>
</div>


<script type="text/javascript">

    var options =
    {
        imageBox: '.imageBox',
        thumbBox: '.thumbBox',
        spinner: '.spinner',
        imgSrc: 'avatar.png'
    }
    var cropper = new cropbox(options);
    document.querySelector('.file').addEventListener('change', function(){
        var reader = new FileReader();


        reader.onload = function(e) {
            options.imgSrc = e.target.result;
            cropper = new cropbox(options);
        }
        reader.readAsDataURL(this.files[0]);
        this.files = [];
    })
    document.querySelector('#btnCrop').addEventListener('click', function(){
        var img = cropper.getDataURL();
        document.querySelector('.cropped').innerHTML = "";
        document.querySelector('.cropped').innerHTML += '<img src="'+img+'">';
        document.querySelector('.croppedInput').innerHTML = "";
        document.querySelector('.croppedInput').innerHTML += '<img src="'+img+'">';
        $("input[name='image_base64']").val(img);
        $("#mResult").html('');
        $("#myModal").modal('hide');
    })
    document.querySelector('#btnZoomIn').addEventListener('click', function(){
        cropper.zoomIn();
    })
    document.querySelector('#btnZoomOut').addEventListener('click', function(){
        cropper.zoomOut();
    })

</script>
<script>
    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
