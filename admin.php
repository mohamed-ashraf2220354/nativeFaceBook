<?php
session_start();
require_once("header_admin.php");
require_once("classes.php");
$user = unserialize($_SESSION["user"]);
$All_user = $user->get_all_user();


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
		<a href="profile.php" class="profile">
			<?php if (!empty($user->image)) echo "<img src='$user->image' alt='profile pic' />";
			else echo "<img src='./image/User.png' alt='profile pic' />"; ?>
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
						<a class="active" href="#">Home</a>
					</li>
				</ul>
			</div>
		</div>

		<ul class="box-info">
			<li>
				<i class='bx bxs-calendar-check'></i>
				<span class="text">
					<h3>
						<?php
						$qry = "SELECT * FROM users WHERE role ='subscriber'";
						require_once('config.php');
						$con = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
						$result = mysqli_query($con, $qry);
						if ($total = mysqli_num_rows($result)) {
							echo $total;
						}else{
							echo "not date ";
						}
						?></h3>
					<p>Users</p>
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
					<h3>Recent User</h3>
					<i class='bx bx-search'></i>
					<i class='bx bx-filter'></i>
				</div>


				<table>
					<thead>
						<tr>
							<th>User Name</th>
							<th>Email</th>
							<th>Data time</th>
							<th>Role</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

						<?php

						foreach ($All_user as $user) {
						?>
							<tr>
								<td>
									<?php if (!empty($user["image"])) echo "<img src='$user[image]' alt='profile pic' />";
									else echo "<img src='./image/User.png' alt='profile pic' />"; ?>
									<p> <?= $user["name"] ?></p>
								</td>
								<td><?= $user["email"] ?></td>
								<td><?= $user["created_at"] ?></td>
								<td><?= $user["role"] ?></td>
								<td>
									<form action="delaccount.php" method="post">
										<input type="hidden" name="user_id" value="<?= $user["id"] ?>">
										<button type="submit" style="background-color: crimson; color:antiquewhite; border-radius:3px; padding:10px;">
											REMOVE ACCOUNT
										</button>
									</form>
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