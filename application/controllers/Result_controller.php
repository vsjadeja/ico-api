<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

/**
 * Description of Result_controller
 *
 * @author Virendra Jadeja
 */
class Result_controller extends REST_Controller {

    public function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->model('Result');
        $this->load->model('ResultStrongArea');
        $this->load->model('ResultWeakArea');
        $this->load->model('Chapter');
        $this->load->model('Topic');
        $this->load->model('Quiz');
        $this->load->model('MediaStoragePrice');
        $this->load->model('Package');
        $this->load->model('PackageQuizeMap');
        $this->load->model('Standard');
        $this->load->model('Subject');
        $this->load->model('PackageType');
    }

    public function key_get() {
        $id = $this->get('id');
        if ($id === NULL):
            $this->response([
                'status' => false,
                'message' => $this->lang->line('text_rest_id_required')
                    ], REST_Controller::HTTP_BAD_REQUEST);
        else:
            $cacheVar = $this->Result->getCacheVar(__FUNCTION__, $id);
            $data = $this->cache->get($cacheVar);
            if ($data):
                $this->response([
                    'status' => TRUE,
                    'data' => $data
                        ], REST_Controller::HTTP_OK);
            else:
                $result = $this->Result->get($id);
                if ($result):
                    $data = $this->doctrine->serializeWithFullDepth($result, 2);
                    $quiz = $this->Quiz->get($data['quiz']['id']);
                    if ($data['quiz']['quizType'] == 2 || $data['quiz']['quizType'] == 4):
                        $data['graphData'] = $this->Result->getDptGraph($id);
                        $data['details'] = $this->doctrine->serialize($quiz);
                    else:
                        $data['graphData'] = $this->Result->classAvg($data['quiz']['id']);
                        if ($quiz->getQuizType() == 1):
                            $data['details'] = $this->doctrine->serialize($this->PackageQuizeMap->getOneBy(array('quiz' => $quiz)));
                        endif;
                    endif;

                    $data['completed_on'] = $result->getCreatedDate();
                    $area = $this->Result->getStrongWeakArea($id);
                    $data['strong_area'] = array();
                    $data['weak_area'] = array();
                    foreach ($area as $i => $v):
                        if ($v['markup'] == 's'):
                            $data['strong_area'][$i]['chapter']['id'] = $v['chapter_id'];
                            $data['strong_area'][$i]['chapter']['number'] = $v['chapter_number'];
                            $data['strong_area'][$i]['chapter']['name'] = $v['chapter_name'];
                            $data['strong_area'][$i]['topic']['id'] = $v['topic_id'];
                            $data['strong_area'][$i]['topic']['number'] = $v['topic_number'];
                            $data['strong_area'][$i]['topic']['name'] = $v['topic_name'];
                            $data['strong_area'][$i]['topic']['chapter']['id'] = $v['chapter_id'];
                            $data['strong_area'][$i]['topic']['chapter']['number'] = $v['chapter_number'];
                            $data['strong_area'][$i]['topic']['chapter']['name'] = $v['chapter_name'];
                        else:
                            $data['weak_area'][$i]['chapter']['id'] = $v['chapter_id'];
                            $data['weak_area'][$i]['chapter']['number'] = $v['chapter_number'];
                            $data['weak_area'][$i]['chapter']['name'] = $v['chapter_name'];
                            $data['weak_area'][$i]['topic']['id'] = $v['topic_id'];
                            $data['weak_area'][$i]['topic']['number'] = $v['topic_number'];
                            $data['weak_area'][$i]['topic']['name'] = $v['topic_name'];
                            $data['weak_area'][$i]['topic']['chapter']['id'] = $v['chapter_id'];
                            $data['weak_area'][$i]['topic']['chapter']['number'] = $v['chapter_number'];
                            $data['weak_area'][$i]['topic']['chapter']['name'] = $v['chapter_name'];
                        endif;
                    endforeach;
                    $data['weak_area'] = array_values($data['weak_area']);
                    $data['strong_area'] = array_values($data['strong_area']);
                    $data['answerKey'] = $this->Result->answerKey($id);
                    $this->cache->save($cacheVar, $data, CacheTime::VERY_LONG);
                    $this->response([
                        'status' => true,
                        'data' => $data
                            ], REST_Controller::HTTP_OK);
                else:
                    $this->response([
                        'status' => false,
                        'message' => $this->lang->line('text_rest_no_record')
                            ], REST_Controller::HTTP_BAD_REQUEST);
                endif;
            endif;
        endif;
    }

    public function keyWeb_get() {
        $id = $this->get('id');
        if ($id === NULL):
            $this->response([
                'status' => false,
                'message' => $this->lang->line('text_rest_id_required')
                    ], REST_Controller::HTTP_BAD_REQUEST);
        else:
            $cacheVar = $this->Result->getCacheVar(__FUNCTION__, $id);
            $data = $this->cache->get($cacheVar);
            if ($data):
                $this->response([
                    'status' => TRUE,
                    'data' => $data
                        ], REST_Controller::HTTP_OK);
            else:
                $result = $this->Result->get($id);
                if ($result):
                    $data = $this->doctrine->serializeWithFullDepth($result, 2);
                    $quiz = $this->Quiz->get($data['quiz']['id']);
                    if ($data['quiz']['quizType'] == 2 || $data['quiz']['quizType'] == 4):
                        $data['graphData'] = $this->Result->getDptGraph($id);
                        $data['details'] = $this->doctrine->serialize($quiz);
                    else:
                        $data['graphData'] = $this->Result->classAvg($data['quiz']['id']);
                        if ($quiz->getQuizType() == 1):
                            $data['details'] = $this->doctrine->serialize($this->PackageQuizeMap->getOneBy(array('quiz' => $quiz)));
                        endif;
                    endif;

                    $data['completed_on'] = $result->getCreatedDate();
                    $data['sw_area'] = $this->Result->getStrongWeakArea($id);

                    $data['answerKey'] = $this->Result->answerKey($id);
                    $this->cache->save($cacheVar, $data, CacheTime::VERY_LONG);
                    $this->response([
                        'status' => true,
                        'data' => $data
                            ], REST_Controller::HTTP_OK);
                else:
                    $this->response([
                        'status' => false,
                        'message' => $this->lang->line('text_rest_no_record')
                            ], REST_Controller::HTTP_BAD_REQUEST);
                endif;
            endif;
        endif;
    }

    public function checkQuiz_post() {
        $this->load->model('User');
        $quiz = $this->Quiz->get($this->input->post('quiz_id'));
        $result = $this->Result->getOneBy(array('quiz' => $quiz, 'user' => $this->User->get($this->input->post('user_id'))));
        if ($result):
            $data = $this->doctrine->serializeWithFullDepth($result);
            $this->response([
                'status' => true,
                'data' => $data
                    ], REST_Controller::HTTP_OK);
        else:
            $this->response([
                'status' => false,
                'message' => FALSE
                    ], REST_Controller::HTTP_BAD_REQUEST);
        endif;
    }

    public function getPkgQACount_post() {
        $userId = $this->post('userId');
        $packageId = $this->post('packageId');
        $data = $this->Result->getUserSubjectTACount($userId, $packageId);
        if ($data):
            $this->response([
                'status' => true,
                'data' => $data
                    ], REST_Controller::HTTP_OK);
        else:
            $this->response([
                'status' => false,
                'data' => FALSE
                    ], REST_Controller::HTTP_BAD_REQUEST);
        endif;
    }

    public function getSubjectAnalysis_post() {
        $userId = $this->post('userId');
        $packageId = $this->post('packageId');
        $data = $this->Result->getSubjectAnalysis($userId, $packageId);
        if ($data):
            $this->response([
                'status' => true,
                'data' => $data
                    ], REST_Controller::HTTP_OK);
        else:
            $this->response([
                'status' => false,
                'data' => FALSE
                    ], REST_Controller::HTTP_BAD_REQUEST);
        endif;
    }

    public function subjectAnalysisCET_post() {
        $userId = $this->post('userId');
        $packageId = $this->post('packageId');
        $data = $this->Result->subjectAnalysisCET($userId, $packageId);
        if ($data):
            $this->response([
                'status' => true,
                'data' => $data
                    ], REST_Controller::HTTP_OK);
        else:
            $this->response([
                'status' => false,
                'data' => FALSE
                    ], REST_Controller::HTTP_BAD_REQUEST);
        endif;
    }

    public function getSubjectQuizAnalysis_post() {
        $userId = $this->post('userId');
        $packageId = $this->post('packageId');
        $data = $this->Result->getSubjectQuizAnalysis($userId, $packageId);
        if ($data):
            $this->response([
                'status' => true,
                'data' => $data
                    ], REST_Controller::HTTP_OK);
        else:
            $this->response([
                'status' => false,
                'data' => FALSE
                    ], REST_Controller::HTTP_BAD_REQUEST);
        endif;
    }

    public function subjectCET_post() {
        $userId = $this->post('userId');
        $packageId = $this->post('packageId');
        if ($userId && $packageId):
            $data = $this->Result->subjectCET($userId, $packageId);
            if ($data):
                $this->response([
                    'status' => true,
                    'data' => $data
                        ], REST_Controller::HTTP_OK);
            else:
                $this->response([
                    'status' => FALSE,
                    'message' => 'No record found.'
                        ], REST_Controller::HTTP_BAD_REQUEST);
            endif;
        else:
            $this->response([
                'status' => FALSE,
                'message' => 'Missing parameters.'
                    ], REST_Controller::HTTP_BAD_REQUEST);
        endif;
    }

    public function subjectMQP_post() {
        $userId = $this->post('userId');
        $packageId = $this->post('packageId');
        if ($userId && $packageId):
            $data = $this->Result->subjectMQP($userId, $packageId);
            if ($data):
                $this->response([
                    'status' => true,
                    'data' => $data
                        ], REST_Controller::HTTP_OK);
            else:
                $this->response([
                    'status' => FALSE,
                    'message' => 'No record found.'
                        ], REST_Controller::HTTP_BAD_REQUEST);
            endif;
        else:
            $this->response([
                'status' => FALSE,
                'message' => 'Missing parameters.'
                    ], REST_Controller::HTTP_BAD_REQUEST);
        endif;
    }

    public function getSubjectCTMQP_post() {
        $userId = $this->post('userId');
        $packageId = $this->post('packageId');
        $quiz_type = $this->post('quizType');
        if ($userId && $packageId):
            $data = $this->Result->getSubjectCTMQP($userId, $quiz_type, $packageId);
            if ($data):
                $this->response([
                    'status' => true,
                    'data' => $data
                        ], REST_Controller::HTTP_OK);
            else:
                $this->response([
                    'status' => FALSE,
                    'message' => 'No record found.'
                        ], REST_Controller::HTTP_BAD_REQUEST);
            endif;
        else:
            $this->response([
                'status' => FALSE,
                'message' => 'Missing parameters.'
                    ], REST_Controller::HTTP_BAD_REQUEST);
        endif;
    }

}
