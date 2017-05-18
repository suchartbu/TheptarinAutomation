<?php

require_once "./crop_card_id.php";

/**
 * Description of TheptarinCard
 *
 * @author it
 */
class TheptarinCard {
     /**
     * รับค่าพาธโฟลเดอร์
     * @param string $path_foder
     */
    public function __construct($path_foder) {
        $list_files = glob($path_foder);
        foreach ($list_files as $filename) {
            printf("$filename size " . filesize($filename) . "  " . date('Ymd H:i:s') . "\n");
            $crop_card_id = new crop_card_id($filename);
        }
    }
}

$my = new TheptarinCard("/var/www/mount/hims-nas/share_card/*.jpg");