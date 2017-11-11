<?php $this->load->view('header'); ?>
<section style="margin-top: 50px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>TOPScorer API Documentation</h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <p><strong>What is HMAC? How to calculate HMAC Hash.</strong></p>
                <p>A message authentication code (MAC) is produced from a message and a secret key by a MAC algorithm. An important property of a MAC is that it is impossible to produce the MAC of a message and a secret key without knowing the secret key. A MAC of the same message produced by a different key looks unrelated. Even knowing the MAC of other messages does not help in computing the MAC of a new message.<br /><br />
                    An HMAC is a MAC which is based on a hash function. The basic idea is to concatenate the key and the value, and hash them together. Since it is impossible, given a cryptographic hash, to find out what it is the hash of, knowing the hash (or even a collection of such hashes) does not make it possible to find the key.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <p><strong>List of available API.</strong></p>
                <p><strong>EndPoint : </strong><?php echo $this->config->item("base_url"); ?></p>
                <p>
                    <strong>Requires : </strong><br/>
                    HTTP Login : NO<br/>
                    Specific Headers : YES<br/>
                    Headers : X-API-KEY {API public key}, x-time-key {unix timestamp}, x-bearer-key {calculated HMAC hash}
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Group</th>
                            <th>API</th>
                            <th>Method</th>
                            <th>Parameter</th>
                            <th>Objective</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row" rowspan="50">Content</th>
                            <td>board/all</td>
                            <td>GET</td>
                            <td>- NA -</td>
                            <td>Will return all boards.</td>
                        </tr>
                        <tr>
                            <td>board/key</td>
                            <td>GET</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2"><strong>Required</strong></td>
                                    </tr>
                                    <tr>
                                        <td>id</td>
                                        <td>integer : Id</td>
                                    </tr>
                                </table>
                            </td>
                            <td>Will return detail of given id</td>
                        </tr>
                        <tr>
                            <td>medium/all</td>
                            <td>GET</td>
                            <td>- NA -</td>
                            <td>Will return all mediums.</td>
                        </tr>
                        <tr>
                            <td>medium/key</td>
                            <td>GET</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2"><strong>Required</strong></td>
                                    </tr>
                                    <tr>
                                        <td>id</td>
                                        <td>integer : Id</td>
                                    </tr>
                                </table>
                            </td>
                            <td>Will return detail of given id</td>
                        </tr>
                        <tr>
                            <td>standard/all</td>
                            <td>GET</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2"><strong>Optional</strong></td>
                                    </tr>
                                    <tr>
                                        <td>board</td>
                                        <td>integer : BoardId</td>
                                    </tr>
                                    <tr>
                                        <td>medium</td>
                                        <td>integer : MediumId</td>
                                    </tr>
                                </table>
                            </td>
                            <td>Will return all standards of maching criteria.</td>
                        </tr>
                        <tr>
                            <td>standard/key</td>
                            <td>GET</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2"><strong>Required</strong></td>
                                    </tr>
                                    <tr>
                                        <td>id</td>
                                        <td>integer : Id</td>
                                    </tr>
                                </table>
                            </td>
                            <td>Will return detail of given id</td>
                        </tr>
                        <tr>
                            <td>subject/all</td>
                            <td>GET</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2"><strong>Required</strong></td>
                                    </tr>
                                    <tr>
                                        <td>standard</td>
                                        <td>integer : StandardId</td>
                                    </tr>
                                </table>
                            </td>
                            <td>Will return all standards of maching criteria.</td>
                        </tr>
                        <tr>
                            <td>subject/key</td>
                            <td>GET</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2"><strong>Required</strong></td>
                                    </tr>
                                    <tr>
                                        <td>id</td>
                                        <td>integer : Id</td>
                                    </tr>
                                </table>
                            </td>
                            <td>Will return detail of given id</td>
                        </tr>
                        <tr>
                            <td>address/key</td>
                            <td>GET</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2"><strong>Required</strong></td>
                                    </tr>
                                    <tr>
                                        <td>id</td>
                                        <td>integer : AddressId</td>
                                    </tr>
                                </table>
                            </td>
                            <td>Will return address of given key.<br /><strong>sample response:</strong><br />{"status":true,"data":{address info}}</td>
                        </tr>
                        <tr>
                            <td>address/user</td>
                            <td>GET</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2"><strong>Required</strong></td>
                                    </tr>
                                    <tr>
                                        <td>id</td>
                                        <td>integer : UserId</td>
                                    </tr>
                                </table>
                            </td>
                            <td>Will return all the address of User.<br /><strong>sample response:</strong><br />{"status":true,"data":[{address info}]}</td>
                        </tr>
                        <tr>
                            <td>address/add</td>
                            <td>POST</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2"><strong>Required</strong></td>
                                    </tr>
                                    <tr>
                                        <td>userId</td>
                                        <td>integer : UserId</td>
                                    </tr>
                                    <tr>
                                        <td>line_one</td>
                                        <td>string : Address line one. | Max. Length [100]</td>
                                    </tr>
                                    <tr>
                                        <td>line_two</td>
                                        <td>string : Address line two. | Max. Length [100]</td>
                                    </tr>
                                    <tr>
                                        <td>country_id</td>
                                        <td>integer : CountryId</td>
                                    </tr>
                                    <tr>
                                        <td>state_id</td>
                                        <td>integer : StateId</td>
                                    </tr>
                                    <tr>
                                        <td>city_id</td>
                                        <td>integer : CityId</td>
                                    </tr>
                                    <tr>
                                        <td>zip</td>
                                        <td>string : Zip Code | Length[6] | numbers only </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><strong>Optional</strong></td>
                                    </tr>
                                    <tr>
                                        <td>person</td>
                                        <td>string : Person Full Name. | Max. Length [50]</td>
                                    </tr>
                                    <tr>
                                        <td>is_default</td>
                                        <td>boolean : true if its default address of given UserId.</td>
                                    </tr>
                                    <tr>
                                        <td>is_residence</td>
                                        <td>boolean : true if address is residence.| default true.</td>
                                    </tr>
                                </table>
                            </td>
                            <td>Will return boolean value in data part of response.<br /><strong>sample response:</strong><br />{"status":true,"data":true}</td>
                        </tr>
                        <tr>
                            <td>chapter/key</td>
                            <td>GET</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2"><strong>Required</strong></td>
                                    </tr>
                                    <tr>
                                        <td>id</td>
                                        <td>integer : ChapterId</td>
                                    </tr>
                                </table>
                            </td>
                            <td>To get chapter detail. <br /><strong>sample response:</strong><br />{"status":true,"data":{chapter info}}</td>
                        </tr>
                        <tr>
                            <td>chapter/subject</td>
                            <td>GET</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2"><strong>Required</strong></td>
                                    </tr>
                                    <tr>
                                        <td>id</td>
                                        <td>integer : SubjectId</td>
                                    </tr>
                                </table>
                            </td>
                            <td>To get chapters. <br /><strong>sample response:</strong><br />{"status":true,"data":{[chapter info]}}</td>
                        </tr>
                        <tr>
                            <td>chapter/content</td>
                            <td>POST</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2"><strong>Required</strong></td>
                                    </tr>
                                    <tr>
                                        <td>packageId</td>
                                        <td>integer : PackageId</td>
                                    </tr>
                                    <tr>
                                        <td>chapterId</td>
                                        <td>integer : ChapterId</td>
                                    </tr>
                                </table>
                            </td>
                            <td>To get chapter content. <br /><strong>sample response:</strong><br />{"status":true,"data":{"videos":[],"notes":[{note info}],"quizes":[],"activities":[]}}</td>
                        </tr>
                        <tr>
                            <td>city/key</td>
                            <td>GET</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2"><strong>Required</strong></td>
                                    </tr>
                                    <tr>
                                        <td>id</td>
                                        <td>integer : CityId</td>
                                    </tr>
                                </table>
                            </td>
                            <td>To get city detail. <br /><strong>sample response:</strong><br />{"status":true,"data":{city info}}</td>
                        </tr>
                        <tr>
                            <td>state/key</td>
                            <td>GET</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2"><strong>Required</strong></td>
                                    </tr>
                                    <tr>
                                        <td>id</td>
                                        <td>integer : StateId</td>
                                    </tr>
                                </table>
                            </td>
                            <td>To get detail of given state. <br /><strong>sample response:</strong><br />{"status":true,"data":{state info}}</td>
                        </tr>
                        <tr>
                            <td>state/city</td>
                            <td>GET</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2"><strong>Required</strong></td>
                                    </tr>
                                    <tr>
                                        <td>id</td>
                                        <td>integer : StateId</td>
                                    </tr>
                                </table>
                            </td>
                            <td>To get all cities of given state. <br /><strong>sample response:</strong><br />{"status":true,"data":[{city info}]}</td>
                        </tr>
                        <tr>
                            <td>country/all</td>
                            <td>GET</td>
                            <td>-- NA --</td>
                            <td>To get all countries. <br /><strong>sample response:</strong><br />{"status":true,"data":[{"id":1,"iso_code":"IN","code":"IN","name":"India"}]}</td>
                        </tr>
                        <tr>
                            <td>country/key</td>
                            <td>GET</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2"><strong>Required</strong></td>
                                    </tr>
                                    <tr>
                                        <td>id</td>
                                        <td>integer : CountryId</td>
                                    </tr>
                                </table>
                            </td>
                            <td>To get country detail. <br /><strong>sample response:</strong><br />{"status":true,"data":{"id":1,"iso_code":"IN","code":"IN","name":"India"}}</td>
                        </tr>
                        <tr>
                            <td>country/state</td>
                            <td>GET</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2"><strong>Required</strong></td>
                                    </tr>
                                    <tr>
                                        <td>id</td>
                                        <td>integer : CountryId</td>
                                    </tr>
                                </table>
                            </td>
                            <td>To get all states of given country. <br /><strong>sample response:</strong><br />{"status":true,"data":[{state info}]}</td>
                        </tr>
                        <tr>
                            <td>country/code</td>
                            <td>GET</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2"><strong>Required</strong></td>
                                    </tr>
                                    <tr>
                                        <td>code</td>
                                        <td>string : CountryCode</td>
                                    </tr>
                                </table>
                            </td>
                            <td>To get country by country code. <br /><strong>sample response:</strong><br />{"status":true,"data":{"id":1,"iso_code":"IN","code":"IN","name":"India"}}</td>
                        </tr>
                        <tr>
                            <td>country/iso</td>
                            <td>GET</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2"><strong>Required</strong></td>
                                    </tr>
                                    <tr>
                                        <td>code</td>
                                        <td>string : ISOCode</td>
                                    </tr>
                                </table>
                            </td>
                            <td>To get country by ISO Code. <br /><strong>sample response:</strong><br />{"status":true,"data":{"id":1,"iso_code":"IN","code":"IN","name":"India"}}</td>
                        </tr>
                        <tr>
                            <td>contact/form</td>
                            <td>POST</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2"><strong>Required</strong></td>
                                    </tr>
                                    <tr>
                                        <td>name</td>
                                        <td>string : Name | Max Length[50]</td>
                                    </tr>
                                    <tr>
                                        <td>query</td>
                                        <td>string : Query text | Min Length[5]</td>
                                    </tr>
                                    <tr>
                                        <td>email</td>
                                        <td>string : email address.</td>
                                    </tr>
                                </table>
                            </td>
                            <td>To store contact from detail. <br /><strong>sample response:</strong><br />{"status":true,"message":"Contact created successfully."}</td>
                        </tr>
                        <tr>
                            <td>grade/all</td>
                            <td>GET</td>
                            <td>-- NA --</td>
                            <td>To get all greade. <br /><strong>sample response:</strong><br />{"status":true,"data":{grade info}}</td>
                        </tr>
                        <tr>
                            <td>grade/key</td>
                            <td>GET</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2"><strong>Required</strong></td>
                                    </tr>
                                    <tr>
                                        <td>id</td>
                                        <td>integer : GradeId</td>
                                    </tr>
                                </table>
                            </td>
                            <td>To get grade detail. <br /><strong>sample response:</strong><br />{"status":true,"data":{grade info}}</td>
                        </tr>
                        <tr>
                            <td>grade/standard</td>
                            <td>GET</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2"><strong>Required</strong></td>
                                    </tr>
                                    <tr>
                                        <td>id</td>
                                        <td>integer : StandardId</td>
                                    </tr>
                                </table>
                            </td>
                            <td>To get grade detail by standard. <br /><strong>sample response:</strong><br />{"status":true,"data":{grade info}}</td>
                        </tr>
                        <tr>
                            <td>newsletter/subscribe</td>
                            <td>POST</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2"><strong>Required</strong></td>
                                    </tr>
                                    <tr>
                                        <td>email</td>
                                        <td>string : Email address</td>
                                    </tr>
                                </table>
                            </td>
                            <td>To subscribe newsletter. <br /><strong>sample response:</strong><br />{"status":true,"message":"Newsletter Subscription created successfully."}</td>
                        </tr>
                        <tr>
                            <td>note/key</td>
                            <td>GET</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2"><strong>Required</strong></td>
                                    </tr>
                                    <tr>
                                        <td>id</td>
                                        <td>integer : NoteId</td>
                                    </tr>
                                </table>
                            </td>
                            <td>To get note detail. <br /><strong>sample response:</strong><br />{"status":true,"data":{note info}}</td>
                        </tr>
                        <tr>
                            <td>note/topic</td>
                            <td>GET</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2"><strong>Required</strong></td>
                                    </tr>
                                    <tr>
                                        <td>id</td>
                                        <td>integer : TopicId</td>
                                    </tr>
                                </table>
                            </td>
                            <td>To get all notes by topic. <br /><strong>sample response:</strong><br />{"status":true,"data":[{note info}]}</td>
                        </tr>
                        <tr>
                            <td>ordertype/key</td>
                            <td>GET</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2"><strong>Required</strong></td>
                                    </tr>
                                    <tr>
                                        <td>id</td>
                                        <td>integer : OrderTypeId</td>
                                    </tr>
                                </table>
                            </td>
                            <td>To get ordertype detail. <br /><strong>sample response:</strong><br />{"status":true,"data":{ordertype info}}</td>
                        </tr>
                        <tr>
                            <td>ordertype/all</td>
                            <td>GET</td>
                            <td>-- NA --</td>
                            <td>To get all ordertypes. <br /><strong>sample response:</strong><br />{"status":true,"data":[{OrderType info}]}</td>
                        </tr>
                        <tr>
                            <td>orders/key</td>
                            <td>GET</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2"><strong>Required</strong></td>
                                    </tr>
                                    <tr>
                                        <td>id</td>
                                        <td>integer : OrderId</td>
                                    </tr>
                                </table>
                            </td>
                            <td>To get order detail. <br /><strong>sample response:</strong><br />{"status":true,"data":{order info}}</td>
                        </tr>
                        <tr>
                            <td>orders/all</td>
                            <td>GET</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2"><strong>Required</strong></td>
                                    </tr>
                                    <tr>
                                        <td>user</td>
                                        <td>integer : userId</td>
                                    </tr>
                                </table>
                            </td>
                            <td>To get order detail. <br /><strong>sample response:</strong><br />{"status":true,"data":[{order info}]}</td>
                        </tr>
                        <tr>
                            <td>orders/user</td>
                            <td>GET</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2"><strong>Required</strong></td>
                                    </tr>
                                    <tr>
                                        <td>id</td>
                                        <td>integer : UserId</td>
                                    </tr>
                                </table>
                            </td>
                            <td>To get order detail. <br /><strong>sample response:</strong><br />{"status":true,"data":[{order info}]}</td>
                        </tr>
                        <tr>
                            <td>packagetype/all</td>
                            <td>GET</td>
                            <td>-- NA --</td>
                            <td>To get all package types. <br /><strong>sample response:</strong><br />{"status":true,"data":[{PackageType info}]}</td>
                        </tr>
                        <tr>
                            <td>package/all</td>
                            <td>GET</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2"><strong>Optional</strong></td>
                                    </tr>
                                    <tr>
                                        <td>standard</td>
                                        <td>integer : StandardId</td>
                                    </tr>
                                    <tr>
                                        <td>perpage</td>
                                        <td>integer : PerPage</td>
                                    </tr>
                                    <tr>
                                        <td>page</td>
                                        <td>integer : PageNumber</td>
                                    </tr>
                                </table>
                            </td>
                            <td>To get all package detail. <br /><strong>sample response:</strong><br />{"status":true,"data":[{package info}]}</td>
                        </tr>
                        <tr>
                            <td>package/key</td>
                            <td>GET</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2"><strong>Required</strong></td>
                                    </tr>
                                    <tr>
                                        <td>id</td>
                                        <td>integer : PackageId</td>
                                    </tr>
                                </table>
                            </td>
                            <td>To get package detail. <br /><strong>sample response:</strong><br />{"status":true,"data":{package info}}</td>
                        </tr>
                        <tr>
                            <td>package/type</td>
                            <td>GET</td>
                            <td>-- NA --</td>
                            <td>To get all package types. <br /><strong>sample response:</strong><br />{"status":true,"data":[{packagetype info}]}</td>
                        </tr>
                        <tr>
                            <td>package/detail</td>
                            <td>GET</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2"><strong>Required</strong></td>
                                    </tr>
                                    <tr>
                                        <td>id</td>
                                        <td>integer : PackageId</td>
                                    </tr>
                                </table>
                            </td>
                            <td>To get package detail with content count. <br /><strong>sample response:</strong><br />{"status":true,"data":{package info}}</td>
                        </tr>
                        <tr>
                            <td>package/recommendation</td>
                            <td>GET</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2"><strong>Required</strong></td>
                                    </tr>
                                    <tr>
                                        <td>packageId</td>
                                        <td>integer : PackageId</td>
                                    </tr>
                                </table>
                            </td>
                            <td>To get recommendated package. <br /><strong>sample response:</strong><br />{"status":true,"data":[{package info}]}</td>
                        </tr>
                        <tr>
                            <td>package/review</td>
                            <td>POST</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2"><strong>Required</strong></td>
                                    </tr>
                                    <tr>
                                        <td>userId</td>
                                        <td>integer : UserId</td>
                                    </tr>
                                    <tr>
                                        <td>rating</td>
                                        <td>decimal : Rating | Range 0 to 5</td>
                                    </tr>
                                    <tr>
                                        <td>packageId</td>
                                        <td>integer : PackageId</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><strong>Optional</strong></td>
                                    </tr>
                                    <tr>
                                        <td>text</td>
                                        <td>string : Review Text</td>
                                    </tr>
                                </table>
                            </td>
                            <td>To save review. <br /><strong>sample response:</strong><br />{"status":true,"message":"record saved successfully."}</td>
                        </tr>
                        <tr>
                            <td>package/review</td>
                            <td>GET</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2"><strong>Required</strong></td>
                                    </tr>
                                    <tr>
                                        <td>packageId</td>
                                        <td>integer : PackageId</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><strong>Optional</strong></td>
                                    </tr>
                                    <tr>
                                        <td>limit</td>
                                        <td>integer : Limit</td>
                                    </tr>
                                </table>
                            </td>
                            <td>To get reviews. <br /><strong>sample response:</strong><br />{"status":true,"data":[{review info}]}</td>
                        </tr>
                        <tr>
                            <td>package/testimonial</td>
                            <td>GET</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2"><strong>Optional</strong></td>
                                    </tr>
                                    <tr>
                                        <td>standardId</td>
                                        <td>integer : StandardId</td>
                                    </tr>
                                    <tr>
                                        <td>limit</td>
                                        <td>integer : Limit</td>
                                    </tr>
                                </table>
                            </td>
                            <td>To get testimonial. <br /><strong>sample response:</strong><br />{"status":true,"data":[{testimonial info}]}</td>
                        </tr>
                        <tr>
                            <td>topic/key</td>
                            <td>GET</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2"><strong>Required</strong></td>
                                    </tr>
                                    <tr>
                                        <td>id</td>
                                        <td>integer : TopicId</td>
                                    </tr>
                                </table>
                            </td>
                            <td>To get topic detail. <br /><strong>sample response:</strong><br />{"status":true,"data":{topic info}}</td>
                        </tr>
                        <tr>
                            <td>topic/chapter</td>
                            <td>GET</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2"><strong>Required</strong></td>
                                    </tr>
                                    <tr>
                                        <td>id</td>
                                        <td>integer : ChapterId</td>
                                    </tr>
                                </table>
                            </td>
                            <td>To get all topics. <br /><strong>sample response:</strong><br />{"status":true,"data":[{topic info}]}</td>
                        </tr>
                        <tr>
                            <td>video/key</td>
                            <td>GET</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2"><strong>Required</strong></td>
                                    </tr>
                                    <tr>
                                        <td>id</td>
                                        <td>integer : VideoId</td>
                                    </tr>
                                </table>
                            </td>
                            <td>To get video detail. <br /><strong>sample response:</strong><br />{"status":true,"data":{video info}}</td>
                        </tr>
                        <tr>
                            <td>video/topic</td>
                            <td>GET</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2"><strong>Required</strong></td>
                                    </tr>
                                    <tr>
                                        <td>id</td>
                                        <td>integer : TopicId</td>
                                    </tr>
                                </table>
                            </td>
                            <td>To get video detail by topic. <br /><strong>sample response:</strong><br />{"status":true,"data":[{video info}]}</td>
                        </tr>
                        <tr>
                            <td>wishlist/user</td>
                            <td>GET</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2"><strong>Required</strong></td>
                                    </tr>
                                    <tr>
                                        <td>id</td>
                                        <td>integer : UserId</td>
                                    </tr>
                                </table>
                            </td>
                            <td>To get wishlist of user. <br /><strong>sample response:</strong><br />{"status":true,"data":[{package info}]}</td>
                        </tr>
                        <tr>
                            <td>wishlist/create</td>
                            <td>POST</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2"><strong>Required</strong></td>
                                    </tr>
                                    <tr>
                                        <td>userId</td>
                                        <td>integer : UserId</td>
                                    </tr>
                                    <tr>
                                        <td>packageId</td>
                                        <td>integer : PackageId</td>
                                    </tr>
                                </table>
                            </td>
                            <td>To save wishlist. <br /><strong>sample response:</strong><br />{"status":true,"data":true}</td>
                        </tr>
                        <tr>
                            <td>wishlist/delete</td>
                            <td>DELETE</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2"><strong>Required</strong></td>
                                    </tr>
                                    <tr>
                                        <td>user</td>
                                        <td>integer : UserId</td>
                                    </tr>
                                    <tr>
                                        <td>pack</td>
                                        <td>integer : PackageId</td>
                                    </tr>
                                </table>
                            </td>
                            <td>To remove wishlist item. <br /><strong>sample response:</strong><br />{"status":true,"data":"record deleted successfully."}</td>
                        </tr>
                        
                        <tr>
                            <th scope="row" rowspan="1">Orders</th>
                            <td>orders/user</td>
                            <td>GET</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2"><strong>Required</strong></td>
                                    </tr>
                                    <tr>
                                        <td>id</td>
                                        <td>integer : UserId</td>
                                    </tr>
                                </table>
                            </td>
                            <td>Will return all user's orders with items. <br /><strong>sample response:</strong><br />{"status":true,"data":{orders}}</td>
                        </tr>
                        
                        <tr>
                            <th scope="row" rowspan="8">Cart</th>
                            <td>cart/user</td>
                            <td>GET</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2"><strong>Required</strong></td>
                                    </tr>
                                    <tr>
                                        <td>id</td>
                                        <td>integer : UserId</td>
                                    </tr>
                                </table>
                            </td>
                            <td>Will return all details of cart with items. <br /><strong>sample response:</strong><br />{"status":true,"data":{cart info}}</td>
                        </tr>
                        
                        <tr>
                            <td>cart/coupon</td>
                            <td>GET</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2"><strong>Required</strong></td>
                                    </tr>
                                    <tr>
                                        <td>id</td>
                                        <td>integer : CouponId</td>
                                    </tr>
                                </table>
                            </td>
                            <td>Will return all details of coupon. <br /><strong>sample response:</strong><br />{"status":true,"data":{coupon info}}</td>
                        </tr>
                        <tr>
                            <td>cart/checkProduct</td>
                            <td>GET</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2"><strong>Required</strong></td>
                                    </tr>
                                    <tr>
                                        <td>cart_id</td>
                                        <td>integer : CartId</td>
                                    </tr>
                                    <tr>
                                        <td>package_id</td>
                                        <td>integer : PackageId</td>
                                    </tr>
                                    <tr>
                                        <td>order_type_id</td>
                                        <td>integer : OrderTypeId</td>
                                    </tr>
                                </table>
                            </td>
                            <td>To check product in cart. If product is already available in cart it will return item info in data part. <br /><strong>sample response:</strong><br />{"status":true,"data":{item info}}</td>
                        </tr>
                        <tr>
                            <td>cart/addProduct</td>
                            <td>POST</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2"><strong>Required</strong></td>
                                    </tr>
                                    <tr>
                                        <td>cart_id</td>
                                        <td>integer : CartId</td>
                                    </tr>
                                    <tr>
                                        <td>package_id</td>
                                        <td>integer : PackageId</td>
                                    </tr>
                                    <tr>
                                        <td>order_type_id</td>
                                        <td>integer : OrderTypeId</td>
                                    </tr>
                                </table>
                            </td>
                            <td>To add item to cart. <br /><strong>sample response:</strong><br />{"status":true,"data":true}</td>
                        </tr>
                        <tr>
                            <td>cart/updateDeliveryAddress</td>
                            <td>PUT</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2"><strong>Required</strong></td>
                                    </tr>
                                    <tr>
                                        <td>user</td>
                                        <td>integer : UserId</td>
                                    </tr>
                                    <tr>
                                        <td>address_id</td>
                                        <td>integer : AddressId</td>
                                    </tr>
                                </table>
                            </td>
                            <td>To set default billing and shipping address. <br /><strong>sample response:</strong><br />{"status":true,"data":true}</td>
                        </tr>
                        <tr>
                            <td>cart/update</td>
                            <td>PUT</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2"><strong>Required</strong></td>
                                    </tr>
                                    <tr>
                                        <td>cart</td>
                                        <td>integer : CartId</td>
                                    </tr>
                                </table>
                            </td>
                            <td>To update cart info. <br /><strong>sample response:</strong><br />{"status":true,"data":{cart info}}</td>
                        </tr>
                        <tr>
                            <td>cart/create</td>
                            <td>POST</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2"><strong>Required</strong></td>
                                    </tr>
                                    <tr>
                                        <td>user</td>
                                        <td>integer : UserId</td>
                                    </tr>
                                </table>
                            </td>
                            <td>To create cart. <br /><strong>sample response:</strong><br />{"status":true,"data":true}</td>
                        </tr>
                        <tr>
                            <td>cart/delete</td>
                            <td>DELETE</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2"><strong>Required</strong></td>
                                    </tr>
                                    <tr>
                                        <td>id</td>
                                        <td>integer : CartId</td>
                                    </tr>
                                </table>
                            </td>
                            <td>To delete cart. <br /><strong>sample response:</strong><br />{"status":true,"data":true}</td>
                        </tr>
                        <tr>
                            <th scope="row" rowspan="3">System</th>
                            <td>auth/login</td>
                            <td>POST</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2"><strong>Required</strong></td>
                                    </tr>
                                    <tr>
                                        <td>username</td>
                                        <td>string : UserName</td>
                                    </tr>
                                    <tr>
                                        <td>password</td>
                                        <td>string : UserPassword</td>
                                    </tr>
                                </table>
                            </td>
                            <td>if authenticated, it will return user information.</td>
                        </tr>
                        <tr>
                            <td>user/signup</td>
                            <td>POST</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2"><strong>Required</strong></td>
                                    </tr>
                                    <tr>
                                        <td>firstName</td>
                                        <td>string : FirstName</td>
                                    </tr>
                                    <tr>
                                        <td>password</td>
                                        <td>string : UserPassword</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><strong>Optional</strong></td>
                                    </tr>
                                    <tr>
                                        <td>middleName</td>
                                        <td>string : MiddleName</td>
                                    </tr>
                                    <tr>
                                        <td>lastName</td>
                                        <td>string : LastName</td>
                                    </tr>
                                    <tr>
                                        <td>email</td>
                                        <td>string : EmailAddress</td>
                                    </tr>
                                    <tr>
                                        <td>phone</td>
                                        <td>integer : PhoneNumber</td>
                                    </tr>
                                    <tr>
                                        <td>standard</td>
                                        <td>integer : StandardId</td>
                                    </tr>
                                    <tr>
                                        <td>userType</td>
                                        <td>integer : UserType</td>
                                    </tr>
                                    <tr>
                                        <td>isActive</td>
                                        <td>boolean : IsActive</td>
                                    </tr>
                                    <tr>
                                        <td>dp</td>
                                        <td>file : UserDisplayPicture</td>
                                    </tr>
                                </table>
                            </td>
                            <td>if created, it will return "user created successfully."<br /><strong>sample response:</strong><br />{"data":"user created successfully.","status":true}</td>
                        </tr>
                        <tr>
                            <td>log/event</td>
                            <td>POST</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2"><strong>Required</strong></td>
                                    </tr>
                                    <tr>
                                        <td>userId</td>
                                        <td>integer : User Id</td>
                                    </tr>
                                    <tr>
                                        <td>sessionId</td>
                                        <td>string : Session Id</td>
                                    </tr>
                                    <tr>
                                        <td>event</td>
                                        <td>string : Event Name like Login, Logout, Video</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><strong>Optional</strong></td>
                                    </tr>
                                    <tr>
                                        <td>userName</td>
                                        <td>string : User Name</td>
                                    </tr>
                                    <tr>
                                        <td>reference</td>
                                        <td>string : Reference ie. id of content</td>
                                    </tr>
                                </table>
                            </td>
                            <td>if logged, it will return message "event logged."<br /><strong>sample response:</strong><br />{"status":true,"message":"event logged."}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('footer'); ?>