<?php
session_start();
require_once("header_admin.php");
require_once("classes.php");
$user = unserialize($_SESSION["user"]);
$All_posts = $user->get_all_post();


?>


	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu'></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell'></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile">
				<img src="./image/IMG_8739.JPG">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right'></i></li>
						<li>
							<a class="active" href="admin.php">Home</a>
						</li>
					</ul>
				</div>
			</div>

			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check'></i>
					<span class="text">
						<h3>						<?php
						$qry = "SELECT * FROM posts";
						require_once('config.php');
						$con = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
						$result = mysqli_query($con, $qry);
						if ($total = mysqli_num_rows($result)) {
							echo $total;
						}else{
							echo "not date ";
						}
						?></h3>
						<p>Posts</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group'></i>
					<span class="text">
						<h3>2834</h3>
						<p>Visitors</p>
					</span>
				</li>
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Recent Posts</h3>
						<i class='bx bx-search'></i>
						<i class='bx bx-filter'></i>
					</div>


					<table>
						<thead>
							<tr>
								<th>Title</th>
								<th>Data time</th>
								<th>image</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>

							<?php

							foreach ($All_posts as $post) {
							?>
								<tr>
					
									<td><?= $post["title"] ?></td>
									<td><?= $post["created_at"] ?></td>
									<td><?= $post["image"] ?></td>
									<td>
										<form action="home.php">
											<button type="submit" style="background-color:goldenrod; color:antiquewhite; border-radius:3px; padding:10px;">
												view
											</button></form>
									</td>
								</tr>
							<?php
							}
							?>
						</tbody>
					</table>


				</div>

			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->


	<script src="script.js"></script>
</body>

</html>