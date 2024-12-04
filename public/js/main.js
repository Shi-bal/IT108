window.addEventListener('load', function() {
    const groups = document.querySelectorAll('.group');
    groups.forEach(function(group) {
        const mainImage = group.querySelector('.main-image');
        const hoverImages = group.querySelectorAll('.hover-image');
        
        // Ensure mainImage exists before proceeding
        if (mainImage) {
            let originalSrc = mainImage.src;

            hoverImages.forEach(function(hoverImage) {
                // Ensure hoverImage exists before adding event listeners
                if (hoverImage) {
                    hoverImage.addEventListener('mouseover', function() {
                        mainImage.src = hoverImage.src;
                    });

                    hoverImage.addEventListener('mouseout', function() {
                        mainImage.src = originalSrc;
                    });

                    hoverImage.addEventListener('click', function() {
                        originalSrc = hoverImage.src;
                        mainImage.src = hoverImage.src;
                    });
                }
            });
        }
    });

    // Quantity increase and decrease functionality
    const increaseButtons = document.querySelectorAll('.increase-quantity');
    const decreaseButtons = document.querySelectorAll('.decrease-quantity');

    increaseButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            const input = this.nextElementSibling;
            input.value = parseInt(input.value) + 1;
        });
    });

    decreaseButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            const input = this.previousElementSibling;
            if (parseInt(input.value) > 1) {
                input.value = parseInt(input.value) - 1;
            }
        });
    });
});
