<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <title>elFinder 2.0</title>

        <!-- jQuery and jQuery UI (REQUIRED) -->
        <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/smoothness/jquery-ui.css" />
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>

       <!-- elFinder CSS (REQUIRED) -->
        <link rel="stylesheet" type="text/css" href="{{ asset('packages/barryvdh/elfinder/css/elfinder.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('packages/barryvdh/elfinder/css/theme.css') }}">

        <!-- elFinder JS (REQUIRED) -->
        <script src="{{ asset('packages/barryvdh/elfinder/js/elfinder.min.js') }}"></script>

        <!-- elFinder initialization (REQUIRED) -->
        <script type="text/javascript" charset="utf-8">
            // Documentation for client options:
            // https://github.com/Studio-42/elFinder/wiki/Client-configuration-options
            $().ready(function() {
                $('#elfinder').elfinder({
                    url : '{{ route("elfinder.connector") }}',
                    getFileCallback : function(file) {
                        @if(request()->has('type'))
                            var t = file.mime;
                            var r = "{{request()->get('type')}}";
                            if(r == 'image'){
                                if(jQuery.inArray(t,["image/jpeg","image/png","image/jpg","image/gif","image/ico","image/svg+xml"]) == -1){
                                    alert('File Must Be jpg,jpeg,png,ico,svg');
                                    return;
                                }
                            }else if(r == 'video'){
                                if(jQuery.inArray(t,["video/mp4","video/webm"]) == -1){
                                    alert('File Must Be mp4,webm');
                                    return;
                                }
                            }else if(r == 'file'){
                                if(jQuery.inArray(t,["application/pdf"]) == -1){
                                    alert('File Must Be File doc,pdf');
                                    return;
                                }
                            }
                        @endif
                        window.opener.setPath(file);
                        window.close();
                    }
                });
            });
        </script>
    </head>
    <body>

        <!-- Element where elFinder will be created (REQUIRED) -->
        <div id="elfinder"></div>

    </body>
</html>
