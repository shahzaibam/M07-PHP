<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavLightDropdown" aria-controls="navbarNavLightDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavLightDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <button class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Owner
                    </button>
                    <ul class="dropdown-menu dropdown-menu-light">
                        <li><a class="dropdown-item" href="{{route('owner.listAll')}}">List All</a></li>
                        <li><a class="dropdown-item" href="{{route('owner.searchPet')}}">Search Pet</a></li>
                        <li><a class="dropdown-item" href="{{route('owner.modify')}}">Modify Owner</a></li>
                        <li><a class="dropdown-item" href="{{route('owner.add')}}">Add Owner</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
