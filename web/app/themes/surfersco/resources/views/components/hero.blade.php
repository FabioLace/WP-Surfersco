@php
    $active_plugins = get_option('active_plugins');

    if(in_array('advanced-custom-fields-pro/acf.php', $active_plugins)){
        $hero = get_field('hero_section_home');

        if(!isset($slogan)){
            $slogan = $hero['slogan_hero'];
        }

        if(!isset($subtitle)){
            $subtitle = $hero['subtitle_hero'];
        }
    } else {
        $slogan = "Ride every wave as it's your last";
        $subtitle = "We love the motion of the ocean";
    }
@endphp

@if(!empty($slogan) || !empty($subtitle))
    <section class="hero">
        <div class="container">
            @if(!empty($slogan))
                <div class="slogan">{{ $slogan }}</div>
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