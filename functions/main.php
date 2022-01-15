<?php 
function rowCounts($query){		
	return mysqli_num_rows($query);
}
function getAdminInfo($conn, $username){
		$sql = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username'");
		$rw = mysqli_fetch_array($sql);
		return $rw;
}
function getAdminInfoByid($conn, $adminid){
		$sql = mysqli_query($conn, "SELECT * FROM admin WHERE admin_id='$adminid'");
		$rw = mysqli_fetch_array($sql);
		return $rw;
}
function getUserInfo($conn, $username){
		$sql = mysqli_query($conn, "SELECT * FROM user WHERE user_email='$username'");
		$rw = mysqli_fetch_array($sql);
		return $rw;
}
function getUserInfoByid($conn, $userid){
		$sql = mysqli_query($conn, "SELECT * FROM user WHERE user_id='$userid'");
		$rw = mysqli_fetch_array($sql);
		return $rw;
}
function userRegistration($conn){
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$cpassword = $_POST["cpassword"];

	if(rowCounts(mysqli_query($conn, "SELECT * FROM user WHERE user_email='$email'"))==0 && rowCounts(mysqli_query($conn, "SELECT * FROM admin WHERE username='$email'"))==0){
		if($password==$cpassword){
			if(mysqli_query($conn,"INSERT INTO user(user_email,first_name,last_name,is_valid,password)VALUES('$email','$firstname','$lastname','0','$cpassword')")){
				return "Send for Admin Approval";
			}else{
				return "Error!";
			}
		}else{
			return "Password Mismatch!";
		}
	}else{
		return "Email already in database!";
	}

}
function login($conn){
	$username = $_POST["username"];
	$password = $_POST["password"];

	if(rowCounts(mysqli_query($conn, "SELECT * FROM admin WHERE username='$username' AND password='$password'"))==1){
		$admininfo = getAdminInfo($conn, $username);
		$_SESSION['admin_id'] = $admininfo['admin_id'];
		header('location:admin-dashboard.php?menu=dashboard');
	}else if(rowCounts(mysqli_query($conn, "SELECT * FROM user WHERE user_email='$username' AND password='$password' AND is_valid='1'"))==1){
		$userinfo = getUserInfo($conn, $username);
		$_SESSION['user_id'] = $userinfo['user_id'];
		header('location:dashboard.php?menu=dashboard');
	}
	else if(rowCounts(mysqli_query($conn, "SELECT * FROM user WHERE user_email='$username' AND password='$password' AND is_valid='0'"))==1){
		return "Admin Not Approved Yet";
	}
	else{
		return "Please Enter Username and Password Correctly";
	}
}
function getAllBooks($conn){
//	$sql = mysqli_query($conn, "SELECT * FROM book");
//	return $sql;

    $results_per_page = 10;  

    $query = "SELECT * FROM book";  
    $result = mysqli_query($conn, $query);  
    $number_of_result = mysqli_num_rows($result);  

    $number_of_page = ceil ($number_of_result / $results_per_page);  
 
    if (!isset ($_GET['page']) ) {  
        $page = 1;  
    } else {  
        $page = $_GET['page'];          
    }  
 
    $page_first_result = ($page-1) * $results_per_page;  
   
    $query = "SELECT * FROM book LIMIT " . $page_first_result . ',' . $results_per_page;  
    $result = mysqli_query($conn, $query);  

    $pagination .= '<ul class="pagination">';
      if($page>=2){   
             $pagination .= "<li><a href='dashboard.php?menu=books&page=".($page-1)."'>  Prev </a></li>";   
        }            
    for($i = 1; $i<= $number_of_page; $i++) {  
    	  if ($i == $page) { 
    	  	   $pagination .= '<li class="active"><a href = "dashboard.php?menu=books&page=' . $i . '">' . $i . ' </a></li>';  
    	  	}else{
    	  		 $pagination .= '<li><a href = "dashboard.php?menu=books&page=' . $i . '">' . $i . ' </a></li>'; 
    	  	}   
    }  
     if($page<$number_of_page){   
             $pagination .= "<li><a href='dashboard.php?menu=books&page=".($page+1)."'>  Next </a></li>";   
        }   
     $pagination .= '</ul>';	

    return array($result, $pagination);
}
function getBarrowBooksbyId($conn,$bookid){
	$sql = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM borrowing WHERE book_id='$bookid' AND status='Borrowed'"));
	return $sql;
}
function getBarrowedBooksbyUser($conn,$userid){
	$sql = mysqli_query($conn, "SELECT book.*,borrowing.* FROM book INNER JOIN borrowing ON book.book_id=borrowing.book_id WHERE borrowing.status='Borrowed' AND borrowing.student_no='$userid'");
	return $sql;
}
function BookReturn($conn){
	$userid = $_POST["userid"];
	$bookid = $_POST["bookid"];
	$sql = mysqli_query($conn, "UPDATE borrowing set status='Returned' where book_id='$bookid' AND student_no='$userid'");
	if($sql){
		return "Sucess";
	}else{
		return "Error!";
	}
	
}
function BookBorrow($conn){
	$userid = $_POST["userid"];
	$bookid = $_POST["bookid"];
	if(rowCounts(mysqli_query($conn, "SELECT * FROM borrowing where book_id='$bookid' AND student_no='$userid'"))==1){
		$sql = mysqli_query($conn, "UPDATE borrowing set status='Borrowed' where book_id='$bookid' AND student_no='$userid'");
	}else{
		$sql = mysqli_query($conn,"INSERT INTO borrowing(book_id,student_no,status)VALUES('$bookid','$userid','Borrowed')");
	}
}
function searchBooks($conn){
	$searchinput = $_POST["searchinput"];
	//$sql = mysqli_query($conn, "SELECT * FROM book WHERE book_title LIKE '{$searchinput}%'");
	//return $sql;

	 $results_per_page = 10;  

    $query = "SELECT * FROM book WHERE book_title LIKE '{$searchinput}%'";  
    $result = mysqli_query($conn, $query);  
    $number_of_result = mysqli_num_rows($result);  

    $number_of_page = ceil ($number_of_result / $results_per_page);  
 
    if (!isset ($_GET['page']) ) {  
        $page = 1;  
    } else {  
        $page = $_GET['page'];          
    }  
 
    $page_first_result = ($page-1) * $results_per_page;  
   
    $query = "SELECT * FROM book WHERE book_title LIKE '{$searchinput}%' LIMIT " . $page_first_result . ',' . $results_per_page;  
    $result = mysqli_query($conn, $query);  

    $pagination .= '<ul class="pagination">';
      if($page>=2){   
             $pagination .= "<li><a href='dashboard.php?menu=books&page=".($page-1)."'>  Prev </a></li>";   
        }            
    for($i = 1; $i<= $number_of_page; $i++) {  
    	  if ($i == $page) { 
    	  	   $pagination .= '<li class="active"><a href = "dashboard.php?menu=books&page=' . $i . '">' . $i . ' </a></li>';  
    	  	}else{
    	  		 $pagination .= '<li><a href = "dashboard.php?menu=books&page=' . $i . '">' . $i . ' </a></li>'; 
    	  	}   
    }  
     if($page<$number_of_page){   
             $pagination .= "<li><a href='dashboard.php?menu=books&page=".($page+1)."'>  Next </a></li>";   
        }   
     $pagination .= '</ul>';	

    return array($result, $pagination);
}

