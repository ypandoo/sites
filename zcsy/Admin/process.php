<?php
// process.php
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
@$type = $request->type;
@$name = $request->name;
@$description = $request->description;
@$attachto = $request->attachto;
@$link = $request->link;
@$priority = $request->priority;
@$newfile = $request->newfile;
@$newfile1 = $request->newfile1;
@$newfile2 = $request->newfile2;
@$newfile3 = $request->newfile3;

$errors = array();  // array to hold validation errors
$data = array();        // array to pass back data

// validate the variables ========
if (empty($name) || null == $name)
  $errors['name'] = 'Name is required.';

if (empty($description) || null == $description)
  $errors['description'] = 'description is required.';


// return a response ==============

// response if there are errors
if ( ! empty($errors)) {

  // if there are items in our errors array, return those errors
  $data['success'] = false;
  $data['errors']  = $errors;
} else {


  // if there are no errors, return a message
  


  $data['success'] = true;
  $data['message'] = $name.$type.$description.$link.$attachto;

  require_once('../api/dbconnect.php');
  $sql = "INSERT INTO `dev` (name,description,attachto,type,try,imageUrl,priority, img1, img2, img3) 
  VALUES('".$name."','".$description."','".$attachto."','".$type."','".$link."','".$newfile."','".$priority."','".$newfile1."','".$newfile2."','".$newfile3."')";
  $result = $dbobj->query($sql);
}

// return all our data to an AJAX call
echo json_encode($data);

?>