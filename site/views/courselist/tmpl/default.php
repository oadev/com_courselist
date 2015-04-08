<?php
	defined('_JEXEC') or die;
?>
<h1><?php echo "Full Course Listing" ?></h1>

	<?php
		// loop through courses an output them in the main course Listing
		// this view relies on two different queries, one for general course info ($c)
		// and the other for section info related to that course ($s)
		foreach ($this->courses as $c) { ?>
			<div class="courselist-item">
				<h3>
					<?php echo $c->course_dept . " " . $c->course_code . " | " . $c->course_name; ?>
				</h3>
				
				<div class="courselist-item-desc">
					<?php echo $c->course_desc; ?>

					<h4>Available Sections:</h4>
					<ul>
						<?php 
							foreach ($this->sections as $s) { 
								if ($s->course_id == $c->course_id) { ?>
									<?php $url = "index.php?option=com_courselist&view=coursedetail&amp;id=" .$c->course_id."&sid=".$s->section_id; ?>
									<li>
										<a href="<?php echo JRoute::_($url); ?>">
										<strong><?php echo $c->course_dept . " " . $c->course_code . " " . $s->section_num; ?></strong></a> (<?php echo $s->delivery_location . ", " . $s->delivery_format; if (!is_null ($s->term_name)) {echo ", " . $s->term_name . " Term";} ?>)</li>
								<?php 
								} // end if
							} // end foreach 
						?>
					</ul>
				</div>
			</div>

	<?php }