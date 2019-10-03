<?php include'header/header.php';?>
<style>
.invi{

	padding: 0px 0 40px;
	background: white;
	text-align: center;
	overflow:hidden; 
	position: relative;
    margin-bottom: 20px;
    box-shadow: 2px 4px 8px 0 rgba(0,0,0,0.2);
    transition: all .9s ease 0s;

}
.invi:hover{
transform: rotate(-5deg);
transition: all .9s ease 0s;
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);

}
.invi .pic{

	display:inline-block;
	width: 100%;
	height: 130px;
	margin-bottom: 50px;
	position: relative;
	z-index: 1;
	
}
.invi .pic:before{

	content: "";
	width: 100%;

	position: absolute;
	bottom: 135%;
	right: 0;
	left:0;
	transform: scale(3);
	transition: all 0.3s linear 0s;
}

.invi:hover .pic:before{


height: 100%
}


.invi:hover .pic:after{

	content:"";
    width:100%;
    height:100%;
    border-radius: 50%;
    position: absolute;
    top: 0;
    left: 0;
    z-index: -1;
}

.invi .pic img{

	width: 100%;
	height: 170px;
   
	transform: scale(1);
	transition: all .9s ease 0s;
}


.invi .content{

	margin-bottom: 30px;
}

.invi .title{
	font-size: 14px;
	font-weight: 500;
	color:#4e5052;
	letter-spacing: 1px;
	text-transform: capitalize;
	margin-bottom: 5px;
}

.invi .post{

display:block; 
font-size: 12px;
	font-weight: 400;
	color:#4e5052;
	text-transform: capitalize;
	
}

.invi .social{

	width: 100%;
	padding: 0;
	margin:0; 
	background: #C71585;
	position:absolute;
	bottom:-100px;
	left: 0;
	transition: all .5s ease 0s;	
}

.invi:hover .social{
    
transition: all .9s ease 0s;
	
}

.invi .social li{

	display: inline-block;


}

.invi .social li a{
    display: block;
	padding:10px;
	color: 	white;
	font-size: 17px;
	transition: all 0.3s ease 0s; 
}
.color{
    
    background-color:#124974;
}

.btn{
    
    color:white;
}

.btn:hover{
    font-size:17px;
    color:white;
    
}

</style>
    
<div class="container-fluid">
<div class="row">
    <div class="col-md-3">
       <a href="service.php"><button class="btn">Back</button> </a>
    </div>
    </div>
    </div>
<br>
<div class="container"><!-- Starting of container-->
	<div class="row">
<!--first Card-->
<div class="col-md-3">
		<div class="invi">
			<div class="pic">
				    <img src='image/open.png'>
								</div>
				<div class="invi-content">
				    <?php include'db/dbconfig.php'; 
				date_default_timezone_set("Asia/Dubai");
                $time= date("Y/m/d").' 00:00:00';
                $time2= date("Y/m/d").' 23:59:59';
                    $query="SELECT COUNT(name) as open from issue where ticket ='open' AND status=''";
                    $stmt=$con->prepare($query);
                    $stmt->execute();
                    while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                    echo $row['open'];}?>
			<!--	<h3 class='title'>Today's Open Ticket</h3>-->
				
				
				<span class='post'><a href="viewopen.php">Check Out</a></span>
				</div>
		</div>
</div><!-- End of first card-->


<div class="col-md-3">
		<div class="invi">
			<div class="pic">
				    <img src='image/change.png'>
								</div>
				<div class="invi-content">
				    <?php include'db/dbconfig.php'; 
			
                    $query="SELECT COUNT(name) as open from changeticket where status ='open'";
                    $stmt=$con->prepare($query);
                    $stmt->execute();
                    while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                    echo $row['open'];}?>
				
				
				<span class='post'><a href="viewchange.php">Check Out</a></span>
				<ul class="social">
				
	
					
			</ul>
			</div>
		</div>
</div>

<div class="col-md-3">
		<div class="invi">
			<div class="pic">
				    <img src='image/Problem.png'>
								</div>
				<div class="invi-content">
				    				    <?php include'db/dbconfig.php'; 
				
                    $query="SELECT COUNT(name) as open from problemticket where status ='open'";
                    $stmt=$con->prepare($query);
                    $stmt->execute();
                    while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                    echo $row['open'];}?>
				
					<span class='post'><a href="viewproblem.php">Check Out</a></span>
				<ul class="social">
	
					
			</ul>
			</div>
		</div>
</div>


	
</div><!--end of row-->
</div><!--End of container-->


<?php include'header/footer.php';?>