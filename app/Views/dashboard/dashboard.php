<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-4">
  <h2 class="fs-2 fw-bolder mb-0">Dashboard</h2>
</div>

<div class="row g-3 mb-3">
  <!-- JENIS RS -->
  <div class="col-4">
    <label class="form-label">Jenis RS</label>
    <div class="dropdown w-100" data-bs-auto-close="outside">
      <button class="custom-select-dropdown w-100" id="dropdownJenis" data-bs-toggle="dropdown" aria-expanded="false">
        Pilih Jenis RS
      </button>
      <ul class="dropdown-menu w-100 p-1" id="dropdownListJenis" style="max-height: 250px; overflow-y: auto;">
        <li>
          <label class="dropdown-item d-flex align-items-center">
            <input type="checkbox" class="form-check-input me-2 kategori-checkbox" value=""> Semua
          </label>
        </li>
        <?php foreach ($listJenisRS as $j): ?>
        <?php if (!empty($j['jenis_rs'])): ?>
        <li>
          <label class="dropdown-item d-flex align-items-center">
            <input type="checkbox" class="form-check-input me-2 kategori-checkbox" value="<?= esc($j['jenis_rs']) ?>">
            <?= esc($j['jenis_rs']) ?>
          </label>
        </li>
        <?php endif; ?>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>

  <!-- KELAS RS -->
  <div class="col-4">
    <label class="form-label">Kelas RS</label>
    <div class="dropdown w-100" data-bs-auto-close="outside">
      <button class="custom-select-dropdown w-100" id="dropdownKelas" data-bs-toggle="dropdown" aria-expanded="false">
        Pilih Kelas RS
      </button>
      <ul class="dropdown-menu w-100 p-1" id="dropdownListKelas" style="max-height: 250px; overflow-y: auto;">
        <li>
          <label class="dropdown-item d-flex align-items-center">
            <input type="checkbox" class="form-check-input me-2 kategori-checkbox" value=""> Semua
          </label>
        </li>
        <?php foreach ($listKelasRS as $k): ?>
        <?php if (!empty($k['kelas_rs'])): ?>
        <li>
          <label class="dropdown-item d-flex align-items-center">
            <input type="checkbox" class="form-check-input me-2 kategori-checkbox" value="<?= esc($k['kelas_rs']) ?>">
            <?= esc($k['kelas_rs']) ?>
          </label>
        </li>
        <?php endif; ?>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>

  <!-- PENYELENGGARA RS -->
  <div class="col-4">
    <label class="form-label">Penyelenggara RS</label>
    <div class="dropdown w-100" data-bs-auto-close="outside">
      <button class="custom-select-dropdown w-100" id="dropdownPenyelenggara" data-bs-toggle="dropdown"
        aria-expanded="false">
        Pilih Penyelenggara RS
      </button>
      <ul class="dropdown-menu w-100 p-1" id="dropdownListPenyelenggara" style="max-height: 250px; overflow-y: auto;">
        <li>
          <label class="dropdown-item d-flex align-items-center">
            <input type="checkbox" class="form-check-input me-2 kategori-checkbox" value=""> Semua
          </label>
        </li>
        <?php foreach ($listPenyelenggaraRS as $p): ?>
        <?php if (!empty($p['penyelenggara_grup'])): ?>
        <li>
          <label class="dropdown-item d-flex align-items-center">
            <input type="checkbox" class="form-check-input me-2 kategori-checkbox" value="<?= esc(
              $p['penyelenggara_grup'],
            ) ?>">
            <?= esc($p['penyelenggara_grup']) ?>
          </label>
        </li>
        <?php endif; ?>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</div>

