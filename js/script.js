console.log("Script loaded!"); // This will tell us if the file is linked

document.addEventListener('DOMContentLoaded', () => {
    const filterButtons = document.querySelectorAll('.filter-group .btn-outline-custom');
    console.log("Found buttons:", filterButtons.length); // Should say 5

    filterButtons.forEach(button => {
        button.addEventListener('click', function () {
            // Find current active
            const currentActive = document.querySelector('.filter-group .btn-outline-custom.active');

            if (currentActive) {
                currentActive.classList.remove('active');
            }

            // Add active to clicked
            this.classList.add('active');
            console.log("Clicked:", this.innerText);
        });
    });
});
