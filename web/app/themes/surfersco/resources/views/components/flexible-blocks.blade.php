@php

    if(!isset($idForFlexContent)){
        $idForFlexContent = false;
    }

    $count = 0;

@endphp

@if (have_rows('blocchi_flessibili', $idForFlexContent))
    @while (have_rows('blocchi_flessibili', $idForFlexContent))
        @php
            the_row();
            $conta++;
        @endphp
        @if (get_row_layout() == 'header_pagina_intro_slider')
            @include('components.page-header-intro-slider')
        @endif
    @endwhile
    {{-- @include('components.card-prodotto'); --}}
@endif