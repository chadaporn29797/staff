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


<!DOCTYPE html>
<html lang="en">

<head>
  <title>Sci staff CV</title>

  <!-- Meta -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
  <link rel="shortcut icon" href="favicon.ico">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">

  <!-- FontAwesome JS-->
  <script defer src="DevResume/assets/fontawesome/js/all.min.js"></script>

  <!-- Theme CSS -->
  <link id="theme-style" rel="stylesheet" href="DevResume/assets/css/devresume.css">

</head>

<body>

  <div class="main-wrapper">
    <div class="container px-3 px-lg-5">
      <article class="resume-wrapper mx-auto theme-bg-light p-5 mb-5 my-5 shadow-lg">

        <div class="resume-header">
          <div class="row align-items-center">
            <div class="resume-title col-12 col-md-6 col-lg-8 col-xl-9">
              <h2 class="resume-name mb-0 text-uppercase"><?= $row["nameENG"] . " " . $row["sirNameENG"] ?></h2>
              <div class="resume-tagline mb-3 mb-md-0"><?= $row["fullName"] ?></div>
            </div>
            <div class="resume-contact col-12 col-md-6 col-lg-4 col-xl-3">
              <ul class="list-unstyled mb-0">
                <li class="mb-2"><i class="fas fa-globe fa-fw fa-lg me-2"></i>Department : <?= $row["departmentName"] ?>
                </li>
                <li class="mb-2"><i class="fas fa-map-marker-alt fa-fw fa-lg me-2"></i>Room : <?= $row["roomNumber"] ?></li>
                <li class="mb-2"><i class="fas fa-phone-square fa-fw fa-lg me-2"></i>Phone : <?= $row["tel"] ?></li>
                <li class="mb-2"><i class="fas fa-phone-square fa-fw fa-lg me-2"></i>Mobile : <?= $row["mobile"] ?></li>
                <li class="mb-2"><i class="fas fa-envelope-square fa-fw fa-lg me-2"></i>E-mail : <?= $row["email"] ?></li>
              </ul>
            </div>
          </div>

        </div>
        <hr>
        <div class="resume-intro py-3">
          <div class="row align-items-center">
            <div class="col-12 col-md-3 col-xl-2 text-center">
              <img class="resume-profile-image mb-3 mb-md-0 me-md-5  ms-md-0 rounded mx-auto" src="avatars/<?= $row["ubu_mail"] ?>.png?<?= rand() ?>" alt="<?= $row["fullNameENG"] ?>" alt="image">
            </div>

            <div class="col text-start">
              <?php
              $sql = "SELECT * FROM education WHERE userID=$userID  ORDER BY sortOrder ASC ";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                echo "<h3 class='text-uppercase resume-section-heading mb-4'>" . $titles['education'][$language] . "</h3>";
                echo "<div class='item'>";
                while ($row = $result->fetch_assoc()) {
                  echo $row["detail"];
                }
                echo "</div>";
              }
              ?>
            </div>

          </div>
        </div>
        <!--//resume-intro-->


        <hr>
        <div class="resume-body">
          <div class="row">
            <div class="resume-main col-12 col-lg-12 col-xl-12   pe-0   pe-lg-5">



              <!-- <?php if (NULL != $overview &&  strlen($overview) > $MIN_STR_LENGTH) : ?>
                <section class="work-section py-3">
                  <h3 class="text-uppercase resume-section-heading mb-4"></i><?= $titles['overview'][$language] ?></h3>
                  <div>
                    <?= $overview ?>
                  </div>
                </section>
              <?php endif; ?> -->

              <?php
              $sql = "SELECT * FROM user WHERE userID=$userID AND status_show=0  ";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
              ?>
                <section class="work-section py-3">
                  <h3 class="text-uppercase resume-section-heading mb-4"></i><?= $titles['overview'][$language] ?></h3>
                  <div class="item-content">
                    <?php while ($overview = $result->fetch_assoc()) : ?>
                      
                        <?= $overview["description"] ?> 
                      
                    <?php endwhile; ?>
                  </div>
                </section>
              <?php } ?>

              
              <?php
              $sql = "SELECT * FROM award WHERE userID=$userID AND status_show=0 ORDER BY sortOrder ASC ";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
              ?>
                <section class="work-section py-3">
                  <h3 class="text-uppercase resume-section-heading mb-4"></i><?= $titles['award'][$language] ?></h3>
                  <div class="item-content">
                    <?php while ($award = $result->fetch_assoc()) : ?>
                      <ul>
                        <li><?= $award["detail"] ?> </li>
                      </ul>
                    <?php endwhile; ?>
                  </div>
                </section>
              <?php } ?>

              <?php
              $sql = "SELECT * FROM scholarship WHERE userID=$userID AND status_show=0 ORDER BY sortOrder ASC ";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
              ?>
                <section class="work-section py-3">
                  <h3 class="text-uppercase resume-section-heading mb-4"></i><?= $titles['scholarship'][$language] ?></h3>
                  <div class="item-content">
                    <?php while ($scholarship = $result->fetch_assoc()) : ?>
                      <ul>
                        <li><?= $scholarship["detail"] ?> </li>
                      </ul>
                    <?php endwhile; ?>
                  </div>
                </section>
              <?php } ?>


              <?php
              $sql = "SELECT * FROM work_exp WHERE userID=$userID AND status_show=0 ORDER BY sortOrder ASC ";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
              ?>
                <section class="work-section py-3">
                  <h3 class="text-uppercase resume-section-heading mb-4"></i><?= $titles['working'][$language] ?></h3>
                  <div class="item-content">
                    <?php while ($work_exp = $result->fetch_assoc()) : ?>
                      <ul>
                        <li><?= $work_exp["detail"] ?> </li>
                      </ul>

                    <?php endwhile; ?>
                  </div>
                </section>
              <?php } ?>

              <?php
              $sql = "SELECT * FROM publication WHERE userID=$userID AND status_show=0 ORDER BY sortOrder ASC ";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
              ?>
                <section class="work-section py-3">
                  <h3 class="text-uppercase resume-section-heading mb-4"></i><?= $titles['publication'][$language] ?></h3>
                  <div class="item-content">
                    <?php while ($publication = $result->fetch_assoc()) : ?>
                      <ol>
                        <li><?= $publication["detail"] ?> </li>
                      </ol>
                    <?php endwhile; ?>
                  </div>
                </section>
              <?php } ?>


              <?php
              $sql = "SELECT * FROM skill WHERE userID=$userID AND status_show=0 ORDER BY sortOrder ASC ";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
              ?>
                <section class="work-section py-3">
                  <h3 class="text-uppercase resume-section-heading mb-4"><?= $titles['skill'][$language] ?></h3>
                  <div class="item-content">
                    <?php while ($skill = $result->fetch_assoc()) : ?>
                      <ul>
                        <li><?= $skill["detail"] ?> </li>
                      </ul>
                    <?php endwhile; ?>
                  </div>
                </section>
              <?php } ?>


              <?php
              $sql = "SELECT * FROM training WHERE userID=$userID AND status_show=0 ORDER BY sortOrder ASC ";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
              ?>
                <section class="work-section py-3">
                  <h3 class="text-uppercase resume-section-heading mb-4"><?= $titles['training'][$language] ?></h3>
                  <div class="item-content">
                    <?php while ($training = $result->fetch_assoc()) : ?>
                      <ul>
                        <li><?= $training["detail"] ?> </li>
                      </ul>
                    <?php endwhile; ?>
                  </div>
                </section>
              <?php } ?>

              <?php
              $sql = "SELECT * FROM research_into WHERE user_id=$userID AND status_show=0 ";
              $sql2 = "SELECT * FROM research_into WHERE user_id=$userID and vstatus=0 AND status_show=0";
              $sql3 = "SELECT * FROM research_into WHERE user_id=$userID and vstatus=1 AND status_show=0";
              $result = $conn->query($sql);
              $result2 = $conn->query($sql2);
              $result3 = $conn->query($sql3);
              if ($result->num_rows > 0) {
              ?>
                <section class="work-section py-3">
                  <h3 class="text-uppercase resume-section-heading mb-4"><?= $titles['research'][$language] ?></h3>
                  <div class="item mb-3">
                    <?php $result2 = $conn->query($sql2);
                    if ($result2->num_rows > 0) { ?>

                      <div class="item-heading row align-items-center mb-2">
                        <h4 class="item-title col-12 col-md-6 col-lg-8 mb-2 mb-md-0"><?= $titles['research2'][$language] ?></h4>
                      </div>
                      <div class="item-content">
                        <?php while ($research = $result2->fetch_assoc()) : ?>
                          <ul>
                            <li><?= $research["title"] ?> (<?= $research["budget_year"] ?>)</li>
                          </ul>
                        <?php endwhile; ?>
                      </div>
                    <?php  } ?>
                    <br>
                    <?php $result3 = $conn->query($sql3);
                    if ($result3->num_rows > 0) { ?>

                      <div class="item-heading row align-items-center mb-2">
                        <h4 class="item-title col-12 col-md-6 col-lg-8 mb-2 mb-md-0"><?= $titles['research3'][$language] ?></h4>
                      </div>
                      <div class="item-content">
                        <?php while ($research = $result3->fetch_assoc()) : ?>
                          <ul>
                            <li><?= $research["title"] ?> (<?= $research["budget_year"] ?>)</li>
                          </ul>
                        <?php endwhile; ?>
                      </div>
                    <?php  } ?>
                </section>
              <?php
              }
              ?>

              <?php
              $sql = "SELECT * FROM publication_into WHERE user_id=$userID  AND status_show=0";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
              ?>
                <section class="work-section py-3">
                  <h3 class="text-uppercase resume-section-heading mb-4"></i><?= $titles['publication'][$language] ?></h3>
                  <div class="item-content">
                    <?php while ($publication = $result->fetch_assoc()) : ?>
                      <ul>
                      <li><?= $publication["title"] ?> (<?= $publication["journal_year"] ?>)</li>
                      </ul>
                    <?php endwhile; ?>
                  </div>
                </section>
              <?php } ?>

              <?php
              $sql = "SELECT * FROM document_into WHERE user_id=$userID AND status_show=0";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
              ?>
                <section class="work-section py-3">
                  <h3 class="text-uppercase resume-section-heading mb-4"></i><?= $titles['command'][$language] ?></h3>
                  <div class="item-content">
                    <?php while ($document = $result->fetch_assoc()) : ?>
                      <ul>
                      <li><?= $document["no"] ?> <?= $document["document_name"] ?> (<?= $document["budget_year"] ?>)</li>
                      </ul>
                    <?php endwhile; ?>
                  </div>
                </section>
              <?php } ?>

              <?php
              $sql = "SELECT * FROM assessment WHERE user_id=$userID AND status_show=0";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
              ?>
                <section class="work-section py-3">
                  <h3 class="text-uppercase resume-section-heading mb-4"></i><?= $titles['assessment'][$language] ?></h3>
                  <div class="item-content">
                    <?php while ($assessment = $result->fetch_assoc()) : ?>
                      <ul>
                      <li><?= $assessment["info"] ?>-<?= $assessment["label"] ?> (<?= $assessment["round"] ?>/<?= $assessment["year"] ?>)</li>
                      </ul>
                    <?php endwhile; ?>
                  </div>
                </section>
              <?php } ?>




            

            </div>
          </div>
          <hr>
          <div class="d-print-none" data-aos="fade-left" data-aos-delay="200">
            <a class="btn btn-light text-dark shadow-sm mt-1 me-1" onclick='window.print()' target="_blank">Print this CV</a>
          </div>
      </article>

    </div>


  </div>


</body>

</html>

<style>
  @page: first {
    margin-left: 0.75cm;
    margin-top: 0.25cm;
    margin-bottom: 0.25cm;
    margin-right: 0.75cm;
  }
</style>