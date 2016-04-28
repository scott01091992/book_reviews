<!DOCTYPE HTML>
<html>
	<head>
		<title> Books Home </title>
		<link rel='stylesheet' type='text/css' href='/assets/bootstrap.min.css'>
		<link rel='stylesheet' type='text/css' href='/assets/view_books.css'>
	</head>
	<body>
		<div class='container'>
			<div class='row'>
				<div class='col-xs-8'>
					<span id='welcome'>Welcome, <?= $this->session->userdata('user_name') ?> !</span>
				</div>
				<div class='col-xs-offset-8'>
					<a id='add_book' href='/books/add'>Add Book and Review</a>
					<a id='logout' href='/logout'>Logout</a>
				</div>
			</div>
			<div class='row'>
				<div class='col-sm-7' class='col-xs-12'>
					<h4>Recent Book Reviews</h4>
					<?php
						if(COUNT($data) < 4){
							foreach($data as $review){
								echo "<div class='review_box'>
										<a href='/book/{$review['bookid']}'>{$review['title']}</a>
										<p>Rating:";for($i=0; $i<$review['rating']; $i++){
											echo "<img height='15' width='15' src='/assets/star.png'>";
										}
								echo   "</p><p><a href='/users/{$review['userid']}'>{$review['name']}</a> Says: {$review['review']}</p>
										<p>Posted on {$review['created_at']}</p></div>";
							}
						}else{
							for($i=COUNT($data)-1; $i > COUNT($data)-4; $i--){
								echo "<div class='review_box'>
										<a href='/book/{$data[$i]['bookid']}'>{$data[$i]['title']}</a>
										<p>Rating:";for($j=0; $j<$data[$i]['rating']; $j++){
											echo "<img height='15' width='15' src='/assets/star.png'>";
										}
								echo   "</p><p><a href='/users/{$data[$i]['userid']}'>{$data[$i]['name']}</a> Says: {$data[$i]['review']}</p>
										<p>Posted on {$data[$i]['created_at']}</p></div>";
							}
						}
					?>
				</div>
				<div class='col-sm-5' class='col-xs-12'>
					<h4>Other Books with Reviews</h4>
					<div id='otherbooks'><!--add overflow: scroll-->
						<?php
							if(COUNT($data) < 4){
								echo "No other reviews";
							}else{
								for($i=COUNT($data)-4; $i>= 0; $i--){
									echo "<p><a href='/book/{$data[$i]['bookid']}'>{$data[$i]['title']}</a></p>";
								}
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>