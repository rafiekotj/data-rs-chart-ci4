<?php $uri = service('uri'); ?>
<div id="sidebar">
  <div class="sidebar-header p-4"></div>
  <ul class="nav flex-column mx-2 mt-4">
    <li class="nav-item mb-2">
      <a href="<?= site_url('dashboard') ?>"
        class="nav-link d-flex align-items-center <?= ($uri->getSegment(1) == 'dashboard' || $uri->getSegment(1) == '') ? 'active' : '' ?>">
        <i class="bi bi-bar-chart-line-fill me-2"></i>
        <span class="menu-text">Dashboard</span>
      </a>
    </li>
    <li class="nav-item mb-2">
      <a href="<?= site_url('datars') ?>"
        class="nav-link d-flex align-items-center <?= ($uri->getSegment(1) == 'datars') ? 'active' : '' ?>">
        <i class="bi bi-hospital-fill me-2"></i>
        <span class="menu-text">Data Rumah Sakit</span>
      </a>
    </li>
  </ul>
</div>