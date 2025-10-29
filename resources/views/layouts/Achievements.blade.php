<style>
    .Achievements {
      display: grid;
      grid-template-columns: repeat(3, minmax(150px, 1fr));
      grid-template-rows: repeat(4, minmax(100px, auto));
      gap: 1rem;
      grid-template-areas:
        "a b b"
        "c b b"
        "d d e"
        "d d f";
      padding: clamp(1rem, 4vw, 5rem);
      width: clamp(50%, 60% , 70% );
      margin: 0 auto;
    }

    .grid-box {
      background-color: #336cb1;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: clamp(1rem, 3vw, 4rem);
      border-radius: 1rem;
      color: white;
      font-size: clamp(0.9rem, 1.5vw, 1.3rem);
      text-align: center;
      transition: all 0.3s ease;
    }

    /* مناطق گرید */
    .a { grid-area: a; }
    .b { grid-area: b; }
    .c { grid-area: c; }
    .d { grid-area: d; }
    .e { grid-area: e; }
    .f { grid-area: f; }

    /* 💡 ریسپانسیو برای نمایشگرهای کوچک‌تر */
    @media (max-width: 900px) {
      .Achievements {
        grid-template-columns: 1fr;
        grid-template-areas:
          "a"
          "b"
          "c"
          "d"
          "e"
          "f";
          max-width: 450px;
      }

    }
  </style>

  <section class="Achievements">
    <div class="grid-box a"></div>
    <div class="grid-box b">b</div>
    <div class="grid-box c">c</div>
    <div class="grid-box d">d</div>
    <div class="grid-box e">e</div>
    <div class="grid-box f">f</div>
  </section>
