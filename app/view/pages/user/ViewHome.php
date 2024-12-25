<?php
class ViewHome {
    public function renderCarousel() {
        return '
        <!-- Carousel -->
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="imgs/t.jpg" class="d-block w-100" alt="First Slide">
                </div>
                <div class="carousel-item">
                    <img src="imgs/k.jpg" class="d-block w-100" alt="Second Slide">
                </div>
                <div class="carousel-item">
                    <img src="imgs/t.jpg" class="d-block w-100" alt="Third Slide">
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
        </div>';
    }

    public function renderPromotions() {
        return '
        <!-- Promotions Section -->
        <div class="container my-5">
            <div class="row">
                <div class="col-md-3">
                    <div class="promo-box">
                        <img src="imgs/mdesign_bottle0.8_dimensions.png" alt="Promo 1">
                        <h5>Extra 10% off</h5>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="promo-box">
                        <img src="imgs/a.png" alt="Promo 2">
                        <h5>Shop like a boss</h5>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="promo-box">
                        <img src="imgs/vvv.png" alt="Promo 3">
                        <h5>Buy 5 Get 5% off</h5>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="promo-box">
                        <img src="imgs/l.png" alt="Promo 4">
                        <h5>Last Chance</h5>
                    </div>
                </div>
            </div>
        </div>';
    }

    public function renderFooter() {
        return '
        <!-- Footer Section -->
        <footer class="bg-light text-center text-lg-start mt-5">
            <div class="container p-4">
                <div class="row">
                    <!-- Quick Links Section -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <h5 class="text-uppercase">Quick Links</h5>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-dark">About Us</a></li>
                            <li><a href="#" class="text-dark">Privacy Policy</a></li>
                            <li><a href="#" class="text-dark">Terms & Conditions</a></li>
                        </ul>
                    </div>
                    <!-- Contact Information Section -->
                    <div class="col-lg-4 col-md-12 mb-4">
                        <h5 class="text-uppercase">Contact Us</h5>
                        <ul class="list-unstyled">
                            <li><i class="bi bi-envelope"></i> info@yourwebsite.com</li>
                            <li><i class="bi bi-phone"></i> +123 456 789</li>
                            <li><i class="bi bi-geo-alt"></i> 123 Your Street, City, Country</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="text-center p-3" style="background-color: #A4B5C4;">
                &copy; 2024 Your Website Name
            </div>
        </footer>';
    }
}
?>
