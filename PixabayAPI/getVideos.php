<?php
if (isset($_POST['fetchVids'])) {

    /* If id is empty or not a number, then don't proceed fetching data */
    if (empty($_POST['username'])) {
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Sorry, No records found!');
    </script>");

    } else {
        $curl_handle = curl_init();
        $url = "https://pixabay.com/api/videos/?key=22206642-d6d531ab82c00f17672b614bb&q=".$_POST['username']."&video_type=animation";
        curl_setopt($curl_handle, CURLOPT_URL, $url);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
        $curl_data = curl_exec($curl_handle);
        curl_close($curl_handle);
        $data = json_decode($curl_data);

    }
//    echo '<pre>';
//    print_r($data);
//    echo '</pre>';
//    die;
    $totrecords = $data->hits;
    if(empty($totrecords))
    {
     echo ("<script LANGUAGE='JavaScript'>
        window.alert('Sorry, No records found!');
        window.history.back();
    </script>");   
    }
}
?>
<style>

.modal {
  background-color: rgba(0,0,0,0.4);
}
.modal-header {
  border-bottom: 1px solid #505050;
  padding: 12px 16px 6px 16px;
  .modal-title {
    color: #ccc;
   
    margin: 0;
  }
  .close {
    font-size: 32px;
    opacity: 1.0;
    color: #ccc;
    text-shadow: none;
    outline: none;
  }
}
.modal-content {  
  border-radius:0;
  border: 0;
  background-color: #323232;
}
.img-responsive { width: 100%; }
button.btn-play {
  position: absolute;
  top: 0;
  bottom: 0;
  padding: 0;
  margin: 0;
  margin-left: -15px;
  border: 0;
  border-radius: 0;
  outline: 0 !important;
  width: 100%;
  background-color: transparent;
  color: rgba(245, 245, 245, 0.8);
  &:hover, &:active, &:visited, &:focus {
    color: rgba(255, 255, 255, 1.0);
  }
  .glyphicon {
    padding: 0;
    margin: 0;
    color: inherit;
    background-color: inherit;
    font-size: 64px;
  }
}
@media (min-width: 992px) and (max-width: 1199px) {
  button.btn-play {
    .glyphicon {
      font-size: 56px;
    }
  } 
}
@media (min-width: 768px) and (max-width: 991px) {
  button.btn-play {
    .glyphicon {
      font-size: 46px;
    }
  } 
}
@media (max-width: 767px) {
  a.video {
    display: block;
  }
   button.btn-play {
    .glyphicon {
      font-size: 56px;
    }
  }  
}

</style>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Image Gallery</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/4.0.1/ekko-lightbox.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/4.0.1/ekko-lightbox.min.js"></script> 
</head>
<body>

<div class="container-fluid">
    <div class="jumbotron">
   <h3 class="page-header text-center" id="youtube-gallery">Videos Gallery</h3>
    <p class="text-center font-weight-bold text-danger">Click on the thumbnail to open the videos. It plays the video in bootstrap lighbox.</p>
  </div>
  <div class="row">
      <?php
    for($m=0;$m<count($totrecords);$m++)
    {
    $vidURL = $totrecords[$m]->videos->medium->url;
    $vidWdith = $totrecords[$m]->videos->medium->width;
    $vidimg = $totrecords[$m]->userImageURL;
    ?>
    <a href="<?php echo $vidURL; ?>"
       data-width="<?php echo $vidWdith; ?>"
       data-toggle="lightbox" data-gallery="youtubevideos" class="col-sm-4 video">
      <button type="button" class="btn btn-play">
        <span class="glyphicon glyphicon-play" aria-label="Play"></span>
      </button>
      <img src="<?php echo $vidimg; ?>" class="img-responsive">
    </a>
      <?php
    }
    ?>
  </div>
</div>
<script>
    $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox();
});
</script>
</body>
</html>

