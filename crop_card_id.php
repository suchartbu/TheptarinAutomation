<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of crop_card_id
 *
 * @author it
 */
class crop_card_id {
    public function __construct($filename) {
        $imagick = new Imagick($filename);
        $imagick->cropimage(1040, 660, 0, 0);
        $imagick->writeimage('auto_crop.jpg');
    }
}
