<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Example Course</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
        <script type="text/javascript" src="{{ asset('js/student_attendance.js') }}" defer> </script>
    </head>
    <body>
        <div id="student-attendance-section">
            <student-attendance></student-attendance>
        </div>
    </body>
</html>
