<?php

class image
{

    public static function redimensionnerImageFromRep($rep, $forcage = false)
    {
        self::redimensionnerImageMaxFromRep($rep);
        $rep = (substr($rep, -1, 1) == "/") ? $rep : $rep . "/";
        if ($forcage) {
            $listeImageToSmall = divers::listeImageFromRep(REP_IMAGE . $rep);
            $listeImageToMedium = $listeImageToSmall;
        } else {
            $listeImageBig = divers::listeImageFromRep(REP_IMAGE . $rep);
            $listeImageSmall = divers::listeImageFromRep(REP_IMAGE . $rep . "small/");
            $listeImageMedium = divers::listeImageFromRep(REP_IMAGE . $rep . "medium/");
            $listeImageToSmall = array_diff($listeImageBig, $listeImageSmall);
            $listeImageToMedium = array_diff($listeImageBig, $listeImageMedium);
        }
        if (!empty($listeImageToSmall)) {
            if (!file_exists(REP_IMAGE . $rep . "small")) {
                mkdir(REP_IMAGE . $rep . "small", 0770);
            }
            foreach ($listeImageToSmall as $image) {
                self::createMiniature(REP_IMAGE . $rep . $image, REP_IMAGE . $rep . "small/" . $image, $width = 0, $height = MINIATURE_HEIGHT);
            }
        }
        if (!empty($listeImageToMedium)) {
            if (!file_exists(REP_IMAGE . $rep . "medium")) {
                mkdir(REP_IMAGE . $rep . "medium", 0770);
            }
            foreach ($listeImageToMedium as $image) {
                self::createMiniature(REP_IMAGE . $rep . $image, REP_IMAGE . $rep . "medium/" . $image, $width = 0, $height = MEDIUM_HEIGHT);
            }
        }
    }

    public static function redimensionnerImageMaxFromRep($rep)
    {
        $rep = (substr($rep, -1, 1) == "/") ? $rep : $rep . "/";
        $listeImage = divers::listeImageFromRep(REP_IMAGE . $rep);
        foreach ($listeImage as $image) {
            self::createMiniature(REP_IMAGE . $rep . $image, REP_IMAGE . $rep . $image, $width = 0, $height = IMAGE_MAX_HEIGHT);
        }
    }

    public static function createMiniature($img, $to, $width = 0, $height = 0)
    {

        $useGD = TRUE;
        $dimensions = getimagesize($img);
        $ratio = $dimensions[0] / $dimensions[1];

        // Calcul des dimensions si 0 passé en paramètre
        if ($width == 0 && $height == 0) {
            $width = $dimensions[0];
            $height = $dimensions[1];
        } elseif ($height == 0) {
            $height = round($width / $ratio);
        } elseif ($width == 0) {
            $width = round($height * $ratio);
        }

        if ($dimensions[0] > ($width / $height) * $dimensions[1]) {
            $dimY = $height;
            $dimX = round($height * $dimensions[0] / $dimensions[1]);
            $decalX = ($dimX - $width) / 2;
            $decalY = 0;
        }
        if ($dimensions[0] < ($width / $height) * $dimensions[1]) {
            $dimX = $width;
            $dimY = round($width * $dimensions[1] / $dimensions[0]);
            $decalY = ($dimY - $height) / 2;
            $decalX = 0;
        }
        if ($dimensions[0] == ($width / $height) * $dimensions[1]) {
            $dimX = $width;
            $dimY = $height;
            $decalX = 0;
            $decalY = 0;
        }

        $pattern = imagecreatetruecolor($width, $height);
        $type = strtolower(pathinfo($img, PATHINFO_EXTENSION));
        switch ($type) {
            case 'jpeg':
                $image = imagecreatefromjpeg($img);
                break;
            case 'jpg':
                $image = imagecreatefromjpeg($img);
                break;
            case 'gif':
                $image = imagecreatefromgif($img);
                break;
            case 'png':
                $image = imagecreatefrompng($img);
                break;
        }
        imagecopyresampled($pattern, $image, 0, 0, 0, 0, $dimX, $dimY, $dimensions[0], $dimensions[1]);
        imagedestroy($image);
        imagejpeg($pattern, $to, 100);



        return TRUE;
    }

}