<!-- PROVINSI DAN KABUPATEN/KOTA -->
<div class="row g-3 mb-3">
  <!-- PROVINSI -->
  <div class="col-6">
    <label class="form-label">Provinsi</label>
    <div class="dropdown w-100" data-bs-auto-close="outside">
      <button class="custom-select-dropdown w-100" id="dropdownProvinsi" data-bs-toggle="dropdown"
        aria-expanded="false">
        Pilih Provinsi
      </button>
      <ul class="dropdown-menu w-100 p-1" id="dropdownListProvinsi" style="max-height: 250px; overflow-y: auto;">
        <li>
          <label class="dropdown-item d-flex align-items-center">
            <input type="checkbox" class="form-check-input me-2 kategori-checkbox" value="">
            Semua
          </label>
        </li>
        <?php foreach ($listProvinsi as $prov): ?>
        <li>
          <label class="dropdown-item d-flex align-items-center">
            <input type="checkbox" class="form-check-input me-2 kategori-checkbox" value="<?= esc(
              $prov['provinsi'],
            ) ?>">
            <?= esc($prov['provinsi']) ?>
          </label>
        </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>

  <!-- KABUPATEN/KOTA -->
  <div class="col-6">
    <label class="form-label">Kabupaten/Kota</label>
    <div class="dropdown w-100" data-bs-auto-close="outside">
      <button class="custom-select-dropdown w-100" id="dropdownKabupatenKota" data-bs-toggle="dropdown"
        aria-expanded="false">
        Pilih Kabupaten/Kota
      </button>
      <ul class="dropdown-menu w-100 p-1" id="dropdownListKabupatenKota" style="max-height: 250px; overflow-y: auto;">
        <li>
          <label class="dropdown-item d-flex align-items-center">
            <input type="checkbox" class="form-check-input me-2 kategori-checkbox" value="">
            Semua
          </label>
        </li>
        <?php foreach ($listKabupatenKota as $kk): ?>
        <li>
          <label class="dropdown-item d-flex align-items-center">
            <input type="checkbox" class="form-check-input me-2 kategori-checkbox" value="<?= esc(
              $kk['kabupaten_kota'],
            ) ?>">
            <?= esc($kk['kabupaten_kota']) ?>
          </label>
        </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</div>

<!-- APPLY BUTTON -->
<div class="row mb-3">
  <div class="col-12 text-end">
    <button id="applyFilter" class="btn btn-primary">
      Terapkan Filter
    </button>
  </div>
</div>


<div class="row g-3 mb-3 align-items-end">
  <!-- PERTAHUN -->
  <div class="col-md-3 col-sm-6 mt-0">
    <label for="filterTahun" class="form-label">Per Tahun</label>
    <select id="filterTahun" class="form-select">
      <?php usort($listTahun, fn($a, $b) => $b['tahun'] <=> $a['tahun']); ?>
      <?php foreach ($listTahun as $thn): ?>
      <option value="<?= esc($thn['tahun']) ?>"><?= esc($thn['tahun']) ?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <!-- TOTAL RS -->
  <div class="col d-flex justify-content-end fw-bold">
    <div>
      Total RS: <span id="totalCount" class="ms-2">0</span>
    </div>
  </div>
</div>

<!-- CHARTS -->
<div id="chartsContainer">
  <!-- BAR CHART JENIS RS -->
  <div class="chart-wrapper position-relative mb-3 border rounded" id="chartJenisWrapper" style="display:none;">
    <canvas id="chartJenis" height="340"></canvas>
    <div id="barLoadingJenis" class="position-absolute w-100 h-100 top-0 start-0 d-none bg-white bg-opacity-75 
        d-flex justify-content-center align-items-center">
      <div class="spinner-border text-secondary" role="status"></div>
    </div>
  </div>

  <!-- BAR CHART KELAS RS -->
  <div class="chart-wrapper position-relative mb-3 border rounded" id="chartKelasWrapper" style="display:none;">
    <canvas id="chartKelas" height="340"></canvas>
    <div id="barLoadingKelas" class="position-absolute w-100 h-100 top-0 start-0 d-none bg-white bg-opacity-75 
        d-flex justify-content-center align-items-center">
      <div class="spinner-border text-secondary" role="status"></div>
    </div>
  </div>

  <!-- BAR CHART PENYELENGGARA RS -->
  <div class="chart-wrapper position-relative mb-3 border rounded" id="chartPenyelenggaraWrapper" style="display:none;">
    <canvas id="chartPenyelenggara" height="340"></canvas>
    <div id="barLoadingPenyelenggara" class="position-absolute w-100 h-100 top-0 start-0 d-none bg-white bg-opacity-75 
        d-flex justify-content-center align-items-center">
      <div class="spinner-border text-secondary" role="status"></div>
    </div>
  </div>
