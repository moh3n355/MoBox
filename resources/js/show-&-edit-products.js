document.addEventListener("DOMContentLoaded", () => {

    const add_product_btn = document.getElementById("btn-add");
    const modal = document.getElementById("modal-backdrop");

    add_product_btn.addEventListener('click', () => {
        modal.classList.add('modal-backdrop-show'); // نمایش مودال
    });

    // برای بستن مودال با دکمه ×
    // add_product_btn.addEventListener('blur', () => {
    //     modal.style.display = 'none';
    // }
    // );


    const input = document.getElementById("images");
    const preview = document.getElementById("images-preview");
    let selectedImages = []; // آرایه برای نگه داشتن عکس‌ها

    // اضافه کردن عکس‌ها و نمایش پیش‌نمایش
    input.addEventListener("change", (e) => {
        const files = Array.from(e.target.files);

        files.forEach(file => {
            if (selectedImages.length >= 10) return; // حداکثر 10 عکس
            // فقط اگر قبلاً اضافه نشده باشند
            if (!selectedImages.some(f => f.name === file.name && f.size === file.size)) {
                selectedImages.push(file);
            }
        });

        updatePreview();
        // input.value را پاک نمی‌کنیم تا فایل‌های قبلی هم باقی بمانند
    });

    // حذف عکس
    function removeImage(index) {
        selectedImages.splice(index, 1);
        updatePreview();
    }

    // ساخت پیش‌نمایش
    function updatePreview() {
        preview.innerHTML = "";
        selectedImages.forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = (e) => {
                const wrapper = document.createElement("div");
                wrapper.style.position = "relative";
                wrapper.style.display = "inline-block";
                wrapper.style.margin = "4px";

                const img = document.createElement("img");
                img.src = e.target.result;
                img.style.width = "100px";
                img.style.height = "100px";
                img.style.objectFit = "cover";

                const btn = document.createElement("button");
                btn.innerHTML = "&times;";
                btn.style.position = "absolute";
                btn.style.top = "0";
                btn.style.right = "0";
                btn.style.background = "rgba(0,0,0,0.5)";
                btn.style.color = "white";
                btn.style.border = "none";
                btn.style.cursor = "pointer";
                btn.addEventListener("click", () => removeImage(index));

                wrapper.appendChild(img);
                wrapper.appendChild(btn);
                preview.appendChild(wrapper);
            };
            reader.readAsDataURL(file);
        });
    }
});
