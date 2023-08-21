<html>
    <head>
        <title>Animal Shelter</title>
        <link rel="stylesheet" href="style.php">
    </head>

    <body>
        <!-- Disclaimer: Credit for functions based off of oracle-test.php.
            Refer to Piazza @160.
         --> 

        <form action="index.php">
            <button type="submit">Return Home</button>
        </form> 

        <h1>Food Management</h1>
        
        <hr />

        <h2>Add Food Product</h2>
        <form method="POST" action="food.php">
            <input type="hidden" id="insertFoodRequest" name="insertFoodRequest">
                UPC: <input type="text" name="insUPC" maxlength="10"> <br />
                Target: <input type="text" name="insTarget" maxlength="10"> <br />
                Product Name: <input type="text" name="insProductName" maxlength="50"> <br />
                Stock: <input type="text" name="insStock" maxlength="5"> <br />
            <input type="submit" value="Add Food Product" name="insertSubmit">
        </form>
        
        <h2>Update Stock</h2>
        <form method="POST" action="food.php">
            <input type="hidden" id="updateStockRequest" name="updateStockRequest">
            UPC: <input type="text" name="currentUPC" maxlength="10"> <br />
            Old Stock Number: <input type="text" name="oldStock" maxlength="5"> <br />
            New Stock Number: <input type="text" name="newStock" maxlength="5"> <br />
            <input type="submit" value="Update Stock" name="updateSubmit"></p>
        </form>

        <h2>Delete Food Product</h2>
        <form method="POST" action="food.php">
            <input type="hidden" id="deleteFoodRequest" name="deleteFoodRequest">
            UPC: <input type="text" name="delUPC" maxlength="10"> <br />
            <input type="submit" value="Delete Food Product" name="deleteSubmit"></p>
        </form>

        <hr />

        <h2>Add Donor</h2>
        <form method="POST" action="food.php">
            <input type="hidden" id="insertDonorRequest" name="insertDonorRequest">
                Membership ID: <input type="text" name="insMemberID" maxlength="6"> <br />
            <input type="submit" value="Add Donor" name="insertSubmit">
        </form>

        <h2>Add Donation</h2>
        <form method="POST" action="food.php">
            <input type="hidden" id="insertDonationRequest" name="insertDonationRequest">
                Membership ID: <input type="text" name="insMemberID" maxlength="6"> <br />
                UPC: <input type="text" name="insUPC" maxlength="10"> <br />
                Given Date: <input type="text" name="insDate" maxlength="10"> <br />
                Quantity: <input type="text" name="insQuantity" maxlength="5"> <br />
            <input type="submit" value="Add Donation" name="insertSubmit">
        </form>

        <hr />

        <h2>Feed Animal</h2>
        <form method="POST" action="food.php">
            <input type="hidden" id="insertFeedRequest" name="insertFeedRequest">
                Animal ID: <input type="text" name="insAnimalID" maxlength="6"> <br />
                Staff ID: <input type="text" name="insStaffID" maxlength="6"> <br />
                Feed Date: <input type="text" name="insFeedDate" maxlength="10"> <br />
                Time: <input type="text" name="insTime" maxlength="4"> <br />
            <input type="submit" value="Add Feeding" name="insertSubmit">
        </form>

        <hr />

        <h2>View Food Information</h2>
        <form method="GET" action="food.php">
            <input type="hidden" id="viewFoodRequest" name="viewFoodRequest">
            <input type="submit" value="View All" name="viewSubmit"></p>
        </form>

        <h2>View Donor Information</h2>
        <form method="GET" action="food.php">
            <input type="hidden" id="viewDonorRequest" name="viewDonorRequest">
            <input type="submit" value="View All" name="viewSubmit"></p>
        </form>

        <h2>View Donation Information</h2>
        <form method="GET" action="food.php">
            <input type="hidden" id="viewDonationRequest" name="viewDonationRequest">
            <input type="submit" value="View All" name="viewSubmit"></p>
        </form>

        <h2>View Sorted Stock</h2>
        <form method="GET" action="food.php">
            <input type="hidden" id="viewAggregationGroupBy" name="viewAggregationGroupBy">
            <input type="submit" value="View All" name="viewSubmit"></p>
        </form>

        <h2>View Feeding Information</h2>
        <form method="GET" action="food.php">
            <input type="hidden" id="viewFeedRequest" name="viewFeedRequest">
            <input type="submit" value="View All" name="viewSubmit"></p>
        </form>

        <h2>View Animals Fed By All Volunteers</h2>
        <form method="GET" action="food.php">
            <input type="hidden" id="viewDivisionRequest" name="viewDivisionRequest">
            <input type="submit" value="View All" name="viewSubmit"></p>
        </form>

        <hr />

        <?php
		
        include("connection.php");

        function handleUpdateStockRequest() {
            global $db_conn;

            $UPC = $_POST['currentUPC'];
            $old_stock = $_POST['oldStock'];
            $new_stock = $_POST['newStock'];

            executePlainSQL("UPDATE Food
                                SET stock='" . $new_stock . "' WHERE UPC='" . $UPC . "'AND
                                                                        stock='" . $old_stock . "'");
            OCICommit($db_conn);
        }

        function handleInsertFoodRequest() {
            global $db_conn;

            $tuple = array (
                ":bind1" => $_POST['insUPC'],
                ":bind2" => $_POST['insTarget'],
                ":bind3" => $_POST['insProductName'],
                ":bind4" => $_POST['insStock']
            );

            $alltuples = array (
                $tuple
            );

            executeBoundSQL("INSERT INTO Food values (:bind1, :bind2, :bind3, :bind4)", $alltuples);
            OCICommit($db_conn);
        }

        function handleInsertDonorRequest() {
            global $db_conn;

            $tuple = array (
                ":bind1" => $_POST['insMemberID']
            );

            $alltuples = array (
                $tuple
            );

            executeBoundSQL("INSERT INTO Donor values (:bind1)", $alltuples);
            OCICommit($db_conn);
        }

        function handleInsertDonationRequest() {
            global $db_conn;

            $tuple = array (
                ":bind1" => $_POST['insMemberID'],
                ":bind2" => $_POST['insUPC'],
                ":bind3" => $_POST['insDate'],
                ":bind4" => $_POST['insQuantity']
            );

            $alltuples = array (
                $tuple
            );

            executeBoundSQL("INSERT INTO Give values (:bind1, :bind2, :bind3, :bind4)", $alltuples);
            OCICommit($db_conn);
        }

        function handleInsertFeedRequest() {
            global $db_conn;

            $tuple = array (
                ":bind1" => $_POST['insAnimalD'],
                ":bind2" => $_POST['insStaffID'],
                ":bind3" => $_POST['insFeedDate'],
                ":bind4" => $_POST['insTime']
            );

            $alltuples = array (
                $tuple
            );

            executeBoundSQL("INSERT INTO Feed values (:bind1, :bind2, :bind3, :bind4)", $alltuples);
            OCICommit($db_conn);
        }

        function handleDeleteFoodRequest() {
            global $db_conn;

            $UPC = $_POST['delUPC'];

            $result = executePlainSQL("SELECT * FROM Food WHERE UPC='" . $UPC . "' AND stock = 0");
            $row = OCI_Fetch_Array($result, OCI_BOTH);

            if(empty($row)){
                echo "Stock is not 0 or item does not exist. Please check if item remains in storage and update stock to 0 first.";
            } else {
                executePlainSQL("DELETE FROM Food WHERE UPC='" . $UPC . "'");
            }

            OCICommit($db_conn);
        }


        function handleFoodRequest() {
            global $db_conn;

            $result = executePlainSQL("SELECT * FROM Food");

            echo "<table>";
            echo "<tr><th>UPC</th>
                    <th>Target</th>
                    <th>Product Name</th>
                    <th>Stock</th>
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

        function handleDonorRequest() {
            global $db_conn;

            $result = executePlainSQL("SELECT * FROM Donor");

            echo "<table>";
            echo "<tr><th>Membership ID</th>
                    </tr>";

            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row[0] . "</td>
                        </tr>";
            }

            echo "</table>";
        }

        function handleDonationRequest() {
            global $db_conn;

            $result = executePlainSQL("SELECT * FROM Give");

            echo "<table>";
            echo "<tr><th>Membership ID</th>
                    <th>UPC</th>
                    <th>Given Date</th>
                    <th>Quantity</th>
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

        function handleAggregationGroupBy() {
            global $db_conn;

            $result = executePlainSQL("SELECT f.target, sum(f.stock) FROM Food f GROUP BY f.target");
            
            echo "<table>";
            echo "<tr>
                    <th>Target</th>
                    <th>Quantity</th>
                    </tr>";

            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row[0] . "</td>
                        <td>" . $row[1] . "</td>
                        </tr>";
            }

            echo "</table>";
        }

        function handleFeedRequest() {
            global $db_conn;

            $result = executePlainSQL("SELECT * FROM Feed");

            echo "<table>";
            echo "<tr><th>Animal ID</th>
                    <th>Staff ID</th>
                    <th>Feed Date</th>
                    <th>Time</th>
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

        function handleDivisionQueryRequest() {
            global $db_conn;

            $result = executePlainSQL("SELECT a.animalID, a.animalName, a.gender, a.age
                                        FROM Animal a
                                        WHERE NOT EXISTS (SELECT v.staffID
                                                        FROM Volunteer v
                                                        WHERE NOT EXISTS (SELECT f.animalID
                                                                FROM Feed f
                                                                WHERE v.staffID = f.staffID
                                                                AND f.animalID = a.animalID))");

            echo "<table>";
            echo "<tr><th>Animal ID</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Age</th>
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
                if (array_key_exists('updateStockRequest', $_POST)) {
                    handleUpdateStockRequest();
                } else if (array_key_exists('insertFoodRequest', $_POST)) {
                    handleInsertFoodRequest();
                } else if (array_key_exists('insertDonorRequest', $_POST)) {
                    handleInsertDonorRequest();
                } else if (array_key_exists('insertDonationRequest', $_POST)) {
                    handleInsertDonationRequest();
                } else if (array_key_exists('insertFeedRequest', $_POST)) {
                    handleInsertFeedRequest();
                } else if (array_key_exists('deleteFoodRequest', $_POST)) {
                    handleDeleteFoodRequest();
                }

                disconnectFromDB();
            }
        }

        // HANDLE ALL GET ROUTES
	// A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
        function handleGETRequest() {
            if (connectToDB()) {
                if (array_key_exists('viewFoodRequest', $_GET)) {
                    handleFoodRequest();
                } else if (array_key_exists('viewDonorRequest', $_GET)) {
                    handleDonorRequest();
                } else if (array_key_exists('viewDonationRequest', $_GET)) {
                    handleDonationRequest();
                } else if (array_key_exists('viewAggregationGroupBy', $_GET)) {
                    handleAggregationGroupBy();
                } else if (array_key_exists('viewFeedRequest', $_GET)) {
                    handleFeedRequest();
                } else if (array_key_exists('viewDivisionRequest', $_GET)) {
                    handleDivisionQueryRequest();
                }

                disconnectFromDB();
            }
        }

		?>

    </body>
</html>