</div>

<div class="row g-3 mb-3">
  <div class="col-md-3 col-sm-6 mt-3">
    <label class="form-label">Rentang Tahun</label>
    <div class="d-flex align-items-center">
      <select id="tahunAwal" class="form-select me-2" style="max-width:120px;">
        <?php foreach ($listTahun as $thn): ?>
        <option value="<?= esc($thn['tahun']) ?>" <?= $thn['tahun'] == $minTahun ? 'selected' : '' ?>>
          <?= esc($thn['tahun']) ?>
        </option>
        <?php endforeach; ?>
      </select>
      <span class="mx-2">sampai</span>
      <select id="tahunAkhir" class="form-select ms-2" style="max-width:120px;">
        <?php foreach ($listTahun as $thn): ?>
        <option value="<?= esc($thn['tahun']) ?>" <?= $thn['tahun'] == $maxTahun ? 'selected' : '' ?>>
          <?= esc($thn['tahun']) ?>
        </option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>
</div>

<div class="chart-wrapper position-relative mb-3 border rounded">
  <canvas id="linechart" height="400"></canvas>
  <div id="lineLoading" class="position-absolute w-100 h-100 top-0 start-0 d-none bg-white bg-opacity-75 
      d-flex justify-content-center align-items-center">
    <div class="spinner-border text-secondary" role="status"></div>
  </div>
</div>

<!-- TABEL DATA -->
<div class="accordion mb-3" id="accordionRS">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingRS">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseRS"
        aria-expanded="false" aria-controls="collapseRS">
        Tabel Rumah Sakit
      </button>
    </h2>
    <div id="collapseRS" class="accordion-collapse collapse" aria-labelledby="headingRS" data-bs-parent="#accordionRS">
      <div class="accordion-body">
        <div class="d-flex justify-content-end mb-3">
          <button class="btn btn-sm btn-outline-secondary me-2 export-csv" data-table="rsTable" id="exportCsvBtn">
            <i class="bi bi-filetype-csv me-1"></i> Export CSV
          </button>
          <button class="btn btn-sm btn-outline-success export-xls" data-table="rsTable" id="exportXlsBtn">
            <i class="bi bi-file-earmark-excel me-1"></i> Export XLS
          </button>
        </div>
        <div id="tableWrapper" class="position-relative">
          <div id="tableLoading"
            class="d-none position-absolute top-0 start-0 w-100 h-100 bg-secondary bg-opacity-25 d-flex justify-content-center align-items-center">
            <div class="spinner-border text-secondary" role="status" style="width: 3rem; height: 3rem;"></div>
          </div>
          <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" id="rsTable">
              <thead class="text-center align-middle">
                <tr>
                  <th style="width: 25%;">Nama RS</th>
                  <th style="width: 10%;">Jenis</th>
                  <th style="width: 10%;">Kelas</th>
                  <th style="width: 25%;">Alamat</th>
                  <th style="width: 10%;">Kabupaten/Kota</th>
                  <th style="width: 10%;">Provinsi</th>
                  <th style="width: 10%;">Penyelenggara Grup</th>
                  <th style="width: 10%;">Penyelenggara Kategori</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td colspan="8" class="text-center text-muted py-4">
                    Data belum dimuat
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
<script>
const fixedColors = [
  "#2563eb", "#16a34a", "#dc2626", "#f59e0b", "#9333ea", "#0d9488", "#e11d48",
  "#52525b", "#84cc16", "#0891b2", "#f43f5e", "#a16207", "#7c3aed", "#15803d",
  "#c026d3", "#ea580c", "#0284c7"
];

const jenisRSList = [
  "RSU", "RSIA", "RSK Jiwa", "RSK Mata", "RSK GM", "RSK Bedah", "RSK Jantung",
  "RSK Paru", "RSK Orthopedi", "RSK Kanker", "RSK THT-KL", "RSK Infeksi",
  "RSK Ginjal", "RS Bergerak", "RSK Otak", "RSKO", "RSK Stroke"
];

