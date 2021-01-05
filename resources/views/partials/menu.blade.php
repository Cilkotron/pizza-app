<section id="menu" class="gallery-area fix">
    <!-- Gallery Top Start -->
    <div class="gallery-top section-bg pt-90 pb-40" data-background="">
        <div class="container">
            <div class="row justify-content-center">
                <div class="cl-xl-7 col-lg-8 col-md-10">
                    <!-- Section Tittle -->
                    <div class="section-tittle text-center mb-70">
                        <span>Our Menu</span>
                        <h2 style="color: #084f5c !important">Menu</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="properties__button">
                    <!--Nav Button  -->
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            @foreach($categories as $category)
                            <a class="nav-item nav-link active" id="{{ $category->slug }}-tab" data-toggle="tab" href="#{{ $category->slug }}" role="tab" aria-controls="{{ $category->slug }}" aria-selected="true">{{ $category->slug }}</a>
                            @endforeach
                        </div>
                    </nav>
                    <!--End Nav Button  -->
                </div>
            </div>
    </div>


   <div class="container p-0">
    <div class="tab-content" id="nav-tabContent">
        @foreach($categories as $category )
                <div class="tab-pane fade show active" id="{{ $category->slug }}" role="tabpanel" aria-labelledby="{{ $category->slug }}-tab">
                        <div class="row">
                            @foreach($products as $product)
                            @if($product->category->slug == $category->slug )
                            <div class="col-sm-6 col-md-4 mt-5">
                                <div class="card responsive">
                                <div class="card-header responsive" style="display: block; margin: 0 auto;">
                                    <img class="img img-responsive" src="{{ Storage::disk('s3')->url($product->image)}}" class="card-img-top" alt="Pizza" style="max-height: 200px; max-width: 250x;">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <div class="mb-5">
                                    <p class="card-text text-truncate" >{{ $product->description }}</p>
                                    </div>
                                <div class="clearfix">
                                        <div class="float-left price" style="font-weight: bold; font-size: 16px; ">${{ number_format($product->price, 2) }}</div>
                                            <a href="{{ route('product.addToCart', $id = $product->id, ['id' => $product->id] ) }}" class="btn btn-success  float-right">Add To Cart</a>
                                    </div>
                                </div>
                                </div>
                            </div>

                            @endif
                            @endforeach
                        </div>
                </div>
        @endforeach
    </div>

   </div>



</section>
