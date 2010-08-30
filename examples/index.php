<?php
session_start();

require_once "../src/apiClient.php";
require_once "../src/contrib/apiBuzzService.php";

$apiClient = new apiClient();

$buzz = new apiBuzzService($apiClient);
$apiClient->discover('buzz', 'v1');

if (isset($_SESSION['oauth_access_token'])) {
  $apiClient->setAccessToken($_SESSION['oauth_access_token']);
} else {
  $token = $apiClient->authenticate();
  $_SESSION['oauth_access_token'] = $token;
}

// Batch 2 functions
$results = apiBatch::execute(
  $apiClient->buzz->activities->list(array('userId' => 'chabotc', 'scope' => '@public'), 'listActivities')
  //$apiClient->buzz->people->get(array('userId' => '@me'), 'getPeople')
);
echo "<pre>Batch Results:\n". print_r($results, true)."</pre>";


// Old style call
//$activities = $apiClient->buzz->activities->list(array('userId' => '@me', 'scope' => '@consumption'));

/*
// New style using the apiBuzzService wrapper
$activities = $buzz->listActivities('@consumption', '@me');
echo "Activities: <pre>".print_r($activities, true)."</pre>";
*/

/*
// these both work when creating a buzz post!
$postBody = '
{
  "data": {
    "object": {
      "type": "note",
      "content": "Testing a new library"
    }
  }
}
';

$post = array(
  'data' => array(
     'object' => array(
        'type' => 'note',
        'content' => 'Testing a new library'
      )
  )
);

$newPost = $apiClient->buzz->activities->insert(array('userId' => '@me', 'postBody' => $post));
echo "<pre>post created:\n".print_r($newPost, true)."\n</pre>";
*/

//$comments = $apiClient->buzz->activities->list(array('userId' => '@me', 'scope' => '@comments', 'max-results' => 4, 'c' => 2));
//echo "Comments: <pre>".print_r($comments, true)."</pre>";

//$liked = $apiClient->buzz->activities->list(array('userId' => '@me', 'scope' => '@liked'));
//echo "Liked: <pre>".print_r($liked, true)."</pre>";

//$activites = $apiClient->buzz->activities->list(array('userId' => '@me', 'scope' => '@self'));
//echo "Activities: <pre>".print_r($activites, true)."</pre>";

//$people= $apiClient->buzz->people->get(array('userId' => '@me'));
//echo "People: <pre>".print_r($people, true)."</pre>";

//$followers = $apiClient->buzz->groups->get(array('userId' => 'chabotc', 'groupId' => '@followers'));
//echo "Followers: <pre>".print_r($followers, true)."</pre>";

//$followers = $apiClient->buzz->groups->get(array('userId' => 'chabotc', 'groupId' => 'tag:google.com,2010:buzz-group:108189587050871927619:13'));
//echo "Followers: <pre>".print_r($followers, true)."</pre>";

//$groups = $apiClient->buzz->groups->list(array('userId' => '@me', 'max-results' => 2));
//echo "Groups: <pre>".print_r($groups, true)."</pre>";

//$friends = $apiClient->buzz->people->list(array('userId' => '@me', 'groupId' => 'tag:google.com,2010:buzz-group:108189587050871927619:13', 'max-results' => 40));
//echo "Friends: <pre>".print_r($friends, true)."</pre>";
