<?php

/*
 * English language
 */

$lang['text_rest_invalid_api_key'] = 'Invalid API key %s'; // %s is the REST API key
$lang['text_rest_invalid_credentials'] = 'Invalid credentials';
$lang['text_rest_ip_denied'] = 'IP denied';
$lang['text_rest_ip_unauthorized'] = 'IP unauthorized';
$lang['text_rest_unauthorized'] = 'Unauthorized';
$lang['text_rest_ajax_only'] = 'Only AJAX requests are allowed';
$lang['text_rest_api_key_unauthorized'] = 'This API key does not have access to the requested controller';
$lang['text_rest_api_key_permissions'] = 'This API key does not have enough permissions';
$lang['text_rest_api_key_time_limit'] = 'This API key has reached the time limit for this method';
$lang['text_rest_unknown_method'] = 'Unknown method';
$lang['text_rest_unsupported'] = 'Unsupported protocol';
$lang['text_rest_no_record'] = 'No record found.';
$lang['text_rest_record_added'] = 'Record added successfully.';
$lang['text_rest_record_updated'] = 'Record updated successfully.';
$lang['text_rest_record_deleted'] = 'Record deleted successfully.';
$lang['text_rest_error'] = 'Something went wrong, Please try again.';
$lang['already_exist'] = '%s already exist in %s';

$lang['key_not_found'] = 'No record found for given key';
$lang['add_record_system_error'] = 'Problem while saving data. Please try again after sometime';
$lang['record_created'] = '%s created successfully.';
$lang['record_update'] = '%s updated successfully.';

// Register...
$lang['record_duplicate'] = 'User already registered with this account.';
$lang['record_exist'] = 'User already registered with this account. Please login.';

//Auth controller
$lang['auth_login_missing_field'] = 'Email or Password can not be blank';
$lang['auth_login_invalid'] = 'Invalid username or password';
$lang['auth_login_invalid_email'] = 'Your account is not registered. Please register.';
$lang['auth_login_blocked'] = 'User is blocked.';
$lang['auth_login_demo_expired'] = 'Demo login has been expired.';


//User controller
$lang['user_key_not_found'] = 'No record found for user id %s';
$lang['user_no_address'] = 'No address added yet';
$lang['verifiation_complete'] = '%s verification process completed.';
$lang['no_file_uploaded'] = 'No files to upload';

//Board Management
$lang['text_rest_id_invalid'] = 'Invalid ID';
$lang['text_rest_id_numeric'] = 'ID must be in numeric value';
$lang['text_rest_id_required'] = 'ID field required';

//Board Management
$lang['text_rest_medium_exist'] = 'Medium already exist, try different name.';

// Country Management
$lang['text_rest_country_id_required'] = 'Country key not found.';

//Reset password
$lang['user_username_sent'] = 'Username has been sent to your registered email address.';
$lang['forgot_password_email_sent'] = 'Reset Password link sent to %s. Please check your inbox.';

//Event Log
$lang['no_activity_done'] = 'No Activity Performed.';
$lang['user_id_required'] = 'Invalid Data';

$lang['text_order_err'] = "Order not Placed. Something went wrong";
$lang['No_free_course'] = "No Free course available at this time";
$lang['No_user_or_standard'] = "No user or standard found for given key";
$lang['Already_have_free_course'] = "You already have this package for try. Please goto MY COURSES";

$lang['already_rated'] = 'Already Rated.';

// User
$lang['invalid_user_id'] = "Invalid User Id.";

// Institutes
$lang['invalid_institute_id'] = "Invalid Institute Id.";
//$lang['text_rest_user_available_in_institute'] = "Sorry!!<br>%s already exist in %s Institute";
$lang['text_rest_user_available_in_institute'] = "Sorry!!<br>User is already exist with email id %s in %s Institute";

/**
 * Template Generation
 */
$lang['missing_or_null_required_param'] = 'Missing required parameter.';
$lang['wrong_syllabus_info'] = 'Wrong syllabus information provided.';
$lang['duplicate_template'] = 'Duplicate entry.';
$lang['template_save_error'] = 'Problem while saving data. Please try again after sometime.';

/**
 * PDF Generation
 */
$lang['ans_key_not_found'] = 'Answer sheet has not been uploaded.';



/**
 * Device app response message
 */
$lang['invalid_device'] = 'Device is not eligible';
$lang['already_registered_device'] = 'User has already availed the offer for this device.';
$lang['already_active_package'] = 'Package is already active at User dashboard.';
$lang['unique_id_not_found'] = 'Unique Id(i.e.Imei number/Android id/Serial numebr) required.';
