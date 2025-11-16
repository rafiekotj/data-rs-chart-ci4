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
    <select id="filterTahun" class="form-select tahun-select">
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

<!-- BAR CHARTS -->
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

<!-- RENTANG TAHUN -->
<div class="row g-3 mb-3">
  <div class="col-md-3 col-sm-6 mt-3">
    <label class="form-label">Rentang Tahun</label>
    <div class="d-flex align-items-center">
      <select id="tahunAwal" class="form-select me-2 tahun-range" style="max-width:120px;">
        <?php foreach ($listTahun as $thn): ?>
        <option value="<?= esc($thn['tahun']) ?>" <?= $thn['tahun'] == $minTahun ? 'selected' : '' ?>>
          <?= esc($thn['tahun']) ?>
        </option>
        <?php endforeach; ?>
      </select>
      <span class="mx-2" style="font-size: 14px;">sampai</span>
      <select id="tahunAkhir" class="form-select ms-2 tahun-range" style="max-width:120px;">
        <?php foreach ($listTahun as $thn): ?>
        <option value="<?= esc($thn['tahun']) ?>" <?= $thn['tahun'] == $maxTahun ? 'selected' : '' ?>>
          <?= esc($thn['tahun']) ?>
        </option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>
</div>

<!-- LINE CHARTS -->
<div id="lineChartsContainer">
  <!-- LINE CHART JENIS RS -->
  <div class="chart-wrapper position-relative mb-3 border rounded" id="lineJenisWrapper" style="display:none;">
    <canvas id="lineJenis" height="340"></canvas>
    <div id="lineLoadingJenis" class="position-absolute w-100 h-100 top-0 start-0 d-none bg-white bg-opacity-75 
        d-flex justify-content-center align-items-center">
      <div class="spinner-border text-secondary" role="status"></div>
    </div>
  </div>

  <!-- LINE CHART KELAS RS -->
  <div class="chart-wrapper position-relative mb-3 border rounded" id="lineKelasWrapper" style="display:none;">
    <canvas id="lineKelas" height="340"></canvas>
    <div id="lineLoadingKelas" class="position-absolute w-100 h-100 top-0 start-0 d-none bg-white bg-opacity-75 
        d-flex justify-content-center align-items-center">
      <div class="spinner-border text-secondary" role="status"></div>
    </div>
  </div>

  <!-- LINE CHART PENYELENGGARA RS -->
  <div class="chart-wrapper position-relative mb-3 border rounded" id="linePenyelenggaraWrapper" style="display:none;">
    <canvas id="linePenyelenggara" height="340"></canvas>
    <div id="lineLoadingPenyelenggara" class="position-absolute w-100 h-100 top-0 start-0 d-none bg-white bg-opacity-75 
        d-flex justify-content-center align-items-center">
      <div class="spinner-border text-secondary" role="status"></div>
    </div>
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
  "#2563eb", "#16a34a", "#dc2626", "#f59e0b", "#9333ea", "#0d9488",
  "#e11d48", "#52525b", "#84cc16", "#0891b2", "#f43f5e", "#a16207",
  "#7c3aed", "#15803d", "#c026d3", "#ea580c", "#0284c7"
];

const paletteJenis = {
  "RSU": "#2563eb",
  "RSIA": "#16a34a",
  "RSK Jiwa": "#dc2626",
  "RSK Mata": "#d97706",
  "RSK GM": "#9333ea",
  "RSK Bedah": "#0d9488",
  "RSK Jantung": "#e11d48",
  "RSK Paru": "#52525b",
  "RSK Orthopedi": "#4d7c0f",
  "RSK Kanker": "#0891b2",
  "RSK THT-KL": "#be123c",
  "RSK Infeksi": "#92400e",
  "RSK Ginjal": "#7c3aed",
  "RS Bergerak": "#15803d",
  "RSK Otak": "#9333ea",
  "RSKO": "#b45309",
  "RSK Stroke": "#0284c7"
};

const paletteKelas = {
  "A": "#60a5fa",
  "B": "#34d399",
  "C": "#f87171",
  "D": "#fbbf24",
  "D Pratama": "#a78bfa",
  "Belum Ditetapkan": "#22d3ee"
};

const palettePenyelenggara = {
  "BUMN": "#3b82f6",
  "Kementerian Lain": "#10b981",
  "Kemkes": "#f97316",
  "Pemkab": "#8b5cf6",
  "Pemkot": "#ef4444",
  "Pemprop": "#14b8a6",
  "POLRI": "#facc15",
  "Swasta": "#6366f1",
  "Swasta Non Profit": "#ec4899",
  "TNI": "#84cc16"
};

