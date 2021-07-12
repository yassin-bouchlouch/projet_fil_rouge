<?php 
include("includes/includedFiles.php"); 
?>

<div class="searchBar">
				<span role='link' tabindex='0' onclick='openPage("search.php")'>
					Search
					<img src="assets/images/icons/search.svg" class="icon search-icon" alt="Search">
				</span>
			</div>
<h1 class="pageHeadingBig">You Might Also Like</h1>


<div class="gridViewContainer">

	<?php
		$albumQuery = mysqli_query($con, "SELECT * FROM albums ORDER BY RAND() LIMIT 10");

		while($row = mysqli_fetch_array($albumQuery)) {
			



			echo "<div class='gridViewItem'>
					<span role='link' tabindex='0' onclick='openPage(\"album.php?id=" . $row['id'] . "\")'>
						<img src='" . $row['artworkPath'] . "'>

						<div class='gridViewInfo'>"
							. $row['title'] .
						"</div>
					</span>

				</div>";



		}
	?>

</div>