const leftEye = document.querySelector('#leftEye');
const rightEye = document.querySelector('#rightEye');
const wrapper = document.getElementById('wrapper');
const usernameField = document.getElementById('username');
const face = document.getElementById('face');
const passwordField = document.getElementById('password');
const mouth = document.querySelector('#face path');
const screen = document.querySelector('#phoneGroup rect:nth-child(2)');
// چشمک زدن
function blink() {
    [leftEye, rightEye].forEach(eye => {
        eye.animate(
            [{
                    transform: 'scaleY(1)'
                },
                {
                    transform: 'scaleY(0.4)'
                },
                {
                    transform: 'scaleY(1)'
                }
            ], {
                duration: 200,
                fill: 'forwards',
                easing: 'ease-in'
            }
        );
    });
}
(function loop() {
    setTimeout(() => {
        blink();
        loop();
    }, 2500 + Math.random() * 3000);
})();



// کلاس focus را هنگام فوکوس/بلر اضافه یا حذف می‌کنیم
usernameField.addEventListener('focus', () => face.classList.add('focus'));
//body and face
usernameField.addEventListener('focus', () => wrapper.classList.add('focus'));
usernameField.addEventListener('blur', () => wrapper.classList.remove('focus'));

passwordField.addEventListener('focus',() => wrapper.classList.add('focus'))
passwordField.addEventListener('blur',() => wrapper.classList.remove('focus'))


//close eyes

passwordField.addEventListener('focus', () => {
    // چشم‌ها رو تبدیل به خطوط کنیم
    leftEye.setAttribute('r', '0'); // دایره کوچک می‌کنیم یا می‌تونی hide کنی
    rightEye.setAttribute('r', '0');

    // خطوط جدید روی جای چشم‌ها اضافه می‌کنیم
    leftEye.insertAdjacentHTML('afterend', '<line id="leftEyeLine" x1="80" y1="110" x2="100" y2="110" stroke="#fff" stroke-width="6" stroke-linecap="round"/>');
    rightEye.insertAdjacentHTML('afterend', '<line id="rightEyeLine" x1="135" y1="110" x2="155" y2="110" stroke="#fff" stroke-width="6" stroke-linecap="round"/>');
  });

  passwordField.addEventListener('blur', () => {
    // چشم‌ها رو دوباره دایره می‌کنیم
    leftEye.setAttribute('r', '10');
    rightEye.setAttribute('r', '10');

    // خطوط چشم‌ها رو پاک می‌کنیم
    const leftLine = document.getElementById('leftEyeLine');
    const rightLine = document.getElementById('rightEyeLine');
    if(leftLine) leftLine.remove();
    if(rightLine) rightLine.remove();
  });
