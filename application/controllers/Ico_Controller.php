<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

/**
 * Description of Ico_Controller
 *
 * @author Virendra Jadeja <virendrajadeja84@gmail.com>
 */
class Ico_Controller extends REST_Controller {

    public function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->model('Currency');
        $this->load->model('IcoCurrencyMap');
        $this->load->model('Member');
        $this->load->model('IcoMemberMap');
        $this->load->model('Ico');
    }

    public function closed_get() {
        $cacheVar = $this->Ico->getCacheVar(__FUNCTION__);
        $data = $this->cache->get($cacheVar);
        if ($data):
            $this->response([
                'status' => TRUE,
                'data' => $data
                    ], REST_Controller::HTTP_OK);
        else:
            $result = $this->Ico->closed();
            if ($result):
                foreach ($result as $i => $r):
                    $data[$i] = $this->doctrine->serialize($r);
                    $icoMemberMaps = $this->IcoMemberMap->getBy(array('ico' => $r));
                    $icoCurrencyMaps = $this->IcoCurrencyMap->getBy(array('ico' => $r));
                    $members = array();
                    $currencies = array();
                    if (count($icoMemberMaps) > 0):
                        foreach ($icoMemberMaps as $icoMember):
                            $members[] = $this->doctrine->serialize($icoMember->getMember());
                        endforeach;
                    endif;
                    $data[$i]['members'] = $members;
                    if (count($icoCurrencyMaps) > 0):
                        foreach ($icoCurrencyMaps as $icoCurrency):
                            $currencies[] = $this->doctrine->serialize($icoCurrency->getCurrency());
                        endforeach;
                    endif;
                    $data[$i]['accepted_currencies'] = $currencies;
                endforeach;
            endif;
            $this->cache->save($cacheVar, $data, CacheTime::SHORT);
            $this->response([
                'status' => true,
                'data' => $data
                    ], REST_Controller::HTTP_OK);
        endif;
    }

    public function upComing_get() {
        $cacheVar = $this->Ico->getCacheVar(__FUNCTION__);
        $data = $this->cache->get($cacheVar);
        if ($data):
            $this->response([
                'status' => TRUE,
                'data' => $data
                    ], REST_Controller::HTTP_OK);
        else:
            $result = $this->Ico->upComing();
            if ($result):
                foreach ($result as $i => $r):
                    $data[$i] = $this->doctrine->serialize($r);
                    $icoMemberMaps = $this->IcoMemberMap->getBy(array('ico' => $r));
                    $icoCurrencyMaps = $this->IcoCurrencyMap->getBy(array('ico' => $r));
                    $members = array();
                    $currencies = array();
                    if (count($icoMemberMaps) > 0):
                        foreach ($icoMemberMaps as $icoMember):
                            $members[] = $this->doctrine->serialize($icoMember->getMember());
                        endforeach;
                    endif;
                    $data[$i]['members'] = $members;
                    if (count($icoCurrencyMaps) > 0):
                        foreach ($icoCurrencyMaps as $icoCurrency):
                            $currencies[] = $this->doctrine->serialize($icoCurrency->getCurrency());
                        endforeach;
                    endif;
                    $data[$i]['accepted_currencies'] = $currencies;
                endforeach;
            endif;
            $this->cache->save($cacheVar, $data, CacheTime::SHORT);
            $this->response([
                'status' => true,
                'data' => $data
                    ], REST_Controller::HTTP_OK);
        endif;
    }

    public function onGoing_get() {
        $cacheVar = $this->Ico->getCacheVar(__FUNCTION__);
        $data = $this->cache->get($cacheVar);
        if ($data):
            $this->response([
                'status' => TRUE,
                'data' => $data
                    ], REST_Controller::HTTP_OK);
        else:
            $result = $this->Ico->onGoing();
            if ($result):
                foreach ($result as $i => $r):
                    $data[$i] = $this->doctrine->serialize($r);
                    $icoMemberMaps = $this->IcoMemberMap->getBy(array('ico' => $r));
                    $icoCurrencyMaps = $this->IcoCurrencyMap->getBy(array('ico' => $r));
                    $members = array();
                    $currencies = array();
                    if (count($icoMemberMaps) > 0):
                        foreach ($icoMemberMaps as $icoMember):
                            $members[] = $this->doctrine->serialize($icoMember->getMember());
                        endforeach;
                    endif;
                    $data[$i]['members'] = $members;
                    if (count($icoCurrencyMaps) > 0):
                        foreach ($icoCurrencyMaps as $icoCurrency):
                            $currencies[] = $this->doctrine->serialize($icoCurrency->getCurrency());
                        endforeach;
                    endif;
                    $data[$i]['accepted_currencies'] = $currencies;
                endforeach;
            endif;
            $this->cache->save($cacheVar, $data, CacheTime::SHORT);
            $this->response([
                'status' => true,
                'data' => $data
                    ], REST_Controller::HTTP_OK);
        endif;
    }

    public function key_get() {
        $id = $this->get('id');
        if ($id === NULL):
            $this->response([
                'status' => false,
                'message' => $this->lang->line('text_rest_id_required')
                    ], REST_Controller::HTTP_BAD_REQUEST);
        else:
            $cacheVar = $this->Ico->getCacheVar(__FUNCTION__, $id);
            $data = $this->cache->get($cacheVar);
            if ($data):
                $this->response([
                    'status' => TRUE,
                    'data' => $data
                        ], REST_Controller::HTTP_OK);
            else:
                $result = $this->Ico->get($id);
                if ($result):
                    $data = $this->doctrine->serialize($result);
                    $icoMemberMaps = $this->IcoMemberMap->getBy(array('ico' => $result));
                    $icoCurrencyMaps = $this->IcoCurrencyMap->getBy(array('ico' => $result));
                    $members = array();
                    $currencies = array();
                    if (count($icoMemberMaps) > 0):
                        foreach ($icoMemberMaps as $icoMember):
                            $members[] = $this->doctrine->serialize($icoMember->getMember());
                        endforeach;
                    endif;
                    $data['members'] = $members;
                    if (count($icoCurrencyMaps) > 0):
                        foreach ($icoCurrencyMaps as $icoCurrency):
                            $currencies[] = $this->doctrine->serialize($icoCurrency->getCurrency());
                        endforeach;
                    endif;
                    $data['accepted_currencies'] = $currencies;

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

    public function save_post() {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[3]|max_length[100]');
        $this->form_validation->set_rules('icon', 'Icon', 'trim');
        $this->form_validation->set_rules('short_decription', 'Short Description', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('long_description', 'Description', 'trim');
        $this->form_validation->set_rules('open_date', 'Open Date', 'trim|required');
        $this->form_validation->set_rules('close_date', 'Close Date', 'trim|required');
        $this->form_validation->set_rules('rating', 'Rating', 'trim');
        $this->form_validation->set_rules('youtube_url', 'youtube_url', 'trim|max_length[255]');
        $this->form_validation->set_rules('facebook_url', 'facebook_url', 'trim|max_length[255]');
        $this->form_validation->set_rules('twitter_url', 'twitter_url', 'trim|max_length[255]');
        $this->form_validation->set_rules('bitcointalk_url', 'bitcointalk_url', 'trim|max_length[255]');
        $this->form_validation->set_rules('subreddit_url', 'subreddit_url', 'trim|max_length[255]');
        $this->form_validation->set_rules('token_symbol', 'token_symbol', 'trim|max_length[5]');
        $this->form_validation->set_rules('platform', 'platform', 'trim');
        $this->form_validation->set_rules('token_type_id', 'token_type_id', 'trim');
        $this->form_validation->set_rules('token_price', 'token_price', 'trim');
        $this->form_validation->set_rules('bonus', 'bonus', 'trim');
        $this->form_validation->set_rules('distributed_in_ico', 'distributed_in_ico', 'trim');
        $this->form_validation->set_rules('max_token', 'max_token', 'trim');
        $this->form_validation->set_rules('hard_cap', 'hard_cap', 'trim');
        $this->form_validation->set_rules('soft_cap', 'soft_cap', 'trim');
        $this->form_validation->set_rules('country', 'country', 'trim');
        $this->form_validation->set_rules('fund_raised', 'fund_raised', 'trim');

        if ($this->form_validation->run() == FALSE) :
            $this->response([
                'status' => false,
                'message' => validation_errors()
                    ], REST_Controller::HTTP_BAD_REQUEST);
        else:
            $ico = new Entity\Ico();
            $ico->setName($name);
            $ico->setBonus($bonus);
            $ico->setCountry($country);
            $ico->setDistributedInIco($distributedInIco);
            $ico->setFacebookUrl($facebookUrl);
            $ico->setTwitterUrl($twitterUrl);
            $ico->setYoutubeUrl($youtubeUrl);
            $ico->setSubredditUrl($subredditUrl);
            $ico->setBitcointalkUrl($bitcointalkUrl);
            $ico->setFundRaised($fundRaised);
            $ico->setSoftCap($softCap);
            $ico->setHardCap($hardCap);
            $ico->setIcoStatus('ENDED');
            $ico->setIcon($icon);
            $ico->setShortDecription($shortDecription);
            $ico->setLongDescription($longDescription);
            $ico->setMaxToken($maxToken);
            $ico->setOpenDate($openDate);
            $ico->setCloseDate($closeDate);
            $ico->setPlatform($platform);
            $ico->setRating($rating);
            $ico->setTokenPrice($tokenPrice);
            $ico->setTokenSymbol($tokenSymbol);
            $ico->setTokenTypeId($tokenTypeId);
            $ico->setStatus(TRUE);
            $ico->setCreatedBy(1);
            $ico->setCreatedDate(new DateTime());
        endif;
    }

}