let lastFilters = {};

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
  const offset = 10;

  const midY = (top + bottom) / 2;
  let adjustedX = Math.min(Math.max(x + offset, left + offset), right - offset);

  if (x + offset > right - offset) adjustedX = x - offset;

  return {
    x: adjustedX,
    y: midY
  };
};

const verticalLinePlugin = {
  id: "verticalLine",
  beforeDatasetsDraw(chart) {
    const active = chart.tooltip?._active?. [0];
    if (!active) return;

    const {
      ctx
    } = chart;
    const {
      x
    } = active.element;
    const {
      top,
      bottom
    } = chart.scales.y;

    ctx.save();
    ctx.beginPath();
    ctx.moveTo(x, top);
    ctx.lineTo(x, bottom);
    ctx.lineWidth = 2;
    ctx.strokeStyle = "#e5e7eb";
    ctx.setLineDash([8, 4]);
    ctx.stroke();
    ctx.restore();
  }
};

function updateDropdownButtonText(dropdown) {
  const button = dropdown.querySelector(".custom-select-dropdown");
  const checkboxes = [...dropdown.querySelectorAll("input[type='checkbox']")];
  const checkAll = checkboxes.find(c => c.value === "Semua");
  const checked = checkboxes.filter(c => c.checked && c.value !== "Semua").map(c => c.value);

  if (checkAll && checkAll.checked) {
    button.textContent = "Semua";
    return;
  }

  if (checked.length === 0) {
    button.textContent = button.dataset.default || "Pilih";
    return;
  }

  const nonAll = checkboxes.filter(c => c.value !== "Semua");
  if (checked.length === nonAll.length) {
    button.textContent = "Semua";
    return;
  }

  button.textContent = checked.join(", ");
}

function getCheckedValues(selector) {
  const values = [...document.querySelectorAll(`${selector} input[type="checkbox"]:checked`)]
    .map(cb => cb.value.trim())
    .filter(v => v && v !== "Semua");

  return values.length ? values : null;
}

function getSelectedValues(selectId) {
  const el = document.getElementById(selectId);
  return el ? [...el.selectedOptions].map(opt => opt.value) : [];
}

function showChartLoading(wrapper) {
  if (!wrapper) return;
  wrapper.style.position = "relative";

  const ensureElement = (selector, createFn) => {
    let el = wrapper.querySelector(selector);
    if (!el) {
      el = createFn();
      wrapper.appendChild(el);
    }
    return el;
  };

  ensureElement(".loading-overlay", () => {
    const overlay = document.createElement("div");
    Object.assign(overlay, {
      className: "loading-overlay position-absolute w-100 h-100 top-0 start-0"
    });
    Object.assign(overlay.style, {
      backgroundColor: "rgba(255, 255, 255, 1)",
      zIndex: 5,
      borderRadius: "inherit",
      pointerEvents: "none"
    });
    return overlay;
  });

  ensureElement(".loading-spinner", () => {
    const spinner = document.createElement("div");
    spinner.className = "loading-spinner position-absolute d-flex align-items-center justify-content-center";
    Object.assign(spinner.style, {
      top: "50%",
      left: "50%",
      transform: "translate(-50%, -50%)",
      zIndex: 10
    });
    spinner.innerHTML = `
      <div class="spinner-border text-secondary" role="status" style="width:2.5rem;height:2.5rem;">
        <span class="visually-hidden">Loading...</span>
      </div>
    `;
    return spinner;
  });
}

function hideChartLoading(wrapper) {
  if (!wrapper) return;
  [...wrapper.querySelectorAll(".loading-overlay, .loading-spinner")].forEach(el => el.remove());
}

function renderTable(data) {
  const tableBody = document.querySelector("#rsTable tbody");
  if (!tableBody) return;

  if (!data?.length) {
    tableBody.innerHTML = `
      <tr>
        <td colspan="8" class="text-center text-muted py-4">Tidak ada data</td>
      </tr>
    `;
    return;
  }

  tableBody.innerHTML = data.map(row => `
    <tr>
      <td>${row.rumah_sakit ?? '-'}</td>
      <td>${row.jenis_rs ?? '-'}</td>
      <td>${row.kelas_rs ?? '-'}</td>
      <td>${row.alamat ?? '-'}</td>
      <td>${row.kabupaten_kota ?? '-'}</td>
      <td>${row.provinsi ?? '-'}</td>
      <td>${row.penyelenggara_grup ?? '-'}</td>
      <td>${row.penyelenggara_kategori ?? '-'}</td>
    </tr>
  `).join("");
}

function appendArrayParam(params, key, value) {
  if (!value || (Array.isArray(value) && !value.length)) return;
  params.append(key, Array.isArray(value) ? value.join(",") : value);
}