const warnaJenisRS = {};
jenisRSList.forEach((jenis, index) => {
  warnaJenisRS[jenis] = fixedColors[index % fixedColors.length];
});

Chart.Tooltip.positioners.middleLine = function(elements) {
  if (!elements.length) return false;

  const {
    chart
  } = elements[0].element.$context;
  const {
    x
  } = elements[0].element;
  const {
    top,
    bottom
  } = chart.scales.y;
  const {
    left,
    right
  } = chart.chartArea;

  const midY = (top + bottom) / 2;
  const offset = 10;

  let adjustedX = x + offset;

  if (adjustedX > right - offset) adjustedX = x - offset;
  if (adjustedX < left + offset) adjustedX = x + offset;

  return {
    x: adjustedX,
    y: midY
  };
};

function updateDropdownButtonText(dropdown) {
  const button = dropdown.querySelector('.custom-select-dropdown');
  const checkboxes = dropdown.querySelectorAll('input[type="checkbox"]');
  const checked = Array.from(checkboxes)
    .filter(c => c.checked && c.value)
    .map(c => c.value)
    .filter(v => v !== "Semua");

  let buttonText;

  if (checked.length === 0) {
    buttonText = button.getAttribute('data-default') || "Pilih";
  } else if (checked.length === checkboxes.length - 1) {
    buttonText = "Semua";
  } else {
    buttonText = checked.join(', ');
  }

  button.textContent = buttonText;
}

function getCheckedValues(selector) {
  const checkboxes = document.querySelectorAll(`${selector} input[type="checkbox"]:checked`);
  const values = Array.from(checkboxes)
    .map(cb => cb.value.trim())
    .filter(v => v !== "" && v !== "Semua");

  return values.length ? values : null;
}

async function applyFilter(isInitial = false) {
  const jenis = getCheckedValues("#dropdownListJenis");
  const kelas = getCheckedValues("#dropdownListKelas");
  const penyelenggara = getCheckedValues("#dropdownListPenyelenggara");
  const provinsi = getCheckedValues("#dropdownListProvinsi");
  const kabupaten = getCheckedValues("#dropdownListKabupatenKota");
  const tahun = document.getElementById("filterTahun")?.value || null;

  const filters = {
    jenis_rs: jenis || [],
    kelas_rs: kelas || [],
    penyelenggara_grup: penyelenggara || [],
    provinsi: provinsi &&
      provinsi.length !==
      document.querySelectorAll("#dropdownListProvinsi input[type='checkbox']").length - 1 ?
      provinsi[0] : null,
    kabupaten_kota: kabupaten &&
      kabupaten.length !==
      document.querySelectorAll("#dropdownListKabupatenKota input[type='checkbox']").length - 1 ?
      kabupaten[0] : null,
    tahun: tahun || null,
  };

  console.log(filters)

  if (
    !filters.tahun &&
    !filters.provinsi &&
    !filters.kabupaten_kota &&
    (!filters.jenis_rs || filters.jenis_rs.length === 0) &&
    (!filters.kelas_rs || filters.kelas_rs.length === 0) &&
    (!filters.penyelenggara_grup || filters.penyelenggara_grup.length === 0)
  ) {
    document.querySelectorAll(".chart-wrapper").forEach(w => (w.style.display = "none"));
    return;
  }

  await loadBarChartOnly(filters, isInitial);
}

