<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-4">
  <h2 class="fs-2 fw-bolder mb-0">Dashboard</h2>
</div>

<div class="p-3">
  <ul class="nav nav-tabs" id="rsTab" role="tablist">
    <li class="nav-item">
      <button class="nav-link active" id="jenis-tab" data-bs-toggle="tab" data-bs-target="#jenis" type="button"
        role="tab">
        Jenis RS
      </button>
    </li>
    <li class="nav-item">
      <button class="nav-link" id="kelas-tab" data-bs-toggle="tab" data-bs-target="#kelas" type="button" role="tab">
        Kelas RS
      </button>
    </li>
    <li class="nav-item">
      <button class="nav-link" id="penyelenggara-tab" data-bs-toggle="tab" data-bs-target="#penyelenggara" type="button"
        role="tab">
        Penyelenggara RS
      </button>
    </li>
  </ul>

  <div class="tab-content">
    <!-- TAB JENIS RS -->
    <div class="tab-pane fade show active" id="jenis" role="tabpanel">
      <div class="row g-3 mb-4">
        <div class="col-md-6">
          <label for="jenis_filterProvinsi" class="form-label">Provinsi</label>
          <select id="jenis_filterProvinsi" class="form-select">
            <option value="">Semua</option>
            <?php foreach ($listProvinsi as $prov): ?>
            <option value="<?= esc($prov['provinsi']) ?>"
              <?= $prov['provinsi'] == ($selectedProvinsi ?? '') ? 'selected' : '' ?>>
              <?= esc($prov['provinsi']) ?>
            </option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="col-md-6">
          <label for="jenis_filterKabupatenKota" class="form-label">Kabupaten/Kota</label>
          <select id="jenis_filterKabupatenKota" class="form-select">
            <option value="">Semua</option>
            <?php foreach ($listKabupatenKota as $kk): ?>
            <option value="<?= esc($kk['kabupaten_kota']) ?>" <?= $kk['kabupaten_kota'] == $selectedKabupatenKota
  ? 'selected'
  : '' ?>>
              <?= esc($kk['kabupaten_kota']) ?>
            </option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>

      <div class="mb-4 position-relative">
        <label class="form-label">Kategori</label>
        <div class="dropdown w-100">
          <button class="custom-select-dropdown" id="dropdownKategori_jenis" data-bs-toggle="dropdown"
            aria-expanded="false">
            Pilih Kategori
          </button>
          <ul class="dropdown-menu w-100 p-2" aria-labelledby="dropdownKategori_jenis" id="dropdownKategoriList_jenis"
            style="max-height: 250px; overflow-y: auto;">
            <li class="text-center text-muted small">Memuat data...</li>
          </ul>
        </div>
      </div>

      <div class="col-lg-2 col-md-4 col-sm-12 mb-4">
        <label for="jenis_filterTahun" class="form-label">Per Tahun</label>
        <select id="jenis_filterTahun" class="form-select">
          <?php usort($listTahun, fn($a, $b) => $b['tahun'] <=> $a['tahun']); ?>
          <?php foreach ($listTahun as $thn): ?>
          <option value="<?= esc($thn['tahun']) ?>" <?= $thn['tahun'] == ($selectedTahun ?? '') ? 'selected' : '' ?>>
            <?= esc($thn['tahun']) ?>
          </option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="mb-2 fw-bold">
        Total Rumah Sakit: <span id="totalCount_jenis">0</span>
      </div>

      <div class="chart-wrapper position-relative mb-3 border rounded p-2">
        <canvas id="barchart_jenis" height="340"></canvas>
        <div id="barLoading_jenis" class="position-absolute w-100 h-100 top-0 start-0 d-none bg-white bg-opacity-75 
          d-flex justify-content-center align-items-center">
          <div class="spinner-border text-secondary" role="status"></div>
        </div>
      </div>

      <div class="row g-3 mb-3">
        <div class="col-md-12">
          <label class="form-label">Rentang Tahun</label>
          <div class="d-flex align-items-center">
            <select id="jenis_tahunAwal" class="form-select me-2" style="max-width:120px;">
              <?php foreach ($listTahun as $thn): ?>
              <option value="<?= esc($thn['tahun']) ?>" <?= $thn['tahun'] == $minTahun ? 'selected' : '' ?>>
                <?= esc($thn['tahun']) ?>
              </option>
              <?php endforeach; ?>
            </select>
            <span class="mx-2">sampai</span>
            <select id="jenis_tahunAkhir" class="form-select ms-2" style="max-width:120px;">
              <?php foreach ($listTahun as $thn): ?>
              <option value="<?= esc($thn['tahun']) ?>" <?= $thn['tahun'] == $maxTahun ? 'selected' : '' ?>>
                <?= esc($thn['tahun']) ?>
              </option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
      </div>

      <div class="chart-wrapper position-relative mb-3 border rounded p-2">
        <canvas id="linechart_jenis" height="400"></canvas>
        <div id="lineLoading_jenis" class="position-absolute w-100 h-100 top-0 start-0 d-none bg-white bg-opacity-75 
          d-flex justify-content-center align-items-center">
          <div class="spinner-border text-secondary" role="status"></div>
        </div>
      </div>

      <!-- ACCORDION JENIS -->
      <div class="accordion mb-3" id="accordion_jenis">
        <div class="accordion-item">
          <h2 class="accordion-header" id="heading_jenis">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
              data-bs-target="#collapse_jenis" aria-expanded="false" aria-controls="collapse_jenis">
              Tabel Rumah Sakit
            </button>
          </h2>
          <div id="collapse_jenis" class="accordion-collapse collapse" aria-labelledby="heading_jenis"
            data-bs-parent="#accordion_jenis">
            <div class="accordion-body">
              <table class="table table-hover align-middle mb-0" id="rsTable_jenis">
                <thead class="text-center align-middle">
                  <tr>
                    <th class="col-md-1">Jenis</th>
                    <th class="col-md-3">Nama RS</th>
                    <th class="col-md-1">Kelas</th>
                    <th class="col-md-3">Alamat</th>
                    <th class="col-md-1">Kabupaten/Kota</th>
                    <th class="col-md-1">Provinsi</th>
                    <th class="col-md-1">Penyelenggara<br>Grup</th>
                    <th class="col-md-1">Penyelenggara<br>Kategori</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td colspan="8" class="text-center text-muted py-4">
                      Klik tombol accordion untuk memuat data.
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- TAB KELAS RS -->
    <div class="tab-pane fade" id="kelas" role="tabpanel">
      <div class="row g-3 mb-4">
        <div class="col-md-6">
          <label for="kelas_filterProvinsi" class="form-label">Provinsi</label>
          <select id="kelas_filterProvinsi" class="form-select">
            <option value="">Semua</option>
            <?php foreach ($listProvinsi as $prov): ?>
            <option value="<?= esc($prov['provinsi']) ?>"
              <?= $prov['provinsi'] == ($selectedProvinsi ?? '') ? 'selected' : '' ?>>
              <?= esc($prov['provinsi']) ?>
            </option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="col-md-6">
          <label for="kelas_filterKabupatenKota" class="form-label">Kabupaten/Kota</label>
          <select id="kelas_filterKabupatenKota" class="form-select">
            <option value="">Semua</option>
            <?php foreach ($listKabupatenKota as $kk): ?>
            <option value="<?= esc($kk['kabupaten_kota']) ?>" <?= $kk['kabupaten_kota'] == $selectedKabupatenKota
  ? 'selected'
  : '' ?>>
              <?= esc($kk['kabupaten_kota']) ?>
            </option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>

      <div class="mb-3 position-relative">
        <label class="form-label">Kategori</label>
        <div class="dropdown w-100">
          <button class="custom-select-dropdown" id="dropdownKategori_kelas" data-bs-toggle="dropdown"
            aria-expanded="false">
            Pilih Kategori
          </button>
          <ul class="dropdown-menu w-100 p-2" aria-labelledby="dropdownKategori_kelas" id="dropdownKategoriList_kelas"
            style="max-height: 250px; overflow-y: auto;">
            <li class="text-center text-muted small">Memuat data...</li>
          </ul>
        </div>
      </div>

      <div class="col-md-2 mb-4">
        <label for="kelas_filterTahun" class="form-label">Per Tahun</label>
        <select id="kelas_filterTahun" class="form-select">
          <?php usort($listTahun, fn($a, $b) => $b['tahun'] <=> $a['tahun']); ?>
          <?php foreach ($listTahun as $thn): ?>
          <option value="<?= esc($thn['tahun']) ?>" <?= $thn['tahun'] == ($selectedTahun ?? '') ? 'selected' : '' ?>>
            <?= esc($thn['tahun']) ?>
          </option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="mb-2 fw-bold">
        Total Rumah Sakit: <span id="totalCount_kelas">0</span>
      </div>

      <div class="chart-wrapper position-relative mb-3 border rounded p-2">
        <canvas id="barchart_kelas" height="340"></canvas>
        <div id="barLoading_kelas" class="position-absolute w-100 h-100 top-0 start-0 d-none bg-white bg-opacity-75 
          d-flex justify-content-center align-items-center">
          <div class="spinner-border text-secondary" role="status"></div>
        </div>
      </div>

      <div class="row g-3 mb-3">
        <div class="col-md-12">
          <label class="form-label">Rentang Tahun</label>
          <div class="d-flex align-items-center">
            <select id="kelas_tahunAwal" class="form-select me-2" style="max-width:120px;">
              <?php foreach ($listTahun as $thn): ?>
              <option value="<?= esc($thn['tahun']) ?>" <?= $thn['tahun'] == $minTahun ? 'selected' : '' ?>>
                <?= esc($thn['tahun']) ?>
              </option>
              <?php endforeach; ?>
            </select>
            <span class="mx-2">sampai</span>
            <select id="kelas_tahunAkhir" class="form-select ms-2" style="max-width:120px;">
              <?php foreach ($listTahun as $thn): ?>
              <option value="<?= esc($thn['tahun']) ?>" <?= $thn['tahun'] == $maxTahun ? 'selected' : '' ?>>
                <?= esc($thn['tahun']) ?>
              </option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
      </div>

      <div class="chart-wrapper position-relative border rounded p-2">
        <canvas id="linechart_kelas" height="400"></canvas>
        <div id="lineLoading_kelas" class="position-absolute w-100 h-100 top-0 start-0 d-none bg-white bg-opacity-75 
          d-flex justify-content-center align-items-center">
          <div class="spinner-border text-secondary" role="status"></div>
        </div>
      </div>

      <div class="accordion mb-3" id="accordion_kelas">
        <div class="accordion-item">
          <h2 class="accordion-header" id="heading_kelas">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
              data-bs-target="#collapse_kelas" aria-expanded="false" aria-controls="collapse_kelas">
              Tabel Rumah Sakit
            </button>
          </h2>
          <div id="collapse_kelas" class="accordion-collapse collapse" aria-labelledby="heading_kelas"
            data-bs-parent="#accordion_kelas">
            <div class="accordion-body">
              <table class="table table-hover align-middle mb-0" id="rsTable_kelas">
                <thead class="text-center align-middle">
                  <tr>
                    <th>Kelas</th>
                    <th>Nama RS</th>
                    <th>Jenis</th>
                    <th>Alamat</th>
                    <th>Kabupaten/Kota</th>
                    <th>Provinsi</th>
                    <th>Penyelenggara Grup</th>
                    <th>Penyelenggara Kategori</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td colspan="8" class="text-center text-muted py-4">
                      Klik tombol accordion untuk memuat data.
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- TAB PENYELENGGARA RS -->
    <div class="tab-pane fade" id="penyelenggara" role="tabpanel">
      <div class="row g-3 mb-4">
        <div class="col-md-6">
          <label for="penyelenggara_filterProvinsi" class="form-label">Provinsi</label>
          <select id="penyelenggara_filterProvinsi" class="form-select">
            <option value="">Semua</option>
            <?php foreach ($listProvinsi as $prov): ?>
            <option value="<?= esc($prov['provinsi']) ?>"
              <?= $prov['provinsi'] == ($selectedProvinsi ?? '') ? 'selected' : '' ?>>
              <?= esc($prov['provinsi']) ?>
            </option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="col-md-6">
          <label for="penyelenggara_filterKabupatenKota" class="form-label">Kabupaten/Kota</label>
          <select id="penyelenggara_filterKabupatenKota" class="form-select">
            <option value="">Semua</option>
            <?php foreach ($listKabupatenKota as $kk): ?>
            <option value="<?= esc($kk['kabupaten_kota']) ?>" <?= $kk['kabupaten_kota'] == $selectedKabupatenKota
  ? 'selected'
  : '' ?>>
              <?= esc($kk['kabupaten_kota']) ?>
            </option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>

      <div class="mb-3 position-relative">
        <label class="form-label">Kategori</label>
        <div class="dropdown w-100">
          <button class="custom-select-dropdown" id="dropdownKategori_penyelenggara" data-bs-toggle="dropdown"
            aria-expanded="false">
            Pilih Kategori
          </button>
          <ul class="dropdown-menu w-100 p-2" aria-labelledby="dropdownKategori_penyelenggara"
            id="dropdownKategoriList_penyelenggara" style="max-height: 250px; overflow-y: auto;">
            <li class="text-center text-muted small">Memuat data...</li>
          </ul>
        </div>
      </div>

      <div class="col-md-2 mb-4">
        <label for="penyelenggara_filterTahun" class="form-label">Per Tahun</label>
        <select id="penyelenggara_filterTahun" class="form-select">
          <?php usort($listTahun, fn($a, $b) => $b['tahun'] <=> $a['tahun']); ?>
          <?php foreach ($listTahun as $thn): ?>
          <option value="<?= esc($thn['tahun']) ?>" <?= $thn['tahun'] == ($selectedTahun ?? '') ? 'selected' : '' ?>>
            <?= esc($thn['tahun']) ?>
          </option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="mb-2 fw-bold">
        Total Rumah Sakit: <span id="totalCount_penyelenggara">0</span>
      </div>

      <div class="chart-wrapper position-relative mb-3 border rounded p-2">
        <canvas id="barchart_penyelenggara" height="340"></canvas>
        <div id="barLoading_penyelenggara" class="position-absolute w-100 h-100 top-0 start-0 d-none bg-white bg-opacity-75 
          d-flex justify-content-center align-items-center">
          <div class="spinner-border text-secondary" role="status"></div>
        </div>
      </div>

      <div class="row g-3 mb-3">
        <div class="col-md-12">
          <label class="form-label">Rentang Tahun</label>
          <div class="d-flex align-items-center">
            <select id="penyelenggara_tahunAwal" class="form-select me-2" style="max-width:120px;">
              <?php foreach ($listTahun as $thn): ?>
              <option value="<?= esc($thn['tahun']) ?>" <?= $thn['tahun'] == $minTahun ? 'selected' : '' ?>>
                <?= esc($thn['tahun']) ?>
              </option>
              <?php endforeach; ?>
            </select>
            <span class="mx-2">sampai</span>
            <select id="penyelenggara_tahunAkhir" class="form-select ms-2" style="max-width:120px;">
              <?php foreach ($listTahun as $thn): ?>
              <option value="<?= esc($thn['tahun']) ?>" <?= $thn['tahun'] == $maxTahun ? 'selected' : '' ?>>
                <?= esc($thn['tahun']) ?>
              </option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
      </div>

      <div class="chart-wrapper position-relative border rounded p-2">
        <canvas id="linechart_penyelenggara" height="400"></canvas>
        <div id="lineLoading_penyelenggara" class="position-absolute w-100 h-100 top-0 start-0 d-none bg-white bg-opacity-75 
          d-flex justify-content-center align-items-center">
          <div class="spinner-border text-secondary" role="status"></div>
        </div>
      </div>

      <div class="accordion mb-3" id="accordion_penyelenggara">
        <div class="accordion-item">
          <h2 class="accordion-header" id="heading_penyelenggara">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
              data-bs-target="#collapse_penyelenggara" aria-expanded="false" aria-controls="collapse_penyelenggara">
              Tabel Rumah Sakit (Berdasarkan Penyelenggara)
            </button>
          </h2>
          <div id="collapse_penyelenggara" class="accordion-collapse collapse" aria-labelledby="heading_penyelenggara"
            data-bs-parent="#accordion_penyelenggara">
            <div class="accordion-body">
              <table class="table table-hover align-middle mb-0" id="rsTable_penyelenggara">
                <thead class="text-center align-middle">
                  <tr>
                    <th>Penyelenggara</th>
                    <th>Nama RS</th>
                    <th>Jenis</th>
                    <th>Kelas</th>
                    <th>Alamat</th>
                    <th>Kabupaten/Kota</th>
                    <th>Provinsi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td colspan="7" class="text-center text-muted py-4">
                      Klik tombol accordion untuk memuat data.
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
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
<script>
const fixedColors = [
  "#2563eb", "#16a34a", "#dc2626", "#f59e0b", "#9333ea", "#0d9488", "#e11d48",
  "#52525b", "#84cc16", "#0891b2", "#f43f5e", "#a16207", "#7c3aed", "#15803d",
  "#c026d3", "#ea580c", "#0284c7"
];

