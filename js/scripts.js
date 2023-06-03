
    document.addEventListener('DOMContentLoaded', function() {
    var dropdownToggle = document.querySelector('.dropdown-toggle');
    var dropdownMenu = document.querySelector('.dropdown-menu');

    dropdownToggle.addEventListener('click', function() {
      dropdownMenu.style.display = 'block';
      dropdownMenu.style.position = 'fixed';
    });

    document.addEventListener('click', function(event) {
      var target = event.target;
      if (!target.closest('.dropdown')) {
        dropdownMenu.style.display = 'none';
      }
    });
    });
