<?php

function generateImages($images)
{
 foreach ($images as $image) {
                ?>
	<!-- start image card -->
	<div class="card">
	    <div class="img-container">
	        <img class="box" src="<?= $image ?>">
	    </div>
	</div>
	<!-- end image card -->
<?php }
}
?>