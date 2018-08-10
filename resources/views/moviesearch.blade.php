<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <!-- google font -->
    <link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- custom css -->
    <link rel="stylesheet" href="/css/style.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- tailwind cdn -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap (MDB)-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.4/css/mdb.min.css" rel="stylesheet">
    </head>
  <body>

    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
         Movies
      </div>
    </nav>
    <div class="container mt-4">
        <form class="" action="moviesapi" method="post">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="movie">Type the movie title</label>
              <input type="text" class="form-control" id="" name="movie">
            </div>
            <button type="submit" name="button" class="bt btn-sm btn-success">Search</button>
        </form>

    </div>
    <div class="container">
        <h1 class="mb-3 mt-4 text-center mb-4">Here is the movie information</h1>

        <div class="row">
            <div class="col-md-3">
                <img src="{{ $result->poster }}" alt="" class="img-thumbnail" style="box-shadow: 10px 10px 5px -7px rgba(163,160,163,1);">
            </div>
            <div class="col-md-4">
                <ul class="list-group">
                  <li class="list-group-item">
                      <strong>Title:</strong>
                      {{ $result->title }}
                  </li>
                  <li class="list-group-item">
                      <strong>Year:</strong>
                      {{ $result->year }}
                  </li>
                  <li class="list-group-item">
                      <strong>Released:</strong>
                      {{ $result->released }}
                  </li>
                  <li class="list-group-item">
                      <strong>Run-time:</strong>
                      {{ $result->runtime }}
                  </li>
                  <li class="list-group-item">
                      <strong>Genre:</strong>
                      {{ $result->genre }}
                  </li>
                </ul>
            </div>
            <div class="col-md-4">
                <ul class="list-group">
                  <li class="list-group-item">
                      <strong>Director:</strong>
                      {{ $result->director }}
                  </li>
                  <li class="list-group-item">
                      <strong>Actors:</strong>
                      {{ $result->actors }}
                  </li>
                  <li class="list-group-item">
                      <strong>About:</strong>
                      {{ $result->plot }}
                  </li>
                  <li class="list-group-item">
                      <strong>Rating:</strong>
                      {{ $result->rating }}
                  </li>

                </ul>
            </div>
        </div>

    </div>









      <!-- JQuery -->
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
      <!-- MDB core JavaScript -->
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.4/js/mdb.min.js"></script>
  </body>
</html>
