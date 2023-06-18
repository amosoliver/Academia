<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Academia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/jquery.inputmask.bundle.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.cpf').inputmask('999.999.999-99');
            $('.horario').inputmask('99:99', { 'placeholder': 'HH:MM' });
            $('.cnpj').inputmask('99.999.999/9999-99');
            $('.cep').inputmask('99999-999');
            $('.telefone').inputmask('(99) 9999-9999');
            $('.data').inputmask('99/99/9999');
            $('.valor').inputmask('R$ 999.999,99');
        });
        </script>



</head>
<body>
    <main>

        @if(session('success'))
            <div class="alert alert-success col-md-3">
                <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"width="15" height="15"><use xlink:href="#check-circle-fill"/></svg>
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
                <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Danger:" width="15" height="15"><use xlink:href="#exclamation-triangle-fill"/></svg>
                {{ session('error') }}
            </div>
        @endif
        @yield('main')
    </main>
</body>
</html>
