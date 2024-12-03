<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Schoolar Questionaire Layout</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
        <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
        <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">
        <!--Navbar-->
    </head>
<body>
    <div class="container">
        <br>
        <div class="row">
                <div class="col-md-1">
                    </div>
                <div class="col-md-9" align="center">
            <h3>ADD QUESTION</h3>
                </div>
        </div>
        <form>
        <div class="row">
                <div class="col-md-1">
                    </div>
                <div class="col-md-9" align="center">
                        <h4 align="center">SCHOLARSHIP TYPE</h4>
                        <h5>
                       <label class="radio-inline">
                          <input type="radio" id="scholarship" name="scholarship" value="1" checked="true" onclick="Acad()">
                          <b>ACADEMIC</b>
                        </label>
                        <label class="radio-inline">
                                <input type="radio" id="scholarship" name="scholarship" value="4" onclick="TechVoc()">
                                <b>Senior High</b>
                              </label>
                        </h5>
                      </div>
        </div>
       <div class="row"> 
            <div class="form-group">
                    <label for="comment">Question:</label>
                    <textarea class="form-control" rows="5" id="q" name="q"></textarea>
                  </div>
       </div>
        </form>
    </div>
</body>                      
</html>