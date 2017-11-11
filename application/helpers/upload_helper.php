<?php

defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('upload_dp')) {

    function upload_dp($source, $fileName) {
        $CI = & get_instance();
        $CI->load->config('cdn');
        $CI->load->config('aws');

        $cdnStorage = $CI->config->item('storage');
        $cdn = $CI->config->item('is_real');
        $uploadDir = $CI->config->item('dp_path');

        if (!$cdn):
            $cdnStorage = str_replace("\\", "/", realpath($cdnStorage));
            $uploadPath = $cdnStorage . "/" . $uploadDir;
            if (file_exists($uploadPath . $fileName))
                unlink($uploadPath . $fileName);
            try {
                $result = copy($source, $uploadPath . $fileName);
                @unlink($source);
            } catch (Exception $ex) {
                return $ex->getMessage();
            }
            return $result;
        else:
            //real cdn upload using its sdk
            $CI->load->library('Awsts');
            $aws = new Awsts();
            $s3 = $aws->getS3();
            $bucket = $CI->config->item('pub-bucket');
            $size = getimagesize($source);
            $mime = ($size['mime']) ? $size['mime'] : 'image/jpeg';
            return $s3->putObject([
                        'Bucket' => $bucket,
                        'Key' => $uploadDir . $fileName,
                        'SourceFile' => $source,
                        'ACL' => 'public-read',
                        'ContentType' => $mime
            ]);
        endif;
    }

}

if (!function_exists('getThumb')) {

    function getThumb($thumb = null) {
        $CI = & get_instance();
        $CI->load->config('cdn');
        $cdn = $CI->config->item('cdn');
        $uploadDir = $CI->config->item('thumb_path');

        if ($thumb):
            $check = @getimagesize($cdn . $uploadDir . $thumb);
            if ($check !== false):
                return $cdn . $uploadDir . $thumb;
            else:
                return $cdn . $uploadDir . 'default.jpg';
            endif;
        else:
            return $cdn . $uploadDir . 'default.jpg';
        endif;
        return $cdn . $uploadDir . 'default.jpg';
    }

}

if (!function_exists('getIcon')) {

    function getIcon($thumb = null) {
        $CI = & get_instance();
        $CI->load->config('cdn');
        $cdn = $CI->config->item('cdn');
        $uploadDir = $CI->config->item('thumb_path');

        if ($thumb):
            $check = @getimagesize($cdn . $uploadDir . $thumb);
            if ($check !== false):
                return $cdn . $uploadDir . $thumb;
            else:
                return $cdn . $uploadDir . 'default.jpg';
            endif;
        else:
            return $cdn . $uploadDir . 'default.jpg';
        endif;
        return $cdn . $uploadDir . 'default.jpg';
    }

}

if (!function_exists('getImagePath')) {

    function getImagePath($column, $value = null) {
        $method = "get" . ucfirst($column);
        return call_user_func($method, $value);
    }

}

if (!function_exists('compare')) {

    function compare($a, $b, $key = 'number') {
        if ($a[$key] == $b[$key]) :
            return 0;
        endif;
        return ($a[$key] < $b[$key]) ? -1 : 1;
    }

}

if (!function_exists('is_thumb')) {

    function is_thumb($thumb = null) {
        $CI = & get_instance();
        $CI->load->config('cdn');
        $CI->load->config('aws');

        $cdnStorage = $CI->config->item('storage');
        $cdn = $CI->config->item('is_real');
        $uploadDir = $CI->config->item('thumb_path');
        if ($cdn):
            $CI->load->library('Awsts');
            $aws = new Awsts();
            $s3 = $aws->getS3();
            $bucket = $CI->config->item('pub-bucket');

            $response = $s3->doesObjectExist($bucket, $uploadDir . $thumb);
            if ($response):
                return TRUE;
            else:
                return FALSE;
            endif;
        else:
            $cdnStorage = str_replace("\\", "/", realpath($cdnStorage));
            $uploadPath = $cdnStorage . "/" . $uploadDir;
            return file_exists($uploadPath . $thumb);
        endif;
    }

}

if (!function_exists('upload_thumb')) {

    function upload_thumb($source, $fileName, $board = '') {
        $CI = & get_instance();
        $CI->load->config('cdn');
        $CI->load->config('aws');

        $cdnStorage = $CI->config->item('storage');
        $cdn = $CI->config->item('is_real');
        $uploadDir = $CI->config->item('thumb_path');

        if (!$cdn):
            $cdnStorage = str_replace("\\", "/", realpath($cdnStorage));
            if ($board == ''):
                $uploadPath = $cdnStorage . "/" . $uploadDir;
            else:
                $uploadPath = $cdnStorage . "/" . $uploadDir . $board;
            endif;
            if (file_exists($uploadPath . $fileName))
                unlink($uploadPath . $fileName);
            try {
                $result = copy($source, $uploadPath . $fileName);
                @unlink($source);
            } catch (Exception $ex) {
                return $ex->getMessage();
            }
            return $result;
        else:
            //real cdn upload using its sdk
            $CI->load->library('Awsts');
            $aws = new Awsts();
            $s3 = $aws->getS3();
            $bucket = $CI->config->item('pub-bucket');
            $size = getimagesize($source);
            $mime = ($size['mime']) ? $size['mime'] : 'image/jpeg';
            return $s3->putObject([
                        'Bucket' => $bucket,
                        'Key' => $uploadDir . $board . $fileName,
                        'SourceFile' => $source,
                        'ACL' => 'public-read',
                        'ContentType' => $mime
            ]);
        endif;
    }

}
?>
