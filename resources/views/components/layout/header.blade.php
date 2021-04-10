<meta charset="utf-8" />

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="project-subdomain" content="{{config()->get('project')->subdomain}}" />
<meta name="project-name" content="{{config()->get('project')->name}}" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="author" content="Arassa Pikir">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />

{!!  \App\Helpers\Assets::version('css/plugins.bundle.min.css', 'css') !!}
{!!  \App\Helpers\Assets::version('css/prismjs.bundle.min.css', 'css') !!}
{!!  \App\Helpers\Assets::version('css/style.bundle.min.css', 'css') !!}
{!!  \App\Helpers\Assets::version('css/base.min.css', 'css') !!}
{!!  \App\Helpers\Assets::version('css/menu.min.css', 'css') !!}
{!!  \App\Helpers\Assets::version('css/brand.min.css', 'css') !!}
{!!  \App\Helpers\Assets::version('css/aside.min.css', 'css') !!}
{!!  \App\Helpers\Assets::version('css/toastr.min.css', 'css') !!}
{!!  \App\Helpers\Assets::version('css/custom.css', 'css') !!}

<link rel="shortcut icon" href="{{asset("images/projects/" . config()->get('project')->subdomain . "/favicon.ico ")}}" />
