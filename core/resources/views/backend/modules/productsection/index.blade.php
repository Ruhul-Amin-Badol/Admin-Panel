@extends('backend.layouts.master')
@section('meta')
    <title>All Sections - {{ get_option('title') }}</title>
@endsection

@section('content')
    <div class="page-header">
        <div class="add-item d-flex">
            <div class="page-title">
                <h4>Sections</h4>
                <h6>Manage Sections</h6>
            </div>
        </div>
        <ul class="table-top-head">
            @include('backend.include.buttons')
            <li>
                <a href="{{ route('orderstatuses.all.delete') }}" class="delete-btn-group" data-bs-toggle="tooltip"
                    data-bs-placement="top" title="Delete Selected"><img
                        src="{{ asset('theme/admin/assets/img/icons/delete.svg') }}" alt="img"></a>
            </li>
        </ul>
        <div class="page-btn">
            <a href="javascript:void(0)" class="btn btn-primary me-2" data-bs-toggle="modal"
                data-bs-target="#statusModal"><i data-feather="plus-circle"></i>Add New</a>
        </div>
    </div>

    <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sections</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="createSections" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-body add-product pb-0">
                                <div class="accordion-card-one accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <div class="accordion-header" id="headingOne">
                                            <div class="accordion-button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne" aria-controls="collapseOne">
                                                <div class="addproduct-icon">
                                                    <h5><i data-feather="info" class="add-info"></i><span>Basic
                                                            Information</span></h5>
                                                    <a href="javascript:void(0);"><i data-feather="chevron-down"
                                                            class="chevron-down-add"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="collapseOne" class="accordion-collapse collapse show"
                                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="row">

                                                    <div class="col-lg-12 col-sm-12 col-12">
                                                        <div class="mb-3 add-product required">
                                                            <label class="form-label">Name</label>
                                                            <input type="text" class="form-control" id="name"
                                                                name="name" placeholder="Enter text here">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-sm-12 col-12 required mb-3">
                                                        <label class="form-label">Status</label>
                                                        <select class="form-select select" name="status" width="100%">
                                                            <option value="1">Active</option>
                                                            <option value="0">Inactive</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-lg-12 col-sm-12 col-12 required mb-3">
                                                        <label class="form-label">Section Type</label>
                                                        <select class="form-select select" name="section_type" width="100%">
                                                            {{-- <option value="popular">Popular</option>
                                                            <option value="best-seller">Best Seller</option> --}}
                                                            <option value="recent">Recent</option>
                                                            <option value="custom">Custom</option>
                                                        </select>
                                                    </div>


                                                    <div class="col-lg-12 col-sm-12 col-12 mb-3">
                                                        <div class=" add-product">
                                                            <label class="form-label">Link</label>
                                                            <input type="text" class="form-control" id="name"
                                                                name="link" placeholder="Enter text here">
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
                                <button type="submit" class="btn btn-submit">Save</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>



    <div class="card table-list-card">
        <div class="card-body">
            <div class="table-top">
                <div class="search-set">
                    <div class="search-input">
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table AjaxDataTable  table-hover" style="width:100%;">
                    <thead>
                        <tr>
                            <th class="no-sort" data-orderable="false" style="width: 5%">Reorder</th>
                            <th style="width: 5%">SN</th>
                            <th class="no-sort" style="width: 10%">Name</th>
                            <th class="no-sort" style="width: 10%">Products</th>
                            <th class="no-sort" style="width: 10%">Status</th>
                            <th class="no-sort" style="width: 10%">Created By</th>
                            <th class="no-sort" style="width: 5%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="statusUpdateModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Sections</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="updateOrderstatus">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <!-- DataTables RowReorder -->
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/editor/2.1.9/css/editor.dataTables.min.css">
    <!-- DataTables Editor JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/editor/2.1.9/js/dataTables.editor.min.js">
    </script>



    <script>
        // AJAX_URL = "{{ route('sections.products.ajax') }}";
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': '{{ csrf_token() }}'
        //     }
        // });

        $(document).ready(function() {
            var table;
            if ($('.AjaxDataTable').length > 0) {
                table = $('.AjaxDataTable').DataTable({
                    "bFilter": true,
                    "sDom": 'fBtlpi',
                    "ordering": true,
                    "responsive": true,
                    'order': [
                        [1, 'desc']
                    ],
                    'processing': true,
                    'serverSide': true,
                    'serverMethod': 'post',
                    'ajax': {
                        'url': "{{ route('sections.products.ajax') }}"
                    },
                    'aLengthMenu': [
                        [10, 50, 100, 200, 500, -1],
                        [10, 50, 100, 200, 500, "ALL"]
                    ],
                    "language": {
                        search: '',
                        sLengthMenu: '_MENU_',
                        searchPlaceholder: "Search",
                        info: "_START_ - _END_ of _TOTAL_ items",
                        paginate: {
                            next: ' <i class="fa fa-angle-right"></i>',
                            previous: '<i class="fa fa-angle-left"></i> '
                        },
                    },
                    'buttons': [{
                            extend: 'copy',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        {
                            extend: 'csv',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        {
                            extend: 'excel',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        {
                            extend: 'print',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        'colvis'
                    ],
                    rowReorder: {
                        // Specify the drag handle
                        selector: 'td:first-child',
                        update: true,
                        dataSrc: 'id',
                        snapX: 20,
                        snapY: 20,
                        dropCallback: function(node, data, items) {
                            // Your drop callback function
                        }
                    },
                    initComplete: function(settings, json) {
                        $('.dataTables_filter').appendTo('#tableSearch');
                        $('.dataTables_filter').appendTo('.search-input');

                        $(document).on('click', '.export-excel', function() {
                            $('.dt-buttons .buttons-excel').click();
                        });

                        $(document).on('click', '.export-print', function() {
                            $('.dt-buttons .buttons-print').click();
                        });

                        $(document).on('click', '.export-copy', function() {
                            $('.dt-buttons .buttons-copy').click();
                            Swal.fire({
                                title: "Success",
                                text: "Successfully copied",
                                icon: "success",
                                showConfirmButton: false,
                                timer: 1500
                            });
                        });

                        $(document).on('click', '.export-refresh', function() {
                            table.ajax.reload();
                            Swal.fire({
                                title: "Success",
                                text: "Successfully Reloaded",
                                icon: "success",
                                showConfirmButton: false,
                                timer: 1500
                            });
                        });

                        function toggleColumn(index) {
                            table.column(index).visible(!table.column(index).visible());
                        }

                        $(document).on('click', '.export-hide-column', function() {
                            var columnCheckboxes = '';
                            table.columns().every(function() {
                                var column = this;
                                var columnTitle = $(column.header()).text().trim();
                                var columnIndex = column.index();
                                columnCheckboxes +=
                                    `<div style="text-align:left;">
                <input type="checkbox" id="chk_${columnIndex}" class="column-checkbox" value="${columnIndex}" ${column.visible() ? 'checked' : ''}>
                <label for="chk_${columnIndex}">${columnTitle}</label>
            </div>`;
                            });

                            Swal.fire({
                                title: 'Hide/Unhide Columns',
                                html: columnCheckboxes,
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Apply',
                                cancelButtonText: 'Cancel',
                                preConfirm: () => {
                                    $('.column-checkbox').each(function() {
                                        var columnIndex = $(this).val();
                                        var isChecked = $(this).prop(
                                            'checked');
                                        if (isChecked !== table.column(
                                                columnIndex).visible()) {
                                            toggleColumn(columnIndex);
                                        }
                                    });
                                }
                            });
                        });

                        // Handle checkbox click
                        $(document).on('click', '.checkboxs input', function(e) {
                            e.stopPropagation();
                            // Handle checkbox click action here
                        });

                        table.on('row-reorder', function(e, details, edit) {
                            var newOrder = details.map(function(detail) {
                                return {
                                    id: detail.node.id.replace('row_',
                                        ''),
                                    newPosition: detail.newPosition + 1
                                };
                            });

                            var tableId = $('.AjaxDataTable').attr(
                                'id');

                            $.ajax({
                                url: "{{ route('sections.sorting') }}",
                                type: 'POST',
                                data: {
                                    tableId: tableId,
                                    newOrder: newOrder
                                },
                                success: function(response) {
                                    Swal.fire({
                                        title: "Success",
                                        text: "Updated successfully",
                                        icon: "success",
                                        showConfirmButton: false,
                                        timer: 1500
                                    });

                                    table.ajax.reload();
                                },
                                error: function(xhr, status, error) {
                                    Swal.fire({
                                        title: "Error",
                                        text: "An error occurred while updating the order",
                                        icon: "error",
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                }
                            });
                        });
                    }
                });
            }
        });


        $(document).ready(function() {
            $(document).on('click', '.delete-btn', function(event) {
                event.preventDefault();
                // Show confirmation dialog
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You will not be able to recover this data!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!'
                }).then((result) => {
                    if (result.value) {
                        // If confirmed, proceed with deletion
                        var actionUrl = $(this).attr('href');

                        $.ajax({
                            url: actionUrl,
                            method: 'GET',
                            dataType: 'json',
                            success: function(response) {
                                if (response.message ===
                                    'Section Deleted successfully') {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success',
                                        text: response.message,
                                    }).then(function() {
                                        location.reload();
                                    });
                                }
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                console.error('AJAX Error:', textStatus, errorThrown);
                            }
                        });
                    }
                });
            });
        });

        $(document).on("click", '.changeStatus', function(e) {
            e.preventDefault();
            var $label = $(this);
            var authorId = $label.data('section-id');
            var checkboxId = $label.attr('for');
            var $checkbox = $('#' + checkboxId);

            // Determine the new status based on the checkbox state
            var newStatus = $checkbox.prop('checked') ? 0 : 1;

            // Send an AJAX request to update the status of the campaign
            $.ajax({
                url: '{{ route('sections.updateStatus') }}',
                type: 'POST',
                data: {
                    id: authorId,
                    status: newStatus,
                },
                success: function(response) {
                    // Toggle the checkbox state
                    $checkbox.prop('checked', newStatus === 1);

                    // Show a success message using SweetAlert
                    Swal.fire({
                        title: "Success!",
                        text: response.message,
                        icon: "success",
                        showConfirmButton: false, // Remove the confirmation button
                        timer: 1500 // Automatically close after 1.5 seconds
                    }).then(function() {
                        // Reload the AjaxDataTable
                        $('.AjaxDataTable').DataTable().ajax.reload();
                    });
                },
                error: function(xhr, status, error) {
                    // Handle errors if any
                    Swal.fire({
                        title: "Error!",
                        text: "An error occurred while updating the campaign status.",
                        icon: "error",
                        showConfirmButton: false, // Remove the confirmation button
                        timer: 1500 // Automatically close after 1.5 seconds
                    });
                }
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $('#createSections').submit(function(e) {
                e.preventDefault(); // Prevent the form from submitting normally
                // Get form data
                var formData = new FormData(this);
                // Make AJAX request
                $.ajax({
                    url: '{{ route('sections.store') }}',
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
                                window.location.href =
                                    '{{ route('sections.index') }}';
                            }
                        });
                    },
                    error: function(xhr, status, error) {
                        // Parse the JSON response from the server
                        try {
                            var responseObj = JSON.parse(xhr.responseText);
                            var errorMessages = responseObj.errors ? Object.values(responseObj
                                .errors).flat() : [responseObj.message];
                            var errorMessageHTML = '<ul>' + errorMessages.map(errorMessage =>
                                '<li>' + errorMessage + '</li>').join('') + '</ul>';

                            // Show error messages using SweetAlert
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                html: errorMessageHTML,
                            });
                        } catch (e) {
                            console.error('Error parsing JSON response:', e);
                            // Show default error message using SweetAlert
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'An error occurred while processing your request. Please try again later.',
                            });
                        }
                    }

                });
            });

        });



        $(document).ready(function() {
            $(document).on('click', '.edit_status', function(event) {
                event.preventDefault();
                var statusId = $(this).data('id');
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '{{ route('sections.edit') }}',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        id: statusId,
                        _token: csrfToken
                    },
                    success: function(response) {
                        if (response.success) {

                            $('#updateOrderstatus').html(response.statData);

                            $('#statusUpdateModal').modal('show');
                        } else {
                            console.error('Error: ', response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error: ', error);
                    }
                });
            });
        });


        $(document).on("submit", "#sectionseditForm", function(e) {
            e.preventDefault(); // Prevent the form from submitting normally
            // Get form data
            var formData = new FormData(this);

            // Make AJAX request
            $.ajax({
                url: '{{ route('sections.update') }}', // Ensure this route points to your update method
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
                            window.location.href = '{{ route('sections.index') }}';
                        }
                    });
                },
                error: function(xhr, status, error) {
                    // Parse the JSON response from the server
                    try {
                        var responseObj = JSON.parse(xhr.responseText);
                        var errorMessages = responseObj.errors ? Object.values(responseObj.errors)
                            .flat() : [responseObj.message];
                        var errorMessageHTML = '<ul>' + errorMessages.map(errorMessage => '<li>' +
                            errorMessage + '</li>').join('') + '</ul>';
                        // Show error messages using SweetAlert
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            html: errorMessageHTML,
                        });
                    } catch (e) {
                        console.error('Error parsing JSON response:', e);
                        // Show default error message using SweetAlert
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