async function loadBarChartOnly(filters, isInitial = false) {
  // 🔹 Atur tampilan awal chart wrapper
  const chartJenisWrapper = document.getElementById("chartJenisWrapper");
  const chartKelasWrapper = document.getElementById("chartKelasWrapper");
  const chartPenyWrapper = document.getElementById("chartPenyelenggaraWrapper");

  // Pastikan wrapper memiliki posisi relatif agar pesan loading bisa ditengah
  [chartJenisWrapper, chartKelasWrapper, chartPenyWrapper].forEach(w => {
    if (w) w.style.position = "relative";
  });

  // Jenis RS selalu tampil
  chartJenisWrapper.style.display = "block";

  // 🔸 Fungsi bantu untuk tampilkan pesan loading tanpa hapus canvas
  const showLoading = (wrapper, message) => {
    let msg = wrapper.querySelector(".loading-msg");
    if (!msg) {
      msg = document.createElement("div");
      msg.className = "loading-msg text-secondary position-absolute";
      msg.style.top = "50%";
      msg.style.left = "50%";
      msg.style.transform = "translate(-50%, -50%)";
      msg.style.zIndex = "5";
      msg.textContent = message;
      wrapper.appendChild(msg);
    }
  };

  // 🔸 Fungsi bantu untuk sembunyikan pesan loading
  const hideLoading = (wrapper) => {
    const msg = wrapper.querySelector(".loading-msg");
    if (msg) msg.remove();
  };

  // Jika user memilih kelas → tampilkan wrapper-nya dulu
  if (Array.isArray(filters.kelas_rs) && filters.kelas_rs.length > 0) {
    chartKelasWrapper.style.display = "block";
    showLoading(chartKelasWrapper, "⏳ Memuat chart kelas...");
  } else {
    chartKelasWrapper.style.display = "none";
  }

  // Jika user memilih penyelenggara → tampilkan wrapper-nya dulu
  if (Array.isArray(filters.penyelenggara_grup) && filters.penyelenggara_grup.length > 0) {
    chartPenyWrapper.style.display = "block";
    showLoading(chartPenyWrapper, "⏳ Memuat chart penyelenggara...");
  } else {
    chartPenyWrapper.style.display = "none";
  }

  // 🔹 Tentukan mana yang perlu di-fetch
  const shouldLoadKelas = Array.isArray(filters.kelas_rs) && filters.kelas_rs.length > 0;
  const shouldLoadPeny = Array.isArray(filters.penyelenggara_grup) && filters.penyelenggara_grup.length > 0;

  const params = new URLSearchParams();
  if (filters.tahun) params.append("tahun", filters.tahun);
  if (filters.provinsi) params.append("provinsi", filters.provinsi);
  if (filters.kabupaten_kota) params.append("kabupaten", filters.kabupaten_kota);
  if (filters.jenis_rs?.length) params.append("jenis_rs", filters.jenis_rs.join(","));
  if (shouldLoadKelas) params.append("kelas_rs", filters.kelas_rs.join(","));
  if (shouldLoadPeny) params.append("penyelenggara_grup", filters.penyelenggara_grup.join(","));
  const query = params.toString();

  try {
    // ✅ Jenis chart selalu dimuat
    const resJenis = await fetch(`/dashboard/bar/jenis_rs?${query}`);
    const dataJenis = await resJenis.json();
    renderBarChart("jenis", Array.isArray(dataJenis) ? dataJenis : dataJenis.data || [], filters);
    hideLoading(chartJenisWrapper);

    // ✅ Hanya load kelas jika ada filter kelas
    if (shouldLoadKelas) {
      const resKelas = await fetch(`/dashboard/bar/kelas_rs?${query}&subkolom=jenis_rs`);
      const dataKelas = await resKelas.json();
      renderBarChart("kelas", Array.isArray(dataKelas) ? dataKelas : dataKelas.data || [], filters, true);
      hideLoading(chartKelasWrapper);
    }

    // ✅ Hanya load penyelenggara jika ada filter penyelenggara
    if (shouldLoadPeny) {
      const resPeny = await fetch(`/dashboard/bar/penyelenggara_grup?${query}&subkolom=jenis_rs`);
      const dataPeny = await resPeny.json();
      renderBarChart("penyelenggara", Array.isArray(dataPeny) ? dataPeny : dataPeny.data || [], filters, true);
      hideLoading(chartPenyWrapper);
    }
  } catch (error) {
    console.error("❌ Gagal memuat data chart:", error);
  }
}