function getSelectedKategoriParam(tipe) {
  return [...document.querySelectorAll(`#dropdownKategoriList_${tipe} .kategori-checkbox:checked`)]
    .map(cb => cb.value.trim())
    .filter(Boolean)
    .join(',');
}

async function getData(tipe, jenisChart) {
  const qs = new URLSearchParams({
    provinsi: document.getElementById(`${tipe}_filterProvinsi`)?.value || '',
    kabupaten: document.getElementById(`${tipe}_filterKabupatenKota`)?.value || '',
  });

  const kategori = getSelectedKategoriParam(tipe);
  if (kategori) qs.append('kategori', kategori);

  if (jenisChart === 'bar') {
    const tahun = document.getElementById(`${tipe}_filterTahun`)?.value || '';
    qs.append('tahun', tahun);
    var endpoint = `<?= base_url('dashboard/bar/') ?>${tipe}`;
  } else {
    const tahunAwal = document.getElementById(`${tipe}_tahunAwal`)?.value || '';
    const tahunAkhir = document.getElementById(`${tipe}_tahunAkhir`)?.value || '';
    qs.append('tahunAwal', tahunAwal);
    qs.append('tahunAkhir', tahunAkhir);
    var endpoint = `<?= base_url('dashboard/line/') ?>${tipe}`;
  }

  const url = `${endpoint}?${qs.toString()}`;
  const res = await fetch(url);

  if (!res.ok) return [];

  return res.json();
}

