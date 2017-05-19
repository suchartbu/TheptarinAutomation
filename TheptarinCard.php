<?php

/**
 * ระบบการตัดภาพไฟล์บัตรที่สแกน
 * อ่านไฟล์ภาพในโฟลเดอร์ที่กำหนด
 * ตัดภาพไฟล์
 * ย้ายไฟล์ที่ครอบตัดแล้ว
 *
 * @author สุชาติ บุญหชัยรัตน์ suchart bunhachirat <suchartbu@gmail.com>
 */
class TheptarinCard {

    /**
     * รับค่าพาธโฟลเดอร์ไฟล์สแกน
     * @param string $path_foder
     */
    public function __construct($path_foder) {
        try {
            $list_files = glob($path_foder);
            foreach ($list_files as $filename) {
                printf("$filename size " . filesize($filename) . "  " . date('Ymd H:i:s') . "\n");
                $this->crop_card_id($filename);
            }
        } catch (Exception $ex) {
            echo 'Caught exception: ', $ex->getMessage(), "\n";
        }
    }

    private function crop_card_id($filename) {
        try {
            $imagick = new Imagick($filename);
            $imagick->cropimage(1060, 680, 0, 0);
            $imagick->writeimage('/var/www/mount/hims-nas/hims_reg/crop_' . basename($filename));
        } catch (Exception $ex) {
            echo 'Caught exception: ', $ex->getMessage(), "\n";
        }
    }

}

$my = new TheptarinCard("/var/www/mount/hims-nas/share_card/*.jpg");
