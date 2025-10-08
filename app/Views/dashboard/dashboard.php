<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-4">
  <h2 class="fs-2 fw-bolder mb-0">Dashboard</h2>
</div>

<!-- TABS -->
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

      <!-- Filter Provinsi & Kabupaten -->
      <div class="row g-3 mb-4">
        <div class="col-md-6">
          <label for="jenis_filterProvinsi" class="form-label">Provinsi</label>
          <select id="jenis_filterProvinsi" class="form-select">
            <option value="">Semua</option>
            <?php foreach ($listProvinsi as $prov): ?>
            <option value="<?= esc($prov['provinsi']) ?>"
              <?= $prov['provinsi'] == $selectedProvinsi ? 'selected' : '' ?>>
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
            <option value="<?= esc($kk['kabupaten_kota']) ?>"
              <?= $kk['kabupaten_kota'] == $selectedKabupatenKota ? 'selected' : '' ?>>
              <?= esc($kk['kabupaten_kota']) ?>
            </option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>

      <!-- Filter Tahun -->
      <div class="col-md-2 mb-4">
        <label for="jenis_filterTahun" class="form-label">Per Tahun</label>
        <select id="jenis_filterTahun" class="form-select">
          <?php usort($listTahun, fn($a, $b) => $b['tahun'] <=> $a['tahun']); ?>
          <?php foreach ($listTahun as $thn): ?>
          <option value="<?= esc($thn['tahun']) ?>" <?= ($thn['tahun'] == ($selectedTahun ?? '')) ? 'selected' : '' ?>>
            <?= esc($thn['tahun']) ?>
          </option>
          <?php endforeach; ?>
        </select>
      </div>

      <!-- Bar Chart -->
      <div class="chart-wrapper position-relative mb-3 border rounded p-2">
        <canvas id="barchart_jenisrs" height="340"></canvas>
        <div id="barLoading_jenis" class="position-absolute w-100 h-100 top-0 start-0 d-none bg-white bg-opacity-75 
          d-flex justify-content-center align-items-center">
          <div class="spinner-border text-secondary" role="status"></div>
        </div>
      </div>

      <!-- Rentang Tahun -->
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

      <!-- Line Chart -->
      <div class="chart-wrapper position-relative border rounded p-2">
        <canvas id="linechart_jenisrs" height="400"></canvas>
        <div id="lineLoading_jenis" class="position-absolute w-100 h-100 top-0 start-0 d-none bg-white bg-opacity-75 
          d-flex justify-content-center align-items-center">
          <div class="spinner-border text-secondary" role="status"></div>
        </div>
      </div>
    </div>

    <!-- TAB KELAS RS -->
    <div class="tab-pane fade" id="kelas" role="tabpanel">

      <!-- Filter Provinsi & Kabupaten -->
      <div class="row g-3 mb-4">
        <div class="col-md-6">
          <label for="kelas_filterProvinsi" class="form-label">Provinsi</label>
          <select id="kelas_filterProvinsi" class="form-select">
            <option value="">Semua</option>
            <?php foreach ($listProvinsi as $prov): ?>
            <option value="<?= esc($prov['provinsi']) ?>"><?= esc($prov['provinsi']) ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="col-md-6">
          <label for="kelas_filterKabupatenKota" class="form-label">Kabupaten/Kota</label>
          <select id="kelas_filterKabupatenKota" class="form-select">
            <option value="">Semua</option>
            <?php foreach ($listKabupatenKota as $kk): ?>
            <option value="<?= esc($kk['kabupaten_kota']) ?>"><?= esc($kk['kabupaten_kota']) ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>

      <!-- Filter Tahun -->
      <div class="col-md-2 mb-4">
        <label for="kelas_filterTahun" class="form-label">Per Tahun</label>
        <select id="kelas_filterTahun" class="form-select">
          <?php foreach ($listTahun as $thn): ?>
          <option value="<?= esc($thn['tahun']) ?>"><?= esc($thn['tahun']) ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <!-- Bar Chart -->
      <div class="chart-wrapper position-relative mb-3 border rounded p-2">
        <canvas id="barchart_kelasrs" height="340"></canvas>
        <div id="barLoading_kelas" class="position-absolute w-100 h-100 top-0 start-0 d-none bg-white bg-opacity-75 
          d-flex justify-content-center align-items-center">
          <div class="spinner-border text-secondary" role="status"></div>
        </div>
      </div>

      <!-- Rentang Tahun -->
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
              <?php foreach ($listTahun as $thn): ?> <option value="<?= esc($thn['tahun']) ?>"
                <?= $thn['tahun'] == $maxTahun ? 'selected' : '' ?>>
                <?= esc($thn['tahun']) ?>
              </option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
      </div>

      <!-- Line Chart -->
      <div class="chart-wrapper position-relative border rounded p-2">
        <canvas id="linechart_kelasrs" height="400"></canvas>
        <div id="lineLoading_kelas" class="position-absolute w-100 h-100 top-0 start-0 d-none bg-white bg-opacity-75 
          d-flex justify-content-center align-items-center">
          <div class="spinner-border text-secondary" role="status"></div>
        </div>
      </div>
    </div>

    <!-- TAB PENYELENGGARA RS -->
    <div class="tab-pane fade" id="penyelenggara" role="tabpanel">

      <!-- Filter Provinsi & Kabupaten -->
      <div class="row g-3 mb-4">
        <div class="col-md-6">
          <label for="penyelenggara_filterProvinsi" class="form-label">Provinsi</label>
          <select id="penyelenggara_filterProvinsi" class="form-select">
            <option value="">Semua</option>
            <?php foreach ($listProvinsi as $prov): ?>
            <option value="<?= esc($prov['provinsi']) ?>"
              <?= $prov['provinsi'] == $selectedProvinsi ? 'selected' : '' ?>>
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
            <option value="<?= esc($kk['kabupaten_kota']) ?>"
              <?= $kk['kabupaten_kota'] == $selectedKabupatenKota ? 'selected' : '' ?>>
              <?= esc($kk['kabupaten_kota']) ?>
            </option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>

      <!-- Filter Tahun -->
      <div class="col-md-2 mb-4">
        <label for="penyelenggara_filterTahun" class="form-label">Per Tahun</label>
        <select id="penyelenggara_filterTahun" class="form-select">
          <?php foreach ($listTahun as $thn): ?>
          <option value="<?= esc($thn['tahun']) ?>" <?= ($thn['tahun'] == ($selectedTahun ?? '')) ? 'selected' : '' ?>>
            <?= esc($thn['tahun']) ?>
          </option>
          <?php endforeach; ?>
        </select>
      </div>

      <!-- Bar Chart -->
      <div class="chart-wrapper position-relative mb-3 border rounded p-2">
        <canvas id="barchart_penyelenggara" height="340"></canvas>
        <div id="barLoading_penyelenggara" class="position-absolute w-100 h-100 top-0 start-0 d-none bg-white bg-opacity-75 
          d-flex justify-content-center align-items-center">
          <div class="spinner-border text-secondary" role="status"></div>
        </div>
      </div>

      <!-- Rentang Tahun -->
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

      <!-- Line Chart -->
      <div class="chart-wrapper position-relative border rounded p-2">
        <canvas id="linechart_penyelenggara" height="400"></canvas>
        <div id="lineLoading_penyelenggara" class="position-absolute w-100 h-100 top-0 start-0 d-none bg-white bg-opacity-75 
          d-flex justify-content-center align-items-center">
          <div class="spinner-border text-secondary" role="status"></div>
        </div>
      </div>
    </div>
  </div>