function toggleLoading(tipe, chartType, show = true) {
  const chartId = `${chartType}chart_${tipe}`;
  const loader = document.getElementById(`${chartType}Loading_${tipe}`);
  const canvas = document.getElementById(chartId);
  const emptyMsg = document.getElementById(`${chartId}_empty`);

  if (!canvas || !loader) return;

  loader.classList.toggle('d-none', !show);
  canvas.style.filter = show ? 'blur(4px)' : 'none';

  if (emptyMsg) emptyMsg.style.display = show ? 'none' : '';
}

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

function renderBarChart(tipe, data) {
  const dataset = Array.isArray(data) ?
    data :
    Array.isArray(data?.data) ?
    data.data : [];

  const ctxId = `barchart_${tipe}`;
  const ctx = document.getElementById(ctxId);
  if (!ctx) return;

  // Reset tampilan lama
  document.getElementById(`${ctxId}_empty`)?.remove();
  ctx.style.display = "block";

  // Hancurkan chart lama (hindari leak)
  if (ctx.chartInstance) {
    ctx.chartInstance.destroy();
    ctx.chartInstance = null;
  }

  if (!dataset.length) {
    showEmptyMessage(ctx, ctxId, "📭 Data tidak tersedia untuk tahun dan wilayah yang dipilih.");
    return;
  }

  const urutanKelas = ["A", "B", "C", "D", "D PRATAMA", "Belum Ditetapkan"];
  const sortedData = dataset
    .filter(d => Number(d.total) > 0)
    .sort((a, b) => tipe === 'kelas' ?
      urutanKelas.indexOf(a.kelas_rs) - urutanKelas.indexOf(b.kelas_rs) :
      b.total - a.total
    );

  if (!sortedData.length) {
    showEmptyMessage(ctx, ctxId, "Data tidak tersedia untuk wilayah yang dipilih.");
    return;
  }

  const labels = sortedData.map(d =>
    d.nama || d.jenis_rs || d.kelas_rs || d.nama_kategori || d.label || "Tidak Diketahui"
  );
  const values = sortedData.map(d => Number(d.total));
  updateTotalCount(tipe, sortedData);

  ctx.chartInstance = new Chart(ctx, {
    type: 'bar',
    data: {
      labels,
      datasets: [{
        label: 'Jumlah Rumah Sakit',
        data: values,
        borderWidth: 1,
        backgroundColor: fixedColors.slice(0, labels.length)
      }]
    },
    options: {
      indexAxis: 'y',
      responsive: true,
      maintainAspectRatio: false,
      layout: {
        padding: {
          right: 40
        }
      },
      plugins: {
        legend: {
          display: false
        },
        tooltip: {
          mode: 'nearest',
          intersect: true
        },
        datalabels: {
          anchor: 'end',
          align: 'right',
          offset: 4,
          color: '#000',
          font: {
            weight: 'bold'
          },
          formatter: v => Number(v).toLocaleString()
        }
      },
      scales: {
        x: {
          display: false,
          beginAtZero: true
        },
        y: {
          grid: {
            display: false
          }
        }
      }
    },
    plugins: [ChartDataLabels]
  });
}

