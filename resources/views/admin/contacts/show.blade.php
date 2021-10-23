@extends('admin.layouts.app')

@section('title', $contact->subject)

@section('content')
    <div class="page-header card" style="margin-top: 0px;margin-bottom: -11px;">
        <div class="row align-items-end">
            <div class="col-lg-0">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i> Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!"></a> Contacts</li>
                        <li class="breadcrumb-item"><a href="{{ route('contacts.show', $contact->id) }}">{{ $contact->subject }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile" style="background-color:#EDF2F7!important;">
                <div class="tile-header">
                    <h2 class="text-center">
                        {{ $contact->subject }}
                    </h2>
                </div>

                <div class="tile-body">
                    <div class="row">
                        <div class="col-8 offset-2">
                            <div class="bg-white px-3 py-4">
                                <h1 style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; color: #3d4852; font-size: 18px; font-weight: bold; margin-top: 0; text-align: center;">
                                    New Contact Email
                                </h1>
                                <h3 style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; font-size: 14px; font-weight: bold; margin-top: 0; text-align: left;color:#718096;">
                                    Contact person:
                                </h3>

                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative;">{{ $contact->budget }}</td>
                                    </tr>

                                    <tr>
                                        <th style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; text-align: left;">Name:</th>
                                        <td style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative;">{{ $contact->name }}</td>
                                    </tr>
                                    <tr>
                                        <th style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; text-align: left;">Subject:</th>
                                        <td style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative;">{{ $contact->subject }}</td>
                                    </tr>
                                    <tr>
                                        <th style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; text-align: left;">Email:</th>
                                        <td style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative;">
                                            <a target="_blank" rel="noopener noreferrer" href="mailto:{{ $contact->email }}" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; color: #3869d4;">{{ $contact->email }}</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>

                                <h3 style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; font-size: 14px; font-weight: bold; margin-top: 0; text-align: left;color:#718096;">
                                    Message:
                                </h3>

                                <p class="text-justify" style="color:#718096;">
                                    {{ $contact->message }}
                                </p>
                                <p style="color:#718096;">
                                    Thanks,<br>
                                    {{ $contact->name }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tile-footer">
                    <p style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; line-height: 1.5em; margin-top: 0; color: #b0adc5; font-size: 12px; text-align: center;">
                        &copy; {{ date('Y') }} {{ Auth::user()->name }}. All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <!-- data-table js -->
    <script src="{{asset('assets/backend/files/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/backend/files/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/backend/files/assets/pages/data-table/js/jszip.min.js')}}"></script>
    <script src="{{asset('assets/backend/files/assets/pages/data-table/js/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/backend/files/assets/pages/data-table/js/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/backend/files/bower_components/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/backend/files/bower_components/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/backend/files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/backend/files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/backend/files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/backend/files/assets/pages/data-table/js/data-table-custom.js')}}"></script>
    <script src="{{asset('assets/backend/files/assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
    <script>
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });
    </script>
    <script>
        $(document).ready(function() {
            // Basic datatable
            $('.datatable-basic').DataTable({
                responsive: true
            });
        });

    </script>
@endpush