</div>






<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
<script>
Chart.register(ChartDataLabels);

const fixedColors = [
  "#2563eb", "#16a34a", "#dc2626", "#f59e0b", "#9333ea", "#0d9488", "#e11d48",
  "#52525b", "#84cc16", "#0891b2", "#f43f5e", "#a16207", "#7c3aed", "#15803d",
  "#c026d3", "#ea580c", "#0284c7"
];

async function getData(tipe, jenisChart) {
  const prov = document.getElementById(`${tipe}_filterProvinsi`)?.value || '';
  const kab = document.getElementById(`${tipe}_filterKabupatenKota`)?.value || '';
  let url = '';

  if (jenisChart === 'bar') {
    const tahun = document.getElementById(`${tipe}_filterTahun`)?.value || '';
    url = `<?= base_url('dashboard/bar/') ?>${tipe}?tahun=${tahun}&provinsi=${prov}&kabupaten=${kab}`;
  } else {
    const tahunAwal = document.getElementById(`${tipe}_tahunAwal`)?.value || '';
    const tahunAkhir = document.getElementById(`${tipe}_tahunAkhir`)?.value || '';
    url =
      `<?= base_url('dashboard/line/') ?>${tipe}?tahunAwal=${tahunAwal}&tahunAkhir=${tahunAkhir}&provinsi=${prov}&kabupaten=${kab}`;
  }

  const res = await fetch(url);
  return await res.json();
}

