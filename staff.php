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

        <h1>Animal Management</h1>

        <hr />

        <h2>Add Animal</h2>
        <form method="POST" action="staff.php">
            <input type="hidden" id="insertAnimalRequest" name="insertAnimalRequest">
                Animal ID: <input type="text" name="insAnimalID" maxlength="6"> <br />
                Animal Name: <input type="text" name="insAnimalName" maxlength="20"> <br />
                Arrival Date: <input type="text" name="insArrivalDate" maxlength="10"> <br />
                Gender: <input type="text" name="insGender" maxlength="10"> <br />
                Age: <input type="text" name="insAge" maxlength="2"> <br />
                Status: <input type="text" name="insStatus" maxlength="20"> <br />
                Branch Number: <input type="text" name="insBranchNum" maxlength="5"> <br />
                Applicant ID: <input type="text" name="insApplicantID" maxlength="8"> <br />
            <input type="submit" value="Add Animal" name="insertSubmit">
        </form>

        <h2>Add Cat</h2>
        <form method="POST" action="staff.php">
            <input type="hidden" id="insertCatRequest" name="insertCatRequest">
                Animal ID: <input type="text" name="insAnimalID" maxlength="6"> <br />
                Cat Breed: <input type="text" name="insCatBreed" maxlength="20"> <br />
            <input type="submit" value="Add Cat" name="insertSubmit">
        </form>

        <h2>Add Dog</h2>
        <form method="POST" action="staff.php">
            <input type="hidden" id="insertDogRequest" name="insertDogRequest">
                Animal ID: <input type="text" name="insAnimalID" maxlength="6"> <br />
                Dog Breed: <input type="text" name="insDogBreed" maxlength="20"> <br />
            <input type="submit" value="Add Dog" name="insertSubmit">
        </form>

        <hr />

        <h2>Adopt Animal</h2>
        <form method="POST" action="staff.php">
            <input type="hidden" id="insertAdoptAnimal" name="insertAdoptAnimal">
                Adopter Phone: <input type="text" name="insAdopterPhone" maxlength="12"> <br />
                Adopter Name: <input type="text" name="insAdopterName" maxlength="25"> <br />
                Adopter Address: <input type="text" name="insAdopterAddress" maxlength="80"> <br />
                Applicant ID: <input type="text" name="insApplicantID" maxlength="8"> <br />
                Animal ID: <input type="text" name="insAnimalID" maxlength="6"> <br />
            <input type="submit" value="Adopt Animal" name="insertSubmit">
        </form>

        <h2>Add Supporter</h2>
        <form method="POST" action="staff.php">
            <input type="hidden" id="insertSupporterRequest" name="insertSupporterRequest">
                Membership ID: <input type="text" name="insMemberID" maxlength="6"> <br />
                Supporter Name: <input type="text" name="insSupporterName" maxlength="20"> <br />
                Supporter Phone: <input type="text" name="insSupporterPhone" maxlength="20"> <br />
            <input type="submit" value="Add Supporter" name="insertSubmit">
        </form>
        
        <h2>Animal Socialization</h2>
        <form method="POST" action="staff.php">
            <input type="hidden" id="insertAnimalSocialization" name="insertAnimalSocialization">
                Animal ID: <input type="text" name="insAnimalID" maxlength="6"> <br />
                Membership ID: <input type="text" name="insMemberID" maxlength="6"> <br />
                Membership Address: <input type="text" name="insAddress" maxlength="80"> <br />
                Evaluation: <input type="text" name="insEvaluation" maxlength="80"> <br />
                Start Date: <input type="text" name="inStartDate" maxlength="10"> <br />
            <input type="submit" value="Add Animal Socialization" name="insertSubmit">
        </form>

        <hr />
        <p>Functions to view associated tables to make sure database working, can remove some later.</p>
        <h2>View Animals</h2>
        <form method="GET" action="staff.php">
            <input type="hidden" id="viewAnimalRequest" name="viewAnimalRequest">
            <input type="submit" value="View All" name="viewSubmit"></p>
        </form>

        <h2>View Cats</h2>
        <form method="GET" action="staff.php">
            <input type="hidden" id="viewCatRequest" name="viewCatRequest">
            <input type="submit" value="View All" name="viewSubmit"></p>
        </form>

        <h2>View Dogs</h2>
        <form method="GET" action="staff.php">
            <input type="hidden" id="viewDogRequest" name="viewDogRequest">
            <input type="submit" value="View All" name="viewSubmit"></p>
        </form>

        <h2>View Adopter Information</h2>
        <form method="GET" action="staff.php">
            <input type="hidden" id="viewAInfoRequest" name="viewAInfoRequest">
            <input type="submit" value="View All" name="viewSubmit"></p>
        </form>

        <h2>View Adopter Contact</h2>
        <form method="GET" action="staff.php">
            <input type="hidden" id="viewAContactRequest" name="viewAContactRequest">
            <input type="submit" value="View All" name="viewSubmit"></p>
        </form>

        <h2>View Supporters</h2>
        <form method="GET" action="staff.php">
            <input type="hidden" id="viewSupporterRequest" name="viewSupporterRequest">
            <input type="submit" value="View All" name="viewSubmit"></p>
        </form>

        <h2>View Foster Families</h2>
        <form method="GET" action="staff.php">
            <input type="hidden" id="viewFosterRequest" name="viewFosterRequest">
            <input type="submit" value="View All" name="viewSubmit"></p>
        </form>

        <h2>View Fosters</h2>
        <form method="GET" action="staff.php">
            <input type="hidden" id="viewSocializeRequest" name="viewSocializeRequest">
            <input type="submit" value="View All" name="viewSubmit"></p>
        </form>
        
        <h2>View Foster Periods</h2>
        <form method="GET" action="staff.php">
            <input type="hidden" id="viewFosterPeriodRequest" name="viewFosterPeriodRequest">
            <input type="submit" value="View All" name="viewSubmit"></p>
        </form>

        <h2>View Selected Animal Details</h2>
        <form method="POST" action="staff.php">
                <input type="hidden" id="viewAnimalProjRequest" name="viewAnimalProjRequest">
                <input type="checkbox" name="detail[]" value="AnimalID">Animal ID<br />
                <input type="checkbox" name="detail[]" value="AnimalName">Animal Name<br />
                <input type="checkbox" name="detail[]" value="Gender">Gender<br />
                <input type="checkbox" name="detail[]" value="Age">Age<br />
                <input type="checkbox" name="detail[]" value="Status">Status<br />
            <input type="submit" value="View All" name="insertSubmit"></p>
        </form>

        <hr />

        <?php

        include("connection.php");

        function handleInsertAnimalRequest() {
            global $db_conn;

            $tuple = array (
                ":bind1" => $_POST['insAnimalID'],
                ":bind2" => $_POST['insAnimalName'],
                ":bind3" => $_POST['insArrivalDate'],
                ":bind4" => $_POST['insGender'],
                ":bind5" => $_POST['insAge'],
                ":bind6" => $_POST['insStatus'],
                ":bind7" => $_POST['insBranchNum'],
                ":bind8" => $_POST['insApplicantID']
            );

            $alltuples = array (
                $tuple
            );

            executeBoundSQL("insert into Animal values (:bind1, :bind2, :bind3, :bind4, 
                                                        :bind5, :bind6, :bind7, :bind8)", $alltuples);
            OCICommit($db_conn);
        }

        function handleInsertCatRequest() {
            global $db_conn;

            $tuple = array (
                ":bind1" => $_POST['insAnimalID'],
                ":bind2" => $_POST['insCatBreed']
            );

            $alltuples = array (
                $tuple
            );

            executeBoundSQL("insert into Cat values (:bind1, :bind2)", $alltuples);
            OCICommit($db_conn);
        }

        function handleInsertDogRequest() {
            global $db_conn;

            $tuple = array (
                ":bind1" => $_POST['insAnimalID'],
                ":bind2" => $_POST['insDogBreed']
            );

            $alltuples = array (
                $tuple
            );

            executeBoundSQL("insert into Dog values (:bind1, :bind2)", $alltuples);
            OCICommit($db_conn);
        }

        //TO-DO: only allow status=shelter-caring to be adopted?
        function handleInsertAdoptAnimalRequest(){
            global $db_conn;

            $tuple = array (
                ":bind1" => $_POST['insAdopterPhone'],
                ":bind2" => $_POST['insAdopterName'],
                ":bind3" => $_POST['insAdopterAddress'],
                ":bind4" => $_POST['insApplicantID']
            );

            $alltuples = array (
                $tuple
            );

            $animal_ID = $_POST['insAnimalID'];
            $applicant_ID = $_POST['insApplicantID'];

            $result = executePlainSQL("SELECT * FROM AdopterContact WHERE applicantID='" . $applicant_ID . "'");
            $row = OCI_Fetch_Array($result, OCI_BOTH);

            if(empty($row)){
                executeBoundSQL("insert into AdopterInfo values (:bind1, :bind2, :bind3)", $alltuples);
                executeBoundSQL("insert into AdopterContact values (:bind4, :bind1)", $alltuples);
            }

            executePlainSQL("UPDATE Animal 
                                    SET applicantID='" . $applicant_ID . "', status='adopted' WHERE animalID='" . $animal_ID . "'");
            OCICommit($db_conn);
        }

        function handleInsertSupporterRequest(){
            global $db_conn;

            $tuple = array (
                ":bind1" => $_POST['insMemberID'],
                ":bind2" => $_POST['insSupporterName'],
                ":bind3" => $_POST['insSupporterPhone']
            );

            $alltuples = array (
                $tuple
            );

            executeBoundSQL("insert into Supporter values (:bind1, :bind2, :bind3)", $alltuples);
            OCICommit($db_conn);
        }

        // TO DO - Maybe calculate end date and add to foster period as well
        //TO-DO: only allow status=shelter-caring to be fostered?
        //TO-DO: check if start date exists before adding?
        function handleInsertAnimalSocializationRequest(){
            global $db_conn;

            $tuple = array (
                ":bind1" => $_POST['insAnimalID'],
                ":bind2" => $_POST['insMemberID'],
                ":bind3" => $_POST['insAddress'],
                ":bind4" => $_POST['insEvaluation'],
                ":bind5" => $_POST['insStartDate']
            );

            $alltuples = array (
                $tuple
            );

            //check if member is already a foster family, if not, add
            $member_ID = $_POST['insMemberID'];
            $check_foster = executePlainSQL("SELECT * FROM FosterFamily WHERE membershipID='" . $member_ID . "'");
            $row = OCI_Fetch_Array($check_foster, OCI_BOTH);

            if(empty($row)){
                executeBoundSQL("insert into FosterFamily values (:bind2, :bind3)", $alltuples);
            }//

            executeBoundSQL("insert into Socialize values (:bind1, :bind2, :bind4, :bind5)", $alltuples);
            executeBoundSQL("insert into FosterPeriod values (:bind5)", $alltuples);
            OCICommit($db_conn);
        }

        function handleViewAnimalRequest() {
            global $db_conn;

            $result = executePlainSQL("SELECT * FROM Animal");

            echo "<table>";
            echo "<tr><th>Animal ID</th>
                        <th>Name</th>
                        <th>Arrival Date</th>
                        <th>Gender</th>
                        <th>Age</th>
                        <th>Status</th>
                        <th>Branch Number</th>
                        <th>Applicant ID</th>
                        </tr>";

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

        function handleViewCatRequest() {
            global $db_conn;

            $result = executePlainSQL("SELECT * FROM Cat");

            echo "<table>";
            echo "<tr><th>Animal ID</th>
                        <th>Cat Breed</th>
                        </tr>";

            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row["0"] . "</td>
                            <td>" . $row["1"] . "</td>
                            </tr>";
            }

            echo "</table>";
        }

        function handleViewDogRequest() {
            global $db_conn;

            $result = executePlainSQL("SELECT * FROM Dog");

            echo "<table>";
            echo "<tr><th>Animal ID</th>
                        <th>Dog Breed</th>
                        </tr>";

            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row["0"] . "</td>
                            <td>" . $row["1"] . "</td>
                            </tr>";
            }

            echo "</table>";
        }

        function handleViewAdopterInfoRequest() {
            global $db_conn;

            $result = executePlainSQL("SELECT * FROM AdopterInfo");

            echo "<table>";
            echo "<tr><th>Adopter Phone</th>
                        <th>Adopter Name</th>
                        <th>Adopter Address</th>
                        </tr>";

            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row["0"] . "</td>
                            <td>" . $row["1"] . "</td>
                            <td>" . $row["2"] . "</td>
                            </tr>";
            }

            echo "</table>";
        }

        function handleViewAdopterContactRequest() {
            global $db_conn;

            $result = executePlainSQL("SELECT * FROM AdopterContact");

            echo "<table>";
            echo "<tr><th>Applicant ID</th>
                        <th>Adopter Phone</th>
                        </tr>";

            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row["0"] . "</td>
                            <td>" . $row["1"] . "</td>
                            </tr>";
            }

            echo "</table>";
        }

        function handleViewSupporterRequest() {
            global $db_conn;

            $result = executePlainSQL("SELECT * FROM Supporter");

            echo "<table>";
            echo "<tr><th>Membership ID</th>
                        <th>Supporter Name</th>
                        <th>Supporter Phone</th>
                        </tr>";

            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row["0"] . "</td>
                            <td>" . $row["1"] . "</td>
                            <td>" . $row["2"] . "</td>
                            </tr>";
            }

            echo "</table>";
        }

        function handleViewFosterFamilyRequest() {
            global $db_conn;

            $result = executePlainSQL("SELECT * FROM FosterFamily");

            echo "<table>";
            echo "<tr><th>Membership ID</th>
                        <th>Supporter Address</th>
                        </tr>";

            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row["0"] . "</td>
                            <td>" . $row["1"] . "</td>
                            </tr>";
            }

            echo "</table>";
        }

        function handleViewSocializeRequest() {
            global $db_conn;

            $result = executePlainSQL("SELECT * FROM Socialize");

            echo "<table>";
            echo "<tr><th>Animal ID</th>
                        <th>Membership ID</th>
                        <th>Evaluation</th>
                        <th>Start Date</th>
                        </tr>";

            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row["0"] . "</td>
                            <td>" . $row["1"] . "</td>
                            <td>" . $row["2"] . "</td>
                            <td>" . $row["3"] . "</td>
                            </tr>";
            }

            echo "</table>";
        }

        function handleViewFosterPeriodRequest() {
            global $db_conn;

            $result = executePlainSQL("SELECT * FROM FosterPeriod");

            echo "<table>";
            echo "<tr><th>Start Date</th>
                        <th>End Date</th>
                        </tr>";

            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row["0"] . "</td>
                            <td>" . $row["1"] . "</td>
                            </tr>";
            }

            echo "</table>";
        }

        function handleViewAnimalProjRequest() {
            global $db_conn;

            $array = $_POST['detail'];
            $attributes = implode(',', $array);
            $result = executePlainSQL("SELECT " . $attributes . " FROM Animal");
            $columns = implode('</th><th>', $array);
            
            echo "<table>";
            echo "<tr><th>" . $columns . "</th></tr>";

            while ($row = OCI_Fetch_Array($result, OCI_BOTH|OCI_RETURN_NULLS)) {
                echo "<tr><td>" . $row["0"] . "</td>
                            <td>" . $row["1"] . "</td>
                            <td>" . $row["2"] . "</td>
                            <td>" . $row["3"] . "</td>
                            <td>" . $row["4"] . "</td>
                            </tr>";
            }

            echo "</table>";

        }


        // HANDLE ALL POST ROUTES
        // A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
        function handlePOSTRequest() {
            if (connectToDB()) {
                if (array_key_exists('insertAnimalRequest', $_POST)) {
                    handleInsertAnimalRequest();
                } else if (array_key_exists('insertCatRequest', $_POST)) {
                    handleInsertCatRequest();
                } else if (array_key_exists('insertDogRequest', $_POST)) {
                    handleInsertDogRequest();
                }else if(array_key_exists('insertAdoptAnimal', $_POST)){
                    handleInsertAdoptAnimalRequest();
                } else if(array_key_exists('insertSupporterRequest', $_POST)){
                    handleInsertSupporterRequest();
                } else if(array_key_exists('insertAnimalSocialization', $_POST)){
                    handleInsertAnimalSocializationRequest();
                } else if(array_key_exists('viewAnimalProjRequest', $_POST)) {
                    handleViewAnimalProjRequest();
                }

                disconnectFromDB();
            }
        }

        // HANDLE ALL GET ROUTES
        // A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
        function handleGETRequest() {
            if (connectToDB()) {
                if (array_key_exists('viewAnimalRequest', $_GET)) {
                    handleViewAnimalRequest();
                } else if(array_key_exists('viewCatRequest', $_GET)) {
                    handleViewCatRequest();
                } else if(array_key_exists('viewDogRequest', $_GET)) {
                    handleViewDogRequest();
                } else if(array_key_exists('viewAInfoRequest', $_GET)) {
                    handleViewAdopterInfoRequest();
                } else if(array_key_exists('viewAContactRequest', $_GET)) {
                    handleViewAdopterContactRequest();
                } else if(array_key_exists('viewSupporterRequest', $_GET)) {
                    handleViewSupporterRequest();
                } else if(array_key_exists('viewFosterRequest', $_GET)) {
                    handleViewFosterFamilyRequest();
                } else if(array_key_exists('viewSocializeRequest', $_GET)) {
                    handleViewSocializeRequest();
                } else if(array_key_exists('viewFosterPeriodRequest', $_GET)) {
                    handleViewFosterPeriodRequest();
                }

                disconnectFromDB();
            }
        }

		?>

    </body>
</html>