function renderBarChart(tipe, data, filters = {}, isStackedOverride = false) {
  let canvasId = '',
    wrapperId = '';

  switch (tipe) {
    case 'jenis':
      canvasId = 'chartJenis';
      wrapperId = 'chartJenisWrapper';
      break;
    case 'kelas':
      canvasId = 'chartKelas';
      wrapperId = 'chartKelasWrapper';
      break;
    case 'penyelenggara':
      canvasId = 'chartPenyelenggara';
      wrapperId = 'chartPenyelenggaraWrapper';
      break;
    default:
      console.error('Tipe chart tidak dikenali:', tipe);
      return;
  }

  const wrapper = document.getElementById(wrapperId);
  const canvas = document.getElementById(canvasId);
  if (!wrapper || !canvas) return;

  if (!data || !Array.isArray(data) || data.length === 0) {
    wrapper.style.display = 'none';
    return;
  }

  data.sort((a, b) => (b.jumlah || b.count || b.total || 0) - (a.jumlah || a.count || a.total || 0));

  wrapper.style.display = 'block';
  const ctx = canvas.getContext('2d');
  if (ctx.chartInstance) ctx.chartInstance.destroy();

  const labelKey =
    tipe === 'jenis' ? 'jenis' :
    tipe === 'kelas' ? 'kelas_rs' :
    'penyelenggara_grup';

  const first = data[0] || {};
  const possibleKeys = Object.keys(first).filter(
    (k) => ![labelKey, 'jumlah', 'total', 'count', 'nama', 'kategori', 'total_semua'].includes(k)
  );

  const isStacked =
    isStackedOverride ||
    possibleKeys.length > 0 ||
    ((tipe === 'kelas' || tipe === 'penyelenggara') &&
      Array.isArray(filters.jenis_rs) &&
      filters.jenis_rs.length > 1);

  let chartData;
  if (isStacked) {
    if (data[0]?.nama && data[0]?.kategori) {
      const grouped = {};
      data.forEach((d) => {
        if (!grouped[d.nama]) grouped[d.nama] = {};
        grouped[d.nama][d.kategori] = d.total || 0;
      });

      const labels = Object.keys(grouped);
      const subKeys = [...new Set(data.map((d) => d.kategori))];

      const totalPerNama = labels.map((nama) => ({
        nama,
        total: Object.values(grouped[nama]).reduce((a, b) => a + b, 0),
      }));

      totalPerNama.sort((a, b) => b.total - a.total);
      const sortedLabels = totalPerNama.map((item) => item.nama);

      const totalPerKategori = subKeys.map((kategori) => {
        const total = sortedLabels.reduce(
          (sum, nama) => sum + (grouped[nama][kategori] || 0),
          0
        );
        return {
          kategori,
          total
        };
      });

      totalPerKategori.sort((a, b) => b.total - a.total);
      const sortedSubKeys = totalPerKategori.map((item) => item.kategori);

      chartData = {
        labels: sortedLabels,
        datasets: sortedSubKeys.map((sub, i) => ({
          label: sub,
          data: sortedLabels.map((l) => grouped[l][sub] || 0),
          backgroundColor: warnaJenisRS[sub] || fixedColors[i % fixedColors.length],
        })),
      };
    } else {
      const subKeys = possibleKeys.length ? possibleKeys : (filters.jenis_rs || []);

      const totalPerLabel = data.map((d) => ({
        label: d[labelKey],
        total: subKeys.reduce((sum, sub) => sum + (d[sub] || 0), 0),
      }));

      totalPerLabel.sort((a, b) => b.total - a.total);
      const sortedLabels = totalPerLabel.map((d) => d.label);

      const totalPerSub = subKeys.map((sub) => ({
        sub,
        total: data.reduce((sum, d) => sum + (d[sub] || 0), 0),
      }));
      totalPerSub.sort((a, b) => b.total - a.total);
      const sortedSubKeys = totalPerSub.map((s) => s.sub);

      chartData = {
        labels: sortedLabels,
        datasets: sortedSubKeys.map((sub, i) => ({
          label: sub,
          data: sortedLabels.map(
            (l) => (data.find((d) => d[labelKey] === l)?. [sub]) || 0
          ),
          backgroundColor: warnaJenisRS[sub] || fixedColors[i % fixedColors.length],
        })),
      };
    }
  } else {
    const labels = data.map(
      (item) =>
      item.jenis ||
      item.jenis_rs ||
      item.kelas_rs ||
      item.penyelenggara_grup ||
      item.nama
    );

    const values = data.map(
      (item) => item.jumlah || item.count || item.total || 0
    );

    chartData = {
      labels,
      datasets: [{
        label: "Jumlah",
        data: values,
        borderWidth: 1,
        backgroundColor: labels.map(
          (label) => warnaJenisRS[label] || "#999999"
        ),
      }, ],
    };
  }

  const barHeight = 30;
  const topBottomPadding = 80;
  const dynamicHeight = data.length * barHeight;

  const totalHeight = dynamicHeight + topBottomPadding;
  canvas.height = dynamicHeight;
  wrapper.style.height = totalHeight + 'px';

  wrapper.style.display = 'flex';
  wrapper.style.alignItems = 'center';
  wrapper.style.justifyContent = 'center';

  ctx.chartInstance = new Chart(ctx, {
    type: 'bar',
    data: chartData,
    options: {
      indexAxis: 'y',
      responsive: true,
      maintainAspectRatio: false,
      layout: {
        padding: {
          right: 50
        },
      },
      plugins: {
        legend: {
          display: false
        },
        tooltip: {
          mode: 'nearest',
          intersect: true,
        },
        datalabels: {
          anchor: isStacked ? 'center' : 'end',
          align: isStacked ? 'center' : 'right',
          color: isStacked ? '#fff' : '#000',
          font: {
            weight: 'bold'
          },
          formatter: (v, context) => {
            if (!v || v <= 0) return '';
            if (isStacked) {
              const meta = context.chart.getDatasetMeta(context.datasetIndex);
              const rect = meta.data[context.dataIndex];
              if (rect.width < 16) return '';
            }
            return Number(v).toLocaleString();
          },
        },
      },
      scales: {
        x: {
          display: false,
          beginAtZero: true,
          stacked: isStacked,
          grid: {
            drawBorder: false,
            drawTicks: false,
            lineWidth: false,
          },
          ticks: {
            display: false,
          }
        },
        y: {
          stacked: isStacked,
          grid: {
            display: false,
            drawBorder: false,
          },
          ticks: {
            padding: 10,
            maxWidth: 100,
          },
          afterFit: (axis) => {
            axis.width = 120;
          },
        },
      },
    },
    plugins: [
      ChartDataLabels,
      {
        id: 'stackedTotalLabels',
        afterDatasetsDraw(chart) {
          if (!isStacked) return;

          const {
            ctx,
            scales
          } = chart;
          const xAxis = scales.x;
          const yAxis = scales.y;
          ctx.save();
          ctx.font = 'bold 12px sans-serif';
          ctx.fillStyle = '#000';

          const meta = chart.getDatasetMeta(0);
          const barThickness = meta?.data?. [0]?.height || 20;

          chart.data.labels.forEach((label, index) => {
            const datasets = chart.data.datasets;
            let total = 0;
            datasets.forEach(ds => {
              total += ds.data[index] || 0;
            });

            const x = xAxis.getPixelForValue(total);

            const barElement = meta.data[index];
            const y = barElement?.y || yAxis.getPixelForTick(index);
            const centerY = y;

            ctx.textAlign = 'left';
            ctx.textBaseline = 'middle';
            ctx.fillText(total.toLocaleString(), x + 10, centerY);
          });

          ctx.restore();
        },
      },
    ],
  });
}

