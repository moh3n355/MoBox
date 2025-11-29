
<style>
    .stats {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-wrap: wrap;
  gap: 3rem;
  padding: 0 2rem 5rem 2rem ;
  color: #fff;
  text-align: center;
}

.stat-box {
  background: #336cb1;
  backdrop-filter: blur(10px);
  padding: 2rem 3rem;
  border-radius: 1.5rem;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
  transition: transform 0.3s ease, background 0.3s ease;
}

.stat-box:hover {
  transform: translateY(-10px);
  background:#f59e0b;
}

.stat-box h2 {
  font-size: 3rem;
  font-weight: 800;
  margin-bottom: 0.5rem;
}

.stat-box p {
  font-size: 1.2rem;
  opacity: 0.9;
}

@media (max-width: 860px) {
  .stats {
    flex-direction: column;
    align-items: normal;
    gap: 2rem;
  }
  .stat-box{
    padding: 0.5rem 0.5rem;
  }
  .stat-box h2 {
    font-size: 2.5rem;
  }
}

@media (max-width: 768px) {
  .stats {
    padding:   10%;
    flex-direction: column;
    align-items: normal;
    gap: 2rem;
  }
  .stat-box h2 {
    font-size: 2.5rem;
  }
}

@media (max-width: 480px) {



}

</style>

  <section class="stats">
    <div class="stat-box">
      <h2 class="counter" data-target="3">0</h2>
      <p>سال تجربه</p>
    </div>
    <div class="stat-box">
      <h2 class="counter" data-target="850">0</h2>
      <p>کاربر و مشتری</p>
    </div>
    <div class="stat-box">
      <h2 class="counter" data-target="1200">0</h2>
      <p>تعداد کالا های فروخته شده</p>
    </div>
  </section>

  <script>
    const counters = document.querySelectorAll('.counter');
    const speed = 200;

    const startCounting = () => {
      counters.forEach(counter => {
        const target = +counter.getAttribute('data-target');
        let count = 0;

        const updateCount = () => {
          const inc = target / speed;
          if (count < target) {
            count += inc;
            counter.innerText = Math.ceil(count);
            setTimeout(updateCount, 10);
          } else {
            counter.innerText = '+' + target;
          }
        };

        updateCount();
      });
    };

    const statsSection = document.querySelector('.stats');

    const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          startCounting();
          observer.unobserve(statsSection); // جلوگیری از اجرا دوباره
        }
      });
    });

    observer.observe(statsSection);
  </script>
