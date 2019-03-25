<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="index.css"/>
  <title>Document</title>
</head>
<body>
    <div class="content">
        <div class="left">
          <div class="header">
            <header>Articles</header>
            <div class="Article-con">
              <?php
                //read the  articles.json file in data
                $json = file_get_contents('./data/articles.json');
                $json=json_decode($json);

                foreach ($json as $item) {
                  echo '<div class="article"> 
                  <h5>'.$item->title .'</h5>
                  <img src="'. $item->image.'"/>
                  <p class="detail">'.strip_tags($item->content) .'</p>
                  <a class="link" href="'.$item->url .'">Click here</a>
                  ';
                   echo '</div>';
                }
              ?>
            </div>
          </div>
        </div>
        <div class="right">
            <header>Events</header>
            <div class="Event-con">
                <?php
                   $json = file_get_contents('./data/events.json');
                   $json=json_decode($json);
                   //sorting by title
                   usort($json, function ($a, $b) {
                    return $a->title <=> $b->title;
                    }); 
                    //filtering out users interest
                    $user = file_get_contents('./data/user.json');
                    $user=json_decode($user);
                   
                  

                   foreach ($json as $item) {
                     $match=false;
                     foreach($user->interests as $interest){
                      if(in_array( $interest,$item->tags)){
                          $match=true;
                      }
                     }
                     if($match==true)
                     echo '<div class="event" >
                      <p class="e-head">    
                      '.$item->title.'<p>
                      <p class="det"><b>Location :</b> '. $item->location.'  </p>
                      <p class="det"><b>Date :</b> '.$item->date.' </p> 
                     </div>';
                   }
                ?>
            </div>
        </div>
       
    </div>
</body>
</html>