async function updateKabupatenDropdown(selectedProvinsi) {
  const dropdownList = document.getElementById("dropdownListKabupatenKota");
  const dropdownButton = document.getElementById("dropdownKabupatenKota");
  if (!dropdownList || !dropdownButton) return;

  const setLoading = (html) => (dropdownList.innerHTML = html);

  if (!selectedProvinsi?.length) {
    setLoading(`
      <li><label class="dropdown-item text-muted">Pilih provinsi terlebih dahulu</label></li>
    `);
    dropdownButton.textContent = "Pilih Kabupaten/Kota";
    return;
  }

  setLoading(`
    <li class="text-center py-3">
      <div class="spinner-border text-primary spinner-border-sm" role="status"></div>
      <div class="small text-muted mt-2">Memuat data kabupaten...</div>
    </li>
  `);

  try {
    const encodedProv = encodeURIComponent(selectedProvinsi.join(","));
    const res = await fetch(`/dashboard/getKabupatenByProvinsi?provinsi=${encodedProv}`);
    if (!res.ok) throw new Error(`HTTP ${res.status}`);

    const data = await res.json();
    if (!Array.isArray(data) || !data.length) {
      setLoading(`<li><label class="dropdown-item text-muted">Tidak ada data kabupaten</label></li>`);
      dropdownButton.textContent = "Pilih Kabupaten/Kota";
      return;
    }

    renderKabupatenList(data);
  } catch (err) {
    console.error("❌ Gagal memuat kabupaten:", err);
    setLoading(`<li><label class="dropdown-item text-danger">Gagal memuat data</label></li>`);
    dropdownButton.textContent = "Pilih Kabupaten/Kota";
  }

  function renderKabupatenList(data) {
    const items = data.map(
      (item) => `
      <li>
        <label class="dropdown-item d-flex align-items-center">
          <input type="checkbox" class="form-check-input me-2 kategori-checkbox kabupaten-item" value="${item.kabupaten_kota}">
          ${item.kabupaten_kota} <small class="text-muted ms-1">(${item.provinsi})</small>
        </label>
      </li>
    `
    ).join("");

    dropdownList.innerHTML = `
      <li>
        <label class="dropdown-item d-flex align-items-center">
          <input type="checkbox" id="checkAllKabupaten" class="form-check-input me-2 kategori-checkbox" value="">
          Semua
        </label>
      </li>
      ${items}
    `;

    const checkAll = document.getElementById("checkAllKabupaten");
    const kabChecks = dropdownList.querySelectorAll(".kabupaten-item");

    checkAll.checked = true;
    kabChecks.forEach((chk) => (chk.checked = true));
    updateButtonText();

    checkAll.addEventListener("change", () => {
      kabChecks.forEach((chk) => (chk.checked = checkAll.checked));
      updateButtonText();
    });

    kabChecks.forEach((chk) =>
      chk.addEventListener("change", () => {
        checkAll.checked = [...kabChecks].every((c) => c.checked);
        updateButtonText();
      })
    );

    function updateButtonText() {
      const selected = [...kabChecks]
        .filter((c) => c.checked)
        .map((c) => c.value);

      if (checkAll.checked || selected.length === kabChecks.length) {
        dropdownButton.textContent = "Semua";
      } else if (selected.length === 0) {
        dropdownButton.textContent = "Pilih Kabupaten/Kota";
      } else {
        dropdownButton.textContent = selected.join(", ");
      }
    }
  }
}

async function applyFilter(isInitial = false, target = "all") {
  const tahun = document.getElementById("filterTahun")?.value || null;
  const tahun_awal = Number(document.getElementById("tahunAwal")?.value) || 2024;
  const tahun_akhir = Number(document.getElementById("tahunAkhir")?.value) || 2025;
  const jenis = getCheckedValues("#dropdownListJenis");
  const kelas = getCheckedValues("#dropdownListKelas");
  const penyelenggara = getCheckedValues("#dropdownListPenyelenggara");
  const provinsi = getCheckedValues("#dropdownListProvinsi");
  const kabupaten = getCheckedValues("#dropdownListKabupatenKota");

  const getAllValues = (selector) =>
    Array.from(document.querySelectorAll(`${selector} input[type='checkbox']`))
    .map(cb => cb.value)
    .filter(v => v && v !== "Semua");

  const allJenis = getAllValues("#dropdownListJenis");
  const allProvinsi = getAllValues("#dropdownListProvinsi");
  const allKabupaten = getAllValues("#dropdownListKabupatenKota");

  const filters = {
    tahun: tahun || null,
    tahun_awal,
    tahun_akhir,
    jenis_rs: resolveFilterValue(jenis, allJenis),
    kelas_rs: kelas?.length ? kelas : null,
    penyelenggara_grup: penyelenggara?.length ? penyelenggara : null,
    provinsi: resolveFilterValue(provinsi, allProvinsi),
    kabupaten_kota: resolveFilterValue(kabupaten, allKabupaten),
  };

  lastFilters = filters;

  const wrappers = {
    bar: document.querySelectorAll(".chart-wrapper-bar"),
    line: document.querySelectorAll(".chart-wrapper-line"),
  };

  if (target === "bar" || target === "all") wrappers.bar.forEach(showChartLoading);
  if (target === "line" || target === "all") wrappers.line.forEach(showChartLoading);

  try {
    if (target === "bar") {
      await loadBarChartOnly(filters, isInitial);
    } else if (target === "line") {
      await loadLineChartOnly(filters, isInitial);
    } else {
      await Promise.all([
        loadBarChartOnly(filters, isInitial),
        loadLineChartOnly(filters, isInitial),
      ]);
      await loadFilteredTable(filters);
    }
  } catch (err) {
    console.error("❌ Gagal memuat chart:", err);
  } finally {
    document.querySelectorAll(".chart-wrapper").forEach(hideChartLoading);
  }

  function resolveFilterValue(selected, allValues) {
    if (selected?.length) {
      return (selected.includes("Semua") || isInitial) ? allValues : selected;
    }
    return isInitial ? allValues : null;
  }
}

