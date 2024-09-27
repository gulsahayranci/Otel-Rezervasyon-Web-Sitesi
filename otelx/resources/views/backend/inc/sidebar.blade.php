<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">

                <a class="nav-link" href="{{route('panel.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link collapsed" href="{{route('panel.room.index')}}" >

                    Odalar

                </a>

                <a class="nav-link collapsed" href="{{route('panel.roomtype.index')}}" >

                    Oda tipleri

                </a>
                <a class="nav-link collapsed" href="{{route('panel.customer.index')}}" >

                   Müşteriler

                </a>
                <a class="nav-link collapsed" href="{{route('panel.department.index')}}" >

                    Departman

                </a>
                <a class="nav-link collapsed" href="{{route('panel.staff.index')}}" >

                    Kadro

                </a>
                <a class="nav-link collapsed" href="{{route('panel.bookings.index')}}" >

                    Rezervasyon

                </a>
                <a class="nav-link collapsed" href="{{route('panel.service.index')}}" >

                    Servisler

                </a>

                <a class="nav-link collapsed" href="{{route('panel.sitesetting.index')}}" >

                    Site Ayarları

                </a>




            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Start Bootstrap
        </div>
    </nav>
</div>
