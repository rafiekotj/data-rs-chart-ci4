</div> <!-- end #content -->

<footer class="footer bg-white border-top py-2">
  <div class="container-fluid">
    <span class="footer-text">Copyright &copy; 2025. All rights reserved.</span>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.getElementById('sidebarToggle').addEventListener('click', function() {
  document.getElementById('sidebar').classList.toggle('collapsed');
  document.getElementById('content').classList.toggle('expanded');
  document.querySelector('.navbar').classList.toggle('expanded');
  document.querySelector('.footer').classList.toggle('expanded');
});
</script>
</body>

</html>