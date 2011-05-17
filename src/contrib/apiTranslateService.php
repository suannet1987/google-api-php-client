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

/**
 * The Translate service implementation
 *
 * Generated by http://code.google.com/p/google-api-php-client/
 * Generated from: https://www.googleapis.com/discovery/v0.3/describe/translate/v2
 **/
class apiTranslateService {

  // Variables that the apiServiceResource implementation depends on
  private $serviceName = 'translate';
  private $version = 'v2';
  private $restBasePath = '/language/translate/';
  private $rpcPath = '/rpc';
  private $io;
  // apiServiceResource's that are used internally
  private $detections;
  private $languages;
  private $translations;

  /**
   * Constructs the internal service representations and does the auto-magic configuration required to drive them
   */
  public function __construct(apiClient $apiClient) {
    $apiClient->addService('translate', 'v2');
    $this->io = $apiClient->getIo();
    $this->detections = new apiServiceResource($this, $this->serviceName, 'detections', json_decode('{"methods":{"list":{"restPath":"v2\/detect","rpcMethod":"language.detections.list","httpMethod":"GET","description":"Detect the language of text.","parameters":{"q":{"restParameterType":"query","required":true,"repeated":true,"description":"The text to detect","type":"string"}},"parameterOrder":["q"],"response":{"$ref":"DetectionsListResponse"}}}}', true));
    $this->languages = new apiServiceResource($this, $this->serviceName, 'languages', json_decode('{"methods":{"list":{"restPath":"v2\/languages","rpcMethod":"language.languages.list","httpMethod":"GET","description":"List the source\/target languages supported by the API","parameters":{"target":{"restParameterType":"query","description":"the language and collation in which the localized results should be returned","type":"string"}},"response":{"$ref":"LanguagesListResponse"}}}}', true));
    $this->translations = new apiServiceResource($this, $this->serviceName, 'translations', json_decode('{"methods":{"list":{"restPath":"v2","rpcMethod":"language.translations.list","httpMethod":"GET","description":"Returns text translations from one language to another.","parameters":{"format":{"restParameterType":"query","description":"The format of the text","type":"string","enum":["html","text"],"enumDescriptions":["Specifies the input is in HTML","Specifies the input is in plain textual format"]},"q":{"restParameterType":"query","required":true,"repeated":true,"description":"The text to translate","type":"string"},"source":{"restParameterType":"query","description":"The source language of the text","type":"string"},"target":{"restParameterType":"query","required":true,"description":"The target language into which the text should be translated","type":"string"}},"parameterOrder":["q","target"],"response":{"$ref":"TranslationsListResponse"}}}}', true));
  }

  /**
   * Detect the language of text.
   *
   * @param $q   string The text to detect
   */
  public function listDetections($q) {
    return $this->detections->__call('list', array(array('q' => $q)));
  }

  /**
   * List the source/target languages supported by the API
   *
   * @param $target   string the language and collation in which the localized results should be returned
   */
  public function listLanguages($target = null) {
    return $this->languages->__call('list', array(array('target' => $target)));
  }

  /**
   * Returns text translations from one language to another.
   *
   * @param $q   string The text to translate
   * @param $target   string The target language into which the text should be translated
   * @param $format   string The format of the text, valid values are:
   *                 html : Specifies the input is in HTML
   *                 text : Specifies the input is in plain textual format
   * @param $source   string The source language of the text
   */
  public function listTranslations($q,
        $target,
        $format = null,
        $source = null) {
    return $this->translations->__call('list', array(array('q' => $q,
        'target' => $target,
        'format' => $format,
        'source' => $source)));
  }

  /**
   * @return the $io
   */
  public function getIo() {
    return $this->io;
  }

  /**
   * @return the $version
   */
  public function getVersion() {
    return $this->version;
  }

  /**
   * @return the $restBasePath
   */
  public function getRestBasePath() {
    return $this->restBasePath;
  }

  /**
   * @return the $rpcPath
   */
  public function getRpcPath() {
    return $this->rpcPath;
  }
}

