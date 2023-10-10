    


<script src="{{ asset('dashboard/assets/js/jquery.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="{{ asset('dashboard/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/bootstrap.bundle.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('datatables.min.js') }}" defer></script>
<script src="{{ asset('dashboard/assets/js/highlight-4.js') }}"></script>



@yield('scripts' )
@stack('scripts')
  </body>
</html>
