@if (!request()->routeIs('admin.file-manager'))
<footer class="footer pb-0">
  <div class="container-fluid">
    <div class="d-block mx-auto">
      {!! replaceBaseUrl($bs->copyright_text) !!}
    </div>
  </div>
</footer>
@endif