async function loadBarChartOnly(filters, isInitial = false) {
  const wrappers = {
    jenis: document.getElementById("chartJenisWrapper"),
    kelas: document.getElementById("chartKelasWrapper"),
    penyelenggara: document.getElementById("chartPenyelenggaraWrapper")
  };

  const shouldLoad = {
    jenis: (Array.isArray(filters.jenis_rs) && filters.jenis_rs.length) || isInitial,
    kelas: Array.isArray(filters.kelas_rs) && filters.kelas_rs.length,
    penyelenggara: Array.isArray(filters.penyelenggara_grup) && filters.penyelenggara_grup.length
  };

  Object.entries(wrappers).forEach(([key, el]) => {
    el.style.display = shouldLoad[key] ? "block" : "none";
    if (shouldLoad[key]) showChartLoading(el);
  });

  const params = new URLSearchParams();
  appendArrayParam(params, "tahun", filters.tahun);
  appendArrayParam(params, "provinsi", filters.provinsi);
  appendArrayParam(params, "kabupaten_kota", filters.kabupaten_kota);
  appendArrayParam(params, "jenis_rs", filters.jenis_rs);
  appendArrayParam(params, "kelas_rs", filters.kelas_rs);
  appendArrayParam(params, "penyelenggara_grup", filters.penyelenggara_grup);

  const query = params.toString();
  document.getElementById("totalCount").textContent = "0";

  try {
    const [dataJenis, dataKelas, dataPeny] = await Promise.all([
      shouldLoad.jenis ? fetch(`/dashboard/bar/jenis_rs?${query}`).then(r => r.json()) : [],
      shouldLoad.kelas ? fetch(`/dashboard/bar/kelas_rs?${query}&subkolom=jenis_rs`).then(r => r.json()) : [],
      shouldLoad.penyelenggara ? fetch(`/dashboard/bar/penyelenggara_grup?${query}&subkolom=jenis_rs`).then(r => r
        .json()) : []
    ]);

    const totalSemua =
      dataJenis[0]?.total_semua ||
      dataKelas[0]?.total_semua ||
      dataPeny[0]?.total_semua || 0;

    document.getElementById("totalCount").textContent = totalSemua.toLocaleString("id-ID");

    if (shouldLoad.jenis && dataJenis.length) renderBarChart("jenis", dataJenis, filters);
    if (shouldLoad.kelas && dataKelas.length) renderBarChart("kelas", dataKelas, filters, true);
    if (shouldLoad.penyelenggara && dataPeny.length) renderBarChart("penyelenggara", dataPeny, filters, true);

  } catch (error) {
    console.error("❌ Gagal memuat data chart:", error);
  } finally {
    Object.values(wrappers).forEach(hideChartLoading);
  }
}

