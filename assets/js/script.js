document.addEventListener('DOMContentLoaded', () => {
    const hotels = document.querySelectorAll('.hotel');

    hotels.forEach(hotel => {
        hotel.addEventListener('click', () => {
            const hotelName = hotel.getAttribute('data-name');
            const hotelPrice = hotel.getAttribute('data-price');
            const hotelRegion = hotel.getAttribute('data-region');

            // Redirect to hotel detail page
            window.location.href = `detail-hotel.blade.php?hotel-name=${encodeURIComponent(hotelName)}&hotel-price=${hotelPrice}&hotel-region=${encodeURIComponent(hotelRegion)}`;
        });
    });

    // Existing code for gallery switching
    function showGallery(region) {
        const galleries = document.querySelectorAll('.gallery');
        galleries.forEach(gallery => {
            gallery.classList.add('hidden');
        });
        document.getElementById(region).classList.remove('hidden');

        const buttons = document.querySelectorAll('.gallery-button');
        buttons.forEach(button => {
            button.classList.remove('active');
        });
        document.getElementById('btn-' + region).classList.add('active');
    }

    // Initial display
    showGallery('bandung');

    const regionButtons = document.querySelectorAll('.gallery-button');
    regionButtons.forEach(button => {
        button.addEventListener('click', () => {
            const region = button.id.replace('btn-', '');
            showGallery(region);
        });
    });
});
