// import Alignment from '@ckeditor/ckeditor5-alignment/src/alignment';

ClassicEditor
    .create(document.querySelector('#content-publication'), {
        language: 'fr',
        // plugins: [ Alignment ],
        alignment: {
            options: ['left', 'right', 'center', 'justify']
        },
        highlight: {
            options: [
                {
                    model: 'greenMarker',
                    class: 'marker-green',
                    title: 'Green marker',
                    color: 'var(--ck-highlight-marker-green)',
                    type: 'marker'
                },
                {
                    model: 'redPen',
                    class: 'pen-red',
                    title: 'Red pen',
                    color: 'var(--ck-highlight-pen-red)',
                    type: 'pen'
                }
            ]
        },
        toolbar: [
            'heading', '|', 'bold', 'italic', 'underline', 'highlight:yellowMarker', 'alignment', 'bulletedList', 'numberedList', 'link',
            '|', 'imageUpload', 'mediaEmbed', 'insertTable',
            '|', 'undo', 'redo']
    })
    .then(editor => {

        console.log(editor);
    })
    .catch(error => {
        console.error(error);
    });
