
<!DOCTYPE html>
<html lang="en">

<head>
<script
  src="https://code.jquery.com/jquery-3.7.0.js"
  integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
  crossorigin="anonymous"></script>

  <script>
    


function js_listaUtenti(){


$.ajax({

url: '/nuovo/accesso/dati',
type: 'GET',
dataType: "json",

data: {utente:$("#username").val()},
success: function (response) { 

    $("#dati").html("");

  console.log(response) ;
  response.forEach(function(value){

    $("#dati").append(value.username + "<br>")

  }
  )

},
error: function (response) {   console.log("Error" + response) ;},
});

}

</script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>
</head>

<body>
    <center>
    <br>
<div class="col-md-4">
<div class="card" >
  <div class="card-body">

        <table class="table table-responsive">
           
            <tr>
                <td>Cerca Nome:</td>
                <td><input class="form-control" type="text" id='username' name='username' value=''></td>
            </tr>
            
            <tr>
                <td colspan="2" align="center">
                    <input class="btn btn-success" type="button" value="cerca" style="width:200px;" onclick="js_listaUtenti();">
                    </td>
            </tr>
                
        </table>
    </div>
  </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>

        <div id="dati"><b>Ancora Nessun Risultato</b></div>
</body>

</html>