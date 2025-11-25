document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("loginForm");
  const errorBox = document.getElementById("error");

  // Baca parameter ?error=1 dari URL (di-set oleh login.php kalau gagal)
  const params = new URLSearchParams(window.location.search);
  if (params.get("error") === "1") {
    errorBox.textContent = "Username atau kata sandi salah. Coba lagi ya ☕";
  }

  // Validasi sederhana sebelum kirim ke server
  form.addEventListener("submit", function (e) {
    const username = document.getElementById("username").value.trim();
    const password = document.getElementById("password").value;

    if (username === "" || password === "") {
      e.preventDefault();
      errorBox.textContent = "Isi dulu username dan kata sandi, ya ☕";
    }
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const errorBox = document.getElementById("error");
  const regErrorBox = document.getElementById("reg_error");

  // --- Pesan error / success dari URL (dipakai di login & register) ---
  const params = new URLSearchParams(window.location.search);

  if (errorBox && params.get("error") === "1") {
    errorBox.textContent = "Username atau kata sandi salah. Coba lagi ya ☕";
  }

  if (errorBox && params.get("success") === "1") {
    errorBox.style.color = "#b7ffb4";
    errorBox.textContent = "Akun berhasil dibuat! Silakan login ☕";
  }

  if (regErrorBox && params.get("reg_error") === "user_taken") {
    regErrorBox.textContent = "Nama pengguna sudah dipakai. Coba yang lain ya ☕";
  }

  // --- Validasi form LOGIN ---
  const loginForm = document.getElementById("loginForm");
  if (loginForm) {
    loginForm.addEventListener("submit", function (e) {
      const username = document.getElementById("username").value.trim();
      const password = document.getElementById("password").value;

      if (username === "" || password === "") {
        e.preventDefault();
        errorBox.textContent = "Isi dulu username dan kata sandi, ya ☕";
      }
    });
  }

  // --- Validasi form REGISTER ---
  const registerForm = document.getElementById("registerForm");
  if (registerForm) {
    registerForm.addEventListener("submit", function (e) {
      const username = document.getElementById("reg_username").value.trim();
      const pass1 = document.getElementById("reg_password").value;
      const pass2 = document.getElementById("reg_password2").value;

      if (username === "" || pass1 === "" || pass2 === "") {
        e.preventDefault();
        regErrorBox.textContent = "Semua kolom harus diisi ya ☕";
        return;
      }

      if (pass1.length < 6) {
        e.preventDefault();
        regErrorBox.textContent = "Kata sandi minimal 6 karakter.";
        return;
      }

      if (pass1 !== pass2) {
        e.preventDefault();
        regErrorBox.textContent = "Konfirmasi kata sandi tidak sama.";
        return;
      }
    });
  }
});
// --- Fitur Show / Hide Password ---
document.querySelectorAll(".toggle-pass").forEach((btn) => {
  btn.addEventListener("click", () => {
    const inputId = btn.getAttribute("data-target");
    const input = document.getElementById(inputId);

    if (input.type === "password") {
      input.type = "text";
      btn.textContent = "🙈"; // icon berubah saat terlihat
    } else {
      input.type = "password";
      btn.textContent = "👁"; // icon kembali
    }
  });
});
