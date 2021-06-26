<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h3>Simple Images & Videos Searchbar</h3>
  <p>It uses Pixabay API to fetch images & videos. Pixabay is a vibrant community of creatives, sharing copyright free images, videos and music. All contents are released under the Pixabay License, which makes them safe to use without asking for permission or giving credit to the artist - even for commercial purposes.</p>
  
  <form action="getImages.php" method="post">
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-image"></i></span>
      </div>
      <input type="text" class="form-control" placeholder="Search Images" id="usr" name="username" required>
    </div>
    <button type="submit" class="btn btn-primary" name="fetchImg">Submit</button>
  </form>
    <form action="getVideos.php" method="post" class="pt-5">
    <div class="input-group mb-3">
      <div class="input-group-prepend"> 
        <span class="input-group-text"><i class="fas fa-video"></i></span>
      </div>
      <input type="text" class="form-control" placeholder="Search Videos" id="usr" name="username" required>
    </div>
    <button type="submit" class="btn btn-primary" name="fetchVids">Submit</button>
  </form>
</div>

</body>
</html>