function renderBarChart(tipe, data, filters = {}, isStackedOverride = false) {
  const map = {
    jenis: ["chartJenis", "chartJenisWrapper"],
    kelas: ["chartKelas", "chartKelasWrapper"],
    penyelenggara: ["chartPenyelenggara", "chartPenyelenggaraWrapper"],
  };
  const [canvasId, wrapperId] = map[tipe] || [];
  if (!canvasId || !wrapperId) {
    console.error("❌ Tipe chart tidak dikenali:", tipe);
    return;
  }

  const wrapper = document.getElementById(wrapperId);
  const canvas = document.getElementById(canvasId);
  if (!wrapper || !canvas) return;

  if (!Array.isArray(data) || data.length === 0) {
    wrapper.style.display = "none";
    return;
  }

  data.sort((a, b) => (b.jumlah || b.count || b.total || 0) - (a.jumlah || a.count || a.total || 0));

  wrapper.style.display = "block";
  const ctx = canvas.getContext("2d");
  if (ctx.chartInstance) ctx.chartInstance.destroy();

  const labelKey =
    tipe === "jenis" ? "jenis" :
    tipe === "kelas" ? "kelas_rs" :
    "penyelenggara_grup";

  const first = data[0] || {};
  const possibleKeys = Object.keys(first).filter(
    (k) => ![labelKey, "jumlah", "total", "count", "nama", "kategori", "total_semua"].includes(k)
  );

  const isStacked =
    isStackedOverride ||
    possibleKeys.length > 0 ||
    ((tipe === "kelas" || tipe === "penyelenggara") &&
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
      const sortedLabels = totalPerNama.map((i) => i.nama);

      const totalPerKategori = subKeys.map((kategori) => ({
        kategori,
        total: sortedLabels.reduce((sum, nama) => sum + (grouped[nama][kategori] || 0), 0),
      }));
      totalPerKategori.sort((a, b) => b.total - a.total);
      const sortedSubKeys = totalPerKategori.map((i) => i.kategori);

      chartData = {
        labels: sortedLabels,
        datasets: sortedSubKeys.map((sub, i) => ({
          label: sub,
          data: sortedLabels.map((l) => grouped[l][sub] || 0),
          backgroundColor: paletteJenis[sub] || fixedColors[i % fixedColors.length],
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
          data: sortedLabels.map((l) => data.find((d) => d[labelKey] === l)?. [sub] || 0),
          backgroundColor: paletteJenis[sub] || fixedColors[i % fixedColors.length],
        })),
      };
    }
  } else {
    const labels = data.map(
      (d) => d.jenis || d.jenis_rs || d.kelas_rs || d.penyelenggara_grup || d.nama
    );
    const values = data.map((d) => d.jumlah || d.count || d.total || 0);

    chartData = {
      labels,
      datasets: [{
        label: "Jumlah",
        data: values,
        borderWidth: 1,
        backgroundColor: labels.map(
          (l, i) => paletteJenis[l] || fixedColors[i % fixedColors.length]
        ),
      }],
    };
  }

  const drawStackedTotals = (chart) => {
    if (!isStacked) return;
    const {
      ctx,
      scales
    } = chart;
    const xAxis = scales.x;
    const yAxis = scales.y;

    ctx.save();
    ctx.font = "bold 12px sans-serif";
    ctx.fillStyle = "#000";

    const meta = chart.getDatasetMeta(0);

    chart.data.labels.forEach((_, i) => {
      const total = chart.data.datasets.reduce(
        (sum, ds) => sum + (ds.data[i] || 0),
        0
      );
      const x = xAxis.getPixelForValue(total);
      const y = meta.data[i]?.y || yAxis.getPixelForTick(i);

      ctx.textAlign = "left";
      ctx.textBaseline = "middle";
      ctx.fillText(total.toLocaleString(), x + 10, y);
    });

    ctx.restore();
  };

  const barHeight = 30;
  const dynamicHeight = data.length * barHeight;
  const totalHeight = dynamicHeight + 80;

  canvas.height = dynamicHeight;
  wrapper.style.height = totalHeight + "px";
  wrapper.style.display = "flex";
  wrapper.style.alignItems = "center";
  wrapper.style.justifyContent = "center";

  ctx.chartInstance = new Chart(ctx, {
    type: "bar",
    data: chartData,
    options: {
      indexAxis: "y",
      responsive: true,
      maintainAspectRatio: false,
      layout: {
        padding: {
          right: 50
        }
      },
      plugins: {
        legend: {
          display: false
        },
        tooltip: {
          mode: "nearest",
          intersect: true
        },
        datalabels: {
          anchor: isStacked ? "center" : "end",
          align: isStacked ? "center" : "right",
          color: isStacked ? "#fff" : "#000",
          font: {
            weight: "bold"
          },
          formatter: (v, ctx) => {
            if (!v || v <= 0) return "";
            if (isStacked) {
              const meta = ctx.chart.getDatasetMeta(ctx.datasetIndex);
              const rect = meta.data[ctx.dataIndex];
              if (rect.width < 16) return "";
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
            lineWidth: false
          },
          ticks: {
            display: false
          },
        },
        y: {
          stacked: isStacked,
          grid: {
            display: false,
            drawBorder: false
          },
          ticks: {
            padding: 10,
            maxWidth: 100
          },
          afterFit: (axis) => (axis.width = 120),
        },
      },
    },
    plugins: [
      ChartDataLabels,
      {
        id: "stackedTotalLabels",
        afterDatasetsDraw: drawStackedTotals,
      },
    ],
  });
}

