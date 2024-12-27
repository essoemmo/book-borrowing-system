/**
 * Account Settings - Account
 */

'use strict';

document.addEventListener('DOMContentLoaded', function (e) {
  (function () {

    let accountUserImage1 = document.getElementById('uploadedAvatar1');
    let accountUserImage2 = document.getElementById('uploadedAvatar2');
    
    const fileInput1 = document.querySelector('#upload1'),
      resetFileInput1 = document.querySelector('.account-image-reset1');
    
    const fileInput2 = document.querySelector('#upload2'),
      resetFileInput2 = document.querySelector('.account-image-reset2');
    
    if (accountUserImage1 && accountUserImage2) {
      const resetImage1 = accountUserImage1.src;
      const resetImage2 = accountUserImage2.src;
    
      fileInput1.onchange = () => {
        if (fileInput1.files[0]) {
          accountUserImage1.src = window.URL.createObjectURL(fileInput1.files[0]);
        }
      };
    
      fileInput2.onchange = () => {
        if (fileInput2.files[0]) {
          accountUserImage2.src = window.URL.createObjectURL(fileInput2.files[0]);
        }
      };
    
      resetFileInput1.onclick = () => {
        fileInput1.value = '';
        accountUserImage1.src = resetImage1;
      };
    
      resetFileInput2.onclick = () => {
        fileInput2.value = '';
        accountUserImage2.src = resetImage2;
      };
    }
  })();
});
