<?php
if (isset($_POST['fetchImg'])) {

    /* If id is empty or not a number, then don't proceed fetching data */
    if (empty($_POST['username'])) {
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Sorry, No records found!');
    </script>");

    } else {
        $curl_handle = curl_init();
        $url = "https://pixabay.com/api/?key=22206642-d6d531ab82c00f17672b614bb&q=".$_POST['username']."&image_type=photo";
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

/* Create four equal columns that sits next to each other
And also over write left & right padding with internal stylesheet for col*/
.row > div {
      padding: 0 4px !important;
}

img {
    margin-top: 8px;
    vertical-align: middle;
  
}

</style>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Image Gallery</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container-fluid">
<div class="row">
    <?php
    for($m=0;$m<count($totrecords);$m++)
    {
    $imgURL = $totrecords[$m]->webformatURL;
    ?>
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
    <img src="<?php echo $imgURL; ?>"  class="img-fluid">
  </div>
    <?php
    }
    ?>
</div>
</div>
</body>
</html>

