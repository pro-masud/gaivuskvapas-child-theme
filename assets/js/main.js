// Get all the dropdown from document
document.querySelectorAll('.gv-dropdown-toggle').forEach(dropDownFunc);

// Dropdown Open and Close function
function dropDownFunc(dropDown) {
    if(dropDown.classList.contains('click-dropdown') === true){
        dropDown.addEventListener('click', function (e) {
            e.preventDefault();        
    
            if (this.nextElementSibling.classList.contains('dropdown-active') === true) {
                // Close the clicked dropdown
                this.parentElement.classList.remove('dropdown-open');
                this.nextElementSibling.classList.remove('dropdown-active');
    
            } else {
                // Close the opened dropdowns
                closeDropdown();
    
                // add the open and active class (Opening the Dropdown)
                this.parentElement.classList.add('dropdown-open');
                this.nextElementSibling.classList.add('dropdown-active');
            }
        });
    }

    if(dropDown.classList.contains('hover-dropdown') === true){

        dropDown.onmouseover  = dropdownHover;
        dropDown.onmouseleave = closeDropdown;

        function dropdownHover() {
            // Close the opened dropdowns
            closeDropdown();

            // add the open and active class (Opening the Dropdown)
            this.parentElement.classList.add('dropdown-open');
            this.nextElementSibling.classList.add('dropdown-active');
        }
    }

};


// Listen to the doc click
window.addEventListener('click', function (e) {

    // Close the menu if click happen outside menu
    if (e.target.closest('.gv-dropdown-container') === null) {
        // Close the opened dropdowns
        closeDropdown();
    }

});


// Close the opened Dropdowns
function closeDropdown() { 
    // remove the open and active class from other opened Dropdowns (Closing the opened Dropdown)
    document.querySelectorAll('.gv-dropdown-container').forEach(function (container) { 
        container.classList.remove('dropdown-open')
    });

    document.querySelectorAll('.dropdown-menu').forEach(function (menu) { 
        menu.classList.remove('dropdown-active');
    });
}
