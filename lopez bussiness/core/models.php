<?php

function insertAgent($pdo, $fullName, $l_Number, $l_ExpiryDate, $specialization, $a_Contact, $yearsOfExperience) {
    $sql = "INSERT INTO agent_accounts (fullName, l_Number, l_ExpiryDate,  specialization, a_Contact, yearsOfExperience) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$fullName, $l_Number, $l_ExpiryDate, $specialization, $a_Contact, $yearsOfExperience]);

    return $executeQuery;
}

function updateAgent($pdo, $fullName, $l_Number, $l_ExpiryDate, $specialization, $a_Contact, $yearsOfExperience, $agentID) {
    $sql = "UPDATE agent_accounts
            SET fullName = ?, l_Number = ?, l_ExpiryDate = ?, specialization = ?, a_Contact = ?, yearsOfExperience = ?
            WHERE agentID = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$fullName, $l_Number, $l_ExpiryDate, $specialization, $a_Contact, $yearsOfExperience, $agentID]);

    return $executeQuery;
}

function deleteAgent($pdo, $agentID) {
    $deleteagentSQL = "DELETE FROM services WHERE agentID = ?";
    $deleteStmt = $pdo->prepare($deleteagentSQL);
    $executeDeleteQuery = $deleteStmt->execute([$agentID]);

    if ($executeDeleteQuery) {
        $sql = "DELETE FROM agent_accounts WHERE agentID = ?";
        $stmt = $pdo->prepare($sql);
        $executeQuery = $stmt->execute([$agentID]);

        return $executeQuery;
    }
    return false;
}

function getAllAgent($pdo) {
    $sql = "SELECT * FROM agent_accounts";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll();
}

function getAgentByID($pdo, $agentID) {
    $sql = "SELECT * FROM agent_accounts WHERE agentID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$agentID]);

    return $stmt->fetch();
}

function getServicesByAgents($pdo, $agentID) {
    $sql = "SELECT services.servicesID, services.service_offered, services.property_management, services.l_services, services.date_added,
                  agent_accounts.fullName as services_owner
            FROM services
            JOIN agent_accounts ON services.agentID = agent_accounts.agentID
            WHERE services.agentID = ?
            ORDER BY services.service_offered";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$agentID]);

    return $stmt->fetchAll();
}

function insertservices($pdo, $service_offered, $property_management, $l_services, $agentID) {
    $sql = "INSERT INTO services (service_offered, property_management, l_services, agentID) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$service_offered, $property_management, $l_services, $agentID]);

    return $executeQuery;
}

function getServicesByID($pdo, $servicesID) {
    $sql = "SELECT services.servicesID, services.service_offered, services.property_management, services.l_services, services.date_added,
                  agent_accounts.agentID as services_owner
            FROM services
            JOIN agent_accounts ON services.agentID = agent_accounts.agentID
            WHERE services.servicesID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$servicesID]);

    return $stmt->fetch();
}

function updateServices($pdo, $service_offered, $property_management, $l_services, $servicesID) {
    $sql = "UPDATE services
            SET service_offered = ?, property_management = ?, l_services = ?
            WHERE servicesID = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$service_offered, $property_management, $l_services, $servicesID]);

    return $executeQuery;
}


function deleteServices($pdo, $servicesID) {
    $sql = "DELETE FROM services WHERE servicesID = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$servicesID]);

    return $executeQuery;
}

?>