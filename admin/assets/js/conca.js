(function($) {
  'use strict'


  // enable tooltip
  const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
  const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

  // enable popover
  const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
  const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))


  if($("[data-bs-theme-value]").length > 0){
    const getStoredTheme = () => localStorage.getItem("conca_theme");
    const setStoredTheme = (theme) => localStorage.setItem("conca_theme", theme);

    const getPreferredTheme = () => {
        const storedTheme = getStoredTheme();
        if (storedTheme) {
            return storedTheme;
        }

        return window.matchMedia("(prefers-color-scheme: dark)").matches ?
            "dark" :
            "light";
    };

    const setTheme = (theme) => {
        if (
            theme === "auto" &&
            window.matchMedia("(prefers-color-scheme: dark)").matches
        ) {
            document.documentElement.setAttribute("data-bs-theme", "dark");
        } else {
            document.documentElement.setAttribute("data-bs-theme", theme);
        }
    };

    setTheme(getPreferredTheme());

    const showActiveTheme = (theme, focus = false) => {

        const btnToActive = document.querySelector(
            `[data-bs-theme-value="${theme}"]`
        );

        if(!btnToActive) {
                return;
            }


        document.querySelectorAll("[data-bs-theme-value]").forEach((element) => {
            element.classList.remove("active");
        });

        btnToActive.classList.add("active");
    };

    window
        .matchMedia("(prefers-color-scheme: dark)")
        .addEventListener("change", () => {
            const storedTheme = getStoredTheme();
            if (storedTheme !== "light" && storedTheme !== "dark") {
                setTheme(getPreferredTheme());
            }
        });

    window.addEventListener("DOMContentLoaded", () => {
        showActiveTheme(getPreferredTheme());

        document.querySelectorAll("[data-bs-theme-value]").forEach((toggle) => {
            toggle.addEventListener("click", () => {
                const theme = toggle.getAttribute("data-bs-theme-value");
                setStoredTheme(theme);
                setTheme(theme);
                showActiveTheme(theme, true);
            });
        });
    });
    }
  $('[data-width]').each(function() {
      $(this).css('width', $(this).data('width'))
  });
  $('[data-height]').each(function() {
      $(this).css('height', $(this).data('height'))
  });
  $('[data-background]').each(function() {
      $(this).css('background-image', $(this).data('background'))
  });
  $('.profile-cover-img').each(function() {
      $(this).css({
        'background-image': 'url(' + $(this).data('background') + ')',
      })
  });
  $('[data-bg-color]').each(function() {
      $(this).css('background-color', $(this).data('bg-color'))
  });
  $('[data-color]').each(function() {
      $(this).css('color', $(this).data('color'))
  });

  // password toggle
  let passwordToggle = $('.password-toggle');

  passwordToggle.each(function(){
    $(this).on('click', function(e){
        e.preventDefault();
        let closedEye = $(this).find('.close-eye');
        let openEye = $(this).find('.open-eye');
        let input = $(this).prev('input');

        if(input.attr('type') === 'password'){
            input.attr('type', 'text')
            closedEye.addClass('d-none');
            openEye.removeClass('d-none');
        } else {
            input.attr('type', 'password')
            closedEye.removeClass('d-none');
            openEye.addClass('d-none');
        }
    })
  })

    window.setBarPosition = (item, bar) => {
        const itemWidth = item.offsetWidth;
        const itemLeft = item.offsetLeft;

        bar.style.width = `${itemWidth}px`;
        bar.style.left = `${itemLeft}px`;
    }

   

    document.querySelectorAll('.pure-slideable-tab-wrapper').forEach((wrapper, index) => {
        const activeItem = wrapper.querySelector('.pure-slide-tab-item.active');
        const bar = wrapper.querySelector('.pure-slide-tab-bar');
        
        window.setBarPosition(activeItem, bar);
        wrapper.addEventListener('resize', () => {
            window.setBarPosition(activeItem, bar);
        });
    });


    document.querySelectorAll('.pure-slideable-tab-wrapper .pure-slide-tab-item').forEach((item, index) => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            const wrapper = this.closest('.pure-slideable-tab-wrapper');
            const bar = wrapper.querySelector('.pure-slide-tab-bar');
            const activeItem = wrapper.querySelector('.pure-slide-tab-item.active');

            activeItem.classList.remove('active');
            this.classList.add('active');
            
            window.setBarPosition(this, bar);
        });
    });
    

}(jQuery))