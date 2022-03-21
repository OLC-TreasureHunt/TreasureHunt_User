@extends('layouts.app')

@section('title', '')

@section('contents')
<div class="row mt-4 mb-5">
    <div class="col-xl-2 col-md-2 col-2 "></div>
    <div class="col-xl-8 col-md-8 col-8 d-flex justify-content-center">
        <div class="card auth-card bg-transparent shadow-none rounded-0 mb-0 w-100 border-0">
            <div class="card-body text-center">
                <div clas="row">
                    <div class="col-12 col-md-6 m-auto">
                        <img src="{{ cAsset('app-assets/images/pages/maintenance.png') }}" class="img-fluid align-self-center" alt="branding logo">
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <strong>
                                <p class="text-start text-light">{!! $content !!}</p>
                            </strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        $(function() {
            setInterval(function() {
                checkServerMaintenance();
            }, 5 * 1000); //
        });

        function checkServerMaintenance() {
            $.ajax({
                url: BASE_URL + 'nock',
                type: 'GET',
                success: function(result) {
                    if (result.mode == 0) {
                        window.location.href = "{{ route('home') }}";
                    } else {}
                },
                error: function(err) {
                }
            });
        }
    </script>
@endsection