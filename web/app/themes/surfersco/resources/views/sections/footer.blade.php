<footer>
    @if (has_nav_menu('footer'))
        @php
            $menuItems = wp_get_nav_menu_items('footer');
            $totalItems = count($menuItems);
            $halfItems = ceil($totalItems / 2);
        @endphp
        <div class="container">
            <div class="row">
                <div class="col">
                    @foreach($menuItems as $index => $menuItem)
                        @if($index < $halfItems)
                            <a href="{{ $menuItem->url }}">{{ $menuItem->post_title }}</a>
                        @endif
                    @endforeach
                </div>
                <div class="col">
                    @foreach($menuItems as $index => $menuItem)
                        @if($index >= $halfItems)
                            <a href="{{ $menuItem->url }}">{{ $menuItem->post_title }}</a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    @endif
</footer>

<div class="modal fade" id="cookie-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-black" id="staticBackdropLabel">COOKIES</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-black">
                Do you want cookies?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Nope</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Yes</button>
            </div>
        </div>
    </div>
</div>
