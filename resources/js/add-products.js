document.addEventListener("DOMContentLoaded", () => {

    // ---------- مدیریت ویژگی‌ها ----------
    const add_btn = document.getElementById('add-spec');
    const filed = document.getElementById('specifications');

    function add_spec() {
        const newRow = document.createElement('div');
        newRow.classList.add('spec-row');
        newRow.innerHTML = `
            <input type="text" class="spec-key" placeholder="نام ویژگی" required>
            <input type="text" class="spec-value" placeholder="مقدار" >
            <button type="button" class="remove-btn"><i class="fas fa-trash"></i></button>
        `;

        // دکمه حذف روی همین سطر کار کنه
        const removeBtn = newRow.querySelector('.remove-btn');
        removeBtn.addEventListener('click', () => newRow.remove());

        filed.appendChild(newRow);
    }

    add_btn.addEventListener('click', add_spec);

    // ---------- مدیریت تصاویر ----------
    const imageInput = document.getElementById("product-images");
    const previewContainer = document.getElementById("preview-container");
    const placeholder = document.querySelector(".image-picker-multiple .placeholder");
    const form = document.getElementById("product-form");

    let filesArray = [];

    imageInput.addEventListener("change", () => {
        const file = imageInput.files[0];
        if (!file) return;

        filesArray.push(file);

        const reader = new FileReader();
        reader.onload = e => {
            const imgWrapper = document.createElement("div");
            imgWrapper.className = "relative inline-block m-1";

            const img = document.createElement("img");
            img.src = e.target.result;
            img.className = "w-24 h-24 object-cover rounded shadow";

            // دکمه حذف روی تصویر
            const removeBtn = document.createElement("button");
            removeBtn.textContent = "×";
            removeBtn.className = "absolute top-0 right-0 bg-red-600 text-white rounded-full w-5 h-5 flex items-center justify-center cursor-pointer";
            removeBtn.addEventListener("click", () => {
                previewContainer.removeChild(imgWrapper);
                filesArray = filesArray.filter(f => f !== file);
                if (!filesArray.length) placeholder.style.display = "inline-block";
            });

            imgWrapper.appendChild(img);
            imgWrapper.appendChild(removeBtn);
            previewContainer.appendChild(imgWrapper);

            placeholder.style.display = "none";
        };
        reader.readAsDataURL(file);

        imageInput.value = ""; // ریست input بدون پاک شدن آرایه
    });

    // ---------- ارسال فرم با AJAX ----------
    form.addEventListener("submit", async (e) => {
        e.preventDefault();

        if (!filesArray.length) {
            alert("لطفاً حداقل یک تصویر اضافه کنید.");
            return;
        }

        const formData = new FormData(form);
        filesArray.forEach(file => formData.append("images[]", file));

        try {
            const response = await fetch(form.action, {
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: formData
            });

            const data = await response.json();

            // console.log(data.paths);

            // نمایش پیام و مسیر فایل‌ها
            alert(`${data.message}`);

            // پاک کردن آرایه و پیش‌نمایش
            filesArray = [];
            previewContainer.innerHTML = "";
            placeholder.style.display = "inline-block";

        } catch (err) {
            console.error(err);
            alert("خطا در آپلود تصاویر!");
        }
    });







//menu filed

const toggleBtn = document.getElementById('toggle-specs');
const specsDiv = document.getElementById('specifications');

toggleBtn.addEventListener('click', () => {
    specsDiv.classList.toggle('open');
    toggleBtn.classList.toggle('open');

    if (specsDiv.classList.contains('open')) {
        toggleBtn.innerHTML = 'پنهان کردن مشخصات <i class="fa-solid fa-chevron-up"></i>';
    } else {
        toggleBtn.innerHTML = 'نمایش مشخصات <i class="fa-solid fa-chevron-down"></i>';
    }
});


});
