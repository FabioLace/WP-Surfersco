<footer>
    @if (has_nav_menu('footer'))
        @php
            $menuItems = wp_get_nav_menu_items('footer');
        @endphp
        <div class="grid">
            @foreach($menuItems as $menuItem)
                <a href="{{ $menuItem->url }}"> {{ $menuItem->post_title }}</a>
            @endforeach
        </div>
    @endif
</footer>