function renderLineChart(tipe, data) {
  const ctx = document.getElementById(`linechart_${tipe}`);
  if (!ctx) return;

  document.getElementById(`${ctx.id}_empty`)?.remove();

  const isInvalid = !data ||
    (data.status && data.status !== "success") ||
    !Array.isArray(data.labels) ||
    data.labels.length === 0 ||
    !Array.isArray(data.datasets) ||
    data.datasets.length === 0;

  if (isInvalid) {
    ctx.chartInstance?.destroy();
    ctx.chartInstance = null;
    showEmptyMessage(ctx, ctx.id, "📭 Data tidak tersedia untuk rentang tahun ini.");
    return;
  }

  ctx.style.display = "block";
  ctx.parentNode.classList.add("position-relative");
  ctx.parentNode.style.minHeight = "400px";

  const sortedDatasets =
    data.datasets.length > 1 ? [...data.datasets].sort((a, b) => {
      const totalA = a.data.reduce((s, v) => s + (+v || 0), 0);
      const totalB = b.data.reduce((s, v) => s + (+v || 0), 0);
      return totalB - totalA;
    }) :
    data.datasets;

  const datasets = sortedDatasets.map((ds, i) => ({
    ...ds,
    borderColor: fixedColors[i % fixedColors.length],
    backgroundColor: fixedColors[i % fixedColors.length],
    borderWidth: 2,
    tension: 0.3,
    pointRadius: 4,
    pointHoverRadius: 6,
    fill: false,
    data: ds.data.map(v => +v || 0)
  }));

  ctx.chartInstance?.destroy();
  ctx.chartInstance = null;

  try {
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
  } catch (error) {
    console.error(`Gagal membuat chart untuk ${tipe}:`, error);
  }
}

