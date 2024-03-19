<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Importing Header Tags -->
    <?php include "./php/php.includes/--index-header-metas.php";?>
    <title>Story Valley - Home</title>
</head>

<body>
<?php 
  // Importing Navbar And Database
  include "./php/php.includes/--navbar-home.php";
  include "./php/php.includes/inc.dataBaseHandler.php"; 
?>

<!-- ----------------------------------------------------------------------------------------------------------------------- -->
<!-- ----------------------------------------------- [Into Video] ----------------------------------------------- -->
<!-- ----------------------------------------------------------------------------------------------------------------------- -->

<section id="intro-video" class="intro-video">
  <div class="iframe-container">
    <iframe 
    width="560" height="315" src="https://www.youtube.com/embed/urvYtrv3VsU" title="YouTube video player" 
    frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
    allowfullscreen>
    </iframe>
  </div>
</section>

<!-- ======================================================================= -->
<!-- About -->
<!-- ======================================================================= -->

<section id="about" class="about">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-6">
          <div class="about-img">
          <img src="./img/about-image.png" alt="about-image" class="img-fluid" style="border-radius: 50px; padding: 0px;">

          </div>
        </div>
        <div class="col-md-12 col-lg-6 about-title" style="text-align: left; padding-left: 50px;">
          <h3 class="text-uppercase" style="padding-bottom: 10px;">
            About Story Valley
          </h3>
          <p class="generic-paragraph about-paragraph paragraph w-75">
          Story Valley uses visual, audio, and digital materials to help reinterpret student stories by combining oral history and 
          innovative, creative literacy techniques.Students come together from different backgrounds and cultures and work together to 
          practice their English, their national language and to learn about each other's culture.
          </p>
          <p class="generic-paragraph about-paragraph paragraph w-75">
          We aim to inspire students to read, write and speak in different languages, and to use their creativity to translate their 
          stories to new media and platforms. This way, students will be able to strengthen their key competences in literacy and 
          language in an engaging and creative way.
          </p>
          <p class="generic-paragraph about-paragraph paragraph w-75">
          In the approach of using oral history as a driving force, we use an interdisciplinary way of learning to contribute to several 
          European key priorities such as raising awareness of european cultures value in society, strengthening competencies, and integrating
          migrant cultures by respecting their backgrounds, and sharing our own.
          </p>
          <p class="generic-paragraph about-paragraph paragraph py-4 w-75" style="text-align: right; font-weight: 700;">
            We would be very pleased if you would join us on this journey to unite the cultures through understanding and compassion.
          </p>
        </div>
      </div>
    </div>
  </section>


<!-- ------------------------------------------------------------------------------------------------------------------------ -->
<!-- --------------------------------------------------- [Article Display Cards] ------------------------------------------------------ -->
<!-- ------------------------------------------------------------------------------------------------------------------------ -->

<section>
  <h3 class='card-h3'>Recently Added Articles</h3>

  <?php
  $query  = "SELECT * FROM Articles LIMIT 5";

  $result = mysqli_query($conn, $query);
  
  echo"<div class='card-row'>";
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {   
      echo"<div class='col-md-2 d-flex justify-content-center'>";
        echo"<div class='card'>";
          echo"<div class='card-body'>";

          echo "<form action='./php/article-picker.php' method='POST'>";
    
          echo"<h5 class='card-part card-title d-flex justify-content-center''>";
              echo   $row['Article_Name'];
          echo "</h5>";   
              
          echo" <h6 class='card-part card-subtitle mb-2 text-muted d-flex justify-content-center'>";  
              echo "<img src='{$row['Cover_Url']}' alt='image url not found' class='image-responsive img-thumbnail' style='max-height: 200px; max-width=200px;'>";
          echo "</h6>";	
          
          echo"<p class='card-part card-text'>";
          echo substr($row['Details'], 0, 300);
          if (strlen($row['Details']) > 300) {
              echo "...";
          }
          echo "</p>";
  
              echo '<a class="btn ml-2 d-flex position-absolute bottom-0 start-50 translate-middle-x" style="margin-bottom: 30px" input type="submit" name="Submit" id="panel-button" value ="Submit" 
              href="http://webdev.edinburghcollege.ac.uk/~HNDWEBMR9/Story-Valley-Website/php/article-picker.php?id='.$row['Article_ID'].'">Read Now</a>';
  
          echo "</form>";
          echo "</div>";   
        echo "</div>";    
      echo "</div>";        
    }
?>
</section>

<!-- Footer Import -->
<?php include "./php/php.includes/--footer.php"; ?>
</body>
</html>