function renderLineChart(tipe, data) {

  ctx.chartInstance = new Chart(ctx, {
    type: "line",
    data: {
      labels: data.labels,
      datasets
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      interaction: {
        mode: "index",
        intersect: false,
        axis: "x"
      },
      plugins: {
        legend: {
          position: "right",
          labels: {
            generateLabels: chart => {
              const base = Chart.defaults.plugins.legend.labels.generateLabels(chart);
              return base.sort((a, b) => {
                const da = datasets.find(d => d.label === a.text);
                const db = datasets.find(d => d.label === b.text);
                const totalA = da?.data.reduce((s, n) => s + +n, 0) || 0;
                const totalB = db?.data.reduce((s, n) => s + +n, 0) || 0;
                return totalB - totalA;
              });
            }
          }
        },
        tooltip: {
          position: "middleLine",
          mode: "index",
          intersect: false,
          backgroundColor: "#ffffff",
          titleColor: "#1e293b",
          bodyColor: "#1e293b",
          borderColor: "#e5e7eb",
          borderWidth: 1,
          padding: {
            top: 8,
            right: 12,
            bottom: 8,
            left: 12
          },
          callbacks: {
            beforeBody(items) {
              items.sort((a, b) => b.parsed.y - a.parsed.y);
            },
            label(ctx) {
              return `${ctx.dataset.label}: ${Number(ctx.parsed.y).toLocaleString()}`;
            }
          }
        },
        datalabels: {
          display: false
        }
      },
      scales: {
        y: {
          beginAtZero: true,
          grid: {
            drawOnChartArea: true
          },
          border: {
            display: false
          }
        },
        x: {
          grid: {
            drawOnChartArea: false
          },
          border: {
            display: false
          }
        }
      }
    },
    plugins: [ChartDataLabels, verticalLinePlugin]
  });
}

