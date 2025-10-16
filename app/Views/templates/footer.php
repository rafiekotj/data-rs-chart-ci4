</div>

<footer class="footer bg-white border-top py-2">
  <div class="container-fluid">
    <span class="footer-text">Copyright &copy; 2025. All rights reserved.</span>
  </div>
</footer>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const sidebar = document.getElementById('sidebar');
  const sidebarToggle = document.getElementById('sidebarToggle');
  const navbar = document.querySelector('.navbar');
  const content = document.getElementById('content');
  const footer = document.querySelector('.footer');

  sidebarToggle.addEventListener('click', function() {
    if (window.innerWidth <= 992) {
      sidebar.classList.toggle('active');
      navbar.classList.toggle('shifted');
      content.classList.toggle('shifted');
      footer.classList.toggle('shifted');
    } else {
      sidebar.classList.toggle('collapsed');
      navbar.classList.toggle('expanded');
      content?.classList.toggle('expanded');
      footer?.classList.toggle('expanded');
    }
  });
});
</script>
</body>

</html>