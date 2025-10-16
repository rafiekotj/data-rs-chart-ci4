</div>

<footer class="footer bg-white border-top py-2">
  <div class="container-fluid">
    <span class="footer-text">Copyright &copy; 2025. All rights reserved.</span>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
  const sidebar = document.getElementById('sidebar');
  const sidebarToggle = document.getElementById('sidebarToggle');

  sidebarToggle.addEventListener('click', function() {
    if (window.innerWidth <= 992) {
      sidebar.classList.toggle('active');
    } else {
      sidebar.classList.toggle('collapsed');
      document.querySelector('.navbar')?.classList.toggle('expanded');
      document.querySelector('#content')?.classList.toggle('expanded');
      document.querySelector('.footer')?.classList.toggle('expanded');
    }
  });
});
</script>
</body>

</html>