<h1>سبد خرید</h1>

@foreach ($cartItems as $item)
    <div class="cart-item">
        <h3>{{ $item->product->name }}</h3>
        <p>تعداد: {{ $item->QuantityInCart }}</p>
        <p>قیمت واحد: {{ $item->product->price }}</p>
        <p>قیمت این آیتم: {{ $item->product->price * $item->QuantityInCart }}</p>

        @php
            $info = json_decode($item->product->informations, true);
        @endphp

        @if ($info)
            <ul>
                @foreach ($info as $key => $value)
                    <li>{{ $key }}: {{ $value }}</li>
                @endforeach
            </ul>
        @endif
    </div>
@endforeach
