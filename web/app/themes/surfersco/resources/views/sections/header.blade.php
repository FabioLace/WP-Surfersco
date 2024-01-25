<header>
    <a class="title" href="{{ home_url('/') }}">
        {!! $siteName !!}
    </a>

    @if (has_nav_menu('header'))
        @php
            $menuItems = wp_get_nav_menu_items('header');
        @endphp
        <nav class="nav-primary links" aria-label="{{ wp_get_nav_menu_name('header') }}">
            @foreach($menuItems as $menuItem)
                <a href="{{ $menuItem->url }}"> {{ $menuItem->post_title }}</a>
            @endforeach
        </nav>
        <div class="socials"></div>
    @endif
</header>