<div class="mb-5">
    <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/1.jpg') }}" class="d-block w-100" alt="Image 1">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/2.jpg') }}" class="d-block w-100" alt="Image 2">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/3.jpg') }}" class="d-block w-100" alt="Image 3">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/4.jpg') }}" class="d-block w-100" alt="Image 4">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/5.jpg') }}" class="d-block w-100" alt="Image 5">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/2.jpg') }}" class="d-block w-100" alt="Image 6">
            </div>
            
        </div>
        <div class="carousel-thumbnails-wrapper">
            <div class="carousel-thumbnails d-flex justify-content-center mt-2">
                <img src="{{ asset('images/1.jpg') }}" class="thumbnail active" data-bs-target="#imageCarousel" data-bs-slide-to="0" alt="Thumbnail 1">
                <img src="{{ asset('images/2.jpg') }}" class="thumbnail" data-bs-target="#imageCarousel" data-bs-slide-to="1" alt="Thumbnail 2">
                <img src="{{ asset('images/3.jpg') }}" class="thumbnail" data-bs-target="#imageCarousel" data-bs-slide-to="2" alt="Thumbnail 3">
                <img src="{{ asset('images/4.jpg') }}" class="thumbnail" data-bs-target="#imageCarousel" data-bs-slide-to="3" alt="Thumbnail 4">
                <img src="{{ asset('images/5.jpg') }}" class="thumbnail" data-bs-target="#imageCarousel" data-bs-slide-to="4" alt="Thumbnail 5">
                <img src="{{ asset('images/2.jpg') }}" class="thumbnail" data-bs-target="#imageCarousel" data-bs-slide-to="5" alt="Thumbnail 6">
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
</div>