function showEmptyMessage(ctx, ctxId, message) {
  const existing = document.getElementById(`${ctxId}_empty`);
  if (existing) existing.remove();

  const msg = document.createElement('div');
  msg.id = `${ctxId}_empty`;
  msg.className = "text-center text-muted fw-semibold position-absolute top-50 start-50 translate-middle";
  msg.textContent = message;

  ctx.parentNode.appendChild(msg);
  ctx.style.display = "none";
}

function updateTotalCount(tipe, dataset) {
  const el = document.getElementById(`totalCount_${tipe}`);
  if (!el) return;

  const total = Array.isArray(dataset) && dataset.length ?
    dataset.reduce((sum, d) => sum + (+d.total || 0), 0) :
    0;

  el.textContent = total.toLocaleString();
}


async function updateKabupatenOptions(tipe) {
  const provSelect = document.getElementById(`${tipe}_filterProvinsi`);
  const kabSelect = document.getElementById(`${tipe}_filterKabupatenKota`);
  if (!provSelect || !kabSelect) return;

  kabSelect.innerHTML = '<option value="">Semua</option>';
  const prov = provSelect.value?.trim();
  if (!prov) return;

  try {
    const url = `<?= base_url('dashboard/getKabupatenByProvinsi') ?>?provinsi=${encodeURIComponent(prov)}`;
    const res = await fetch(url);
    if (!res.ok) throw new Error();

    const data = await res.json();
    if (!Array.isArray(data) || data.length === 0) {
      kabSelect.innerHTML = '<option value="">Tidak ada data</option>';
      return;
    }

    const fragment = document.createDocumentFragment();
    const defaultOption = document.createElement('option');
    defaultOption.value = '';
    defaultOption.textContent = 'Semua';
    fragment.appendChild(defaultOption);

    for (const kab of data) {
      const opt = document.createElement('option');
      opt.value = kab.kabupaten_kota ?? '';
      opt.textContent = kab.kabupaten_kota ?? 'Tidak diketahui';
      fragment.appendChild(opt);
    }

    kabSelect.innerHTML = '';
    kabSelect.appendChild(fragment);
  } catch {
    kabSelect.innerHTML = '<option value="">Gagal memuat</option>';
  }
}

