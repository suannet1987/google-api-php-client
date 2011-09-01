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
session_start();
require_once '../../src/apiClient.php';
require_once '../../src/contrib/apiTasksService.php';

// Visit https://code.google.com/apis/console to
// generate your oauth2_client_id, oauth2_client_secret, and to
// register your oauth2_redirect_uri.
// $apiConfig['oauth2_client_id'] = 'YOUR_OAUTH2_CLIENT_ID';
// $apiConfig['oauth2_client_secret'] = 'YOUR_OAUTH2_CLIENT_SECRET';
// $apiConfig['oauth2_redirect_uri'] = 'YOUR_REDIRECT_URI';
global $apiConfig;
$apiConfig['authClass'] = 'apiOAuth2';
$client = new apiClient();
$client->setApplicationName("Tasks_Example_App");
$tasksService = new apiTasksService($client);

if (isset($_SESSION['access_token'])) {
  $client->setAccessToken($_SESSION['access_token']);
} else {
  $client->setAccessToken($client->authenticate());
  $_SESSION['access_token'] = $client->getAccessToken();
}

if (isset($_GET['code'])) {
  header('Location: http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']);
}
?>
<!doctype html>
<html>
<head>
  <title>Tasks API Sample</title>
  <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Droid+Serif|Droid+Sans:regular,bold' />
  <link rel='stylesheet' href='css/style.css' />
</head>
<body>
<div id='container'>
  <div id='top'><h1>Tasks API Sample</h1></div>
  <div id='main'>
<?php
  $lists = $tasksService->tasklists->listTasklists();
  foreach ($lists['items'] as $list) {
    print "<h3>{$list['name']}</h3>";
    $tasks = $tasksService->tasks->listTasks($list['id']);
    foreach ($tasks['items'] as $task) {
      $updated = new Task($task);
      $updated->setNotes('Test');
      $updated->setTitle($task['title'] + ' ' . time());
      $tasksService->tasks->update($list['id'], $task['id'], $updated);
      print "<p id='post'>{$task['title']}</p>";
    }
  }
?>
  </div>
</div>
</body>
</html>
<?php $_SESSION['access_token'] = $client->getAccessToken(); ?>