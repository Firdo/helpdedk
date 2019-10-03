<?php include'header/header.php';?>

<select id="first-choice">
  <option selected value="base">Please Select</option>
  <option value="beverages">Beverages</option>
  <option value="snacks">Snacks</option>
</select>
<br>
<select id="second-choice">
  <option>Please choose from above</option>
</select>

<script>
    
    $("#first-choice").change(function() {

	var $dropdown = $(this);

	$.getJSON("data.json", function(data) {
	
		var key = $dropdown.val();
		var vals = [];
							
		switch(key) {
			case 'beverages':
				vals = data.beverages.split(",");
				break;
			case 'snacks':
				vals = data.snacks.split(",");
				break;
			case 'base':
				vals = ['Please choose from above'];
		}
		
		var $secondChoice = $("#second-choice");
		$secondChoice.empty();
		$.each(vals, function(index, value) {
			$secondChoice.append("<option>" + value + "</option>");
		});

	});
});
</script>

<?php include'header/footer.php';?>