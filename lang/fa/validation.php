<?php

return [

    /*
    |--------------------------------------------------------------------------
    | پیام‌های پیش‌فرض اعتبارسنجی
    |--------------------------------------------------------------------------
    |
    | این پیام‌ها هنگام اعتبارسنجی فرم‌ها نمایش داده می‌شوند.
    | می‌توانید آنها را به دلخواه خود تغییر دهید.
    |
    */

    'accepted' => 'فیلد ":attribute" باید پذیرفته شود.',
    'accepted_if' => 'فیلد ":attribute" باید زمانی که ":other" برابر با ":value" است، پذیرفته شود.',
    'active_url' => 'فیلد ":attribute" باید یک آدرس اینترنتی معتبر باشد.',
    'after' => 'فیلد ":attribute" باید تاریخی بعد از ":date" باشد.',
    'after_or_equal' => 'فیلد ":attribute" باید تاریخی برابر یا بعد از ":date" باشد.',
    'alpha' => 'فیلد ":attribute" فقط باید شامل حروف باشد.',
    'alpha_dash' => 'فیلد ":attribute" فقط باید شامل حروف، اعداد، خط تیره و زیرخط باشد.',
    'alpha_num' => 'فیلد ":attribute" فقط باید شامل حروف و اعداد باشد.',
    'any_of' => 'مقدار فیلد ":attribute" نامعتبر است.',
    'array' => 'فیلد ":attribute" باید یک آرایه باشد.',
    'ascii' => 'فیلد ":attribute" باید فقط شامل کاراکترهای تک‌بایتی باشد.',
    'before' => 'فیلد ":attribute" باید تاریخی قبل از ":date" باشد.',
    'before_or_equal' => 'فیلد ":attribute" باید تاریخی برابر یا قبل از ":date" باشد.',
    'between' => [
        'array' => 'فیلد ":attribute" باید بین :min تا :max آیتم داشته باشد.',
        'file' => 'حجم فایل فیلد ":attribute" باید بین :min تا :max کیلوبایت باشد.',
        'numeric' => 'فیلد ":attribute" باید بین :min تا :max باشد.',
        'string' => 'فیلد ":attribute" باید بین :min تا :max کاراکتر باشد.',
    ],
    'boolean' => 'فیلد ":attribute" فقط می‌تواند true یا false باشد.',
    'can' => 'فیلد ":attribute" شامل مقدار غیرمجاز است.',
    'confirmed' => 'تأیید فیلد ":attribute" مطابق نیست.',
    'contains' => 'فیلد ":attribute" مقدار لازم را ندارد.',
    'current_password' => 'رمز عبور وارد شده اشتباه است.',
    'date' => 'فیلد ":attribute" باید یک تاریخ معتبر باشد.',
    'date_equals' => 'فیلد ":attribute" باید تاریخی برابر با ":date" باشد.',
    'date_format' => 'فیلد ":attribute" باید با فرمت ":format" مطابقت داشته باشد.',
    'decimal' => 'فیلد ":attribute" باید دارای :decimal رقم اعشار باشد.',
    'declined' => 'فیلد ":attribute" باید رد شود.',
    'declined_if' => 'فیلد ":attribute" باید زمانی که ":other" برابر با ":value" است، رد شود.',
    'different' => 'فیلد ":attribute" و ":other" باید متفاوت باشند.',
    'digits' => 'فیلد ":attribute" باید شامل :digits رقم باشد.',
    'digits_between' => 'فیلد ":attribute" باید بین :min تا :max رقم باشد.',
    'dimensions' => 'ابعاد تصویر فیلد ":attribute" نامعتبر است.',
    'distinct' => 'فیلد ":attribute" مقدار تکراری دارد.',
    'doesnt_end_with' => 'فیلد ":attribute" نباید با یکی از موارد ":values" پایان یابد.',
    'doesnt_start_with' => 'فیلد ":attribute" نباید با یکی از موارد ":values" شروع شود.',
    'email' => 'فیلد ":attribute" باید یک ایمیل معتبر باشد.',
    'ends_with' => 'فیلد ":attribute" باید با یکی از موارد ":values" پایان یابد.',
    'enum' => 'مقدار انتخاب شده برای ":attribute" معتبر نیست.',
    'exists' => 'مقدار انتخاب شده برای ":attribute" معتبر نیست.',
    'extensions' => 'فایل فیلد ":attribute" باید یکی از پسوندهای ":values" باشد.',
    'file' => 'فیلد ":attribute" باید یک فایل باشد.',
    'filled' => 'فیلد ":attribute" باید مقدار داشته باشد.',
    'gt' => [
        'array' => 'فیلد ":attribute" باید بیشتر از :value آیتم داشته باشد.',
        'file' => 'فایل فیلد ":attribute" باید بزرگ‌تر از :value کیلوبایت باشد.',
        'numeric' => 'فیلد ":attribute" باید بزرگ‌تر از :value باشد.',
        'string' => 'فیلد ":attribute" باید بیش‌تر از :value کاراکتر باشد.',
    ],
    'gte' => [
        'array' => 'فیلد ":attribute" باید حداقل :value آیتم داشته باشد.',
        'file' => 'فایل فیلد ":attribute" باید بزرگ‌تر یا مساوی :value کیلوبایت باشد.',
        'numeric' => 'فیلد ":attribute" باید بزرگ‌تر یا مساوی :value باشد.',
        'string' => 'فیلد ":attribute" باید بزرگ‌تر یا مساوی :value کاراکتر باشد.',
    ],
    'hex_color' => 'فیلد ":attribute" باید رنگ هگزادسیمال معتبر باشد.',
    'image' => 'فیلد ":attribute" باید یک تصویر باشد.',
    'in' => 'مقدار انتخاب شده برای ":attribute" معتبر نیست.',
    'in_array' => 'فیلد ":attribute" باید در ":other" وجود داشته باشد.',
    'in_array_keys' => 'فیلد ":attribute" باید حداقل یکی از کلیدهای ":values" را داشته باشد.',
    'integer' => 'فیلد ":attribute" باید عدد صحیح باشد.',
    'ip' => 'فیلد ":attribute" باید آدرس IP معتبر باشد.',
    'ipv4' => 'فیلد ":attribute" باید آدرس IPv4 معتبر باشد.',
    'ipv6' => 'فیلد ":attribute" باید آدرس IPv6 معتبر باشد.',
    'json' => 'فیلد ":attribute" باید رشته JSON معتبر باشد.',
    'list' => 'فیلد ":attribute" باید یک لیست باشد.',
    'lowercase' => 'فیلد ":attribute" باید با حروف کوچک باشد.',
    'lt' => [
        'array' => 'فیلد ":attribute" باید کمتر از :value آیتم داشته باشد.',
        'file' => 'فایل فیلد ":attribute" باید کمتر از :value کیلوبایت باشد.',
        'numeric' => 'فیلد ":attribute" باید کمتر از :value باشد.',
        'string' => 'فیلد ":attribute" باید کمتر از :value کاراکتر باشد.',
    ],
    'lte' => [
        'array' => 'فیلد ":attribute" نباید بیش‌تر از :value آیتم داشته باشد.',
        'file' => 'فایل فیلد ":attribute" باید کمتر یا مساوی :value کیلوبایت باشد.',
        'numeric' => 'فیلد ":attribute" باید کمتر یا مساوی :value باشد.',
        'string' => 'فیلد ":attribute" باید کمتر یا مساوی :value کاراکتر باشد.',
    ],
    'mac_address' => 'فیلد ":attribute" باید آدرس MAC معتبر باشد.',
    'max' => [
        'array' => 'فیلد ":attribute" نباید بیش‌تر از :max آیتم داشته باشد.',
        'file' => 'فایل فیلد ":attribute" نباید بزرگ‌تر از :max کیلوبایت باشد.',
        'numeric' => 'فیلد ":attribute" نباید بزرگ‌تر از :max باشد.',
        'string' => 'فیلد ":attribute" نباید بزرگ‌تر از :max کاراکتر باشد.',
    ],
    'max_digits' => 'فیلد ":attribute" نباید بیش‌تر از :max رقم داشته باشد.',
    'mimes' => 'فایل فیلد ":attribute" باید از نوع ":values" باشد.',
    'mimetypes' => 'فایل فیلد ":attribute" باید از نوع ":values" باشد.',
    'min' => [
        'array' => 'فیلد ":attribute" باید حداقل :min آیتم داشته باشد.',
        'file' => 'فایل فیلد ":attribute" باید حداقل :min کیلوبایت باشد.',
        'numeric' => 'فیلد ":attribute" باید حداقل :min باشد.',
        'string' => 'فیلد ":attribute" باید حداقل :min کاراکتر باشد.',
    ],
    'min_digits' => 'فیلد ":attribute" باید حداقل :min رقم داشته باشد.',
    'missing' => 'فیلد ":attribute" باید موجود نباشد.',
    'missing_if' => 'فیلد ":attribute" باید زمانی که ":other" برابر با ":value" است، موجود نباشد.',
    'missing_unless' => 'فیلد ":attribute" باید موجود نباشد مگر اینکه ":other" در ":value" باشد.',
    'missing_with' => 'فیلد ":attribute" باید زمانی که ":values" موجود است، موجود نباشد.',
    'missing_with_all' => 'فیلد ":attribute" باید زمانی که همه ":values" موجود هستند، موجود نباشد.',
    'multiple_of' => 'فیلد ":attribute" باید مضربی از ":value" باشد.',
    'not_in' => 'مقدار انتخاب شده برای ":attribute" معتبر نیست.',
    'not_regex' => 'فرمت فیلد ":attribute" معتبر نیست.',
    'numeric' => 'فیلد ":attribute" باید عدد باشد.',
    'password' => [
        'letters' => 'فیلد ":attribute" باید حداقل یک حرف داشته باشد.',
        'mixed' => 'فیلد ":attribute" باید حداقل یک حرف بزرگ و یک حرف کوچک داشته باشد.',
        'numbers' => 'فیلد ":attribute" باید حداقل یک عدد داشته باشد.',
        'symbols' => 'فیلد ":attribute" باید حداقل یک نماد داشته باشد.',
        'uncompromised' => 'فیلد ":attribute" شما در نشت اطلاعات دیده شده است، لطفاً مقدار دیگری انتخاب کنید.',
    ],
    'present' => 'فیلد ":attribute" باید موجود باشد.',
    'present_if' => 'فیلد ":attribute" باید زمانی که ":other" برابر با ":value" است، موجود باشد.',
    'present_unless' => 'فیلد ":attribute" باید موجود باشد مگر اینکه ":other" برابر با ":value" باشد.',
    'present_with' => 'فیلد ":attribute" باید زمانی که ":values" موجود است، موجود باشد.',
    'present_with_all' => 'فیلد ":attribute" باید زمانی که همه ":values" موجود هستند، موجود باشد.',
    'prohibited' => 'فیلد ":attribute" ممنوع است.',
    'prohibited_if' => 'فیلد ":attribute" زمانی که ":other" برابر با ":value" است، ممنوع است.',
    'prohibited_if_accepted' => 'فیلد ":attribute" زمانی که ":other" پذیرفته شده است، ممنوع است.',
    'prohibited_if_declined' => 'فیلد ":attribute" زمانی که ":other" رد شده است، ممنوع است.',
    'prohibited_unless' => 'فیلد ":attribute" ممنوع است مگر اینکه ":other" در ":values" باشد.',
    'prohibits' => 'فیلد ":attribute" اجازه وجود ":other" را نمی‌دهد.',
    'regex' => 'فرمت فیلد ":attribute" معتبر نیست.',
    'required' => 'فیلد ":attribute" الزامی است.',
    'required_array_keys' => 'فیلد ":attribute" باید شامل موارد ":values" باشد.',
    'required_if' => 'فیلد ":attribute" زمانی که ":other" برابر با ":value" است، الزامی است.',
    'required_if_accepted' => 'فیلد ":attribute" زمانی که ":other" پذیرفته شده است، الزامی است.',
    'required_if_declined' => 'فیلد ":attribute" زمانی که ":other" رد شده است، الزامی است.',
    'required_unless' => 'فیلد ":attribute" الزامی است مگر اینکه ":other" در ":values" باشد.',
    'required_with' => 'فیلد ":attribute" زمانی که ":values" موجود است، الزامی است.',
    'required_with_all' => 'فیلد ":attribute" زمانی که همه ":values" موجود هستند، الزامی است.',
    'required_without' => 'فیلد ":attribute" زمانی که ":values" موجود نیست، الزامی است.',
    'required_without_all' => 'فیلد ":attribute" زمانی که هیچ‌کدام از ":values" موجود نیستند، الزامی است.',
    'same' => 'فیلد ":attribute" باید با ":other" مطابقت داشته باشد.',
    'size' => [
        'array' => 'فیلد ":attribute" باید شامل :size آیتم باشد.',
        'file' => 'فایل فیلد ":attribute" باید :size کیلوبایت باشد.',
        'numeric' => 'فیلد ":attribute" باید برابر با :size باشد.',
        'string' => 'فیلد ":attribute" باید :size کاراکتر باشد.',
    ],
    'starts_with' => 'فیلد ":attribute" باید با یکی از موارد ":values" شروع شود.',
    'string' => 'فیلد ":attribute" باید رشته باشد.',
    'timezone' => 'فیلد ":attribute" باید یک منطقه زمانی معتبر باشد.',
    'unique' => 'مقدار ":attribute" قبلاً استفاده شده است.',
    'uploaded' => 'آپلود فیلد ":attribute" موفقیت‌آمیز نبود.',
    'uppercase' => 'فیلد ":attribute" باید با حروف بزرگ باشد.',
    'url' => 'فیلد ":attribute" باید یک آدرس اینترنتی معتبر باشد.',
    'ulid' => 'فیلد ":attribute" باید ULID معتبر باشد.',
    'uuid' => 'فیلد ":attribute" باید UUID معتبر باشد.',

    /*
    |--------------------------------------------------------------------------
    | پیام‌های سفارشی اعتبارسنجی
    |--------------------------------------------------------------------------
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'پیام سفارشی',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | نام‌های مستعار فیلدها
    |--------------------------------------------------------------------------
    |
    | این قسمت به شما امکان می‌دهد نام‌های خواناتری برای فیلدها در پیام‌ها داشته باشید.
    |
    */

    'attributes' => [
        'name' => 'نام',
        'username' => 'نام کاربری',
        'email' => 'ایمیل',
        'first_name' => 'نام',
        'last_name' => 'نام خانوادگی',
        'password' => 'رمز عبور',
        'password_confirmation' => 'تأیید رمز عبور',
        'city' => 'شهر',
        'country' => 'کشور',
        'address' => 'نشانی',
        'phone' => 'تلفن',
        'mobile' => 'موبایل',
        'age' => 'سن',
        'gender' => 'جنسیت',
        'website' => 'وب‌سایت',
        'description' => 'توضیحات',
        'title' => 'عنوان',
        'content' => 'محتوا',
        'date' => 'تاریخ',
        'time' => 'زمان',
        'message' => 'پیام',
        'subject' => 'موضوع',
        'body' => 'متن',
        'file' => 'فایل',
        'image' => 'تصویر',
    ],

];
