<div id="body">
   <!--  <div class="container"> -->
        <div id="content" class="full">
            <div>
                @if (session()->has('success_message'))
                    <div class="alert alert-success">
                        {{ session()->get('success_message') }}
                    </div>
                @endif
            </div>
            <div class="cart-changable">
                @include('parts.cart-table')
                @include('parts.cart-count')
            </div>
        </div>
   <!--  </div> -->
</div>
@section('extra-js')
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
 <!--    <script src="assets/js/app.js"></script> -->
    <script>

        $(function() {
            $('.cart-changable').on('change', '.quantity', function(e) {
                var id = $(e.target).data('id');

                axios.patch('/cart/' + id, {
                    quantity: this.value
                })
                .then(function (response) {
                    $('.cart-changable').html(response.data);
                })
                .catch(function (error) {
                    console.log(error);
                });
            });
            });
    </script>
@endsection
