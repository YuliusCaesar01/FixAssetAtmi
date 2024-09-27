 <footer class="main-footer" style="padding-left: 0%">
     <!-- To the right -->
     @if(session('success'))
     <div class="alert alert-success alert-dismissible fade show" role="alert">
         {{ session('success') }}
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
         </button>
     </div>
 @endif
 
 @if($errors->any())
     <div class="alert alert-danger alert-dismissible fade show" role="alert">
         <ul>
             @foreach($errors->all() as $error)
                 <li>{{ $error }}</li>
             @endforeach
         </ul>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
         </button>
     </div>
 @endif
     <div class="float-right d-none d-sm-inline">
         IT YKBS ATMI
     </div>
     <!-- Default to the left -->
     <strong>YKBS &copy; {{ date('Y') }} <a href="https://atmicorp.com">ATMI YKBS</a>.</strong>
     All rights reserved.
 </footer>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <!-- Load Select2 -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

 <!-- Load SweetAlert2 -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/10.16.7/sweetalert2.min.js"></script>
 <script>
    $(function () {
        $('[data-widget="treeview"]').Treeview('init');
    });
</script>