function filterTahunDropdown(tipe) {
  const tahunAwalEl = document.getElementById(`${tipe}_tahunAwal`);
  const tahunAkhirEl = document.getElementById(`${tipe}_tahunAkhir`);
  if (!tahunAwalEl || !tahunAkhirEl) return;

  const tahunAwal = parseInt(tahunAwalEl.value);
  const tahunAkhir = parseInt(tahunAkhirEl.value);
  const allYears = Array.from(tahunAwalEl.options, opt => parseInt(opt.value));

  const createOptions = (filterFn) => {
    const frag = document.createDocumentFragment();
    allYears.filter(filterFn).forEach(t => {
      const opt = document.createElement('option');
      opt.value = t;
      opt.textContent = t;
      frag.appendChild(opt);
    });
    return frag;
  };

  tahunAkhirEl.innerHTML = '';
  tahunAkhirEl.appendChild(createOptions(t => t > tahunAwal));
  if (!tahunAkhirEl.value || parseInt(tahunAkhirEl.value) <= tahunAwal) {
    tahunAkhirEl.value = tahunAkhirEl.options[0]?.value || '';
  }

  tahunAwalEl.innerHTML = '';
  tahunAwalEl.appendChild(createOptions(t => t < tahunAkhir));
  if (!tahunAwalEl.value || parseInt(tahunAwalEl.value) >= tahunAkhir) {
    tahunAwalEl.value = tahunAwalEl.options[tahunAwalEl.options.length - 1]?.value || '';
  }
}

async function loadBarChartOnly(tipe) {
  try {
    toggleLoading(tipe, 'bar', true);
    const data = await getData(tipe, 'bar');
    renderBarChart(tipe, data);
  } catch (err) {
    console.error('Gagal memuat bar chart:', err);
  } finally {
    toggleLoading(tipe, 'bar', false);
  }
}

async function loadLineChartOnly(tipe) {
  try {
    toggleLoading(tipe, 'line', true);
    const data = await getData(tipe, 'line');
    renderLineChart(tipe, data);
  } catch (err) {
    console.error('Gagal memuat line chart:', err);
  } finally {
    toggleLoading(tipe, 'line', false);
  }
}

async function loadBothCharts(tipe, selectedKategori = []) {
  const tahun = document.getElementById(`${tipe}_filterTahun`)?.value ?? '';
  const provinsi = document.getElementById(`${tipe}_filterProvinsi`)?.value ?? '';
  const kabupaten = document.getElementById(`${tipe}_filterKabupatenKota`)?.value ?? '';

  const kategoriParam = selectedKategori.length ? selectedKategori.join(',') : '';

  const urlBar =
    `<?= base_url() ?>/dashboard/bar/${tipe}?tahun=${tahun}&provinsi=${provinsi}&kabupaten=${kabupaten}&kategori=${encodeURIComponent(kategoriParam)}`;
  const urlLine =
    `<?= base_url() ?>/dashboard/line/${tipe}?tahunAwal=${tahun - 1}&tahunAkhir=${tahun}&provinsi=${provinsi}&kabupaten=${kabupaten}&kategori=${encodeURIComponent(kategoriParam)}`;

  const spinnerBar = document.getElementById(`barLoading_${tipe}`);
  const spinnerLine = document.getElementById(`lineLoading_${tipe}`);
  spinnerBar?.classList.remove('d-none');
  spinnerLine?.classList.remove('d-none');

  try {
    const [resBar, resLine] = await Promise.all([fetch(urlBar), fetch(urlLine)]);
    const [barData, lineData] = await Promise.all([resBar.json(), resLine.json()]);

    renderBarChart(tipe, barData);

    let formattedLineData = {
      labels: [],
      datasets: []
    };

    if (lineData?.status === "success") {
      formattedLineData.labels = lineData.labels ?? [];
      formattedLineData.datasets = lineData.datasets ?? [];
    } else if (Array.isArray(lineData)) {
      const labelsSet = new Set();
      lineData.forEach(item => {
        item.data?.forEach(d => labelsSet.add(d.nama));
      });

      const labels = Array.from(labelsSet);
      const datasets = lineData.map(item => ({
        label: item.tahun?.toString() ?? "Tanpa Tahun",
        data: labels.map(lbl => item.data?.find(d => d.nama === lbl)?.total ?? 0)
      }));

      formattedLineData = {
        labels,
        datasets
      };
    }

    renderLineChart(tipe, formattedLineData);
  } catch (err) {
    console.error("Gagal memuat chart:", err);
  } finally {
    toggleLoading(tipe, "bar", false);
    toggleLoading(tipe, "line", false);
    spinnerBar?.classList.add('d-none');
    spinnerLine?.classList.add('d-none');
  }
}

const loadedData = {
  jenis: {},
  kelas: {},
  penyelenggara: {}
};

