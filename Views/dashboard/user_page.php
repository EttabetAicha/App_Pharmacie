<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/dashboard.css">

	<title>My Store</title>
</head>
<style>

</style>

<body>

	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">Admin</span>
		</a>
		<ul class="side-menu top">
			<li>
				<a href="dashboard">
					<i class='bx bxs-dashboard'></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li class="active">
				<a href="users">
					<i class='bx bxs-shopping-bag-alt'></i>
					<span class="text">Manage Our Users</span>
				</a>
			</li>
			<li>
				<a href="medicine">
					<i class='bx bxs-doughnut-chart'></i>
					<span class="text">Manage Medicine</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-message-dots'></i>
					<span class="text">Manage Sales</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-group'></i>
					<span class="text">Team</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog'></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="/logout" class="logout">
					<i class='bx bxs-log-out-circle'></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



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
			<a href="#" class="notification">
				<i class='bx bxs-bell'></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile">
				<img src="img/people.png">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>My Store</h1>
				</div>

			</div>


			<div class="container-xl">
				<div class="table-responsive">
					<div class="table-wrapper">
						<div class="table-title">
							<div class="row">
								<div class="col-sm-5">
									<h2>Store <b>Management</b></h2>
								</div>
								<!-- Button to trigger the Add New User Modal -->


								<!-- Add New User Modal -->
								<div class="modal" id="addUserModal">
									<div class="modal-dialog">
										<div class="modal-content">

											<!-- Modal Header -->
											<div class="modal-header">
												<h4 class="modal-title">Add New User</h4>
												<button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>

											<!-- Modal Body -->
											<div class="modal-body">
												<!-- Add user form -->
												<form method="post" action="/adduser">
													<input type="hidden" name="action" value="add">

													<!-- Input field for CIN -->
													<div class="form-group">
														<label for="addCIN">CIN:</label>
														<input type="text" class="form-control" placeholder="CIN" id="addCIN" name="addCIN" required>
													</div>

													<!-- Input field for full name -->
													<div class="form-group">
														<label for="addFullName">Full Name:</label>
														<input type="text" class="form-control" id="addFullName" placeholder="full_name" name="addFullName" required>
													</div>

													<!-- Input field for email -->
													<div class="form-group">
														<label for="addEmail">Email:</label>
														<input type="email" class="form-control" id="addEmail" placeholder="email" name="addEmail" required>
													</div>

													<!-- Input field for password -->
													<div class="form-group">
														<label for="addPassword">Password:</label>
														<input type="password" class="form-control" id="addPassword" placeholder="password" name="addPassword" required>
													</div>

													<!-- Hidden field for default type -->
													<input type="hidden" name="addType" value="PatientEnmagasin">

													<!-- Modal Footer -->
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
														<button type="submit" class="btn btn-primary">Add User</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>

								<div class="col-sm-7">
									<a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#addUserModal">
										<i class="material-icons">&#xE147;</i> <span>Add New User</span>
									</a> <a href="/exportPdf" class="btn btn-secondary"><i class="material-icons">&#xE24D;</i> <span>Export to PDF</span></a>
								</div>
							</div>
						</div>
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th>CIN</th>
									<th>Full Name</th>
									<th>Email</th>
									<th>type</th>
									<th>Action</th>
								</tr>
							</thead>

							<tbody>
								<?php foreach ($users as $user) : ?>
									<tr>
										<td><?= $user['CIN'] ?></td>
										<td><?= $user['full_name'] ?></td>
										<td><?= $user['email'] ?></td>
										<td><?= $user['type'] ?></td>
										<td>
											<a href="#" class="settings" title="Settings" data-toggle="modal" data-target="#updateUserModal<?= $user['CIN'] ?>">
												<i class="material-icons">&#xE8B8;</i>
											</a>
											<a href="#" class="delete" title="Delete" data-toggle="modal" data-target="#deleteUserModal<?= $user['CIN'] ?>">
												<i class="material-icons">&#xE5C9;</i>
											</a>
										</td>
									</tr>

									<div class="modal" id="updateUserModal<?= $user['CIN'] ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<!-- Modal Header -->
												<div class="modal-header">
													<h4 class="modal-title">Update User</h4>
													<button type="button" class="close" data-dismiss="modal">&times;</button>
												</div>

												<!-- Modal Body -->
												<div class="modal-body">
													<!-- Add/update user form -->
													<form method="post" action="/user/edit">
														<input type="hidden" name="action" value="update">
														<input type="hidden" name="cin" value="<?= $user['CIN'] ?>">

														<div class="form-group">
															<label for="updateFullName">Full Name:</label>
															<input type="text" class="form-control" id="updateFullName" name="updateFullName" value="<?= $user['full_name'] ?>">
														</div>

														<!-- Input field for updated email -->
														<div class="form-group">
															<label for="updateEmail">Email:</label>
															<input type="email" class="form-control" id="updateEmail" name="updateEmail" value="<?= $user['email'] ?>">
														</div>

														<!-- Dropdown for updated user type -->
														<div class="form-group">
															<label for="updateType">User Type:</label>
															<select class="form-control" id="updateType" name="updateType">
																<option value="Admin" <?= $user['type'] == 'Admin' ? 'selected' : '' ?>>Admin</option>
																<option value="PatientEnLigne" <?= $user['type'] == "PatientEnLigne" ? 'selected' : '' ?>>PatientEnLigne</option>
																<option value="PatientEnMagasin" <?= $user['type'] == "PatientEnMagasin" ? 'selected' : '' ?>>PatientEnMagasin</option>

															</select>
														</div>



														<button type="submit" class="btn btn-primary">Update</button>
													</form>
												</div>
											</div>
										</div>
									</div>

									<!-- Delete User Modal -->
									<div class="modal" id="deleteUserModal<?= $user['CIN'] ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<!-- Modal Header -->
												<div class="modal-header">
													<h4 class="modal-title">Delete User</h4>
													<button type="button" class="close" data-dismiss="modal">&times;</button>
												</div>

												<div class="modal-body">
													<!-- Delete user form -->
													<form method="post" action="/user/delete">
														<input type="hidden" name="action" value="delete">
														<input type="hidden" name="CIN" value="<?= $user['CIN'] ?>">
														<p>Are you sure you want to delete this user?</p>
														<button type="submit" class="btn btn-danger">Delete</button>
													</form>


												</div>
											</div>
										</div>
									</div>

								<?php endforeach; ?>

							</tbody>

						</table>

					</div>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->

	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<script src="../../public/assets/js/script.js"></script>
</body>

</html>