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

            <div id="tableFooter" class="mt-2 text-center text-muted small"></div>
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

const verticalLinePlugin = {
  id: 'verticalLine',
  beforeDatasetsDraw(chart) {
    const {
      ctx,
      tooltip,
      scales
    } = chart;
    const active = tooltip?._active?. [0];
    if (!active) return;

    const {
      x
    } = active.element;
    const yAxis = scales.y;

    ctx.save();
    ctx.beginPath();
    ctx.moveTo(x, yAxis.top);
    ctx.lineTo(x, yAxis.bottom);
    ctx.lineWidth = 2;
    ctx.strokeStyle = '#e5e7eb';
    ctx.setLineDash([8, 4]);
    ctx.stroke();
    ctx.restore();
  }
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

async function updateKabupatenDropdown(selectedProvinsi) {
  const dropdownList = document.getElementById("dropdownListKabupatenKota");

  dropdownList.innerHTML = `
    <li class="text-center py-3">
      <div class="spinner-border text-primary spinner-border-sm" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
      <div class="small text-muted mt-2">Memuat data kabupaten...</div>
    </li>`;

  try {
    if (!selectedProvinsi || selectedProvinsi.length === 0) {
      dropdownList.innerHTML = `
        <li><label class="dropdown-item text-muted">Pilih provinsi terlebih dahulu</label></li>`;
      return;
    }

    const encodedProv = encodeURIComponent(selectedProvinsi.join(","));
    const res = await fetch(`/dashboard/getKabupatenByProvinsi?provinsi=${encodedProv}`);
    if (!res.ok) throw new Error(`HTTP ${res.status}`);

    const data = await res.json();

    if (!Array.isArray(data) || data.length === 0) {
      dropdownList.innerHTML = `
        <li><label class="dropdown-item text-muted">Tidak ada data kabupaten</label></li>`;
      return;
    }

    renderKabupatenList(data);
  } catch (err) {
    console.error("❌ Gagal memuat kabupaten:", err);
    dropdownList.innerHTML = `
      <li><label class="dropdown-item text-danger">Gagal memuat data</label></li>`;
  }

  function renderKabupatenList(data) {
    let html = `
      <li>
        <label class="dropdown-item d-flex align-items-center">
          <input type="checkbox" class="form-check-input me-2 kategori-checkbox" value="">
          Semua
        </label>
      </li>`;

    data.forEach(item => {
      html += `
        <li>
          <label class="dropdown-item d-flex align-items-center">
            <input type="checkbox" class="form-check-input me-2 kategori-checkbox" value="${item.kabupaten_kota}">
            ${item.kabupaten_kota} <small class="text-muted ms-1">(${item.provinsi})</small>
          </label>
        </li>`;
    });

    dropdownList.innerHTML = html;
  }
}

let lastFilters = {};

async function applyFilter(isInitial = false) {
  const jenis = getCheckedValues("#dropdownListJenis");
  const kelas = getCheckedValues("#dropdownListKelas");
  const penyelenggara = getCheckedValues("#dropdownListPenyelenggara");
  const provinsi = getCheckedValues("#dropdownListProvinsi");
  const kabupaten = getCheckedValues("#dropdownListKabupatenKota");
  const tahun = document.getElementById("filterTahun")?.value || null;

  const allProvinsi = Array.from(document.querySelectorAll("#dropdownListProvinsi input[type='checkbox']"))
    .map(cb => cb.value)
    .filter(v => v && v !== "Semua");

  const allKabupaten = Array.from(document.querySelectorAll("#dropdownListKabupatenKota input[type='checkbox']"))
    .map(cb => cb.value)
    .filter(v => v && v !== "Semua");

  const allJenis = Array.from(document.querySelectorAll("#dropdownListJenis input[type='checkbox']"))
    .map(cb => cb.value)
    .filter(v => v && v !== "Semua");

  const filters = {
    tahun: tahun || null,
    jenis_rs: jenis && jenis.length > 0 ?
      (jenis.includes("Semua") || isInitial ? allJenis : jenis) : (isInitial ? allJenis : null),
    kelas_rs: kelas && kelas.length > 0 ? kelas : null,
    penyelenggara_grup: penyelenggara && penyelenggara.length > 0 ? penyelenggara : null,
    provinsi: provinsi && provinsi.length > 0 ?
      (provinsi.includes("Semua") || isInitial ? allProvinsi : provinsi) : (isInitial ? allProvinsi : null),
    kabupaten_kota: kabupaten && kabupaten.length > 0 ?
      (kabupaten.includes("Semua") || isInitial ? allKabupaten : kabupaten) : (isInitial ? allKabupaten : null),
  };

  lastFilters = filters;

  console.log("🎯 [applyFilter] Filter aktif:", filters);

  await Promise.all([
    loadBarChartOnly(filters, isInitial),
    loadLineChartOnly(filters, isInitial),
    loadFilteredTable(filters)
  ]).catch(err => console.error("❌ Gagal memuat salah satu chart:", err));
}

async function loadBarChartOnly(filters, isInitial = false) {
  const chartJenisWrapper = document.getElementById("chartJenisWrapper");
  const chartKelasWrapper = document.getElementById("chartKelasWrapper");
  const chartPenyWrapper = document.getElementById("chartPenyelenggaraWrapper");

  [chartJenisWrapper, chartKelasWrapper, chartPenyWrapper].forEach(w => {
    if (w) w.style.position = "relative";
  });

  chartJenisWrapper.style.display = "block";

  const showLoading = (wrapper) => {
    if (!wrapper) return;

    let overlay = wrapper.querySelector(".loading-overlay");
    if (!overlay) {
      overlay = document.createElement("div");
      overlay.className = "loading-overlay position-absolute w-100 h-100 top-0 start-0";
      overlay.style.backdropFilter = "blur(4px)";
      overlay.style.backgroundColor = "rgba(255, 255, 255, 0.4)";
      overlay.style.zIndex = "5";
      overlay.style.borderRadius = "inherit";
      overlay.style.pointerEvents = "none";
      wrapper.appendChild(overlay);
    }

    let spinner = wrapper.querySelector(".loading-spinner");
    if (!spinner) {
      spinner = document.createElement("div");
      spinner.className = "loading-spinner position-absolute d-flex align-items-center justify-content-center";
      spinner.style.top = "50%";
      spinner.style.left = "50%";
      spinner.style.transform = "translate(-50%, -50%)";
      spinner.style.zIndex = "10";
      spinner.innerHTML = `
        <div class="spinner-border text-secondary" role="status" style="width: 2.5rem; height: 2.5rem;">
          <span class="visually-hidden">Loading...</span>
        </div>
      `;
      wrapper.appendChild(spinner);
    }
  };

  const hideLoading = (wrapper) => {
    if (!wrapper) return;
    const overlay = wrapper.querySelector(".loading-overlay");
    const spinner = wrapper.querySelector(".loading-spinner");
    if (overlay) overlay.remove();
    if (spinner) spinner.remove();
  };

  const shouldLoadKelas = Array.isArray(filters.kelas_rs) && filters.kelas_rs.length > 0;
  const shouldLoadPeny = Array.isArray(filters.penyelenggara_grup) && filters.penyelenggara_grup.length > 0;

  chartKelasWrapper.style.display = shouldLoadKelas ? "block" : "none";
  chartPenyWrapper.style.display = shouldLoadPeny ? "block" : "none";

  if (shouldLoadKelas) showLoading(chartKelasWrapper);
  if (shouldLoadPeny) showLoading(chartPenyWrapper);

  const params = new URLSearchParams();
  if (filters.tahun) params.append("tahun", filters.tahun);
  if (filters.provinsi) params.append("provinsi", filters.provinsi);
  if (filters.kabupaten_kota) params.append("kabupaten", filters.kabupaten_kota);
  if (filters.jenis_rs?.length) params.append("jenis_rs", filters.jenis_rs.join(","));
  if (shouldLoadKelas) params.append("kelas_rs", filters.kelas_rs.join(","));
  if (shouldLoadPeny) params.append("penyelenggara_grup", filters.penyelenggara_grup.join(","));
  const query = params.toString();

  document.getElementById("totalCount").textContent = "0";

  try {
    showLoading(chartJenisWrapper);

    const promises = [
      fetch(`/dashboard/bar/jenis_rs?${query}`).then(r => r.json())
    ];
    if (shouldLoadKelas)
      promises.push(fetch(`/dashboard/bar/kelas_rs?${query}&subkolom=jenis_rs`).then(r => r.json()));
    if (shouldLoadPeny)
      promises.push(fetch(`/dashboard/bar/penyelenggara_grup?${query}&subkolom=jenis_rs`).then(r => r.json()));

    const [dataJenis, dataKelas, dataPeny] = await Promise.all(promises);

    let totalSemua = 0;
    if (Array.isArray(dataJenis) && dataJenis.length > 0 && dataJenis[0].total_semua) {
      totalSemua = dataJenis[0].total_semua;
    } else if (Array.isArray(dataKelas) && dataKelas.length > 0 && dataKelas[0].total_semua) {
      totalSemua = dataKelas[0].total_semua;
    } else if (Array.isArray(dataPeny) && dataPeny.length > 0 && dataPeny[0].total_semua) {
      totalSemua = dataPeny[0].total_semua;
    }

    document.getElementById("totalCount").textContent = totalSemua.toLocaleString("id-ID");

    renderBarChart("jenis", Array.isArray(dataJenis) ? dataJenis : dataJenis.data || [], filters);
    hideLoading(chartJenisWrapper);

    if (shouldLoadKelas) {
      renderBarChart("kelas", Array.isArray(dataKelas) ? dataKelas : dataKelas.data || [], filters, true);
      hideLoading(chartKelasWrapper);
    }

    if (shouldLoadPeny) {
      renderBarChart("penyelenggara", Array.isArray(dataPeny) ? dataPeny : dataPeny.data || [], filters, true);
      hideLoading(chartPenyWrapper);
    }

  } catch (error) {
    console.error("❌ Gagal memuat data chart:", error);
    [chartJenisWrapper, chartKelasWrapper, chartPenyWrapper].forEach(hideLoading);
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

async function loadLineChartOnly(filters, isInitial = false) {
  console.log("📈 [loadLineChartOnly] Muat chart tren berdasarkan filter:", filters);

  const lineWrapper = document.querySelector("#linechart").closest(".chart-wrapper");
  const lineLoading = document.getElementById("lineLoading");

  lineWrapper.style.display = "block";
  lineLoading.classList.remove("d-none");

  const tahunAwal = filters.tahun_awal || 2024;
  const tahunAkhir = filters.tahun_akhir || 2025;
  const baseParams = new URLSearchParams();

  if (filters.provinsi) baseParams.append("provinsi", filters.provinsi);
  if (filters.kabupaten_kota) baseParams.append("kabupaten_kota", filters.kabupaten_kota);
  if (filters.jenis_rs) baseParams.append("jenis_rs", filters.jenis_rs);
  if (filters.kelas_rs) baseParams.append("kelas_rs", filters.kelas_rs);
  if (filters.penyelenggara_grup) baseParams.append("penyelenggara_grup", filters.penyelenggara_grup);

  const allData = [];

  try {
    for (let tahun = tahunAwal; tahun <= tahunAkhir; tahun++) {
      const params = new URLSearchParams(baseParams);
      params.append("tahun_awal", tahun);
      params.append("tahun_akhir", tahun);

      const res = await fetch(`/dashboard/line/jenis_rs?${params.toString()}`);
      if (!res.ok) throw new Error(`HTTP ${res.status}`);
      const data = await res.json();

      data.forEach(row => {
        allData.push({
          tahun: row.tahun,
          jenis: row.nama || "-",
          total: Number(row.total || 0),
        });
      });
    }

    console.log("📊 Data gabungan tren RS:", allData);

    if (allData.length === 0) {
      const ctx = document.getElementById("linechart").getContext("2d");
      ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
      ctx.font = "14px Arial";
      ctx.fillText("Tidak ada data untuk ditampilkan", 100, 100);
      return;
    }

    const tahunLabels = [...new Set(allData.map(d => d.tahun))].sort((a, b) => a - b);
    const grouped = {};
    allData.forEach(row => {
      if (!grouped[row.jenis]) grouped[row.jenis] = {};
      grouped[row.jenis][row.tahun] = row.total;
    });

    let datasets = Object.entries(grouped).map(([jenis, values], i) => ({
      label: jenis,
      data: tahunLabels.map(th => values[th] || 0),
      borderColor: warnaJenisRS[jenis] || fixedColors[i % fixedColors.length],
      backgroundColor: warnaJenisRS[jenis] || fixedColors[i % fixedColors.length],
      tension: 0.3,
      fill: false,
      pointRadius: 4,
      pointHoverRadius: 6,
    }));

    datasets.sort((a, b) => {
      const totalA = a.data.reduce((sum, n) => sum + n, 0);
      const totalB = b.data.reduce((sum, n) => sum + n, 0);
      return totalB - totalA;
    });

    renderLineChart("jenis", {
      labels: tahunLabels,
      datasets: datasets
    });
  } catch (err) {
    console.error("❌ [loadLineChartOnly] Gagal memuat data tren:", err);
  } finally {
    lineLoading.classList.add("d-none");
  }
}

function renderLineChart(tipe, data) {
  const canvas = document.getElementById("linechart");
  const ctx = canvas.getContext("2d");

  if (ctx.chartInstance) {
    try {
      ctx.chartInstance.destroy();
    } catch (e) {
      console.warn("⚠️ Gagal destroy chart lama:", e);
    }
  }

  const datasets = data.datasets.map(ds => ({
    ...ds,
    borderWidth: 2,
    pointStyle: "circle",
    pointBackgroundColor: ds.backgroundColor,
    pointBorderColor: "#fff",
  }));

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
          onClick: null,
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

async function loadFilteredTable(filters) {
  const loading = document.getElementById("tableLoading");
  loading.classList.remove("d-none");

  document.getElementById("tableFooter").innerHTML = "";

  try {
    const params = new URLSearchParams();
    if (filters.tahun) params.append("tahun", filters.tahun);
    if (filters.provinsi) params.append("provinsi", filters.provinsi);
    if (filters.kabupaten_kota) params.append("kabupaten_kota", filters.kabupaten_kota);
    if (filters.jenis_rs?.length) params.append("jenis_rs", filters.jenis_rs.join(","));
    if (filters.kelas_rs?.length) params.append("kelas_rs", filters.kelas_rs.join(","));
    if (filters.penyelenggara_grup?.length)
      params.append("penyelenggara_grup", filters.penyelenggara_grup.join(","));

    const res = await fetch(`/dashboard/getFilteredTable?${params.toString()}`);
    const result = await res.json();

    console.log("🧩 Hasil JSON mentah dari backend:", result);

    const data = Array.isArray(result) ? result : result.data || [];
    const total = result.total ?? data.length;
    const limited = result.limited ?? false;

    console.log("✅ Jumlah data diterima dari backend:", data.length);

    if (limited || data.length >= 500) {
      const footer = document.getElementById("tableFooter");
      if (footer) {
        footer.innerHTML = `
      <div class="text-muted text-center fs-6 mt-3">
        Terdapat lebih dari ${data.length} baris data. 
        Silakan lihat seluruh data melalui fitur <strong>Export CSV</strong> atau <strong>Export XLS</strong>.
      </div>`;
      }
    }

    renderTable(data);

  } catch (err) {
    console.error("❌ Gagal memuat tabel:", err);
  } finally {
    loading.classList.add("d-none");
  }
}

function renderTable(data) {
  const tableBody = document.querySelector("#rsTable tbody");
  tableBody.innerHTML = "";

  if (!data || data.length === 0) {
    tableBody.innerHTML = `
      <tr>
        <td colspan="8" class="text-center text-muted py-4">
          Tidak ada data
        </td>
      </tr>
    `;
    return;
  }

  data.forEach((row) => {
    const tr = document.createElement("tr");
    tr.innerHTML = `
      <td>${row.rumah_sakit ?? '-'}</td>
      <td>${row.jenis_rs ?? '-'}</td>
      <td>${row.kelas_rs ?? '-'}</td>
      <td>${row.alamat ?? '-'}</td>
      <td>${row.kabupaten_kota ?? '-'}</td>
      <td>${row.provinsi ?? '-'}</td>
      <td>${row.penyelenggara_grup ?? '-'}</td>
      <td>${row.penyelenggara_kategori ?? '-'}</td>
    `;
    tableBody.appendChild(tr);
  });
}

document.getElementById("exportCsvBtn").addEventListener("click", () => {
  const tahun = document.getElementById("filterTahun")?.value || "-";
  const provinsi = document.getElementById("filterProvinsi")?.value || "";
  const kabupaten = document.getElementById("filterKabupaten")?.value || "";
  const jenis_rs = getSelectedValues("filterJenisRS");
  const kelas_rs = getSelectedValues("filterKelasRS");
  const penyelenggara_grup = getSelectedValues("filterPenyelenggaraGrup");
  const penyelenggara_kategori = getSelectedValues("filterPenyelenggaraKategori");

  const params = new URLSearchParams({
    tahun,
    provinsi,
    kabupaten_kota: kabupaten,
    jenis_rs: jenis_rs.join(","),
    kelas_rs: kelas_rs.join(","),
    penyelenggara_grup: penyelenggara_grup.join(","),
    penyelenggara_kategori: penyelenggara_kategori.join(","),
  });

  const url = `/dashboard/exportCsv?${params.toString()}`;
  console.log("🔗 Export CSV URL:", url);
  window.location.href = url;
});

function getSelectedValues(selectId) {
  const el = document.getElementById(selectId);
  if (!el) return [];
  return Array.from(el.selectedOptions).map(opt => opt.value);
}

document.getElementById("exportXlsBtn").addEventListener("click", () => {
  const filters = lastFilters;

  const params = new URLSearchParams();
  params.append("kolom", "kelas_rs");
  params.append("subkolom", "jenis_rs");

  if (filters.tahun) params.append("tahun", filters.tahun);
  if (filters.provinsi) params.append("provinsi", filters.provinsi);
  if (filters.kabupaten_kota) params.append("kabupaten_kota", filters.kabupaten_kota);
  if (filters.jenis_rs?.length) params.append("jenis_rs", filters.jenis_rs.join(","));
  if (filters.kelas_rs?.length) params.append("kelas_rs", filters.kelas_rs.join(","));
  if (filters.penyelenggara_grup?.length) params.append("penyelenggara_grup", filters.penyelenggara_grup.join(","));
  if (filters.penyelenggara_kategori?.length) params.append("penyelenggara_kategori", filters.penyelenggara_kategori
    .join(","));

  const url = `/dashboard/exportXls?${params.toString()}`;
  console.log("🔗 Export URL:", url);
  window.location.href = url;
});

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

document.querySelectorAll("#dropdownListProvinsi input[type='checkbox']").forEach(cb => {
  cb.addEventListener("change", async () => {
    const selectedProvinsi = getCheckedValues("#dropdownListProvinsi");
    await updateKabupatenDropdown(selectedProvinsi);
  });
});

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

    checkboxes.forEach(cb => (cb.checked = false));

    const dropdown = menu.closest(".dropdown");
    const button = dropdown.querySelector(".custom-select-dropdown");
    button.textContent = "Semua";
  });

  applyFilter(true);

  document.getElementById("applyFilter")?.addEventListener("click", () => applyFilter(false));

  const tahunSelect = document.getElementById("filterTahun");
  if (tahunSelect) {
    tahunSelect.addEventListener("change", () => {
      console.log("🕓 Tahun diubah ke:", tahunSelect.value);
      applyFilter(false);
    });
  }
});
</script>