
	<div class="column_inner">
		<aside>
			<?php if(is_singular("post")) { 
			
				$sidebar = "Sidebar";
				
			} else { 
					
				$sidebar = "SidebarPage";
				
				 } ?>
							
			<?php if(function_exists('dynamic_sidebar') && dynamic_sidebar($sidebar)) : 
		endif;  ?>
		</aside>
	</div>
