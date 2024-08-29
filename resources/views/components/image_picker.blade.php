<div id="{{$id}}Picker" class="position-relative {{$className ?? ""}}">
    @yield("body")
    <input type="file" class="d-none" onchange="loadImage()" name="{{ $fieldName ?? 'image' }}" id="{{ $id ?? 'image' }}" placeholder="photo">
    <span class="invalid-feedback"></span>
</div>

@push('scripts')
    <script>
        let {{$id}}Picker = document.querySelector("#{{ $id }}");
        let {{$id}}Content = document.querySelector("#{{ $id }}Picker");

        {{$id}}Content.addEventListener('click', (event) => {
            {{$id}}Picker.click();
        });

        function loadImage() {
            if ({{$id}}Picker.files.length > 0) {
                let file = window.URL.createObjectURL({{$id}}Picker.files[0])
                {{$id}}Content.querySelector('img').src = file;
            }
        }
    </script>
@endpush
