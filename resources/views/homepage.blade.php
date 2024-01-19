<x-app-layout>
    @if(session()->has('cartMessage'))
    <script type="text/javascript">
        alert("{{ session()->get('cartMessage') }}");
    </script>
    @endif
    <div class="homepage_content">
        <div class="container-fluid sidebar_wrapper">
            <div class="row flex-nowrap">
                @include('user/sidebar')
                <div class="col" style="margin-left: 10px;">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="image/carousel/carousel1.jpg" class="d-block w-100" alt="carousel1">
                            </div>
                            <div class="carousel-item">
                                <img src="image/carousel/carousel2.jpg" class="d-block w-100" alt="carousel2">
                            </div>
                            <div class="carousel-item">
                                <img src="image/carousel/carousel3.jpg" class="d-block w-100" alt="carousel3">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <div class="homepage_item_list">
                        @include('user/item-list')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>