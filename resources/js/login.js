const togglePassword = document.getElementById('togglePassword');
const passwordInput  = document.getElementById('password');
const eyeOpen        = document.getElementById('eyeOpen');
const eyeClosed      = document.getElementById('eyeClosed');

if (togglePassword && passwordInput) {
    togglePassword.addEventListener('click', (e) => {
        e.preventDefault();
        const isPassword = passwordInput.type === 'password';
        passwordInput.type      = isPassword ? 'text' : 'password';
        eyeOpen.style.display   = isPassword ? 'none'  : '';
        eyeClosed.style.display = isPassword ? ''      : 'none';
    });
}
