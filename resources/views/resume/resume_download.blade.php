<html lang="{{ $lan }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $lan == 'fa' ? 'محمد ایمانی - رزومه' : 'Mohammad Imani - Resume'}}</title>
    <meta name="description" content="php laravel developer resume - Mohammad Imani"/>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('cv/css/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('cv/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('cv/styles/main.css') }}" rel="stylesheet">
    @if($lan == 'fa')
        <style>
            @import url("https://cdn.fontcdn.ir/Font/Persian/Vazir/Vazir.css");
            /* @import url("https://fonts.googleapis.com/css?family=Lora:400,700"); */
            body{
                color:#797979;
                font-family:"Vazir","Helvetica Neue",sans-serif;
                font-weight:400;
                line-height:1.625
            }
            ul{list-style-type:none;margin:0;padding:0}
            a:hover{text-decoration:none}
            button{cursor:pointer}
            button:focus{outline:0;box-shadow:none}
            h1,h2,h3,h4,h5,h6{
                font-family:"Vazir",serif;
                color:#3a414e;
                line-height:1.333;
                direction: rtl !important;
            }
        </style>
    @endif
</head>
<body id="top" dir="{{ $lan == 'fa' ? 'rtl' : 'ltr'}}">

@section('content')
<header>
    <div class="profile-page sidebar-collapse">
      <nav class="navbar navbar-expand-lg fixed-top navbar-transparent bg-primary" color-on-scroll="400">
        <div class="container">
          <div class="navbar-translate"><a class="navbar-brand" href="/" rel="tooltip">Emcode</a>
            <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-bar bar1"></span><span class="navbar-toggler-bar bar2"></span><span class="navbar-toggler-bar bar3"></span></button>
          </div>
        </div>
      </nav>
    </div>
