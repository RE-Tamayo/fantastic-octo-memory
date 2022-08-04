<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uploads Files</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
</head>

<body>
	<div class="container">

		<div class="row">
			<div class="col-lg-12" style="border:groove; background-color: #c7f5fc;">
				<br>
				<form action="/upload" method="POST" enctype="multipart/form-data">

					<div class="form-group">
						<label for="file" style=" font-size: 18px; "> Select a File Upload</label>
						<input type="file" name="file" class="btn-warning">
						<p class="help-block">Only Jpeg, jpg, png, gif ,docx, pptx, and file with maximum 1 MB allowed.
						</p>
					</div>
					<input type="submit" value="Upload" class="btn btn-outline-primary">
				</form>
				<br>
			</div>
		</div>

		<div class="row">
			<?php 
				$folder = "uploads";
				$files = scandir($folder);
				$files = array_diff(scandir($folder), array('.', '..'));
				foreach ($files as $item) {
					$url = $_SERVER['DOCUMENT_ROOT'].'uploads/'.$item;
					echo'<div class="col-md-3">';
					echo'<br>';
					echo'<div class = "thumbnail">';
					echo'<img src="'.$url.'">';
					echo'<div class="caption">';
					echo'<p><a href="#" class="btn btn-danger btn-xs" role ="button">DELETE</a>';
					echo'</p>';
					echo'</div>';
					echo'</div>';
					echo'</div>';
				}
			?>
		</div>

	</div>
</body>
</html>