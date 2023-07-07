
    document.addEventListener('DOMContentLoaded', function() {
    let dropdownToggle = document.querySelector('.dropdown-toggle');
    let dropdownMenu = document.querySelector('.dropdown-menu');

    dropdownToggle.addEventListener('click', function() {
      dropdownMenu.style.display = 'block';
      dropdownMenu.style.position = 'fixed';
    });

    document.addEventListener('click', function(event) {
      let target = event.target;
      if (!target.closest('.dropdown')) {
        dropdownMenu.style.display = 'none';
      }
    });
    });
