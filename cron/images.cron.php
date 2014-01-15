<?php

set_time_limit(0);
require_once(dirname(__FILE__) . '/../config/conf.php');
$all = (isset($_GET['all'])) ? true : false;
image::redimensionnerImageFromRep("fauteuils", $all);
image::redimensionnerImageFromRep("coussins", $all);
image::redimensionnerImageFromRep("rideau", $all);
image::redimensionnerImageFromRep("lit", $all);
image::redimensionnerImageFromRep("garniture/etape1", $all);
image::redimensionnerImageFromRep("garniture/etape2", $all);
image::redimensionnerImageFromRep("garniture/etape3", $all);
image::redimensionnerImageFromRep("garniture/etape4", $all);
image::redimensionnerImageFromRep("garniture/etape5", $all);
image::redimensionnerImageFromRep("mursetfenetres", $all);
image::redimensionnerImageFromRep("teinture_murale", $all);
