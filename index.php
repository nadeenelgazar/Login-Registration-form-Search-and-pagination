<?php
	include 'dbConfig.php';
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<script src ="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
	  var flag = 1;
	  var searchvalue="";
  $(document).ready(function(){
	  var coursesCnt = 5;
	  
	  $("#loadMore").click(function(){
		  coursesCnt=coursesCnt+5;
		  console.log(searchvalue);
		 $("#courses").load("loadCourses.php", {
			CourseNewCount : coursesCnt,
			newflag : flag,
			newsearch:searchvalue
		 });
	  });
  });

$(document).ready(function(){

 function load_data(query)
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#courses').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search.length >=3)
  {
   load_data(search);
   flag=0;
   	searchvalue=search;
	
  }
 });

});
</script>

</head>

<body>
 <div >
   <br />
   <h2 align="center">COURSES</h2><br />
     <label>Search</label>
     <input type="text"  id="search_text" placeholder="Search" />
   <br />
  </div> 
<div id="courses">
	<?php
		$sql="select course_name,course_description ,department_name ,professor_name from course ,department,
		professor where course.department_id=department.department_id and course.professor_id = professor.professor_id
		limit 5";
		
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
	?>

</div>
<div>
<button id="loadMore">load more</button>

</body>
</html>