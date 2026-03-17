(function($) {
  'use strict'

    let currentUrl = window.location.href;
    let pageName = currentUrl.substring(currentUrl.lastIndexOf('/') + 1, currentUrl.lastIndexOf('.'));
    pageName = pageName + '.html';

    document.querySelectorAll('.profile-nav .nav-link').forEach(function(link) {
        if (link.getAttribute('href') === pageName) {
            link.classList.add('active');
        }
    }); 

    // user settings billing card delete alert
    $('.delete-card').on('click', function(e) {
        e.preventDefault();
        let card = $(this).closest('.card');
        let cardName = card.find('.card-title').text();
        Swal.fire({
            title: 'Are you sure?',
            text: `You are about to delete the ${cardName} card.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                card.remove();
                Swal.fire(
                    'Deleted!',
                    `${cardName} card has been deleted.`,
                    'success'
                );
            }
        });
    });

    const activeItem = document.querySelector('.pure-slide-tab-item.active');
    const bar = document.querySelector('.pure-slide-tab-bar');
    
    $('#addCardModal').on('shown.bs.modal', function () {
        if (activeItem && bar) {
            window.setBarPosition(activeItem, bar);
        }
    });


    document.addEventListener("DOMContentLoaded", function () {
        const avatarInput = document.getElementById("userAvatar");
        const avatarImg = document.querySelector(".container-avatar");
        const uploadBtn = document.querySelector(".upload-avatar-btn");
        const resetBtn = document.querySelector(".reset-avatar-btn");

        // Store initial src to reset later
        const defaultAvatarSrc = avatarImg.src;

        // Trigger file input when "Upload Avatar" is clicked
        uploadBtn.addEventListener("click", () => {
            avatarInput.click();
        });

        // Preview uploaded avatar
        avatarInput.addEventListener("change", function () {
            const file = this.files[0];
            if (file && file.type.startsWith("image/") && file.size <= 2 * 1024 * 1024) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    avatarImg.src = e.target.result;
                };
                reader.readAsDataURL(file);
            } else {
                alert("Invalid file. Please select a JPG, PNG, or JPEG under 2MB.");
                avatarInput.value = ""; // Reset invalid file
            }
        });

        // Reset avatar to default
        resetBtn.addEventListener("click", () => {
            avatarImg.src = defaultAvatarSrc;
            avatarInput.value = "";
        });
    });

}(jQuery))