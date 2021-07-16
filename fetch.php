<html><link rel="stylesheet" href="style.css">
</html>
<?php

	include 'dbConfig.php';
	


$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 
 $query="select course_name ,course_description,department_name,professor_name from course ,department,professor
 where course.department_id=department.department_id 
		and course.professor_id = professor.professor_id
		and ((replace (course_name,' ','')  LIKE '%".$search."%' or course_name LIKE '%".$search."%' )
		or(replace (course_description,' ','')  LIKE '%".$search."%' or course_description LIKE '%".$search."%')
		or(replace (department_name,' ','')  LIKE '%".$search."%' or department_name LIKE '%".$search."%')
		or(replace (professor_name,' ','')  LIKE '%".$search."%' or professor_name LIKE '%".$search."%'))
		limit 5";
		
}
else
{
 $query="";
}
$result = mysqli_query($conn, $query);
	if(mysqli_num_rows($result)>0)
		{ while($row = mysqli_fetch_assoc($result)){
			echo"<p>";
			echo"<label>";
			echo"course description: ";
			echo"</label>";
			echo$row['course_description'];
			echo"<br>";
			echo"<label>";
			echo"course name:";
			echo"</label>";
			echo$row['course_name'];
			echo"<br>";
			echo"<label>";
			echo"department name:";
			echo"</label>";
			echo$row['department_name'];
			echo"<br>";
			echo"<label>";
			echo"professor name:";
			echo"</label>";
			echo$row['professor_name'];
			echo"<br>";
			echo"</p>";
			
		}	
		}else{
			echo"no data found";
		}

?>