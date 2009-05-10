<?php

//echo '<pre>'.print_r($_REQUEST, 1).'</pre>';

/**
 * @author gabe@fijiwebdesign.com
 * @copyright (c) fijiwebdesign.com
 * @license http://www.fijiwebdesign.com/
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );


class com_php_adminHTML {
	
	/**
	 * List Files
	 * @param $files Array
	 */
	function index(&$files) {
		?>
		
		<table class="adminheading">
		<tr>
			<th>
				PHP Component - <small>Manage Files</small>
			</th>
		</tr>
		</table>
		
		
		<form name="adminForm" method="get" action="index2.php">
		<table class="adminlist">
        <thead>
        <tr>
        	<th width="50">&nbsp;</th>
            <th style="text-align:left;">File Name</th>
        </tr>
        </thead>
        <tbody>
		
		<?php foreach($files as $i=>$file) : ?>
	
			<tr>
	            <td>
	            	<input type="radio"name="file" value="<?php echo $file; ?>" onclick="isChecked(this.checked);" />
	            </td>
	            <td>
	            	<?php echo $file; ?>
	            </td>
			</tr>
			
		<?php endforeach; ?>

		</tbody>
		</table>
		
		<input type="hidden" name="option" value="com_php" />
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="" />
		
		</form>
		
		<?php
	}
	
	/**
	 * Edit a File
	 * @param $file String
	 */
	function edit($file, &$content) {
		global $mainframe;
		
		$abs_path = JPATH_ROOT;
		$path = $abs_path.'/components/com_php/files/'.$file;
		?>
		
		<style type="text/css">
			.writable {
				color: green;
				font-weight: bold;
			}
			.not_writable {
				color: red;
				font-weight: bold;
			}
		</style>
		
		<table class="adminheading">
		<tr>
			<th>
				PHP Component - <small>Edit File</small>
			</th>
		</tr>
		</table>
		
		
		<form name="adminForm" method="post" action="index2.php" enctype="application/x-www-form-urlencoded">
		<table class="adminlist">
        <thead>
        <tr>
            <th style="text-align:left;">Editing: <?php echo $file.' is '.(is_writable($path) ? '<span class="writable">writable</span>' : '<span class="not_writable">not writable</span>'); ?></th>
        </tr>
        </thead>
        <tbody>
			<tr>
	            <td>
	            	<textarea name="content" style="width:99%;height:500px;"><?php echo htmlspecialchars($content); ?></textarea>
	            </td>
			</tr>
		</tbody>
		</table>
		
		<input type="hidden" name="option" value="com_php" />
		<input type="hidden" name="file" value="<?php echo htmlspecialchars($file); ?>" />
		<input type="hidden" name="task" value="save" />
		<input type="hidden" name="boxchecked" value="" />
		
		</form>
		
		<?php
	}
	
	/**
	 * Add a file
	 */
	function add() {
		?>
		
		<style type="text/css">
			.label {
				font-weight: bold;
			}
		</style>
		
		<table class="adminheading">
		<tr>
			<th>
				PHP Component - <small>Add File</small>
			</th>
		</tr>
		</table>
		
		<form name="adminForm" method="get" action="index2.php">
		<table class="adminlist">
        <thead>
        <tr>
            <th style="text-align:left;">Add File</th>
        </tr>
        </thead>
        <tbody>
			<tr>
	            <td>
	            	<span class="label">File Name</span><input name="file" />
					<input type="submit" value="Next" />
	            </td>
			</tr>
		</tbody>
		</table>
		
		<input type="hidden" name="option" value="com_php" />
		<input type="hidden" name="task" value="create" />
		<input type="hidden" name="boxchecked" value="" />
		
		</form>
		
		<?php
	}
	
	function savefile() {
		
	}
	
	function delefile() {
		
	}
	
	function about() {
		?>
		
		<table class="adminlist">
        <thead>
        <tr>
            <th>About PHP Component</th>
        </tr>
        </thead>
        <tbody>

        <tr>
            <td>
            	<p>
            		The PHP Component allows you to create custom pages and use PHP in those pages.
            	</p>
				<p>
            		It allows you to create custom pages, or mini components to do quick tasks, or for testing.
            	</p>
				<p>
            		View the <b>help</b> menu for usage details. 
            	</p>
            </td>
		</tr>
		</tbody>
		</table>
		
		<?php
	}
	
	function help() {
				?>
		
		<table class="adminlist">
        <thead>
        <tr>
            <th>How to use the PHP Component</th>
        </tr>
        </thead>
        <tbody>

        <tr>
            <td>
            	<p>
            		First create a PHP file in the PHP component.
            	</p>
				<p>
					<pre>Components -> PHP Component -> Manage Files -> New</pre>
				</p>
				<p>
            		Fill in the File name and click "Next".
            	</p>
				<p>
            		Fill in regular PHP in the form and save the file. 
            	</p>
				<p>
            		You can regular PHP Syntax:
					<pre>
						&lt;?php echo 'I am some PHP'; ?&gt;
					</pre> 
					You can also use HTML and PHP.
					<pre>
						<?php
						
						echo htmlentities(
							' 
							<p>I am some HTML</p>
							<?php echo "<p>I am some PHP</p>";
							'
						);
						
						?>
					</pre>
            	</p>
				<p>
            		Then you have to link to this file from the Joomla Menu.
            	</p>
				<p>
            		<pre>Menu -> Main Menu -> New -> Component -> PHP Component</pre>
            	</p>
				<p>
            		Choose the File you created, in the Menu Parameters and publish.
            	</p>
				<p>
            		You can link between pages created inside PHP Component. First create the page, then view the page and copy its URL. YOu should notice that it would be index.php?option=com_php&Itemid={Itemid}. 
					The only thing changing will be {Itemid}. This will be the unique id Joomla asigns for each menu Item. 
            	</p>
				<p>
            		So you can create a link using the Joomla1.0 API. 
					<pre>
						&lt;?php echo sefRelToAbs('index.php?option=com_php&Itemid=1'); ?&gt;
					</pre>
					For Joomla 1.5 API.
					<pre>
						&lt;?php echo josURL('index.php?option=com_php&Itemid=1'); ?&gt;
					</pre>
					It is better to wrap the code in the Joomla API as this caters for SEF URLs also.
            	</p>
            </td>
		</tr>
		</tbody>
		</table>
		
		<?php
	}
	
}

?>
