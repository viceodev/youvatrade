<footer class=" text-center"> 
    <p class="text-center text-danger">Your Referral Code: {{ "https://"."$_SERVER[HTTP_HOST]"."/auth/register/".auth()->user()->referral_code}}</p>
    <p class="text-center"> © <?php echo getDate()['year'] ?> VictorTrade All Right Reserved.</p>
</footer>




<script src="{{asset('./dashboard/js/lib/jquery/jquery.min.js')}}"></script>
@yield('customJs')

{{-- <script src="{{asset('./dashboard/js/lib/bootstrap/js/popper.min.js')}}"></script> --}}
<script src="{{asset('./dashboard/js/lib/bootstrap/js/bootstrap.min.js')}}"></script>

{{-- <script src="{{asset('./dashboard/js/jquery.slimscroll.js')}}"></script> --}}

<script src="{{asset('./dashboard/js/sidebarmenu.js')}}"></script>

<script src="{{asset('./dashboard/js/lib/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
{{-- <script src="{{asset('./dashboard/js/lib/sparklinechart/jquery.sparkline.min.js')}}"></script> --}}

{{-- <script src="{{asset('./dashboard/js/lib/sparklinechart/sparkline.init.js')}}"></script> --}}

{{-- <script src="../../../../../www.amcharts.com/lib/3/amcharts.js"></script>
<script src="{{asset('./dashboard/js/lib/chart-amchart/serial.js')}}"></script>
<script src="{{asset('./dashboard/js/lib/chart-amchart/export.min.js')}}"></script>
<script src="{{asset('./dashboard/js/lib/chart-amchart/light.js')}}"></script>
<script src="{{asset('./dashboard/js/lib/chart-amchart/ammap.js')}}"></script>
<script src="{{asset('./dashboard/js/lib/chart-amchart/worldLow.js')}}"></script>
<script src="{{asset('./dashboard/js/lib/chart-amchart/pie.js')}}"></script>
<script src="{{asset('./dashboard/js/lib/chart-amchart/amstock.js')}}"></script>
<script src="{{asset('./dashboard/js/lib/chart-amchart/amchart-init.js')}}"></script>
<script src="{{asset('./dashboard/js/lib/weather/jquery.simpleWeather.min.js')}}"></script>
<script src="{{asset('./dashboard/js/lib/weather/weather-init.js')}}"></script>
<script src="{{asset('./dashboard/js/lib/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('./dashboard/js/lib/owl-carousel/owl.carousel-init.js')}}"></script> --}}

<script src="{{asset('./dashboard/js/custom.min.js')}}"></script>
</body>
</html>