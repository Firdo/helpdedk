<?php include 'header/header.php';?>

                <!-- Content Starts Here-->
                
           <div class="container">
<div class="panel panel-default">
<div class="panel-body">
<form action="" method="post" enctype='multipart/form-data'>

  
<div class="form row">
<div class="form group col-md-4">
<label>Name</label>
<select name="year" class="form-control" required="">
<option>Admin</option>  
<option>Primary</option> 
<option>Secondary</option>    
</select>
</div>


<div class="form group col-md-4"><label>CPU </label>
<select name="cpu" class="form-control"/>
<option>Lenovo</option>    
<option>Acer</option>
<option>Dell</option> 
<option>Sonic</option> 
</select>
</div>

<div class="form group col-md-4">
<label>Monitor</label>
<select name="monitor" class="form-control"/>
<option>Acer</option>    
<option>Benq</option>
<option>Lenovo</option> 
<option>LG</option> 
</select>
<br /><br /></div></div>

<div class="form row">
<div class="form group col-md-4">
<label>RAM</label>
<select name="ram" class="form-control" required="">
<option>2 GB</option>  
<option>4 GB</option> 
<option>6 GB</option>    
</select>
</div>


<div class="form group col-md-4"><label>Memory </label>
<select name="memory" class="form-control"/>
<option>160 GB</option>    
<option>250 GB</option>
<option>500 GB</option> 
</select>
</div>

<div class="form group col-md-4">
<label>Processor</label>
<select name="processor" class="form-control"/>
<option>Acer</option>    
<option>Benq</option>
<option>Lenovo</option> 
<option>LG</option> 
</select>
<br /><br /></div></div>

<div class="form row">
<div class="form group col-md-4">
<label>Speaker</label>
<select name="speaker" class="form-control" required="">
<option>Creative</option>  
<option>Gepass</option> 
<option>Sound</option>    
</select>
</div>


<div class="form group col-md-4"><label>Projector</label>
<select name="projector" class="form-control"/>
<option>Acer</option>    
<option>Hitachi</option>
<option>Benq</option> 
<option>Epson</option> 
</select>
</div>

<div class="form group col-md-4">
<label>Touch Board</label>
<select name="touchboard" class="form-control"/>
<option>Acer</option>    
<option>Hitachi</option>
</select>
<br /><br /></div></div>

<div class="form row">
<div class="form group col-md-4">
<label>Printer</label>
<select name="printer" class="form-control"/>
<option>HP Laserjet 400 M401</option>    
<option>Canon Brother</option>
<option>Hp OfficeJet PRO 8610</option>
</select>
</div>

<div class="form group col-md-4">
<label>Purchase Date</label>
<input type="date" name"purchase" class="form-control">
</div>

<div class="form group col-md-4">
<label>Expiry Date</label>
<input type="date" name"expiry" class="form-control">
<br></div>

<div class="form group col-md-4">
<label>Money Value</label>
<input type="text" name"value" class="form-control">
<br></div>
</div>

<input type="submit" value=" Submit" class="col-md-12 col-sm-12 btn color" name="submit"/><br />
</form>
</div></div></div></div>
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