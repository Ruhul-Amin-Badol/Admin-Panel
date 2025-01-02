@extends('backend.layouts.master')

@section('meta')
    <title>Create new Blog- {{ get_option('title') }}</title>
@endsection

@section('content')
    <div class="page-header">
        <div class="add-item d-flex">
            <div class="page-title">
                <h4>Blog Management</h4>
                <h6>Create new Blog</h6>
            </div>
        </div>
        <ul class="table-top-head">
            <li>
                <div class="page-btn">
                    <a href="{{ route('blogs.index') }}" class="btn btn-secondary"><i data-feather="arrow-left"
                            class="me-2"></i>Back to
                        Blog</a>
                </div>
            </li>
            <li>
                <a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header"><i
                        data-feather="chevron-up" class="feather-chevron-up"></i></a>
            </li>
        </ul>
    </div>

    <form action="" id="blogForm" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body add-product pb-0">
                <div class="accordion-card-one accordion" id="accordionExample">
                    <div class="accordion-item">
                        <div class="accordion-header" id="headingOne">
                            <div class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                aria-controls="collapseOne">
                                <div class="addproduct-icon">
                                    <h5><i data-feather="info" class="add-info"></i><span>Basic Information</span></h5>
                                    <a href="javascript:void(0);"><i data-feather="chevron-down"
                                            class="chevron-down-add"></i></a>
                                </div>
                            </div>
                        </div>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row">

                                    <div class="col-lg-3 col-sm-6 col-12">
                                        <div class="mb-3 add-product">
                                            <label class="form-label">Title <span class="star-sign">*</span></label>
                                            <input type="text" class="form-control" id="title" name="title"
                                                value="{{ old('title') }}">

                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 col-12">
                                        <div class="mb-3 add-product">
                                            <label class="form-label">Slug<span class="star-sign">*</span></label>
                                            <input type="text" class="form-control" id="slug" name="slug">
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-sm-6 col-12">
                                        <label class="form-label">Status</label>
                                        <select class="select" name="status">
                                            <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active
                                            </option>
                                            <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 col-12">
                                        <label class="form-label">Publish Status</label>
                                        <select id="publish_status" class="select" name="publish_status">
                                            @foreach ($enumStatusValues as $value)
                                                <option value="{{ $value }}"
                                                    {{ old('publish_status') == $value ? 'selected' : '' }}>
                                                    {{ ucfirst($value) }}</option>
                                            @endforeach
                                        </select>
                                    </div>



                                </div>
                                <div class="row">


                                    <div class="col-lg-3 col-sm-6 col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Category</label>
                                            <select class="form-control multi-tags" name="category_ids[]"
                                                multiple="multiple" style="width: 375px!important">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            <input type="hidden" id="category_slugs" name="category_slugs">
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-sm-6 col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Tags<span class="star-sign"></span></label>
                                            <select class="form-control multi-tags" name="tags[]" multiple="multiple"
                                                style="width: 375px!important">
                                                @foreach ($tags as $tag)
                                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                                @endforeach
                                            </select>
                                            <input type="hidden" id="tag_slugs" name="tag_slugs">
                                        </div>
                                    </div>


                                    <div class="col-lg-3 col-sm-6 col-12">
                                        <div class="form-check form-check-lg form-switch">
                                            <label class="form-label">Blog Type</label><br>
                                            <input class="form-check-input mx-2" type="checkbox" role="switch"
                                                id="blogTypeSwitch" name="blog_type" value="0"
                                                onchange="toggleBlogType(this)">
                                            <label class="form-check-label" for="blogTypeSwitch"
                                                id="switchLabel">Free</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-sm-6 col-12">
                                        <label class="form-label">Authors</label>
                                        <select class="form-select select-show" name="author_id"
                                            style="width: 375px!important">
                                            <option value="">Select Author</option>
                                            @foreach ($authors as $author)
                                                <option value="{{ $author->id }}">{{ $author->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>





                                </div>
                                <div class="row">

                                    <div class="col-lg-12 col-sm-12 col-12">
                                        <div class="mb-3 add-product">
                                            <label class="form-label">Content<span class="star-sign">*</span></label>
                                            <textarea name="content" class="editor" id="editor" rows="60" cols="120">
                                                        This is the default text in the editor.
                                            </textarea>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-sm-6 col-12">
                                        <div class="mb-3 add-product">
                                            <label class="form-label">Thumbnail Image<span
                                                    class="star-sign">*</span></label>

                                            <div class="form-group">
                                                <div class="row" id="thumbnail" name="thumbnail">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-card-one accordion" id="accordionExample2">
                    <div class="accordion-item">
                        <div class="accordion-header" id="headingTwo">
                            <div class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                aria-controls="collapseTwo">
                                <div class="text-editor add-list">
                                    <div class="addproduct-icon list icon">
                                        <h5><i data-feather="life-buoy" class="add-info"></i><span>Meta Section</span>
                                            <a href="javascript:void(0);" class="m-lg-3"
                                                title="The meta tag enhances website performance, SEO, and user experience by defining character encoding, viewport settings, and essential metadata for search engines"><i
                                                    data-feather="eye" class="eye-icon"></i></a>
                                        </h5>
                                        <a href="javascript:void(0);"><i data-feather="chevron-down"
                                                class="chevron-down-add"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample2">
                            <div class="accordion-body">

                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                        aria-labelledby="pills-home-tab">
                                        <div class="row">


                                            <div class="col-lg-3 col-sm-6 col-12">
                                                <div class=" add-product">
                                                    <label class="form-label">Meta Title</label>
                                                    <input type="text" class="form-control" name="meta_title"
                                                        value="{{ old('meta_title') }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-12">
                                                <div class=" add-product">
                                                    <label class="form-label">Meta Keywords</label>
                                                    <input type="text" class="form-control" name="meta_keywords"
                                                        value="{{ old('meta_keywords') }}">
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-sm-6 col-12">
                                                <label class="form-label"> Meta Image</label>
                                                <div class="form-group">
                                                    <div class="row" id="meta_image" name="meta_image">

                                                    </div>
                                                </div>


                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-12">
                                                <div class="add-product list">
                                                    <label class="form-label">Meta Description</label>
                                                    <textarea rows="8" cols="5" class="form-control h-100" name="meta_description"
                                                        placeholder="Enter text here">{{ old('meta_description') }}</textarea>

                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class="col-lg-12">
            <div class="btn-addproduct mb-4">
                <button type="submit" class="btn btn-submit">Save All</button>
            </div>
        </div>
    </form>
@endsection
@section('script')
    <style>
        .star-sign {
            color: red;
            font-weight: bold;
        }

        .main-container {
            width: 795px;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
    {{-- <script src="{{ asset('theme/admin/assets/plugins/fileupload/spartan-multi-image-picker-min.js') }}"
        type="text/javascript"></script> --}}
    <script>
        $(document).ready(function() {

            function generateSlug(title) {

                var pattern = /[a-zA-Z0-9\u0980-\u09FF]+/g;

                return title.toLowerCase().match(pattern).join('_');
            }

            // Event listener for name field
            $('#title').on('input', function() {
                var title = $(this).val();
                var slug = title ? generateSlug(title) : null;
                $('#slug').val(slug);

            });


            $('#blogForm').submit(function(e) {
                e.preventDefault();

                var formData = new FormData(this);

                // Collect selected categories (ID or name)
                const selectedCategories = $('.multi-tags[name="category_ids[]"]').val();
                selectedCategories.forEach(function(category) {
                    formData.append('category_ids[]', category);
                });

                // Collect selected tags (ID or name)
                const selectedTags = $('.multi-tags[name="tags[]"]').val();
                selectedTags.forEach(function(tag) {
                    formData.append('tags[]', tag);
                });

                $.ajax({
                    url: '{{ route('blogs.store') }}',
                    type: 'POST',
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
                                window.location.href = '{{ route('blogs.index') }}';
                            }
                        });
                    },
                    error: function(xhr) {
                        try {
                            var response = JSON.parse(xhr.responseText);
                            var errorHtml = '<ul>';
                            Object.values(response.errors).forEach(function(errorMessages) {
                                errorMessages.forEach(function(error) {
                                    errorHtml += '<li>' + error + '</li>';
                                });
                            });
                            errorHtml += '</ul>';

                            Swal.fire({
                                icon: 'error',
                                title: 'Validation Errors',
                                html: errorHtml,
                            });
                        } catch (e) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'An unexpected error occurred. Please try again.',
                            });
                        }
                    },
                });
            });

            $("#thumbnail").spartanMultiImagePicker({

                fieldName: 'thumbnail',
                maxCount: 1,
                rowHeight: '200px',
                groupClassName: 'col',
                maxFileSize: '',
                dropFileLabel: "Drop Here",
                onExtensionErr: function(index, file) {
                    console.log(index, file, 'extension err');
                    alert('Please only input png or jpg type file')
                },
                onSizeErr: function(index, file) {
                    console.log(index, file, 'file size too big');
                    alert('File size too big max:250KB');
                }
            });
            // $("#cover_image").spartanMultiImagePicker({
            //     fieldName: 'cover_image',
            //     maxCount: 1,
            //     rowHeight: '200px',
            //     groupClassName: 'col',
            //     maxFileSize: '',
            //     dropFileLabel: "Drop Here",
            //     onExtensionErr: function(index, file) {
            //         console.log(index, file, 'extension err');
            //         alert('Please only input png or jpg type file')
            //     },
            //     onSizeErr: function(index, file) {
            //         console.log(index, file, 'file size too big');
            //         alert('File size too big max:250KB');
            //     }
            // });
            $("#meta_image").spartanMultiImagePicker({
                fieldName: 'meta_image',
                maxCount: 1,
                rowHeight: '200px',
                groupClassName: 'col',
                maxFileSize: '',
                dropFileLabel: "Drop Here",
                onExtensionErr: function(index, file) {
                    console.log(index, file, 'extension err');
                    alert('Please only input png or jpg type file')
                },
                onSizeErr: function(index, file) {
                    console.log(index, file, 'file size too big');
                    alert('File size too big max:250KB');
                }
            });

            //for select tow dropdown

            $(".select-show").select2();

        });

        function toggleBlogType(checkbox) {
            checkbox.value = checkbox.checked ? '1' : '0';
            $('#switchLabel').text(checkbox.checked ? 'Paid' : 'Free');
        }


        $(".multi-tags").select2({
            tags: true, 
            tokenSeparators: [','], 
            createTag: function(params) {
                var term = $.trim(params.term);
                if (term === '') {
                    return null; 
                }
                return {
                    id: term,
                    text: term
                };
            },
            maximumInputLength: 50,
        });
    </script>
@endsection
