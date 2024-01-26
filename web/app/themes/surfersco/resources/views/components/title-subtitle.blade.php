@php

    if(!isset($title)){
        $title = get_sub_field('title_block_title_sub');
    }

    if(!isset($subtitle)){
        $subtitle = get_sub_field('subtitle_block_title_sub');
    }
@endphp

@if(!empty($slogan) || !empty($subtitle))
    <section class="title-subtitle">
        <div class="container">
            @if(!empty($slogan))
                <div class="titlen">{{ $slogan }}</div>
            @endif
            @if(!empty($subtitle))
                <div class="subtitle">{{ $subtitle }}</div>
            @endif
        </div>
    </section>
@endif

@php
    unset($hero,$slogan,$subtitle);
@endphp