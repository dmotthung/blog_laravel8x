    <div class="footer">
        <div class="copyright">
            <p>Copyright &copy; <a href="#">{{ config('app.name') }}</a></p>
        </div>
    </div>

</div>
<!--**********************************
    Main wrapper end
***********************************-->

<!--**********************************
    Scripts
***********************************-->
<script src="{{ asset('admin/plugins/common/common.min.js')}}"></script>
<script src="{{ asset('admin/js/custom.min.js')}}"></script>
<script src="{{ asset('admin/js/settings.js')}}"></script>
<script src="{{ asset('admin/js/gleek.js')}}"></script>
<script src="{{ asset('admin/js/styleSwitcher.js')}}"></script>
@include('sweetalert::alert')
@stack('javascript-external')
@stack('javascript-internal')
