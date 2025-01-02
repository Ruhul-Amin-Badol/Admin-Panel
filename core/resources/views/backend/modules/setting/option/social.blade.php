@extends('backend.layouts.master')

@section('meta')
    <title>Options - {{ get_option('title') }}</title>
@endsection

@section('content')
    <div class="page-header">
        <div class="add-item d-flex">
            <div class="page-title">
                <h4>Options</h4>
                <h6>Manage Social Links</h6>
            </div>
        </div>
        <div class="page-btn">
            <a href="javascript:void(0)" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#statusModal">
                <i data-feather="plus-circle"></i>Social Links
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="settings-wrapper d-flex">

                @include('backend.modules.setting.option.sidebar')

                <div class="settings-page-wrap card p-2">
                    <form action="{{ route('settings.social.store') }}" method="POST" enctype="multipart/form-data"
                        id="createSocialSetting">
                        @csrf
                        <div class="setting-title">
                            <h4>Order Settings</h4>
                        </div>
                        <div class="company-info">
                            <div class="card-title-head">
                                <h6><span><i data-feather="zap"></i></span>Social Links</h6>
                            </div>
                            <div class="row">
                                <div class="col-xl-4 col-lg-6 col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Facebook</label>
                                        <input type="text" class="form-control" name="facebook"
                                            value="{{ $facebook ?? '' }}">
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-6 col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Facebook Group</label>
                                        <input type="text" class="form-control" name="facebook_group"
                                            value="{{ $facebook_group ?? '' }}">
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-6 col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Instagram</label>
                                        <input type="text" class="form-control" name="instagram"
                                            value="{{ $instagram ?? '' }}">
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-6 col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Youtube</label>
                                        <input type="text" class="form-control" name="youtube"
                                            value="{{ $youtube ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="modal-footer-btn">
                            <button type="button" class="btn btn-cancel me-2" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-submit">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#createSocialSetting').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: '{{ route('settings.social.store') }}',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: response.message,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '{{ route('settings.social') }}';
                        }
                    });
                },
                error: function(xhr, status, error) {
                    try {
                        var responseObj = JSON.parse(xhr.responseText);
                        var errorMessages = responseObj.invalid_urls ?
                            responseObj.invalid_urls.map(url => 'Invalid URL for: ' + url).flat() : [
                                responseObj.message
                            ];

                        var errorMessageHTML = '<ul>' + errorMessages.map(errorMessage =>
                            '<li>' + errorMessage + '</li>').join('') + '</ul>';

                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            html: errorMessageHTML,
                        });
                    } catch (e) {
                        console.error('Error parsing JSON response:', e);

                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'An error occurred while processing your request. Please try again later.',
                        });
                    }
                }
            });
        });
    </script>
@endsection