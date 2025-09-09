document.addEventListener('DOMContentLoaded', function () {

    //password rules
        function initPwdStrength(container) {
          const inputId = container.dataset.targetInput || 'password';
          const input = document.getElementById(inputId);
          if (!input) return;

          const progress = container.querySelector('.pwd-progress');
          const percentText = container.querySelector('.pwd-percent');
          const labelText = container.querySelector('.pwd-label');

          const rules = {
            length:  { el: container.querySelector('#rule-length'), test: v => /.{8,}/.test(v) },
            lower:   { el: container.querySelector('#rule-lower'),  test: v => /[a-z]/.test(v) },
            upper:   { el: container.querySelector('#rule-upper'),  test: v => /[A-Z]/.test(v) },
            number:  { el: container.querySelector('#rule-number'), test: v => /\d/.test(v) },
            special: { el: container.querySelector('#rule-special'),test: v => /[@$!%*?&]/.test(v) }
          };

          function update() {
            const v = input.value || '';
            const keys = Object.keys(rules);
            let passed = 0;
            keys.forEach(k => {
              const ok = rules[k].test(v);
              // update rule text + class
              if (ok) {
                rules[k].el.classList.add('valid');
                rules[k].el.textContent = '✅ ' + rules[k].el.textContent.slice(2);
              } else {
                rules[k].el.classList.remove('valid');
                rules[k].el.textContent = '❌ ' + rules[k].el.textContent.slice(2);
              }
              if (ok) passed++;
            });

            const pct = Math.round((passed / keys.length) * 100);
            progress.style.width = pct + '%';
            percentText.textContent = pct + '%';

            // hue 0..120 (red -> green)
            const hue = Math.round((pct / 100) * 120);
            progress.style.backgroundColor = `hsl(${hue}, 80%, 45%)`;

            if (pct <= 40) labelText.textContent = 'ضعیف';
            else if (pct <= 80) labelText.textContent = 'متوسط';
            else labelText.textContent = 'قوی';
          }

          input.addEventListener('input', update);
          update();
        }

        document.querySelectorAll('.pwd-strength').forEach(initPwdStrength);


});
