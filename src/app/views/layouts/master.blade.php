<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('pageTitle')</title>
        <meta name="description" content="@yield('metaDescription')" />
        <meta name="keywords" content="@yield('metaKeywords')" />

        <!-- Bootstrap, Fonts, and Custom -->
        {{ HTML::style('css/bootstrap.min.css'); }}
        {{ HTML::style('css/bootstrap-theme.min.css'); }}
        {{ HTML::style('http://fonts.googleapis.com/css?family=Roboto|Montserrat'); }}
        {{ HTML::style('css/custom.css'); }}
        {{ HTML::style('css/datepicker.css'); }}

        <!-- HTML5 Shim and Respond.js -->
        <!--[if lt IE 9]>
            {{ HTML::script('https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js'); }}
            {{ HTML::script('https://oss.maxcdn.com/respond/1.4.2/respond.min.js'); }}
        <![endif]-->
    </head>
	<body>

        @section('navbar')
            <!-- Fixed navbar -->
            <div class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">bythenerds</a>
                    </div>
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="#">Home</a></li>
                            <li><a href="#about">About</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#contactModal">Contact</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Work <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Web Development</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Marketing & Design</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Consulting</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Web Security</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Immediate Fix</a></li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="vertical"><button type="button" class="btn btn-danger">Emergency Contact</button></li>
                            <li class="divider">&nbsp;</li>
                            <li class="vertical"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">Client Portal</button></li>
                        </ul>                        
                    </div><!--/.nav-collapse -->
                </div>
            </div>
            <!-- End Fixed navbar -->
        @show

        <div class="container">
            <div class="jumbotron masthead">
                @yield('masthead')
            </div>
        </div> <!-- /container -->
        <div class="container">
            <div class="col-md-12 main">
                @yield('content')
            </div>
        </div>

        @section('contactModal')
            <!-- Contact Modal -->
            <div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                {{ Form::open(array('url'=>'/contact', 'id'=>'quickquote', 'role'=>'form', 'class'=>'form')) }}
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Contact Us</h4>
                      </div>
                      <div class="modal-body">
                        ...
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        {{ Form::submit('Submit Form', array('class'=>'btn btn-primary')); }}
                      </div>
                    </div>
                  </div>
                {{ Form::close(); }}
            </div>            
        @show

        <!-- Login Modal -->
        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            {{ Form::open(array('url'=>'/client', 'id'=>'quickquote', 'role'=>'form', 'class'=>'form')) }}
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Client Portal Login</h4>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            {{ Form::input('email_address', null, null, array('placeholder'=>'Email Address', 'class'=>'form-control')); }}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                            {{ Form::password('password', array('placeholder'=>'Password', 'class'=>'form-control')); }}
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    {{ Form::submit('Login', array('class'=>'btn btn-primary')); }}
                  </div>
                </div>
              </div>
            {{ Form::close(); }}
        </div>

        <!-- jQuery -->
        {{ HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'); }}
        <!-- Bootstrap -->
        {{ HTML::script('js/bootstrap.min.js'); }}

        @section('index.js')
            {{ HTML::script('js/bootstrap-datepicker.js'); }}
            <script type="text/javascript">
                if($('.date-needed').length) {
                    $('.date-needed').datepicker();
                }

                $('.primary-need').on('change', function() {
                    var val = $('.primary-need').val();
                    // alert(val);

                    if(val != 'blank') {
                        $('.need-check').removeClass('hidden');
                        $('.price-range').removeAttr('disabled');
                    }else{
                        if(!$('.need-check').hasClass('hidden')) {
                            $('.need-check').addClass('hidden');
                            $('.price-range').attr('disabled','disabled');
                        }
                    }
                });

                $('.price-range').on('change', function() {
                    var val = $('.price-range').val();
                    // alert(val);

                    if(val != 'blank') {
                        $('.price-check').removeClass('hidden');
                        $('.date-needed').removeAttr('disabled');
                    }else{
                        if(!$('.price-check').hasClass('hidden')) {
                            $('.price-check').addClass('hidden');
                            $('.date-needed').attr('disabled', 'disabled');
                        }
                    }
                });

                $('.day').on('click', function() {
                    $('.submit-quote').removeClass('hidden');
                });

            </script>
        @show

        </body>
</html>