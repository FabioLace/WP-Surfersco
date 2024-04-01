@php
    $active_plugins = get_option('active_plugins');

    if(in_array('woocommerce/woocommerce.php', $active_plugins) && in_array('advanced-custom-fields-pro/acf.php', $active_plugins)){
        $defaultProduct = false;
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
        //DEFAULT
        $defaultProduct = true;
        $productName = "1 JR Surfboards The Donny Stoker Yellow/Green Rail Fade";
        $price = "\$ 499.99";
        $defaultDescription =
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt " .
            "ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris " .
            "nisi ut aliquip ex ea commodo consequat.";
        $tabs = [
            [
                "titolo" => "Lorem",
                "testo" =>  "Lorem ipsum dolor sit amet, consectetur adipiscing elit,".
                            "sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. " .
                            "Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."
            ],
            [
                "titolo" => "Ipsum",
                "testo" =>  "Laoreet id donec ultrices tincidunt arcu non sodales. " .
                            "Et malesuada fames ac turpis egestas integer. Egestas purus viverra accumsan in nisl. " .
                            "A cras semper auctor neque vitae tempus quam. Nunc lobortis mattis aliquam faucibus purus in massa tempor. " .
                            "Cras semper auctor neque vitae tempus quam. Nulla malesuada pellentesque elit eget. " .
                            "Morbi leo urna molestie at elementum eu facilisis sed odio. Potenti nullam ac tortor vitae purus faucibus ornare suspendisse sed. " .
                            "Arcu risus quis varius quam. Ac tortor vitae purus faucibus ornare suspendisse. Ullamcorper morbi tincidunt ornare massa eget egestas " . 
                            "purus viverra."
            ],
            [
                "titolo" => "Dolor",
                "testo" =>  "Risus ultricies tristique nulla aliquet. Tempus egestas sed sed risus. Imperdiet dui accumsan " .
                            "sit amet nulla facilisi morbi tempus. A diam sollicitudin tempor id eu nisl nunc mi ipsum. " .
                            "Metus dictum at tempor commodo ullamcorper a lacus vestibulum. Egestas diam in arcu cursus. " . 
                            "Sapien nec sagittis aliquam malesuada. Tempor id eu nisl nunc mi ipsum faucibus vitae. " .
                            "Urna condimentum mattis pellentesque id nibh. Tempus imperdiet nulla malesuada pellentesque elit " .
                            "eget gravida cum. Luctus accumsan tortor posuere ac. Quam vulputate dignissim suspendisse in." .
                            "Odio morbi quis commodo odio. Ornare massa eget egestas purus viverra. Gravida rutrum quisque " .
                            "non tellus. Dignissim cras tincidunt lobortis feugiat vivamus. Pharetra magna ac placerat vestibulum lectus."
            ]
        ];
    }
@endphp

@if(isset($product) || $defaultProduct)
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
                    @for ($i = 1; $i <= 4; $i++)
                        <img src="@asset('images/thumb'.$i.'.png')" />
                    @endfor
                @endif
            </div>
        </div>
        <div class="col product-data">
            <div class="prod-name-reviews">
                <div class="prod-name">{{ $productName }}</div>
                <div class="reviews">
                    @for ($j = 1; $j <= 5; $j++)
                        <i id="star-{{ $j }}" class="mdi mdi-star-outline"></i>
                    @endfor
                    <a href="#">(51)</a>
                </div>
            </div>

           <div class="prod-description">
                @if(!empty($tabs))
                    <ul class="tabs">
                        @foreach($tabs as $index => $tab)
                            <li id="{{ $tab['titolo'] }}" class="{{ $index === 0 ? 'active' : '' }} tab-title" onclick="showTabText('{{ $tab['titolo'] }}')">
                                <a>{{ $tab['titolo'] }}</a>
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
                    <div>{{ isset($product) ? $product->get_short_description() : $defaultDescription}}</div>
                @endif
            </div>
            <div class="price-cta">
                <div class="price"> {!! $price !!} </div>
                <button class="cta">Buy Product</button>
            </div>
        </div>
    </section>
@endif
