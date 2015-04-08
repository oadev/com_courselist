<?php
	defined('_JEXEC') or die;
?>

	<?php
		// loop through courses an output them in the main course listing
		foreach ($this->course_details as $c) { ?>

			<div class="course-details">
				<h1><?php echo $c->course_name; ?></h1>
				<h3><?php echo $c->course_dept ." ". $c->course_code . " " . $c->section_num; ?></h3>
				<ul>
					<li><?php echo $c->instructor_name; ?></li>
					<li><?php echo $c->delivery_location .", ". $c->delivery_format; ?></li>
					
						<?php 
							if (!is_null($c->term_name)) {
								echo "<li>" . $c->term_name . " Term" . "</li>";
							}
						?>
					
				</ul>
				<div class="course-details-desc">
					<?php echo $c->section_desc; ?>
				</div>
			</div>

	<?php }