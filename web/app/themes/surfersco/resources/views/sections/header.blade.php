
<header>
    <a class="title" href="{{ home_url('/') }}">{!! $siteName !!}</a>

    @if(has_nav_menu('header'))
        @php($menuItems = wp_get_nav_menu_items('header'))
        @if(!empty($menuItems))
            <nav class="nav-primary links" aria-label="{{ wp_get_nav_menu_name('header') }}">
                @foreach($menuItems as $menuItem)
                    <a href="{{ $menuItem->url }}"> {{ $menuItem->post_title }}</a>
                @endforeach
            </nav>
        @else
            <nav class="nav-primary links" aria-label="header">
                <a href="#">Boards</a>
                <a href="#">Accessories</a>
                <a href="#">Blog</a>
                <a href="#">Technology</a>
                <a href="#">Team</a>
                <a href="#">Dealers</a>
            </nav>
        @endif
    @endif
    <div class="socials">
        <a href="#"><i class="mdi mdi-facebook"></i></a>
        <a href="#"><i class="mdi mdi-instagram"></i></a>
        <a href="#"><i class="mdi mdi-email"></i></a>
    </div>
</header>