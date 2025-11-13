</div>

<footer class="footer bg-white border-top py-2">
  <div class="container-fluid">
    <span class="footer-text">Copyright &copy; 2025. All rights reserved.</span>
  </div>
</footer>

<div class="sidebar-overlay" id="sidebarOverlay"></div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
  const sidebar = document.getElementById('sidebar');
  const sidebarToggle = document.getElementById('sidebarToggle');
  const overlay = document.getElementById('sidebarOverlay');

  sidebarToggle.addEventListener('click', function() {
    if (window.innerWidth <= 496) {
      sidebar.classList.toggle('active');
      overlay.classList.toggle('show');
    } else if (window.innerWidth <= 992) {
      sidebar.classList.toggle('active');
    } else {
      sidebar.classList.toggle('collapsed');
      document.querySelector('.navbar')?.classList.toggle('expanded');
      document.querySelector('#content')?.classList.toggle('expanded');
      document.querySelector('.footer')?.classList.toggle('expanded');
    }
  });

  overlay.addEventListener('click', function() {
    sidebar.classList.remove('active');
    overlay.classList.remove('show');
  });
});
</script>
</body>

</html>