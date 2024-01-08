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
<link rel="stylesheet" href="assets/css/dashboard.css">

	<title>My Store</title>
</head>
<style>

</style>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">Admin</span>
		</a>
		<ul class="side-menu top">
			<li >
				<a href="dashboard">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="users">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Manage Our Users</span>
				</a>
			</li>
			<li>
				<a href="medicine">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Manage Medicine</span>
				</a>
			</li>
			<li class="active"> 
				<a href="sales">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Manage Sales</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-group' ></i>
					<span class="text">Team</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="#" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
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
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
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
								<div class="col-sm-7">
									<a href="page_add_product.php" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Add New Product</span></a>
									<a href="#" class="btn btn-secondary"><i class="material-icons">&#xE24D;</i> <span>Export to PDF</span></a>						
								</div>
							</div>
						</div>
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th>Nr</th>
									<th>User Name</th>
									<th>Medicen Name</th>						
									<th>Price</th>
									<th>Date</th>
									<th>Action</th>
								</tr>
							</thead>
							 <?php foreach ($ventes as $sale) { ?>
                                    <tr>
                                        <td><?php echo $sale['id']; ?></td>
                                        <td><?php echo $sale['full_name']; ?></td>
                                        <td><?php echo $sale['nom']; ?></td>
                                        <td><?php echo $sale['prix']; ?></td>
                                        <td><?php echo $sale['date_vente']; ?></td>
										<td><?php echo $sale['type']; ?></td>

                                        <td>
											<a href="store.php" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
											<a href="store.php" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
							</tbody>
						</table>
					
					</div>
				</div>
			</div>  
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="../../public/assets/js/script.js"></script>
</body>
</html>