function initDropdowns() {
  document.querySelectorAll('.dropdown').forEach(dropdown => {
    const button = dropdown.querySelector('.custom-select-dropdown');
    const checkboxes = dropdown.querySelectorAll('input[type="checkbox"]');
    const menu = dropdown.querySelector('.dropdown-menu');

    menu.addEventListener('click', e => e.stopPropagation());
    button.setAttribute('data-default', button.textContent);

    checkboxes.forEach(cb => {
      cb.addEventListener('change', () => {
        if (!cb.value) {
          const checked = cb.checked;
          checkboxes.forEach(c => c.checked = checked);
        }
        updateDropdownButtonText(dropdown);
      });
    });

    const selectAll = checkboxes[0];
    if (selectAll) {
      selectAll.addEventListener('change', () => {
        checkboxes.forEach(cb => cb.checked = selectAll.checked);
        updateDropdownButtonText(dropdown);
      });
      checkboxes.forEach(cb => {
        if (cb === selectAll) return;
        cb.addEventListener('change', () => {
          selectAll.checked = Array.from(checkboxes).slice(1).every(c => c.checked);
          updateDropdownButtonText(dropdown);
        });
      });
    }
  });
}

document.querySelectorAll('.dropdown').forEach(dropdown => {
  const button = dropdown.querySelector('.custom-select-dropdown');
  const checkboxes = dropdown.querySelectorAll('input[type="checkbox"]');
  const menu = dropdown.querySelector('.dropdown-menu');

  menu.addEventListener('click', e => e.stopPropagation());

  button.setAttribute('data-default', button.textContent);

  checkboxes.forEach(cb => {
    cb.addEventListener('change', () => {
      if (!cb.value) {
        const isChecked = cb.checked;
        checkboxes.forEach(c => c.checked = isChecked);
      }

      const checked = Array.from(checkboxes)
        .filter(c => c.checked && c.value)
        .map(c => c.value);

      let buttonText;
      if (checked.length === 0 || checked.length === checkboxes.length - 1) {
        buttonText = "Semua";
      } else {
        buttonText = checked.join(', ');
      }

      if (!checked.length && !checkboxes[0].checked) {
        buttonText = button.getAttribute('data-default');
      }

      button.textContent = buttonText;
    });
  });
});

document.addEventListener("DOMContentLoaded", () => {
  initDropdowns();

  const defaults = ["#dropdownListJenis", "#dropdownListProvinsi", "#dropdownListKabupatenKota"];
  defaults.forEach(id => {
    const menu = document.querySelector(id);
    if (!menu) return;
    const checkboxes = menu.querySelectorAll("input[type='checkbox']");
    checkboxes.forEach(cb => (cb.checked = true));
    const dropdown = menu.closest(".dropdown");
    updateDropdownButtonText(dropdown);
  });

  applyFilter(true);

  document.getElementById("applyFilter")?.addEventListener("click", () => applyFilter(false));
});
</script>