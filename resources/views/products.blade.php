<x-layout>

    <x-search-filter :filters="$filters">


        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Product Card</title>
            @vite(['resources/css/products.css', 'resources/js/app.js'])

        </head>



        <div class="products-grid" id="productsContainer"></div> <!-- محل نمایش محصولات -->






        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


        <script>
            document.addEventListener('DOMContentLoaded', () => {


                const searchTerm = @json(session('set_filters.params.search'));
                const category = @json(session('set_filters.params.category'));
                const filters = @json(session('set_filters.filters') ?? 's');
                const set_filters = @json(session('set_filters') ?? []);
                let products = [];




                async function getProducts_with_search() {
                    try {

                        const response = await fetch(`/products/search?search=${searchTerm}&category=${category}`, {
                            method: 'GET',
                            headers: {
                                'Accept': 'application/json'
                            }
                        });

                        if (!response.ok) {
                            throw new Error(`HTTP error! status: ${response.status}`);
                        }

                        products = await response.json();

                        // نمایش محصولات روی صفحه
                        const container = document.getElementById('productsContainer');
                        container.innerHTML = ''; // خالی کردن قبل از اضافه کردن

                        products.forEach(product => {
                            const productCard = document.createElement('a');
                            productCard.className = 'add-to-cart';
                            productCard.href = '/';
                            productCard.setAttribute('data-product-id', product.id);

                            productCard.innerHTML = `
                                <a class="add-to-cart" href="#" ">
        <div class="card">
        <div class="product-image">
            <img src="/images/mobile-phone.png" alt="">
        </div>

        <h3 class="title">${product.name}</h3>
        <p class="desc">${product.desc}</p>

        <div class="cost">
            ${product.discount ? `<p class="discount">${product.discount}%</p>` : ''}
            ${product.old_price ? `<p class="old-price">${product.old_price}</p>` : ''}
        </div>

        <p class="price">${product.price}</p>
        </div>
        </a>
        `;


                            container.appendChild(productCard);
                        });

                    } catch (error) {
                        console.error('خطا در دریافت اطلاعات:', error);
                    }
                }


                async function getProducts_with_filter(params) {
                    try {
                        const response = await axios.post('{{ route('filter') }}', {

                            set_filters

                        });

                        const products = response.data;

                        console.log(products);

                        const container = document.getElementById('productsContainer');
                        container.innerHTML = ''; // خالی کردن قبل از اضافه کردن

            //             products.forEach(product => {
            //                 container.insertAdjacentHTML('beforeend', `
            //     <p>
            //         ${product.name} - ${product.price} ${product.ram ? '- RAM: ' + product.ram : ''}
            //     </p>
            // `);
            //             });

            products.forEach(product => {
                            const productCard = document.createElement('a');
                            productCard.className = 'add-to-cart';
                            productCard.href = '/';
                            productCard.setAttribute('data-product-id', product.id);

                            productCard.innerHTML = `
                                <a class="add-to-cart" href="#" ">
        <div class="card">
        <div class="product-image">
            <img src="/images/mobile-phone.png" alt="">
        </div>

        <h3 class="title">${product.name}</h3>
        <p class="desc">${product.desc}</p>

        <div class="cost">
            ${product.discount ? `<p class="discount">${product.discount}%</p>` : ''}
            ${product.old_price ? `<p class="old-price">${product.old_price}</p>` : ''}
        </div>

        <p class="price">${product.price}</p>
        </div>
        </a>
        `;


                            container.appendChild(productCard);
                        });
                    } catch (error) {
                        console.error('خطا در دریافت اطلاعات:', error.response?.data || error.message);
                    }

                }


                async function show_begin_products() {
                    console.log('succes mother  fucker');
                    const container = document.getElementById('productsContainer');
                    container.style ='grid-template-columns: 1fr;'
                    container.innerHTML = ''; // خالی کردن قبل از اضافه کردن
                    const productCard = document.createElement('div');
                            productCard.style= 'font-weight: 900 ;';
                            productCard.className = 'add-to-cart';
                            productCard.setAttribute('data-product-id','2');

                            productCard.innerHTML = `

        <div class="card">
          <h3 class="title">لطفا یک دسته بندی انتخاب کنید</h3>
            `;
            container.appendChild(productCard);

                }

                if (Object.values(filters).some(v => v !== null && v !== '') && filters !== 's') {
                    getProducts_with_filter();

                } else if (category || searchTerm) {
                    getProducts_with_search();

                } else {
                    show_begin_products();
                }

            });
        </script>



    </x-search-filter>
</x-layout>
