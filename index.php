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
<html lang="en-US">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Science Staff UBU</title>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="crossorigin" />
  <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&amp;family=Roboto:wght@300;400;500;700&amp;display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&amp;family=Roboto:wght@300;400;500;700&amp;display=swap" media="print" onload="this.media='all'" />
  <noscript>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&amp;family=Roboto:wght@300;400;500;700&amp;display=swap" />
  </noscript>
  <link href="assetsforinfo/css/font-awesome/css/all.min.css?ver=1.2.0" rel="stylesheet">
  <link href="assetsforinfo/css/bootstrap.min.css?ver=1.2.0" rel="stylesheet">
  <link href="assetsforinfo/css/aos.css?ver=1.2.0" rel="stylesheet">
  <link href="assetsforinfo/css/main.css?ver=1.2.0" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js"></script>
  <noscript>
    <style type="text/css">
      [data-aos] {
        opacity: 1 !important;
        transform: translate(0) scale(1) !important;
      }
    </style>
  </noscript>
</head>

<body id="top">
  <header class="d-print-none">
    <div class="container text-center text-lg-left">
      <div class="py-3 clearfix">
        <h1 class="site-title mb-0"><?= $row["nameENG"] . " " . $row["sirNameENG"] ?></h1>
        <div class="site-nav">

        </div>
      </div>
    </div>
  </header>
  <div class="page-content">
    <div class="container">
      <div class="cover shadow-lg bg-white">
        <div class="cover-bg p-3 p-lg-4 text-white">
          <div class="row">
            <div class="col-lg-4 col-md-5">
              <div class="avatar hover-effect bg-white shadow-sm p-1">

                <!-- <img src="images/avatar.jpg" width="200" height="200" /> -->

                <?php
                $fs = file_exists(dirname($_SERVER['DOCUMENT_ROOT'] . $_SERVER['SCRIPT_NAME']) . '/avatars/' . $row["ubu_mail"] . '.png');
                ?>
                <?php if (null !== $row["ubu_mail"]  && $fs) : ?>
                  <img height="200" width="200" src="avatars/<?= $row["ubu_mail"] ?>.png?<?= rand() ?>" alt="<?= $row["fullNameENG"] ?>" />
                <?php else : ?>
                  <img height="200" src="avatars/unknown.png" />
                <?php endif; ?>

              </div>
            </div>
            <div class="col-lg-8 col-md-7 text-center text-md-start ">
              <h2 class="h1 mt-2" data-aos="fade-left" data-aos-delay="0"><?= $row["fullName"] ?></h2>
              <p data-aos="fade-left" data-aos-delay="100"><?= $row["fullNameENG"] ?></p>
              <div class="d-print-none" data-aos="fade-left" data-aos-delay="200">
                <a class="btn btn-light text-dark shadow-sm mt-1 me-1" onclick='window.print()' target="_blank">Print this CV</a>
                <!-- <a class="btn btn-light text-dark shadow-sm mt-1 me-1" onclick='window.print()' target="_blank">Download CV</a> -->
                <!-- <a class="btn btn-success shadow-sm mt-1" href="#contact">Hire Me</a> -->
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="about-section pt-4 px-3 px-lg-4 mt-1"> -->
        <div class=" pt-4 px-3 px-lg-4 mt-1">
          <div class="row">
            <div class="col-md-5 offset-md-1">
              <div class="row mt-2">
                <table cellspacing="0" cellpadding="0">
                  <tr>
                    <td class="first">Department :</td>
                    <td class="pb-1 text-secondary"><?= $row["departmentName"] ?></td>
                  </tr>
                  <tr>
                    <td class="second">Room :</td>
                    <td class="pb-1 text-secondary"><?= $row["roomNumber"] ?></td>
                  </tr>
                  <tr>
                    <td class="second">Phone :</td>
                    <td class="pb-1 text-secondary"><?= $row["tel"] ?></td>
                  </tr>
                  <tr>
                    <td class="second">Mobile :</td>
                    <td class="pb-1 text-secondary"><?= $row["mobile"] ?></td>
                  </tr>
                  <tr>
                    <td class="second">E-mail :</td>
                    <td class="pb-1 text-secondary"><?= $row["email"] ?></td>
                  </tr>
                </table>
              </div>
            </div>

            <div class="col-md-6 mt-2">
              <!-- <h2 class="h3 mb-3">ประวัติการศึกษา</h2> -->
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
            </div>

          </div>
        </div>
        <hr class="d-print-none" />
        <div class="body-container">

          <?php if (NULL != $overview &&  strlen($overview) > $MIN_STR_LENGTH) : ?>

            <div class="overview-section px-3 px-lg-4">
              <h2 class="h3 mb-4"></i><?= $titles['overview'][$language] ?></h2>
              <div class="timeline">
                <div class="timeline-card timeline-card-primary card shadow-sm">
                  <div class="card-body">
                    <div>
                      <?= $overview ?>
                    </div><!-- //item -->
                  </div><!-- //overview-->
                </div>
              </div>
            </div>
          <?php endif; ?>

          <?php
          $sql = "SELECT * FROM award WHERE userID=$userID ORDER BY sortOrder ASC ";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
          ?>
            <hr class="d-print-none" />

            <div class="overview-section px-3 px-lg-4">
              <h2 class="h3 mb-4"></i><?= $titles['award'][$language] ?></h2>
              <?php while ($award = $result->fetch_assoc()) : ?>
                <div class="timeline">
                  <div class="timeline-card timeline-card-primary card shadow-sm">
                    <div class="card-body">
                      <ul>
                        <li><?= $award["detail"] ?> </li>
                    </div>
                  </div>
                </div>
              <?php endwhile; ?>
            </div>
          <?php } ?>

          <?php
          $sql = "SELECT * FROM scholarship WHERE userID=$userID ORDER BY sortOrder ASC ";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
          ?>
            <hr class="d-print-none" />

            <div class="overview-section px-3 px-lg-4">
              <h2 class="h3 mb-4"></i><?= $titles['scholarship'][$language] ?></h2>
              <?php while ($scholarship = $result->fetch_assoc()) : ?>
                <div class="timeline">
                  <div class="timeline-card timeline-card-primary card shadow-sm">
                    <div class="card-body">
                      <ul>
                        <li><?= $scholarship["detail"] ?> </li>
                      </ul>
                    </div>
                  </div>
                </div>
              <?php endwhile; ?>
            </div>
          <?php } ?>

          <?php
          $sql = "SELECT * FROM work_exp WHERE userID=$userID ORDER BY sortOrder ASC ";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
          ?>
            <hr class="d-print-none" />

            <div class="overview-section px-3 px-lg-4">
              <h2 class="h3 mb-4"></i><?= $titles['working'][$language] ?> </h2>
              <?php while ($work_exp = $result->fetch_assoc()) : ?>
                <div class="timeline">
                  <div class="timeline-card timeline-card-primary card shadow-sm">
                    <div class="card-body">
                      <ul>
                        <li><?= $work_exp["detail"] ?> </li>
                      </ul>
                    </div>
                  </div>
                </div>
              <?php endwhile; ?>
            </div>
          <?php } ?>


          <?php
          $sql = "SELECT * FROM publication WHERE userID=$userID ORDER BY sortOrder ASC ";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
          ?>
            <hr class="d-print-none" />

            <div class="overview-section px-3 px-lg-4">
              <h2 class="h3 mb-4"></i><?= $titles['publication'][$language] ?></h2>
              <?php while ($publication = $result->fetch_assoc()) : ?>
                <div class="timeline">
                  <div class="timeline-card timeline-card-primary card shadow-sm">
                    <div class="card-body">
                      <ol>
                        <li><?= $publication["detail"] ?> </li>
                      </ol>
                    </div>
                  </div>
                </div>
              <?php endwhile; ?>
            </div><!-- //publication-->
          <?php } ?>

          <?php
          $sql = "SELECT * FROM skill WHERE userID=$userID ORDER BY sortOrder ASC ";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
          ?>
            <hr class="d-print-none" />

            <div class="overview-section px-3 px-lg-4">
              <h2 class="h3 mb-4"><?= $titles['skill'][$language] ?></h2>
              <?php while ($skill = $result->fetch_assoc()) : ?>
                <div class="timeline">
                  <div class="timeline-card timeline-card-primary card shadow-sm">
                    <div class="card-body">
                      <ul>

                        <li><?= $skill["detail"] ?> </li>
                      </ul>
                    </div>
                  </div>
                </div>
              <?php endwhile; ?>
            </div><!-- //skills -->

          <?php } ?>

          <?php
          $sql = "SELECT * FROM training WHERE userID=$userID ORDER BY sortOrder ASC ";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
          ?>
            <hr class="d-print-none" />

            <div class="overview-section px-3 px-lg-4">
              <h2 class="h3 mb-4"><?= $titles['training'][$language] ?></h5>
                <?php while ($training = $result->fetch_assoc()) : ?>
                  <div class="timeline">
                    <div class="timeline-card timeline-card-primary card shadow-sm">
                      <div class="card-body">
                        <ul>
                          <li><?= $training["detail"] ?> </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                <?php endwhile; ?>

            </div><!-- //training -->
          <?php } ?>


        </div>
        <!--body container-->


      </div>


    </div>
  </div>
  </div>
  <footer class="pt-4 pb-4 text-muted text-center d-print-none">
    <div class="container">

      <div class="text-small">
        <div class="mb-1">&copy; Right Resume. All rights reserved.</div>
        <div>Design - <a href="https://templateflip.com/" target="_blank">TemplateFlip</a></div>
      </div>
    </div>
  </footer>
  <script src="assetsforinfo/scripts/bootstrap.bundle.min.js?ver=1.2.0"></script>
  <script src="assetsforinfo/scripts/aos.js?ver=1.2.0"></script>
  <script src="assetsforinfo/scripts/main.js?ver=1.2.0"></script>
</body>
<style>
  @print {
    @page :footer {
      color: #fff
    }

    @page :header {
      color: #fff
    }
  }
</style>

</html>