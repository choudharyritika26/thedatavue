 <!-- JavaScript Libraries -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
 <script src="{{ asset('frontend/lib/wow/wow.min.js') }}"></script>
 <script src="{{ asset('frontend/lib/easing/easing.min.js') }}"></script>
 <script src="{{ asset('frontend/lib/waypoints/waypoints.min.js') }}"></script>
 <script src="{{ asset('frontend/lib/counterup/counterup.min.js') }}"></script>
 <script src="{{ asset('frontend/lib/owlcarousel/owl.carousel.min.js') }}"></script>
 <script src="{{ asset('frontend/lib/lightbox/js/lightbox.min.js') }}"></script>

 {{-- modal --}}
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

 <!-- Include Bootstrap JS (Make sure this is after the jQuery, if you're using it) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


 <!-- Template Javascript -->
 <script src="{{ asset('frontend/js/main.js') }}"></script>

 <script>
    document.addEventListener('DOMContentLoaded', function () {
        const buttons = document.querySelectorAll('.filter-button');

        buttons.forEach(button => {
            button.addEventListener('click', function () {
                // Remove 'active' class from all buttons
                buttons.forEach(btn => btn.classList.remove('active'));

                // Add 'active' class to the clicked button
                this.classList.add('active');

                // Optional: Perform filtering based on data-filter
                const filterValue = this.getAttribute('data-filter');
                console.log('Filter selected:', filterValue);
                // Add your filtering logic here if needed
            });
        });
    });
</script>
{{-- 
<script>
    // JavaScript to make the buttons draggable
document.addEventListener("DOMContentLoaded", function() {
    const floatingButtons = document.getElementById("floating-buttons");
    let offsetX, offsetY, isDragging = false;

    floatingButtons.addEventListener("mousedown", (e) => {
        // When mouse is pressed down, start dragging
        isDragging = true;
        offsetX = e.clientX - floatingButtons.getBoundingClientRect().left;
        offsetY = e.clientY - floatingButtons.getBoundingClientRect().top;
        floatingButtons.style.cursor = "grabbing";  // Change cursor to grabbing when dragging
    });

    document.addEventListener("mousemove", (e) => {
        // When mouse is moved, if dragging, update position
        if (isDragging) {
            floatingButtons.style.left = `${e.clientX - offsetX}px`;
            floatingButtons.style.top = `${e.clientY - offsetY}px`;
        }
    });

    document.addEventListener("mouseup", () => {
        // When mouse is released, stop dragging
        isDragging = false;
        floatingButtons.style.cursor = "move";  // Change cursor back to move
    });
});

</script> --}}

{{-- progress bar script --}}
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".progresss-bar span").forEach(function (span) {
            let percentage = parseInt(span.textContent); // Get the percentage value from text
            span.style.width = "0%"; // Start from 0%
    
            setTimeout(() => {
                span.style.width = percentage + "%"; // Animate width
            }, 100); // Delay to allow animation
    
            let count = 0; // Counter for animation
            let interval = setInterval(() => {
                if (count >= percentage) {
                    clearInterval(interval); // Stop when target percentage is reached
                } else {
                    count++;
                    span.textContent = count + "%"; // Update percentage text dynamically
                }
            }, 20); // Adjust speed of counting animation
        });
    });
    </script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const dropdowns = document.querySelectorAll('.dropdown-toggle');

        dropdowns.forEach(dropdown => {
            dropdown.addEventListener('click', function (event) {
                const parentDropdown = this.closest('.dropdown');
                const nestedDropdown = parentDropdown.querySelector('.dropdown-menu');

                if (nestedDropdown) {
                    event.preventDefault();
                    nestedDropdown.classList.toggle('show');
                }
            });
        });

        // Close nested dropdowns when clicking outside
        document.addEventListener('click', function (event) {
            if (!event.target.closest('.dropdown')) {
                dropdowns.forEach(dropdown => {
                    const nestedDropdown = dropdown.closest('.dropdown').querySelector('.dropdown-menu');
                    if (nestedDropdown) {
                        nestedDropdown.classList.remove('show');
                    }
                });
            }
        });
    });
</script>

	<!-- Owl Carousel JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
	<script>
		$('.owl-carousel').owlCarousel({
			loop: true,
			margin: 10,
			nav: true,
			autoplay:true,
			dots: false,
			 autoplayTimeout:1000,
			// stagePadding:50,
			responsive: {
				0: {
					items: 1
				},
				600: {
					items: 3
				},
				1000: {
					items: 5
				}
			}
		})
	</script>

<!-- Lightbox2 JS -->
<script src="https://cdn.jsdelivr.net/npm/lightbox2@2.11.3/dist/js/lightbox.min.js"></script>
