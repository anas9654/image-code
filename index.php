<!DOCTYPE html>
<html>
<head>
	<title>image</title>

	<script type="text/javascript" src='jquery-3.4.1.min.js'></script>

	<style type="text/css">
	#preview img{
		margin: 5px;
	}
	</style>
</head>
<body>


	<form method='post' action='' enctype="multipart/form-data">
		<input type="file" id='files' name="files[]" multiple><br>
		<input type="button" id="submit" value='Upload'>
	</form>

	<div id='preview'></div>

	<script type="text/javascript">
	$(document).ready(function(){

		$('#submit').click(function(){

			var form_data = new FormData();

            var totalfiles = document.getElementById('files').files.length;
            for (var index = 0; index < totalfiles; index++) {
                form_data.append("files[]", document.getElementById('files').files[index]);
            }

            $.ajax({
                url: 'ajaxfile.php',
               	type: 'post',
               	data: form_data,
               	dataType: 'json',
                contentType: false,
                processData: false,
                success: function (response) {
                   	
                   	for(var index = 0; index < response.length; index++) {
					    var src = response[index];

					    $('#preview').append('<img src="'+src+'" width="200px;" height="200px">');
					}
                   	
                }
            });
		});
	});
	</script>
</body>
</html>