function toggleLoading(tipe, chartType, show = true) {
  const canvas = document.getElementById(
    `${chartType}chart_${tipe === 'penyelenggara' ? 'penyelenggara' : tipe + 'rs'}`);
  const loader = document.getElementById(`${chartType}Loading_${tipe}`);

  if (!canvas || !loader) return;

  if (show) {
    loader.classList.remove('d-none');
    canvas.style.filter = 'blur(4px)';
  } else {
    loader.classList.add('d-none');
    canvas.style.filter = 'none';
  }
}

document.querySelectorAll('button[data-bs-toggle="tab"]').forEach(tab => {
  tab.addEventListener('shown.bs.tab', async (event) => {
    const target = event.target.getAttribute('data-bs-target').replace('#', '');
    await loadBothCharts(target);
  });
});

// --- Plugin garis vertikal (hover line) ---
const verticalLinePlugin = {
  id: 'verticalLine',
  beforeDatasetsDraw(chart) {
    if (chart.tooltip?._active?.length) {
      const ctx = chart.ctx;
      const activePoint = chart.tooltip._active[0];
      const x = activePoint.element.x;
      const yAxis = chart.scales.y;
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
  }
};

Chart.Tooltip.positioners.middleLine = function(elements) {
  if (!elements.length) return false;
  const chart = elements[0].element.$context.chart;
  const x = elements[0].element.x;
  const yScale = chart.scales.y;
  const midY = (yScale.top + yScale.bottom) / 2;

  const rightOffset = 74;
  return {
    x: x + rightOffset,
    y: midY
  };
};

function renderBarChart(tipe, data) {
  let sortedData;

  if (tipe === 'kelas') {
    const urutanKelas = ["A", "B", "C", "D", "D PRATAMA", "Belum Ditetapkan"];
    sortedData = [...data].sort((a, b) => {
      const kelasA = Object.values(a)[0];
      const kelasB = Object.values(b)[0];
      const indexA = urutanKelas.indexOf(kelasA);
      const indexB = urutanKelas.indexOf(kelasB);
      return indexA - indexB;
    });
  } else {
    sortedData = [...data].sort((a, b) => b.total - a.total);
  }

  const labels = sortedData.map(d => Object.values(d)[0]);
  const values = sortedData.map(d => d.total);

  const ctxId = `barchart_${tipe === 'penyelenggara' ? 'penyelenggara' : tipe + 'rs'}`;
  const ctx = document.getElementById(ctxId);
  if (ctx.chartInstance) ctx.chartInstance.destroy();

  const globalMax = Math.max(...values);
  const suggestedMax = Math.ceil(globalMax * 1.1);

  ctx.chartInstance = new Chart(ctx, {
    type: 'bar',
    data: {
      labels,
      datasets: [{
        label: `Jumlah`,
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
          formatter: function(value) {
            return value.toLocaleString();
          }
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
  const tahunList = [...new Set(data.map(d => d.tahun))].sort();
  const kategoriList = [...new Set(data.map(d => Object.values(d)[1]))];

  let datasets = kategoriList.map((kategori, i) => {
    const nilaiPerTahun = tahunList.map(t => {
      const found = data.find(d => d.tahun == t && Object.values(d)[1] == kategori);
      return found ? found.total : 0;
    });
    const totalKeseluruhan = nilaiPerTahun.reduce((a, b) => a + b, 0);
    return {
      label: kategori,
      data: nilaiPerTahun,
      total: totalKeseluruhan,
      borderColor: fixedColors[i % fixedColors.length],
      backgroundColor: fixedColors[i % fixedColors.length],
      borderWidth: 2,
      tension: 0.3,
      fill: false,
      pointRadius: 4,
      pointHoverRadius: 6
    };
  });

  datasets.sort((a, b) => b.total - a.total);

  datasets.forEach((ds, i) => {
    ds.borderColor = fixedColors[i % fixedColors.length];
    ds.backgroundColor = fixedColors[i % fixedColors.length];
  });

  const ctxId = `linechart_${tipe === 'penyelenggara' ? 'penyelenggara' : tipe + 'rs'}`;
  const ctx = document.getElementById(ctxId);
  if (ctx.chartInstance) ctx.chartInstance.destroy();

  ctx.chartInstance = new Chart(ctx, {
    type: 'line',
    data: {
      labels: tahunList,
      datasets
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      interaction: {
        mode: 'index',
        intersect: false,
        axis: 'x'
      },
      plugins: {
        legend: {
          position: 'right',
          labels: {
            generateLabels: chart => {
              const labels = Chart.defaults.plugins.legend.labels.generateLabels(chart);
              return labels.sort((a, b) => {
                const da = datasets.find(d => d.label === a.text);
                const db = datasets.find(d => d.label === b.text);
                return db.total - da.total;
              });
            }
          }
        },
        tooltip: {
          mode: 'index',
          intersect: false,
          position: 'middleLine',
          backgroundColor: '#ffffff',
          titleColor: '#1e293b',
          bodyColor: '#1e293b',
          borderColor: '#e5e7eb',
          borderWidth: 1,
          xAlign: 'center',
          yAlign: 'center',
          padding: {
            top: 8,
            right: 12,
            bottom: 8,
            left: 12
          },
          boxPadding: 8,
          // boxWidth: 12,
          // boxHeight: 12,
          callbacks: {
            beforeBody(tooltipItems) {
              tooltipItems.sort((a, b) => b.parsed.y - a.parsed.y);
            },
            label(context) {
              return `${context.dataset.label}: ${context.parsed.y.toLocaleString()}`;
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
    plugins: [verticalLinePlugin]
  });
}

async function loadBothCharts(tipe) {
  try {
    toggleLoading(tipe, 'bar', true);
    toggleLoading(tipe, 'line', true);

    const barCanvas = document.getElementById(`barchart_${tipe === 'penyelenggara' ? 'penyelenggara' : tipe + 'rs'}`);
    const lineCanvas = document.getElementById(
      `linechart_${tipe === 'penyelenggara' ? 'penyelenggara' : tipe + 'rs'}`);
    if (barCanvas?.chartInstance) {
      barCanvas.chartInstance.destroy();
    }
    if (lineCanvas?.chartInstance) {
      lineCanvas.chartInstance.destroy();
    }

    const [barData, lineData] = await Promise.all([
      getData(tipe, 'bar'),
      getData(tipe, 'line')
    ]);

    // Render ulang setelah tab aktif dan DOM stabil
    requestAnimationFrame(() => {
      renderBarChart(tipe, barData);
      renderLineChart(tipe, lineData);
    });

  } catch (err) {
    console.error('Gagal memuat chart:', err);
  } finally {
    toggleLoading(tipe, 'bar', false);
    toggleLoading(tipe, 'line', false);
  }
}

async function updateKabupatenOptions(tipe) {
  const provSelect = document.getElementById(`${tipe}_filterProvinsi`);
  const kabSelect = document.getElementById(`${tipe}_filterKabupatenKota`);
  kabSelect.innerHTML = '<option value="">Semua</option>';

  const prov = provSelect?.value || '';
  if (!prov) return;

  try {
    const url = `<?= base_url('dashboard/getKabupatenByProvinsi') ?>?provinsi=${encodeURIComponent(prov)}`;
    const res = await fetch(url);
    const data = await res.json();

    data.forEach(item => {
      const opt = document.createElement('option');
      opt.value = item.kabupaten_kota;
      opt.textContent = item.kabupaten_kota;
      kabSelect.appendChild(opt);
    });
  } catch (err) {
    console.error('Gagal memuat kabupaten:', err);
  }
}

function filterTahunDropdown(tipe) {
  const tahunAwalEl = document.getElementById(`${tipe}_tahunAwal`);
  const tahunAkhirEl = document.getElementById(`${tipe}_tahunAkhir`);
  if (!tahunAwalEl || !tahunAkhirEl) return;

  const tahunAwal = parseInt(tahunAwalEl.value);
  const tahunAkhir = parseInt(tahunAkhirEl.value);

  const allOptions = Array.from(tahunAwalEl.options).map(opt => parseInt(opt.value));

  tahunAkhirEl.innerHTML = '';
  allOptions.forEach(t => {
    if (t > tahunAwal) {
      const opt = document.createElement('option');
      opt.value = t;
      opt.textContent = t;
      tahunAkhirEl.appendChild(opt);
    }
  });
  if (parseInt(tahunAkhirEl.value) <= tahunAwal) {
    tahunAkhirEl.value = tahunAkhirEl.options[0]?.value || '';
  }

  tahunAwalEl.innerHTML = '';
  allOptions.forEach(t => {
    if (t < tahunAkhir) {
      const opt = document.createElement('option');
      opt.value = t;
      opt.textContent = t;
      tahunAwalEl.appendChild(opt);
    }
  });
  if (parseInt(tahunAwalEl.value) >= tahunAkhir) {
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

function setupFilterListeners(tipe) {
  const provSelect = document.getElementById(`${tipe}_filterProvinsi`);
  const kabSelect = document.getElementById(`${tipe}_filterKabupatenKota`);
  const tahunSelect = document.getElementById(`${tipe}_filterTahun`);
  const tahunAwal = document.getElementById(`${tipe}_tahunAwal`);
  const tahunAkhir = document.getElementById(`${tipe}_tahunAkhir`);

  if (provSelect) {
    provSelect.addEventListener('change', async () => {
      await updateKabupatenOptions(tipe);
      loadBothCharts(tipe);
    });
  }

  if (kabSelect) {
    kabSelect.addEventListener('change', () => loadBothCharts(tipe));
  }

  if (tahunSelect) {
    tahunSelect.addEventListener('change', () => loadBarChartOnly(tipe));
  }

  if (tahunAwal) {
    tahunAwal.addEventListener('change', () => {
      filterTahunDropdown(tipe);
      loadLineChartOnly(tipe);
    });
  }
  if (tahunAkhir) {
    tahunAkhir.addEventListener('change', () => {
      filterTahunDropdown(tipe);
      loadLineChartOnly(tipe);
    });
  }
}

(async () => {
  ['jenis', 'kelas', 'penyelenggara'].forEach(tipe => {
    setupFilterListeners(tipe);
    filterTahunDropdown(tipe);
    loadBothCharts(tipe);
  });
})();
</script>