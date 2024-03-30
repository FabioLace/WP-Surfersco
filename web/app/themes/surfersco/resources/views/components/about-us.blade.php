@php
    $active_plugins = get_option('active_plugins');

    if(in_array('advanced-custom-fields-pro/acf.php', $active_plugins)){
        $about = get_field('about_us_home');

        if(!isset($title)){
            $title = $about['titolo_about_us'];
        }

        if(!isset($text)){
            $text = $about['testo_about_us'];
        }

        if(!isset($link)){
            $link = $about['link_about_us'];
        }

        $showVideo = $about['mostra_video_about_us'];

    } else {
        $title = "We are Surfers co.";
        $text =
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt " .
            "ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris " .
            "nisi ut aliquip ex ea commodo consequat.";
        $link = [
            'url' => '#',
            'title' => 'Read more'
        ];
        $showVideo = false;
    }
@endphp

@if(!empty($title) || !empty($text))
    <section class="about-us">
        <div class="background-title">About us</div>
        <div class="wrapper-with-background">
            <div class="container">
                <div class="about">
                    <div class="content">
                        <div class="title-text">
                            @if(!empty($title))
                                <div class="title">{{ $title }}</div>
                                <i class="mdi mdi-close mx-auto"></i>
                            @endif
                            @if(!empty($text))
                                <div class="text">{{ $text }}</div>
                            @endif
                            @if(!empty($link))
                                <a href="{{ $link['url']}}">{{ $link['title'] }}</a>
                            @endif
                        </div>
                    </div>
                    @if($showVideo)
                        <div class="container about-video">
                            <video src="@asset('videos/surfers.webm')" autoplay loop muted />
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endif