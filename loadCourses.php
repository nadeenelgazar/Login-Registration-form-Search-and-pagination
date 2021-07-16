<html><link rel="stylesheet" href="style.css">
</html>
<?php

	include 'dbConfig.php';
	$coursesNewCnt =$_POST['CourseNewCount'];
	$flag=$_POST['newflag'];
	$searchvalue=$_POST['newsearch'];
		if($flag == 1){

		$sql="select course_name,course_description ,department_name ,professor_name from course ,department,
		professor where course.department_id=department.department_id and course.professor_id = professor.professor_id
		limit $coursesNewCnt";

		$result=mysqli_query($conn,$sql);
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
			echo"no";
		}
	}
	else{

	 $sql="select course_name ,course_description,department_name,professor_name from course ,department,professor
 where course.department_id=department.department_id 
		and course.professor_id = professor.professor_id
		and ((replace (course_name,' ','')  LIKE '%".$searchvalue."%' or course_name LIKE '%".$searchvalue."%' )
		or(replace (course_description,' ','')  LIKE '%".$searchvalue."%' or course_description LIKE '%".$searchvalue."%')
		or(replace (department_name,' ','')  LIKE '%".$searchvalue."%' or department_name LIKE '%".$searchvalue."%')
		or(replace (professor_name,' ','')  LIKE '%".$searchvalue."%' or professor_name LIKE '%".$searchvalue."%'))
		limit $coursesNewCnt";
		

		$result=mysqli_query($conn,$sql);
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
			echo"no";
		}
	}
	
?>