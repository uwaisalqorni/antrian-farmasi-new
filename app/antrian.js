
// Konfigurasi Global
const CONFIG = {
  POLL_INTERVAL_AUDIO: 2000, // Cek panggilan setiap 2 detik
  POLL_INTERVAL_DATA: 5000,  // Update list setiap 5 detik
  VOICE_RATE: 0.9,
  VOICE_PITCH: 1,
  VOICE_LANG: "Indonesian Female"
};

// Format Waktu
function updateClock() {
  const now = new Date();
  const timeString = now.toLocaleTimeString('id-ID', { hour12: false });
  document.getElementById("clock").innerHTML = timeString;
}

// Load Pengaturan Awal
function loadSettings() {
  $.ajax({
    url: 'app/antrian.php?p=pengaturan',
    type: 'GET',
    dataType: 'json',
    success: function (data) {
      $('#namars').text(data.nama_instansi);
      $('#text').text(data.text);
    }
  });
}

// Cek Panggilan Antrian (Audio)
function checkCall() {
  $.ajax({
    url: "app/antrian.php?p=panggil",
    type: "GET",
    dataType: "json",
    success: function (data) {
      // Bersihkan tampilan nomor sebelumnya jika ada data baru
      if (data.length > 0) {
        const item = data[0]; // Ambil satu antrian saja untuk diproses

        // Update Tampilan Utama
        const displayHtml = `
                    <div class="animate__animated animate__fadeIn">
                        <span class="h4 d-block text-primary mb-2">${item.nm_pasien}</span>
                        <span class="h3 fw-bold">${item.no_reg}</span>
                        <div class="mt-2 text-muted small">${item.nm_poli}</div>
                    </div>
                `;
        $("#nomor").html(displayHtml);

        // Mainkan Audio & TTS
        const audio = document.getElementById("myAudio");

        // Pastikan audio tidak tumpang tindih
        if (audio.paused) {
          audio.play().then(() => {
            // Tunggu audio notifikasi selesai, baru TTS
            audio.onended = function () {
              const textToSay = `Nomor Antrian ${item.no_reg}, Atas nama ${item.nm_pasien.toLowerCase()}, ${item.nm_poli.toLowerCase()}, Silahkan ke loket Penyerahan Obat`;

              responsiveVoice.speak(textToSay, CONFIG.VOICE_LANG, {
                pitch: CONFIG.VOICE_PITCH,
                rate: CONFIG.VOICE_RATE,
                volume: 1
              });
            };
          }).catch(e => console.log("Audio play failed:", e));
        }
      }
    }
  });
}

// Update List Antrian (Racikan & Non-Racikan)
function updateQueueLists() {
  // Non-Racikan
  $.ajax({
    url: "app/antrian.php?p=nonracikan",
    type: "GET",
    dataType: "json",
    success: function (data) { renderTable("#nonracikan", data); }
  });

  // Racikan
  $.ajax({
    url: "app/antrian.php?p=racikan",
    type: "GET",
    dataType: "json",
    success: function (data) { renderTable("#racikan", data); }
  });
}

// Helper: Render Tabel
function renderTable(selector, data) {
  const container = $(selector);
  container.empty();

  if (data.length > 0) {
    let tableHtml = `
            <table class="table-modern">
                <thead>
                    <tr>
                        <th>No. Resep</th>
                        <th>Nama Pasien</th>
                        <th>Jam</th>
                    </tr>
                </thead>
                <tbody>
        `;

    data.forEach(item => {
      tableHtml += `
                <tr>
                    <td class="fw-bold text-primary">${item.no_resep}</td>
                    <td>${item.nm_pasien}</td>
                    <td>${item.jam_peresepan}</td>
                </tr>
            `;
    });

    tableHtml += `</tbody></table>`;
    container.html(tableHtml);
  } else {
    container.html(`
            <div class="text-center py-5 text-muted">
                <i class="fa fa-clipboard-check fa-2x mb-3 opacity-50"></i>
                <p>Tidak ada antrian</p>
            </div>
        `);
  }
}

// Inisialisasi
$(document).ready(function () {
  loadSettings();
  updateClock();

  // Set Intervals
  setInterval(updateClock, 1000);
  setInterval(checkCall, CONFIG.POLL_INTERVAL_AUDIO);
  setInterval(updateQueueLists, CONFIG.POLL_INTERVAL_DATA);

  // Initial Load
  updateQueueLists();
});