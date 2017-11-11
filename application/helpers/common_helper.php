<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function _pre($array) {
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

function grantAccess($action) {
    $CI = & get_instance();
    $CI->session->set_userdata($action, TRUE);
}

function checkAccess($action) {
    $CI = & get_instance();
    return $CI->session->userdata($action, TRUE);
}

function revokeAccess($action) {
    $CI = & get_instance();
    $CI->session->set_userdata($action, FALSE);
    $CI->session->unset_userdata($action);
}

function sendSMS($number, $message) {
    $CI = & get_instance();
    $url = 'http://mobi1.blogdns.com/httpmsgid/SMSSenders.aspx?UserID=Navneettrans&UserPass=nav678&Message=' . urlencode($message) . '&MobileNo=' . $number . '&GSMID=TOPSCR';
    $CI->load->library('curl');
    $CI->curl->simple_get($url);
}

function getGroupNotificationTemplateName($userTypeId, $action) {
    switch ($userTypeId) {
        case SystemUser::PARENT_FATHER:
        case SystemUser::PARENT_MOTHER:
        case SystemUser::PARENT_GARDIAN:
            if ($action == 'Added'):
                $tplName = 'group_add_notification_parent';
            else:
                $tplName = 'group_remove_notification_parent';
            endif;
            break;
        case SystemUser::STUDENT:
            if ($action == 'Added'):
                $tplName = 'group_add_notification_student';
            else:
                $tplName = 'group_remove_notification_student';
            endif;

            break;
        case SystemUser::TEACHER:
            if ($action == 'Added'):
                $tplName = 'group_add_notification_teacher';
            else:
                $tplName = 'group_remove_notification_teacher';
            endif;
            break;
        default:
            if ($action == 'Added'):
                $tplName = 'group_add_notification_student';
            else:
                $tplName = 'group_remove_notification_student';
            endif;
            break;
    }

    return $tplName;
}

/**
 * @author Amit Joshi <Amitjoshi@esense.in>
 * @date 08/08/2017
 * @uses Function is Used to Get Number of hours and minutes as per minutes passed.
 * @input integer.
 * @return String.
 *
 */
function convertToHoursMins($minutes) {
    if ($minutes <= 0)
        return '00 Hours 00 Minutes';
    else
        $Hours = sprintf("%02d", floor($minutes / 60));
    $Hours = ($Hours > 00 ? $Hours . ' Hour(s) ' : '');
    $Minutes = sprintf("%02d", str_pad(($minutes % 60), 2, "0", STR_PAD_LEFT));
    $Minutes = ($Minutes > 00 ? $Minutes . ' Minutes ' : '');
    $time = $Hours . $Minutes;
    return $time;
}

/* ends */

function chekStringLimit($str, $limit) {
    if (strlen($str) > 0):
        foreach (str_word_count($str, 1) as $i => $val) {
            if (strlen($val) > $limit) {
                return false;
            }
        }
    endif;
    return true;
}
