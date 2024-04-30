<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="fas fa-poll"></i>
        <p>
            Reports
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: none;">
        @role('admin')
            <li class="nav-item">
                <a href="{{ route('invoices-reports') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>invoices reports</p>
                </a>
            </li>
        @endrole
        <li class="nav-item">
            <a href="{{ route('client-report') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>clients reports</p>
            </a>
        </li>

    </ul>
</li>
