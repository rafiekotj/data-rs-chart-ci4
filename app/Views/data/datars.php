<div class="container-fluid">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-4">
    <h2 class="fs-2 fw-bolder mb-0">Data Rumah Sakit</h2>
  </div>

  <div class="row mb-3">
    <div class="col-md-12 text-end">
      <form method="get" class="d-inline-flex">
        <input type="text" name="search" class="form-control me-2" placeholder="Cari nama rumah sakit..."
          value="<?= esc($search ?? '') ?>" style="width: 300px;">
        <button type="submit" class="btn btn-sm btn-primary-light">Cari</button>
      </form>
    </div>
  </div>

  <!-- Filter jumlah baris per halaman -->
  <div class="row align-items-center mb-3">
    <div class="col-md-6">
      <form method="get" id="rowsForm" class="d-flex align-items-center">
        <label class="me-2 mb-0 fw-medium text-secondary">Tampilkan</label>
        <select name="per_page" id="rowsPerPage" class="form-select form-select-sm me-2" style="width: 130px;"
          onchange="document.getElementById('rowsForm').submit()">
          <option value="100" <?= $perPage == 100 ? 'selected' : '' ?>>100</option>
          <option value="500" <?= $perPage == 500 ? 'selected' : '' ?>>500</option>
          <option value="1000" <?= $perPage == 1000 ? 'selected' : '' ?>>1000</option>
        </select>
        <span class="text-secondary">baris per halaman</span>
        <input type="hidden" name="page" value="1">
      </form>
    </div>

    <!-- Kolom kanan: total data -->
    <div class="col-md-6 text-md-end text-muted small mt-2 mt-md-0">
      Total data: <strong><?= number_format($totalData) ?></strong>
    </div>
  </div>

  <div class="row">
    <div class="col-12">
      <div class="table-responsive">
        <table class="table table-hover align-middle mb-0" id="rsTable">
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
            <?php if (!empty($rs)): ?>
            <?php foreach ($rs as $item): ?>
            <tr>
              <td class="text-center"><?= esc($item['jenis_rs']) ?></td>
              <td><?= esc($item['rumah_sakit']) ?></td>
              <td class="text-center"><?= esc($item['kelas_rs']) ?></td>
              <td><?= esc($item['alamat']) ?></td>
              <td class="text-center"><?= esc($item['kabupaten_kota']) ?></td>
              <td class="text-center"><?= esc($item['provinsi']) ?></td>
              <td class="text-center"><?= esc($item['penyelenggara_grup']) ?></td>
              <td class="text-center"><?= esc($item['penyelenggara_kategori']) ?></td>
            </tr>
            <?php endforeach; ?>
            <?php else: ?>
            <tr>
              <td colspan="8" class="text-center text-danger py-4 fw-bold">
                <i class="bi bi-exclamation-triangle me-2"></i> Tidak ada data rumah sakit yang tersedia.
              </td>
            </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      <?php if (!empty($rs)): ?>
      <?php
        $maxVisible = 9; // jumlah kotak nomor halaman di tengah
        $totalPage = ceil($totalData / $perPage);

        // Range halaman tengah dinamis
        if ($totalPage <= $maxVisible) {
          $start = 1;
          $end = $totalPage;
        } else {
          $start = max(2, $page - floor(($maxVisible - 2) / 2));
          $end = min($totalPage - 1, $page + floor(($maxVisible - 2) / 2));

          if ($start <= 2) {
            $start = 2;
            $end = $maxVisible - 1;
          }

          if ($end >= $totalPage - 1) {
            $end = $totalPage - 1;
            $start = $totalPage - ($maxVisible - 2);
          }
        }
        ?>

      <nav aria-label="Navigasi halaman" class="mt-4">
        <ul class="pagination justify-content-center modern-pagination">
          <!-- Tombol Sebelumnya -->
          <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
            <a class="page-link" href="<?= $page > 1 ? '?page=' . ($page - 1) . '&per_page=' . $perPage : '#' ?>">
              &laquo;
            </a>
          </li>

          <!-- Halaman pertama -->
          <li class="page-item <?= $page == 1 ? 'active' : '' ?>">
            <a class="page-link" href="?page=1&per_page=<?= $perPage ?>">1</a>
          </li>

          <!-- Titik elipsis di awal -->
          <?php if ($start > 2): ?>
          <li class="page-item disabled"><span class="page-link">...</span></li>
          <?php endif; ?>

          <!-- Halaman tengah -->
          <?php for ($i = $start; $i <= $end; $i++): ?>
          <?php if ($i != 1 && $i != $totalPage): ?>
          <li class="page-item <?= $i == $page ? 'active' : '' ?>">
            <a class="page-link" href="?page=<?= $i ?>&per_page=<?= $perPage ?>"><?= $i ?></a>
          </li>
          <?php endif; ?>
          <?php endfor; ?>

          <!-- Titik elipsis di akhir -->
          <?php if ($end < $totalPage - 1): ?>
          <li class="page-item disabled"><span class="page-link">...</span></li>
          <?php endif; ?>

          <!-- Halaman terakhir -->
          <?php if ($totalPage > 1): ?>
          <li class="page-item <?= $page == $totalPage ? 'active' : '' ?>">
            <a class="page-link" href="?page=<?= $totalPage ?>&per_page=<?= $perPage ?>"><?= $totalPage ?></a>
          </li>
          <?php endif; ?>

          <!-- Tombol Selanjutnya -->
          <li class="page-item <?= $page >= $totalPage ? 'disabled' : '' ?>">
            <a class="page-link"
              href="<?= $page < $totalPage ? '?page=' . ($page + 1) . '&per_page=' . $perPage : '#' ?>">
              Next &raquo;
            </a>
          </li>
        </ul>

        <p class="text-center mt-3 mb-0 small text-muted">
          Halaman <?= $page ?> dari <?= $totalPage ?>
        </p>
      </nav>
      <?php endif; ?>
    </div>
  </div>
</div>
</div>