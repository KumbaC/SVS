@push('js')

    @if (session()->has('success'))
        <script>
            var message = {!! json_encode(session('success')) !!};
            document.addEventListener('DOMContentLoaded', () => {
                Swal.fire({
                    text: message,
                    icon: 'success',
                    confirmButtonText: 'Ok',
                    confirmButtonColor: '#004987',
                });
            })
        </script>
        {{ session()->forget('success') }}
    @endif

    @if (session()->has('error'))
        <script>
            var message = {!! json_encode(session('error')) !!};
            document.addEventListener('DOMContentLoaded', () => {
                Swal.fire({
                    text: message,
                    icon: 'error',
                    confirmButtonText: 'Ok',
                    confirmButtonColor: '#004987',
                });
            })
        </script>
        {{ session()->forget('error') }}
    @endif

    @if (session()->has('warning'))
        <script>
            var message = {!! json_encode(session('warning')) !!};
            document.addEventListener('DOMContentLoaded', () => {
                Swal.fire({
                    text: message,
                    icon: 'warning',
                    confirmButtonText: 'Ok',
                    confirmButtonColor: '#004987',
                });
            })
        </script>
        {{ session()->forget('warning') }}
    @endif

    @if (session()->has('info'))
        <script>
            var message = {!! json_encode(session('info')) !!};
            document.addEventListener('DOMContentLoaded', () => {
                Swal.fire({
                    text: message,
                    icon: 'info',
                    confirmButtonText: 'Ok',
                    confirmButtonColor: '#004987',
                });
            })
        </script>
        {{ session()->forget('info') }}
    @endif

    @if (session()->has('question'))
        <script>
            var message = {!! json_encode(session('question')) !!};
            document.addEventListener('DOMContentLoaded', () => {
                Swal.fire({
                    text: message,
                    icon: 'question',
                    confirmButtonText: 'Ok',
                    confirmButtonColor: '#004987',
                });
            })
        </script>
        {{ session()->forget('question') }}
    @endif
@endpush
