@php
    // Check if the current route belongs to HR or Employee section
    $isHrSection = request()->is('hr*');
    
    // Dynamic App Name based on portal
    $portalName = $isHrSection 
        ? (Lang::has('footer.hr_portal') ? __('footer.hr_portal') : 'BFTech HR Portal')
        : (Lang::has('footer.employee_portal') ? __('footer.employee_portal') : 'BFTech Portal');
@endphp

<footer class="footer bg-white border-top py-3 mt-auto w-100">
    <div class="container-fluid text-center">
        <span class="text-muted small">
            © {{ date('Y') }} <strong class="text-primary">{{ $portalName }}</strong>. {{ Lang::has('footer.rights') ? __('footer.rights') : 'All Rights Reserved.' }}
        </span>
    </div>
</footer>