function getBooksCounts($conn){
	$sql = rowCounts(mysqli_query($conn, "SELECT * FROM book"));
	return $sql;
}
function getBorrowBooksCounts($conn){
	$userid = $_SESSION['user_id'];
	$sql = rowCounts(mysqli_query($conn, "SELECT * FROM borrowing WHERE status='Borrowed'"));
	return $sql;
}
function getUsersCounts($conn){
	$sql = rowCounts(mysqli_query($conn, "SELECT * FROM user WHERE is_valid='1'"));
	return $sql;
}
function getPendingUsersCounts($conn){
	$sql = rowCounts(mysqli_query($conn, "SELECT * FROM user WHERE is_valid='0'"));
	return $sql;
}
function getAllUsers($conn){
	$sql = mysqli_query($conn, "SELECT * FROM user");
	return $sql;
}
function updateUser($conn,$userid){
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	//$email = $_POST["email"];
	$password = $_POST["password"];
	$cpassword = $_POST["cpassword"];

	
		if($password==$cpassword){
			if(mysqli_query($conn, "UPDATE user set first_name='$firstname',last_name='$lastname',password='$cpassword' where user_id='$userid'")){
				return "Sucess";
			
			}else{
				return "Error!";
			}
		}else{
			return "Password Mismatch!";
		}
	
}
function deleteUser($conn, $userid){
				$qry = mysqli_query($conn, "DELETE FROM user WHERE user_id='$userid'");	
    			if($qry){
    				return  "User deleted!";
    			}else{
    				return  "Error!";
    			}
}
function savebook($conn){
	$book_title = $_POST["book_title"];
	$book_author = $_POST["book_author"];
	$book_category = $_POST["book_category"];
	$time_period = $_POST["time_period"];
	$book_description = $_POST["book_description"];

	if(rowCounts(mysqli_query($conn, "SELECT * FROM book WHERE book_title='$book_title'"))==0){
			if(mysqli_query($conn,"INSERT INTO book(book_title,book_author,book_category,time_period,book_description)VALUES('$book_title','$book_author','$book_category','$time_period','$book_description')")){
				return "Book Saved!";
			}else{
				return "Error!";
			}
	}else{
		return "Book already in database!";
	}
}

