<?php 

require_once 'dbConfig.php'; 
require_once 'models.php';

if (isset($_POST['insertAgentBtn'])) {

	$query = insertAgent($pdo, $_POST['fullName'], $_POST['l_Number'], 
		$_POST['l_ExpiryDate'], $_POST['specialization'], $_POST['a_Contact'], $_POST['yearsOfExperience'], $_POST['serviceAreas']);

	if ($query) {
		header("Location: ../index.php");
	}
	else {
		echo "Insertion failed";
	}

}


if (isset($_POST['editagentBtn'])) {

	if (!empty($_POST['fullName']) && !empty($_POST['l_Number']) && !empty($_POST['l_ExpiryDate']) && !empty($_POST['specialization']) &&  !empty($_POST['a_Contact'])  && !empty($_POST['yearsOfExperience'])  && !empty($_GET['agentID']) ) {

		$query = updateAgent($pdo, $_POST['fullName'], $_POST['l_Number'], 
		$_POST['l_ExpiryDate'], $_POST['specialization'], $_POST['a_Contact'], $_POST['yearsOfExperience'], $_GET['agentID']);

		if ($query) {
			header("Location: ../index.php");
		}

		else {
			echo "Edit failed";
		}

	}

	else {
		echo "Make sure no input fields are empty before updating!";
	}



}



if (isset($_POST['deleteAgentBtn'])) {
	$query = deleteAgent($pdo, $_GET['agentID']);

	if ($query) {
		header("Location: ../index.php");
	}

	else {
		echo "Deletion failed";
	}
}





if (isset($_POST['insertNewServicestBtn'])) {
	$query = insertServices($pdo, $_POST['service_offered'], $_POST['property_management'], $_GET['l_services'], $_GET['agentID']);

	if ($query) {
		header("Location: ../viewservices.php?agentID=".$_GET['agentID']);
	}
	else {
		echo "Insertion failed";
	}
}




if (isset($_POST['editServicesBtn'])) {
	$query = insertServices($pdo, $_POST['service_offered'], $_POST['property_management'], $_GET['l_services'], $_GET['servicesID']);
	if ($query) {
		header("Location: ../viewservices.php?agentID=".$_GET['agentID']);
	}
	else {
		echo "Update failed";
	}

}




if (isset($_POST['deleteServicesBtn'])) {
	$query = deleteServices($pdo, $_GET['servicesID']);

	if ($query) {
		header("Location: ../viewservices.php?agentID=".$_GET['agentID']);
	}
	else {
		echo "Deletion failed";
	}
}




?>