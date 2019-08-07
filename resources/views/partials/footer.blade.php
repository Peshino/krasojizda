<footer class="page-footer font-small fixed-bottom">
    <div class="footer-copyright text-center py-2">
        <small>
            &copy; {{ now()->year }}
            <a href="{{ url('/') }}">
                @lang('messages.krasojizda_name')
            </a>
            | @lang('messages.footer_rights')
        </small>
    </div>
</footer>
