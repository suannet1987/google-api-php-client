<?php
/*
 * Copyright 2011 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */


require_once 'service/apiServiceRequest.php';


  /**
   * The "diacritize" collection of methods.
   * Typical usage is:
   *  <code>
   *   $diacritizeService = new apiDiacritizeService(...);
   *   $diacritize = $diacritizeService->diacritize;
   *  </code>
   */
  class DiacritizeServiceResource extends apiServiceResource {


  }


  /**
   * The "corpus" collection of methods.
   * Typical usage is:
   *  <code>
   *   $diacritizeService = new apiDiacritizeService(...);
   *   $corpus = $diacritizeService->corpus;
   *  </code>
   */
  class DiacritizeCorpusServiceResource extends apiServiceResource {


    /**
     * Adds diacritical marks to the given message. (corpus.get)
     *
     * @param  $lang Language of the message
     * @param  $message Message to be diacritized
     * @param  $last_letter Flag to indicate whether the last letter in a word should be diacritized or not
     */
    public function get($lang, $last_letter, $message) {
      return $this->__call('get', array(array('lang' => $lang, 'message' => $message, 'last_letter' => $last_letter)));
    }
  }



/**
 * Service definition for Diacritize (v1).
 *
 * <p>
 * Lets you add diacritical marks to undiacritized text
 * </p>
 *
 * <p>
 * For more information about this service, see the
 * <a href="" target="_blank">API Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class apiDiacritizeService {

  // Variables that the apiServiceResource implementation depends on.
  private $serviceName = 'diacritize';
  private $version = 'v1';
  private $restBasePath = '/language/diacritize/';
  private $rpcPath = '/rpc';
  private $io;
  // apiServiceResource's that are used internally
  public $diacritize;
  /**
   * Constructs the internal representation of the Diacritize service.
   *
   * @param apiClient apiClient
   */
  public function __construct(apiClient $apiClient) {
     $apiClient->addService($this->serviceName, $this->version);
     $this->io = $apiClient->getIo();
     $this->diacritize = new DiacritizeServiceResource($this, $this->serviceName, 'diacritize', json_decode('{"resources": {"corpus": {"methods": {"get": {"parameters": {"lang": {"restParameterType": "query", "required": true, "type": "string"}, "message": {"restParameterType": "query", "required": true, "type": "string"}, "last_letter": {"restParameterType": "query", "required": true, "type": "boolean"}}, "rpcMethod": "language.diacritize.corpus.get", "httpMethod": "GET", "response": {"$ref": "LanguageDiacritizeCorpusResource"}, "restPath": "v1"}}}}}', true));
  }

  /**
   * @return $io
   */
  public function getIo() {
    return $this->io;
  }
  /**
   * @return $version
   */
  public function getVersion() {
    return $this->version;
  }

  /**
   * @return $restBasePath
   */
  public function getRestBasePath() {
    return $this->restBasePath;
  }

  /**
   * @return $rpcPath
   */
  public function getRpcPath() {
    return $this->rpcPath;
  }
}

class LanguageDiacritizeCorpusResource {

  public $diacritized_text;

  public function setDiacritized_text($diacritized_text) {
    $this->diacritized_text = $diacritized_text;
  }

  public function getDiacritized_text() {
    return $this->diacritized_text;
  }
  
}

