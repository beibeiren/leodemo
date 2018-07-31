<?php
foreach ($data as $boards) {
 $link = [
     'controller' => 'Boards',
     'action' => 'show/' . $board->id
 ];
 $content = h($board->content);
 $body = $this->Text->truncate($content, 200,[
     'ending' => '...',
     'exact' => true,
     'html'  => true,
 ]);
 echo $this->Rss->item([],[
  'title' => $board->title,
  'link' => $link,
  'guid' => [
      'url' => $link,
      'isPermaLink' => 'true'
      ],
      'description' => $body,
      'pubDate' => null
       ]);
}

