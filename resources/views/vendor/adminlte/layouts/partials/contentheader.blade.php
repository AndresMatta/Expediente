<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Panel de @yield('htmlheader_title', 'Expediente Eletrónico')
        <small>@yield('contentheader_description')</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href={{ URL::to('/home') }}><span class="fa fa-home"></span> Página principal</a></li>
        <li class="active">@yield('htmlheader_title')</li>
    </ol>
</section>