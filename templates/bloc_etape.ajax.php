<?php
require_once(dirname(__FILE__) . '/../config/conf.php');
$etape = (isset($_GET['etape'])) ? $_GET['etape'] : 'etape1';
$listeImage = divers::listeImageFromRep(REP_IMAGE . "garniture/" . $etape . "/medium");
?>
<div class="texte-right" ><?php include_once(REP_DATA . $etape . '.html'); ?></div>

<div class="image-left" >
    <div data-ride="carousel" class="carousel slide" id="carousel-example-generic">
        <ol class="carousel-indicators">
            <?php
            for ($i = 0; $i < count($listeImage); $i++) {
                $active = ($i == 0) ? " active" : "";
                echo '<li class="" data-slide-to="' . $i . '" data-target="#carousel-example-generic" class="' . $active . '"></li>';
            }
            ?>
        </ol>
        <div class="carousel-inner">
            <?php
            $i = 0;
            foreach ($listeImage as $image) {
                $active = ($i == 0) ? " active" : "";
                $i++;
                ?>
                <div class="item<?php echo $active; ?>">
                    <?php
                    echo '<li><a href="' . FRONT_IMAGE . "garniture/" . $etape . '/' . $image . '" rel="lightbox"><img data-src="holder.js/900x500/auto/#777:#555/text:First slide" src="' . FRONT_IMAGE . "garniture/" . $etape . '/medium/' . $image . '" alt="' . $image . '" /></a></li>';
                    ?>

                </div>
                <?php
            }
            ?>
        </div>
        <a data-slide="prev" href="#carousel-example-generic" class="left carousel-control">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a data-slide="next" href="#carousel-example-generic" class="right carousel-control">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>

</div>
