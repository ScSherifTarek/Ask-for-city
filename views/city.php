<div class="city">
    <div class="city-image">
        <?php
        if(!empty($city->getImages())) {
                    ?>
            <img src="<?= $city->getImages()[0] ?>" >
    <?php } ?>
    </div>
    <div class="city-content">
        <?php
        if(!empty($city->getImages())) {
                    ?>
        <div class="images-col">
            <div class="images">
                <div class="head">
                    <h2>photos</h2>
                    <div class="line"></div>
                </div>
                <?= generateImages($city->getImages()); ?>
                <div class="btn">
                    <a href="images.php?q=<?= $city->getQuery(); ?>">see more photos</a>
                </div>
            </div>
        </div>
    <?php } ?>
        <div class="content-col">
            <div class="city-row">
                <div class="name-col">
                    <div class="city-name">
                        <h1><?= $city->getCityName() ?>,<span class="country"> <?= $city->getCountryName() ?></span></h1>
                    </div>
                </div>
                <div class="prop-col">
                    <div class="">
                        <h2 class="temp"><?= $city->getTemp() ?> °C</h2>
                        <h2 class="datetime"><?= $city->getTime() ?></h2>
                    </div>
                </div>
                <div class="clrfix"></div>
            </div>
            <div class="map-row">
                <div class="map">
                    <iframe width="100%" height="430px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=<?= $city->getLat() ?>,<?= $city->getLon() ?>&amp;hl=es;z=14&amp;output=embed">
                    </iframe>
                </div>
            </div>
        </div>
        <div class="clrfix"></div>
    </div>
</div>