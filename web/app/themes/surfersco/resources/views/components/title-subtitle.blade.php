@php
    $active_plugins = get_option('active_plugins');

    if(in_array('advanced-custom-fields-pro/acf.php', $active_plugins)){
        //SHORTER
        if(!isset($title)){
            $title = get_sub_field('title_block_title_sub');
        }

        if(!isset($subtitle)){
            $subtitle = get_sub_field('subtitle_block_title_sub');
        }
    } else {
        $title = "Lorem ipsum";
        $subtitle = "Dolor sit amet";
    }
@endphp

@if(!empty($title) || !empty($subtitle))
    <section class="title-subtitle">
        <div class="container">
            @if(!empty($title))
                <div class="title">{{ $title }}</div>
            @endif
            @if(!empty($subtitle))
                <div class="subtitle">{{ $subtitle }}</div>
            @endif
        </div>
    </section>
@endif

@php
    unset($title,$subtitle);
@endphp