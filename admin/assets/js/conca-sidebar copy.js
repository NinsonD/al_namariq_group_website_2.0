( function ( $ ) {
    'use strict';

    window.addEventListener('DOMContentLoaded', function(){
        $('[data-width]').each(function(){
            $(this).css('width', $(this).data('width'));
        })
    
        let url = window.location.origin + window.location.pathname;
        let allLinks = document.querySelectorAll('.app-sidebar-menu a');
        allLinks.forEach(link => {
            if (link.href === url) {
                link.classList.add('menu-current');
            }
        });
    
    
        // update sidebar menu height
        function update_sidebar_menu_height() {
            let headerHeight = 60;
            let footerHeight = 60;
            let menuHeight = $(window).height() - (headerHeight + footerHeight)
            $('#app-sidebar-menu').css('height',  menuHeight + 'px');
        }
    
        $(window).on('resize', function(){
            update_sidebar_menu_height()
        });
    
    
        // initialize
        (function() {
            update_sidebar_menu_height();
        })();
    
    
        // add scrollbar to sidebar menu
        if(document.querySelector('.app-sidebar-menu')){
            new PerfectScrollbar(document.querySelector('.app-sidebar-menu'), {
                suppressScrollX: true
            });
        }

        $('.app-sidebar-menu-item').each(function() {
            let $this = $(this);
            if ($this.find('.menu-current').length > 0) {
                $this.find('.menu-current').addClass('active');
                $this.parent().show()
                $this.parent().parent().children('.menu-link').addClass('active')
            }
        });
    
        // list open hidden
        $('.menu-link').on('click', function() {
            $(this).toggleClass('active');
            $(this).next('.app-sidebar-submenu').slideToggle(300);
        });
    
        $('.app-sidebar-open-btn').on('click', function(){
            if($(this).hasClass('open')) {
                $(this).removeClass('open');
                $('#app-wrapper').attr('data-sidebar-collapsed', 'false')
                $('#app-sidebar').removeClass('collapsed')

                // set local storage
                localStorage.setItem('app_sidebar', 'expanded');
               
                $('.app-sidebar-menu-item').each(function() {
                    let $this = $(this);
                    if($this.find('.active')){
                        $this.find('.active').parent().children('.app-sidebar-submenu').show();
                    }
                });

            }else{
                $(this).addClass('open');
                $('#app-wrapper').attr('data-sidebar-collapsed', 'true')
                $('#app-sidebar').addClass('collapsed')
                $('.app-sidebar-menu-item').find('.app-sidebar-submenu').hide();
                
                // set local storage
                localStorage.setItem('app_sidebar', 'collapsed');
            }
        });

        // check sidebar local storage on page load
        if(localStorage.getItem('app_sidebar')){
            
            let sidebarStatus = localStorage.getItem('app_sidebar');
            if(sidebarStatus === 'collapsed'){
                $('#app-sidebar').addClass('collapsed')
                $('#app-wrapper').attr('data-sidebar-collapsed', 'true')

                $('.app-sidebar-menu-item').find('.app-sidebar-submenu').hide();
                $('.app-sidebar-open-btn').addClass('open');
            }
        }else{
            // set local storage
            localStorage.setItem('app_sidebar', 'expanded');

            $('.app-sidebar-open-btn').removeClass('open');
            $('#app-sidebar').removeClass('collapsed')
            $('#app-wrapper').attr('data-sidebar-collapsed', 'false')
            

        }

        function removeSidebarEvent(){
            $('#app-sidebar').off('mouseenter').off('mouseleave');

            // remove collapsed class
            $('#app-sidebar').removeClass('collapsed')
            $('#app-wrapper').attr('data-sidebar-collapsed', 'false')
        }

        function addSidebarEvent(){
            $('#app-sidebar').on('mouseenter', function(){
                if($(this).hasClass('collapsed')){
                    $('#app-sidebar').removeClass('collapsed')
                   
                    $('.app-sidebar-menu-item').each(function() {
                        let $this = $(this);
                        if($this.find('.active')){
                            $this.find('.active').parent().children('.app-sidebar-submenu').show();
                        }
                    });
                }
            }).on('mouseleave', function(){
                if($('#app-wrapper').attr('data-sidebar-collapsed') === 'true'){
                    $('#app-sidebar').addClass('collapsed')
                    $('.app-sidebar-menu-item').find('.app-sidebar-submenu').hide();
                }
            });
        }

        // disable the event on lg devices
        if($(window).width() < 1200){
            removeSidebarEvent()
        }else{
            addSidebarEvent()
        }

        // on resize the window check size and remove the sidebar event
        $(window).on('resize', function(){
            if($(this).width() < 1200){
                removeSidebarEvent()
            }else{
                addSidebarEvent()
            }
        });
        

        
    })

    $('.app-sidebar-mobile-open').on('click', function(){
        $('#app-wrapper').addClass('open');
        $('.app-backdrop').addClass('show');
    });

    $('.app-sidebar-mobile-close').on('click', function(){
        $('#app-wrapper').removeClass('open');
        $('.app-backdrop').removeClass('show');
    });

    $('.app-backdrop').on('click', function(){
        $('#app-wrapper').removeClass('open');
        $(this).removeClass('show');
    });
    
}(jQuery) ) 