$(document).ready(function () {
    function initEditor(selector, counterSelector, maxLength, toolbarOptions) {
        ClassicEditor.create(document.querySelector(selector), {
            toolbar: toolbarOptions
        })
            .then(editor => {
                const updateCount = () => {
                    const charCount = editor.getData().replace(/<[^>]*>/g, '').length;
                    $(counterSelector).text(charCount > maxLength ? maxLength : charCount);

                    if (charCount > maxLength) {
                        const content = editor.getData().replace(/<[^>]*>/g, '').substring(0, maxLength);
                        editor.setData(content);
                        $(counterSelector).addClass('exceeded');
                    } else {
                        $(counterSelector).removeClass('exceeded');
                    }
                };

                updateCount();

                editor.model.document.on('change:data', updateCount);
            })
            .catch(error => {
                console.error(error);
            });
    }

    // Editor 1: #description
    initEditor('#description', '#charCount', 4000, [
        'heading', 'undo', 'redo', 'bold', 'italic', 'underline', 'strikethrough',
        'code', 'superscript', 'subscript', 'fontColor', 'fontBackgroundColor',
        'alignment', 'blockQuote', 'numberedList', 'bulletedList', 'link',
        'insertTable', 'codeBlock', 'insertHorizontalRule', 'specialCharacters',
        'emoji', 'customButton'
    ]);

    // Editor 2: #meta_desc
    initEditor('#meta_desc', '#meta_desc_Count', 700, [
        'heading', 'undo', 'redo', 'bold', 'italic', 'underline', 'strikethrough',
        'superscript', 'subscript', 'fontColor', 'fontBackgroundColor', 'alignment',
        'blockQuote', 'link'
    ]);

    // Editor 3: #meta_sub_desc
    initEditor('#meta_sub_desc', '#meta_sub_desc_Count', 250, [
        'heading', 'undo', 'redo', 'bold', 'italic', 'underline', 'strikethrough',
        'superscript', 'subscript', 'fontColor', 'fontBackgroundColor', 'alignment',
        'blockQuote', 'link'
    ]);

    // Editor 3: #meta_sub_desc
    initEditor('.meta_sub_desc', '.meta_sub_desc_Count', 250, [
        'heading', 'undo', 'redo', 'bold', 'italic', 'underline', 'strikethrough',
        'superscript', 'subscript', 'fontColor', 'fontBackgroundColor', 'alignment',
        'blockQuote', 'link'
    ]);
});
