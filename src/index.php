<?php
/**
 * Created by PhpStorm.
 * User: Gary
 * Date: 11/20/13
 */

?>
<html>
<head>
<link href="css/dropzone.css" type="text/css" rel="stylesheet" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="javascript/dropzone.min.js"></script>
    <script type="javascript">
        /*Dropzone.options.myDropzone = {
            init: function() {
                thisDropzone = this;

                $.get('upload.php', function(data) {

                    $.each(data, function(key,value){

                        var mockFile = { name: value.name, size: value.size };

                        thisDropzone.options.addedfile.call(thisDropzone, mockFile);

                        thisDropzone.options.thumbnail.call(thisDropzone, mockFile, "uploads/"+value.name);

                    });

                });
            }
        };*/

        /*Dropzone.options.myDropzone = {
            addRemoveLinks: true ,
            url: "/upload.php",

            init: function() {
                thisDropzone = this;
                $.get('/index.php', function(getFiles) {
                    $.each(getFiles, function(key,value){

                        var file = { serverId: value.name, size: value.size };

                        thisDropzone.options.addedfile.call(thisDropzone, file);

                        thisDropzone.options.thumbnail.call(thisDropzone, file, "/uploads/"+value.name);

                    });

                });

                this.on("success", function(file, response) {
                    file.serverId = response;
                });
                this.on("removedfile", function(file) {
                    if (!file.serverId) { return; }
                    $.post("/delete.php?id=" + file.serverId);
                });
            }
        }*/

        /*Dropzone.options.myDropzone = {
            addRemoveLinks: true ,
            url: "/upload.php",

            init: function() {


                thisDropzone = this;
                $.get('/getfiles.php', function(data) {
                    $.each(data, function(key,value){

                        var file = { serverId: value.name, size: value.size };

                        thisDropzone.options.addedfile.call(thisDropzone, file);

                        thisDropzone.options.thumbnail.call(thisDropzone, file, "/uploads/"+value.name);

                    });

                });

                this.on("success", function(file, response) {
                    file.serverId = response;
                });
                this.on("removedfile", function(file) {
                    if (!file.serverId) { return; }
                    $.post("/delete.php?id=" + file.serverId);
                });
            }
        }*/
        alert('somthing')
        Dropzone.options.myDropzone = {
            alert('set')
            init: function() {
                alert('init')
                thisDropzone = this;
                $.get('upload.php', function(data) {
                    $.each(data, function(key,value){
                        var mockFile = { name: value.name, size: value.size };
                        thisDropzone.options.addedfile.call(thisDropzone, mockFile);
                        thisDropzone.options.thumbnail.call(thisDropzone, mockFile, "upload/"+value.name);

                    });
                });

                this.on("addedfile", function(file) {
                    // Create the remove button
                    alert("add")
                    var removeButton = Dropzone.createElement("<button>Remove file</button>");

                    // Capture the Dropzone instance as closure.
                    var _this = this;

                    // Listen to the click event
                    removeButton.addEventListener("click", function(e) {
                        alert('Removing the file' + file.name)
                    // Make sure the button click doesn't submit the form:
                        e.preventDefault();
                        e.stopPropagation();

                    // Remove the file preview.
                        _this.removeFile(file);
                    // If you want to the delete the file on the server as well,
                    // you can do the AJAX request here.
                        $.post("photo-remove.php?name=" + file.name); // Send the file id along
                    });

                    // Add the button to the file preview element.
                    file.previewElement.appendChild(removeButton);
                });
            }
        };
    </script>
</head>
<body>
<form action="upload.php" class="dropzone" id="my-dropzone"></form>
</body>
</html>