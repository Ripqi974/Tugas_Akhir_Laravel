const beliButtons = document.querySelectorAll(".btn-beli");
const wishlistButtons = document.querySelectorAll(".btn-wishlist");
const stokBadges = document.querySelectorAll(".stok-badge");
const wishlistBadge = document.getElementById("wishlistBadge");
const wishlistList = document.getElementById("wishlistList");
const themeToggle = document.getElementById("themeToggle");

/* ================= STOK ================= */
beliButtons.forEach((button, index) => {
    button.addEventListener("click", () => {
        let stok = parseInt(stokBadges[index].dataset.stok);

        if (stok > 0) {
            stok--;
            stokBadges[index].dataset.stok = stok;
            stokBadges[index].textContent = "Stok: " + stok;
            alert("Pembelian berhasil!");
        } else {
            alert("Stok habis!");
        }
    });
});

/* ================= DARK MODE ================= */
const applyTheme = (theme) => {
    if (theme === "dark") {
        document.body.classList.add("dark-mode"); // Gunakan class, bukan style manual
        themeToggle.textContent = "☀ Light Mode";
    } else {
        document.body.classList.remove("dark-mode");
        themeToggle.textContent = "🌙 Dark Mode";
    }
};

// Cek storage saat halaman dimuat
const savedTheme = localStorage.getItem("theme");
if (savedTheme) applyTheme(savedTheme);

themeToggle.addEventListener("click", () => {
    // Cek apakah sekarang lagi dark mode atau tidak
    const isDark = document.body.classList.contains("dark-mode");
    
    if (isDark) {
        localStorage.setItem("theme", "light");
        applyTheme("light");
    } else {
        localStorage.setItem("theme", "dark");
        applyTheme("dark");
    }
});

/* ================= WISHLIST ================= */
const getWishlist = () => {
    const data = sessionStorage.getItem("wishlist");
    return data ? JSON.parse(data) : [];
};

const saveWishlist = (data) => {
    sessionStorage.setItem("wishlist", JSON.stringify(data));
};

const updateBadge = () => {
    wishlistBadge.textContent = getWishlist().length;
};

const renderWishlist = () => {
    wishlistList.innerHTML = "";
    const wishlist = getWishlist();

    wishlist.forEach((item, index) => {
        const li = document.createElement("li");
        li.className = "list-group-item d-flex justify-content-between align-items-center";
        li.textContent = item;

        const removeBtn = document.createElement("button");
        removeBtn.className = "btn btn-sm btn-danger";
        removeBtn.textContent = "Hapus";

        removeBtn.addEventListener("click", () => {
            wishlist.splice(index, 1);
            saveWishlist(wishlist);
            updateBadge();
            renderWishlist();
        });

        li.appendChild(removeBtn);
        wishlistList.appendChild(li);
    });
};

wishlistButtons.forEach((button) => {
    button.addEventListener("click", () => {
        const card = button.closest(".card");
        const title = card.querySelector(".card-title").textContent;

        const wishlist = getWishlist();
        wishlist.push(title);

        saveWishlist(wishlist);
        updateBadge();
        renderWishlist();

        alert(title + " ditambahkan ke wishlist!");
    });
});

/* ================= FORM TAMBAH MOBIL ================= */

const formMobil = document.getElementById("formMobil");

formMobil.addEventListener("submit", function(event) {

    event.preventDefault(); // supaya tidak reload

    const nama = document.getElementById("namaMobil").value;
    const harga = document.getElementById("hargaMobil").value;
    const stok = document.getElementById("stokMobil").value;
    const gambar = document.getElementById("gambarMobil").value;

    if (nama === "" || harga === "" || stok === "" || gambar === "") {
        alert("Semua field wajib diisi!");
        return;
    }

    alert("Mobil berhasil ditambahkan!");

    formMobil.reset();
});

updateBadge();
renderWishlist();