function getBookByid($conn, $bookid){
		$sql = mysqli_query($conn, "SELECT * FROM book WHERE book_id='$bookid'");
		$rw = mysqli_fetch_array($sql);
		return $rw;
}
function updatebook($conn,$bookid){	
	$book_author = $_POST["book_author"];
	$book_category = $_POST["book_category"];
	$time_period = $_POST["time_period"];
	$book_description = $_POST["book_description"];

	if(mysqli_query($conn, "UPDATE book set book_author='$book_author',book_category='$book_category',time_period='$time_period',book_description='$book_description' where book_id='$bookid'")){
			return "Sucess";
			}else{
				return "Error!";
			}

}
function deleteBook($conn, $bookid){
	$qry = mysqli_query($conn, "DELETE FROM book WHERE book_id='$bookid'");	
    	if($qry){
    		return  "Book deleted!";
    	}else{
    		return  "Error!";
    	}
}

function getBarrowedBooks($conn){
	//$sql = mysqli_query($conn, "SELECT book.*,borrowing.*,user.* FROM book INNER JOIN borrowing ON book.book_id=borrowing.book_id INNER JOIN user ON borrowing.student_no=user.user_id WHERE borrowing.status='Borrowed'");
	//return $sql;
	    $results_per_page = 10;  

    $query = "SELECT book.*,borrowing.*,user.* FROM book INNER JOIN borrowing ON book.book_id=borrowing.book_id INNER JOIN user ON borrowing.student_no=user.user_id WHERE borrowing.status='Borrowed'";  
    $result = mysqli_query($conn, $query);  
    $number_of_result = mysqli_num_rows($result);  

    $number_of_page = ceil ($number_of_result / $results_per_page);  
 
    if (!isset ($_GET['page']) ) {  
        $page = 1;  
    } else {  
        $page = $_GET['page'];          
    }  
 
    $page_first_result = ($page-1) * $results_per_page;  
   
    $query = "SELECT book.*,borrowing.*,user.* FROM book INNER JOIN borrowing ON book.book_id=borrowing.book_id INNER JOIN user ON borrowing.student_no=user.user_id WHERE borrowing.status='Borrowed' LIMIT " . $page_first_result . ',' . $results_per_page;  
    $result = mysqli_query($conn, $query);  

    $pagination .= '<ul class="pagination">';
      if($page>=2){   
             $pagination .= "<li><a href='admin-dashboard.php?menu=borrowed-books&page=".($page-1)."'>  Prev </a></li>";   
        }            
    for($i = 1; $i<= $number_of_page; $i++) {  
    	  if ($i == $page) { 
    	  	   $pagination .= '<li class="active"><a href = "admin-dashboard.php?menu=borrowed-books&page=' . $i . '">' . $i . ' </a></li>';  
    	  	}else{
    	  		 $pagination .= '<li><a href = "admin-dashboard.php?menu=borrowed-books&page=' . $i . '">' . $i . ' </a></li>'; 
    	  	}   
    }  
     if($page<$number_of_page){   
             $pagination .= "<li><a href='admin-dashboard.php?menu=borrowed-books&page=".($page+1)."'>  Next </a></li>";   
        }   
     $pagination .= '</ul>';	

    return array($result, $pagination);
}
function getPendingUsers($conn){
	//$sql = mysqli_query($conn, "SELECT * FROM user WHERE is_valid='0'");
	//return $sql;
	$results_per_page = 10;  

    $query = "SELECT * FROM user WHERE is_valid='0'";  
    $result = mysqli_query($conn, $query);  
    $number_of_result = mysqli_num_rows($result);  

    $number_of_page = ceil ($number_of_result / $results_per_page);  
 
    if (!isset ($_GET['page']) ) {  
        $page = 1;  
    } else {  
        $page = $_GET['page'];          
    }  
 
    $page_first_result = ($page-1) * $results_per_page;  
   
    $query = "SELECT * FROM user WHERE is_valid='0' LIMIT " . $page_first_result . ',' . $results_per_page;  
    $result = mysqli_query($conn, $query);  

    $pagination .= '<ul class="pagination">';
      if($page>=2){   
             $pagination .= "<li><a href='admin-dashboard.php?menu=pending-users&page=".($page-1)."'>  Prev </a></li>";   
        }            
    for($i = 1; $i<= $number_of_page; $i++) {  
    	  if ($i == $page) { 
    	  	   $pagination .= '<li class="active"><a href = "admin-dashboard.php?menu=pending-users&page=' . $i . '">' . $i . ' </a></li>';  
    	  	}else{
    	  		 $pagination .= '<li><a href = "admin-dashboard.php?menu=pending-users&page=' . $i . '">' . $i . ' </a></li>'; 
    	  	}   
    }  
     if($page<$number_of_page){   
             $pagination .= "<li><a href='admin-dashboard.php?menu=pending-users&page=".($page+1)."'>  Next </a></li>";   
        }   
     $pagination .= '</ul>';	

    return array($result, $pagination);
}
function getApprovedUsers($conn){
	//$sql = mysqli_query($conn, "SELECT * FROM user WHERE is_valid='1'");
	//return $sql;
	$results_per_page = 10;  

    $query = "SELECT * FROM user WHERE is_valid='1'";  
    $result = mysqli_query($conn, $query);  
    $number_of_result = mysqli_num_rows($result);  

    $number_of_page = ceil ($number_of_result / $results_per_page);  
 
    if (!isset ($_GET['page']) ) {  
        $page = 1;  
    } else {  
        $page = $_GET['page'];          
    }  
 
    $page_first_result = ($page-1) * $results_per_page;  
   
    $query = "SELECT * FROM user WHERE is_valid='1' LIMIT " . $page_first_result . ',' . $results_per_page;  
    $result = mysqli_query($conn, $query);  

    $pagination .= '<ul class="pagination">';
      if($page>=2){   
             $pagination .= "<li><a href='admin-dashboard.php?menu=all-users&page=".($page-1)."'>  Prev </a></li>";   
        }            
    for($i = 1; $i<= $number_of_page; $i++) {  
    	  if ($i == $page) { 
    	  	   $pagination .= '<li class="active"><a href = "admin-dashboard.php?menu=all-users&page=' . $i . '">' . $i . ' </a></li>';  
    	  	}else{
    	  		 $pagination .= '<li><a href = "admin-dashboard.php?menu=all-users&page=' . $i . '">' . $i . ' </a></li>'; 
    	  	}   
    }  
     if($page<$number_of_page){   
             $pagination .= "<li><a href='admin-dashboard.php?menu=all-users&page=".($page+1)."'>  Next </a></li>";   
        }   
     $pagination .= '</ul>';	

    return array($result, $pagination);
}

