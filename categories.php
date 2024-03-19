<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Story Valley - Categoriese</title>
    <!-- Importing Header Tags -->
    <?php include "./php.includes/--header-metas.php";?>
</head>
<body>

<?php 
  // Importing Navbar
include "./php.includes/--navbar.php";
?>
<!--------------------------------------------------->
<!-------------- Category System ------------------>
<!--------------------------------------------------->

<!-- Header -->
<section id="categories-area" class="categories-area">
<div class="container">
    <div class="projects-title pb-5">
    <h3 class="text-uppercase projects-title" style="padding-bottom: 20px;"> Please Pick your Desired Article Category.</h3>
    </div>
</div>

<!-- Redirecting Drop Down Selector To fetch.php With Posted Data -->
<script src="jquery.js"></script>
<script>
    $(document).ready(function()
                     {
        $("#fetchval").on('change',function()
                         {
            var keyword = $(this).val();
            $.ajax(
            {
                url:'fetch.php',
                type:'POST',
                data:'request='+keyword,
                
                beforeSend:function()
                {
                    $("#table-container").html('Working...');
                    
                },
                success:function(data)
                {
                    $("#table-container").html(data);
                },
            });
        });
    });
</script>
<!-- Drop Down Selector -->
<div id="ab">Filter Articles by:</div>
<select id="fetchval" name="fetchby" >
    <option value="Scottish">Scottish</option>
    <option value="English">English</option>
    <option value="French">French</option>
</select>
</section>


<!-- ------------------------------------------------------------------ -->
<!-- ------------------- [Article Display Cards] ---------------------- -->
<!-- ------------------------------------------------------------------ -->
<section>
<div id="table-container">
<?php
include "./php.includes/inc.dataBaseHandler.php";
$query  = "SELECT * FROM Articles LIMIT 5";
$result = mysqli_query($conn, $query);

echo"<div id='table-container' class='card-row'>";
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
  </div>
</section>




<!-- Footer Import -->
<?php include "./php.includes/--footer.php";?>
</body>
</html>