async function loadLineChartOnly(filters, isInitial = false) {
  const wrappers = {
    jenis: document.getElementById("lineJenisWrapper"),
    kelas: document.getElementById("lineKelasWrapper"),
    penyelenggara: document.getElementById("linePenyelenggaraWrapper"),
  };

  const tipeList = {
    jenis: "/dashboard/line/jenis_rs",
    kelas: "/dashboard/line/kelas_rs",
    penyelenggara: "/dashboard/line/penyelenggara_rs",
  };

  const shouldLoad = {
    jenis: Array.isArray(filters.jenis_rs) && filters.jenis_rs.length,
    kelas: Array.isArray(filters.kelas_rs) && filters.kelas_rs.length,
    penyelenggara: Array.isArray(filters.penyelenggara_grup) && filters.penyelenggara_grup.length,
  };

  const buildLineParams = (filters, isInitial) => {
    const params = new URLSearchParams();
    appendArrayParam(params, "provinsi", filters.provinsi);
    if (!isInitial) appendArrayParam(params, "kabupaten_kota", filters.kabupaten_kota);
    appendArrayParam(params, "jenis_rs", filters.jenis_rs);
    appendArrayParam(params, "kelas_rs", filters.kelas_rs);
    appendArrayParam(params, "penyelenggara_grup", filters.penyelenggara_grup);
    if (filters.tahun_awal) params.append("tahun_awal", filters.tahun_awal);
    if (filters.tahun_akhir) params.append("tahun_akhir", filters.tahun_akhir);
    return params.toString();
  };

  Object.values(wrappers).forEach(w => (w.style.display = "none"));

  Object.entries(wrappers).forEach(([key, el]) => {
    if (shouldLoad[key]) {
      Object.assign(el.style, {
        display: "block",
        position: "relative",
        backgroundColor: "#fff",
        minHeight: "320px",
      });
      showChartLoading(el);
    }
  });

  try {
    const fetchPromises = Object.entries(shouldLoad)
      .filter(([_, aktif]) => aktif)
      .map(async ([key]) => {
        const endpoint = tipeList[key];
        const query = buildLineParams(filters, isInitial);
        const res = await fetch(`${endpoint}?${query}`);
        if (!res.ok) throw new Error(`HTTP ${res.status}`);
        const data = await res.json();

        const allData = data.map(row => ({
          tahun: row.tahun,
          nama: row.nama || "-",
          total: Number(row.total || 0),
        }));

        return {
          key,
          allData
        };
      });

    const results = await Promise.all(fetchPromises);

    results.forEach(({
      key,
      allData
    }) => {
      const wrapper = wrappers[key];
      hideChartLoading(wrapper);
      const canvas = document.getElementById(`line${key.charAt(0).toUpperCase() + key.slice(1)}`);
      if (!canvas) return;

      if (allData.length === 0) {
        const ctx = canvas.getContext("2d");
        ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
        ctx.font = "14px Arial";
        ctx.fillText("Tidak ada data untuk ditampilkan", 100, 100);
        return;
      }

      const tahunLabels = [...new Set(allData.map(d => d.tahun))].sort((a, b) => a - b);
      const grouped = {};
      allData.forEach(row => {
        if (!grouped[row.nama]) grouped[row.nama] = {};
        grouped[row.nama][row.tahun] = row.total;
      });

      const datasets = Object.entries(grouped).map(([nama, values], i) => {
        const color =
          key === "kelas" ? paletteKelas[nama] :
          key === "penyelenggara" ? palettePenyelenggara[nama] :
          fixedColors[i % fixedColors.length];

        return {
          label: nama,
          data: tahunLabels.map(th => values[th] || 0),
          borderColor: color,
          backgroundColor: color,
          tension: 0.3,
          fill: false,
          pointRadius: 4,
          pointHoverRadius: 6,
        };
      });

      datasets.sort((a, b) =>
        b.data.reduce((s, n) => s + n, 0) - a.data.reduce((s, n) => s + n, 0)
      );

      renderLineChart(key, {
        labels: tahunLabels,
        datasets
      });
    });
  } catch (err) {
    console.error("❌ [loadLineChartOnly] Gagal memuat salah satu chart:", err);
  } finally {
    Object.entries(wrappers).forEach(([key, el]) => {
      if (shouldLoad[key]) hideChartLoading(el);
    });
  }
}

