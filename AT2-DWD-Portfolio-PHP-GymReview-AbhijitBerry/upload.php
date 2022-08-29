<?php
require "templates/header.php";

// B. Declare general variables initial states 
$directory = "uploads";
$uploadOk = 1;
$the_message = '';

// F. Set PHP upload errors using superglobal error array within $_FILES
// (1) We set custom message extensions depending on the number passed in by PHP when an upload error occurs
$phpFileUploadErrors = array(
  0 => 'There is no error, the file uploaded with success',
  1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
  2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
  3 => 'The uploaded file was only partially uploaded',
  4 => 'No file was uploaded',
  6 => 'Missing a temporary folder',
  7 => 'Failed to write file to disk.',
  8 => 'A PHP extension stopped the file upload.',
);

// C. Save upload data to variables (using $_FILES superglobal)
if (isset($_POST['submit'])) {
  // (1) File name of the temporary copy of the file stored on the server
  $temp_name = $_FILES['fileToUpload']['tmp_name'];
  // (2) Name of the uploaded file
  $target_file = $_FILES['fileToUpload']['name'];
  // (3) Name of file type extension (converted to lower case for better handling)
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  // (4) Stores our URL path to the uploaded image on the server
  $my_url = $directory . DIRECTORY_SEPARATOR . $target_file;


  // F.(2) Set additional error handler to pick up the PHP error number & pass back the custom message corresponding to the number
  // NOTE: $_FILES['fileToUpload']['error'];  this stores the error code if a error occurred inside the variable $the_error
  $the_error = $_FILES['fileToUpload']['error'];
  if ($_FILES['fileToUpload']['error'] != 0) {
    $the_message_ext = $phpFileUploadErrors[$the_error];
    $uploadOk = 0;
  }

  $the_error = $_FILES['fileToUpload']['error'];
  if ($the_message_ext == "" && !isset($_SESSION['userId'])) {
    $the_message_ext = "Please Login to upload.";
    $uploadOk = 0;
  }


  // D. Set custom error handlers
  // (1) File Already Exists
  // NOTE: We also set if statement to check if message extension is empty ($the_message_ext == "") to check there are no previous errors & stop it overriding $the_message_ext if we already have a error
  if ($the_message_ext == "" && file_exists($my_url)) {
    $the_message_ext = "The file already exists.";
    $uploadOk = 0;
  }

  // (2) Incorrect File Extension
  if ($the_message_ext == "" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
    $the_message_ext = "File type is not allowed, please choose a jpg, png, jpeg or gif file";
    $uploadOk = 0;
  }

  // E. Set our main error capture & successful upload case 
  // (1) Check for error existing by checking if uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    $the_message = "<p>Sorry, your file was not uploaded.</p>" . "<strong>Error: </strong>" . $the_message_ext;
  } else {
    // (2) If all ok (remains value of 1) - try to upload file to permanent location
    if (move_uploaded_file($temp_name, $directory . "/" . $target_file)) {
      $the_message = "File Uploaded Successfully. " . 'Preview it: <a href="' . $my_url . '" target="_blank">' . $my_url . '</a>';
    }
  }
}
?>


<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-8">

        <!-- A. File Upload Form: START -->
        <form action="upload.php" method="POST" enctype="multipart/form-data">
          <p class="lead">Select image to upload:</p>

          <div class="input-group mb-3">
            <!-- File Input -->
            <input type="file" class="form-control" id="inputGroupFile" name="fileToUpload">
            <!-- Submit Button -->
            <input type="submit" value="Upload" name="submit" class="btn btn-primary input-group-text"></input>
          </div>

        </form>
        <!-- File Upload Form: START -->

        <!-- Alert Message -->
        <?php
        // F. Create Feedback to user in event of nothing, error or success
        if ($the_message == "") {
          echo null;
        } else if ($uploadOk == 0) {
          echo '<div class="alert alert-danger" role="alert">' . $the_message . '</div>';
        } else {
          echo '<div class="alert alert-success" role="alert">' . $the_message . '</div>';
        }
        ?>
      </div>
    </div>
  </div>
</body>

</html>

<!-- FOOTER.PHP -->
<?php
require "templates/footer.php"
?>