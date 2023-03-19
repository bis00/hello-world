
<?php
$ip=$_SERVER['REMOTE_ADDR'];//GETTING THE IP ADDRESS OF USER
if(filter_var($ip,FILTER_VALIDATE_IP)){
    echo"";
}
else{
    echo"";
}
$agent=$_SERVER['HTTP_USER_AGENT'];//GETTING THE AGEN THAT MEANS FROM WHICH BROWSER PERSON IS TRYING TO ACCESS THE PAGE
$uri=$_SERVER['REQUEST_URI'];//TO GET THE PAGE VISITED
$time=date('Y-m-d H:i:s');//tracking the time when user visited the page
//creating the database to store the tracking varible 
$servername="localhost";
$username="root";
$password="mainali@##";
$dbname="tracker";
$conn=mysqli_connect($servername,$username,$password,$dbname);
$stmt=mysqli_prepare($conn,"INSERT INTO tracking(IP,User_Agent,Page_Url,Time)VALUES(?,?,?,?)");//creating the space  to bind parameter
mysqli_stmt_bind_param($stmt,"ssss",$ip,$agent,$uri,$time);//binding the parameter
mysqli_stmt_execute($stmt);//excuting the query
?>
</body>
</html>