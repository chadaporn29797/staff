<?php
$user = null;
$userID = null;
$MIN_STR_LENGTH = 5;
if (!empty($_GET['url']))
	$user = $_GET['url'];

$sub = explode(".", $user);

if ($user == null) {
	header('Location: backend/');
	die();
}

$servername = "localhost";
$username = "root";
$password = "";

$dbname = "staffdb";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM cv_title ";
$cv = $conn->query($sql);
$titles = array();
if ($cv->num_rows > 0) {
	while ($row = $cv->fetch_assoc()) {

		$title = array("en" => $row["en"], "th" => $row["th"]);

		$titles[$row["name"]] = $title;
	}
}



$sql = "SELECT * FROM v_userinfo WHERE ubu_mail='$user'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
	die();
}
$row = $result->fetch_assoc();
$userID = $row["userID"];
$overview = $row["description"];
$language = $row["language"];
?>

<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Science Staff UBU</title>

	<link rel="stylesheet" href="assets/css/cv.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Athiti">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
	</style>
</head>

<body>
	<!-- main container-->
	<div class="main-container">
		<!-- header wrapper-->

		<header class="w3-row">

			<div class="profile w3-col m3 l2" style='padding:10px'>
				<div class="image-profile">
					<?php
					$fs = file_exists(dirname($_SERVER['DOCUMENT_ROOT'] . $_SERVER['SCRIPT_NAME']) . '/avatars/' . $row["ubu_mail"] . '.png');
					?>
					<?php if (null !== $row["ubu_mail"]  && $fs) : ?>
						<img src="avatars/<?= $row["ubu_mail"] ?>.png?<?= rand() ?>" alt="<?= $row["fullNameENG"] ?>" />
					<?php else : ?>
						<img src="avatars/unknown.png" />
					<?php endif; ?>

				</div><!-- //image-profile -->
			</div><!-- //profile -->

			<div class="contact-info w3-col m9 l5">
				<h5><?= $row["fullName"] ?></h5>
				<h5><?= $row["fullNameENG"] ?></h5>
				Department : <?= $row["departmentName"] ?> <br />
				Room : <?= $row["roomNumber"] ?><br />
				Phone : <?= $row["tel"] ?><br />
				Mobile : <?= $row["mobile"] ?><br />
				E-mail : <?= $row["email"] ?>
			</div>
			<!--//contact-info-->

			<div class="education w3-col m12 l5">
				<?php
				$sql = "SELECT * FROM education WHERE userID=$userID ORDER BY sortOrder ASC ";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					echo "<h5>" . $titles['education'][$language] . "</h5>";
					echo "<div class='item'>";
					while ($row = $result->fetch_assoc()) {
						echo $row["detail"];
					}
					echo "</div>";
				}
				?>
			</div><!-- //education-->

		</header>
		<!--//header wrapper-->


		<div class="body-container">

			<?php if (NULL != $overview &&  strlen($overview) > $MIN_STR_LENGTH) : ?>

				<div class="overview">
					<h5><i class="fa fa-user"></i><?= $titles['overview'][$language] ?> </h5>
					<div>
						<?= $overview ?>
					</div><!-- //item -->
				</div><!-- //overview-->

			<?php endif; ?>

			<?php
			$sql = "SELECT * FROM award WHERE userID=$userID ORDER BY sortOrder ASC ";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
			?>

				<div class="awards-and-honours">
					<h5><i class="fa fa-briefcase"></i><?= $titles['award'][$language] ?></h5>
					<ul>

						<?php while ($award = $result->fetch_assoc()) : ?>
							<li><?= $award["detail"] ?> </li>
						<?php endwhile; ?>
				</div>
			<?php } ?>

			<?php
			$sql = "SELECT * FROM scholarship WHERE userID=$userID ORDER BY sortOrder ASC ";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
			?>
				<div class="scholarships">
					<h5><i class="fa fa-briefcase"></i><?= $titles['scholarship'][$language] ?></h5>
					<ul>
						<?php while ($scholarship = $result->fetch_assoc()) : ?>
							<li><?= $scholarship["detail"] ?> </li>
						<?php endwhile; ?>
					</ul>
				</div>
			<?php } ?>

			<?php
			$sql = "SELECT * FROM work_exp WHERE userID=$userID ORDER BY sortOrder ASC ";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
			?>

				<div class="working-experience">
					<h5><i class="fa fa-briefcase"></i><?= $titles['working'][$language] ?> </h5>
					<ul>
						<?php while ($work_exp = $result->fetch_assoc()) : ?>
							<li><?= $work_exp["detail"] ?> </li>
						<?php endwhile; ?>
					</ul>
				</div>


			<?php } ?>


			<?php
			$sql = "SELECT * FROM publication WHERE userID=$userID ORDER BY sortOrder ASC ";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
			?>

				<div class="publications w3-container">
					<h5><i class="fa fa-file-text" aria-hidden="true"></i><?= $titles['publication'][$language] ?></h5>
					<ol>
						<?php while ($publication = $result->fetch_assoc()) : ?>
							<li><?= $publication["detail"] ?> </li>
						<?php endwhile; ?>

					</ol>
				</div><!-- //publication-->

			<?php } ?>

			<?php
			$sql = "SELECT * FROM skill WHERE userID=$userID ORDER BY sortOrder ASC ";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
			?>

				<div class="skills">
					<h5><i class="fa fa-rocket"></i><?= $titles['skill'][$language] ?></h5>
					<ul>

						<?php while ($skill = $result->fetch_assoc()) : ?>
							<li><?= $skill["detail"] ?> </li>
						<?php endwhile; ?>
					</ul>
				</div><!-- //skills -->

			<?php } ?>

			<?php
			$sql = "SELECT * FROM training WHERE userID=$userID ORDER BY sortOrder ASC ";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
			?>


				<div class="training">
					<h5><i class="fa fa-rocket"></i><?= $titles['training'][$language] ?></h5>
					<ul>
						<?php while ($training = $result->fetch_assoc()) : ?>
							<li><?= $training["detail"] ?> </li>
						<?php endwhile; ?>

					</ul>
				</div><!-- //training -->
			<?php } ?>


		</div>
		<!--body container-->


	</div>

	<div style='text-align:center;margin-top:10px;margin-bottom:10px'>
		<button onclick='window.print()'>Print this page</button>
	</div>

	<!--//main container-->

	<!-- footer wrapper-->
	<footer class="footer">
		<div class="text-center">
			<small class="copyright">Faculty of Science, Ubonratchathani University <a href="http://www.sci.ubu.ac.th" target="_blank">http://www.sci.ubu.ac.th </a></small>
		</div>
		<!--//container-->
	</footer>
	<!--//footer wrapper-->

</body>

</html>
<?php
$conn->close();
?>