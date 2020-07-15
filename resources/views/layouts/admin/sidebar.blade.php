<!-- partial:partials/_sidebar.html -->

<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="user-wrapper">
                <div class="profile-image">
                    <img src={{ URL::asset('/images/faces/face6.jpg') }} alt="profile image">
                </div>
                <div class="text-wrapper">
                    <p style="text-transform: capitalize;" class="profile-name">{{{ Auth::user()->name }}}</p>
                    <div>
                        <small class="designation text-muted">Admin</small>
                        {{-- <small class="designation text-muted">{{Auth::user()->role[0]->name}}</small> --}}
                        <span class="status-indicator online"></span>
                    </div>
                </div>
            </div>
        </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/">
                <i class="menu-icon mdi mdi-television"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        @if (Auth::user()->role == 'admin')    
            <li class="nav-item">
                <a class="nav-link" href="/karyawan">
                    <i class="menu-icon mdi mdi-badge-account-horizontal-outline"></i>
                    <span class="menu-title">Karyawan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/upah">
                    <i class="menu-icon mdi  mdi-currency-usd"></i>
                    <span class="menu-title">Upah Karyawan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/kendaraan">
                    <i class="menu-icon mdi mdi-car-child-seat"></i>
                    <span class="menu-title">Jenis Kendaraan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/laporan">
                    <i class="menu-icon mdi mdi-elevation-rise"></i>
                    <span class="menu-title">Laporan</span>
                </a>
            </li>
        @endif
        <li class="nav-item">
            <a class="nav-link" href="/parkir/masuk">
                <i class="menu-icon mdi mdi-crop-free"></i>
                <span class="menu-title">Parkir Masuk</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/parkir/keluar">
                <i class="menu-icon mdi mdi-barcode-scan"></i>
                <span class="menu-title">Parkir Keluar</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/laporan">
                <i class="menu-icon mdi mdi-elevation-rise"></i>
                <span class="menu-title">Laporan</span>
            </a>
        </li>
    </ul>
    </nav>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        // jQuery.ajax({
        //     url: "{{ url('/orders/data?status=111') }}",
        //     method: 'get',
        //     success: (data) => {
        //         var el = $('#response')
        //         var text = data+"\u00A0| \u00A0"
        //         el.text(text)
        //     },
        //     error: (data) => {
        //         var errors = data.responseJSON;
        //     }
        // });
    
        // jQuery.ajax({
        //     url: "{{ url('/orders/data?status=A00') }}",
        //     method: 'get',
        //     success: (data) => {
        //         var el = $('#delivery')
        //         var text = data+"\u00A0| \u00A0"
        //         el.text(text)
        //     },
        //     error: (data) => {
        //         var errors = data.responseJSON;
        //     }
        // });
    
        // jQuery.ajax({
        //     url: "{{ url('/orders/data?status=ALL') }}",
        //     method: 'get',
        //     success: (data) => {
        //         if(data > 0){
        //             var el = $('#total')
        //             var text =  "<span class='count'>"+data+"</span>"
        //             el.append(text)
        //         }
        //     },
        //     error: (data) => {
        //         var errors = data.responseJSON;
        //     }
        // });
    </script>
    <!-- partial -->