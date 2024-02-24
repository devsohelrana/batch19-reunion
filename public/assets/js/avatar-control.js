/**
 * Account Settings - Account
 */

"use strict";

// document.addEventListener('DOMContentLoaded', function (e) {
//   (function () {
//     const deactivateAcc = document.querySelector('#formAccountDeactivation');

//     // Update/reset user image of account page
//     let accountUserImage = document.getElementById('uploadedAvatar');
//     const fileInput = document.querySelector('.account-file-input'),
//       resetFileInput = document.querySelector('.account-image-reset');

//     if (accountUserImage) {
//       const resetImage = accountUserImage.src;
//       fileInput.onchange = () => {
//         if (fileInput.files[0]) {
//           accountUserImage.src = window.URL.createObjectURL(fileInput.files[0]);
//         }
//       };
//       resetFileInput.onclick = () => {
//         fileInput.value = '';
//         accountUserImage.src = resetImage;
//       };
//     }
//   })();
// });

// image uploade
const avatar = document.getElementById("avatar");

const previewavatar = document.getElementById("previewavatar");

avatar.addEventListener("change", function (event) {
    const selectedImage = event.target.files[0];

    if (selectedImage) {
        const imageUrl = URL.createObjectURL(selectedImage);
        previewavatar.src = imageUrl;
    }
});
