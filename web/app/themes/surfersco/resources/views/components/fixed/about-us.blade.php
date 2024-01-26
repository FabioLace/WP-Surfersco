@php
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
@endphp

@if(!empty($title) || !empty($text))
    <section class="about-us">
        <div class="container">
            <div class="background-title">About us</div>
            <div class="about">
                <div class="surfer" style="background: url(@asset('images/surfer.jpg'))" alt="surfer"></div>
                <div class="text">
                    <div class="h2-text">
                        @if(!empty($title))
                            <div> {{ $title }}</div>
                            <i class="mdi-close mx-auto" />
                        @endif
                        @if(!empty($text))
                            <div>{{ $text }}</div>
                        @endif
                        @if(!empty($link))
                            <a href="{{ $link['url']}}">{{ $link['title'] }}</a>
                        @endif
                    </div>
                </div>
                @if($about['mostra_video_about_us'])
                    <video src="" class="about-video" autoplay loop muted />
                @endif
            </div>
        </div>
    </section>
@endif

@php
    unset($about,$title, $text, $link);
@endphp