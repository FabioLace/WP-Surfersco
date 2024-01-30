@php
    $product_id = 62;
    $product = wc_get_product($product_id);

    //IMAGE
    $image_url = wp_get_attachment_image_url($product->get_image_id(), 'full');
    $galleryImagesIds = $product->get_gallery_image_ids();

    $tabs = get_field('tabs_info_product', $product_id);

@endphp

<section class="container product-card">
    <div class="col product-images">
        <img src="{{ $image_url }}" class="product-image">
        @if(!empty($galleryImagesIds))
            <div class="thumbnails my-auto">
                @foreach ($galleryImagesIds as $galleryImageId)
                    <img src="{{  wp_get_attachment_image_url($galleryImageId) }}" />
                @endforeach
            </div>
        @endif
    </div>
    <div class="col product-data">
        <div class="prod-name-reviews">
            <div class="prod-name">{{ $product->get_name() }}</div>
            {{--  @if(false)
                <div class="reviews">
                    rece
                </div>
            @endif --}}
        </div>

        <div class="prod-description">
            @if(!empty($tabs))
                <ul class="tabs">
                    @foreach($tabs as $index => $tab)
                        <li id="{{ $tab['titolo']}}" class="{{ $index === 0 ? 'active' : '' }} tab-title" onclick="showTabText('{{ $tab['titolo']}}')">
                            <a class="mx-4">{{ $tab['titolo'] }}</a>
                        </li>
                    @endforeach
                </ul>
                @foreach($tabs as $index => $tab)
                    <div id="text-{{ $tab['titolo'] }}" class="text tab-content" style="display: {{ $index === 0 ? 'block' : 'none' }}">
                        {{ $tab['testo'] }}
                    </div>
                @endforeach

                <script type="text/javascript">
                    function showTabText(tabId) {
                        document.querySelectorAll('.text.tab-content').forEach(function(content) {
                            if(content.style.display == 'block'){
                                content.style.display = 'none';
                            }
                        });

                        document.getElementById('text-' + tabId).style.display = 'block';

                        document.querySelectorAll('.tab-title').forEach(function(tab) {
                            if(tab.classList.contains('active')){
                                tab.classList.remove('active');
                            }
                        });

                        document.getElementById(tabId).classList.add('active');
                    }
                </script>
            @else
                <div> {{ $product->get_short_description() }}</div>
            @endif
        </div>
        <div class="price-cta">
            <div class="price"> {!! wc_price($product->get_price()) !!} </div>
            <button class="cta">Buy Product</button>
        </div>
    </div>
</section>