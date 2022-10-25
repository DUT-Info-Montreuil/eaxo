<script>
  $( function() {
    $( "#accordion" ).accordion({
      heightStyle: "content"
    });
  } );
  </script>
 
<div id="accordion">
	<h3>Section 1</h3>
	<div>
  		<?php
			require_once (__DIR__ . "/widgets/components/box.php");
		?>
	</div>
		<h3>Section 2</h3>
	<div>
		<p>Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor velit, faucibus interdum tellus libero ac justo. Vivamus non quam. In suscipit faucibus urna. </p>
	</div>
		<h3>Section 3</h3>
	<div>
		<p>Nam enim risus, molestie et, porta ac, aliquam ac, risus. Quisque lobortis. Phasellus pellentesque purus in massa. Aenean in pede. Phasellus ac libero ac tellus pellentesque semper. Sed ac felis. Sed commodo, magna quis lacinia ornare, quam ante aliquam nisi, eu iaculis leo purus venenatis dui. </p>
	<ul>
		<li>List item</li>
		<li>List item</li>
		<li>List item</li>
		<li>List item</li>
		<li>List item</li>
		<li>List item</li>
		<li>List item</li>
	</ul>
	</div>

	<h3>Base</h3>
	<div>
		<ul>

            <li><?php require_once __DIR__ . "/widgets/components/box.php" ?></li>
			<li><?php require_once __DIR__ . "/widgets/components/trueorfalse.php" ?></li>
			<li><?php require_once __DIR__ . "/widgets/components/text.php" ?></li>
		</ul>
	</div>


<script src="./resources/widgets_controller.js"></script>
<script src="./resources/widgets.js"></script>