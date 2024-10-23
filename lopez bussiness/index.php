
<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business_Activity</title>
    <link rel="stylesheet" href="style.css">
</head>
    <body>
        <h1>Welcome to Lopez real Estate services.</h1>
        <form action="core/handleForms.php" method="POST">
            <p>
                <label for="fullName">fullName: </label>
                <input type="text" name="fullName">
            </p>
            <p>
                <label for="l_Number">lisence number: </label>
                <input type="text" name="l_Number">
            </p>
            <p>
                <label for="l_ExpiryDate">lisence expirydate: </label>
                <input type="text" name="l_ExpiryDate">
            </p>
            <p>
                <label for="specialization ">specialization : </label>
                <input type="text" name="specialization ">
            </p>
            <p>
                <label for="a_Contact">agent Contact: </label>
                <input type="text" name="a_Contact">
            </p>
            <p>
                <label for="yearsOfExperience">yearsOfExperience: </label>
                <input type="text" name="yearsOfExperience">
            </p>
            <p>
                <label for="serviceAreas">serviceAreas: </label>
                <input type="text" name="serviceAreas">
            </p>
            <p><input type="submit" name="insertAgentBtn"></p>
        </form>
            <?php $getAllagent = getAllAgent($pdo); ?>
            <?php foreach ($getAllagent as $row ) { ?>
                <h3>fullName: <?php echo $row ['fullName']; ?></h3>
                <h3>Lisense number: <?php echo $row ['l_Number']; ?></h3>
                <h3>expiration of lisence: <?php echo $row ['l_ExpiryDate']; ?></h3>
                <h3>specialization: <?php echo $row ['specialization']; ?></h3>
                <h3>agent Contact: <?php echo $row ['a_Contact']; ?></h3>
                <h3>yearsOfExperience: <?php echo $row ['yearsOfExperience']; ?></h3>
                <h3> serviceAreas: <?php echo $row ['serviceAreas']; ?></h3>

                <a href="viewservices.php?agentID=<?php echo $row ['agentID']; ?>">View services </a>
                <a href="editagents.php?agentID=<?php echo $row ['agentID']; ?>">Edit agent </a>
                <a href="deleteagents.php?agentID=<?php echo $row ['agentID']; ?>">Delete agent </a>

        <?php } ?>
    </body>
</html>
