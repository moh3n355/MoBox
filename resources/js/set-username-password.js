document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('profile_photo');
    const previewImg = document.getElementById('profilePreviewImg');

    if (!input) return;

    input.addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (!file || !file.type.startsWith('image/')) {
            previewImg.style.display = 'none';
            previewImg.src = '';
            return;
        }
        const reader = new FileReader();
        reader.onload = function (ev) {
            previewImg.src = ev.target.result;
            previewImg.style.display = 'block';
        }
        reader.readAsDataURL(file);
    });
});
