<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link href="https://cdn.jsdelivr.net/npm/docsearch.js@2/dist/cdn/docsearch.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Kanit:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <script>
      $(document).ready(function(){
        //$("#table").hide();
        $("#show").click(function(){
            $("table").slideDown();
        });
      });
    </script>
    <title>Check Attendance</title>
  </head>  
  <body>
    <div class="container">
      <center><p><big><big><h1> Check Attendance </h1></big></center></p></big>
      <form action="attendance/searching.php" method="post">
        <div class="form-row align-items-center">
          <div class="col-auto my-1">
            <label class="mr-sm-2" for="inlineFormCustomSelect">Teacher Assistant</label>
            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name = "id">
              <option selected>Choose...</option>
              <?php require "attendance/option_teacher.php";?>
            </select>
          </div>
          <div class="col-auto my-1">
            <label class="mr-sm-2" for="inlineFormCustomSelect">Course</label>
            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name = "subject">
              <option selected>Choose...</option>
              <option value="MTH">Math</option>
              <option value="PHYSIC">Physic</option>
              <option value="CHEM">Chemistry</option>
            </select>
          </div>
          <button id = "search" type="submit" class="btn btn-primary search" style ="background-color : #ff7454; border-color : #ff7454; margin-top: 30px; "> SEARCH </button>
        </div>
      </form>
      <form action="attendance/searching.php" method="post">
        <div class="form-row align-items-center" id = "table">
          <table class="table table-striped">
            <thead>
              <tr>  
                <th scope="col">Student-ID</th>
                <th scope="col">Name</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>58070501020</td>
                <td>Otto</td>
                <td>
                  <form class="was-validated">
                    <div class="custom-control custom-checkbox mb-3">
                      <input type="checkbox" class="custom-control-input" id="customControlValidation1" required>
                      <label class="custom-control-label" for="customControlValidation1"></label>
                    </div>
                  </form>
                </td>
              </tr>
              <tr>
                <td>58070501021</td>
                <td>Thornton</td>
                <td>
                  <form class="was-validated">
                    <div class="custom-control custom-checkbox mb-3">
                      <input type="checkbox" class="custom-control-input" id="customControlValidation2" required>
                      <label class="custom-control-label" for="customControlValidation1"></label>
                    </div>
                  </form>
                </td>
              </tr>
              <tr>
                <td>58070501052</td>
                <td>Purit Suwanpattana </td>
                <td>  
                  <form class="was-validated">
                    <div class="custom-control custom-checkbox mb-3">
                      <input type="checkbox" class="custom-control-input" id="customControlValidation3" required>
                      <label class="custom-control-label" for="customControlValidation1"></label>
                    </div>
                  </form>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <center><button id ="send" type="submit" class="btn btn-primary " style ="background-color : #ff7454; border-color : #ff7454;"> SAVE </button></center>
      </form>
    </div> 
  </body>
</html>