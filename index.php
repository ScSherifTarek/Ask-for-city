<?php require_once('partials/header.php'); ?>
<div class="box">
    <div class="head">
        <div class="container">
            <div class="content">
                <h1>Choose a city</h1>
                <div class="line"></div>
            </div>
        </div>
    </div>
    
    <div class="entry-form">
        <div class="container">
            <div class="content">
                <div class="form">
                    <form action="weather.php" method="POST">
                       <input type="text" placeholder="City Name" name="city" required/>
                       <input type="submit" name="getWeather" value=">"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once('partials/footer.php'); ?>
