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
                        <small class="designation text-muted">{{Auth::user()->role[0]->name}}</small>
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
        <li class="nav-item">
            <a class="nav-link" href="/schedule">
                <i class="menu-icon mdi mdi-calendar-clock"></i>
                <span class="menu-title">Schedule</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/pelajar/invoice">
                <i class="menu-icon mdi mdi-library-books"></i>
                <span class="menu-title">Invoice</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/voucher">
                <i class="menu-icon mdi mdi-crop-free"></i>
                <span class="menu-title">Voucher</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#users" aria-expanded="false" aria-controls="users">
                <i class="menu-icon fa fa-user-o"></i>
                <span class="menu-title">Pelajar</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="users">
                <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                    <a class="nav-link" href="/pelajar">Semua Pelajar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/pelajar/invoice">Tagihan</a>
                </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#batch" aria-expanded="false" aria-controls="batch">
                <i class="menu-icon mdi mdi-lightbulb-outline"></i>
                <span class="menu-title">Batch</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="batch">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="/batch?jenis=reguler">Batch Reguler</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/batch?jenis=online">Batch Online</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#brevet" aria-expanded="false" aria-controls="brevet">
                <i class="menu-icon mdi mdi-content-copy"></i>
                <span class="menu-title">Brevet</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="brevet">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="/brevet?jenis=false">Brevet Reguler</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/brevet?jenis=true">Brevet Online</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/brevet/lokasi">Lokasi</a>
                    </li>
                </ul>
            </div>
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