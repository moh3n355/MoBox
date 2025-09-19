const leftEye = document.querySelector('#leftEye');
const rightEye = document.querySelector('#rightEye');
const wrapper = document.getElementById('wrapper');
const usernameField = document.getElementById('username');
const face = document.getElementById('face');
const passwordField = document.getElementById('password')
const rightHand = document.getElementById('rightHand')
const lefttHand = document.getElementById('lefttHand')

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

//hands
usernameField.addEventListener('focus', () => rightHand.classList.add('focus'));
usernameField.addEventListener('blur', () => rightHand.classList.remove('focus'));

passwordField.addEventListener('focus',() => lefttHand.classList.add('focus'))
passwordField.addEventListener('blur',() => lefttHand.classList.remove('focus'))

