<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard SIG UMKM - Universitas Muhammadiyah Malang</title>
    
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">

    <style>
        body { background-color: #f8f9fc; font-family: 'Nunito', sans-serif; overflow: hidden; }
        
        /* SIDEBAR */
        .sidebar { width: 250px; background: #fff; height: 100vh; position: fixed; left: 0; top: 0; border-right: 1px solid #e3e6f0; z-index: 1000; display: flex; flex-direction: column; }
        .brand { padding: 20px; display: flex; align-items: center; border-bottom: 1px solid #eee; }
        .brand img { height: 40px; margin-right: 10px; }
        .brand-text { font-weight: 800; color: #d32f2f; font-size: 1.2rem; }
        .sidebar-content { padding: 20px; flex-grow: 1; overflow-y: auto; }
        
        .filter-group { margin-bottom: 20px; }
        .filter-label { font-size: 0.8rem; font-weight: 800; color: #b7b9cc; text-transform: uppercase; margin-bottom: 5px; display: block; }
        .form-select { border-radius: 5px; font-size: 0.9rem; border: 1px solid #d1d3e2; background-color: #f8f9fc; }

        .menu-item { padding: 10px 15px; color: #5a5c69; display: block; text-decoration: none; font-weight: 700; border-radius: 5px; transition: 0.2s; margin-bottom: 5px; }
        .menu-item:hover, .menu-item.active { background: #eaecf4; color: #d32f2f; }
        .menu-item i { width: 25px; }

        /* LEGENDA */
        .legend-box { background: #f8f9fc; padding: 10px; border-radius: 8px; margin-top: 20px; }
        .legend-item { display: flex; align-items: center; margin-bottom: 5px; font-size: 0.85rem; color: #555; }
        .dot { width: 12px; height: 12px; border-radius: 50%; margin-right: 10px; display: inline-block; }

        /* MAIN CONTENT */
        .main-content { margin-left: 250px; padding: 20px; height: 100vh; display: flex; flex-direction: column; }

        /* STATS */
        .stat-card { background: #fff; border-radius: 10px; padding: 20px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); display: flex; justify-content: space-between; align-items: center; height: 100%; border-left: 4px solid #ccc; transition: 0.3s; }
        .stat-card:hover { transform: translateY(-3px); }
        .stat-card.primary { border-left-color: #4e73df; }
        .stat-card.success { border-left-color: #1cc88a; }
        .stat-card.danger { border-left-color: #e74a3b; }
        .stat-label { font-size: 0.7rem; font-weight: bold; text-transform: uppercase; color: #858796; margin-bottom: 5px; }
        .stat-value { font-size: 1.5rem; font-weight: 800; color: #5a5c69; }

        /* DASHBOARD ROW */
        .dashboard-row { display: flex; gap: 20px; flex-grow: 1; min-height: 0; }
        .map-container { flex: 2; background: #fff; border-radius: 10px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.05); position: relative; }
        #map { height: 100%; width: 100%; }

        /* LIST */
        .list-container { flex: 1; background: #fff; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); display: flex; flex-direction: column; overflow: hidden; }
        .list-header { padding: 15px; border-bottom: 1px solid #eee; font-weight: 700; color: #333; background: #fff; }
        .list-body { overflow-y: auto; padding: 0; flex-grow: 1; }
        .loc-item { padding: 12px 15px; border-bottom: 1px solid #f0f0f0; cursor: pointer; transition: 0.2s; }
        .loc-item:hover { background-color: #fff3f3; }
        .loc-name { font-weight: 700; font-size: 0.9rem; color: #333; }
        .loc-cat { font-size: 0.75rem; color: #888; text-transform: uppercase; }

        /* POPUP IMG */
        .img-loading-box { position: relative; width: 100%; height: 140px; background-color: #f0f0f0; border-radius: 5px; display: flex; align-items: center; justify-content: center; overflow: hidden; margin: 5px 0; border: 1px solid #eee; }
        .popup-img { width: 100%; height: 100%; object-fit: cover; position: absolute; top: 0; left: 0; opacity: 0; transition: opacity 0.5s; }

        /* MODAL IMG */
        .detail-img-box { width: 100%; height: 300px; background: #eee; border-radius: 10px; overflow: hidden; display: flex; align-items: center; justify-content: center; margin-bottom: 20px; position: relative; }
        .detail-img { width: 100%; height: 100%; object-fit: cover; opacity: 0; transition: opacity 0.3s; z-index: 2; }
        
        @media (max-width: 768px) {
            .sidebar { width: 100%; height: auto; position: relative; border-right: none; }
            .main-content { margin-left: 0; padding: 10px; height: auto; }
            .dashboard-row { flex-direction: column; }
            .map-container { height: 400px; }
            .list-container { height: 300px; }
            body { overflow: auto; }
        }
    </style>
</head>
<body>

    <div class="modal fade" id="detailModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-bold" id="detailTitle">Lokasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="detail-img-box">
                        <i class="fas fa-spinner fa-spin fa-2x text-muted" style="position:absolute;"></i>
                        <img src="" id="detailImage" class="detail-img" onload="this.style.opacity=1;" onerror="this.src='https://via.placeholder.com/500x300?text=Gagal+Muat'; this.style.opacity=1;">
                    </div>
                    
                    <div class="mb-3">
                        <span class="badge bg-primary" id="detailCategory">-</span>
                        <span class="badge bg-secondary" id="detailStatus">-</span>
                        <span class="badge bg-warning text-dark" id="detailCrowd">-</span>
                    </div>

                    <ul class="list-group list-group-flush mb-3">
                        <li class="list-group-item px-0"><i class="fas fa-road text-primary me-2"></i> <strong>Jalan:</strong> <span id="detailRoad">-</span></li>
                        <li class="list-group-item px-0"><i class="fas fa-store text-info me-2"></i> <strong>Sekitar:</strong> <span id="detailDesc">-</span></li>
                    </ul>
                    <div id="detailContactArea"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="sidebar">
        <div class="brand">
            <img src="WhatsApp Image 2025-12-15 at 22.57.49_f9834ae0.jpg" alt="SIG">
            <span class="brand-text">SIG UMKM</span>
        </div>
        <div class="sidebar-content">
            <div class="filter-group">
                <label class="filter-label"><i class="fas fa-filter"></i> Kategori</label>
                <select id="kategoriFilter" class="form-select" onchange="applyFilter()">
                    <option value="all">Semua</option>
                    <option value="Ruko">Ruko</option>
                    <option value="Kios/Lapak">Kios / Lapak</option>
                    <option value="Lahan Kosong">Lahan Kosong</option>
                    <option value="Rumah Tinggal">Rumah Tinggal</option>
                </select>
            </div>
            <div class="filter-group">
                <label class="filter-label"><i class="fas fa-toggle-on"></i> Status</label>
                <select id="statusFilter" class="form-select" onchange="applyFilter()">
                    <option value="all">Semua</option>
                    <option value="Kosong">Hanya yg Kosong</option>
                    <option value="Terisi">Hanya yg Terisi</option>
                </select>
            </div>
            <hr>
            <a href="#" class="menu-item active"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            
            <div class="legend-box">
                <label class="filter-label mb-2">Keramaian</label>
                <div class="legend-item"><span class="dot" style="background-color: #1cc88a;"></span> 5 - Sangat Ramai</div>
                <div class="legend-item"><span class="dot" style="background-color: #f6c23e;"></span> 4 - Ramai</div>
                <div class="legend-item"><span class="dot" style="background-color: #fd7e14;"></span> 3 - Sedang</div>
                <div class="legend-item"><span class="dot" style="background-color: #e74a3b;"></span> 2 - Kurang Ramai</div>
                <div class="legend-item"><span class="dot" style="background-color: #3a3b45;"></span> 1 - Sepi</div>
            </div>
        </div>
        <div style="padding: 10px; font-size: 10px; color: #aaa; text-align: center;">&copy; 2025 Mahasiswa UMM</div>
    </div>

    <div class="main-content">
        <div class="row g-3 mb-3">
            <div class="col-md-4"><div class="stat-card primary"><div><div class="stat-label">Total</div><div class="stat-value" id="val-total">0</div></div><i class="fas fa-building fa-2x text-gray-300" style="opacity: 0.3;"></i></div></div>
            <div class="col-md-4"><div class="stat-card success"><div><div class="stat-label">Kosong</div><div class="stat-value text-success" id="val-kosong">0</div></div><i class="fas fa-check-circle fa-2x text-success" style="opacity: 0.3;"></i></div></div>
            <div class="col-md-4"><div class="stat-card danger"><div><div class="stat-label">Terisi</div><div class="stat-value text-danger" id="val-terisi">0</div></div><i class="fas fa-ban fa-2x text-danger" style="opacity: 0.3;"></i></div></div>
        </div>

        <div class="dashboard-row">
            <div class="map-container"><div id="map"></div></div>
            <div class="list-container">
                <div class="list-header">Hasil Pencarian</div>
                <div class="list-body" id="locationList"><div class="text-center p-3 text-muted">Memuat...</div></div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        var map = L.map('map').setView([-7.9213, 112.5955], 15);
        L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png', { attribution: 'OSM' }).addTo(map);

        var markersLayer = L.layerGroup().addTo(map);
        var displayedMarkers = [];
        var rawData = [];
        var currentData = [];
        var detailModal = new bootstrap.Modal(document.getElementById('detailModal'));

        // --- TEKNIK LAZY LOAD: Gambar tidak akan di-download sebelum popup dibuka ---
        function getImgUrl(url) {
            if (!url || url === 'default.jpg' || url.trim() === '') return 'https://via.placeholder.com/300x200?text=No+Image';
            if (url.includes('drive.google.com') && url.includes('id=')) {
                var match = url.match(/id=([a-zA-Z0-9_-]+)/);
                if (match && match[1]) return 'https://drive.google.com/thumbnail?id=' + match[1] + '&sz=w500';
            }
            return url;
        }

        fetch('api.php')
            .then(res => res.json())
            .then(data => {
                rawData = data;
                renderDashboard(rawData);
            })
            .catch(err => console.error("Gagal ambil data:", err));

        function applyFilter() {
            var catFilter = document.getElementById('kategoriFilter').value;
            var statFilter = document.getElementById('statusFilter').value;
            var filteredData = rawData.filter(item => {
                var matchCat = (catFilter === 'all') || (item.kategori_ruko === catFilter);
                var matchStat = (statFilter === 'all') || (item.status_ketersediaan === statFilter);
                return matchCat && matchStat;
            });
            renderDashboard(filteredData);
        }

        function renderDashboard(data) {
            currentData = data;
            markersLayer.clearLayers();
            displayedMarkers = [];
            var listHtml = '';
            var stats = { total: 0, kosong: 0, terisi: 0 };
            
            data.forEach((item, index) => {
                var lat = parseFloat(item.lat);
                var lon = parseFloat(item.lon);

                if (!isNaN(lat) && !isNaN(lon)) {
                    stats.total++;
                    var isKosong = item.status_ketersediaan === 'Kosong';
                    if(isKosong) stats.kosong++; else stats.terisi++;

                    var crowdLevel = parseInt(item.tingkat_keramaian);
                    var color = (crowdLevel===5)?'#1cc88a':(crowdLevel===4)?'#f6c23e':(crowdLevel===3)?'#fd7e14':(crowdLevel===2)?'#e74a3b':'#3a3b45';

                    // --- KUNCI ANTI LEMOT: Jangan taruh src="" di sini. Taruh di data-src="" ---
                    // Kita pakai gambar placeholder transparan dulu.
                    var realImgUrl = getImgUrl(item.foto_lokasi);
                    
                    var popup = `
                        <div style="font-family:Nunito;">
                            <span class="badge ${isKosong ? 'bg-success' : 'bg-danger'} mb-1">${item.status_ketersediaan}</span>
                            <h6 style="font-weight:800; margin:0;">${item.kategori_ruko}</h6>
                            <small class="text-muted">${item.nama_lokasi}</small>
                            
                            <div class="img-loading-box">
                                <i class="fas fa-spinner fa-spin text-muted" style="position:absolute;"></i>
                                <img src="https://via.placeholder.com/300x200?text=Loading..." 
                                     data-src="${realImgUrl}" 
                                     class="popup-img lazy-img" 
                                     onerror="this.src='https://via.placeholder.com/300x200?text=Gagal+Muat';">
                            </div>

                            <div class="mt-2 text-muted" style="font-size:11px;">
                                <i class="fas fa-users"></i> Keramaian: <b>${item.tingkat_keramaian}/5</b>
                            </div>
                            
                            <button class="btn btn-sm btn-info text-white w-100 mt-2 fw-bold" onclick="showDetail(${index})">
                                <i class="fas fa-eye"></i> Lihat Detail
                            </button>

                            ${item.nomor_hp ? `<a href="https://wa.me/${item.nomor_hp.replace(/[^0-9]/g,'')}" target="_blank" class="btn btn-sm btn-success w-100 mt-1"><i class="fab fa-whatsapp"></i> Hubungi</a>` : ''}
                        </div>
                    `;

                    var marker = L.circleMarker([lat, lon], {
                        radius: 8, fillColor: color, color: "#fff", weight: 2, opacity: 1, fillOpacity: 0.9
                    }).bindPopup(popup);
                    
                    markersLayer.addLayer(marker);
                    displayedMarkers.push(marker);

                    listHtml += `
                        <div class="loc-item" onclick="panToMap(${index}, ${lat}, ${lon})">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                    <span class="dot" style="background-color:${color}; width:10px; height:10px; margin-right:8px;"></span>
                                    <div class="loc-name text-truncate" style="max-width: 130px;">${item.nama_lokasi}</div>
                                </div>
                                <span class="badge ${isKosong ? 'bg-success' : 'bg-danger'}" style="font-size:9px;">${isKosong ? 'KSG' : 'ISI'}</span>
                            </div>
                            <div class="loc-cat ms-3">${item.kategori_ruko}</div>
                        </div>
                    `;
                }
            });

            document.getElementById('locationList').innerHTML = (listHtml === '') ? '<div class="text-center p-3">Tidak ada data</div>' : listHtml;
            document.getElementById('val-total').innerText = stats.total;
            document.getElementById('val-kosong').innerText = stats.kosong;
            document.getElementById('val-terisi').innerText = stats.terisi;
        }

        // --- EVENT LISTENER AJAIB: LOAD GAMBAR CUMA SAAT POPUP DIBUKA ---
        map.on('popupopen', function(e) {
            var popupNode = e.popup._contentNode;
            var img = popupNode.querySelector('.lazy-img');
            if (img && img.dataset.src) {
                // Pindahkan link dari data-src ke src agar browser baru download sekarang
                img.src = img.dataset.src;
                img.onload = function() { this.style.opacity = 1; }; // Muncul pelan-pelan
                img.removeAttribute('data-src'); // Biar gak download ulang
            }
        });

        function panToMap(index, lat, lon) {
            map.flyTo([lat, lon], 17, { duration: 1.5 });
            setTimeout(() => { if (displayedMarkers[index]) displayedMarkers[index].openPopup(); }, 1200);
        }

        function showDetail(index) {
            var item = currentData[index];
            document.getElementById('detailTitle').innerText = item.nama_lokasi;
            
            var imgEl = document.getElementById('detailImage');
            imgEl.style.opacity = 0;
            imgEl.src = getImgUrl(item.foto_lokasi); // Load gambar besar cuma pas tombol diklik

            document.getElementById('detailCategory').innerText = item.kategori_ruko;
            var statusBadge = document.getElementById('detailStatus');
            statusBadge.innerText = item.status_ketersediaan;
            statusBadge.className = item.status_ketersediaan === 'Kosong' ? 'badge bg-success' : 'badge bg-danger';
            document.getElementById('detailCrowd').innerText = 'Keramaian: ' + item.tingkat_keramaian + '/5';
            document.getElementById('detailRoad').innerText = item.kondisi_jalan;
            document.getElementById('detailDesc').innerText = item.dominasi_sekitar || '-';

            var contactArea = document.getElementById('detailContactArea');
            contactArea.innerHTML = item.nomor_hp ? 
                `<a href="https://wa.me/${item.nomor_hp.replace(/[^0-9]/g,'')}" target="_blank" class="btn btn-success w-100 fw-bold btn-lg"><i class="fab fa-whatsapp"></i> Hubungi Pemilik</a>` : 
                `<button class="btn btn-secondary w-100" disabled>Tidak Ada Kontak</button>`;
            
            detailModal.show();
        }
    </script>
</body>
</html>