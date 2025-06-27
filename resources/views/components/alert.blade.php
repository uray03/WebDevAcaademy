@if (session('error'))
  <div id="alert-message" class="fixed top-5 left-1/2 transform -translate-x-1/2 bg-red-100 border border-red-400 text-red-700 px-6 py-3 rounded-lg shadow-lg max-w-md w-full text-center z-50">
    {{ session('error') }}
  </div>
@endif

@if (session('success'))
  <div id="alert-message" class="fixed top-5 left-1/2 transform -translate-x-1/2 bg-green-100 border border-green-400 text-green-700 px-6 py-3 rounded-lg shadow-lg max-w-md w-full text-center z-50">
    {{ session('success') }}
  </div>
@endif

<script>
  setTimeout(() => {
    const alert = document.getElementById('alert-message');
    if (alert) alert.style.display = 'none';
  }, 3000);
</script>
