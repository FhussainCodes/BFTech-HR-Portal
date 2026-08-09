<footer class="hr-footer {{ app()->getLocale() == 'ur' ? 'text-center' : '' }}">
    <p class="mb-0">
        © {{ date('Y') }} {{ Lang::has('footer.portal_name') ? __('footer.portal_name') : 'BFTech HR Portal' }} | {{ Lang::has('footer.rights') ? __('footer.rights') : 'All Rights Reserved.' }}
    </p>
</footer>