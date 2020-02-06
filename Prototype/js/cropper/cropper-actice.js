(function ($) {
 "use strict";
 
 
		var $image = $(".image-crop > img")
        $($image).cropper({
            aspectRatio: 1,
            autoCrop: true,
            preview: ".img-preview",
            built: function () {
                $(this).cropper('getCroppedCanvas').toBlob(function (blob) {
                    // Handle the blob
                    // ...
                });
                //var imageData = $('img').cropper('getCroppedCanvas').toDataURL();
                //$('<img>').attr('src', imageData).appendTo('body');
            },
            done: function(data) {

            }
        });

            var $inputImage = $("#inputImage");
            if (window.FileReader) {
                $inputImage.change(function() {
                    var fileReader = new FileReader(),
                            files = this.files,
                            file;

                    if (!files.length) {
                        return;
                    }

                    file = files[0];

                    if (/^image\/\w+$/.test(file.type)) {
                        fileReader.readAsDataURL(file);
                        fileReader.onload = function () {
                            $inputImage.val("");
                            $image.cropper("reset", true).cropper("replace", this.result);
                        };
                    } else {
                        showMessage("Please choose an image file.");
                    }
                });
            } else {
                $inputImage.addClass("hide");
            }
        

            
            $("#upload").on('click', function() {
                
            });

            $("#zoomIn").on('click', function() {
                $image.cropper("zoom", 0.1);
            });

            $("#zoomOut").on('click', function() {
                $image.cropper("zoom", -0.1);
            });

            $("#rotateLeft").on('click', function() {
                $image.cropper("rotate", 45);
            });

            $("#rotateRight").on('click', function() {
                $image.cropper("rotate", -45);
            });

            $("#setDrag").on('click', function() {
                $image.cropper("setDragMode", "crop");
            });

	
	
 
})(jQuery); 