function renderLineChart(tipe, data) {
  const map = {
    jenis: ["lineJenis", paletteJenis],
    kelas: ["lineKelas", paletteKelas],
    penyelenggara: ["linePenyelenggara", palettePenyelenggara],
  };
  const [canvasId, palette] = map[tipe] || [];
  if (!canvasId || !palette) {
    console.error("❌ Tipe chart tidak dikenali:", tipe);
    return;
  }

  const canvas = document.getElementById(canvasId);
  if (!canvas) {
    console.error(`❌ Canvas ${canvasId} tidak ditemukan`);
    return;
  }

  const ctx = canvas.getContext("2d");

  if (canvas.chartInstance) {
    try {
      canvas.chartInstance.destroy();
    } catch (err) {
      console.warn(`⚠️ Gagal destroy chart lama (${canvasId}):`, err);
    }
  }

  const datasets = data.datasets.map((ds, i) => {
    const color = palette[ds.label] || fixedColors[i % fixedColors.length] || "#999";
    return {
      ...ds,
      borderColor: color,
      backgroundColor: color,
      borderWidth: 2,
      pointStyle: "circle",
      pointBackgroundColor: color,
      pointBorderColor: "#fff",
      tension: 0.3,
    };
  });

  const fixedLegendWidthPlugin = {
    id: "fixedLegendWidth",
    beforeInit(chart) {
      const originalFit = chart.legend.fit;
      chart.legend.fit = function fit() {
        originalFit.call(this, chart);
        this.width = 140;
      };
    },
  };

  canvas.chartInstance = new Chart(ctx, {
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
      layout: {
        padding: {
          top: 24,
          right: 8,
          left: 8
        }
      },
      plugins: {
        legend: {
          position: "right",
          onClick: null,
          labels: {
            generateLabels(chart) {
              const base = Chart.defaults.plugins.legend.labels.generateLabels(chart);
              return base.sort((a, b) => {
                const da = datasets.find(d => d.label === a.text);
                const db = datasets.find(d => d.label === b.text);
                const totalA = da?.data.reduce((s, n) => s + +n, 0) || 0;
                const totalB = db?.data.reduce((s, n) => s + +n, 0) || 0;
                return totalB - totalA;
              });
            },
          },
        },
        tooltip: {
          position: "middleLine",
          mode: "index",
          intersect: false,
          backgroundColor: "#fff",
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
            },
          },
        },
        datalabels: {
          display: false
        },
      },
      scales: {
        y: {
          beginAtZero: true,
          grid: {
            drawOnChartArea: true
          },
          border: {
            display: false
          },
        },
        x: {
          grid: {
            drawOnChartArea: false
          },
          border: {
            display: false
          },
        },
      },
    },
    plugins: [ChartDataLabels, verticalLinePlugin, fixedLegendWidthPlugin],
  });
}

async function loadFilteredTable(filters) {
  const loadingEl = document.getElementById("tableLoading");
  const footerEl = document.getElementById("tableFooter");
  if (!loadingEl) return;

  loadingEl.classList.remove("d-none");
  if (footerEl) footerEl.innerHTML = "";

  try {
    const params = new URLSearchParams();
    if (filters.tahun) params.append("tahun", filters.tahun);
    if (filters.provinsi) params.append("provinsi", filters.provinsi);
    if (filters.kabupaten_kota) params.append("kabupaten_kota", filters.kabupaten_kota);
    if (Array.isArray(filters.jenis_rs) && filters.jenis_rs.length)
      params.append("jenis_rs", filters.jenis_rs.join(","));
    if (Array.isArray(filters.kelas_rs) && filters.kelas_rs.length)
      params.append("kelas_rs", filters.kelas_rs.join(","));
    if (Array.isArray(filters.penyelenggara_grup) && filters.penyelenggara_grup.length)
      params.append("penyelenggara_grup", filters.penyelenggara_grup.join(","));

    const res = await fetch(`/dashboard/getFilteredTable?${params.toString()}`);
    const result = await res.json();

    const data = Array.isArray(result) ? result : result.data || [];
    const total = result.total ?? data.length;
    const limited = result.limited ?? false;

    if ((limited || data.length >= 500) && footerEl) {
      footerEl.innerHTML = `
        <div class="text-muted text-center fs-6 mt-3">
          Terdapat lebih dari ${data.length} baris data. 
          Silakan lihat seluruh data melalui fitur 
          <strong>Export CSV</strong> atau <strong>Export XLS</strong>.
        </div>`;
    }

    renderTable(data);

  } catch (err) {
    console.error("❌ [loadFilteredTable] Gagal memuat tabel:", err);
  } finally {
    loadingEl.classList.add("d-none");
  }
}