function AllBooks($conn){
//	$sql = mysqli_query($conn, "SELECT * FROM book");
//	return $sql;

    $results_per_page = 10;  

    $query = "SELECT * FROM book";  
    $result = mysqli_query($conn, $query);  
    $number_of_result = mysqli_num_rows($result);  

    $number_of_page = ceil ($number_of_result / $results_per_page);  
 
    if (!isset ($_GET['page']) ) {  
        $page = 1;  
    } else {  
        $page = $_GET['page'];          
    }  
 
    $page_first_result = ($page-1) * $results_per_page;  
   
    $query = "SELECT * FROM book LIMIT " . $page_first_result . ',' . $results_per_page;  
    $result = mysqli_query($conn, $query);  

    $pagination .= '<ul class="pagination">';
      if($page>=2){   
             $pagination .= "<li><a href='admin-dashboard.php?menu=all-books&page=".($page-1)."'>  Prev </a></li>";   
        }            
    for($i = 1; $i<= $number_of_page; $i++) {  
    	  if ($i == $page) { 
    	  	   $pagination .= '<li class="active"><a href = "admin-dashboard.php?menu=all-books&page=' . $i . '">' . $i . ' </a></li>';  
    	  	}else{
    	  		 $pagination .= '<li><a href = "admin-dashboard.php?menu=all-books&page=' . $i . '">' . $i . ' </a></li>'; 
    	  	}   
    }  
     if($page<$number_of_page){   
             $pagination .= "<li><a href='admin-dashboard.php?menu=all-books&page=".($page+1)."'>  Next </a></li>";   
        }   
     $pagination .= '</ul>';	

    return array($result, $pagination);
}

?>