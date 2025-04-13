<!-- Vendor JS Files -->
<script src="{{asset('admin/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('admin/assets/vendor/chart.js/chart.umd.js')}}"></script>
<script src="{{asset('admin/assets/vendor/echarts/echarts.min.js')}}"></script>
<script src="{{asset('admin/assets/vendor/quill/quill.js')}}"></script>
<script src="{{asset('admin/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
<script src="{{asset('admin/assets/vendor/tinymce/tinymce.min.js')}}"></script>
<script src="{{asset('admin/assets/vendor/php-email-form/validate.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{asset('admin/assets/js/main.js')}}"></script>


<script src="https://cdn.ckeditor.com/ckeditor5/43.1.0/ckeditor5.umd.js"></script>   

{{-- cropper link --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    

<script>
    let cropper;
    const imagePreviewContainer = document.querySelector('.image-preview-container');
    const imagePreview = document.querySelector('.image-preview');
  
    function previewImage(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {    
                imagePreview.src = e.target.result;
                imagePreviewContainer.style.display = 'block';   
  
                if (cropper) {
                    cropper.destroy();
                }
  
                cropper = new Cropper(imagePreview, {
                    aspectRatio: NaN, // disable aspect ratio
                    viewMode: 1,
                    autoCropArea: 1, // enable auto crop area
                    crop(event) {
                        document.querySelector('.crop-data-x').value = event.detail.x;
                        document.querySelector('.crop-data-y').value = event.detail.y;
                        document.querySelector('.crop-data-width').value = event.detail.width;
                        document.querySelector('.crop-data-height').value = event.detail.height;
                    }
                });
            };
            reader.readAsDataURL(file);
        }
    }
  </script>
{{-- drag and drop --}}
<script>
    $(document).ready(function() {
        // Make the table rows sortable
        $("tbody").sortable({
            items: "tr.sortable-item",  // Use the class to target the rows
            cursor: "move",
            update: function(event, ui) {
                // Get the sorted elements
                var sortedIDs = [];
                $("tbody tr.sortable-item").each(function() {
                    var id = $(this).data('id');  // Get the ID from data attribute
                    sortedIDs.push(id);
                });
    
                // Update the serial numbers based on the new order
                $("tbody tr").each(function(index) {
                    $(this).find("td:first").text(index + 1); // Update serial number
                });
    
                // Send the sorted IDs to the server to update the order in the database
                $.ajax({
                    url: "{{ route('update-slider-order') }}",  // Define your route here   
                    method: "POST",
                    data: {
                        ids: sortedIDs,
                        _token: '{{ csrf_token() }}'  // Include CSRF token
                    },
                    success: function(response) {
                        // Handle success response
                        console.log(response);
                    },
                    error: function(xhr) {
                        // Handle error response
                        console.error(xhr);
                    }
                });
            }
        }).disableSelection();
    });
    </script>
  
  <script>
    $.ajax({
    url: '/your-route',  // Replace with your actual route
    type: 'POST',
    data: new FormData(this),
    processData: false,
    contentType: false,
    success: function(response) {
        // Handle success (redirect to slider index)
        if (response.redirect_url) {
            window.location.href = response.redirect_url;
        }
    },
    error: function(xhr) {
        // Handle validation errors
        var response = xhr.responseJSON;
        if (response.errors) {
            // Display the specific image error message
            alert(response.errors.image ? response.errors.image[0] : 'Something went wrong!');
        }
    }
});

  </script>


{{-- add a phone number validation --}}

<script>
    // JavaScript to ensure only numbers are entered
    function validatePhone() {
        const phoneInput = document.getElementById('phone');
        const phoneValue = phoneInput.value;
        // Allow only numbers
        phoneInput.value = phoneValue.replace(/[^0-9]/g, '');

        // If you want to limit the length to 10 digits
        if (phoneInput.value.length > 10) {
            phoneInput.value = phoneInput.value.slice(0, 10);
        }
    }
</script>

<script>
    $(document).ready(function() {
        $('.summernote').summernote();
    });
</script>
<script>
    $(document).ready(function() {
        $('form').submit(function(event) {
            var description = $('.summernote').summernote('code');
            if (!description.trim()) {
                event.preventDefault();
                $('.summernote').addClass('is-invalid');
                $('.summernote').parent().find('.invalid-feedback').text('Description is required');
            }
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>