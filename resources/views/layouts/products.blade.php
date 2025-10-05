<section class="best-products">

    <h2>محصولات پرفروش</h2>
    <div class="product-list">

        {{-- ـــــــ قسمت اضافه کردن فورایچ برای نمایش محصولات‌ ـــــــــــــ --}}
        {{--
        <div class="product-card">
            <div class="product-image">
                <img src="/images/airpods.png" alt="">
            </div>
            <h3>گوشی آیفون 13</h3>
            <p class="price">۲۸,۹۰۰,۰۰۰ تومان</p>
            <button>خرید</button>
        </div> --}}
        <style>


            .card {
              position: relative;
              width: 420px;
              height: 540px;
            }



            .inverted {
              clip-path: url("#clip");
              width: 100%;
              height: 100%;
              background: #fff;
              aspect-ratio: 5 / 6;
              display: flex;
              justify-content: center;
              align-items: center;
              overflow: hidden;
              border: 1px solid #ccc;
            }

            .inverted img {
              width: 90%;
              height: auto;
              border-radius: 8px;
              object-fit: cover;
            }

            .actions {
              position: absolute;
              bottom: 0; /* میاد داخل تورفتگی */
              left: 8.2%;
              transform: translateX(-50%);
              display: flex;
              gap: 12px;
            }
            .price {
              position: absolute;
              top: 0; /* میاد داخل تورفتگی */
              right: 0%;
              display: flex;
              justify-content: center;
              align-items: center;
              color: black;
              background-color: #cc4141;
              border-radius: 10px;
              padding: 0.5% 2%;
              width: 33.4%;
              height: 7%;
              max-width: 33.4%;
              max-height: 7%;
              /* overflow: hidden; */

            }
            .price p{
                font-size:25%;
            }


            .btn {
              background: #3b38a0;
              color: #fff;
              border: none;
              border-radius: 20%;
              padding: 10px 12px;
              cursor: pointer;
              font-size: 50px;
              transition: 0.3s;

            }

            .btn:hover {
              background: #26266d;
            }
          </style>


          <div class="card">
            <div class="inverted">
              <img src="/images/S26.webp" alt="phone">
            </div>
            <div class="price">
                <div>
                <p>20,000,00000000$</p>
            </div>
            </div>
            <div class="actions">
              <button class="btn"><i class="fas fa-plus"></i></button>
            </div>
          <!-- شکل clipPath -->
          <svg xmlns="http://www.w3.org/2000/svg" style="display: block;position: absolute" width="0" height="0">
            <defs><clipPath id="clip" clipPathUnits="objectBoundingBox">
            <path d="M0.15,0H0.6A0.05,0.0417,0,0,1,0.65,0.0417V0.0417A0.05,0.0417,0,0,0,0.7,0.0833H0.95A0.05,0.0417,0,0,1,1,0.125V0.875A0.15,0.125,0,0,1,0.85,1H0.25A0.05,0.0417,0,0,1,0.2,0.9583V0.875A0.05,0.0417,0,0,0,0.15,0.8333H0.05A0.05,0.0417,0,0,1,0,0.7917V0.125A0.15,0.125,0,0,1,0.15,0Z"/>
            </clipPath></defs>
          </svg>
        <div class="add-cart"></div>
    </div>

        <a class="see-all" href="">مشاهده همه -></a>
    </div>
</section>
