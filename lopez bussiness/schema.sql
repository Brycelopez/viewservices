CREATE TABLE agent_accounts (
   agentID INT PRIMARY KEY AUTO_INCREMENT,
    fullName VARCHAR(100) NOT NULL,
    l_Number VARCHAR(50) NOT NULL UNIQUE,
    l_ExpiryDate Date NOT NULL,
    specialization VARCHAR(50),
    a_Contact VARCHAR(150),
    yearsOfExperience INT,
    serviceAreas TEXT,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE services (
    servicesID Int PRIMARY KEY AUTO_INCREMENT,
    service_offered VARCHAR (50),
    property_management VARCHAR (50),
    l_services VARCHAR (50),
    agentID INT,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
