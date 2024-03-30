@php
    $active_plugins = get_option('active_plugins');

    if(in_array('woocommerce/woocommerce.php', $active_plugins) && in_array('advanced-custom-fields-pro/acf.php', $active_plugins)){
        $customProduct = false;
        $args = array(
            'status' => 'publish',
            'type' => 'simple',
            'parent' => null,
            'limit' => get_option( 'posts_per_page' ),  // -1 for unlimited
            'offset' => null,
            'page' => 1,
            'orderby' => 'date',
            'order' => 'DESC',
            'return' => 'objects',
            'paginate' => false,
            'shipping_class' => array(),
        );

        $products = wc_get_products( $args );

        if($products){
            $product = $products[0]; //IF YOU WANT MORE PRODUCTS, CYCLE THROUGH. I NEED ONLY THE FIRST
            $productName = $product->get_name();
            $image_url = wp_get_attachment_image_url($product->get_image_id(), 'full');
            $galleryImagesIds = $product->get_gallery_image_ids();
            $price = wc_price($product->get_price());
            $tabs = get_field('tabs_info_product', $product->get_id());
        }
    } else {
        $customProduct = true;
        $productName = "1 JR Surfboards The Donny Stoker Yellow/Green Rail Fade";
        $price = "\$ 499.99";
        $customDescription = "LOREM IPSUM";
    }
@endphp

@if(isset($product) || $customProduct)
    <section class="container product-card">
        <div class="col product-images">
            @if(isset($image_url))
                <img src="{{ $image_url }}" class="product-image" />
            @else
                <img src="@asset('images/board-1.png')" class="product-image" />
            @endif

            <div class="thumbnails my-auto">
                @if(isset($galleryImagesIds))
                    @foreach ($galleryImagesIds as $galleryImageId)
                        <img src="{{  wp_get_attachment_image_url($galleryImageId) }}" />
                    @endforeach
                @else
                    <img src="@asset('images/thumb1.png')" />
                    <img src="@asset('images/thumb2.png')" />
                    <img src="@asset('images/thumb3.png')" />
                    <img src="@asset('images/thumb4.png')" />
                @endif
            </div>
        </div>
        <div class="col product-data">
            <div class="prod-name-reviews">
                <div class="prod-name">{{ $productName }}</div>
            </div>

           <div class="prod-description">
                @if(!empty($tabs))
                    <ul class="tabs">
                        @foreach($tabs as $index => $tab)
                            <li id="{{ $tab['titolo'] }}" class="{{ $index === 0 ? 'active' : '' }} tab-title" onclick="showTabText('{{ $tab['titolo'] }}')">
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
                    <div>{{ isset($product) ? $product->get_short_description() : $customDescription}}</div>
                @endif
            </div>
            <div class="price-cta">
                <div class="price"> {!! $price !!} </div>
                <button class="cta">Buy Product</button>
            </div>
        </div>
    </section>
@endif
