@extends('layouts.app')

@section('content')
        <!-- about section start -->
        <div class="about_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 about_main">
                    <h1 class="about_text">SER<span style="color: #f7566e;">VICE</span></h1>
                    <p class="dummy_text">Les sites web de bibliothèques proposent une variété de services 
                      pour simplifier l'accès aux ressources et aux informations. Ils offrent généralement des 
                      fonctionnalités telles que la recherche en ligne, la consultation du catalogue, le renouvellement 
                      des emprunts, les réservations et les demandes, l'accès aux ressources électroniques, les services de référence,
                       ainsi que des informations sur les événements et programmes proposés par la bibliothèque. Ces services visent à
                        rendre l'expérience des utilisateurs plus pratique et enrichissante en leur permettant d'explorer et d'utiliser
                       les ressources de la bibliothèque de manière efficace et accessible.</p>
                    <div class="read_bt"><a href="#">Read More</a></div>
                </div> 
                <div class="col-sm-8">
                    <div style="margin-left: 240px;"><img src="{{ asset('images/livre.png') }}"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- about section end -->

 @endsection