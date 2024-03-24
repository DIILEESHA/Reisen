<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/gallery.css">
    <link rel="stylesheet" href="/css/about.css">
    <title>Gallery</title>
</head>

<body>
    @include('components.nav')
    <div class="mi">
        <div class="about_description">
            <h2 class="abouter">inside garage gallery </h2>
            <div class="about_fg">
                <h2 class="dg"><a class="linka " href="/">home </a></h2>

                <h2 class="dg">></h2>
                <h2 class="dg">gallery</h2>

            </div>
        </div>
    </div>

    <div class="gallery_header">

    </div>

    <ul id="filters">
        <li><a href="#" data-filter="all">Show All</a></li>
        <li><a href="#" data-filter="brakes">brakes</a></li>
        <li><a href="#" data-filter="suspension">suspension</a></li>
        <li><a href="#" data-filter="wheels">wheels</a></li>
        <li><a href="#" data-filter="steering">steering</a></li>
    </ul>

    <div class="gallery_grid" id="gallery">
        <div class="gallery-item brakes">
            <a href="https://images.pexels.com/photos/3642618/pexels-photo-3642618.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                data-lightbox="gallery" data-title="Object 1">
                <img src="https://images.pexels.com/photos/3642618/pexels-photo-3642618.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                    alt="Object 1" />
            </a>
        </div>

        <div class="gallery-item brakes">
            <a href="     https://images.pexels.com/photos/2922140/pexels-photo-2922140.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                data-lightbox="gallery" data-title="Object 1">
                <img src="     https://images.pexels.com/photos/2922140/pexels-photo-2922140.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                    alt="Object 1" />
            </a>
        </div>
        <div class="gallery-item brakes">
            <a href="https://quanticalabs.com/wp_themes/carservice/files/2015/05/image_08-570x380.jpg"
                data-lightbox="gallery" data-title="Object 1">
                <img src="https://quanticalabs.com/wp_themes/carservice/files/2015/05/image_08-570x380.jpg"
                    alt="Object 1" />
            </a>
        </div>
        <div class="gallery-item suspension">
            <a href="https://tse2.mm.bing.net/th?id=OIP.AYeTI9E21KI8oyBt4yVmsgHaE4&pid=Api&P=0&h=220"
                data-lightbox="gallery" data-title="Object 1">
                <img src="https://tse2.mm.bing.net/th?id=OIP.AYeTI9E21KI8oyBt4yVmsgHaE4&pid=Api&P=0&h=220"
                    alt="Object 1" />
            </a>
        </div>

        <div class="gallery-item wheels">
            <a href="        https://images.pexels.com/photos/21694/pexels-photo.jpg?auto=compress&cs=tinysrgb&w=600"
                data-lightbox="gallery" data-title="Object 1">
                <img src="        https://images.pexels.com/photos/21694/pexels-photo.jpg?auto=compress&cs=tinysrgb&w=600"
                    alt="Object 1" />
            </a>
        </div>
        <div class="gallery-item steering">
            <a href="   https://images.pexels.com/photos/9845373/pexels-photo-9845373.jpeg?auto=compress&cs=tinysrgb&w=600"
                data-lightbox="gallery" data-title="Object 1">
                <img src="   https://images.pexels.com/photos/9845373/pexels-photo-9845373.jpeg?auto=compress&cs=tinysrgb&w=600"
                    alt="Object 1" />
            </a>
        </div>
        <div class="gallery-item wheels">
            <a href="https://quanticalabs.com/wp_themes/carservice/files/2015/05/image_03-390x260.jpg"
                data-lightbox="gallery" data-title="Object 1">
                <img src="https://quanticalabs.com/wp_themes/carservice/files/2015/05/image_03-390x260.jpg"
                    alt="Object 1" />
            </a>
        </div>
        <div class="gallery-item steering">
            <a href="https://images.pexels.com/photos/1030766/pexels-photo-1030766.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                data-lightbox="gallery" data-title="Object 1">
                <img src="https://images.pexels.com/photos/1030766/pexels-photo-1030766.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                    alt="Object 1" />
            </a>
        </div>

        
    </div>
    @include('components.footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const filters = document.querySelectorAll("#filters a");
            const galleryItems = document.querySelectorAll(".gallery-item");

            filters.forEach((filter) => {
                filter.addEventListener("click", function(e) {
                    e.preventDefault();
                    const category = this.getAttribute("data-filter");

                    let hasImages = false;
                    galleryItems.forEach((item) => {
                        if (category === "all" || item.classList.contains(category)) {
                            item.style.display = "block";
                            hasImages = true;
                        } else {
                            item.style.display = "none";
                        }
                    });

                    if (!hasImages) {
                        // alert(`No images found for category: ${category}`);
                    }

                    // Remove active class from all filters
                    document.querySelectorAll("#filters li").forEach((li) => {
                        li.classList.remove("active");
                    });

                    // Add active class to the clicked filter
                    this.parentNode.classList.add("active");
                });
            });
        });
    </script>
</body>

</html>
