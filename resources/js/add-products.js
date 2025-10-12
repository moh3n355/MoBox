
document.addEventListener("DOMContentLoaded", function () {

    const add_btn = document.getElementById('add-spec');
    const filed = document.getElementById('specifications');

    function add_spec() {
        const newRow = document.createElement('div');
        newRow.classList.add('spec-row');
        newRow.innerHTML = `
            <input type="text" class="spec-key" placeholder="نام ویژگی" required>
            <input type="text" class="spec-key" placeholder="مقدار">
            <button type="button" class="remove-btn"><i class="fas fa-trash"></i></button>
            `;

        // 3. دکمه حذف روی همین سطر کار کنه
        const removeBtn = newRow.querySelector('.remove-btn');
        removeBtn.addEventListener('click', function () {
            newRow.remove();
        });

        filed.appendChild(newRow);
    }


    add_btn.addEventListener('click', () => {
        add_spec();
    })



    //          _________
    //         | photos |
    //          --------

    const imageInput = document.getElementById("product-images");
    const previewContainer = document.getElementById("preview-container");
    const placeholder = document.querySelector(".image-picker-multiple .placeholder");
    const form = document.getElementById("product-form");

    let filesArray = []; // آرایه برای نگهداری فایل‌ها

    imageInput.addEventListener("change", () => {
      const file = imageInput.files[0];
      if (file) {
        filesArray.push(file); // اضافه کردن فایل به آرایه

        const reader = new FileReader();
        reader.onload = e => {
          const img = document.createElement("img");
          img.src = e.target.result;
          previewContainer.appendChild(img);
          placeholder.style.display = "none";
        };
        reader.readAsDataURL(file);
      }

      // ریست کردن input برای انتخاب فایل بعدی بدون حذف آرایه
      imageInput.value = "";
    });

    form.addEventListener("submit", (e) => {
      e.preventDefault(); // جلوگیری از submit معمولی

      const formData = new FormData(form);

      // اضافه کردن تمام فایل‌ها از آرایه
      filesArray.forEach((file, index) => {
        formData.append(`images[]`, file);
      });

      // حالا می‌تونی با fetch یا axios ارسال کنی
      fetch("/test-upload", {
        method: "POST",
        body: formData,
        headers: {
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
      }).then(res => res.json())
        .then(data => console.log(data))
        .catch(err => console.error(err));
    });


});
