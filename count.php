<?php include'header/header.php';?>
                
                <!-- Content Starts Here-->
                
                <div class="container">
<div class="row">
     

    <div class="col-md-3">
      <div class="box"> 

       
         <p><img style="font-size:165px" src="cpu.png"><br><?php ?></p>
       
  </div>
        </div>
        
          <div class="col-md-3">
      <div class="box"> 

       
         <p><img style="font-size:165px" src="projector.png"><br></p>
       
  </div>
        </div>
        

    <div class="col-md-3">
      
        <div class="box"> 
 <p><img style="font-size:165px" src="board.png"><br> </p>
        </div>
    </div>  
    
    <div class="col-md-3">
      <div class="box"> 

       
         <p><img style="font-size:165px" src="speaker.png"><br></p>
       
  </div>
        </div>
        
            <div class="col-md-3">
      <div class="box"> 

       
         <p><img style="font-size:165px" src="headset.png"><br></p>
       
  </div>
        </div>
        
          <div class="col-md-3">
       <div class="box">
           <a href="">
       <p><img style="font-size:165px" src="print.png"><br><?php ?></p>
        </div>
        </a>
    </div> 
    
</div>
</div>



<!-- Content Ends Here-->

            


    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
        
        
        
    </script>
</body>

</html>