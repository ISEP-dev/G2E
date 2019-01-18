ClassicEditor
    .create(document.querySelector('#content-publication'))
    .then(editor => {
        console.log(editor);
    })
    .catch(error => {
        console.error(error);
    });