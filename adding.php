<?php           
				session_start();
				echo $_SESSION['pseudo'];
				include("ConnectDB.php");                    

                if(isset($_FILES['picfile']) AND isset($_POST['picname']) AND isset($_POST['picdate']) AND isset($_POST['picplace'])){
                	
                	//setup variables
                    $picfilename = $_FILES['picfile']['name'];
                    $picname=$_POST['picname'];
                    $picdate=$_POST['picdate'];
                    $picplace=$_POST['picplace'];
                    $picusername=$_SESSION['pseudo'];
                    if(empty($_POST['piccomment'])) $piccomment="";
                    else $piccomment=$_POST['piccomment'];
                    

                    //push BDD
                    $requete= "INSERT INTO `picture` (`pic_name`, `pic_date`, `pic_comment`, `pic_user`, `pic_place`) VALUES ('$picname', '$picdate', '$piccomment', '$picusername', '$picplace')";
                    $result=mysqli_query($connexion,$requete);
                    if(!$result){
                    	echo mysqli_errno($connexion) . ": " . mysqli_error($connexion). "\n";
                    	die();
                    }



                    //upload image sur PC
                    $target_dir = "posts/";
					$target_file = $target_dir . basename($_FILES["picfile"]["name"]);

					$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

					$requete2= "SELECT * FROM picture";
					$result2= mysqli_query($connexion,$requete2);

					
					
					echo "<br>";
					
					while ($id = mysqli_fetch_assoc($result2)) {
						$target_file = $id['pic_id'].".jpg";
					}

					
					echo "NOUVEAU NOM OUAIS".$target_file;
					if (move_uploaded_file($_FILES["picfile"]["tmp_name"], "posts/".$target_file)) {
				    echo "The file has been uploaded.";
				    }
				    

                }
                header("Location:menu.php");


?>	