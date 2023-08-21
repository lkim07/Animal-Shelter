<html>
    <head>
        <title>Animal Shelter</title>
        <link rel="stylesheet" href="style.php">
    </head>

    <body>
        <!-- Disclaimer: Credit for functions based off of veterinarian.php.
            Refer to Piazza @160.
         --> 

        <form action="index.php">
            <button type="submit">Return Home</button>
        </form>

        <h1>Veterinarian Information</h1>
        
        <hr />

        <h2>Add Veterinarian</h2>
        <form method="POST" action="veterinarian.php">
            <input type="hidden" id="insertVetRequest" name="insertVetRequest">
            License Number: <input type="text" name="insLicenseNum" maxlength="10"> <br />
            Name: <input type="text" name="insVetName" maxlength="20"> <br />
            Phone: <input type="text" name="insVetPhone" maxlength="12"> <br />
            <input type="submit" value="Insert" name="insertSubmit"></p>
        </form>

        <h2>Update Veterinarian Phone</h2>
        <form method="POST" action="veterinarian.php">
            <input type="hidden" id="updateVetRequest" name="updateVetRequest">
            Old Phone: <input type="text" name="oldPhone" maxlength="12"> <br />
            New Phone: <input type="text" name="newPhone" maxlength="12"> <br />
            <input type="submit" value="Update" name="updateSubmit"></p>
        </form>

        <h2>Delete Veterinarian</h2>
        <form method="POST" action="veterinarian.php">
            <input type="hidden" id="deleteVetRequest" name="deleteVetRequest">
            License Number: <input type="text" name="delLicenseNum" maxlength="10"> <br />
            <input type="submit" value="Delete" name="deleteSubmit"></p>
        </form>

        <hr />

        <h2>Record Check Up Details</h2>
        <form method="POST" action="veterinarian.php">
            <input type="hidden" id="insertCheckUpRequest" name="insertCheckUpRequest">
            Veterinarian License Number: <input type="text" name="insLicenseNum" maxlength="10"><br />
            Animal ID: <input type="text" name="insAnimalID" maxlength="6"><br />
            Check Up Date: <input type="text" name="insCheckUpDate" maxlength="10"> <br />
            Assessment: <input type="text" name="insAssessment" maxlength="15"> <br />
            <input type="submit" value="Record" name="insertSubmit"></p>
        </form>

        <hr />

        <h2>View Veterinarian Information</h2>
        <form method="GET" action="veterinarian.php">
            <input type="hidden" id="viewVetRequest" name="viewVetRequest">
            <input type="submit" value="View All" name="viewSubmit"></p>
        </form>

        <h2>View Check Up History</h2>
        <form method="GET" action="veterinarian.php">
            <input type="hidden" id="viewVetHistoryRequest" name="viewVetHistoryRequest">
            <input type="submit" value="View All" name="viewSubmit"></p>
        </form>
        
        <hr />

        <?php
		
        include("connection.php");

        function handleUpdatePhoneRequest() {
            global $db_conn;

            $old_phone = $_POST['oldPhone'];
            $new_phone = $_POST['newPhone'];

            executePlainSQL("UPDATE Veterinarian SET vetPhone='" . $new_phone . "' WHERE vetPhone='" . $old_phone . "'");
            OCICommit($db_conn);
        }


        function handleInsertVetRequest() {
            global $db_conn;

            $tuple = array (
                ":bind1" => $_POST['insLicenseNum'],
                ":bind2" => $_POST['insVetName'],
                ":bind3" => $_POST['insVetPhone']
            );

            $alltuples = array (
                $tuple
            );

            executeBoundSQL("INSERT INTO Veterinarian values (:bind1, :bind2, :bind3)", $alltuples);
            OCICommit($db_conn);
        }

        function handleDeleteVetRequest() {
            global $db_conn;

            $tuple = array (
                ":bind4" => $_POST['delLicenseNum'],
            );

            $alltuples = array (
                $tuple
            );

            executeBoundSQL("DELETE FROM Veterinarian WHERE licenseNum=:bind4", $alltuples);
            OCICommit($db_conn);
        }

        function handleCheckUpRequest() {
            global $db_conn;

            //Getting the values from user and insert data into the table
            $tuple = array (
                ":bind1" => $_POST['insLicenseNum'],
                ":bind2" => $_POST['insAnimalID'],
                ":bind3" => $_POST['insCheckUpDate'],
                ":bind4" => $_POST['insAssessment'],
            );

            $alltuples = array (
                $tuple
            );

            executeBoundSQL("INSERT INTO CheckUp values (:bind1, :bind2, :bind3, :bind4)", $alltuples);
            OCICommit($db_conn);
        }

        function handleVetRequest() {
            global $db_conn;

            $result = executePlainSQL("SELECT * FROM Veterinarian");

            echo "<table>";
            echo "<tr><th>License Number</th><th>Name</th><th>Phone</th></tr>";

            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td></tr>";
            }

            echo "</table>";
        }

        function handleVetHistoryRequest() {
            global $db_conn;

            $result = executePlainSQL("SELECT * FROM CheckUp");

            echo "<table>";
            echo "<tr><th>License Number</th>
                <th>Animal ID</th>
                <th>Date</th>
                <th>Assessment</th>
                </tr>";

            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row[0] . "</td>
                        <td>" . $row[1] . "</td>
                        <td>" . $row[2] . "</td>
                        <td>" . $row[3] . "</td>
                        </tr>";
            }

            echo "</table>";
        }

        // HANDLE ALL POST ROUTES
	// A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
        function handlePOSTRequest() {
            if (connectToDB()) {
                if (array_key_exists('updateVetRequest', $_POST)) {
                    handleUpdatePhoneRequest();
                } else if (array_key_exists('insertVetRequest', $_POST)) {
                    handleInsertVetRequest();
                } else if (array_key_exists('deleteVetRequest', $_POST)) {
                    handleDeleteVetRequest();
                } else if (array_key_exists('insertCheckUpRequest', $_POST)) {
                    handlecheckUpRequest();
                }

                disconnectFromDB();
            }
        }

        // HANDLE ALL GET ROUTES
	// A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
        function handleGETRequest() {
            if (connectToDB()) {
                if (array_key_exists('viewVetRequest', $_GET)) {
                    handleVetRequest();
                } else if (array_key_exists('viewVetHistoryRequest', $_GET)) {
                    handleVetHistoryRequest();
                }
                disconnectFromDB();
            }
        }
		?>
	</body>
</html>