async function loadTableData(tipe, forceReload = false) {
  const prov = document.getElementById(`${tipe}_filterProvinsi`)?.value || '';
  const kab = document.getElementById(`${tipe}_filterKabupatenKota`)?.value || '';
  const kategori = getSelectedKategoriParam(tipe);
  let tahun = document.getElementById(`${tipe}_filterTahun`)?.value || '2025';

  const cacheKey = `${prov}_${kab}_${kategori}_${tahun}`;
  const tableBody = document.querySelector(`#rsTable_${tipe} tbody`);

  // Gunakan cache bila tersedia dan tidak force reload
  if (!forceReload && loadedData[tipe][cacheKey]) {
    tableBody.innerHTML = loadedData[tipe][cacheKey];
    console.log(`⚡ Gunakan cache untuk ${tipe} [${cacheKey}]`);
    return;
  }

  if (!prov && !kab && !kategori) {
    tableBody.innerHTML = `
      <tr><td colspan="8" class="text-center text-muted py-4">
        Filter belum dipilih atau data dapat dilihat di halaman Data RS
      </td></tr>`;
    return;
  }

  try {
    const url =
      `<?= base_url('dashboard/getTableData') ?>?` +
      `tipe=${tipe}&provinsi=${encodeURIComponent(prov)}&kabupaten=${encodeURIComponent(kab)}` +
      `&kategori=${encodeURIComponent(kategori)}&tahun=${encodeURIComponent(tahun)}`;

    console.log('🔍 Fetch URL:', url);
    const res = await fetch(url);
    const json = await res.json();
    const dataset = Array.isArray(json.data) ? json.data : [];

    if (dataset.length === 0) {
      tableBody.innerHTML = `
        <tr><td colspan="8" class="text-center text-muted py-4">
          📭 Tidak ada data untuk filter yang dipilih
        </td></tr>`;
      loadedData[tipe][cacheKey] = tableBody.innerHTML;
      return;
    }

    // Filter data unik (hindari duplikat RS + tahun)
    const uniqueData = [];
    const seen = new Set();
    for (const d of dataset) {
      const key = `${d.rumah_sakit}-${d.tahun}`;
      if (!seen.has(key)) {
        seen.add(key);
        uniqueData.push(d);
      }
    }

    const limited = uniqueData.slice(0, 200);
    const html = limited.map(d => `
      <tr>
        ${tipe === 'jenis' ? `<td>${d.jenis_rs || '-'}</td>` : ''}
        ${tipe === 'kelas' ? `<td>${d.kelas_rs || '-'}</td>` : ''}
        ${tipe === 'penyelenggara' ? `<td>${d.penyelenggara_grup || '-'}</td>` : ''}
        <td>${d.rumah_sakit || d.nama_rs || '-'}</td>
        <td>${d.kelas_rs || '-'}</td>
        <td>${d.alamat || '-'}</td>
        <td>${d.kabupaten_kota || '-'}</td>
        <td>${d.provinsi || '-'}</td>
        ${tipe !== 'penyelenggara' ? `<td>${d.penyelenggara_grup || '-'}</td>` : ''}
        ${tipe !== 'penyelenggara' ? `<td>${d.penyelenggara_kategori || '-'}</td>` : ''}
      </tr>
    `).join('');

    tableBody.innerHTML = html;
    loadedData[tipe][cacheKey] = html;
    console.log(`✅ ${tipe}: render ${limited.length} baris untuk tahun ${tahun}`);
  } catch (err) {
    console.error('Gagal memuat tabel:', err);
    tableBody.innerHTML = `
      <tr><td colspan="8" class="text-center text-danger py-4">
        ⚠️ Gagal memuat data tabel
      </td></tr>`;
  }
}

function ensureAccordionVisibleThenRender(tipe, forceReload = false) {
  const collapseEl = document.getElementById(`collapse_${tipe}`);
  if (!collapseEl) return;

  // Jika sudah terbuka, langsung render
  if (collapseEl.classList.contains('show')) {
    loadTableData(tipe, forceReload);
  } else {
    // Kalau belum terbuka, tunggu sampai terbuka
    const handler = async () => {
      console.log(`📂 Accordion ${tipe} dibuka — render ulang tabel`);
      await loadTableData(tipe, forceReload);
      collapseEl.removeEventListener('shown.bs.collapse', handler);
    };
    collapseEl.addEventListener('shown.bs.collapse', handler);
  }
}

function setupFilterListeners(tipe) {
  const el = (id) => document.getElementById(`${tipe}_${id}`);

  const provSelect = el('filterProvinsi');
  const kabSelect = el('filterKabupatenKota');
  const tahunSelect = el('filterTahun');
  const tahunAwal = el('tahunAwal');
  const tahunAkhir = el('tahunAkhir');

  const reloadAll = async (updateKab = false) => {
    toggleLoading(tipe, 'bar', true);
    toggleLoading(tipe, 'line', true);
    if (updateKab) await updateKabupatenOptions(tipe);
    await loadBothCharts(tipe);
    await loadTableData(tipe, true);
  };

  provSelect?.addEventListener('change', () => reloadAll(true));

  kabSelect?.addEventListener('change', () => reloadAll());

  tahunSelect?.addEventListener('change', async () => {
    toggleLoading(tipe, 'bar', true);
    await loadBarChartOnly(tipe);
    await loadTableData(tipe, true);
  });

  const reloadLineOnly = async () => {
    toggleLoading(tipe, 'line', true);
    filterTahunDropdown(tipe);
    await loadLineChartOnly(tipe);
  };

  tahunAwal?.addEventListener('change', reloadLineOnly);
  tahunAkhir?.addEventListener('change', reloadLineOnly);
}

