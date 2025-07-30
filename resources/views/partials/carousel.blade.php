<div>
    <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-slide-to="0">
                <img src="{{ asset('images/1.jpg') }}" class="d-block w-100" alt="Image 1">
            </div>
            <div class="carousel-item" data-bs-slide-to="1">
                <img src="{{ asset('images/2.jpg') }}" class="d-block w-100" alt="Image 2">
            </div>
            <div class="carousel-item" data-bs-slide-to="2">
                <img src="{{ asset('images/3.jpg') }}" class="d-block w-100" alt="Image 3">
            </div>
            <div class="carousel-item" data-bs-slide-to="3">
                <img src="{{ asset('images/4.jpg') }}" class="d-block w-100" alt="Image 4">
            </div>
            <div class="carousel-item" data-bs-slide-to="4">
                <img src="{{ asset('images/5.jpg') }}" class="d-block w-100" alt="Image 5">
            </div>
            <div class="carousel-item" data-bs-slide-to="5">
                <img src="{{ asset('images/6.jpg') }}" class="d-block w-100" alt="Image 6">
            </div>
        </div>

        <!-- Carousel controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
</div>
