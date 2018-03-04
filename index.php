<?php  
ini_set("session.cookie_lifetime","2700");
ini_set("session.gc_maxlifetime","2700");
 session_start();
 $_SESSION["usuario"]="";
 ?>




<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="autdor" content="">


    <!-- Latest minified bootstrap css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

    <!-- Latest minified bootstrap js -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
    <link rel="stylesheet" href="/path/to/bootstrap-material-datetimepicker.css">
    <script src="/path/to/bootstrap-material-datetimepicker.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>


    <style>
        .form-control {

            height: 35px !important;

        }

    </style>

    <script>
        window.onload = function() {


            $('#myModal').modal('show');
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth() + 1; //January is 0!
            var yyyy = today.getFullYear();
            if (dd < 10) {
                dd = '0' + dd;
            }
            if (mm < 10) {
                mm = '0' + mm;
            }
            var today = yyyy + '-' + mm + '-' + dd;
            var today = yyyy + '-' + mm + '-' + dd;
            document.getElementById('fecha').value = today;
        }

    </script>

</head>

<body style="background: url(wall3.jpg);background-size: cover;  background-repeat: no-repeat;" width="800px" height="600px">


    <!--<div id ="divplayer" style="position: fixed; z-index: -99; width: 100%; height: 100%">
  <iframe id="ytplayer" allowfullscreen frameborder="0" height="100%" width="100%"
    src="https://youtube.com/embed/rJIpHT_2LvA?autoplay=1&controls=0&showinfo=0&autohide=1&mute=1&loop=1">
  </iframe>
</div>

-->

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-body">
            <form name="form" action="valida_login.php" method="post">

                <div id="loginbox" style="margin-top:50px;margin-left:34%" class="col-sm-4">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Acceso a Sistema VOD</div>
                            <!-- <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>  -->
                        </div>


                        <div style="padding-top:30px" class="panel-body">

                            <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                            <form id="loginform" class="form-horizontal" role="form">

                                <div style="margin-bottom: 25px" class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input id="login-username" id="usuario" type="text" class="form-control" name="usuario" value="" placeholder="Usuario">
                                </div>

                                <div style="margin-bottom: 25px" class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                                </div>





                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
                                        <input name="ingresar" class="btn btn-primary large" type="submit" value="Ingresar" title="Ingresar" />


                                    </div>
                                </div>

                            </form>

                            <!--   <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                            Don't have an account! 
                                        <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                            Sign Up Here
                                        </a>
                                        </div>
                                    </div>
                                </div>  -->


            </form>



            </div>
            </div>
            </div>

        </div>

    </div>


</body>
