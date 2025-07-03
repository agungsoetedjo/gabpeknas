<script src="{{ asset('tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
{{-- <script src="https://cdn.tiny.cloud/tinymce/5/tinymce.min.js"></script> --}}

<script>
    tinymce.init({
        selector: 'textarea#editor',
        height: 500,
        min_height: 400,
        max_height: 800,
        license_key: 'gpl',
        plugins: [
            'autoresize',
            'lists',
            'link',
            'preview',
            'fullscreen',
            'table'
        ],
        toolbar: 'undo redo | blocks | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist | link table | preview fullscreen',
        menubar: false,
        placeholder: 'Tulis isi berita di sini...',
        branding: false,
        content_style: "body { font-family:Inter,Arial,sans-serif; font-size:16px; line-height:1.6 }"
    });
</script>


{{-- <script>
    tinymce.init({
        selector: 'textarea#editor',
        height: 500,
        plugins: "",
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        license_key: 'gpl',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        mergetags_list: [{
                value: 'First.Name',
                title: 'First Name'
            },
            {
                value: 'Email',
                title: 'Email'
            },
        ],
        // ai_request: (request, respondWith) => respondWith.string(() => Promise.reject(
        //     "See docs to implement AI Assistant")),
        promotion: false,
        toolbar_sticky: true,
        // forced_root_block: false,
        setup: function(editor) {
            editor.on('init change', function() {
                editor.save();
            });
            editor.on('change', function(e) {
                this.set('deskripsi', editor.getContent());
            });
        }
    });
</script> --}}
