<?php include('header.php'); ?>





	<!-- this is for donor registraton -->
	<div class="recipient_reg" style="background-color:#272327;">
		<h3 class="text-center" style="background-color:#272327;color: #fff;">Patient Registration</h3>

		<div class="formstyle" style="float: right;padding:25px;border: 1px solid lightgrey;margin-right:415px; margin-bottom:30px;background-color:#f3f3f8;color:#141313;">
		<form enctype="multipart/form-data" method="post" class="text-center">
			 <div class="col-md-12">
				  
			 		<label>
						Your Name: <input type="text" name="name" value="" placeholder="Full name" required>
					</label><br><br>

					<label>
						Age: <input type="number" name="age"  placeholder="age" pattern="[0-9]{2,2}" title="please enter only  numbers between 2 to 2 for age"/>
					</label><br><br>
					<label>
						Mobile: <input type="number" name="contact"  placeholder="contact no" required="required" pattern="[0-9]{10,11}" title="please enter only numbers between 10 to 11 for mobile no."/>
					</label><br><br>
 					
 					<label>
						Address: <input type="text" name="address" value="" placeholder="address">
					</label><br><br>
					<label>
						Blood Group: <select name="bgroup" required>
										<option value="">-select-</option>
										<option value="O+">O+</option>
										<option value="O-">O-</option>
										<option value="AB+">AB+</option>
										<option value="AB-">AB-</option>
										<option value="A+">A+</option>
										<option value="A-">A-</option>
										<option value="B+">B+</option>
										<option value="B-">B-</option>
									</select>
					</label><br><br>
					<label>
						Email: <input type="email" name="email"  value="" placeholder="email" required>
					</label><br><br>
					<label>
						Password: <input type="password" name="password"  value="" placeholder="password" required>
					</label><br><br>
					
					
					<button name="submit" type="submit" style="margin-left:60px;width: 85px;border-radius: 3px;">Register</button> <br>
				
			</div>	<!-- col-md-12 -->


				</form>
			</div>




	</div>
	
	



	
	
 <?php include('footer.php'); ?>


	
	</div><!--  containerFluid Ends -->




	<script src="js/bootstrap.min.js"></script>


	 <!-- validation and insertion -->


				<?php
						// $key = md5("australia");
						// $salt = md5("australia");

						// function encrypt($string,$key){
						// 	$string = rtrim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $string, MCRYPT_MODE_ECB)));
							
						// 	return $string;

						// }

						include('config.php');
						include('encrypt1.php');
						if(isset($_POST['submit'])){

							$sql1 = "SELECT * FROM patient WHERE email='".$_POST["email"]."' ";
	             		    $result = $conn->query($sql1);	
	             		    if ($result->num_rows > 0) {
				                  echo "<script>alert('Sorry, user already exist!');</script>";
				             }
							else{
							
								// string 'v6KhzRACVfUCyJKCGQF4VNoPXYfeFY+/pyRZcixz4x/0jLJOo+RbeGBTiZudMLEO7aRvg44HRecC' (length=76)
								

								$sql = "INSERT INTO patient (name,age,contact,address,bgroup,email, password)
								VALUES ('" . encrypt($_POST["name"],$key) ."','" . encrypt($_POST["age"],$key) . "','" . encrypt($_POST["contact"],$key) . "','" . encrypt($_POST["address"],$key) . "','" . encrypt($_POST["bgroup"],$key) . "', '" . $_POST["email"] . "','" . $_POST["password"] . "' )";

								if ($conn->query($sql) === TRUE) {
									echo "string";
								    echo "<script>location.replace('patient_success_msg.php');</script>";
								} else {
								    echo "<script>alert('There was an Error')<script>" . $sql . "<br>" . $conn->error;
								}

							$conn->close();
						}
					}
				?> 



	<!-- validation and insertion End-->



</body>
</html>