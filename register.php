<?php

if(isset($_POST['ok'])){

include 'db_connection.php';

$first_name = $_POST['first_name'];
$midd_name = $_POST['midd_name'];
$lastname = $_POST['lastname'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$current_address = $_POST['current_address'];
// $parmanent_adress = $_POST['parmanent_adress'];
$father_name = $_POST['father_name'];
$mother_name = $_POST['mother_name'];
$ph_number = $_POST['ph_number'];
$parent_address = $_POST['parent_address'];
$school_name = $_POST['school_name'];
$school_address = $_POST['school_address'];
$school_number = $_POST['school_number'];
$first_attended = $_POST['first_attended'];
$last_attended = $_POST['last_attended'];
$board = $_POST['board'];
$marks_10th = $_POST['marks_10th'];
$out_of_10th = $_POST['out_of_10th'];
$percent_10th = $_POST['percent_10th'];
$marks_12th = $_POST['marks_12th'];
$out_of_12th = $_POST['out_of_12th'];
$percent_12th = $_POST['percent_12th'];

$adhaar_applicant_file = $_FILES['adhaar_applicant_file']['name'];
$adhaar_father_file = $_FILES['adhaar_father_file']['name'];
$adhaar_mother_file = $_FILES['adhaar_mother_file']['name'];
$admit_10th = $_FILES['admit_10th']['name'];
$admit_12th = $_FILES['admit_12th']['name'];
$marksheet_10th = $_FILES['marksheet_10th']['name'];
$marksheet_12th = $_FILES['marksheet_12th']['name'];


move_uploaded_file($_FILES['address_proof_applicant']['tmp_name'], '../image/' .$_FILES['address_proof_applicant']['name']);
move_uploaded_file($_FILES['address_proof_father']['tmp_name'], '../image/' .$_FILES['address_proof_father']['name']);
move_uploaded_file($_FILES['address_proof_mother']['tmp_name'], '../image/' .$_FILES['address_proof_mother']['name']);
move_uploaded_file($_FILES['admit_10th']['tmp_name'], '../image/' .$_FILES['admit_10th']['name']);
move_uploaded_file($_FILES['admit_12th']['tmp_name'], '../image/' .$_FILES['admit_12th']['name']);
move_uploaded_file($_FILES['marksheet_10th']['tmp_name'], '../image/' .$_FILES['marksheet_10th']['name']);
move_uploaded_file($_FILES['marksheet_12th']['tmp_name'], '../image/' .$_FILES['marksheet_12th']['name']);



$insert_master = "INSERT INTO master_id(first_name,last_name,middle_name,dob,phone_no,email,sex,present_address)VALUES('$first_name','$midd_name','$lastname','$phone','$email','$dob','$gender','$present_address')";
$insert_parent = "INSERT INTO parent_details(master_id,fathers_name,mothers_name,contact_no,parent_address)VALUES('$father_name','$mother_name','$ph_number','$parent_address')";
$insert_institution = "INSERT INTO institutional_details(master_id,parent_details,school_name,school_address,contact_no,first_attended,last_attended,board)VALUES('$school_name','$school_address','$school_number','$first_attended','$last_attended','$board')";
$insert_qualification = "INSERT INTO qualification_details(master_id,parent_details,institutional_details,marks_obtained_10th,total_marks_10th,percent_10th,marks_obtained_12th,total_marks_12th,percent_12th)VALUES('$marks_10th','$out_of_10th','$percent_10th','$marks_12th','$out_of_12th','$percent_12th')";
$insert_documents = "INSERT INTO documents_details(address_proof_applicant,address_proof_father,address_proof_mother,admit_10th,admit_12th,marksheet_10th,marksheet_12th)VALUES('$adhaar_applicant_file','$adhaar_father_file','$adhaar_applicant_file','$admit_10th','$admit_12th','$marksheet_10th','$marksheet_12th')";

if(mysqli_query($conn,$sql)){
	echo "<script>
			window.location = '../admission.php';
			alert('Submission Successful');

	</script>";
}else{
	echo "error" .mysqli_error($conn);
}

}



?>