<div class="container-fluid">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-4">
    <h2 class="fs-2 fw-bolder mb-0">Data Rumah Sakit</h2>
  </div>

  <!-- Filter jumlah baris per halaman -->
  <div class="row align-items-center mb-3">
    <!-- Kolom kiri: dropdown tampilkan -->
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
      <nav aria-label="Navigasi halaman" class="mt-4">
        <ul class="pagination justify-content-center modern-pagination">
          <!-- Tombol Sebelumnya -->
          <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
            <a class="page-link" href="<?= $page > 1 ? '?page=' . ($page - 1) . '&per_page=' . $perPage : '#' ?>">
              &laquo; Sebelumnya
            </a>
          </li>

          <!-- Halaman pertama -->
          <li class="page-item <?= $page == 1 ? 'active' : '' ?>">
            <a class="page-link" href="?page=1&per_page=<?= $perPage ?>">1</a>
          </li>

          <!-- Titik elipsis di awal -->
          <?php if ($page > 5): ?>
          <li class="page-item disabled"><span class="page-link">...</span></li>
          <?php endif; ?>

          <!-- Halaman tengah (sekitar halaman aktif) -->
          <?php
            $start = max(2, $page - 2);
            $end = min($totalPage - 1, $page + 2);
            for ($i = $start; $i <= $end; $i++):
            ?>
          <li class="page-item <?= $i == $page ? 'active' : '' ?>">
            <a class="page-link" href="?page=<?= $i ?>&per_page=<?= $perPage ?>"><?= $i ?></a>
          </li>
          <?php endfor; ?>

          <!-- Titik elipsis di akhir -->
          <?php if ($page < $totalPage - 4): ?>
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
              Selanjutnya &raquo;
            </a>
          </li>
        </ul>

        <p class="text-center mt-2 small text-muted">
          Halaman <?= $page ?> dari <?= $totalPage ?>
        </p>
      </nav>
      <?php endif; ?>
    </div>
  </div>
</div>