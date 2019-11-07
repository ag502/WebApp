<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Grade Store</title>
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/labResources/gradestore.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		
		<?php
		# Ex 4 : 
		# Check the existence of each parameter using the PHP function 'isset'.
		# Check the blankness of an element in $_POST by comparing it to the empty string.
		# (can also use the element itself as a Boolean test!)
        if (!isset($_POST["Name"]) || !isset($_POST["ID"]) || !isset($_POST["course"]) || !isset($_POST["grade"]) || !isset($_POST["credit-card-text"]) || !isset($_POST["credit-card-radio"])) {?>

		<!-- Ex 4 :
			Display the below error message :-->
            <h1>Sorry</h1>
            <p>You didn't provide a valid name. <a href = "./gradestore.html">Try again?</a></p>


		<?php
		# Ex 5 :
		# Check if the name is composed of alphabets, dash(-), ora single white space.
		 } elseif (!preg_match("/^[a-z]+[a-z\s-]*[a-z]*$/i", $_POST["Name"])) {
		?>


		<!-- Ex 5 :
			Display the below error message : -->
			<h1>Sorry</h1>
			<p>You didn't provide a valid name. <a href = "./gradestore.html">Try again?</a></p>

		<?php
		# Ex 5 :
		# Check if the credit card number is composed of exactly 16 digits.
		# Check if the Visa card starts with 4 and MasterCard starts with 5.
		} elseif (($_POST["credit-card-radio"] === "visa" && !preg_match("/^4\d{15}/", $_POST["credit-card-text"])) ||
            (($_POST["credit-card-radio"] === "masterCard" && !preg_match("/^5\d{15}/", $_POST["credit-card-text"])))) {
		?>

		<!-- Ex 5 :
			Display the below error message : -->
			<h1>Sorry</h1>
			<p>You didn't provide a valid credit card number. <a href = "./gradestore.html">Try again?</a></p>


		<?php
		# if all the validation and check are passed
		} else {
		?>



		<!-- Ex 2: display submitted data -->
        <?php
            $name = $_POST["Name"];
            $id = $_POST["ID"];
            $course =  $_POST["course"];
            $grade = $_POST["grade"];
            $credit_card_num = $_POST["credit-card-text"];
            $credit_card_category = $_POST["credit-card-radio"];
        ?>

        <h1>Thanks, looser!</h1>
        <p>Your information has been recorded.</p>
        <ul>
            <li>Name: <?= $name ?> </li>
            <li>ID: <?= $id ?> </li>
            <!-- use the 'processCheckbox' function to display selected courses -->
            <li>Course: <?= processCheckbox($course)?> </li>
            <li>Grade: <?= $grade ?></li>
            <li>Credit: <?= $credit_card_num ?> (<?= $credit_card_category ?>)</li>
        </ul>

		<!-- Ex 3 : -->

		<?php
			$filename = "loosers.txt";
			/* Ex 3: 
			 * Save the submitted data to the file 'loosers.txt' in the format of : "name;id;cardnumber;cardtype".
			 * For example, "Scott Lee;20110115238;4300523877775238;visa"
			 */
			file_put_contents($filename, $name . ";" . $id . ";" . $credit_card_num . ";" . $credit_card_category . "\n", FILE_APPEND);
			$text = file_get_contents($filename);
        ?>
		
		<!-- Ex 3: Show the complete contents of "loosers.txt".
			 Place the file contents into an HTML <pre> element to preserve whitespace -->
            <p>Here are all the loosers who have submitted here:</p>
            <pre><?= $text ?></pre>

		
		<?php
		}
		?>
		
		<?php
			/* Ex 2: 
			 * Assume that the argument to this function is array of names for the checkboxes ("cse326", "cse107", "cse603", "cin870")
			 * 
			 * The function checks whether the checkbox is selected or not and 
			 * collects all the selected checkboxes into a single string with comma separation.
			 * For example, "cse326, cse603, cin870"
			 */
			function processCheckbox($names){
			    $temp = Array();
			    for($i = 0; $i < count($names); $i++) {
			        $temp[$i] = $names[$i];
                }
			    return implode(', ', $temp);
            }
		?>
		
	</body>
</html>