</header>
<div class="page-content">
    <div>
        <div class="profile-page">
            <div class="wrapper">
                <div class="page-header page-header-small" filter-color="green">
                    <div class="page-header-image" data-parallax="true" style="background-image: url('/cv/images/cc-bg-1.jpg');"></div>
                    <div class="container">
                    <div class="content-center">
                        <div class="cc-profile-image"><a href="#"><img src="{{ $info->image }}" alt="Image"/></a></div>
                        <div class="h2 title">{{ $info->name }}</div>
                        <p class="category text-white">{{ $info->title }}</p><a class="btn btn-primary smooth-scroll mr-2" href="#contact" data-aos="zoom-in" data-aos-anchor="data-aos-anchor">@lang('resume.Hire Me')</a><a class="btn btn-primary" href="{{ route('download.resume') }}" data-aos="zoom-in" data-aos-anchor="data-aos-anchor">@lang('resume.Download CV')</a>
                    </div>
                    </div>
                    <div class="section">
                    <div class="container">
                        <div class="button-container">
                            <a class="btn btn-default btn-round btn-lg btn-icon" href="{{ $socials->facebook }}" rel="tooltip" title="Follow me on Facebook"><i class="fa fa-facebook"></i></a><a class="btn btn-default btn-round btn-lg btn-icon" href="{{ $socials->twitter }}" rel="tooltip" title="Follow me on Twitter"><i class="fa fa-twitter"></i></a><a class="btn btn-default btn-round btn-lg btn-icon" href="{{ $socials->linkedin }}" rel="tooltip" title="Follow me on Linkedin"><i class="fa fa-linkedin"></i></a><a class="btn btn-default btn-round btn-lg btn-icon" href="{{ $socials->instagram }}" rel="tooltip" title="Follow me on Instagram"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section" id="about">
            <div class="container">
                <div class="card" data-aos="fade-up" data-aos-offset="10">
                    <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="card-body">
                        <div class="h4 mt-0 title">@lang('resume.About')</div>
                            <p>{{ $info->about }}</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="card-body">
                        <div class="h4 mt-0 title">@lang('resume.Basic Information')</div>
                        <div class="row">
                            <div class="col-sm-4"><strong class="text-uppercase">@lang('resume.AGE'):</strong></div>
                            <div class="col-sm-8">{{ $info->age }}</div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-4"><strong class="text-uppercase">@lang('resume.EMAIL'):</strong></div>
                            <div class="col-sm-8">{{ $info->email }}</div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-4"><strong class="text-uppercase">@lang('resume.PHONE'):</strong></div>
                            <div class="col-sm-8">{{ $info->phone }}</div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-4"><strong class="text-uppercase">@lang('resume.ADDRESS'):</strong></div>
                            <div class="col-sm-8">{{ $info->address }}</div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-4"><strong class="text-uppercase">@lang('resume.LANGUAGE'):</strong></div>
                            <div class="col-sm-8">{{ json_decode($info->languages)[0] }}, {{ json_decode($info->languages)[1] }}</div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section" id="skill" dir="ltr">
            <div class="container">
                <div class="h4 text-center mb-4 title">@lang('resume.Professional Skills')</div>
                <div class="card" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                    <div class="card-body">
                        <div class="row">
                            @foreach($skills as $skill)
                                <div class="col-md-6">
                                    <div class="progress-container progress-primary"><span class="progress-badge">{{ $skill->title }}</span>
                                        <div class="progress">
                                        <div class="progress-bar progress-bar-primary" data-aos="progress-full" data-aos-offset="10" data-aos-duration="2000" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{ $skill->percentage }}%;"></div><span class="progress-value">{{ $skill->percentage }}%</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section" id="portfolio">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                    <div class="h4 text-center mb-4 title">@lang('resume.Portfolio')</div>
                    <div class="nav-align-center">
                        <ul class="nav nav-pills nav-pills-primary" role="tablist">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#web-development" role="tablist"><i class="fa fa-laptop" aria-hidden="true"></i></a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#graphic-design" role="tablist"><i class="fa fa-picture-o" aria-hidden="true"></i></a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Photography" role="tablist"><i class="fa fa-camera" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                    </div>
                </div>
                <div class="tab-content gallery mt-5">
                    <div class="tab-pane active" id="web-development">
                    <div class="ml-auto mr-auto">
                        <div class="row">
                            @foreach($portfolios as $port)
                                <div class="col-md-6">
                                    <div class="cc-porfolio-image img-raised" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                                        <a href="{{ $port->link }}">
                                            <figure class="cc-effect"><img src="{{ $port->image }}" alt="Image"/>
                                                <figcaption>
                                                    <div class="h4">{{ $port->title }}</div>
                                                    <p>{{ $port->work }}</p>
                                                </figcaption>
                                            </figure>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    </div>
                    <div class="tab-pane" id="graphic-design" role="tabpanel">
                    <div class="ml-auto mr-auto">
                        <div class="row">
                            @foreach($portfolios as $port)
                                <div class="col-md-6">
                                    <div class="cc-porfolio-image img-raised" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                                        <a href="{{ $port->link }}">
                                            <figure class="cc-effect"><img src="{{ $port->image }}" alt="Image"/>
                                                <figcaption>
                                                    <div class="h4">{{ $port->title }}</div>
                                                    <p>{{ $port->work }}</p>
                                                </figcaption>
                                            </figure>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    </div>
                    <div class="tab-pane" id="Photography" role="tabpanel">
                    <div class="ml-auto mr-auto">
                        <div class="row">
                            @foreach($portfolios as $port)
                                <div class="col-md-6">
                                    <div class="cc-porfolio-image img-raised" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                                        <a href="{{ $port->link }}">
                                            <figure class="cc-effect"><img src="{{ $port->image }}" alt="Image"/>
                                                <figcaption>
                                                    <div class="h4">{{ $port->title }}</div>
                                                    <p>{{ $port->work }}</p>
                                                </figcaption>
                                            </figure>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section" id="experience">
            <div class="container cc-experience">
                <div class="h4 text-center mb-4 title">@lang('resume.Work Experience')</div>
                @foreach($experiences as $exp)
                    <div class="card">
                        <div class="row">
                            <div class="col-md-3 bg-primary" data-aos="fade-right" data-aos-offset="50" data-aos-duration="500">
                                <div class="card-body cc-experience-header">
                                <p>{{ $exp->years }}</p>
                                <div class="h5">{{ $exp->company }}</div>
                                </div>
                            </div>
                            <div class="col-md-9" data-aos="fade-left" data-aos-offset="50" data-aos-duration="500">
                                <div class="card-body">
                                <div class="h5">{{ $exp->job_title }}</div>
                                <p>{{ $exp->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="section">
            <div class="container cc-education">
                <div class="h4 text-center mb-4 title">@lang('resume.Education')</div>
                @foreach($educations as $education)
                    <div class="card">
                        <div class="row">
                        <div class="col-md-3 bg-primary" data-aos="fade-right" data-aos-offset="50" data-aos-duration="500">
                            <div class="card-body cc-education-header">
                            <p>{{ $education->years }}</p>
                            <div class="h5">{{ $education->degree }}</div>
                            </div>
                        </div>
                        <div class="col-md-9" data-aos="fade-left" data-aos-offset="50" data-aos-duration="500">
                            <div class="card-body">
                                <div class="h5">{{ $education->title }}</div>
                                <p class="category">{{ $education->organization }}</p>
                                <p>{{ $education->description }}</p>
                            </div>
                        </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<footer class="footer">
    <div class="container text-center">
        <a class="cc-facebook btn btn-link" href="{{ $socials->facebook }}"><i class="fa fa-facebook fa-2x " aria-hidden="true"></i></a><a class="cc-twitter btn btn-link " href="{{ $socials->twitter }}"><i class="fa fa-twitter fa-2x " aria-hidden="true"></i></a><a class="cc-linkedin btn btn-link" href="{{ $socials->linkedin }}"><i class="fa fa-linkedin fa-2x" aria-hidden="true"></i></a><a class="cc-instagram btn btn-link" href="{{ $socials->instagram }}"><i class="fa fa-instagram fa-2x " aria-hidden="true"></i></a>
    </div>
    <div class="h4 title text-center">{{ $info->name }}</div>
    <div class="text-center text-muted">
      <p>&copy; Creative CV. All rights reserved.<br>Design - <a class="credit" href="{{ url('/') }}" target="_blank">Emcode.ir</a></p>
    </div>
</footer>
<script src="{{ asset('cv/js/core/jquery.3.2.1.min.js') }}"></script>
<script src="{{ asset('cv/js/core/popper.min.js') }}"></script>
<script src="{{ asset('cv/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('cv/js/now-ui-kit.js?v=1.1.0') }}"></script>
<script src="{{ asset('cv/js/aos.js') }}"></script>
<script src="{{ asset('cv/scripts/main.js') }}"></script>
</body>
</html>
