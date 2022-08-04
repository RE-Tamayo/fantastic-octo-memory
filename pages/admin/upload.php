<?php 
		error_reporting(E_ALL);
		ini_set('display_errors', 1);

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

					$name 		= $_FILES['file']['name'];
					$tmpName 	= $_FILES['file']['tmp_name'];
					$error 		= $_FILES['file']['error'];
					$size 		= $_FILES['file']['size'];
					$ext 	    = strtolower(pathinfo($name, PATHINFO_EXTENSION));




					switch ($error) {
				case UPLOAD_ERR_OK:
					$valid = true;

						if (!in_array($ext, array('jpg','jpeg','png','docx','gif','pdf','pptx'))) {
							 $valid= false;
							 $response = ' Invalid file extension';
						}

						if ($size/1024/1024>2) {
							$valid = false;
							$response= 'File size is exceeding maximum allowed 	size.' ;
						}

						if ($valid) {
							$targetPath= dirname(__FILE__). DIRECTORY_SEPARATOR. 'uploads' . DIRECTORY_SEPARATOR . $name;
							move_uploaded_file($tmpName,$targetPath);
							header('Location: upload.php');
							exit;
						}break;
						


				case UPLOAD_ERR_INI_SIZE:
				$response = 'The uploaded file exceeds the upload_max_filesize directive in php ini';
					break;
				case UPLOAD_ERR_FORM_SIZE:
				$response = 'The uploaded file exceeds  the MAX_FILE_SIZE directive that was 	specified in the HTML form.';
				break;
				  case UPLOAD_ERR_PARTIAL:
				  $response ='The uploaded file was only partially uploaded';
				  break;

				  case UPLOAD_ERR_NO_FILE:
				  $response= 'No file was uploaded';
				  break;
				  case UPLOAD_ERR_NO_TMP_DIR:
				  $response= 'Missing a temporary folder . Instroduced in PHP 4.3.10 and PHP 5.0.3';
				  break;
				  case UPLOAD_ERR_CANT_WRITE:
				  $response = 'Failed to write file to disk. Instroduced in PHP 5.2.0';
				  case UPLOAD_ERR_EXTENSION:
				  $response = 'File upload stopped by extension. Instroduced by PHP 5.2.0';
				  break;
				  default:
				  $response= 'Unkown error';

			}
		
			echo $response;
			}

			

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Uploads Files</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
</head>
<body>

<div class="container"> <!-- Container -->


					<div class="row">
						

										<div class="col-lg-12" style="border:groove; background-color: #c7f5fc;">
											<br>
											<form action="upload.php" method="POST" enctype="multipart/form-data">

													<div class="form-group">
														<label  for="file" style= " font-size: 18px; "> Select a File Upload</label>
														<input type="file" name="file" class="btn-warning">
															<p class="help-block">Only Jpeg, jpg, png, gif ,docx, pptx, and file with maximum 1 MB allowed.</p>

													</div>
														<input type="submit"  value="Upload" class="btn btn-outline-primary">


											</form>
												<br>

										 </div>



					</div>






					<div class="row">
						
							<?php 


									$folder = "uploads";
									$results = scandir('uploads');

									foreach ($results as $result) {
										

											if ($result === '.' or $result ==='..') continue;

											if (is_file ($folder . '/' . $result)) {
														echo '  

															<div class="col-md-3">
																<br>
																	<div class = "thumbnail">
																			<img src = " '.$folder .'/' . $result .  ' " alt="...">

																			<div class="caption">
																				<p align=center><a href="upload_delete.php?name='.$result.'" class="btn btn-danger btn-xs" role ="button">DELETE</a>
																				</p>

																			</div>


															</div>';


													
											}
									}
							?>

					</div>



</div>

</body>
</html>