function initDropdowns() {
  document.querySelectorAll(".dropdown").forEach(dropdown => {
    const button = dropdown.querySelector(".custom-select-dropdown");
    const checkboxes = dropdown.querySelectorAll("input[type='checkbox']");
    const menu = dropdown.querySelector(".dropdown-menu");
    if (!button || !menu || !checkboxes.length) return;

    menu.addEventListener("click", e => e.stopPropagation());

    button.setAttribute("data-default", button.textContent);

    const selectAll = checkboxes[0];

    if (selectAll && !selectAll.value) {
      selectAll.addEventListener("change", () => {
        const isChecked = selectAll.checked;
        checkboxes.forEach(cb => (cb.checked = isChecked));
        updateDropdownButtonText(dropdown);
      });
    }

    checkboxes.forEach(cb => {
      cb.addEventListener("change", () => {
        if (cb !== selectAll && selectAll) {
          selectAll.checked = Array.from(checkboxes)
            .slice(1)
            .every(c => c.checked);
        }
        updateDropdownButtonText(dropdown);
      });
    });
  });

  document
    .querySelectorAll("#dropdownListProvinsi input[type='checkbox']")
    .forEach(cb => {
      cb.addEventListener("change", async () => {
        const selectedProvinsi = getCheckedValues("#dropdownListProvinsi");
        await updateKabupatenDropdown(selectedProvinsi);
      });
    });
}

function initExportButtons() {
  const csvBtn = document.getElementById("exportCsvBtn");
  const xlsBtn = document.getElementById("exportXlsBtn");

  if (csvBtn) {
    csvBtn.addEventListener("click", () => {
      const filters = lastFilters;
      const params = new URLSearchParams();

      appendArrayParam(params, "tahun", filters.tahun);
      appendArrayParam(params, "provinsi", filters.provinsi);
      appendArrayParam(params, "kabupaten_kota", filters.kabupaten_kota);
      appendArrayParam(params, "jenis_rs", filters.jenis_rs);
      appendArrayParam(params, "kelas_rs", filters.kelas_rs);
      appendArrayParam(params, "penyelenggara_grup", filters.penyelenggara_grup);
      appendArrayParam(params, "penyelenggara_kategori", filters.penyelenggara_kategori);

      const url = `/dashboard/exportCsv?${params.toString()}`;
      console.log("🔗 Export CSV URL:", url);
      window.location.href = url;
    });
  }

  if (xlsBtn) {
    xlsBtn.addEventListener("click", () => {
      const filters = lastFilters;
      const params = new URLSearchParams();

      params.append("kolom", "kelas_rs");
      params.append("subkolom", "jenis_rs");

      appendArrayParam(params, "tahun", filters.tahun);
      appendArrayParam(params, "provinsi", filters.provinsi);
      appendArrayParam(params, "kabupaten_kota", filters.kabupaten_kota);
      appendArrayParam(params, "jenis_rs", filters.jenis_rs);
      appendArrayParam(params, "kelas_rs", filters.kelas_rs);
      appendArrayParam(params, "penyelenggara_grup", filters.penyelenggara_grup);
      appendArrayParam(params, "penyelenggara_kategori", filters.penyelenggara_kategori);

      const url = `/dashboard/exportXls?${params.toString()}`;
      console.log("🔗 Export XLS URL:", url);
      window.location.href = url;
    });
  }
}

document.addEventListener("DOMContentLoaded", () => {
  initDropdowns();
  initExportButtons();

  ["#dropdownListJenis", "#dropdownListProvinsi", "#dropdownListKabupatenKota"].forEach(id => {
    const menu = document.querySelector(id);
    if (!menu) return;

    const dropdown = menu.closest(".dropdown");
    const button = dropdown.querySelector(".custom-select-dropdown");

    menu.querySelectorAll("input[type='checkbox']").forEach(cb => (cb.checked = false));
    button.textContent = "Semua";
  });

  applyFilter(true);

  const applyBtn = document.getElementById("applyFilter");
  if (applyBtn) {
    applyBtn.addEventListener("click", () => applyFilter(false));
  }

  const tahunSelect = document.getElementById("filterTahun");
  if (tahunSelect) {
    tahunSelect.addEventListener("change", async (e) => {
      const tahun = e.target.value;
      if (!tahun) return;

      const barWrappers = document.querySelectorAll(".chart-wrapper-bar");
      barWrappers.forEach(showChartLoading);

      const {
        tahun_awal,
        tahun_akhir,
        ...rest
      } = lastFilters;
      const filters = {
        ...rest,
        tahun
      };

      try {
        await loadBarChartOnly(filters, false);
      } catch (err) {
        console.error("❌ Gagal reload bar chart:", err);
      } finally {
        barWrappers.forEach(hideChartLoading);
      }
    });
  }

  ["tahunAwal", "tahunAkhir"].forEach(id => {
    const input = document.getElementById(id);
    if (!input) return;

    input.addEventListener("change", async () => {
      const tahun_awal = Number(document.getElementById("tahunAwal")?.value) || 2024;
      const tahun_akhir = Number(document.getElementById("tahunAkhir")?.value) || 2025;

      await applyFilter(false, "line");
    });
  });
});
</script>