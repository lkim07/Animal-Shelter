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

        <h1>Administration</h1>

        <hr />

        <h2>Add Shelter</h2>
        <form method="POST" action="admin.php">
            <input type="hidden" id="insertBranchRequest" name="insertBranchRequest">
                Branch Number: <input type="text" name="insBranchNum" maxlength="5"> <br />
                Shelter Address: <input type="text" name="insShelterAddress" maxlength="80"> <br />
            <input type="submit" value="Add Shelter Branch" name="insertSubmit">
        </form>

        <h2>Add Staff</h2>
        <form method="POST" action="admin.php">
            <input type="hidden" id="insertstaffRequest" name="insertStaffRequest">
                Staff ID: <input type="text" name="insStaffID" maxlength="6"> <br />
                Staff Name: <input type="text" name="insStaffName" maxlength="20"> <br />
                Staff Email: <input type="text" name="insEmail" maxlength="80"> <br />
                Branch Number: <input type="text" name="insBranchNum" maxlength="5"> <br />
                Position: <input type="text" name="insPosition" maxlength="50"> <br />
            <input type="submit" value="Add Staff" name="insertSubmit">
        </form>

        <hr />

        <h2>Add Employee</h2>
        <form method="POST" action="admin.php">
            <input type="hidden" id="insertEmployeeRequest" name="insertEmployeeRequest">
                Staff ID: <input type="text" name="insEStaffID" maxlength="6"> <br />
                Salary: <input type="text" name="insSalary" maxlength="20"> per hour <br />
            <input type="submit" value="Add Employee" name="insertSubmit">
        </form>

        <h2>Remove Employee</h2>
        <form method="POST" action="admin.php">
            <input type="hidden" id="deleteEmployeeRequest" name="deleteEmployeeRequest">
            Staff ID: <input type="text" name="delEStaffID" maxlength="6"> <br /><br />
            <input type="submit" value="Remove Employee" name="deleteSubmit"></p>
            
        </form>

        <hr />

        <h2>Add Volunteer</h2>
        <form method="POST" action="admin.php">
            <input type="hidden" id="insertVolunteerRequest" name="insertVolunteerRequest">
                Staff ID: <input type="text" name="insVStaffID" maxlength="6"> <br />
                Hours Volunteered: <input type="text" name="insHoursVolunteered" maxlength="5"> <br />
            <input type="submit" value="Add Volunteer" name="insertVolunteer" id="submitButton">
        </form>


        <h2>Update Volunteer Hours</h2>
        <form method="POST" action="admin.php">
            <input type="hidden" id="updateHoursRequest" name="updateHoursRequest">
            Staff ID: <input type="text" name="currentStaffID" maxlength="6"> <br />
            Old Hours: <input type="text" name="oldHours" maxlength="5"> <br />
            New Hours: <input type="text" name="newHours" maxlength="5"> <br />
            <input type="submit" value="Update" name="updateSubmit"></p>
        </form>

        <h2>Remove Volunteer</h2>
        <form method="POST" action="admin.php">
            <input type="hidden" id="deleteVolunteerRequest" name="deleteVolunteerRequest">
            Staff ID: <input type="text" name="delVStaffID" maxlength="6"> <br />
            <input type="submit" value="Remove Volunteer" name="deleteSubmit"></p>
        </form>

        <hr />

        <h2>View Shelter Branches</h2>
        <form method="GET" action="admin.php">
            <input type="hidden" id="viewBranchRequest" name="viewBranchRequest">
            <input type="submit" value="View All" name="viewSubmit"></p>
        </form>

        <h2>View Staff</h2>
        <form method="GET" action="admin.php">
            <input type="hidden" id="viewStaffRequest" name="viewStaffRequest">
            <input type="submit" value="View All" name="viewSubmit"></p>
        </form>

        <h2>View Employees</h2>
        <form method="GET" action="admin.php">
            <input type="hidden" id="viewEmployeeRequest" name="viewEmployeeRequest">
            <input type="submit" value="View All" name="viewSubmit"></p>
        </form>

        <h2>View Volunteers</h2>
        <form method="GET" action="admin.php">
            <input type="hidden" id="viewVolunteerRequest" name="viewVolunteerRequest">
            <input type="submit" value="View All" name="viewSubmit"></p>
        </form>

        <h2>Volunteer Prizes</h2>
        Once volunteers work for 100 hours, we give them a certificate.
        Once they work for 200 hours, we give them a gift voucher.
        <form method="GET" action="admin.php">
            Hours worked: <input type="text" name="viewVolunteerHours" maxlength="6"> <br />
            <input type="hidden" id="viewVolunteerPrizesRequest" name="viewVolunteerPrizesRequest">
            <input type="submit" value="Retrieve Volunteers" name="viewSubmit"></p>
        </form>

        <h2>Search</h2>
        <form method="GET" action="admin.php"> 
            <input type="hidden" id="selectQueryRequest" name="selectQueryRequest">
            Category <select name="table" required>
                <option value="">Select category</option>
                <option value="AdopterInfo">Adopter</option>
                <option value="Animal">Animal</option>
                <option value="Food">Food Stock</option>
                <option value="StaffManages">Staff</option>
                <option value="Supporter">Supporter</option>
                <option value="Veterinarian">Veterinarian</option>
            </select> <br />
            Filter by <input type="text" name="filterBy"> <br />
            <input type="submit" value="Enter" name="viewSubmit">
        </form><br />

        <h2>Aggregation by Having</h2><br />
        <form method="GET" action="admin.php"> 
            <input type="hidden" id="aggregationByHavingRequest" name="aggregationByHavingRequest">
            Find the average age of Animals that is not null, for each gender with the average age of the grouped is grater than 6. <br />
            <input type="submit" value="Enter" name="viewSubmit">
        </form><br />

        <h2>Nested Aggregation with Group by</h2><br />
        <form method="GET" action="admin.php"> 
            <input type="hidden" id="nestedAggregationWithGroupByRequest" name="nestedAggregationWithGroupByRequest">
            Find the age of the youngest Animal and average age of each gender with age >3 and the age is not null, 
            for each gender for which the average age of the students who age >3 and the age is not null is higher than 
            the average age of all Animals which age is not null across all genders.<br />
            <input type="submit" value="Enter" name="viewSubmit">
        </form><br />

        <hr />

        <?php
            include("connection.php");

            function handleUpdateHoursRequest() {
                global $db_conn;

                $staff_id = $_POST['currentStaffID'];
                $old_hours = $_POST['oldHours'];
                $new_hours = $_POST['newHours'];

                executePlainSQL("UPDATE Volunteer 
                                    SET hoursVolunteered='" . $new_hours . "' WHERE staffID='" . $staff_id . "'AND
                                                                                    hoursVolunteered='" . $old_hours . "'");
                OCICommit($db_conn);
            }

            function handleInsertBranchRequest() {
                global $db_conn;

                $tuple = array (
                    ":bind1" => $_POST['insBranchNum'],
                    ":bind2" => $_POST['insShelterAddress']
                );

                $alltuples = array (
                    $tuple
                );

                executeBoundSQL("insert into Shelter values (:bind1, :bind2)", $alltuples);
                OCICommit($db_conn);
            }


            function handleInsertStaffRequest() {
                global $db_conn;

                $tuple = array (
                    ":bind1" => $_POST['insStaffID'],
                    ":bind2" => $_POST['insStaffName'],
                    ":bind3" => $_POST['insEmail'],
                    ":bind4" => $_POST['insBranchNum'],
                    ":bind5" => $_POST['insPosition']
                );

                $alltuples = array (
                    $tuple
                );

                executeBoundSQL("insert into StaffManages values (:bind1,:bind2,:bind3,:bind4,:bind5)", $alltuples);
                OCICommit($db_conn);
            }

            function handleInsertEmployeeRequest() {
                global $db_conn;


                $tuple = array (
                    ":bind1" => $_POST['insEStaffID'],
                    ":bind2" => $_POST['insSalary']
                );

                $alltuples = array (
                    $tuple
                );

                executeBoundSQL("insert into Employee values (:bind8, :bind9)", $alltuples);
                OCICommit($db_conn);
            }


            function handleInsertVolunteerRequest() {
                global $db_conn;

                $tuple = array (
                    ":bind1" => $_POST['insVStaffID'],
                    ":bind2" => $_POST['insHoursVolunteered']
                );

                $alltuples = array (
                    $tuple
                );

                executeBoundSQL("insert into Volunteer values (:bind1, :bind2)", $alltuples);
                OCICommit($db_conn);
            }

            function handleDeleteEmployeeRequest() {
                global $db_conn;

                $tuple = array (
                    ":bind1" => $_POST['delEStaffID'],
                );
    
                $alltuples = array (
                    $tuple
                );
    
                executeBoundSQL("DELETE FROM Employee WHERE staffID=:bind1", $alltuples);
                OCICommit($db_conn);
            }

            function handleDeleteVolunteerRequest() {
                global $db_conn;
    
                $tuple = array (
                    ":bind1" => $_POST['delVStaffID'],
                );
    
                $alltuples = array (
                    $tuple
                );
    
                executeBoundSQL("DELETE FROM Volunteer WHERE staffID=:bind1", $alltuples);
                OCICommit($db_conn);
            }

            function handleViewBranchRequest() {
                global $db_conn;

                $result = executePlainSQL("SELECT * FROM Shelter");

                echo "<table>";
                echo "<tr><th>Branch Number</th><th>Address</th></tr>";

                while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                    echo "<tr><td>" . $row["0"] . "</td><td>" . $row["1"] . "</td></tr>";
                }

                echo "</table>";
            }


            function handleViewStaffRequest() {
                global $db_conn;

                $result = executePlainSQL("SELECT * FROM StaffManages");

                echo "<table>";
                echo "<tr><th>Staff ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Branch Number</th>
                            <th>Position</th>
                            </tr>";

                while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                    echo "<tr><td>" . $row["0"] . "</td>
                                <td>" . $row["1"] . "</td>
                                <td>" . $row["2"] . "</td>
                                <td>" . $row["3"] . "</td>
                                <td>" . $row["4"] . "</td>
                                </tr>";
                }

                echo "</table>";
            }

            function handleViewEmployeeRequest() {
                global $db_conn;

                $result = executePlainSQL("SELECT * FROM Employee");

                echo "<table>";
                echo "<tr><th>Staff ID</th>
                            <th>Salary</th>
                            </tr>";

                while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                    echo "<tr><td>" . $row["0"] . "</td>
                                <td>" . $row["1"] . "</td>
                                </tr>";
                }

                echo "</table>";
            }

            function handleViewVolunteerRequest() {
                global $db_conn;

                $result = executePlainSQL("SELECT * FROM Volunteer");

                echo "<table>";
                echo "<tr><th>Staff ID</th>
                            <th>Volunteer Hours</th>
                            </tr>";

                while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                    echo "<tr><td>" . $row["0"] . "</td>
                                <td>" . $row["1"] . "</td>
                                </tr>";
                }

                echo "</table>";
            }

            function handleViewVolunteerPrizesRequest() {
                global $db_conn;

                $volunteerHours = $_GET['viewVolunteerHours'];

                $result = executePlainSQL("SELECT sm.staffName, sm.staffID, v.hoursVolunteered FROM StaffManages sm INNER JOIN Volunteer v ON sm.staffID=v.staffID WHERE v.hoursVolunteered > $volunteerHours");
                
                echo "<table>";
                echo "<tr><th>Staff Name</th>
                            <th>Staff ID</th>
                            <th>Hours Worked</th>
                            </tr>";

                while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                    echo "<tr><td>" . $row["0"] . "</td>
                                <td>" . $row["1"] . "</td>
                                <td>" . $row["2"] . "</td>
                                </tr>";
                }

                echo "</table>";
            }

            function handleSelectQueryRequest(){
                global $db_conn;

                $from = $_GET['table'];
                $where = $_GET['filterBy'];
                if(empty($where)){
                    $result = executePlainSQL("SELECT * FROM " .$from);
                } else {
                    $result = executePlainSQL("SELECT * FROM " .$from. " WHERE " .$where);
                }

                echo "<table>";

                if ($from == "Animal"){
                    echo "<tr><th>Animal ID</th>
                        <th>Name</th>
                        <th>Arrival Date</th>
                        <th>Gender</th>
                        <th>Age</th>
                        <th>Status</th>
                        <th>Branch Number</th>
                        <th>Applicant ID</th>
                        </tr>";
                } else if ($from == "StaffManages"){
                    echo "<tr><th>Staff ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Branch Number</th>
                            <th>Position</th>
                            </tr>";
                } else if ($from == "Food"){
                    echo "<tr><th>UPC</th><th>Target</th><th>ProductName</th><th>Stock</th></tr>";
                } else if ($from == "Veterinarian"){
                    echo "<tr><th>License Number</th><th>Name</th><th>Phone</th></tr>";
                } else if ($from == "AdopterInfo"){
                    echo "<tr><th>Adopter Phone</th><th>Adopter Name</th><th>Adopter Address</th></tr>";
                } else if ($from == "Supporter"){
                    echo "<tr><th>Membership ID</th><th>Supporter Name</th><th>Supporter Phone</th></tr>";
                }

                while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                    echo "<tr><td>" . $row["0"] . "</td>
                                <td>" . $row["1"] . "</td>
                                <td>" . $row["2"] . "</td>
                                <td>" . $row["3"] . "</td>
                                <td>" . $row["4"] . "</td>
                                <td>" . $row["5"] . "</td>
                                <td>" . $row["6"] . "</td>
                                <td>" . $row["7"] . "</td>
                                <td>" . $row["8"] . "</td>
                                </tr>";
                }

                echo "</table>";

            }

            function aggregationByHavingRequest(){
                global $db_conn;

                $result = executePlainSQL("SELECT AVG(age), gender FROM Animal WHERE age is not null GROUP BY gender HAVING avg(age)>6");
                

                echo "<table>";
                echo "<tr><th>AVG(AGE)</th><th>GENDER</th></tr>";

                while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                    echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td></tr>";
                }

                echo "</table>";


            }

            function nestedAggregationWithGroupByRequest(){
                global $db_conn;

                $result = executePlainSQL("SELECT S.gender, MIN(S.age), AVG(S.age)
                                            FROM Animal S
                                            WHERE S.age>3 and S.age is not null
                                            GROUP BY S.gender
                                            HAVING AVG(S.age) > (SELECT AVG(age) 
                                                                FROM Animal 
                                                                WHERE age is not null)");
                

                echo "<table>";
                echo "<tr><th>GENDER</th><th>MIN(S.age)</th><th>AVG(S.age)</th></tr>";

                while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                    echo "<tr><td>" . $row["0"] . "</td><td>" . $row["1"] . "</td><td>" . $row["2"]."</td></tr>";
                }

                echo "</table>";


            }


            // HANDLE ALL POST ROUTES
            // A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
            function handlePOSTRequest() {
                if (connectToDB()) {
                    if (array_key_exists('updateHoursRequest', $_POST)) {
                        handleUpdateHoursRequest();
                    } else if (array_key_exists('insertBranchRequest', $_POST)) {
                        handleInsertBranchRequest();
                    } else if (array_key_exists('insertStaffRequest', $_POST)) {
                        handleInsertStaffRequest();
                    } else if (array_key_exists('insertEmployeeRequest', $_POST)) {
                        handleInsertEmployeeRequest();
                    } else if (array_key_exists('insertVolunteerRequest', $_POST)) {
                        handleInsertVolunteerRequest();
                    } else if (array_key_exists('deleteVolunteerRequest', $_POST)) {
                        handleDeleteVolunteerRequest();
                    } else if (array_key_exists('deleteVolunteerRequest', $_POST)) {
                        handleDeleteVolunteerRequest();
                    }

                    disconnectFromDB();
                }
            }

            // HANDLE ALL GET ROUTES
            // A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
            function handleGETRequest() {
                if (connectToDB()) {
                    if (array_key_exists('viewBranchRequest', $_GET)) {
                        handleViewBranchRequest();
                    } else if (array_key_exists('viewStaffRequest', $_GET)) {
                        handleViewStaffRequest();
                    } else if (array_key_exists('viewEmployeeRequest', $_GET)) {
                        handleViewEmployeeRequest();
                    } else if (array_key_exists('viewVolunteerRequest', $_GET)) {
                        handleViewVolunteerRequest();
                    } else if (array_key_exists('viewVolunteerPrizesRequest', $_GET)) {
                        handleViewVolunteerPrizesRequest();
                    } else if (array_key_exists('selectQueryRequest', $_GET)) {
                        handleSelectQueryRequest();
                    } else if (array_key_exists('aggregationByHavingRequest', $_GET)) {
                        aggregationByHavingRequest();
                    } else if (array_key_exists('nestedAggregationWithGroupByRequest', $_GET)) {
                        nestedAggregationWithGroupByRequest();
                    }



                    disconnectFromDB();
                }
            }
		?>

    </body>
</html>