<?php include'header/header.php'; ?>
<style>
    @import url(https://fonts.googleapis.com/css?family=Audiowide);
body{ 
  background-color: #fff;
}
#errorWrapper{
  display:block;
  position:fixed;
  width: 100%;
  top: 50%;
  left: 60%;
  text-align: center;
  transform: translate(-50%, -50%);
}

#errorText{
  margin: 0;
  font-family: 'Audiowide', cursive;
  text-align: center;
  color: #ccc;
  font-size: 40px;
}
.red{
  color: rgb(255, 50, 50);
  animation: glow 2s infinite;
}
@keyframes grow{
  0%{
    width: 0;
    height: 0;
  }
}
@keyframes security{
  0%{
    background-position: 800% 100%, 130% 75%; 
  }
  100%{
    background-position:50% 100%, 130% 75%; 
  }
}
@keyframes glow{
  0%{
     text-shadow: 0 0 3px rgba(255, 0,0,0.8);
  }
  50%{
     text-shadow: 0 0 20px rgba(255, 0,0,0.8);
  }
  100%{
     text-shadow: 0 0 3px rgba(255, 0,0,0.8);
  }
}
    
</style>

<div id="errorWrapper"><div id="error403"></div><p id="errorText"><span class="red">Sorry Kiddo</span><br> Access Denied</p>

<form action="cron5.php" method="GET">
    <input type="submit" value="submit">
    
</form>





</div>
<?php include'header/footer.php'; ?>