async function applyAllFilters() {
  for (const tipe of ['jenis', 'kelas', 'penyelenggara']) {
    ensureAccordionVisibleThenRender(tipe, true);
  }
  console.log('✅ Semua data berhasil dimuat di background');
}

function resetTableMessage(tipe) {
  const tableBody = document.querySelector(`#rsTable_${tipe} tbody`);
  if (tableBody) {
    tableBody.innerHTML = `
      <tr><td colspan="8" class="text-center text-muted py-4">
        Filter belum dipilih atau data dapat dilihat di halaman Data RS
      </td></tr>`;
  }
  loadedData[tipe] = null;
}

function setupAccordionListener() {
  ['jenis', 'kelas', 'penyelenggara'].forEach(tipe => {
    const collapseEl = document.getElementById(`collapse_${tipe}`);
    if (!collapseEl) return;

    // Hapus event lama kalau ada (hindari duplikasi)
    collapseEl.removeEventListener('shown.bs.collapse', collapseEl._listenerRef);
    collapseEl._listenerRef = async () => {
      console.log(`📂 Accordion ${tipe} dibuka — memuat tabel`);
      ensureAccordionVisibleThenRender(tipe, true);
    };
    collapseEl.addEventListener('shown.bs.collapse', collapseEl._listenerRef);
  });
}

async function loadKategoriList(tipe) {
  const dropdownList = document.getElementById(`dropdownKategoriList_${tipe}`);
  if (!dropdownList) return;

  dropdownList.innerHTML = '<li class="text-muted small text-center">Memuat...</li>';

  try {
    const res = await fetch(`<?= base_url('dashboard/getDropdownList/') ?>${tipe}`);
    if (!res.ok) throw new Error('Network error');
    const data = await res.json();

    if (!Array.isArray(data) || data.length === 0) {
      dropdownList.innerHTML = '<li class="text-muted small text-center">Tidak ada data</li>';
      return;
    }

    const itemsHTML = data.map(item => {
      const safeValue = (item.nama ?? '').toString();
      const inputId = `chk_${tipe}_${safeValue.replace(/\s+/g, '_')}`;
      return `
        <li>
          <div class="form-check">
            <input class="form-check-input kategori-checkbox" type="checkbox" value="${safeValue}" id="${inputId}">
            <label class="form-check-label" for="${inputId}">${safeValue}</label>
          </div>
        </li>
      `;
    }).join('');

    dropdownList.innerHTML = itemsHTML;

    await loadBothCharts(tipe, []);
    ensureAccordionVisibleThenRender(tipe, true);

  } catch (err) {
    console.error('Gagal memuat kategori:', err);
    dropdownList.innerHTML = '<li class="text-danger small text-center">Gagal memuat data</li>';
  }
}

document.addEventListener('change', async function(e) {
  if (!e.target.classList.contains('kategori-checkbox')) return;

  const list = e.target.closest(`[id^="dropdownKategoriList_"]`);
  if (!list) return;

  const tipe = list.id.replace('dropdownKategoriList_', '');
  const tombol = document.getElementById(`dropdownKategori_${tipe}`);
  if (!tombol) return;

  const selected = Array.from(list.querySelectorAll('.kategori-checkbox:checked'))
    .map(cb => cb.value);

  tombol.textContent = selected.length === 0 ? 'Pilih Kategori' : selected.join(', ');

  window.selectedKategori = selected;

  toggleLoading(tipe, 'bar', true);
  toggleLoading(tipe, 'line', true);
  await loadBothCharts(tipe, selected);
  await loadTableData(tipe, true);
});

document.addEventListener('DOMContentLoaded', async () => {
  console.log("Memulai load awal seluruh data dashboard...");

  await Promise.all([
    loadKategoriList('jenis'),
    loadKategoriList('kelas'),
    loadKategoriList('penyelenggara')
  ]);

  ['jenis', 'kelas', 'penyelenggara'].forEach(setupFilterListeners);

  ['jenis', 'kelas', 'penyelenggara'].forEach(tipe => {
    const collapseEl = document.getElementById(`collapse_${tipe}`);
    if (collapseEl) {
      collapseEl.addEventListener('shown.bs.collapse', () => {
        loadTableData(tipe, true);
      });
    }
  });

  ['jenis', 'kelas', 'penyelenggara'].forEach(tipe => {
    ['filterProvinsi', 'filterKabupatenKota', 'filterTahun'].forEach(field => {
      const el = document.getElementById(`${tipe}_${field}`);
      if (el) {
        el.addEventListener('change', () => loadTableData(tipe, true));
      }
    });
  });

  await Promise.all([
    loadBothCharts('jenis', []),
    loadBothCharts('kelas', []),
    loadBothCharts('penyelenggara', []),
    loadTableData('jenis', true),
    loadTableData('kelas', true),
    loadTableData('penyelenggara', true)
  ]);

  console.log("Semua data awal dashboard berhasil dimuat");
});

document.addEventListener('shown.bs.tab', async (event) => {
  const btn = event.target;
  if (!btn.matches('button[data-bs-toggle="tab"]')) return;

  const target = btn.dataset.bsTarget?.slice(1);
  if (target) {
    console.log(`Tab aktif: ${target}`);
    await loadBothCharts(target);
    await loadTableData(target, true);
  }
});
</script>