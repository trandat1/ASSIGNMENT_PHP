<html lang="en">

<head>
	<title>Member list</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.
min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.j
s"></script>
	<script src=“https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js">
	</script>
</head>

<body>
	<?php
	//connect to database
	require('mysqli_connect.php');
	// delare the number of row per display page(edit page)
	$page_rows = 5;
	//declare the starting record
	$start = 0;

	// get the page parameter from URL
	$p = $_GET['p'];
	// get the total number of pages


	if (isset($p) && is_numeric($p)) {
		$pages = htmlspecialchars($p, ENT_QUOTES);
	} else {
		$sql = "SELECT COUNT(*) FROM products";
		$result = $mysqli->query($sql);
		$row = $result->fetch_array(MYSQLI_NUM);
		$records = $row[0];
		if ($records > $page_rows) {
			$pages = ceil($records / $page_rows);
		} else {
			$pages = 1;
		}
	}

	$s = $_GET['s'];
	// get the starting record                                                   
	if (isset($s) && is_numeric($s)) {
		$start = htmlspecialchars($s, ENT_QUOTES);
	} else {
		$start = 0;
	}
	
	$sql="SELECT productid,productname,productdesc,productimg,productprice FROM `products` WHERE productstatus =1 LIMIT s, r";
	$stmt = $mysqli->stmt_init();
	$stmt->prepare($sql);
	$stmt->bind_param('ii', $start, $page_rows);
	$stmt->execute();
	$result = $stmt->get_result();
	if ($result->num_rows > 0) {
		echo '<table class="table table-bordered"
			<thead
			<tr>
				<th scope="col">ID</th>
				<th scope="col">Img</th>
				<th scope="col">Name</th>
				<th scope="col">Desc</th>
				<th scope="col">Price</th>
				<th scope="col">Edit</th>
				<th scope="col">Delete</th>
			</tr>
			</thead>
			<tbody>';
		while ($row = $result->fetch_assoc()) {
			$productid = $row['productid'];
			echo '
			<tr scope="row">
				<td>' . $productid . '</td>
				<td><img src="' . $row['productimg'] . '" style="width:100px"></img></td>
				<td>' . $row['productname'] . '</td>
				<td>' . $row['productdesc'] . '</td>
				<td>' . $row['productprice'] . '<sup>đ</sup></td>
				<td><a href="edit_product.php?id=' . $productid . '">Edit</a></td>
				<td><a href="delete_product.php?id=' . $productid . '">Delete</a></td>
			</tr>
			';
		}
		echo '
		</tbody>
		</table>';
	} else {
		header('Location:product.php');
		exit();
	}

	// 03
	// display the paging button     
	if ($pages > 1) {
		$nav_string = '<p>';
		$current_page = ($start / $page_rows) + 1;
		if ($current_page != 1) {
			$nav_string .= '<a href="product.php?s=' . ($start - $page_rows) .
				'&p=' . $pages . ' "class="btn btn-outline-secondary" style="margin-left:20px">Previous</a> ';
		}
		if ($current_page != $pages) {
			$nav_string .= ' <a href="product.php?s=' . ($start + $page_rows) .
				'&p=' . $pages . '"class="btn btn-outline-secondary">Next</a> ';
		}

		echo $nav_string;
	}
	echo '<a href="body.php" class="btn btn-danger" style="float:right;margin-right:20px">Exit</a>';


	$mysqli->close()
	?>
</body>

</html>