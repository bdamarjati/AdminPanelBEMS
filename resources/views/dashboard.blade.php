<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>DASHBOARD CTM-IOT</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
    </head>
    <body>
              <nav class="navbar navbar-dark bg-light" style="padding: 0; background: #cfcfeaa6 !important; box-shadow: 0px 0px 15px 1px #707098;">
                <div style="color: #3e3e3e; padding: 10px 2rem 0 2rem;" class="titleNav">
                        <div>
                            <h1 style="font-weight: bold;">CTM - IOT</h1>
                            <p class="description-text">
                              Portable Contactless Temperature Measurement as a Prevention The Spread of COVID-19
                            </p>
                        </div>
                    </div>
                    @if(!Auth()->user())
                        <div class="loginNav" style="padding: 0 4rem 0 0">
                            <a href="#" style="color: #3e3e3e; padding: 0.5rem 1rem 0.5rem 1rem; border-radius: 25%; border: 1px solid #949393;" id="LoginButton" data-toggle="modal" data-target="#loginModal">LOGIN</a>
                            <a href="#" onclick="openMenu()" style="color: black; display: none; font-size: 22px;" id="LoginBar"><i class="fa fa-bars"></i></a>
                            <div id="menu">
                                <div class="LoginWrapper">
                                <span class="close" id="closeWrapper">&times;</span></li>
                                    <form action="" id="LoginForm">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" style="text-align: center; border: none; font-size: 1rem;">
                                        <label for="password" style="padding-top: 1rem;">Password</label>
                                        <input type="password" name="password" style="text-align: center; border: none; font-size: 1rem;">
                                    </form>
                                </div>                  
                            </div>
                        </div>
                    @endif
                    @if(Auth()->user())
                      @if(!session()->get('hasClonedUser'))
                        <div class="loginNav" style="padding: 0 4rem 0 0;">
                        <a class="dropdown-toggle nav-link dropdown-user-link" style="color: #3e3e3e; padding: 0.5rem 1rem 0.5rem 1rem; border: 1px solid #949393;" id="LoginButton" href="#" data-toggle="dropdown" style="padding: 0 4rem 0 0">
                            <div class="user-nav d-sm-flex d-none"><span class="profile_name">{{ auth()->user()->name }}</span></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" style="top: 5rem; right: 4rem;">
                              <a class="dropdown-item" style="cursor: pointer" href="{{ route('logout') }}"><i class="fa fa-sign-out"></i> Logout</a>
                            </div>
                        </div>
                      @endif
                      @if(session()->get('hasClonedUser') == 1)
                        <div class="loginNav" style="padding: 0 4rem 0 0;">
                        <a class="nav-link" style="color: #3e3e3e; padding: 0.5rem 1rem 0.5rem 1rem; border: 1px solid #949393;" href="{{ route('backAdmin') }}" style="padding: 0 4rem 0 0">
                        <div class="user-nav d-sm-flex d-none"><span class="profile_name">Back</span></div>
                            </a>
                        </div>
                      @endif
                    @endif
              </nav>
            <div class="wrapper" style="max-height: calc(100vh - 11rem); position: relative;">
                <div class="container">
                 <div class="row" style="min-height: calc(100vh - 11rem);">
                  <div class="card" id="guts" style="margin: auto; width: 100%; height: 100%;">
                    <div class="value-container">
                      <span id="temp-text">Body Temperature Scan</span> <br />
                      <span id="temp-value">Waiting..</span>
                    </div>
                  </div>
                </div>
                </div>
            </div>
            
            <nav class="navbar fixed-bottom navbar-dark bg-light" style="right: 16px; left: 16px; bottom: 0; background: #cfcfeaa6 !important; box-shadow: 1px -2px 9px 0px #707098">
              <a class="navbar-brand" style="color: #3e3e3e; font-size: 12px; text-align: center; width: 100%; font-weight: bold;">
                <div id="footer-text-full">
                Copyright: Internet of Things (IoT) Laboratory, Faculty of Engineering, Universitas Sebelas Maret 2020
                <br>
                Contact Us : iotlab@ft.uns.ac.id
                </div>
                <div id="footer-text-short" style="display: none">
                Copyright: IoT Laboratory, Faculty of Engineering, UNS 2020
                <br>
                Contact Us : iotlab@ft.uns.ac.id
                </div>
              </a>
            </nav>

    {{-- Modal --}}
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header" style="border-bottom: none;">
            <h5 class="modal-title" id="loginModalTitle">LOGIN</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('loginData') }}" method="post" style="display: flex; flex-direction: column; text-align: center; width: 80%; margin: auto;">  
                {{ csrf_field() }}
                <label for="email">Email</label>
                <input type="text" name="email" style="text-align: center; border: 1px solid #d2d0d0 ;font-size: 1rem;">
                <label for="password" style="padding-top: 1rem;">Password</label>
                <input type="password" name="password" style="text-align: center; border: 1px solid #d2d0d0; font-size: 1rem;">
          </div>
          <div class="modal-footer" style="border-top: none;">
            <button type="submit" class="btn btn-primary">Login</button>
          </div>
            </form>
        </div>
      </div>
    </div>

    </body>
    <script>
        function openMenu(){
          document.getElementById("menu").style.display='block';
        };
        var closebtns = document.getElementsByClassName("close");
        var i;

        for (i = 0; i < closebtns.length; i++) {
          closebtns[i].addEventListener("click", function() {
            document.getElementById("menu").style.display = 'none';
          });
        }
    </script>
    <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
          var request = function() {
            var id = {!! auth()->user()->id !!};
            $.ajax({
              url: 'api/getData/'+id,
              success: function(data) {
                $data = data[0]['temperature'];
                getDate(id);
                if(time>10)
                {
                  $d = 0;
                }else{
                  $d = parseFloat($data).toFixed(2);
                }
                if($d == 0)
                {
                  $( "#temp-value" ).first().html( "<span id=temp-value> Waiting.. </span>" );
                  $( ".card" ).css('background','white');
                  $( ".card" ).css('color','black');
                  $( ".card" ).css('-webkit-text-stroke-color','white');
                }
                else if($d > 37.5)
                {
                  $( "#guts" ).data( "temp", { first : $d } );
                  $( "#temp-value" ).first().html( "<span id=temp-value style='color: white; -webkit-text-stroke-color: black;'>" + $( "#guts" ).data( "temp" ).first + "° </span><br> <span>Celcius</span>" );
                  $( ".card" ).css('background','#670101');
                  $( ".card" ).css('color','black');
                  $( ".card" ).css('-webkit-text-stroke-color','white');
                }else{
                  $( "#guts" ).data( "temp", { first : $d } );
                  $( "#temp-value" ).first().html( "<span id=temp-value style='color: white; -webkit-text-stroke-color: black'>" +  $( "#guts" ).data( "temp" ).first + "° </span><br> <span>Celcius</span>" );
                  $( ".card" ).css('background','#2eab2e');
                  $( ".card" ).css('color','white');
                  $( ".card" ).css('-webkit-text-stroke-color','black');
                }
              },
            });
          };
          setInterval(request, 1000);
        });


        function getDate(id){
          $.ajax({
            url: 'api/getDate/'+id,
            method: 'get',
            success: function(data) {              
              time = data;
            },
          });
        }

    </script>
</html>